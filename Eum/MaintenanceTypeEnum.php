<?php

namespace App\Enum;

enum MaintenanceTypeEnum: string
{
    case PREVENTIVE = 'PREVENTIVE';
    case CORRECTIVE  = 'CORRECTIVE';
    case CURATIVE    = 'CURATIVE';
    case DIAGNOSTIC  = 'DIAGNOSTIQUE';
}
