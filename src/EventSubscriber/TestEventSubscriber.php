<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class TestEventSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents(): array
    {
        return [
            'workflow.reproduce_bug.entered.A' => 'triggerOnWorkflowReproduceBugEnteredAEvent',
        ];
    }
    
    public function triggerOnWorkflowReproduceBugEnteredAEvent($event)
    {
        $transition = $event->getTransition();
        $marking = $event->getMarking();

        dump([
            'name' => $transition->getName(),
            'froms' => $transition->getFroms(),
            'tos' => $transition->getTos(),
            'marking' => $marking->getPlaces(),
        ]);
    }
}
