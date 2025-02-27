@extends("layouts.master")

@section("title","contact-us")

@section('content')

    <div class="px-8">
        <div class="flex md:flex-row flex-col justify-between mt-20 gap-6">

            <div class="md:w-4/12 text-center md:text-start flex flex-col ">                
                <h2 class="text-gray-900 w-full tracking-tight font-semibold text-4xl">Contact Us</h2>
                <p class="mt-4 text-gray-600 text-base leading-6">We’re here to answer your questions and help you out. Feel free to reach us anytime</p>
            </div>
            <div class="grid md:grid-cols-2 gap-4 grid-cols-1 md:w-7/12">

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Telegram</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="https://t.me/support" target="_blank">Send Message To Telegram</a>
                </div>

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Email</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="mailto:kooroshsoleymani98@gmail.com">Send Email</a>
                </div>

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Phone</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="tel:+989201518662">Call</a>
                </div>

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Message</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="sms:tel:+989201518662">Send Message</a>
                </div>

            </div>

        </div>


        <div class="flex md:flex-row flex-col justify-between mt-20 gap-6 pt-20 border-t-2 mb-6">

            <div class="md:w-4/12 text-center md:text-start flex flex-col ">                
                <h2 class="text-gray-900 w-full tracking-tight font-semibold text-4xl">Social Medias</h2>
                <p class="mt-4 text-gray-600 text-base leading-6">Stay connected with us on social media for the latest updates and exclusive content!</p>
            </div>
            <div class="grid md:grid-cols-2 gap-4 grid-cols-1 md:w-7/12">

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Telegram</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="https://t.me/support" target="_blank">Join us for news updates</a>
                </div>

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Facebook</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="mailto:kooroshsoleymani98@gmail.com">Explore More Here</a>
                </div>

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Instagram</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="tel:+989201518662">View Important News</a>
                </div>

                <div class="p-10 bg-gray-50 rounded-2xl flex flex-col">
                    <h3>Twitter</h3>
                    <a class="mt-3 text-sm leading-5 text-indigo-600 font-semibold" href="sms:tel:+989201518662">Follow Us</a>
                </div>

            </div>

        </div>

    </div>

@endsection