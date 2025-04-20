<?php

namespace App\Enum;

enum OrderStatusEnum: string
{
    case PENDING = 'EN_ATTENTE';
    case CONFIRMED = 'CONFIRMEE';
    case PROCESSING = 'EN_PREPARATION';
    case SHIPPED = 'EXPEDIEE';
    case DELIVERED = 'LIVREE';
    case  CANCELLED = 'ANNULEE';
}
