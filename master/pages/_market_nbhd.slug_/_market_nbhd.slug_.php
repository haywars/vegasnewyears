<?

$event_criteria = array(
	'upcoming' => true,
	'status' => 'A',
	'market_nbhd_id' => $market_nbhd_id
);


if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');