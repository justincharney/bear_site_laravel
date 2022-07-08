<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Create a Post
            </h2>
            <p class="mb-4">Every time you create a post Bear gets a treat</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf

            {{-- uses value attribute to keep old text in case of error --}}
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Post Category</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" placeholder="Example: Treats, Random Thoughts, Dinner" value="{{old('company')}}" />
            </div>

            @error('company')
                <p class="text-red-500 text-xs mt-1">The Post Category field is required</p>
            @enderror

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Post Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    placeholder="Example: I Am Hungry" value="{{old('title')}}"/>
            </div>

            @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Post Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    placeholder="Example: Pantry, Kitchen, Den" value="{{old('location')}}"/>
            </div>

            @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            {{-- <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{old('email')}}" />
            </div>

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror --}}

           {{--  <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Link Any Website or URL?
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{old('website')}}"/>
            </div>

           @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror --}}

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: Treats, Funny, Play, Tired" value="{{old('tags')}}"/>
            </div>

            @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            {{-- <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Photo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
            </div> 

            @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror --}}

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                    placeholder="What's on your mind?" >{{old('description')}}</textarea>
            </div>

            @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Create Post
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
