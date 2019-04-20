<nav class="navbar navbar-expand-md navbar-white bg-secondary text-white navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-left">
                        <a href="/" class="h1">Главная</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    <!-- for admin  -->
                    <ul class="navbar-nav">
                            @if(Auth::check() and Auth::user()->id === 1)
                                <li class="nav-item dropdown">
                                  <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown">
                                    Управление <span class="caret"></span>
                                  </a>
                                  <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item warning" href="/tovar/create">Новый товар</a>
                                    <a class="dropdown-item" href="/">Главная страница</a>
                                    <a class="dropdown-item" href="/mark">Марка</a>
                                    <a class="dropdown-item" href="/phoneModel">Модель телефонов</a>
                                    <a class="dropdown-item" href="/print">Принт</a>
                                    <a class="dropdown-item" href="/collection">Колекция</a>
                                  </div>

                                </li>
                         
                          <ul>
                        <div class="float-right">
                            <select name="status" class="form-control" onchange="with (this) document.location.href=options [selectedIndex].value">
                              <option value="/" {{ request('status') ? '' : 'selected' }}>Все товары</option>                         
                              <option value="/?status=10" {{ '10' == request('status') ? 'selected' : '' }}>Активне</option>
                              <option value="/?status=1" {{ '1' == request('status') ? 'selected' : '' }}>Нективне</option>    
                            </select>
                        </div>
                         @endif
                    </ul>
                    </ul>
                </div>
            </div>
        </nav>
