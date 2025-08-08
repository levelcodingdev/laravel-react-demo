<?php

namespace App\Domain\Mentor\Enums;

enum Availability: string
{
    case Available = 'available';
    case Full = 'full';
    case Paused = 'paused';
}