<nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/posts">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 flex items-center">
                @auth
                    <span class="text-xs font-bold uppercase">Welcome Back, {{auth()->user()->name}}</span>
                    <form action="/logout" method = "POST">
                        @csrf
                        <button type ="submit" class = "text-blue-500 ml-6 font-semibold hover:text-white hover:bg-blue-300">Logout</button>
                    </form>
                @else
                    <a href="/register" class="text-xs font-bold uppercase">Register</a>
                    <a href="/login" class="ml-6 text-xs font-bold uppercase">Login</a>
                @endauth
                <a href="#test" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>