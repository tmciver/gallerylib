<?php

use GalleryLib\Core\Event;
use GalleryLib\Core\EventListener;
use GalleryLib\Core\EventBus;
use GalleryLib\Events\PhotoWasAdded;
use GalleryLib\Media\Photo;
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
