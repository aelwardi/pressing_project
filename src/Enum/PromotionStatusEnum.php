<?php

namespace App\Enum;

enum PromotionStatusEnum: string
{
    case UPCOMING = 'A_VENIR';
    case ACTIVE  = 'ACTIVE';
    case EXPIRED = 'EXPIREE';
    case CANCELLED = 'ANNULEE';
}
