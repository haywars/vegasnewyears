<?

// redirect if website's sitemap is not one of the following
$resellerURL->sitemapCheck(array(
    'single-listing',
    'producer',
));


$event_criteria = array(
	'archive' => true,
	'status' => 'A'
);

$year = $p->queryfolders[0];

if (!is_numeric($year)) $year = null;

$event_criteria['year'] = $year;

include('includes/events-listing.php');