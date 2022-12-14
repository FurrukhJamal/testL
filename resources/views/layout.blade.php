<!doctype html>

<title>Laravel From Scratch Blog</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script defer src="https://unpkg.com/alpinejs@3.10.5/dist/cdn.min.js"></script>
<link rel="stylesheet" href="{{asset('css/app.css')}}">

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
    
        @include("_post-header")

        @yield("content")
        
        @include("_post-footer")
        
    </section>
    <x-flash/>
</body>
