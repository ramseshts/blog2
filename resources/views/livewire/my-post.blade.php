<div>
    <div class="container mx-auto p-5">
        <h1 class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Welcome to {{ session('name') }}'s Post
        </h1>
    </div>

    <div class="mt-10 max-w-xl mx-auto">
        @if ($posts->isNotEmpty())
            @foreach($posts as $post)
                <div class="flex border-b mb-5 pb-5 border-gray-200 gap-3">
                    <div class="flex-auto">
                        <a href="/post/{{ $post->slug }}" class="text-2xl font-bold mb-2">{{ Str::limit($post->title, 20, '...') }}</a>
                        <p class="overflow-auto">{{ Str::limit($post->body, 100) }}</p>
                        <p> ~ {{ $post->name }}</p>
                    </div>
                    <a href="/post/edit/{{ $post->slug }}" wire:click="edit('{{ $post->slug }}')" class="flex-auto bg-yellow-400 rounded-lg p-2 col-span-3 m-auto hover:bg-yellow-500 ring-4 ring-yellow-200">
                        Edit
                    </a>
                    <button wire:click="delete('{{ $post->slug }}')" class="flex-auto bg-red-500 rounded-lg p-2 col-span-3 m-auto hover:bg-red-700 ring-4 ring-yellow-400">
                        Delete
                    </button>
                </div>
            @endforeach    
        @else
            <div class="border-b mb-5 pb-5 border-gray-200">
                <h1>Seems like you don't have post :(</h1>
                <h1>Create some<a href="{{ url('/post/create') }}" class="text-green-700"> here</a>!</h1>
            </div>
        @endif
    </div>
</div>
