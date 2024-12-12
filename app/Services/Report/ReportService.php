<?php

namespace App\Services\Report;

use App\Models\Reports as Report;
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
            event(new ReportCreated($report));

            return $report;
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    protected function saveCustomFieldValues(Report $report, array $values)
    {
        $formattedValues = [];
        foreach ($values as $fieldId => $value) {
            $formattedValues[$fieldId] = ['value' => $value];
        }

        $report->customFields()->sync($formattedValues);
    }
}
