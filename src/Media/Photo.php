<?php namespace Tmciver\GalleryLib\Media;

use Tmciver\GalleryLib\Core\EventBus;
use Tmciver\GalleryLib\Events\PhotoWasAdded;

class Photo extends Media {

    public function __construct($filePath, $uuid, EventBus $eventBus) {
	parent::__construct($filePath, $uuid, $eventBus);

	// record PhotoWasAdded event
	$this->recordThat(new PhotoWasAdded($uuid, $filePath));
    }

    protected function applyPhotoWasAdded(PhotoWasAdded $event) {
	// nothing to be done
    }
}

?>
