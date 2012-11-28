<?
// Redirect if an old url
if (decrypt($p->queryfolders[1],'ct_event')) {
	 $o = new ct_event(decrypt($p->queryfolders[1],'ct_event'));
	 redirect('/events/'.$o->slug);
}

// redirect if applicable
switch ( $website->getField('sitemap_type') ) {

    case 'markets':
        break;

    case 'markets-holidays':
    case 'markets-categories':
        redirect("/{$p->vars['market_slug']}/{$website->default_category}");
        break;
    case 'categories':
    case 'holidays':
        redirect("/{$website->default_category}");
        break;
    default:
        redirect('/');
}


// set the criteria for this page
$event_criteria = array(
    'market_id' => $p->vars['market_id'],
    'upcoming' => true,
    'status' => 'A'
);


// display the event(s)
if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');