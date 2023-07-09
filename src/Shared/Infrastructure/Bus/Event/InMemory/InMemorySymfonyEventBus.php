<?php

declare(strict_types=1);

namespace TimeTracker\Shared\Infrastructure\Bus\Event\InMemory;

use TimeTracker\Shared\Domain\Bus\Event\DomainEvent;
use TimeTracker\Shared\Domain\Bus\Event\EventBus;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\MessageBusInterface;

final class InMemorySymfonyEventBus implements EventBus
{
    public function __construct(
        private readonly MessageBusInterface $eventBus
    ) {}

    public function publish(DomainEvent ...$events): void
    {
        foreach ($events as $event) {
            try {
                $this->eventBus->dispatch($event);
            } catch (NoHandlerForMessageException) {}
        }
    }
}
