<?

global $website;
global $resellerURL;
global $ct_promoter_website_id;

if ($reseller_run_first) return;

$reseller_run_first = true;

# tracking
if (isset($_GET['r_google'])) $_GET['r'] = 'google';
if ($_GET['r']) {
    $cookie_lifespan = 60 * 60 * 24 * 60; # sixty days
    @setcookie('tracking_code', $_GET['r'], time()+$cookie_lifespan, '/', $cookie_domain);
}//if
# promoter tracking
if ($_GET['aff']) {
    $cookie_lifespan = 60 * 60 * 24 * 60; # sixty days
    @setcookie('ct_promoter_ide', $_GET['aff'], time()+$cookie_lifespan, '/', $cookie_domain);
}//if

$website = ct_promoter_website::makeResellerSiteByDomain();

// canonical redirect (but not if we have configured a specific domain to display)
if (!$ct_promoter_website_id
        && strtolower($_SERVER['HTTP_HOST']) != strtolower($website->domain)) {

    redirect('http://' . $website->domain . $_SERVER['REQUEST_URI']);
}

if ($website->redirect) redirect($website->redirect);

$resellerURL = new resellerURL( $website, $p );
$resellerURL->setPage();

$p->vars['seo']['website'] = call_user_func(function() use($website) {
    if ($website->website_id) return $website->website->dataToArray();
    $aql =  " website { limit 1 } ";
    $rs = aql::select($aql, array(
        'where' => array(
            "domain ilike '".$website->domain."'"
        )
    ));
    return $rs[0];
});
include('pages/cms-run-first.php');

if ($website->meta_title) {
	$p->seo['meta_title'] = $website->meta_title;
}

if ($website->meta_description) {
	$p->seo['meta_description'] = $website->meta_description;
}

if ($website->meta_keywords) {
	$p->seo['meta_keywords'] = $website->meta_keywords;
}

if ($website->meta_google_site_verification) {
	$p->seo['google_site_verification'] = $website->meta_google_site_verification;
}

if ( !$p->vars['market_id'] && $_SESSION['market_id'] ) {
    $p->vars['market_id'] = $_SESSION['market_id'];
}

if ($p->vars['market_id']) {
    $m = new market($p->vars['market_id']);
    $p->vars['market_name'] = $m->name;
    $p->vars['market_slug'] = $m->slug;
    $_SESSION['market_id'] = $p->vars['market_id'];
}

if ($p->vars['ct_category_id'])
	$p->vars['ct_category_name'] = aql::value('ct_category.name', $p->vars['ct_category_id']);
if ($p->vars['ct_holiday_id'])
	$p->vars['ct_holiday_name'] = aql::value('ct_holiday.name', $p->vars['ct_holiday_id']);
