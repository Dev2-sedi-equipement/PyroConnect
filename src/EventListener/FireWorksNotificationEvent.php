<?php

namespace App\EventListener;

use Symfony\Contracts\EventDispatcher\Event;

class FireWorksNotificationEvent extends Event
{
    private $dossierId;
    private $fireWorksDate;

    public function __construct(int $dossierId, \DateTimeImmutable $fireWorksDate)
    {
        $this->dossierId = $dossierId;
        $this->fireWorksDate = $fireWorksDate;
    }

    public function getDossierId(): int
    {
        return $this->dossierId;
    }

    public function getFireWorksDate(): \DateTimeImmutable
    {
        return $this->fireWorksDate;
    }
}
