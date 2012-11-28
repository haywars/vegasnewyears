<?php
if($this->queryfolders[0] != $_SESSION['photos_item']['photog_event_ide']) {
	$vf = vf::getFolder($photog_event->media_vfolder_id,-1);
	$_SESSION['photos_item'] = NULL;
	$_SESSION['photos_item']['photog_event_ide'] = $this->queryfolders[0];
	foreach ($vf->items as $key=>$vf_item) {
		$_SESSION['photos_item']['image'][$key] = $vf_item['_id'];
	}
}