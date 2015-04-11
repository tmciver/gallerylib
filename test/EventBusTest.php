<?php

use Tmciver\GalleryLib\Core\Event;
use Tmciver\GalleryLib\Core\EventListener;
use Tmciver\GalleryLib\Core\EventBus;

class TestEvent implements Event {
    public function getAggregateId() {
	return "1";
    }
}

class EventBusTestEventListener implements EventListener {

    private $handled = false;

    public function handle($event) {
	$this->handled = $event instanceof TestEvent;
    }

    public function handled() {
	return $this->handled;
    }
}

class EventBusTest extends PHPUnit_Framework_TestCase {

    public function testEventPublish() {
	$eventBus = new EventBus();
	$event = new TestEvent();
	$listener = new EventBusTestEventListener();
	$eventBus->subscribe($listener);
	$eventBus->publish($event);
	$this->assertTrue($listener->handled());
    }
    
}

?>
