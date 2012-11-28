<?php

// splash page

global $website;

if ($website->splash__media_item_id) {
    $splash = vf::getItem($website->splash__media_item_id);
    if ($splash->html) {
        $html = $splash->html;
    }
}

$html .= '<div id="splash_button_text">Click To Enter Site</div>';

$first_market = reset($website->markets);
$first_market = $first_market['market_slug'];

$first_category = reset($website->categories);
$first_category = $first_category['ct_category_slug'];

switch ($website->getSitemapType()) {
    case 'categories' :
        $to_url = '/'.$first_category;
        break;
    case 'markets' :
        $to_url = '/'.$first_market;
        break;
    case 'markets-categories' :
        $to_url = '/'.$first_market.'/'.$first_category;
        break;
    case 'markets-holidays' :
        $to_url = '/'.$first_market;
        break;
    default:
        $to_url = '/events';
        break;
}

$p->title = $website->title;
$p->template('website', 'top');

?>
    <div id="splash-container">
        <a id="splash_text" href="<?=$to_url?>"><?=$html?></a>
    </div>
<?

$p->template('website', 'bottom');
