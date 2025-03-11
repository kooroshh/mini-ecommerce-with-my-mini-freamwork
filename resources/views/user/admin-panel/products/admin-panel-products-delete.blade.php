@extends("layouts.admin-panel.master")


@section("title", "Admin Panel")

@section("page")
    <a href="/admin-panel/products" class="pr-3 text-2xl leading-8 text-gray-400 font-medium">Products /</a> Delete
@endsection


@section('content')

    <div class="p-3">
        <div class="bg-white p-6 rounded-lg flex flex-col">

            <div class="flex flex-col lg:flex-row justify-center lg:justify-start items-center gap-4 pb-4">
                <div class="rounded-full bg-red-300/50 size-10 flex justify-center items-center">
                    <svg class="size-6 text-red-600 shrink-0" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126ZM12 15.75h.007v.008H12v-.008Z"></path>
                    </svg>
                </div>
                <div class="text-center lg:text-left">
                    <h3 class="font-semibold">Delete Product?</h3>
                    <p>Are you sure that you want to delete this product with slug : <span class="italic font-medium text-red-400">{{ $productSlug }}</span> ?</p>
                </div>
            </div>
            <div class="bg-gray-50 flex justify-between lg:justify-end gap-3 py-3 px-6 rounded">
                <div class="w-full lg:w-4/12 flex items-center gap-4">
                    <a href="/admin-panel/products" class="block bg-white py-2 px-3 rounded border-2 w-6/12 text-center">Cancel</a>
                    <form action="/admin-panel/products/delete" method="post" class="w-6/12">
                        <input type="hidden" name="_token" value="{{ session()->get('_token') }}">
                        <input type="hidden" name="productId" value="{{ $productId }}">
                        <button class="text-white bg-red-600 py-2 px-3 rounded w-full text-center">Delete</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection



