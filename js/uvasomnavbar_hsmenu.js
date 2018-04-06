jQuery(document).ready(function($) {
 $('div#hs-menu-link a').click(function() {
	 $('span#hs-menu-arrow').toggleClass('down');
	 $('#uvasom_megamenu').toggleClass('lower');
	 $('#site-header').toggleClass('lower');
	 //$('.slideshow').toggleClass('lower');
	 $('.home #somlogo').toggleClass('hidden');
	 $('#uvasomclinical_patienttab_icon').toggleClass('hidden');
	 $('.uvasomclinical #healthsystem').toggleClass('responsive');

	 //$('.site-header').toggleClass('lower');
	// $('#uvasom-menu').toggleClass('lower');
 	$('div#hs-menu').toggle('slow', function() {
    // Animation complete.
  });  	$('nav#nav-global').toggle('slow', function() {
    // Animation complete.
  });
});
$("div#hs-menu-link a").click( function(event){
    event.preventDefault();
    if ($(this).hasClass("lower") ) {
        $("body.uvasombims #uvasom-menu").animate({marginTop:"0px"}, 600);          
        $("body.uvasomnews #uvasom-menu").animate({marginTop:"0px"}, 600);          
        $("body.uvasomclinical #uvasom-menu").animate({marginTop:"0px"}, 600);          
        $("nav.nav-primary").animate({marginTop:"0px"}, 600);          
		//clinical departments
 		$("#uvasomclinical_patienttab_icon").animate({marginTop:"0"}, 600);   
		//parallax home page       
        $("div#hs-menu-link.uvasom_parallax").animate({marginTop:"-4px"}, 600);
        $("div#uvasom_parallax_topbar").animate({marginTop:"0"}, 600);
        $("body.uvasom_parallax #healthsystem").animate({height:"180px"}, 600);
        $("body.uvasom_parallax #uvasom_megamenu").animate({top:"178px"}, 600);
		$("body.uvasom_parallax.home main.content").animate({marginTop:"0"}, 600);
        $("body.uvasom_parallax.home #uvasom-menu").animate({marginTop:"0"}, 600);   
      $(this).removeClass("lower");
    } else {
        $("body.uvasombims #uvasom-menu").animate({marginTop:"37px"}, 600);          
        $("body.uvasomnews #uvasom-menu").animate({marginTop:"40px"}, 600);          
        $("body.uvasomclinical #uvasom-menu").animate({marginTop:"37px"}, 600);          
        $("nav.nav-primary").animate({marginTop:"0px"}, 600);  
		//clinical departments 
        $("#uvasomclinical_patienttab_icon").animate({marginTop:"37px"}, 600); 
		//parallax home page
        $("div#hs-menu-link.uvasom_parallax").animate({marginTop:"28px"}, 600);          
        $("div#uvasom_parallax_topbar").animate({marginTop:"32px"}, 600);
        $("body.uvasom_parallax #healthsystem").animate({height:"214px"}, 600);
        $("body.uvasom_parallax #uvasom_megamenu").animate({top:"212px"}, 600);
 		$("body.uvasom_parallax.home main.content").animate({marginTop:"28px"}, 600);
        $("body.uvasom_parallax.home #uvasom-menu").animate({marginTop:"32px"}, 600);   
       $(this).addClass("lower");
    }
    return false;
});}); 

