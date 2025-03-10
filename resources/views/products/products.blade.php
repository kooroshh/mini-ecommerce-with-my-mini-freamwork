@extends("layouts.complete")


@section("title", "Products Page")


@section("content")

    <div class="grid lg:grid-cols-3 lg:gap-x-8 pb-24 pt-12 px-5">
    
        <div>

            <form action="/products" method="post" novalidate class="flex flex-col">
                <input type="hidden" name="_token" value="{{ session()->get('_token') }}">

                <div class="flex py-10 w-full">
                    <input type="search" name="search" id="search" class="border rounded rounded-r-none p-2 outline-none grow" value="{{ $search ? $search : '' }}">
                    <button class="border border-l-0 rounded rounded-l-none p-2 bg-indigo-600 text-white" type="submit" name="filter" value="search">
                        <svg class="size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m21 21-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z" />
                        </svg>
                    </button>
                </div>
                @if ($errors->has('search'))
                    <p class="text-xs text-red-500 -mt-5 pb-5 pl-2.5">{{ $errors->first("search") }}</p>
                @endif
                
                <div class="py-10 border-t">

                    <h3 class="text-gray-900 font-medium text-sm block">Categories</h3>
                    <div class="pt-6 space-y-6">

                        @if ($categories)


                            
                            @foreach ($categories as $category)
                                <div class="flex gap-3 items-center ml-2">

                                    @if ($lastCategories)
                                        @if (in_array($category->name, $lastCategories))
                                            <input checked type="checkbox" name="categories[]" value="{{ $category->name }}" id="category_{{ $category->name }}" class="bg-white border border-gray-300  rounded-sm size-4 shrink-0">
                                        @else
                                            <input type="checkbox" name="categories[]" value="{{ $category->name }}" id="category_{{ $category->name }}" class="bg-white border border-gray-300  rounded-sm size-4 shrink-0">
                                        @endif
                                        <label for="category_{{ $category->name }}" class="text-gray-600 text-sm">{{ $category->name }}</label>
                                    @else
                                        <input type="checkbox" name="categories[]" value="{{ $category->name }}" id="category_{{ $category->name }}" class="bg-white border border-gray-300  rounded-sm size-4 shrink-0">
                                        <label for="category_{{ $category->name }}" class="text-gray-600 text-sm">{{ $category->name }}</label>

                                    @endif


                                </div>
                            @endforeach


                            <div class="pt-4">
                                <button class="bg-indigo-600 text-white font-medium rounded-lg py-2 w-full" type="submit" name="filter" value="filter">Filter</button>
                            </div>
                            @if ($errors->has('categories'))
                                <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("categories") }}</p>
                            @endif

                        @else
                            <p class="text-gray-500 text-lg text-center w-full">There is not any category yet!</p>
                        @endif

                    </div>

                </div>

            </form>



        </div>
        <div class="lg:mt-0 mt-6 lg:col-span-2">

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:gap-x-8 sm:gap-x-6 gap-y-4 lg:gap-y-10">

                @if ($products)
                
                    @foreach ($products as $product)
                    
                        <a href="/products/{{ $product->slug }}" class="block">
                            <div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">

                                <img class="sm:h-96 object-cover bg-gray-200" src="{{ image($product->image, "products") }}" alt="Product Image">
                                <div class="p-4 flex-1 flex flex-col space-y-2">

                                    <h3 class="text-gray-900 font-medium">{{ $product->name }}</h3>
                                    <p class="text-gray-500 truncate">{{ $product->description }}</p>
                                    <p class="text-gray-500 text-sm">Stock: {{ $product->slug }}</p>
                                    <p class="text-gray-900 font-medium text-base">${{ $product->price }}</p>
                                </div>

                            </div>
                        </a>

                    @endforeach

                @else
                    <p class="text-gray-500 text-lg text-center w-full col-start-1 col-end-3">There is not any product yet!</p>
                @endif

            </div>

        </div>

    </div>

@endsection