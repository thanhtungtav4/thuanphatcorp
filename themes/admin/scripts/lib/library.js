$(document).ready(function() {
	
	$(".navL").accordion({
		accordion:true,
		speed: 500,
		closedSign: '<i class="cls"></i>',
	    openedSign: '<i class="exp"></i>'
		//closedSign: '+',
	    //openedSign: '-'
	});
	
	$(".min").click(function(){
				$(".navL").toggleClass('closed', 800);
				$(this).toggleClass('minimize_closed');
   });
   
   $('.tooltip').tooltipster();
   $(".mainLeft").stick_in_parent();
   $(".blogSearch").stick_in_parent();
	
});

