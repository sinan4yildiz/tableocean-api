<?php

namespace App\Traits;

use App\Models\Translation;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait Translatable
{
    /**
     * Get all the models' translations.
     *
     * @return MorphMany
     */
    public function translations()
    {
        return $this->morphMany(Translation::class, 'translatable');
    }

    /**
     * Get the translation attribute.
     *
     * @return Translation
     */
    public function getTranslationAttribute()
    {
        return $this->translations->firstWhere('language', app()->getLocale());
    }
}