<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    protected $guarded = [];

    public function attachments()
    {
        return $this->hasMany(ReportAttachment::class);
    }

    public function customFieldValues()
    {
        return $this->hasMany(CustomFieldValue::class);
    }



    public function getStatusDescriptionAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'Em análise inicial',
            'in_progress' => 'Em andamento',
            'completed' => 'Concluída',
            'archived' => 'Arquivada',
            default => 'Status desconhecido'
        };
    }

    public function getStatusColorAttribute(): string
    {
        return match ($this->status) {
            'pending' => 'warning',
            'in_progress' => 'info',
            'completed' => 'success',
            'archived' => 'secondary',
            default => 'primary'
        };
    }
}
