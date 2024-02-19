@extends('layouts.app')

@section('title','Logs')

@section('content')




<div class="container">
    <h1>Aktivitätslogs</h1>


<table class="table">
    <thead>
        <tr>
            <th>Nr.</th>
            <th>Name</th>
            <th>Beschreibung</th>
            <th>Datum</th>
            <th>Benutzer</th>
            <th>Event</th>
            
            
        </tr>
    </thead>
    <tbody>
         
            <tr>
                
                <td class="w-20">{{ $details->id }}</td>
                <td class="w-20">{{ $details->name }}</td>
                <td>{{ $details->description }}</td>
                <td>{{ $details->created_at }}</td>
                <td>{{ $details->causer->name ?? 'System' }}</td>
                <td>{{ $details->event }}</td>
                
               

            </tr>
    </tbody>

</table>

<table class="table mt-3">

<thead>
    <tr>
        <th>Changes</th>
        <th>properties</th>
    </tr>

</thead>

<tbody>
    <td>{{ $details->changes }}</td>
    <td>{{ $details->properties }}</td>
</tbody>


</table>




<a class="btn btn-primary" href=" {{ route('logging') }} " >Zurück</a>

</div>








@endsection