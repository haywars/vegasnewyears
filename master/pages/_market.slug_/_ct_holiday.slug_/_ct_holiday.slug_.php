<?

// redirect if website's sitemap is not one of the following
$resellerURL->sitemapCheck(array(
    'markets-holidays'
));

// set the criteria for this page
$event_criteria = array(
    'market_id' => $market_id,
    'ct_holiday_id' => $ct_holiday_id,
    'upcoming' => true,
    'status' => 'A'
);

// set the title for this page
$p->title = aql::value('market.name',$market_id)
    . ' ' . aql::value('ct_holiday.name',$ct_holiday_id);

// display the event(s)
if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');