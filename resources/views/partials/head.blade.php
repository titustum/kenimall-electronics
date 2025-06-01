<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<title>{{ $title ?? 'Laravel' }}</title>

<link rel="preconnect" href="https://fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

<!-- Google Font: Righteous -->
<link
    href="https://fonts.googleapis.com/css2?family=Righteous&family=Poppins:wght@100;200;300;400;500;600;700&family=Roboto:wght@100;300;400;500;700&display=swap"
    rel="stylesheet">


<!-- Tailwind CSS CDN -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<!-- Font Awesome CDN -->
<link rel="stylesheet" href="{{  asset('assets/font-awesome-6-pro-main/css/all.min.css') }}">

<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.46.0/tabler-icons.min.css" />

<link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />

<style>
    body {
        font-family: 'Instrument Sans', sans-serif;
    }
</style>

@fluxAppearance