<?php

namespace App\Models;

use App\Traits\CustomDateAttributes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlanAbility extends Model
{
    use CustomDateAttributes, SoftDeletes;

    protected $guarded = [];
}
