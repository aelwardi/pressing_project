<?php

namespace App\Enum;

enum MaintenanceStatusEnum: string
{
    case PLANNED = 'PLANIFIEE';
    case IN_PROGRESS = 'EN_COURS';
    case COMPLETED = 'TERMINEE';
    case CANCELLED = 'ANNULEE';
    case DELAYED = 'RETARDEE';
}
