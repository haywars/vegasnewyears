$(document).ready(function() {

	$('#notify-me-form').livequery(function() {
		$(this).saveForm({
			onSuccessFn: function() {
				history.back();
			}
		});
	});

});