<!DOCTYPE html>
<html>
	<body>
		<h1>Contact form {{ config('app.name', 'Laravel' ) }}:</h1>
		<h2>From: {{ $name }}<{{ $email }}></h3>
		<h2>Message:</h3>
		<p class="lead">{!! $messageBody !!}</p>
		@if($optIn)
			<p>ps.  Please add me to your mailing list.</p>
		@endif
	</body>
</html>