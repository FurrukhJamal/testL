@auth
    <form action = "/posts/{{$post->slug}}/comments" method = "POST" class = "border border-gray-200 rounded-xl p-6">
        @csrf
        <header class = "flex items-center">
            <img class = "rounded-full" src="https://i.pravatar.cc/60" alt="" width = "40" height = "40">
            <h2 class = "ml-8">Wanna Comment?</h2>
        </header>
        <div>
            <textarea rows = "6" required placeholder = "What's up" class = "border border-gray-100 w-full mt-5 focus:outline-none focus:ring" name = "comment">

            </textarea>
            @error("comment")
                <span class = "text-xs text-red-300">{{$message}}</span>
            @enderror
        </div>
        <x-submit-button>Post It</x-submit-button> 
    </form>
    @else
        <p class = "text-semibold"><a href="login" class = "hover:underline hover:text-blue-300">Log In </a> or <a href="register" class = "hover:underline hover:text-blue-300">Register</a> To Comment</p>
                                    
@endauth