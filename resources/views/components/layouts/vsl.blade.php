<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ config('app.name') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.googleapis.com"/>

    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"/>

    @livewireStyles

    @vite('resources/css/app.css')

    <link rel="stylesheet" href="https://cdn.plyr.io/3.7.8/plyr.css" />

    <style>
        .plyr iframe[id^=youtube] { top: -50%; height: 200%;}iframe {pointer-events: none;}
    </style>

</head>
<body class="h-full  flex flex-col">

<div class="w-full">

    <div class="w-full flex justify-center h-full px-[2rem] bg-black py-[2rem]">
        <div>
            <div class="my-3 text-center">
                <h1 class="fontRusso text-[60px] text-[#FDB600]">Just buy it NOW!</h1>
                <h1 class="fontRusso text-[60px] text-white">Lorem Ipsum Lorem IpsumLorem Ipsum</h1>
            </div>

            <div class="w-full">
                <div class="w-full sm:w-2/3 m-auto">
                    <div class="relative border-2 border-gray-400 rounded-md shadow-md overflow-hidden">
                        <x-plyr link="https://www.youtube.com/watch?v=iNv1uVoDEgs" />
                    </div>
                </div>
            </div>

            <div class="my-8 fontOut flex flex-col space-y-7 items-center">
                <button class="text-[36px] font-[800] back rounded-md px-5 py-5 text-white">
                    <a href="#public/buy-it-claim1.html">Click here to access now</a>
                </button>
                <div class="px-3 py-4 border-4 border-[#FDB600] text-white fontRusso text-[36px]">Forem ipsum dolor sit amet, consectetur adipiscing elit. Nunc vulputate libero</div>
            </div>
        </div>

    </div>

</div>


<script src="https://cdn.plyr.io/3.7.8/plyr.polyfilled.js"></script>
<script>
    const player = new Plyr('#presenter');
</script>

@livewireScripts
</body>
</html>
