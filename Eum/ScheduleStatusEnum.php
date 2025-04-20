<?php

namespace App\Enum;

enum ScheduleStatusEnum: string
{
    case ACTIVE  = 'ACTIF';
    case CLOSED   = 'FERME';
    case TEMPORARY_CLOSE = 'FERMETURE_TEMPORAIRE';
}
