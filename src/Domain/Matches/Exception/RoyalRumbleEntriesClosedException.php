<?php
declare(strict_types=1);

namespace App\Domain\Matches\Exception;

use App\Domain\DomainException\DomainInvalidArgumentException;

class RoyalRumbleEntriesClosedException extends DomainInvalidArgumentException
{
    protected $message = 'Entries for the requested Royal Rumble are closed.';
}
