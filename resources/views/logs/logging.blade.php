@extends('layouts.app')

@section('title','Logs')

@section('content')

<div class="container">
    <h1>Aktivitätslogs</h1>
    <table class="table">
        <thead>
            <tr>
                <th>Nr.</th>
                {{-- <th>Name</th> --}}
                <th>Beschreibung</th>
                {{-- <th>event</th> --}}
                <th>Datum</th>
                <th>Benutzer</th>
                <th>Changes</th>
                {{-- <th>properties</th> --}}
                
            </tr>
        </thead>
        <tbody>
             @foreach ($activityLogs as $log)
                <tr>
                    <td>{{ $log->id }}</td>
                    {{-- <td>{{ $log->log_name }}</td> --}}
                    <td>{{ $log->description }}</td>
                    <td>{{ $log->created_at }}</td>
                    <td>{{ $log->causer->name ?? 'System' }}</td>
                    {{-- <td>{{ $log->event }}</td> --}}
                    {{-- <td>{{ $log->changes }}</td> --}}
                    {{-- <td>{{ $log->properties }}</td> --}}
                    
                   
                    
                    <td>
                        <a class="btn btn-primary" href="{{ route('details', ['id' => $log->id]) }}">Details</a>
                    </td>

                </tr>
                @endforeach
        </tbody>
    </table>
</div>

    
</body>
</html>

@endsection