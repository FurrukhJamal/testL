<article class = "flex bg-gray-100 p-6 rounded-xl border border-gray-200 space-x-6">
    <div class = "flex-shrink-0">
        <img class = "rounded-xl" src="https://i.pravatar.cc/60" alt="" width = "60" height = "60">
    </div>
    <div>
        <header class = "mb-4">
            <h3 class = "font-bold">{{$userName}}</h3>
            <p class = "text-xs"> Posted <time>{{$createdAt}}</time></p>
        </header>

        <p>
            {{$body}}
        </p>
    </div>
</article>