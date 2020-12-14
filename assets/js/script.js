$j = jQuery.noConflict();

$j(function(){
	//mobileMenu();
	menuClick();
	mobyMobileMenu();
	console.log('Loading Resources............100%');

	$j(window).scroll(function() {
		if ($j(this).scrollTop()) {
			$j('#scroll-to-top').fadeIn();
		} else {
			$j('#scroll-to-top').fadeOut();
		}
	});

	$j("#scroll-to-top").on('click', function () {
		$j("html, body").animate({scrollTop: 0}, 1000);
	});
});
function mobileMenu(){
	var screen = $j(window).width();
	var nav = $j('#bs-navbar-collapse');
	try{
		$j("div#bs-navbar-collapse.desktop .dropdown,div#bs-navbar-collapse.desktop .btn-group").hover(function(){
			var dropdownMenu = $jj(this).children(".dropdown-menu");
			dropdownMenu.parent().toggleClass("open");
		});
		$j(window).resize(function() {
			nav.toggleClass('desktop');
		});
	}catch(e){
		console.log(e);
	}
}
function menuClick(){
	$j('li.dropdown').on('click', function (e) {
		console.log(e);
		$j(this).removeClass('open');
	});
}

$j(window).on('load', function () {
	$j('.loading').fadeOut();
});