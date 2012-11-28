<?
$markets = $website->getMarkets();
//krumo($markets);
$url = 'http://'.$website->domain;
$qs = '?aff='.encrypt(5230,'ct_promoter');
$p->template('html5', 'top');
?>

<div id="fb-root"></div>

<script src="http://connect.facebook.net/en_US/all.js"></script>
<script type="text/javascript">// <![CDATA[
FB.init({
	appId : 'YOUR ID HERE',
	status : true, // check login status
	cookie : true, // enable cookies to allow the server to access the session
	xfbml : true // parse XFBML
});
// ]]></script>
<script type="text/javascript">// <![CDATA[
	window.fbAsyncInit = function() {
		FB.Canvas.setAutoResize();
	};
// ]]></script>

<style type="text/css">
	html,body {
		<? if($_SERVER['HTTP_HOST'] != 'cravetix.dev'){ ?>overflow:hidden;<? } ?>
	}
	#body {
		width:520px;
	}
		#header {
			background-image:url('/pages/facebook/newyearseve/images/header.jpg');
			background-repeat:no-repeat;
			width:520px;
			height:70px;
			display:block;
		}
		#sub-header {
			border-top:1px solid #333;
			border-bottom:1px solid #333;
			background-color:#000;
			margin-left:5px;
			padding:6px;
			overflow:hidden
		}
			#header-desc {
				float:left;
				width:285px;
				color:#fff;
				font-size:34px;
				text-align:center;
				margin-top:7px;
			}
		#content {
			margin-left:5px;
		}
			#logo {
				overflow:hidden;
			}
				#logo img {
					float:left;
				}
			#events {
				color:#fff;
				background-color:#000;
			}
				h3 {
					font-weight:bold;
					font-size:22px;
					padding:4px 20px 4px 10px;
					background-image:url('/pages/facebook/newyearseve/images/bluetile.jpg');
					background-repeat:repeat-x;
				}
					#events h3 {
						cursor:pointer;
					}
					.category {
						color:#B9A487;
						font-weight:normal;
					}
					.info {
						font-size:10px;
						float:right;
						margin-top:6px;
					}
				.event-container {
					padding:0px 3px;
				}
					.event {
						padding:6px;
						border-bottom:1px solid #333;
						overflow:hidden;
					}
					.event:hover {
						background-color:#0c0c0c;
					}
						.event-info {
							width:340px;
							margin-right:15px;
							float:left;
							font-size:22px;
							
						}
						  
						  .event-info > a {
						  	overflow:hidden;
							display:block;
							text-decoration:none;
						  }
							.venue {
								
							}
								.venue {
									color:#B9A487;
									text-decoration:none;
								}
								.venue span {
									font-size:16px;
								}
							.open-bar {
								font-size:16px;
								font-weight:bold;
							}
								.open-bar {
									color:#fff;
									text-decoration:none;
								}
								.open-bar .ob_time {
									/*font-size:10px;*/
									font-weight:normal;
								}
								
						.price {
							width:40px;
							vertical-align:middle;
							text-align:center;
						}
						.info-button {
							height:31px;
							width:101px;
							background-image:url('/pages/facebook/newyearseve/images/buy-button.jpg');
							background-repeat:no-repeat;
							background-position:center center;
							display:block;
						}
					.see_all {
						font-size:12px;
						padding:8px 10px;
						text-align:right;
						display:block;
						color:#CCC;
						font-weight:bold;
						text-transform:uppercase;
						text-decoration:none;
					}
						.see_all span {
							color:#fff;
						}
						
				
				#featured h3 {
					background-image:url('/pages/facebook/newyearseve/images/gold-tile.jpg');
					color:#000;
				}
				
				
				
			#auto-slideshow-container {
				width:490px;
			}
				#auto-slideshow {
					
				}
					#as_prev, #as_next {
						background-position:center center;
						background-repeat:no-repeat;
						background-color:#000;
						height:250px;
						width:20px;
						float:left;
					}
					#as_prev {
						background-image:url('/pages/facebook/newyearseve/images/facebook-left-arrow.jpg')
					}
					#as_next {
						background-image:url('/pages/facebook/newyearseve/images/facebook-right-arrow.jpg')
					}
				#slide-container {
					float:left;
					position:relative;
					height:250px;
					width:450px;
					overflow:hidden;
				}
					#slide {
						background-color:#000;
						width:1800px;
						position:absolute;
						float:left;
					}
						#slide .cell {
							height:250px;
							width:450px;
							float:left;
						}
						.one{background-color:red;}
						.two{background-color:green;}	
						.three{background-color:yellow;}
						.four{background-color:blue;}	
				#timer-seconds {display:block;}
				#timer {display:block;}
				#distance{diaplay:block;}
				
				.red {
					color:red;
					display:block;
					text-align:center;
				}
</style>
<div id="body">
	<a id="header" href="<?=$url?><?=$qs?>" target="_blank"></a>
    <div id="sub-header">
        <div class="countdown">
            <p class="top">NEW YEAR'S <?=date('Y')+1?> COUNTDOWN</p>
            <p class="counter">
                <span id="NY_D1">0</span>
                <span id="NY_D2">0</span>	
                <span id="NY_D3" class="gap">0</span>
                <span id="NY_H1">0</span>
                <span id="NY_H2" class="gap">0</span>
                <span id="NY_M1">0</span>
                <span id="NY_M2" class="gap">0</span>
                <span id="NY_S1">0</span>
                <span id="NY_S2">0</span>
            </p>
            <p class="legend">
                <span class="day">day</span>
                <span class="hr">hr</span>
                <span class="min">min</span>
                <span class="sec">sec</span>
            </p>
            <script type="text/javascript">
            	$(document).ready(function() {
					setInterval('countdown(2012,1, 1, 0, "NY_")', 1000);
				
					//setInterval('timer()' ,1000);
				});
				
				
								
                $(document).ready(function() {
					$('#events h3').live("click", function(){
						var targetElement = $(this).next();
						targetElement.slideToggle();
						targetElement.siblings('.event-container').slideUp();
					});
					
					$('.info-button').each(function(index) {
						$(this).css('height',$(this).parent('td').css('height'));
					});
					
					$('.event-container').hide()
					$('#first.event-container').show()
					
					/*
					$('#auto-slideshow').mouseover(function() {
						$('#timer').html($('#timer-seconds').html());
					});
					
					
					$('#as_next').live("click", function(){
						//alert('hi');
						slide_over('next');
					});
					$('#as_prev').live("click", function(){
						slide_over('prev');
					});
					*/
				});
				/*
				function timer() {
					if ($('#timer').html()==0) {
						$('#timer').html($('#timer-seconds').html());
						slide_over('next');
					}
					$('#timer').html($('#timer').html()-1);
				}
				
				
				function slide_over(direction) {
					var distance = getdigits($('.cell').css('width'))
					if (direction == 'prev') {
						if (getdigits($('#slide').css('left')) <= '0' ) {
							distance = '-='+(getdigits($('#slide').css('width')) - distance);
						} else
							distance = '+='+distance;
					} else {
						distance = '-='+distance;
					}
					$('#timer').html($('#timer-seconds').html());
					$('#slide').animate({
						left: distance,
					}, 1000, function() {
					
						// Animation complete.
  					});
					$('#distance').html(distance)
					//alert(direction+' '+distance);
					
				}
				
				function getdigits (s) {
					return s.replace (/[^\d]/g, "");
				}
				*/
				
            </script>
        </div>
        <div id="header-desc"><div style="font-size:10px;">INFO &amp; TICKETS BY PHONE</div><?=$website->displayPhoneNumber()?></div>
        
    </div>
    
    <div id="content">
    	<div id="logo">
        	<?
			/*$params = array('status' => 'A',
				'upcoming' => true,
				'limit' => 8,
				'market_id' => 1,
				'ct_category_id' => 1,
				'order_by' => 'ct_contract_date.start_date asc, random()',
				'seller__ct_promoter_id'=>$website->ct_promoter_id
			);
			$listing = ct_event::getList($params);
			foreach ($listing as $event_id) {
				$o = new ct_event($event_id);
				$flyer_id = $o->getFlyer();
				echo $flyer_id."<br />";
			}*/
			/*$flyers = array('4ee69ea6f10809e1320006f7','4ed6931d5266fcb15900006a','4ee002be90ab151f79000a51','4ede940b90ab153f73000568');
			foreach ($flyers as $flyer_id) {
				$flyer = vf::getItem($flyer_id, array('width' => '200px')); ?>
				<img style="display:none;" src="<?=$flyer->src?>"/>
				<?
			} */
			?>
          
    		<a href="<?=$url?>/newyork/newyearseve" target="_blank"><img src="/pages/facebook/newyearseve/images/nye2012.jpg" /></a>
		<? /*
        <div id="auto-slideshow-container">
            <div id="as_prev"></div>
            <div id="auto-slideshow">
            	<div id="slide-container">
                    <div id="slide" style="left:0px;">
                        <div class="cell one">d</div>
                        <div class="cell two">d</div>
                        <div class="cell three">d</div>
                        <div class="cell four">d</div>
                    </div>
            	</div>
            </div>
            <div id="as_next"></div>
        </div>
        	<div id="ss_status">ready</div>        
            <div id="timer-seconds">2</div>
            <div id="timer">2</div>
            <div id="distance"></div>
    	*/ ?>
        </div>
        <div id="events">
        	<?
		while ( $p->cache('FB-newyearseve','3 hours') ) {
		
			foreach($markets as $key => $market) { //krumo($market);
				?>
                <h3><?=strtoupper($market['market_name'])?> <span class="category">NEW YEARS EVE</span><span class="info">view events &raquo;</span></h3>
            	<div class="event-container" <?=$key==0?'id="first"':''?>>

				<?
				if($_SERVER['HTTP_HOST'] == 'cravetix.dev') $limit = 6;
				else $limit = 10;
				
                $params = array('status' => 'A',
                    'upcoming' => true,
                    'limit' => $limit,
                    'market_id' => $market['market_id'],
                    'ct_category_id' => 1,
                    //'order_by' => 'ct_contract_date.start_date asc, random()',
                    'seller__ct_promoter_id'=>$website->ct_promoter_id
                );
                
				$eventListing = new EventListing($params);
				$eventListing->useWebsiteFilter($website);
				$event_criteria = array_merge( $params, $eventListing->vars );
				
				
				$listing = ct_event::getList($event_criteria);
                //krumo($listing);
                
                foreach($listing as $event_id) {
                    $o = new ct_event($event_id);
					$event = new event($o, $website);
					//krumo($event());
                    $ga = $o->getGA();
                   //krumo($event);
                    if ($event->open_bar) {
                        foreach ($event->open_bar as $key2 => $bar) {
                            if ($temp_len < $bar['hours'] || !$temp_len) {
                                $temp_len = $duration[$key2];
                                $high_id = $key2;

                            }
                        }
                    }
					?>
					<div class="event">
                    	<table><tr>
						<td><div class="event-info">
                        	<a href="<?=$url?>/events/<?=$o->slug?><?=$qs?>" target="_blank">
							<div class="venue"><?=$o->venue->venue_name?> <span><?=str_replace(' ','&nbsp;',$o->venue->name_modifier)?></span></div>
                            <? if($event->open_bar[0]) { ?>
							<div class="open-bar"><?=$event->open_bar[$high_id]['hours']?> Hour Premium Open Bar <span class="ob_time"><?=$event->open_bar[$high_id]['start_time']?> - <?=$event->open_bar[$high_id]['end_time']?></span></div>
							<? }elseif ($ga['price']['price']){ ?>
                            <div class="open-bar">General Admission</div>
                            <? } ?>
                            <? //krumo($event()); ?>
                        	</a>
                        </div></td>
                        
                        	<td class="price"> <? if($event->tickets[0]['status']=='S') { ?><span class="red">SOLD<br />OUT</span> <? } elseif($ga['price']['price']){ ?><span style="font-size:8px;">from</span><br />$<?=$ga['price']['price']?><? } ?></td>
                        	<td><a href="<?=$url?>/events/<?=$o->slug?><?=$qs?>" class="info-button" target="_blank"></a></td>
						</tr></table>
                    </div>
					<?
				}
				?>
                	<a class="see_all" href="<?=$url?>/<?=$market['market_slug']?>/newyearseve<?=$qs?>" target="_blank">See all <span><?=$market['market_name']?></span> New Year's Eve Events &raquo;</a>
                </div>
             <?
			}
		}
			?>
            	
            
        </div>
        <div id="featured">
            <h3>SPECIAL NYC EVENT</h3>
            <iframe width="515" height="290" src="http://www.youtube.com/embed/y7eHe3NHKJk" frameborder="0" allowfullscreen></iframe>
        </div>
    </div>
</div>

<?
$p->template('html5', 'bottom');