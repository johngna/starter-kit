<?php

namespace App\Services\Report;

use App\Models\Report as Report;
use App\Models\CustomField;
use Illuminate\Support\Facades\DB;
use App\Services\Report\ProtocolGenerator;
use App\Events\ReportCreated;

class ReportService
{
    protected $protocolGenerator;

    public function __construct(ProtocolGenerator $protocolGenerator)
    {
        $this->protocolGenerator = $protocolGenerator;
    }

    public function getCustomFields()
    {
        return CustomField::active()->orderBy('order')->get();
    }

    public function create(array $data)
    {
        DB::beginTransaction();
        try {
            $protocol = $this->protocolGenerator->generateUnique();

            $report = Report::create([
                'report_type_id' => $data['report_type_id'],
                'protocol' => $protocol,
                'is_anonymous' => $data['is_anonymous'],
                'reported_by' => $data['reported_by'],
                'email' => $data['email'],
                'contact' => $data['contact'],
                'details' => $data['details'],
                'status' => 'pending',
                'created_at' => now(),
            ]);

            if (!empty($data['custom_fields_values'])) {
                $this->saveCustomFieldValues($report, $data['custom_fields_values']);
            }

            DB::commit();
            // event(new ReportCreated($report));

            return $report;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    protected function saveCustomFieldValues(Report $report, array $values)
    {

        $report->customFieldValues()->createMany(
            collect($values)->map(function ($value, $fieldId) {
                return [
                    'custom_field_id' => $fieldId,
                    'value' => $value,
                ];
            })->toArray()
        );

    }
}
