<?php

global $sidebar, $website, $resellerURL, $myaccount_link, $dev;

//SET MARKET INFO IN THE SESSION
foreach($website->markets as $key => $mkt) {
	$mkt_id = $key;
	break;
}
if (!$_SESSION['market']['name']) {
	$_SESSION['market']['market_id'] = $website->markets[$mkt_id]['market_id'];
	$_SESSION['market']['slug'] = $website->markets[$mkt_id]['market_slug'];
	$_SESSION['market']['name'] = $website->markets[$mkt_id]['market_name'];
}
if ($p->vars['market_id'] && $p->vars['market_id'] != $_SESSION['market']['market_id']) {
	$_SESSION['market']['market_id'] = $p->vars['market_id'];
	$_SESSION['market']['slug'] = $p->vars['market_slug'];
	$_SESSION['market']['name'] = $p->vars['market_name'];
}

// include these sidebar css/js first so the css isn't appended at the end
// we avoid displaying stylized content
$this->template_sidebar = "random-box-ad";
include 'templates/website/sidebar/sidebar-css-and-js.php';

if ($template_area == 'top') {

	if ($website->generated_css) {
		$this->head[] = '<style type="text/css">' . $website->generated_css . '</style>';
	}

	$this->template_js[] = '/lib/js/jquery.corner.js';
	$this->template_js[] = '/lib/js/cufon-yui.js';
	$this->template_js[] = '/templates/nyec/includes/altgoth_400.font.js';


	$this->template('html5', 'top');

?>
<div id="container" class="has-floats">
	<header class="has-floats">
		<a id="logo" href="/"></a>
		<div id="header-box">
			<a class="header_announce" href="http://cravetickets.com/feedback" style="">TICKETS BY PHONE:  <?=$website->displayPhoneNumber()?></a>
			<div class="countdown">
<?
				$year = date('Y') + 1;
				$month = 1;
				$day = 1;
				$countdown_to_prefix = 'NY';
				$countdown_to_title = "Countdown to New Years";
?>
				<p class="top"><?=$countdown_to_title?></p>
				<p class="counter">
					<span id="<?=$countdown_to_prefix?>_D1">0</span>
					<span id="<?=$countdown_to_prefix?>_D2">0</span>
					<span id="<?=$countdown_to_prefix?>_D3"class="gap">0</span>
					<span id="<?=$countdown_to_prefix?>_H1">0</span>
					<span id="<?=$countdown_to_prefix?>_H2" class="gap">0</span>
					<span id="<?=$countdown_to_prefix?>_M1">0</span>
					<span id="<?=$countdown_to_prefix?>_M2" class="gap">0</span>
					<span id="<?=$countdown_to_prefix?>_S1">0</span>
					<span id="<?=$countdown_to_prefix?>_S2">0</span>
				</p>
				<p class="legend">
					<span class="day">day</span>
					<span class="hr">hr</span>
					<span class="min">min</span>
					<span class="sec">sec</span>
				</p>
				<script type="text/javascript">
					$(document).ready(function() {
						// initiate countdown clock
						setInterval('countdown(<?=$year?>,<?=$month?>, <?=$day?>, 0, "<?=$countdown_to_prefix?>_")', 1000);
					});
				</script>
			</div>
			<div id="header-ad">
				<div>
                    <iframe id='a1292c97' 
                        name='a1292c97'
                        src='http://ads.joonbug.com/www/delivery/afr.php?zoneid=182&amp;cb=INSERT_RANDOM_NUMBER_HERE'
                        frameborder='0'
                        scrolling='no'
                        width='260'
                        height='60'>
                        <a href='http://ads.joonbug.com/www/delivery/ck.php?n=ad24bba3&amp;cb=INSERT_RANDOM_NUMBER_HERE' 
                            target='_blank'>
                            <img src='http://ads.joonbug.com/www/delivery/avw.php?zoneid=182&amp;cb=INSERT_RANDOM_NUMBER_HERE&amp;n=ad24bba3' 
                            border='0' 
                            alt='' />
                        </a>
                    </iframe>
   				</div>
			</div>
			<ul id="mini-nav">
				<li><a href="/pickup">Pickup Info</a></li>
				<li><a href="/my-account">My Account</a></li>
				<li><a href="http://cravetickets.com/feedback">Customer Service</a></li>
				<li><a href="/track-order">Track Order</a></li>
				<li><a href="/faq">FAQ</a></li>
				<li><a style="color:#fff;font-weight:bold;" href="http://beta.cravetickets.com/signup/producer?ref_promoter=<?=$website->ct_promoter_ide?>&ref_website=<?=$website->ct_promoter_website_ide?>&ref_category=<?=encrypt($p->vars['ct_category_id'],'ct_category')?>&ref_campaign=">Post An Event</a></li>

				<? if (auth("admin:seo; admin:developer")) { ?><li><a class="cufon" id="seo" style="cursor:pointer; float:left; margin-top:2px; color: #40b3d9; text-decoration: none;	font-size: 10px;" page_path="<?=$p->page_path?>" website_ide="<?=$p->vars['seo']['website']['website_ide']?>" uri="<?=$p->uri?>">SEO</a></li><? } ?>
			</ul>
		</div>
	</header>
	<nav id="main-nav">
<?

		$nav = array(
			'Home' => $resellerURL->market_url,
			'Photos' => '/photos',
			'Times Square' => '/newyork/times-square',
			'Cruises' => '/newyork/cruise-yacht',
			'After 12:30' => $resellerURL->market_url.'after1230',
			'Dinners' => $resellerURL->market_url.'dinners',
			'Party Map' => $resellerURL->market_url.'map',
			'Blog' => '/blog'
		);

?>
        <table>
        <tr>
            <td id="<?=sizeof($website->markets)>=10?'market-sb':'market_dd'?>" class="market_button"><a class="cufon"><?=$_SESSION['market']['name']?><img src="/templates/nyec/images/down-arrow.png" /></a>
<?
		if(sizeof($website->markets)<10) {
?>
                <ul>
<?
					foreach ($website->markets as $mkt) {
						if($mkt['market_id'] == $_SESSION['market']['market_id']) continue;
?>
						<li><a href="/<?=$mkt['market_slug']?>"><?=$mkt['market_name']?></a></li>
<?
					}
?>
				</ul>
<?
		}
?>
			</td>
<?
		foreach ($nav as $k => $v) {
?>
			<td class="<?=($p->urlpath == $v)?'current bg_color_border':''?>">
				<a href="<?=$v?>" class="cufon"><?=$k?></a>
			</td>
<?
		}
?>
		</tr>
		</table>
<?
		$website->getDisplayPhone();
		if ($website->displayPhoneNumber()) {
?>
			<div class="phone cufon">TICKET INFO: <?=$website->displayPhoneNumber()?></div>
<?
		}
?>
	</nav>

	<div id="page" class="has-floats">
<?
	if( $p->page_sidebar!='no_sidebar') {
?>
		<div id="sidebar">
			<div>
				<? include 'templates/website/sidebar/sidebar.php'; ?>
			</div>
		</div>
<?
	}
?>
		<div id="content" <?=$p->page_sidebar!='no_sidebar'?'style="padding-right:320px;"':""?>>
			<div id="breadcrumb">
<?
			$format = '<a href="%s">%s</a>';
			foreach($p->breadcrumb as $key => $bc) {
				echo( ($bc) ? sprintf($format, $bc, $key) : $key );
			}
?>
			</div>

<?

} elseif ($template_area == 'bottom') {

?>
		</div>
	</div>
	<footer class="has-floats">
		<div class="has-floats">
			<div class="float-left">
				<p>&copy; <?=date('Y')?> - Powered By <a href="http://cravetickets.com">CraveTickets.com</a>. All rights reserved.</p>
				<p>
					<strong>
						<a href="http://beta.cravetickets.com/signup/reseller?ref_promoter=<?=$website->ct_promoter_ide?>&ref_website=<?=$website->ct_promoter_website_ide?>&ref_category=<?=encrypt($p->vars['ct_category_id'],'ct_category')?>&ref_campaign=">Get Your Own Ticketing Website</a> |
						<a href="<?=$myaccount_link?>">Reseller Login</a>
					</strong>
				</p>
			</div>
			<div class="float-right">
				<p>
					<strong>
						<a href="/terms-and-conditions">Terms of Service</a> | <a href="/privacy-policy">Privacy Policy</a>
					</strong>
				</p>
				<p>
<?
					global $sky_start_time;
					$sky_end_time = microtime(true);
					$elapsed_time = $sky_end_time - $sky_start_time;
					echo round($elapsed_time, 1) . 's';
?>
				</p>
			</div>
		</div>
<?
	if ($dev && FALSE) {
			echo '<div>';
			krumo($this, $website, $resellerURL);
			echo '</div>';
	}
?>
	</footer>
</div>




<!-- begin olark code --><script type='text/javascript'>/*{literal}<![CDATA[*/window.olark||(function(i){var e=window,h=document,a=e.location.protocol=="https:"?"https:":"http:",g=i.name,b="load";(function(){e[g]=function(){(c.s=c.s||[]).push(arguments)};var c=e[g]._={},f=i.methods.length; while(f--){(function(j){e[g][j]=function(){e[g]("call",j,arguments)}})(i.methods[f])} c.l=i.loader;c.i=arguments.callee;c.f=setTimeout(function(){if(c.f){(new Image).src=a+"//"+c.l.replace(".js",".png")+"&"+escape(e.location.href)}c.f=null},20000);c.p={0:+new Date};c.P=function(j){c.p[j]=new Date-c.p[0]};function d(){c.P(b);e[g](b)}e.addEventListener?e.addEventListener(b,d,false):e.attachEvent("on"+b,d); (function(){function l(j){j="head";return["<",j,"></",j,"><",z,' onl'+'oad="var d=',B,";d.getElementsByTagName('head')[0].",y,"(d.",A,"('script')).",u,"='",a,"//",c.l,"'",'"',"></",z,">"].join("")}var z="body",s=h[z];if(!s){return setTimeout(arguments.callee,100)}c.P(1);var y="appendChild",A="createElement",u="src",r=h[A]("div"),G=r[y](h[A](g)),D=h[A]("iframe"),B="document",C="domain",q;r.style.display="none";s.insertBefore(r,s.firstChild).id=g;D.frameBorder="0";D.id=g+"-loader";if(/MSIE[ ]+6/.test(navigator.userAgent)){D.src="javascript:false"} D.allowTransparency="true";G[y](D);try{D.contentWindow[B].open()}catch(F){i[C]=h[C];q="javascript:var d="+B+".open();d.domain='"+h.domain+"';";D[u]=q+"void(0);"}try{var H=D.contentWindow[B];H.write(l());H.close()}catch(E){D[u]=q+'d.write("'+l().replace(/"/g,String.fromCharCode(92)+'"')+'");d.close();'}c.P(2)})()})()})({loader:(function(a){return "static.olark.com/jsclient/loader0.js?ts="+(a?a[1]:(+new Date))})(document.cookie.match(/olarkld=([0-9]+)/)),name:"olark",methods:["configure","extend","declare","identify"]});
/* custom configuration goes here (www.olark.com/documentation) */
olark.identify('2714-566-10-9754');/*]]>{/literal}*/</script>
<!-- end olark code -->

<?
	$this->template('html5', 'bottom');
}
