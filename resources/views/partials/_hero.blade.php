<section class="relative h-72 bg-laravel flex flex-col justify-center align-center text-center space-y-4 mb-4">
    <div class="absolute top-0 left-0 w-full h-full opacity-10 bg-no-repeat bg-center"></div>

    <div class="z-10">
        <h1 class="text-6xl font-bold uppercase text-white">
            Bear's<span class="text-black"> Base</span>
        </h1>
        {{-- <img src="/images/face.png" alt="" class="w-24 h-24 mx-auto"> --}} <p class="text-2xl text-gray-200 font-bold my-4">
            Some bears live in the woods... I live in the pantry
        </p>
        <div>
            @auth
                <a href="/listings/create"
                    class="inline-block border-2 border-white text-white px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">
                Post About Me Now!</a>
            @else
                <a href="/register"
                    class="inline-block border-2 border-white text-white px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black">Sign
                    Up to Post About Me</a>
            @endauth
        </div>
    </div>
</section>
