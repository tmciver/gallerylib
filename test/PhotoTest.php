<?php

use Tmciver\GalleryLib\Core\Event;
use Tmciver\GalleryLib\Core\EventListener;
use Tmciver\GalleryLib\Core\EventBus;
use Tmciver\GalleryLib\Events\PhotoWasAdded;
use Tmciver\GalleryLib\Media\Photo;
use Rhumsaa\Uuid\Uuid;

class PhotoTestEventListener implements EventListener {

    private $handled = false;

    public function handle($event) {
	$this->handled = $event instanceof PhotoWasAdded;
    }

    public function handled() {
	return $this->handled;
    }
}

class PhotoTest extends PHPUnit_Framework_TestCase {

    public function testEventPublish() {
	$eventBus = new EventBus();
	$listener = new PhotoTestEventListener();
	$eventBus->subscribe($listener);
	$uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, 'photo1');
	new Photo("/some/file/path.img", $uuid->toString(), $eventBus);
	$this->assertTrue($listener->handled());
    }
}

?>
