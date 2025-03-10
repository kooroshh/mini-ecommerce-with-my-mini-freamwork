@extends("layouts.complete")

@section("title","About Us")



@section('content')

    <div class="w-full px-4 bg-[radial-gradient(circle_at_center,#7775D6,#592E71,#030712_70%)] lg:bg-[radial-gradient(circle_at_center_150%,#7775D6,#592E71,#030712_70%)]">
        <header class="text-center  py-24 max-w-[800px] mx-auto">

            <h1 class="md:text-7xl text-5xl text-white tracking-tight font-semibold">Level Up Your Gaming Experience With Us</h1>
            <p class="mt-8 md:text-xl text-lg text-start md:text-center leading-8 text-gray-300 font-medium">Step into a world of limitless gaming! Whether you're looking for the latest AAA titles, hidden indie gems, or exclusive in-game content, we've got you covered. Enjoy unbeatable discounts, fast and secure purchases, and a seamless gaming experience all in one place. Power up your collection and game like never before!</p>

        </header>
    </div>
    <div class="px-4">


        <div class="py-5 border-t">

            <h2 class="text-gray-900 tracking-tight font-semibold text-5xl text-center md:text-start">Our Mission</h2>
            <div class="mt-6 flex flex-col md:flex-row">

                <div class="md:w-7/12 flex items-center">
                    <p class="text-gray-600 text-xl leading-8">At [Store Name], we aim to provide gamers with the best selection of games at unbeatable prices. We’re dedicated to offering an exceptional gaming experience, from fast downloads to exclusive content and amazing discounts. Join us and elevate your gaming journey today!</p>
                </div>
                <div class="flex justify-center md:w-5/12">
                    <div class=" flex flex-col space-y-8 mt-10 md:mt-0">

                        <div class="flex flex-col gap-4 text-center md:text-start">
                            <h5 class="text-gray-900 tracking-tight font-semibold text-5xl">Over 27,000</h5>
                            <p class="text-base text-indigo-600">Active Users</p>
                        </div>

                        <div class="flex flex-col gap-4 text-center md:text-start">
                            <h5 class="text-gray-900 tracking-tight font-semibold text-5xl">Over 200,000</h5>
                            <p class="text-base text-indigo-600">Order</p>
                        </div>

                        <div class="flex flex-col gap-4 text-center md:text-start">
                            <h5 class="text-gray-900 tracking-tight font-semibold text-5xl">Over 2,000</h5>
                            <p class="text-base text-indigo-600">Products</p>
                        </div>

                    </div>    
                </div>            
            </div>
        </div>

        <img class="my-10 rounded brightness-75 transition-all ease-in-out hover:brightness-100" src="{{ image('game.webp') }}" alt="Game">

        <div class="my-5">

            <div class="max-w-[42rem]">
                <h2 class="tracking-tight text-gray-900 text-5xl font-semibold mb-3">Our Teams</h2>
                <p class="text-gray-600 text-lg leading-8">We’re a dynamic group of individuals who are passionate about what we do and dedicated to delivering the best results for our clients.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-5 sm:grid-cols-3 gap-8  mt-20 p-10 border border-gray-200 outline outline-offset-4 outline-gray-300 bg-white rounded-3xl">

                <div>

                    <img class="rounded-full size-24 mx-auto" src="/assets/images/users/user.webp" alt="User Image">
                    <h3 class="tracking-tight text-gray-900 font-semibold text-base mt-6 text-center">Koorosh Soleymani Fard<h3>
                    <p class="text-gray-600 text-sm text-center">Front-End Developer</p>

                </div>

                <div>

                    <img class="rounded-full size-24 mx-auto" src="/assets/images/users/user.webp" alt="User Image">
                    <h3 class="tracking-tight text-gray-900 font-semibold text-base mt-6 text-center">Koorosh Soleymani Fard<h3>
                    <p class="text-gray-600 text-sm text-center">Designer</p>

                </div>

                <div>

                    <img class="rounded-full size-24 mx-auto" src="/assets/images/users/user.webp" alt="User Image">
                    <h3 class="tracking-tight text-gray-900 font-semibold text-base mt-6 text-center">Koorosh Soleymani Fard<h3>
                    <p class="text-gray-600 text-sm text-center">Back-End Developer</p>

                </div>

                <div>

                    <img class="rounded-full size-24 mx-auto" src="/assets/images/users/user.webp" alt="User Image">
                    <h3 class="tracking-tight text-gray-900 font-semibold text-base mt-6 text-center">Koorosh Soleymani Fard<h3>
                    <p class="text-gray-600 text-sm text-center">Business Relations</p>

                </div>

                <div>

                    <img class="rounded-full size-24 mx-auto" src="/assets/images/users/user.webp" alt="User Image">
                    <h3 class="tracking-tight text-gray-900 font-semibold text-base mt-6 text-center">Koorosh Soleymani Fard<h3>
                    <p class="text-gray-600 text-sm text-center">Director of Product</p>

                </div>

                <div>

                    <img class="rounded-full size-24 mx-auto" src="/assets/images/users/user.webp" alt="User Image">
                    <h3 class="tracking-tight text-gray-900 font-semibold text-base mt-6 text-center">Koorosh Soleymani Fard<h3>
                    <p class="text-gray-600 text-sm text-center">Copywriter</p>

                </div>

                <div>

                    <img class="rounded-full size-24 mx-auto" src="/assets/images/users/user.webp" alt="User Image">
                    <h3 class="tracking-tight text-gray-900 font-semibold text-base mt-6 text-center">Koorosh Soleymani Fard<h3>
                    <p class="text-gray-600 text-sm text-center">Senior Developer</p>

                </div>

            </div>

        </div>

    </div>




@endsection
