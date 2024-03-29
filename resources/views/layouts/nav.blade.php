<div>
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <nav class="navbar navbar-light">
                <a class="navbar-brand" href="/home">
                  <img src='/images/milogo_sml.png' width="30" height="30" class="d-inline-block align-top" alt="">
                  {{ config('app.name', 'Laravel') }}
                </a>
              </nav>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                @if (isset(auth()->user()->allowed_lgu_admin) && 'yes' == auth()->user()->allowed_lgu_admin)
                <ul class="navbar-nav mr-auto">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                          <li class="nav-item">
                            <a class="nav-link" href="/news-list">News</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/events-list">Events</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/broadcasts-list">Broadcast Messages</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/messages-list">Incoming Messages</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="/app-settings">App Settings</a>
                          </li>
                      </div>
                </ul>
                @endif

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @auth
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/logout"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</div>
