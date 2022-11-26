<?php

namespace App\Models;

use App\Traits\CustomDateAttributes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Restaurant extends Model
{
    use HasFactory, CustomDateAttributes, SoftDeletes;

    protected $guarded = [];
}
