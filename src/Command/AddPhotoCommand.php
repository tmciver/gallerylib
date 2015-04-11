<?php namespace Tmciver\GalleryLib\Command;

use Rhumsaa\Uuid\Uuid;

class AddPhotoCommand implements Command {

    private $filePath;

    public function __construct($filePath) {
	$this->filePath = $filePath;
    }

    public function execute() {

	// see if a photo with this file path already exists in the system; do
	// nothing if it does

	// generate a uuid using the photo file path as the 'name' parameter
	$uuid = Uuid::uuid5(Uuid::NAMESPACE_DNS, $this->filePath);

	// create the photo object.  This should cause some kind of 'photo added
	// event'

	// add it to the media repository
    }
}

?>
