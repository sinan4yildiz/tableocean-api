<?php

namespace App\Models;

use App\Traits\CustomDateAttributes;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessShift extends Model
{
    use HasFactory, Translatable, CustomDateAttributes, SoftDeletes;

    protected $guarded = [];
}
