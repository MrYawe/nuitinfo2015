@extends('app')

@section('content')
    <h2>Reports</h2>

    @if ( !$reports->count() )
        <p>There are no report.</p>
    @else
        <ul>
            @foreach($reports as $report)
                <li>
                    <a href="{{ route('report.show') }}">{{ $report->location }}</a>
                </li>
            @endforeach
        </ul>
    @endif

@endsection
