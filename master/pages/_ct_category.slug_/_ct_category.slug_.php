<?



// if (in_array($ct_category_id, $cats)) {
	// redirect if website's sitemap is not one of the following
	$resellerURL->sitemapCheck(array(
	    'categories'
	));
// }

// set the criteria for this page
$event_criteria = array(
    'ct_category_id' => $p->vars['ct_category_id'],
    'upcoming' => true,
    'status' => 'A'
);

// set the title for this page
$p->title = aql::value('ct_category.name',$ct_category_id);

if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');