<div>
    <header class="sticky text-gray-700 body-font border-b">
        <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
            <nav class="flex lg:w-2/5 flex-wrap items-center text-base md:ml-auto">
                <a href="/" class="mr-5 hover:text-gray-900">Home</a>
                <a href="/post/my" class="mr-5 hover:text-gray-900">My Blogs</a>
                <a href="/post/create" class="mr-5 hover:text-gray-900">Create Blogs</a>
                <a href="/about" class="mr-5 hover:text-gray-900">About</a>
            </nav>
            <a class="flex order-first lg:order-none lg:w-1/5 title-font font-bold items-center text-gray-900 lg:items-center lg:justify-center mb-4 md:mb-0">
                BLOGX
            </a>
            <div class="lg:w-2/5 inline-flex lg:justify-end ml-5 lg:ml-0 space-x-4">
                @if (session()->missing('login'))
                <a href="/auth/login" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">Login</a>
                @endif
                @if (session()->has('login'))
                    <a href="#" class="inline-flex items-center bg-gray-200 border-0 py-1 px-3 focus:outline-none hover:bg-gray-300 rounded text-base mt-4 md:mt-0">{{ session()->get('name') }}</a>
                    <a href="/auth/logout" class="inline-flex items-center bg-red-200 border-0 py-1 px-3 focus:outline-none hover:bg-red-300 rounded text-base mt-4 md:mt-0">Logout</a>
                @endif
            </div>
        </div>
    </header>    
</div>