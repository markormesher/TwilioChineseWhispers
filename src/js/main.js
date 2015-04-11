$(document).ready(function () {

	// external links
	$('a[rel=external]').click(function (e) {
		e.preventDefault();
		window.open($(this).attr('href'));
	});



});