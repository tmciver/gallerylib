<?php

use GalleryLib\Event\Event;
use GalleryLib\Event\EventListener;
use GalleryLib\Event\EventBus;

class TestEvent implements Event {}

class TestEventListener implements EventListener {

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
	$listener = new TestEventListener();
	$eventBus->subscribe($listener);
	$eventBus->publish($event);
	$this->assertTrue($listener->handled());
    }
    
}

?>
