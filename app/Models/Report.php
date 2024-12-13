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
}
