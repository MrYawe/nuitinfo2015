@extends('app')

@section('content')

<div class="container">
	<div class="row">
		<h2>{{ $type }} in  {{ $report->location }} </h2>
		<p> {{ $report->description }} </p>
		<p> First report at {{$report->created_at}} </p>
		<?php 
			$template = 'user.info-' . strtolower($type);
			$template2 = 'twitterFeeds.twitter-' . strtolower($type) . 's';
		?>
		@include($template)
		@include($template2)
  </div>
</div>

@endsection