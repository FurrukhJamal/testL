@extends("layout")

@section("content")
    <main class = "max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl ">
        <h1 class = "text-bold text-center text-xl ">Register</h1>
        <form action = "/register" method = "POST" class = "mt-10">
            @csrf
            <div class = "mb-6">
                <label 
                    for="username"
                    class = "block mb-2 uppercase bold text-xs text-gray-700">
                    UserName
                </label>
                <input 
                    type="text"
                    class = "border border-gray-400 p-2 w-full"
                    name = "username"
                    id = "username"
                    required
                    value = {{old("username")}}>
                @error("username")
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>
            <div class = "mb-6">
                <label 
                    for="name"
                    class = "block mb-2 uppercase bold text-xs text-gray-700">
                    Name
                </label>
                <input 
                    type="text"
                    class = "border border-gray-400 p-2 w-full"
                    name = "name"
                    id = "name"
                    required
                    value = {{old("name")}}>
                @error("name")
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class = "mb-6">
                <label 
                    for="email"
                    class = "block mb-2 uppercase bold text-xs text-gray-700">
                    Email
                </label>
                <input 
                    type="text"
                    class = "border border-gray-400 p-2 w-full"
                    name = "email"
                    id = "email"
                    required
                    value = {{old("email")}}>
                @error("email")
                    <p class = "text-red-500 text-xs mt-1">{{$message}}</p>
                @enderror

            </div>

            <div class = "mb-6">
                <label 
                    for="password"
                    class = "block mb-2 uppercase bold text-xs text-gray-700">
                    Password
                </label>
                <input 
                    type="password"
                    class = "border border-gray-400 p-2 w-full"
                    name = "password"
                    id = "password"
                    required>

            </div>

            <div class = "mb-6">
                <button 
                    type = "submit"
                    class = "bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500">Submit</button>

            </div>
        </form>
    </main>
@endsection