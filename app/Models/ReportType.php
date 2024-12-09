<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportType extends Model
{
  // use SoftDeletes;

  protected $table = 'report_types';
  protected $guarded = [];


  public function customFields()
  {
    return $this->hasMany(CustomField::class);
  }
}
