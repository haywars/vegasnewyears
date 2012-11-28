<?
$p->title = 'Frequently Asked Questions';

elapsed('template start');

$p->template('website', 'top');

elapsed('template');


$faq_category = faq::$faq_category;
?>


<h1 class="univers"><?=$p->title?></h1>
<div class="subcontent-faq subcontent">
<? 
$aql = 	"
			faq {
				answer,
				faq_category,
				faq,
				ct_category_id,
				order by faq_category, iorder, faq 
			}
		";
$cataql = aql2array('cataql', $aql);
$all_fq = array();
$categories = ($website->categories) ? $website->categories : $website->getCategories();
foreach ($categories as $c) {
	$rs = aql::select($cataql, array(
		'where' => "ct_category_id = ".$c['ct_category_id']
	));
	if ($rs) $all_fq[$c['ct_category_id']] = $rs;
	else continue;
	?><div class="quick-jumps">
		<div class="qj-title"><a href="#cat_<?=$c['ct_category_ide']?>"><?=$c['ct_category_name']?></a></div>
		<ul>
		<? foreach ($rs as $r) : ?>
			<li><a href="#faq_<?=$r['faq_ide']?>"><?=$r['faq']?></a></li>
		<? endforeach; ?>
		</ul>
	</div><?
}
foreach ($categories as $c) {
	$rs = $all_fq[$c['ct_category_id']];
	
	if (!$rs) continue;
	?><h2 id="cat_<?=$c['ct_category_ide']?>"><?=$c['ct_category_name']?></h2><?
	$prev_category = null;
	foreach ($rs as $r) {

		if ($prev_category != $r['faq_category'])  {
			?><h3><?=$faq_category[$r['faq_category']]?></h3><?
			$prev_category = $r['faq_category'];
		}

		?>
			<div class="faq" id="faq_<?=$r['faq_ide']?>">
				<div class="question bottom-padding ">
					<div class="bottom-padding"><?=$r['faq']?></div>
					<a href="#main" class="small">Back To Top</a>
				</div>
				<div class="answer"><?=$r['answer']?></div>
			</div>
		<?
	}
}
?>
</div>
<?
$p->template('website', 'bottom');

// class sect
