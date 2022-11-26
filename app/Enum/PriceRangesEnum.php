<?php

namespace App\Enum;

enum PriceRangesEnum: string
{
    case LOW = 'low';
    case MODERATE = 'moderate';
    case HIGH = 'high';
    case PRICEY = 'pricey';
}