<?

// redirect if website's sitemap is not one of the following
$resellerURL->sitemapCheck(array(
    'markets-categories',
));


$event_criteria = array(
	'ct_category_id' => $p->vars['ct_category_id'],
	'market_id' => $p->vars['market_id'],
	'archive' => true,
	'status' => 'A'
);

$year = $p->queryfolders[0];

if (!is_numeric($year)) $year = null;

$event_criteria['year'] = $year;

include('includes/events-listing.php');