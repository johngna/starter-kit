<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomFieldValue extends Model
{
  //
  protected $table = 'custom_field_values';
  protected $guarded = [];

  public function reportType()
  {
    return $this->belongsTo(ReportType::class);
  }
}
