$(".menu li > a").click(function(e) {

	$(".menu ul ul").slideUp(), $(this).next().is(":visible")
	|| $(this).next().slideDown(), e.stopPropagation()

})

//bila yg buka kurang dari 768px
$(window).bind("load resize", function() {
	if($(this).width()<1200){
		$(".sidebar-collapse").addClass("collapse");
	}else{
		$(".sidebar-collapse").removeClass("collapse");
		$(".sidebar-collapse").removeAttr("style");
	}
})