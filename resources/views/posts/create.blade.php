@extends("layout")

@section("content")
    <section class = "px-6 py-8 max-w-sm mx-auto" >
        <h1 class = "text-lg font-bold mb-4">Publish new Post</h1>
    <form method = "POST" action = "/admin/post" enctype="multipart/form-data">
                @csrf
        <x-form.input>
            <x-slot:type></x-slot:type>
            title
        </x-form.input>
        
        
        <x-form.input>
            <x-slot:type></x-slot:type>
            slug
        </x-form.input>

        <x-form.input>
            thumbnail
            <x-slot:type>
                file
            </x-slot:type>
        </x-form.input>
        

        {{--<div class = "mb-6">
                  
            <label class = "block mb-2 font-bold text-xs text-gray-700" for="title">Thumbnail</label>
            <input 
                type="file" 
                class = "p-2 border border-gray-400 w-full"
                name = "thumbnail"
                id = "title"
                 
                required>

            @error("thumbnail")
                <p class = "text-xs text-red-400 mt-2">{{$message}}</p>
            @enderror
        </div>--}}

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