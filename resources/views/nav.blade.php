<nav class="navbar navbar-expand navbar-dark shadow-none" style="background-color: #005192">

  <div class="row no-gutters">
    <a class="navbar-brand font-weight-bold shadow-none" href="/" style="color: white; line-height: 100%">
      <img class="ml-2" src="{{ asset('img/logo.png') }}" alt="logo" height="40px">
    </a>
  </div>
  
  {{-- 検索機能 --}}
  <form class="form-inline m-0 pl-4" role="search" action="{{ route('listings.search') }}">
    <div class="input-group">
        <input type="text" class="form-control" name="keyword" placeholder="タグを検索" style="width: 160px">
        <span class="input-group">
            <button type="submit" class="btn-outline-white">
              <i class="fas fa-search"></i>
            </button>
        </span>
    </div>
  </form>
  {{-- 検索機能 --}}

  <ul class="navbar-nav ml-auto">

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('register') }}">ユーザー登録</a>
    </li>
    @endguest

    @guest
    <li class="nav-item">
      <a class="nav-link" href="{{ route('login') }}">ログイン</a>
    </li>
    @endguest

    @auth
    <!-- Dropdown -->
    <li class="nav-item dropdown mr-2">
      <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
        aria-haspopup="true" aria-expanded="false">
        {{ Auth::user()->name }}
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
        <button class="dropdown-item" type="button" onclick="location.href='{{ route('users.show', ['name' => Auth::user()->name]) }}'">
          マイリスト
        </button>
        <div class="dropdown-divider"></div>
        <button form="logout-button" class="dropdown-item" type="submit">
          ログアウト
        </button>
      </div>
      </li>
      <form id="logout-button" method="POST" action="{{ route('logout') }}">
        @csrf
      </form>
    <!-- Dropdown -->
    @endauth

    @auth
    {{-- <li class="nav-item card bg-primary px-2 shadow-none"> --}}
      <a class="list-create nav-item card shadow-none" 
        href="{{ route('listings.create') }}"><i class="far fa-clipboard"></i></a>
    {{-- </li> --}}
    @endauth

  </ul>

</nav>