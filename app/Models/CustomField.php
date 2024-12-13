<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CustomField extends Model
{

  use SoftDeletes;

  protected $table = 'custom_fields';
  protected $guarded = [];

  protected $casts = [
    'is_required' => 'boolean',
    'is_active' => 'boolean',
  ];


}
