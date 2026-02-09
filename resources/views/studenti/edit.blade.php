@include('layouts/header')

<main>
    @include('layouts/navigation')



    
    <section>
           @yield('content')
        <h2>Ažuriranje studenta</h2>

        <form method="POST" action="{{route('studenti.azuriraj',$student)}}" class="form-box">

            @csrf
            @method('PUT')
            <label>Ime:</label>
            <input type="text" name="ime" value="{{ old('ime',$student->ime) }}">
                  @error('ime') <p class="errors">{{ $message }}</p> @enderror

            <label>Prezime:</label>
            <input type="text" name="prezime" value="{{ old('prezime',$student->prezime) }}">
                      @error('prezime') <p class="errors">{{ $message }}</p> @enderror
            <label>Status:</label>
            <select name="status">
                 <option value="">-- Odaberi --</option>
                <option value="redovni" @selected(old('status',$student->status)==='redovni')>Redovni</option>
                <option value="izvanredni" @selected(old('status',$student->status)==='izvanredni')>Izvanredni</option>
            </select>
                  @error('status') <p class="errors">{{ $message }}</p> @enderror

            <label>Godište:</label>
            <input type="number" name="godiste" min="0" step="1" value="{{ old('godiste',$student->godiste) }}">
                      @error('godiste') <p class="errors">{{ $message }}</p> @enderror

            <label>Prosjek</label>
            <input type="number" name="prosjek" min="0.00", step="0.01" value="{{ old('prosjek',$student->prosjek) }}">
                      @error('prosjek') <p class="errors">{{ $message }}</p> @enderror

            <button type="submit">Ažuriraj trenutnog studenta</button>
        </form>
    </section>
 

</main>
@include('layouts/footer')