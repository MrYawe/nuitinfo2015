@extends('app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<div class="panel panel-default">

				<div class="panel-heading">Warnings</div>
				<div class="panel-body">
					<ul class="nav nav-tabs" id="myTab">
					  <li><a href="#general" data-toggle="tab">General advice</a></li>
					  <li class="dropdown">
						  <a id="drop4" role="button" type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Natural Disasters
						    <span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu" aria-labelledby="drop4">
						      <li><a href="#seisme" data-toggle="tab">Earthquakes</a></li>
							  <li><a href="#tsunamis" data-toggle="tab">Tsunamis</a></li>
							  <li><a href="#tempetes" data-toggle="tab">Storms</a></li>
							  <li><a href="#crues" data-toggle="tab">Floods</a></li>
							  <li><a href="#avalanche" data-toggle="tab">Avalanche</a></li>
							  <li><a href="#eruption" data-toggle="tab">Volcanic eruption</a></li>
						  </ul>
					  </li>
					  <li class="dropdown">
						  <a id="drop4" role="button" type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Technological Hazards
						    <span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu" aria-labelledby="drop4">
						      <li><a href="#centrale" data-toggle="tab">Plant explosion</a></li>
					  		  <li><a href="#pollution" data-toggle="tab">Pollution</a></li>
						  </ul>
					  </li>
					  <li class="dropdown">
						  <a id="drop4" role="button" type="button" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						    Human hazards
						    <span class="caret"></span>
						  </a>
						  <ul class="dropdown-menu" aria-labelledby="drop4">
						      <li><a href="#attentats" data-toggle="tab">Attacks</a></li>
					 		  <li><a href="#otage" data-toggle="tab">Hostage taking</a></li>
						  </ul>
					  </li>					  
					</ul>

					<div class="tab-content">
					  @include('user.info-general')
					  @include('user.info-earthquake')
					  @include('user.info-tsunami')
					  @include('user.info-windstorm')
					  @include('user.info-flood')
					  @include('user.info-avalanche')
					  @include('user.info-attack')
					  @include('user.info-hostages-taking')
					  @include('user.info-plant-explosion')
					  @include('user.info-pollution')
					  @include('user.info-volcanic-eruption')
					</div>
				</div>

			</div>
		</div>

	</div>
</div>

@endsection
