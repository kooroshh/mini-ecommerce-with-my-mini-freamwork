@extends("layouts.admin-panel.master")


@section("title", "Admin Panel")

@section("page")
    <a href="/admin-panel/products" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Products /</a> Edit Product
@endsection


@section('content')

    <div class="p-3">
        <form class="space-y-6" action="/admin-panel/products/edit" method="post" enctype="multipart/form-data" novalidate>
            <input type="hidden" name="_token" value="{{ session()->get('_token') }}">
            <input type="hidden" name="id" value="{{ $product->id }}">
            
            <div class="flex flex-col justify-center items-center gap-2 mx-auto">
                <div>
                    <img id="objectImage" class="w-2/12 mx-auto rounded-md" src="{{ image($product->image, "products") }}" alt="Product Image">
                </div>
                <label id="image" class="cursor-pointer block bg-indigo-600 text-white px-6 py-3 rounded-lg shadow-md hover:bg-indigo-700 transition">
                    Select Image
                    <input type="file" class="hidden" id="image" name="image" accept=".jpg, .jpeg, .png">
                </label>
                @if ($errors->has('image'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("image") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="name">Name</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="name" id="name" value="{{ $product->name }}">
                </div>
                @if ($errors->has('name'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("name") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="slug">Slug</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 block w-full rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="slug" id="slug" value="{{ $product->slug }}">
                </div>
                @if ($errors->has('slug'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("slug") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="description">Description</label>
                <div class="mt-2">
                    <textarea class="text-sm py-1.5 px-3 w-full min-h-20 rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" name="description" id="description">{{ $product->description }}</textarea>
                </div>
                @if ($errors->has('description'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("description") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="price">Price</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 w-full block rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="text" name="price" id="price" value="{{ $product->price }}">
                </div>
                @if ($errors->has('price'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("price") }}</p>
                @endif
            </div>

            <div>
                <label class="text-gray-900 font-medium text-sm block" for="count">Count</label>
                <div class="mt-2">
                    <input class="text-sm py-1.5 px-3 w-full block rounded-md bg-white outline outline-1 -outline-offset-1 outline-gray-300" type="number" name="count" id="count" value="{{ $product->count }}">
                </div>
                @if ($errors->has('count'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("count") }}</p>
                @endif
            </div>

            <div>
                <h3 class="text-gray-900 font-medium text-sm block" for="categories">Categories</h3>
                <div class="mt-2 bg-white py-3 px-6 flex flex-wrap gap-7 items-center rounded-md">

                    @foreach ($categories as $key => $value)

                        @if ($oldCategories)

                            @if (in_array($value->name, $oldCategories))
                                <label class="bg-gray-200 rounded-full px-4 py-2 select-none" for="category_{{ $key }}">
                                    <input checked type="checkbox" class="checker hidden" name="categories[]" id="category_{{ $key }}" value="{{ $value->name }}">
                                    {{ $value->name }}
                                </label>
                            @else
                                <label class="border rounded-full px-4 py-2 select-none" for="category_{{ $key }}">
                                    <input  type="checkbox" class="checker hidden" name="categories[]" id="category_{{ $key }}" value="{{ $value->name }}">
                                    {{ $value->name }}
                                </label>
                            @endif

                        @else
                            <label class="border rounded-full px-4 py-2 select-none" for="category_{{ $key }}">
                                <input  type="checkbox" class="checker hidden" name="categories[]" id="category_{{ $key }}" value="{{ $value->name }}">
                                {{ $value->name }}
                            </label>
                        @endif

                    @endforeach
                </div>
                @if ($errors->has('categories'))
                    <p class="text-xs text-red-500 mt-1 pl-2.5">{{ $errors->first("categories") }}</p>
                @endif
            </div>


            <div class="pt-4">
                <button type="submit" class="shadow text-white font-semibold text-sm px-3 py-1.5 bg-indigo-600 rounded-md w-full">Edit Product</button>
            </div>

        </form>
    </div>

@endsection



