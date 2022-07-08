<x-layout>
    <x-card class="p-10 rounded max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit Post
            </h2>
            <p class="mb-4">Edit: {{$listing->title}}</p>
        </header>

        <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
            @csrf
            {{-- method for put request --}}
            @method('PUT')
            {{-- uses value attribute to keep old text in case of error --}}
            <div class="mb-6">
                <label for="company" class="inline-block text-lg mb-2">Post Category</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="company" value="{{$listing->company}}" />
            </div>

            @error('company')
                <p class="text-red-500 text-xs mt-1">The Post Category field is required</p>
            @enderror

            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Post Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title" value="{{$listing->title}}"/>
            </div>

            @error('title')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location" value="{{$listing->location}}"/>
            </div>

            @error('location')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            {{-- <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email" value="{{$listing->email}}" />
            </div>

            @error('email')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <label for="website" class="inline-block text-lg mb-2">
                    Website/Application URL
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="website" value="{{$listing->website}}"/>
            </div>

            @error('website')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
 --}}
            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                     value="{{$listing->tags}}"/>
            </div>

            @error('tags')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

           {{--  <div class="mb-6">
                <label for="logo" class="inline-block text-lg mb-2">
                    Photo
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="logo" />
                <img class="w-48 mr-6 mb-6"
                src="{{ $listing->logo ? asset('storage/' . $listing->logo) : asset('/images/no-image.png') }}"
                alt="" />
            </div> 

            @error('logo')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror --}}

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10"
                     >{{$listing->description}}</textarea>
            </div>

            @error('description')
                <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror

            <div class="mb-6">
                <button class="bg-laravel text-white rounded py-2 px-4 hover:bg-black">
                    Update Post
                </button>

                <a href="/" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
</x-layout>
