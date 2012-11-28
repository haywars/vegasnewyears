<?

$event_criteria = array(
	'upcoming' => true,
	'status' => 'A',
	'entry_after_time' => '24:30'
);

if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');