<?

$qs = qs_remove('refresh');
$uri = $p->urlpath . $qs;
$key = 'website-' . $website->ct_promoter_website_id . '-' . $uri;
while ( $p->cache($key,'3 hours') ) {


if (!$event_criteria) {
	$event_criteria = array(
		'upcoming' => true,
		'status' => 'A',
	);
}
$eventListing = new EventListing($event_criteria);
$eventListing->useWebsiteFilter($website);
$eventListing->setSearch($_GET['q']);
$event_criteria = array_merge( $event_criteria, $eventListing->vars );
$events = ct_event::getList($event_criteria);
?>
<style type="text/css">
#embed_container {
	font-family:Arial,Helvetica,sans-serif;
	font-size:12px;
}
.event_listings {
	margin:0px;
	padding:0px;
}
a {
	color:#000;
	text-decoration:none;
}
p {
	margin:0px;
	padding:0px;
}
.event_row {
	list-style:none;
    padding: 2px;
	overflow:hidden;
	border:1px solid #ccc;
	margin:3px 3px;
}
.event_row:hover {
	background-color:#dde7ff;
}

.venue_description a{
	display:block;
}
.venue_thumb {
	float:left;
	*margin-top: 1px;
	float:left;
}
.venue_description {
	margin-left:70px;
	margin-right:90px;
}
.venue_name{
	font-size:22px;
	
}
.venue_name_modifier{
	font-size:14px;
}
.venue_address{
font-size:11px;
}
.event_description{
 font-size:10px;
}

a.info_button {
	color: #fff;
	background: url('http://<?=$_SERVER['HTTP_HOST']?>/lib/layouts/left-nav-standard/images/button-tile.jpg') repeat-x;
	font-size:18px;
	padding:4px;
}
 a.info_button:hover {
	background: url('http://<?=$_SERVER['HTTP_HOST']?>/lib/layouts/left-nav-standard/images/button-tile-hover.jpg') repeat-x;
	color: #fff;
}
.small_info_details {
	float:right;
	margin-top:22px;
	width:85px;
	margin-right:5px;
}


</style>
<img src="http://<?=$_SERVER['HTTP_HOST']?>/lib/layouts/left-nav-standard/images/button-tile-hover.jpg" style="display:none;" />
<div id="embed_container">
	<ul class="event_listings">
	<?
	if ($events) {
		foreach ($events as $r) {
		    $o = new ct_event($r, null, null, array(
		    	'refresh_sub_models' => false
			));
			if ($o->venue_id) {
				$o->venue = new venue($o->venue_id);
			}
		    $data = eventListing::prepareEventData($o);
			$media_ids = $o->getMediaIDs(5);
			
			$conf = array('width' => 65, 'height' => 65, 'crop' => true, 'gravity' => 'center');
			$img = vf::getItem($media_ids[0], $conf);
			if ($img->errors && $_GET['krumo'])
				krumo($img);
			$url = 'http://'.$website->domain.$data['info_href'];
			
			foreach ($media_ids as $mid) {
				$img = vf::getItem($mid, $conf);
				if (!$img->errors)
					break;
			}
			
			?>
			<li class="event_row">
				<div class="venue_box">
					<div class="venue_thumb">
						<a href="<?=$url?>">
                        <img src="<?=$img->src?>" height="65" width="65" style="background-color:#ccc;" class="venue_thumb" />
						</a>
                    </div>	
                    			<div class="small_info_details">
						<a href="<?=$url?>" class="info_button" >More Info</a>
					</div>
					<div class="venue_description">
						<a href="<?=$url?>" class="venue_name" ><?=$o->venue['venue_name']?>&nbsp;<span class="venue_name_modifier"><?=$o->venue['name_modifier']?></span></a>
						 
						<a href="<?=$url?>" class="venue_address"><?=$o->venue->venue_address?></a>
						<a href="<?=$url?>" class="event_description"><?=$o->event_name?></a>
					</div>
				
				</div>
				
				
			</li>		
			<?
		}//foreach
	}//end if $events exists
	?>
		</ul>
</div>


<?
}
?>

