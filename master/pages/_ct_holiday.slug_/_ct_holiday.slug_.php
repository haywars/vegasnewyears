<?

// redirect if website's sitemap is not one of the following
$resellerURL->sitemapCheck(array(
    'holidays'
));

if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');