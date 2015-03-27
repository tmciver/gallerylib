<?php

namespace GalleryLib\Core;

abstract class AggregateRoot implements Identifiable {

    private $uuid;

    public function __construct(string $uuid) {
	$this->uuid = $uuid;
    }

    public function getId() {
	return $this->uuid;
    }
}

?>
