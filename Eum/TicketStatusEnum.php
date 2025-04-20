<?php

namespace App\Enum;

enum TicketStatusEnum: string
{
    case OPEN = 'OUVERT';
    case IN_PROGRESS = 'EN_COURS';
    case RESOLVED = 'RESOLU';
    case CLOSED = 'FERME';
}
