@section('content')
@php 
use Carbon\Carbon;
@endphp

<table>
    <thead>
        <tr>
            <th>Broj</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Status</th>
            <th>Godište</th>
            <th>Prosjek</th>
            <th>Datum upisa</th>
            <th>Akcije</th>
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
            <td>{{number_format($st->prosjek,2,".",",")}}</td>
            <td>{{ Carbon::parse($st->created_at)->format('d.m.Y')}}</td>
            <td><a href="{{route("studenti.azuriranje",$st)}}">Ažuriraj</a>
                  <form method="POST" action="{{ route('studenti.delete', $st) }}"
                              class="inline"
                              onsubmit="return confirm('Obrisati studenta?');">
                            @csrf
                            @method('DELETE')
                            <button class=".form-box button button:hover">Briši</button>
                        </form>
        </td>
        </tr>
        @endforeach
        <tfoot>
           <tr>
                <td>Broj redovnih studenata:</td>
                <td> {{$brojRedovnih}}   </td>
                <td>Broj izvanrednih studenata </td>
                <td>{{$brojVanrednih}}</td>
                 <td>Prosječna ocjena </td>
                 @php 
                 $pr_formatted=number_format($prosjek,2,".",",");
                 @endphp 
                <td >{{$pr_formatted}}</td>
                <td>Ocjena:</td>
                 <td>
                    @if($pr_formatted>=4.50)
                       Odličan(5)
                    @elseif($pr_formatted<4.50 && $pr_formatted>=3.50)
                        Vrlo dobar(4)
                    @elseif($pr_formatted<3.50 && $pr_formatted>=2.50)
                        Dobar(3)
                    @elseif($pr_formatted<2.50 && $pr_formatted>=1.50)
                        Dovoljan(2)
                    @else 
                        Nedovoljan(1)
                    @endif
                 </td>
                 </tr>
        </tfoot>
    </tbody>
    
</table>
{{ $studenti->links() }}
@endsection

