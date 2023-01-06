<div>
    <div>
        <div class="container mx-auto px-4">
            <form wire:submit.prevent="savePost" class="space-y-6">
                <h1
                    class="text-4xl mt-6 tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                    Create Post
                </h1>
                <p class="text-lg mt-2 text-gray-600">Start crafting your new post below.</p>
                <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

                    @if (session()->has('success'))
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
                                    <h3 class="text-sm font-medium text-green-800">Successfully Saved Post</h3>
                                    <div class="mt-2 text-sm text-green-700">
                                        <p>{{ session('success') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    @error('title')
                        <div class="rounded-md bg-red-100 rounded-lg p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                        fill="currentColor" aria-hidden="true">
                                        <path fill-rule="evenodd"
                                            d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <h3 class="text-sm font-medium text-red-800">Title error</h3>
                                    <div class="mt-2 text-sm text-red-700">
                                        <p>{{ $message }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @enderror

                    <div class="sm:col-span-6">
                        <label for="title" class="block text-sm font-medium text-gray-700">
                            Post Title
                        </label>
                        <div class="mt-1">
                            <input id="title" wire:model="title" name="title" placeholder="Brilliant idea ..."
                                class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                        </div>
                    </div>

                    @error('body')
                    <div class="rounded-md bg-red-100 rounded-lg p-4">
                        <div class="flex">
                            <div class="flex-shrink-0">
                                <svg class="h-5 w-5 text-red-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                            <div class="ml-3">
                                <h3 class="text-sm font-medium text-red-800">Body error</h3>
                                <div class="mt-2 text-sm text-red-700">
                                    <p>{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @enderror

                    <div class="sm:col-span-6 pt-5">
                        <label for="body" class="block text-sm font-medium text-gray-700">Body</label>
                        <div class="mt-1">
                            <textarea id="body" rows="3" wire:model="body" placeholder="Hmmm what should i write here ..."
                                class="shadow-sm focus:ring-indigo-500 appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out focus:border-indigo-500 block w-full sm:text-sm border-gray-300 rounded-md"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Add the body for your post.</p>
                    </div>
                    <button type="submit"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium leading-5 text-white transition duration-150 ease-in-out bg-indigo-500 border border-transparent rounded-md hover:bg-indigo-600 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 cursor-pointer">
                        Submit Post
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
