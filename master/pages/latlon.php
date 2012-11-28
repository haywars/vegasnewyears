<?

// redirect if website's sitemap is not one of the following


$p->page_sidebar = 'no_sidebar';

$p->breadcrumb = array( 'Home' => '/',
						$p->var['market_name'].' Map' => NULL);
$p->js[]='http://maps.google.com/maps/api/js?sensor=false&language=en';


$vars = array('market_id' => $market_id,
				'ct_promoter_website_id' => $website->ct_promoter_website_id,
				'status' => 'A',
				'upcoming' =>true,
				'market_id' => 1
				 );
				
$listing = new EventListing($vars);
$listing->usePageFilter($p)
		->useWebsiteFilter($website)
		->getList();



$p->title = $p->vars['market_name']." Party Map";


$p->template('website', 'top');	

?>

<h1><?=$p->seo['h1']?$p->seo['h1']:$p->title?></h1>
<div id="h1_blurb"><?=$p->seo['h1_blurb']?></div>

<div id="map"></div>
<?
foreach($listing->ct_event_ids as $r) {
	$event = new ct_event($r);
	$data = eventListing::prepareEventData($event);
	
	$f_date = $event->ct_contract->firstUpcomingDate();
	if ($event->venue->longitude && $event->venue->latitude) {
		$venues[$event->venue->venue_id]['address1'] = $event->venue->address1;
		$venues[$event->venue->venue_id]['address2'] = $event->venue->city.", ".$event->venue->state." ".$event->venue->zip;
		$venues[$event->venue->venue_id]['latitude'] = $event->venue->latitude;
		$venues[$event->venue->venue_id]['longitude'] = $event->venue->longitude;
		$venues[$event->venue->venue_id]['venue_name'] = $event->venue->venue_name;
		$venues[$event->venue->venue_id]['events'][] = array('name' => $data['title'],
															'link' => $data['info_href'],
															'f_date' => $f_date['start_date'],
															'l_date' => $event->ct_contract->dates[sizeof($event->ct_contract->dates)-1]->start_date);
	}
}
?>
	<div id="map_popups">
<?

foreach ($venues as $key=>$v) {
	$lat_sum += $v['latitude'];
}
$lat_average = $lat_sum/sizeof($venues);
echo $lat_average;

foreach ($venues as $key=>$v) {
	$lat_diff_sum += pow(($v['latitude']-$lat_average),2);
}
$lat_dev =  sqrt($lat_diff_sum/sizeof($venues));
$lat_high = $lat_average + $lat_dev*3;
$lat_low = $lat_average - $lat_dev*3;











foreach ($venues as $key=>$v) {
	if($v['latitude'] < $lat_high && $v['latitude'] > $lat_low) {
		if(true) {
		$img = vf::getRandomItem('/venues/'.$key,100,75,TRUE);
		?>
		   
			<div style="display:none;" address="<?=$v['address1']?> <?=$v['address2']?>" class="venue_info" lat="<?=$v['latitude']?>" lng="<?=$v['longitude']?>" venue_name="<?=$v['venue_name']?>">
				<div style="margin:10px;">
					<div style="overflow:hidden;margin-bottom:5px;">
						<div style="float:left;margin-right:10px;"><?=$img->html?></div>
						<div style="float:left;max-width:200px;">
							<div style="font-size:150%;margin-bottom:5px;"><?=$v['venue_name']?></div>
							<div><?=$v['address1']?></div>
							<div><?=$v['address2']?></div>
						</div>
					</div>
					<div>
						<table>
						<?
						foreach ($v['events'] as $event) {
							echo '<tr>';
							if ($event['f_date'] && $event['l_date'] && $event['f_date']!=$event['l_date']) { ?> 
								<td><a href="<?=$event['link']?>"><?=date('l, F j, Y',strtotime($event['f_date']))?> - <?=date('l, F j, Y',strtotime($event['l_date']))?> &raquo;</a></td>
							<? } else { ?>
								<td><a href="<?=$event['link']?>"><?=date('l, F j, Y',strtotime($event['l_date']))?> &raquo;</a></td>
							<? } ?>
							<!--<td style="padding-left:10px;"><a href="<?=$event['link']?>"><?=$event['name']?></a></td>-->
							<?
							echo '</tr>';
						}
						?>
						</table>
					</div>
				</div>
			</div>
		<?
		
		}
	}
}
?>
	</div>
<?
$p->template('website', 'bottom');	


?>