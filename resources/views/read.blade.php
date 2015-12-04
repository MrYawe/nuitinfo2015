@extends('app')

@section('content')
<div class="container" id="to-read">
	<div id="audio"></div>
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
				<div class="panel panel-heading">
					TEST Audio
				</div>
				<div class="panel panel-body">
					The F.B.I. is treating the shooting as a potential terrorist act, though they are far from concluding that it was, two law enforcement officials said Thursday. The suspects’ extensive arsenal, their recent Middle East travels and evidence that one had been in touch with people with Islamist extremist views, both in the United States and abroad, all contributed to the decision to refocus the investigation. But officials emphasized that they were unclear what set off the attack, and said they were not ready to call it terrorism.
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('javascript')

<script src='https://code.responsivevoice.org/responsivevoice.js'></script>
<script src="{{ asset('assets/js/read-site.js') }}"></script>

@stop