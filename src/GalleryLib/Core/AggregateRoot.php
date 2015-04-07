<?php namespace GalleryLib\Core;

abstract class AggregateRoot implements Identifiable, GeneratesEvents, BuiltFromEvents {

    private $uuid;
    private $eventBus;

    public function __construct($uuid, EventBus $eventBus) {
	$this->uuid = $uuid;
	$this->eventBus = $eventBus;
    }

    public function getId() {
	return $this->uuid;
    }

    public function recordThat(Event $event) {
	$this->eventBus->publish($event);
	$this->apply($event);
    }

    public function apply(Event $event) {
	get_class($event);
	$eventClassName = (new \ReflectionClass($event))->getShortName();
	$method = 'apply' . $eventClassName;
	$this->$method($event);
    }
}

?>
