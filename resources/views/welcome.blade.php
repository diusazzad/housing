<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Figtree:wght@400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lipis/flag-icons@7.2.3/css/flag-icons.min.css" />
    @vite('resources/css/app.css')

</head>

<body class="font-sans">

    <div class="flex items-center justify-between p-8 m-2 bordecoration-slice">
        <div class="flex">
            <div class="pt-2 ">
                <img class="" fetchpriority="auto" class="_jp1dfr T_940e316a T_6ec9dbda _5j1y44 _vy1vi7 _e21vi7 img"
                    alt="app download" decoding="async"
                    src="//c.housingcdn.com/demand/s/client/common/assets/housing.60f7468d.jpg">
            </div>
            <div class="justify-between">
                <div class="relative flex flex-col justify-between p-2 font-normal  ">
                    <div class="font-extralight ">Housing is better on the app</div>
                    <div class="block ">
                        <span class="">4.6</span>
                        <span class="">~</span>
                        <span class="">1Cr+ Downloads</span>
                    </div>

                </div>
            </div>
        </div>


        <button
            class="px-12 py-4 border font-semibold text-violet-800 transition duration-200 ease-in-out bg-white-400 rounded-lg shadow-md hover:bg-blue-600 sm:px-6 md:px-8 lg:px-10">
            Click Me
        </button>

    </div>

    <div class="bg-purple-800 text-white">
        <header class="flex items-center justify-between px-4 pt-4">
            <div class="">Mumbai</div>
            <div class=" flex justify-between  items-center gap-3 p-1 m-1">
                <a href="" class="">List Property</a>
                <img class="h-6 w-6" fetchpriority="auto"
                    class="_jp1dfr T_940e316a _lk19bv _e214e6 _vy66rk T_010fff56 img" data-q="mobile-profile-icon"
                    decoding="async" src="//c.housingcdn.com/demand/s/client/common/assets/ProfileIcon.512d8882.svg">
            </div>
        </header>
        <div class="font-medium m-8 p-0 justify-center flex">
            <img fetchpriority="high" class="_jp1dfr T_940e316a _9s1ule _e2exct _gi1nqt T_6ec9dbda img"
                alt="Housing logo" decoding="async"
                src="//c.housingcdn.com/demand/s/client/common/assets/housing.820bbe77.png">
        </div>
        <div class=" items-center flex justify-center  ">
            Properties to buy in
        </div>

        <nav class="m-2 p-10 text-center whitespace-nowrap block leading-5 ">
            <a href="" class="bg-purple-900 m-1 p-4 rounded">Buy</a>
            <a href="" class="bg-purple-900 m-1 p-4 rounded">Rent</a>
            <a href="" class="bg-purple-900 m-1 p-4 rounded">Commercial</a>
            <a href="" class="bg-purple-900 m-1 p-4 rounded">Plots</a>
            <a href="" class="bg-purple-900 m-1 p-4 rounded">PG</a>
        </nav>
        <div class="bg-purple-700 shadow-lg m-4 flex items-center p-4 rounded-lg">
            <span class="text-white text-sm mr-2">Search</span>
            <input type="text" placeholder='Search "Malad West"'
                class="flex-grow bg-purple-400 text-white border border-transparent focus:outline-none focus:border-white rounded-lg py-2 px-4" />
            <button
                class="ml-2 bg-purple-600 hover:bg-purple-700 text-white font-semibold py-2 px-4 rounded-lg flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-1" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 4a6 6 0 100 12 6 6 0 000-12zm0 0l8 8m-8-8l-8 8" />
                </svg>
                Search
            </button>
        </div>

        <div class="font-medium  items-center  m-2 p-4 bg-violet-800 rounded-t-3xl drop-shadow-md">
            <section class="text-center">
                are you an Owner? Post property for free >
            </section>
        </div>

    </div>

    <div class="bg-white text-violet-600 justify-center flex-col gap-2 ">
        <div class="items-center flex pl-6 m-4">
            <span class="fi fi-us mr-2"></span> <!-- Add your desired flag here -->
            <span class="text-lg font-semibold">Popular Landmarks</span>
        </div>
        <div class="pl-6 flex h-16 items-center">
            <div class="w-full flex h-full relative">
                <div class="flex items-center p-2 m-2 rounded bg-violet-200">
                    Malad
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                <div class="flex items-center p-2 m-2 rounded bg-violet-200">
                    Chembur
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                <div class="flex items-center p-2 m-2 rounded bg-violet-200">
                    Jeevan
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                <div class="flex items-center p-2 m-2 rounded bg-violet-200">
                    critiCare
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
                <div class="flex items-center p-2 m-2 rounded bg-violet-200">
                    More
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1 text-gray-600" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <div class="border mt-4 flex p-4 content-center rounded-lg shadow-lg bg-white">
        <div class="border m-4 flex flex-col justify-between w-full">
            <div class="flex items-center">
                <img src="https://via.placeholder.com/24" alt="Flag Icon" class="mr-2" />
                <a href="#" class="text-lg font-bold text-purple-600 hover:underline">Zero Brokerage Rent
                    Properties</a>
            </div>
            <div class="text-gray-600 mt-2">Upgrade to Premium & get access to Zero Brokerage Properties</div>
            <a href="#"
                class="mt-4 bg-purple-600 text-white font-semibold py-2 px-4 rounded-lg hover:bg-purple-700 transition duration-200 ease-in-out">Upgrade
                Now</a>
        </div>
    </div>

    {{-- <div class="bg-white">
        <div class="m-8 p-6 rounded-lg">
            <h1>Project in <b>Focus</b></h1>
            <h3>Noteworthy projects in Mumbai</h3>
        </div>
        <div class="accordion-container">
            @foreach ($cities as $city)
            <div class="accordion-item">
                <button
                    class="accordion-button group relative flex w-full items-center justify-start p-4 text-left text-sm font-medium text-gray-900 transition-colors duration-300 ease-in-out transform sm:text-base lg:text-lg hover:text-primary focus:outline-none focus-visible:ring-2 focus-visible:ring-offset-2 focus-visible:ring-primary"
                    type="button" aria-expanded="true">
                    {{ $city->name }} ({{ $city->state }})
                    <span class="duration-300 ease-in-out transform group-hover:rotate-180">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                        </svg>
                    </span>
                </button>
                <div class="accordion-collapse collapse show" id={`collapse-${$loop->iteration}`}>
                    <div class="accordion-body p-4 text-sm text-gray-500">
                        <h4 class="text-lg font-semibold mb-2">Localities:</h4>
                        <ul class="list-disc pl-5 space-y-1">
                            @foreach ($city->localities as $locality)
                            <li>{{ $locality->name }}: {{ $locality->description }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div> --}}



</body>

</html>