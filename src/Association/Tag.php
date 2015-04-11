<?php

namespace Tmciver\GalleryLib\Association;

class Tag implements Associable {

    private $eventBus;

    public function __construct(EventBus $eventBus) {
	$this->eventbus = $eventBus;
    }

    public function associate(Identifiable $thing) {
	
    }
}

?>
