<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;

trait CustomDateAttributes
{
    /**
     * Get the formatted created at attribute
     *
     * @return Attribute
     */
    protected function createdAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at?->format(config('app.date_format')),
        );
    }

    /**
     * Get the formatted updated at attribute
     *
     * @return Attribute
     */
    protected function updatedAtFormatted(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at?->format(config('app.date_format')),
        );
    }

    /**
     * Get the created at human attribute
     *
     * @return Attribute
     */
    protected function createdAtHuman(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->created_at?->diffForHumans(),
        );
    }

    /**
     * Get the updated at human attribute
     *
     * @return Attribute
     */
    protected function updatedAtHuman(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->updated_at?->diffForHumans(),
        );
    }
}