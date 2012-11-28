<?
$p->title = 'Notify Me';
$p->template('skybox', 'top');
?>
	<form method="POST" id="notify-me-form" model="ct_promoter_website_signup_notify" class="aqlForm">
		<input type="hidden" name="ct_promoter_website_ide" value="<?=$website->ct_promoter_website_ide?>" />
		<div class="bottom-padding">
			<label class="small block">First Name</label>
			<input type="text" name="fname" class="padding" />
		</div>
		<div class="bottom-padding">
			<label class="small block">Last Name</label>
			<input type="text" name="lname" class="padding" />
		</div>
		<div class="bottom-padding">
			<label class="small block">Email Address</label>
			<input type="text" name="email_address" class="padding" />
		</div>
		<div class="bottom-padding">
			<label class="small block">City</label>
			<select name="market_ide" class="padding">
			<? array_walk(market::getPrimary(), function($m) {
					?><option value="<?=$m['market_ide']?>"><?=$m['name']?></option><?
				});
			?>
			</select>
		</div>
		<div class="has-floats top-padding">
			<div class="float-right">
				<button type="submit">Notify Me!</button>
			</div>
		</div>
	</form>
<?
$p->template('skybox', 'bottom');