<?php

declare(strict_types=1);

namespace App\Enums;

enum RolesEnum: string
{
    case Admin = 'admin';
    case Moderator = 'moderator';
    case Manager = 'manager';
    case Curator = 'curator';
    case Economist = 'economist';
}
