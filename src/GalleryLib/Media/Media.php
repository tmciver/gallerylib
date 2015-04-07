<?php namespace GalleryLib\Media;

use GalleryLib\Core\EventBus;
use GalleryLib\Core\AggregateRoot;

abstract class Media extends AggregateRoot {

    protected $filePath;

    public function __construct($filePath, $uuid, EventBus $eventBus) {
	parent::__construct($uuid, $eventBus);
	$this->filePath = $filePath;
    }
}

?>
