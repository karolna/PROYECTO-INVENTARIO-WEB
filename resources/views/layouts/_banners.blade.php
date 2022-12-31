<div >
    <br><br><br> </div>
<section >
    <div class="slick-center" style=" align:center; margin:auto "  >
        <img src="{{asset('image/banner1.png')}}">
        <img src="{{asset('image/banner2.png')}}">
        <img src="{{asset('image/banner3.png')}}">
        <img src="{{asset('image/banner4.png')}}">
    </div>
</section>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Navbar</a>
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
