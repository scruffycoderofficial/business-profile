<?php

namespace DigitalClosuxe\Business\Aggregate
{
    use DigitalClosuxe\Business\Profile\Event\DomainEvent;
    use DigitalClosuxe\Business\Profile\Event\PublishingEvent;

    final class AggregateRoot
    {
        private $recordedEvents = [];

        public function recordedEvents()
        {
            return $this->recordedEvents;
        }

        public function clearEvents()
        {
            $this->recordedEvents = [];
        }

        protected function recordApplyAndPublishThat(DomainEvent $domainEvent)
        {
            $this->recordThat($domainEvent);
            $this->applyThat($domainEvent);
            $this->publishThat($domainEvent);
        }

        protected function recordThat(DomainEvent $domainEvent)
        {
            $this->recordedEvents[] = $domainEvent;
        }

        protected function applyThat(DomainEvent $domainEvent)
        {
            $modifier = 'apply' . get_class($domainEvent);

            $this->$modifier($domainEvent);
        }

        protected function publishThat(DomainEvent $domainEvent)
        {
            PublishingEvent::getInstance()->publish($domainEvent);
        }
    }
}