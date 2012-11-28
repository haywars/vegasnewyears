<?
$vars = array(
	'upcoming' => true,
	'status' => 'A'
);

if (strstr($p->queryfolders[0],'plus'))
	$vars['ticket_price_range']['low'] = str_replace('plus','',strstr($p->queryfolders[0]));
elseif (strstr($p->queryfolders[0],'under'))
	$vars['ticket_price_range']['high'] = str_replace('under','',strstr($p->queryfolders[0]));
elseif (strstr($p->queryfolders[0],'under')) {
	$pieces = explode('-',$p->queryfolders[0]);
	$vars['ticket_price_range']['low'] = $pieces[0];
	$vars['ticket_price_range']['high'] = $pieces[1];
}


if($p->queryfolders[0] == 'embed')
	include('pages/embed/embed.php');
else
	include('includes/events-listing.php');