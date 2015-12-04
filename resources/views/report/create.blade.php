@extends('app')

@section('content')
<div class="container">
  <div class="row">
    <form role="form" class="col-md-6" method="post" action="{{route('report.store')}}">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="event_type">Event type</label>
            <select name="event_type" required>
              @foreach ($events as $event)
                <option value="{{ $event->id }}">{{ $event->name }}</option> 
              @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" class="form-control" name="location" required>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" name="description" required>
        </div>

        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <button type="submit" class="btn btn-default">Post this report</button>
    </form>
  </div>
</div>
@endsection