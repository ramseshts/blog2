<div>
    <div class="container mx-auto p-5">
        @if (session()->has('message'))
            <div class="rounded-md bg-green-100 rounded-lg p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800">Successfully Login!</h3>
                        <div class="mt-2 text-sm text-green-700">
                            <p>{{ session('message') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <h1 class="text-4xl mt-32 text-center tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
            Welcome to The BlogX - Production Environtment v3
        </h1>
    </div>

    <div class="mt-10 max-w-xl mx-auto">
        @if ($posts->isNotEmpty())
            @foreach($posts as $post)
                <div class="border-b mb-5 pb-5 border-gray-200">
                    <a href="/post/{{ $post->slug }}" class="text-2xl font-bold mb-2">{{ Str::limit($post->title, 20, '...') }}</a>
                    <p class="whitespace-normal">{{ Str::limit($post->body, 100) }}</p>
                    <p> ~ {{ $post->name }}</p>
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
