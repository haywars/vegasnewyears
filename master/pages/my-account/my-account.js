$(function(){
	
	$(window).bind("message", function(e) {
	    // if (e.source != theIFrameElement.contentWindow) return;
	    try { 
	    	var message = JSON.parse(e.originalEvent.data);
	    } catch (e) { //not a postmessage message
	    	return;
	    }

		if (message.type == "location") window.location = message.data.url;	
	    //var message = e.originalEvent.data;

	    

		
	});
		

});