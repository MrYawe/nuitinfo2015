@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">
	      		<div class="panel-heading">
	       			<h2>Help for adaptative features</h2>
	      		</div>
		      	<div class="panel-body" id="to-read">
		        	<h3>Compatibility<span style="display:none;">.</span></h3>
		        		<p>The Text-to-speech feature is only available on Firefox. Please use it instead of Google Chrome, Opera or Safari.</p>
		        	<h3>Text-to-speech<span style="display:none;">.</span></h3>
		        		<p>To enable the text-to-speech feature, just press the "r" key. Press it again to pause the reading then press it again to resume it. If it is reading too fast, you can restart the reading by a double tap on the "r" key.</p>
		        	<h3>Font size<span style="display:none;">.</span></h3>
		        		<p>If the font is too small for you, you can increase its size by clicking on the magnifying glass with the "plus" sign on the top right of the page. You can also decrease the font size by clicking on the magnifying glass with the "minus" sign on the top right of the page.<br>To be faster, you can press the "plus" key to increase the font size and the "minus" key to decrease it.</p>
		    	</div>
			</div>
		</div>
	</div>
</div>

@endsection