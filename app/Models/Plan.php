<?php

namespace App\Models;

use App\Traits\CustomDateAttributes;
use App\Traits\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Plan extends Model
{
    use Translatable, CustomDateAttributes, SoftDeletes;

    protected $guarded = [];
}
