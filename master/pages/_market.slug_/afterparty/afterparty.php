<?

$event_criteria = array(
	'upcoming' => true,
	'status' => 'A',
	'afterparty' => true
);

if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');