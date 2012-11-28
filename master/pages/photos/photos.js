function photoStripNav(ide,img_offset, market) {
	$('#photo_strip_'+ide).html('<div align="center"><img style="display:block;margin:35px auto;" src="/images/loading.gif"></div>');
	$.get('/photos/includes/photo-strip/?img_offset='+img_offset+'&ide='+ide, function(data) {
		$('#photo_strip_'+ide).replaceWith(data);
	});
}