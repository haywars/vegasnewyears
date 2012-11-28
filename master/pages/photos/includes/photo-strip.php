<?php
if (!$photog_event) { 
	$photog_event = new photog_event($_GET['ide']);
}
$strip_limit = 6;

$params = array(
	'limit' => $strip_limit,
	'offset' => $_GET['img_offset']
);

$vf = vf::getFolder($photog_event->media_vfolder_id, $params);

if (!$vf->items) {
	$params['offset'] = 0;
	$vf = vf::getFolder($media_vfolder_id, $params);
}

$prev = $_GET['img_offset'] - $strip_limit;
if ($prev<0) {
	$prev = 0;
}

$next = $_GET['img_offset'] + $strip_limit;

$width = 100;
$height = 94;
?>

<div class="photo-strip-body" id="photo_strip_<?=$photog_event->getIDE()?>">
	<a class="photo-strip-left" href="javascript:photoStripNav('<?=$photog_event->getIde()?>','<?=$prev?>', '<?=$market_slug?>');">left</a>
<?
	if ($vf->items) {
		foreach ($vf->items as $i => $image) {
			if (is_array($image)) {
				$image_id = $image['_id'];
			} else {
				$image_id = $image->id;
			}
			$img = vf::getItem($image_id,$width,$height,true);
?>
	            <a href="/photos/<?=$photog_event->getIDE()?>/<?=$img->id?>"><?= $img->html ?></a>
<?
	        if ($i==6) break;
		}//foreach
	}
?>
	<a class="photo-strip-right" href="javascript:photoStripNav('<?=$photog_event->getIde()?>','<?=$next?>', '<?=$market_slug?>');">right</a>
</div>

