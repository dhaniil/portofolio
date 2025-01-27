<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dhani Portofolio</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        
        <!-- Alpine Plugins -->
        <script defer src="https://unpkg.com/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
        
        <!-- Alpine Core -->
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
        
        
        <link href="{{asset('css/app.css')}}" rel="stylesheet">
        <style>
            html {
                scroll-behavior: smooth;
                height: 100%;
                overflow: hidden;
            }
            body {
                height: 100%;
                overflow: hidden;
            }
            .snap-container {
                height: 100vh;
                overflow-y: scroll;
                scroll-snap-type: y mandatory;
                position: relative;
                -ms-overflow-style: none;  /* IE and Edge */
                scrollbar-width: none;     /* Firefox */
            }
            .snap-container::-webkit-scrollbar {
                display: none;  /* Chrome, Safari and Opera */
            }
            .snap-section {
                scroll-snap-align: start;
                scroll-snap-stop: always;
                height: 100vh;
                width: 100%;
            }
            .parallax-container {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                z-index: 0;
            }
            .content-container {
                position: relative;
                z-index: 1;
                margin-top: 100vh;
            }
            .section-overlay {
                position: relative;
                background-color: rgb(17 24 39 / 0.97);
                backdrop-filter: blur(8px);
                min-height: 100vh;
            }
        </style>
    </head>
    <body class="bg-gray-900">    
        <x-navigation />
        <div class="snap-container" id="main-container">
            <!-- First Section (Home) -->
            <section id="home" class="snap-section h-screen relative">
                <x-greeting />
            </section>
            
            <!-- Content Sections -->
            <section id="about" class="snap-section">
                <div class="section-overlay">
                    <x-about />
                </div>
            </section>
            <section id="content" class="snap-section">
                <div class="section-overlay">
                    <x-portofolio :skills="$skills" :projects="$projects" />
                </div>
            </section>
            <section id="contact" class="snap-section">
                <div class="section-overlay">
                    <x-contact />
                </div>
            </section>
        </div>
    </body>
</html> 
