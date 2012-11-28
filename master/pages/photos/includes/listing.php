<?php
$this->title = photog_event::getListingNameByWebsite($website, $this);

if(!$this->breadcrumb) {
    $this->breadcrumb = array(
        'Home' => $resellerURL->market_url,
        $this->title => ''
    );
}

$this->template('website', 'top');


if($this->vars['market_id']) {
    $params['market_id'] = $this->vars['market_id'];
}

$albums = photog_event::getPhotosByWebsite($website, $params);
$grid = new array_pagination($albums,array( 
    'default_limit' => 10
));

if ($grid->rs) {

?>
    <div style="overflow:hidden;" class="h1_container">
        <h1 style="float:left;"><?=$this->seo['h1']?$this->seo['h1']:$this->title?></h1>
    </div>
    <div id="h1_blurb photo_listing_blurb"><?=$this->seo['h1_blurb']?></div>

    <div class="subcontent">
        <div class="photo-strip-container">
<?
        foreach ($grid->rs as $photog_event_id) {
            $photog_event = new photog_event($photog_event_id);
?>
                <h3 class="altgoth">
                    <a href="/photos/<?=$photog_event->getIDE()?>"><?=$photog_event->title?></a>
                </h3>
<?
            include ('photo-strip.php');
        }
?>
        </div>
<?
        $grid->pages();
?>
    </div>

<?
} else {
?>
    <p>There are no photos for this city.</p>
<?
}

$this->template('website', 'bottom');   