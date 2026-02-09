@section('content')
@php 
use Carbon\Carbon;
@endphp

<table class="table-align">
    <thead>
        <tr>
            <th>Broj</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Status</th>
            <th>Godište</th>
            <th>Prosjek</th>
            <th>Datum upisa</th>
        </tr>
    </thead>
    <tbody>
        @php
        $id = 0;
        @endphp 
        @foreach($studenti as $st) 
        @php 
        $id++;
        @endphp 
        <tr>
            <td>{{$id}}</td>
            <td>{{$st->ime}}</td>
            <td>{{$st->prezime}}</td>
            <td>{{$st->status}}</td>
             <td>{{$st->godiste}}</td>
            <td>{{$st->prosjek}}</td>
            <td>{{ Carbon::parse($st->created_at)->format('d.m.Y')}}</td>
        </tr>
        @endforeach
        
    </tbody>
</table>

@endsection