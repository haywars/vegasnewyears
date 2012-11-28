<?

// redirect if website's sitemap is not one of the following
$resellerURL->sitemapCheck(array(
    'categories',
    'holidays'
));


$event_criteria = array(
	'archive' => true,
	'ct_category_id' => $p->vars['ct_category_id'],
	'status' => 'A'
);

$year = $p->queryfolders[0];

if (!is_numeric($year)) $year = null;

$event_criteria['year'] = $year;

include('includes/events-listing.php');