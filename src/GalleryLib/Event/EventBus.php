<?php

namespace GalleryLib\Event;

class EventBus {
    private $listeners;

    public function publish(Event $event) {
	foreach ($this->listeners as $listener) {
	    $listener->handle($event);
	}
    }

    public function subscribe(EventListener $listener) {
	$this->listeners[] = $listener;
    }

    public function unsubscribe(EventListener $listener) {
	if (($key = array_search($listener, $this->listeners)) !== false) {
	    unset($this->listeners[$key]);
	}
    }
}

?>
