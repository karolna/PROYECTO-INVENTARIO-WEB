
<style>
.navbar-item .nav-item: active, .navbar-item .nav-item: focus{
    background-color: red;
}
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light" >

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        {{--<a class="navbar-brand" href="{{ route('login') }}">Ingresar</a>--}}
        <li class="nav-item ">
            <a class="navbar-brand" href="{{ route('login') }}">Ingresar</a>
          </li>
        <li class="nav-item ">
            <a class="nav-link" href="{{ route('reserve.reserve_all') }}">Reservas</a>
          </li>
        <li class="nav-item ">
          <a class="nav-link " href="{{ route('index.reencauchadas') }}">Llantas reencauchadas</a>
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
 {{-- <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link "  href="{{ route('index.defensas') }}" role="tab" aria-controls="home" aria-selected="true">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="{{ route('index.aros') }}" role="tab" aria-controls="profile" aria-selected="true">Profile</a>
    </li>
    <li class="nav-item">
      <a class="nav-link"  href="{{ route('index.nuevas') }}" role="tab" aria-controls="contact" aria-selected="true">Contact</a>
    </li>
  </ul>--}}

