(function($) {
    var $window = $(window);
    
    

    function checkWidth() {
        var windowsize = $window.width();
         if (windowsize > 480) {
            //if the window is greater than 767px 
           //$('div#hs-menu ul').show("fast"); 
		   //$('div#healthsystem-home').hide("fast");              
        }
        else {
            //if the window is less than 767px       
            $("#menubutton3 a").toggle(function() {
        	$("#healthsystem #uvasom_sitesearch").hide();
        	$("#healthsystem #uvasom_sitesearch").show();
   		}, function() {
        	$("#healthsystem #uvasom_sitesearch").show();
        	$("#healthsystem #uvasom_sitesearch").hide();
  		});      
        }
       if (windowsize > 767) {
            //if the window is greater than 767px 
           $('div#hs-menu ul').show("fast"); 
		   $('div#healthsystem-home').hide("fast");              
        }
        else {
            //if the window is less than 767px       
            $("#menubutton a").toggle(function() {
        	$("div#hs-menu ul").hide();
        	$("div#hs-menu ul").show();
   		}, function() {
        	$("div#hs-menu ul").show();
        	$("div#hs-menu ul").hide();
  		});      
        }
		if (windowsize > 960) {
            //if the window is greater than 940px 
           $('div#uvasom-menu ul').show("fast");             
        }
        else {
            //if the window is less than 940px       
            $('div#uvasom-menu ul').hide("fast");             
           $("#menubutton2 a").toggle(function() {
        	$("div#uvasom-menu ul").hide();
        	$("div#uvasom-menu ul").show();
    		}, function() {
        	$("div#uvasom-menu ul").show();
        	$("div#uvasom-menu ul").hide();
    		});      
        }
		/*if (windowsize > 767) {
            //if the window is greater than 767px
           $('div#uvasom_sitesearch form').show("fast");             
        }
        else {
            $('div#uvasom_sitesearch form').hide("fast");             
           //if the window is less than 767px       
            $("#searchbutton a").toggle(function() {
           $('div#uvasom_sitesearch form').hide("fast");             
           $('div#uvasom_sitesearch form').show("fast");             
    		}, function() {
           $('div#uvasom_sitesearch form').show("fast");             
           $('div#uvasom_sitesearch form').hide("fast");             
    		});      
        }*/
		
    }
    // Execute on load
    checkWidth();
    // Bind event listener
    $(window).resize(checkWidth);
    
})(jQuery);
