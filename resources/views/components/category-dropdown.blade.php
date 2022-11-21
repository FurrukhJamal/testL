<div x-data = "{show : false}">
    {{--triger--}}
    <button 
        @click = "show = !show" @click.away = "show = false"
        class = "w-32 text-left py-2 pl-3 pr-9 text-sm font-semibold inline-flex">
            {{isset($currentCategory) ? ucwords($currentCategory->name) : "Category"}}
            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path fill="#222"
                d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </button>
    {{--button--}}    
    <div x-show = "show" style = "display : none;" class = "overflow-auto max-h-32 z-50 py-2 absolute bg-gray-100 w-full mt-2 rounded-xl">
        <a href="/posts" class = "block text-left px-3 text-sm leading-4 
        focus:text-white hover:text-white hover:bg-blue-500 focus:bg-gray-300 ">All</a>

        @foreach($categories as $category)
            <a href="/categories/{{$category->slug}}" 
            class = "block text-left px-3 text-sm leading-4 focus:text-white 
            hover:text-white 
            hover:bg-blue-500 focus:bg-gray-300 {{isset($currentCategory) && $currentCategory->id == $category->id ? "bg-blue-300 text-white" : ""}}">{{$category->name}}</a>
        @endforeach
</div>