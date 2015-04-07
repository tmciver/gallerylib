<?php namespace GalleryLib\Media;

use GalleryLib\Core\EventBus;
use GalleryLib\Events\PhotoWasAdded;

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
