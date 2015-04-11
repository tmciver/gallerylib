<?php namespace Tmciver\GalleryLib\Media;

use Tmciver\GalleryLib\Core\EventBus;
use Tmciver\GalleryLib\Core\AggregateRoot;

abstract class Media extends AggregateRoot {

    protected $filePath;

    public function __construct($filePath, $uuid, EventBus $eventBus) {
	parent::__construct($uuid, $eventBus);
	$this->filePath = $filePath;
    }
}

?>
