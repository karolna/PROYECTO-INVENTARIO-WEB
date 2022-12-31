<nav class=" bg-light navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row default-layout-navbar">
    <div class="bg-light text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="bg-light navbar-brand brand-logo" href="{{ url('/') }}"><img src="{{asset('melody/images/logo.svg')}}"
                alt="logo" /></a>
        <a class="bg-light navbar-brand brand-logo-mini" href="index-2.html"><img src="{{asset('melody/images/logo-mini.svg')}}"
                alt="logo" /></a>
    </div>

    <div class="navbar-menu-wrapper d-flex align-items-stretch bg-light" style="float: right">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('login') }}">Ingresar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('reserve.reserve_all') }}">Reservas</a>
                  </li>
                <li class="nav-item ">
                  <a class="nav-link" href="{{ route('index.reencauchadas') }}">Llantas reencauchadas</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.nuevas') }}">Llantas nuevas </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.tubos') }}">Tubos </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.defensas') }}">Defensas </a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="{{ route('index.aros') }}">Aros </a>
                  </li>
              </ul>
            </div>
          </nav>


    </div>
</nav>


