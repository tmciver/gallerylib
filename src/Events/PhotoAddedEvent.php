<?php namespace Tmciver\GalleryLib\Events;

use Tmciver\GalleryLib\Core\Event;

class PhotoWasAdded implements Event {

    private $photoId;
    private $filePath;

    public function __construct($photoId, $filePath) {
	$this->photoId = $photoId;
	$this->filePath = $filePath;
    }

    public function getAggregateId() {
	return $this->photoId;
    }

    public function getFilePath() {
	return $this->filePath;
    }
}

?>
