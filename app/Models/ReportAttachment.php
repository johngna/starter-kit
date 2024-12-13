<?php

namespace App\Models;

use App\Models\Report as Report;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportAttachment extends Model
{
  use SoftDeletes;

  protected $fillable = [
      'report_id',
      'name',
      'path',
      'type',
      'size'
  ];

  public function report()
  {
      return $this->belongsTo(Report::class);
  }
}
