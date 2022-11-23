<?php /*
@extends("layout")

@section("content")
    @foreach($posts as $post)
        <article>
           
            <h1><a href="/posts/{{$post->slug}}"> {{$post->title}}</a></h1>
            <div>
                {{$post["excerpt"]}}
            </div>

            <p>by <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a></p>
        </article>
    @endforeach
@endsection */?>

@extends("layout")

@section("content")
    
@include("posts._header-filter")

        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        <?php /*<!-- <x-feature-post/>
                <x-slot:title>
                    <h1>HELLLOOOOOOOOOOOOO</h1>
                </x-slot:title>
                WORLDDDDDD
            <x-feature-post/> 
            
            <x-feature-post :post = "$posts[0]" />*/?>
            @if(count($posts) > 0)
            <x-component-feature>
                <x-slot:categorySlug>
                    {{$posts[0]->category->slug}}
                </x-slot:categorySlug>
                <x-slot:categoryName>
                    {{$posts[0]->category->name}}
                </x-slot:categoryName>
                <x-slot:postTitle>
                    {{$posts[0]->title}}
                </x-slot:postTitle>
                <x-slot:postSlug>
                    {{$posts[0]->slug}}
                </x-slot:postSlug>
                <x-slot:publishedAt>
                    {{$posts[0]->created_at->diffForHumans()}}
                </x-slot:publishedAt>
                <x-slot:excerpt>
                    {{$posts[0]->excerpt}}
                </x-slot:excerpt>
                <x-slot:authorName>
                    {{$posts[0]->author->name}}
                </x-slot:authorName>
                <x-slot:userName>
                    {{$posts[0]->author->username}}
                </x-slot:userName>
                
            </x-component-feature>

            <div class="lg:grid lg:grid-cols-2">
                @foreach($posts->skip(1) as $post)
                    @if($loop->iteration == 3)
                        @break
                    @endif
                    <x-post-card>
                        <x-slot:categorySlug>
                            {{$post->category->slug}}
                        </x-slot:categorySlug>
                        <x-slot:categoryName>
                            {{$post->category->name}}
                        </x-slot:categoryName>
                        <x-slot:postTitle>
                            {{$post->title}}
                        </x-slot:postTitle>
                        <x-slot:postSlug>
                            {{$post->slug}}
                        </x-slot:postSlug>
                        <x-slot:publishedAt>
                            {{$post->created_at->diffForHumans()}}
                        </x-slot:publishedAt>
                        <x-slot:excerpt>
                            {{$post->excerpt}}
                        </x-slot:excerpt>
                        <x-slot:authorName>
                            {{$post->author->name}}
                        </x-slot:authorName>
                        <x-slot:userName>
                            {{$post->author->username}}
                        </x-slot:userName>
                    </x-post-card>
                @endforeach
            </div>

            <div class="lg:grid lg:grid-cols-3">
                @foreach($posts->skip(3) as $post)
                    <x-post-card>
                        <x-slot:categorySlug>
                            {{$post->category->slug}}
                        </x-slot:categorySlug>
                        <x-slot:categoryName>
                            {{$post->category->name}}
                        </x-slot:categoryName>
                        <x-slot:postTitle>
                            {{$post->title}}
                        </x-slot:postTitle>
                        <x-slot:postSlug>
                            {{$post->slug}}
                        </x-slot:postSlug>
                        <x-slot:publishedAt>
                            {{$post->created_at->diffForHumans()}}
                        </x-slot:publishedAt>
                        <x-slot:excerpt>
                            {{$post->excerpt}}
                        </x-slot:excerpt>
                        <x-slot:authorName>
                            {{$post->author->name}}
                        </x-slot:authorName>
                        <x-slot:userName>
                            {{$post->author->username}}
                        </x-slot:userName>
                        
                    </x-post-card>    
                @endforeach                  
                
                
            </div>
            @else
                <div class ="text-center">
                    <p>no posts to show</p>
                </div>
            @endif 

        </main>
    
@endsection