<?

// $cats = array_map(function($r) {
// 	return $r['ct_category_id'];
// }, (array) $website->categories);

// if (in_array($ct_category_id, $cats)) {
	// redirect if website's sitemap is not one of the following
	$resellerURL->sitemapCheck(array(
	    'markets-categories'
	));
// }

// set the criteria for this page
$event_criteria = array(
    'market_id' => $p->vars['market_id'],
    'ct_category_id' => $p->vars['ct_category_id'],
    'upcoming' => true,
    'status' => 'A'
);

// set the title for this page
$p->title = aql::value('market.name',$market_id)
    . ' ' . aql::value('ct_category.name',$ct_category_id);

if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');