<?
// set the criteria for this page
$event_criteria = array(
    'market_id' => $this->vars['market_id'],
    'is_barcrawl' => true,
    'upcoming' => true,
    'status' => 'A'
);

$this->tab = 'barcrawl';

// set the title for this page
$p->title = $this->vars['market_name'].'  Bar Crawls';

if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');