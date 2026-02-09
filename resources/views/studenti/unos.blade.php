@include('layouts/header')

<main>
    @include('layouts/navigation')
    @include('liste_studenata/lista_unos')


    
    <section>
           @yield('content')
        <h2>Unos novog studenta</h2>

        <form method="POST" action="{{ route('studenti.unos') }}" class="form-box">

            @csrf

            <label>Ime:</label>
            <input type="text" name="ime" value="{{ old('ime') }}">
                  @error('ime') <p class="errors">{{ $message }}</p> @enderror

            <label>Prezime:</label>
            <input type="text" name="prezime" value="{{ old('prezime') }}">
                      @error('prezime') <p class="errors">{{ $message }}</p> @enderror
            <label>Status:</label>
            <select name="status">
                 <option value="">-- Odaberi --</option>
                <option value="redovni">Redovni</option>
                <option value="izvanredni">Izvanredni</option>
            </select>
                  @error('status') <p class="errors">{{ $message }}</p> @enderror

            <label>Godište:</label>
            <input type="number" name="godiste" min="0" step="1" value="{{ old('godiste') }}">
                      @error('godiste') <p class="errors">{{ $message }}</p> @enderror

            <label>Prosjek</label>
            <input type="number" name="prosjek" min="0.00", step="0.01" value="{{ old('prosjek') }}">
                      @error('prosjek') <p class="errors">{{ $message }}</p> @enderror

            <button type="submit">Spremi novog studenta</button>
        </form>
    </section>
 

</main>
@include('layouts/footer')