jQuery(document).ready(function($) {
 $('div#hs-menu-link a').click(function() {
	 $('span#hs-menu-arrow').toggleClass('down');
	 $('#uvasom_megamenu').toggleClass('lower');
 	// $('#uvasom-menu').toggleClass('lower');
 	$('div#hs-menu').toggle('slow', function() {
    // Animation complete.
  });
 });
//determine the onload top position of the UVA SOM menu bar
$("#uvasom-menu").addClass ('nohs','5000');
//toggle the menu bar up and down depending on the display of the HS nav bar
$("div#hs-menu-link a").toggle(
function () { 
$("#uvasom-menu").addClass('lower','5000'); 
$("#uvasom_megamenu").addClass('lower','5000'); 
//$("#uvasom-menu").animate({"top": "+36px",opacity: 1}, "slow"); 
},
function () { 
$("#uvasom-menu").removeClass('lower','5000'); 
$("#uvasom_megamenu").removeClass('lower','5000'); 
//$("#uvasom-menu").animate({"top": "9px",opacity: 1}, "slow"); 
}); 

});
