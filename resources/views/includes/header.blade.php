@section('header')
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
    <div class="container-fluid">
      <a class="navbar-brand" href="https://NewDiskette.ru/" target="_blank">New Diskette</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarColor01">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('welcome') }}">Laravel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('tasks.index') }}">Tasks</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('vvip.index') }}">App.VV&P</a>
          </li>
        </ul>
      </div>
    </div>
</nav>
