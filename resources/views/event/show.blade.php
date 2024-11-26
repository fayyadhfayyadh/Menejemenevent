<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body>
    <section class="bg-white dark:bg-gray-900">
    <div class="grid max-w-screen-xl px-4 py-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12">
        <div class="mr-auto place-self-center lg:col-span-7">
            <h1 class="max-w-2xl mb-4 text-4xl font-extrabold tracking-tight leading-none md:text-5xl xl:text-6xl dark:text-white">{{ $event->name }}</h1>
            <p class="max-w-2xl mb-6 font-light text-black-500 lg:mb-8 md:text-lg lg:text-xl dark:text-black-400">{{ $event->deskripsi }}</p>
            <p class="max-w-2xl mb-6 font-light text-black-500 lg:mb-8 md:text-lg lg:text-xl dark:text-black-400">pada tanggal : {{ $event->tanggal }}</p>
            <p class="max-w-2xl mb-6 font-light text-black-500 lg:mb-8 md:text-lg lg:text-xl dark:text-black-400">Di : {{ $event->lokasi}}</p>
            <a href="{{ route('event.index') }}" class="inline-flex items-center justify-center px-5 py-3 mr-3 text-base font-medium text-center text-black rounded-lg bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 dark:focus:ring-primary-900">
                Back to index
                <svg class="w-5 h-5 ml-2 -mr-1" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
            </a>
            
        </div>
        <div class="hidden lg:mt-0 lg:col-span-5 lg:flex">

            <td class="px-4 py-3"><img src="{{ Storage::url($event['foto']) }}"
                class="rounded" >
            </td>
        </div>                
    </div>
</section>
</body>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
</html>



