<?php

namespace App\Services\Report\Tracking;

use App\Models\Report;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TrackingService
{
    public function findReport(string $protocol, ?string $email = null): Report
    {
        $query = Report::where('protocol', $protocol);

        // Se o email foi fornecido, verifica se a denúncia não é anônima
        // e se o email corresponde ao registrado
        if ($email) {
            $query->where(function($q) use ($email) {
                $q->where('is_anonymous', false)
                  ->where('email', $email);
            });
        } else {
            // Se não foi fornecido email, só permite consultar denúncias anônimas
            $query->where('is_anonymous', true);
        }

        $report = $query
                  //->with(['status', 'updates'])
                  ->firstOrFail();

        return $report;
    }

    public function getStatusDescription(string $status): string
    {
        return match ($status) {
            'pending' => 'Em análise inicial',
            'in_progress' => 'Em andamento',
            'completed' => 'Concluída',
            'archived' => 'Arquivada',
            default => 'Status desconhecido'
        };
    }

    public function getStatusColor(string $status): string
    {
        return match ($status) {
            'pending' => 'warning',
            'in_progress' => 'info',
            'completed' => 'success',
            'archived' => 'secondary',
            default => 'primary'
        };
    }
}
