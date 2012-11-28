<?php
$photog_event =  new photog_event($this->queryfolders[0]);

$this->breadcrumb = array( 'Home' => $resellerURL->market_url,
                        'Photos' => '/photos',
                        $photog_event->title => NULL);

$width = 105;
$height = 94;

$vf = vf::getFolder($photog_event->media_vfolder_id,-1);

//SET SESSION WITH PHOTO INFO
$_SESSION['photos_item'] = NULL;
$_SESSION['photos_item']['photog_event_ide'] = $this->queryfolders[0];
foreach ($vf->items as $key=>$vf_item) {
    if(is_array($vf_item)) {
        $item_id = $vf_item['_id'];
    } else {
        $item_id = $vf_item->id;
    }
     $_SESSION['photos_item']['image'][$key] = $item_id;
}

$this->title = $photog_event->title;

$this->template('website', 'top');
?>

<h1 class="title"><?=$this->seo['h1']?$this->seo['h1']:$this->title?></h1>
<div id="h1_blurb"><?=$this->seo['h1_blurb']?></div>

<div id="photo-album-container">
    <div id="album-grid">
<?
    $item_img_offset = 0;
    foreach ($_SESSION['photos_item']['image'] as $key=>$image) {
        $img = vf::getItem($image,array('width'=>$width,'height'=>$height,'crop'=>true));
        if (is_array($img)) {
            $image_id = $img['_id'];
        } else {
            $image_id = $img->id;
        }
?>
        <a href="/photos/<?=$_SESSION['photos_item']['photog_event_ide']?>/<?=$image_id?>">
            <?=$img->html?>
        </a>
<?
    }
?>
    </div>
</div>
<?
$this->template('website', 'bottom');