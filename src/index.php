<?php
$fh = fopen('last-response.txt', 'w');
fwrite($fh, '0//abc');
fclose($fh);
?>
<html>
<head>
	<link type="text/css" rel="stylesheet" href="/css/bootstrap.min.css"/>
	<link type="text/css" rel="stylesheet" href="/css/font-awesome.min.css"/>
	<link type="text/css" rel="stylesheet" href="/css/custom.css"/>
</head>
<body>

<div class="row row0">
	<div class="col-md-12">
		<h1 class="text-center" style="font-weight: bold;">Twilio Chinese Whispers</h1>
	</div>
</div>

<div class="row row1" style="margin-top: 2em;">
	<div class="col-md-3 col-md-offset-1">
		<div class="alert alert-info">
			<h2>What is this?</h2>

			<p>
				<a href="http://en.wikipedia.org/wiki/Chinese_whispers" rel="external">Chinese whispers</a>.<br/>
				With Twilio.<br/>
				And Urban Dictionary.<br/>
				Seriously, what more do you need to know?
			</p>
		</div>
		<div class="alert alert-info">
			<h2>How do I use it?</h2>
			<ol>
				<li>Enter names and numbers. At least two. You do have a friend, <em>right</em>?</li>
				<li>Enter a starting message.</li>
				<li>???</li>
				<li>Profit!</li>
			</ol>
		</div>
	</div>

	<div class="col-md-7">
		<div class="stage1-body">
			<div class="row">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="name1" placeholder="Name #1"/>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="phone1" placeholder="Phone #1"/>
				</div>
			</div>
			<div class="row" style="margin-top: 1em;">
				<div class="col-sm-6">
					<input type="text" class="form-control" id="name2" placeholder="Name #2"/>
				</div>
				<div class="col-sm-6">
					<input type="text" class="form-control" id="phone2" placeholder="Phone #2"/>
				</div>
			</div>
		</div>

		<div class="row stage1-buttons" style="margin-top: 1em;">
			<div class="col-md-12">
				<div class="pull-right">
					<button class="btn add-person"><i class="fa fa-plus"></i> Add Person</button>
					<button class="btn btn-primary stage1-go"><i class="fa fa-arrow-right"></i> Next</button>
				</div>
			</div>
		</div>

		<div class="stage2-body" style="display: none;">
			<textarea class="form-control" id="startmessage" rows="8"
					  placeholder="Enter your starting message - try to use at least a few sentences."></textarea>
		</div>

		<div class="row stage2-buttons" style="margin-top: 1em; display: none;">
			<div class="col-md-12">
				<div class="pull-right">
					<button class="btn btn-primary stage2-go-auto">
						<i class="fa fa-arrow-right"></i>
						Start Autopilot (Dictionary)
					</button>
					<button class="btn btn-primary stage2-go-auto-u">
						<i class="fa fa-arrow-right"></i>
						Start Autopilot (Urban Dictionary)
					</button>
					<button class="btn btn-primary stage2-go-interactive">
						<i class="fa fa-arrow-right"></i>
						Start Interactive
					</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row row2" style="display: none;">
	<div class="col-md-12 message-output"></div>
</div>

<script type="text/javascript" src="/js/jquery-2.1.3.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
</body>
</html>