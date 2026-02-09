@include('layouts/header')

<main>
    @include('layouts/navigation')
       @include('poruke/uspjeh')
    @include('liste_studenata/listaspag')


    
    <section>
         @yield('content')
        
    </section>
          

</main>
@include('layouts/footer')