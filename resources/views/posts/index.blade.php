<x-layout>
    @include('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-post-grid :posts="$posts" />
        @else 
            <h1 class="text-center">No posts yet. Please Come Back Later!</h1>
        @endif
    </main>
    {{-- @foreach ($posts as $post)
    <article>
        <h1><a href="/posts/{{ $post->slug }}">{{$post->title}}</a></h1>

        <p>
            By
            <a href="/author/{{ $post->author->username }}">
                {{$post->author->name}}
            </a>
            in
            <a href="/category/{{ $post->category->slug }}">
                {{$post->category->name}}
            </a>
        </p>

        <div>
            <p>
                {{ $post->excerpt }}
            </p>
        </div>
    </article>
    @endforeach --}}
</x-layout>