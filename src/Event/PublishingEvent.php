<?php

namespace DigitalClosuxe\Business\Profile\Event
{
    final class PublishingEvent
    {
        static public function getInstance()
        {
            return new class{
                public function publish($domainEvent){}
            };
        }
    }
}