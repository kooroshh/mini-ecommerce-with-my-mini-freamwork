@extends("layouts.complete")

@section("title","Home Page")

@section('content')

    <div class="w-full px-4 bg-[radial-gradient(circle_at_center,#7775D6,#592E71,#030712_70%)] lg:bg-[radial-gradient(circle_at_center_150%,#7775D6,#592E71,#030712_70%)]">
        <header class="text-center  py-24 max-w-[800px] mx-auto">

            <h1 class="md:text-7xl text-5xl text-white tracking-tight font-semibold">Level Up Your Gaming Experience With Us</h1>
            <p class="mt-8 md:text-xl text-lg text-start md:text-center leading-8 text-gray-300 font-medium">Step into a world of limitless gaming! Whether you're looking for the latest AAA titles, hidden indie gems, or exclusive in-game content, we've got you covered. Enjoy unbeatable discounts, fast and secure purchases, and a seamless gaming experience all in one place. Power up your collection and game like never before!</p>
            <a href="/about-us" class="block md:text-lg text-md font-medium bg-white py-2 px-5 rounded-md mt-4 w-fit mx-auto shadow-lg border hover:text-white hover:bg-clip-text transition">More About Us...</a>
        </header>
    </div>

    <div class="px-4">

        <div class="mt-10 lg:p-10 sm:p-8 p-5">
            <img class="rounded-lg object-cover sm:w-9/12 mx-auto" src="{{ image('games.webp') }}" alt="Games">
        </div>

        <div class="mt-10">

            <div class="lg:text-center max-w-[42rem] mx-auto">

                <h2 class="text-indigo-600 font-semibold text-base">Why us?</h2>
                <p class="lg:text-center text-pretty tracking-tight font-semibold text-4xl lg:text-5xl text-gray-900 mt-2">Top quality, best deals</p>
                <p class="text-gray-600 text-pretty text-lg mt-6">We offer top-quality games, exclusive deals, and dedicated support to ensure the ultimate gaming experience.</p>

            </div>
            
            <div class="lg:max-w-[56rem] max-w-[42rem] lg:mt-24 sm:mt-20 mt-16 mx-auto">

                <div class="grid lg:grid-cols-2 grid-cols-1 lg:max-w-none max-w-[36rem] lg:gap-y-16 gap-y-10 gap-x-8">

                    <div class="flex gap-3">

                        <div class="flex-none">
                            <div class="p-2 bg-indigo-600 rounded-md">
                                <svg  class="size-6 stroke-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="grow text-base">

                            <h4 class="text-gray-900 font-semibold">Safe</h4>
                            <p class="text-gray-600 mt-2">We prioritize your security with advanced encryption, secure transactions, and strict data protection measures. Our platform ensures a safe and trustworthy gaming environment, giving you peace of mind while you enjoy your favorite games. Play with confidence, knowing your information and purchases are always protected.</p>

                        </div>

                    </div>

                    <div class="flex gap-3">

                        <div class="flex-none">
                            <div class="p-2 bg-indigo-600 rounded-md">
                                <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="grow text-base">

                            <h4 class="text-gray-900 font-semibold">Cheap</h4>
                            <p class="text-gray-600 mt-2">we offer the best prices on video games. Enjoy a vast selection of cheap games across all genres, with discounts that make gaming affordable for everyone. Shop with confidence and get more for less!</p>

                        </div>

                    </div>

                    <div class="flex gap-3">

                        <div class="flex-none">
                            <div class="p-2 bg-indigo-600 rounded-md">
                                <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="grow text-base">

                            <h4 class="text-gray-900 font-semibold">Fast</h4>
                            <p class="text-gray-600 mt-2">we ensure lightning-fast delivery of your favorite video games. With our efficient system, you can start playing in no time. Quick, easy, and hassle-free – gaming made fast!</p>

                        </div>

                    </div>

                    <div class="flex gap-3">

                        <div class="flex-none">
                            <div class="p-2 bg-indigo-600 rounded-md">
                                <svg class="size-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 0 0 2.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 0 1-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 0 0-1.091-.852H4.5A2.25 2.25 0 0 0 2.25 4.5v2.25Z" />
                                </svg>
                            </div>
                        </div>
                        <div class="grow text-base">

                            <h4 class="text-gray-900 font-semibold">Support</h4>
                            <p class="text-gray-600 mt-2">Our dedicated support team is here to help you every step of the way. Whether you have questions or need assistance, we're available 24/7 to ensure your gaming experience is smooth and enjoyable.</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="mt-20">

            <div class="lg:text-center max-w-[42rem] mx-auto">

                <h2 class="text-indigo-600 font-semibold text-base">Categories</h2>
                <p class="lg:text-center text-pretty tracking-tight font-semibold text-4xl lg:text-5xl text-gray-900 mt-2">Everything that you want</p>
                <p class="text-gray-600 text-pretty text-lg mt-6">Find all the games you love, from action-packed adventures to strategic challenges.</p>
                
            </div>

            <a href="/products" class="block text-indigo-600 w-full text-end lg:px-10 mt-15 hover:underline">See all -></a>
            <div class="flex justify-between w-full lg:px-10 mt-5">
                
                @foreach ($categories as $category)
                    <a href="/products" class="block">
                        <div class="p-5 bg-gray-50 rounded-md text-lg text-indigo-600">
                            {{ $category->name }}
                        </div>
                    </a>
                @endforeach

            </div>

        </div>

        <div class="mt-20">
            
            <div class="lg:text-center max-w-[42rem] mx-auto">

                <h2 class="text-indigo-600 font-semibold text-base">Products</h2>
                <p class="lg:text-center text-pretty tracking-tight font-semibold text-4xl lg:text-5xl text-gray-900 mt-2">Look for everything you want</p>
                <p class="text-gray-600 text-pretty text-lg mt-6">Find all the games and deals you're looking for in one place!</p>

            </div>

            <a href="/products" class="block text-indigo-600 w-full text-end lg:px-10 mt-15 hover:underline">See all -></a>
            <div class="grid grid-cols-3 gap-8 mt-10">
                
                @foreach ($products as $product)
                    
                    <a href="/products/{{ $product->slug }}" class="block">
                        <div class="bg-white border border-gray-200 rounded-lg overflow-hidden flex flex-col">

                            <img class="sm:h-96 object-cover hover:scale-105 transition duration-500 bg-gray-200" src="{{ image($product->image, "products") }}" alt="Product Image">
                            <div class="p-4 flex-1 flex flex-col space-y-2">

                                <h3 class="text-gray-900 font-medium">{{ $product->name }}</h3>
                                <p class="text-gray-900 font-medium text-base">${{ $product->price }}</p>
                            </div>

                        </div>
                    </a>

                @endforeach
            </div>

        </div>

    </div>



@endsection