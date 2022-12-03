@extends("layout")

@section("content")
    <section class = "px-6 py-8 max-w-sm mx-auto" >
    <form method = "POST" action="/admin/post">
                @csrf
        <div class = "mb-6">
                  
            <label class = "block mb-2 font-bold text-xs text-gray-700" for="title">Title</label>
            <input 
                type="text" 
                class = "p-2 border border-gray-400 w-full"
                name = "title"
                id = "title"
                value = "{{old("title")}}" 
                required>

            @error("title")
                <p class = "test-xs test-red-500 mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class = "mb-6">
                  
            <label class = "block mb-2 font-bold text-xs text-gray-700" for="title">Slug</label>
            <input 
                type="text" 
                class = "p-2 border border-gray-400 w-full"
                name = "slug"
                id = "title"
                value = "{{old("slug")}}" 
                required>

            @error("slug")
                <p class = "text-xs text-red-400 mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class = "mb-6">
            <label class = "block mb-2 font-bold text-xs text-gray-700" for="excerpt">Excerpt</label>
            <textarea name="excerpt" id="" class = "border border-gray-400 w-full p-2">{{old("excerpt")}}</textarea>
            @error("excerpt")
                <p class = "test-xs test-red-500 mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class = "mb-6">
            <label class = "block mb-2 font-bold text-xs text-gray-700" for="excerpt">Body</label>
            <textarea name="body" id="" class = "border border-gray-400 w-full p-2">{{old("body")}}</textarea>
            @error("body")
                <p class = "test-xs test-red-500 mt-2">{{$message}}</p>
            @enderror
        </div>

        <div class = "mb-6">
            <label class = "block mb-2 font-bold text-xs text-gray-700" for="excerpt">Category</label>
            <select name="category_id" id="">
                @php 
                    $categories = \App\Models\Category::all();
                @endphp
                @foreach($categories as $category)
                    <option {{old("category_id") == $category->id ? "selected" : ""}} value= "{{$category->id}}">{{ucwords($category->name)}}</option>

                @endforeach
            </select>
            @error("category")
                <p class = "test-xs test-red-500 mt-2">{{$message}}</p>
            @enderror
        </div>

        <x-submit-button>Create Post</x-submit-button>
    </form>    
    </section>
@endsection