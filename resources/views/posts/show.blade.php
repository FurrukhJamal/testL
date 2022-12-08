@extends("layout")

@section("content")
    <?php /*
    <article>
        <h1>{{$post["title"]}}</h1>
        <p>By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>

        <div>{{$post["body"]}}</div>
    </article>
    <a href="/posts">Go Back</a>*/?>

<main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img 
                        src= "{{$post->thumbnail ? asset('storage/' . $post->thumbnail) : "/images/illustration-1.png"}}" {{--"/images/illustration-1.png"--}} 
                        alt="" class="rounded-xl">

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <a href="../authors/{{$post->author->userName}}"><h5 class="font-bold">{{$post->author->name}}</h5></a>
                            <h6>Mascot at Laracasts</h6>
                        </div>
                    </div>
                </div>

                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/posts"
                            class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                        d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>

                            Back to Posts
                        </a>

                        <?php /*<div class="space-x-2">
                            <a href="/categories/{{$post->category->slug}}"
                                class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                                style="font-size: 10px">{{$post->category->name}}</a>
                            
                        </div> */ ?>
                        <x-category-button>
                            <x-slot:categoryName>
                                {{$post->category->name}}
                            </x-slot:categoryName>
                            <x-slot:categorySlug>
                                {{$post->category->slug}}
                            </x-slot:categorySlug>
                        </x-category-button>
                    </div>

                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post->title}}}
                    </h1>

                    <div class="space-y-4 lg:text-lg leading-loose">
                        <p>{{$post->body}}}</p>

                        <h2 class="font-bold text-lg">Sed quia consequuntur</h2>

                        
                    </div>
                </div>
                <section class = "col-span-8 col-start-5 mt-10 space-y-5">
                    @include("_add-comment-form")

                        @if(count($post->comments) == 0)
                            <p class = "text-semibold"> No Comments to Show</p>

                        @endif
                    @foreach($post->comments as $comment)
                        <x-post-comment>
                            <x-slot:body>
                                {{$comment->body}}
                            </x-slot:body>
                            <x-slot:createdAt>
                                {{$comment->created_at->diffForHumans()}}
                            </x-slot:createdAt>
                            <x-slot:userName>
                                {{$comment->author->username}}
                            </x-slot:userName>
                        </x-post-comment>
                    @endforeach
                </section>
                
            </article>
        </main>
@endsection

<!--  -->