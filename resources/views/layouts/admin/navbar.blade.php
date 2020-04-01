<nav class="navbar is-link" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="https://bulma.io">
                <img src="https://bulma.io/images/bulma-logo-white.png" width="112" height="28">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="mainNav">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="mainNav" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item">
                    Dashboard
                </a>

                <div class="navbar-item has-dropdown is-hoverable has-text-black">
                    <a class="navbar-link">
                        Servers
                    </a>

                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item" href="{{route('admin.server.index')}}">
                            List Servers
                        </a>
                        <a class="navbar-item">
                            Add Server
                        </a>
                    </div>
                </div>

                <div class="navbar-item has-dropdown is-hoverable has-text-black">
                    <a class="navbar-link">
                        Docs
                    </a>

                    <div class="navbar-dropdown is-boxed">
                        <a class="navbar-item">
                            Overview
                        </a>
                        <a class="navbar-item">
                            Elements
                        </a>
                        <a class="navbar-item">
                            Components
                        </a>
                        <hr class="navbar-divider">
                        <div class="navbar-item">
                            Version 0.8.0
                        </div>
                    </div>
                </div>
            </div>

            <div class="navbar-end">
                <div class="navbar-item">
                    @if(Auth::guard('admin')->check())
                        <div class="navbar-item has-dropdown is-hoverable has-text-black">
                            <a class="navbar-link">
                                {{ Auth::guard('admin')->user()->name }} (ADMIN) <span class="caret"></span>
                            </a>

                            <div class="navbar-dropdown is-boxed">
                                <a class="navbar-item" href="{{route('admin.home')}}">
                                    Dashboard
                                </a>
                                <hr class="navbar-divider">
                                <a class="navbar-item" href="#" onclick="event.preventDefault();document.querySelector('#admin-logout-form').submit();">
                                    Logout
                                    <form id="admin-logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </a>
                            </div>
                        </div>
                    @endif
{{--                    <div class="buttons">--}}
{{--                        <a class="button is-primary">--}}
{{--                            <strong>Sign up</strong>--}}
{{--                        </a>--}}
{{--                        <a class="button is-light">--}}
{{--                            Log in--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
            </div>
        </div>
    </div>
</nav>
