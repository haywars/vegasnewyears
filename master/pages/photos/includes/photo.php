<?php
$photog_event = new photog_event($this->queryfolders[0]);
$params = array(
    'width' => 600,
    'height' =>600
);
$img = vf::getItem($this->queryfolders[1],$params);

include 'populate-session.php';

$current_key = array_search($this->queryfolders[1],$_SESSION['photos_item']['image']);

$this->breadcrumb = array(
    'Home' => '/',
	'Photos' => '/photos',
	$photog_event->title => '/photos/'.$photog_event->getIDE(),
	'Photo '.$current_key => NULL
);
$this->title = $photog_event->title;
$this->template('website', 'top');
?>
<h1><?=$photog_event->title?></h1>
<div class="subcontent">
    <div class="photo_nav">
<? 
        if ($current_key != 0) { 
?>
            <a class="prev" href="/photos/<?=$this->queryfolders[0]?>/<?=$_SESSION['photos_item']['image'][$current_key-1]?>">&laquo; Previous</a>
<? 
        }
        if ($current_key < sizeof($_SESSION['photos_item']['image'])-1) { 
?>
            <a class="next" href="/photos/<?=$this->queryfolders[0]?>/<?=$_SESSION['photos_item']['image'][$current_key+1]?>">Next &raquo;</a> 
<?
        }
?>
        <a class="album" href="/photos/<?=$this->queryfolders[0]?>">Back to Album</a>
    </div>
    
    <div class="photo_container">
        <?=$img->html?>
    </div>
    
    <div class="photo_nav">
<?
        if ($current_key != 0) {
?>
            <a class="prev" href="/photos/<?=$this->queryfolders[0]?>/<?=$_SESSION['photos_item']['image'][$current_key-1]?>">&laquo; Previous</a>
<? 
        }
        if ($current_key < sizeof($_SESSION['photos_item']['image'])-1) {
?>
            <a class="next" href="/photos/<?=$this->queryfolders[0]?>/<?=$_SESSION['photos_item']['image'][$current_key+1]?>">Next &raquo;</a>
<?
        }
?>
        <a class="album" href="/photos/<?=$this->queryfolders[0]?>">Back to Album</a>
    </div>
    <div class="photo-strip-container" style="margin-top:20px;">
<?      
        $_GET['img_offset'] = $current_key;
        include 'photo-strip.php';
?>
    </div>
</div>
<?
$this->template('website', 'bottom');