var peopleCount = 2;
var laps = 5;
var loopCounter = 0;
var people = [];
var message = '';

$(document).ready(function () {

	// external links
	$('a[rel=external]').click(function (e) {
		e.preventDefault();
		window.open($(this).attr('href'));
	});

	// add people
	$('button.add-person').click(function (e) {
		// moar people!
		++peopleCount;

		// add html
		$('.stage1-body').append('<div class="row" style="margin-top: 1em;">' +
		'<div class="col-sm-6">' +
		'<input type="text" class="form-control" id="name' + peopleCount + '" placeholder="Name #' + peopleCount + '"/>' +
		'</div>' +
		'<div class="col-sm-6">' +
		'<input type="text" class="form-control" id="phone' + peopleCount + '" placeholder="Phone #' + peopleCount + '"/>' +
		'</div>' +
		'</div>');
	});

	// move to message phase
	$('button.stage1-go').click(function (e) {
		// change display
		$('.stage1-body').slideUp(300);
		$('.stage1-buttons').slideUp(300);
		$('.stage2-body').slideDown(300);
		$('.stage2-buttons').slideDown(500);

		// harvest phone numbers
		for (var i = 1; i <= peopleCount; ++i) {
			people[people.length] = [$('#name' + i).val(), $('#phone' + i).val()];
		}
	});

	// lets go!
	$('button.stage2-go').click(function (e) {
		// change display
		$('.row0').slideUp(300);
		$('.row1').slideUp(500);
		$('.row2').show();

		alert(peopleCount);

		// get the message
		message = $('#startmessage').val();

		// go!
		cycle();
	});

});

function cycle() {
	// get the next message
	$.post(
		'message-changer.php',
		{
			source: 'dictionary',
			message: message
		},
		function (data) {
			// new message
			message = data;

			// print to the browser
			displayNextMessage(people[loopCounter % peopleCount][0], message);

			// advance
			++loopCounter;

			// done?
			if (loopCounter >= (laps * peopleCount)) {
				displayNextMessage('Done!', '<em>You ended up with:</em><br/>' + message);
			} else {
				// recurse
				setTimeout(function () {
					cycle();
				}, 1000);
			}
		}
	);
}

function displayNextMessage(name, message) {
	// build output
	var output = '<div class="row" style="margin-top: 1em;">' +
		'<div class="col-md-4 col-md-offset-4">' +
		'<div class="alert alert-info text-' + (loopCounter % 2 == 0 ? 'left' : 'right') + '">' +
		'<h3>' + name.toUpperCase() + '</h3>' +
		'<p>' + message + '</p>' +
		'</div>' +
		'</div>' +
		'</div>';

	// append
	var outputTarget = $('.message-output');
	outputTarget.append(output);

	// scroll down
	outputTarget.animate({scrollTop: outputTarget[0].scrollHeight}, 300);
}