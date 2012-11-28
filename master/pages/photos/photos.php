<?php
$sidebar = "ad,facebook";
$this->tab = 'photos';

if (is_numeric($this->queryfolders[0]) || !$this->queryfolders[0] ) {
	include "pages/photos/includes/listing.php";
} elseif (is_numeric(decrypt($this->queryfolders[0],'photog_event')) && $this->queryfolders[1] ) {
	include "pages/photos/includes/photo.php";
} elseif(is_numeric(decrypt($this->queryfolders[0],'photog_event')) ) {
	include "pages/photos/includes/album.php";
} else {
	include "pages/photos/includes/listing.php";
}