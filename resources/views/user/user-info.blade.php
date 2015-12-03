@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-heading">Alertes</div>
				<div class="panel-body">
					<ul class="nav nav-tabs">
					  <li><a href="#home" data-toggle="tab">Home</a></li>
					  <li><a href="#profile" data-toggle="tab">Profile</a></li>
					  <li><a href="#messages" data-toggle="tab">Messages</a></li>
					  <li><a href="#settings" data-toggle="tab">Settings</a></li>
					</ul>

					<div class="tab-content">
					  <div role="tabpanel" class="tab-pane fade in active" id="home">test</div>
					  <div role="tabpanel" class="tab-pane fade" id="profile">blabla</div>
					  <div role="tabpanel" class="tab-pane fade" id="messages">...</div>
					  <div role="tabpanel" class="tab-pane fade" id="settings">...</div>
					</div>
				</div>

			</div>
		</div>

	</div>
</div>

@endsection



@section('javascript')

@stop