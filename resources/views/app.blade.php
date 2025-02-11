<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Dhani Portofolio</title>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js"></script>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet"
        <link rel="icon" href="/public/icon.png" type="image/png"/>

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
                -webkit-overflow-scrolling: touch;
                -ms-overflow-style: none;
                scrollbar-width: none;
                scroll-behavior: smooth;
                will-change: scroll-position;
            }
            .snap-container::-webkit-scrollbar {
                display: none;  /* Chrome, Safari and Opera */
            }
            .snap-section {
                scroll-snap-align: start;
                scroll-snap-stop: always;
                height: 100vh;
                width: 100%;
                transform: translateZ(0);
                backface-visibility: hidden;
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
            @media (prefers-reduced-motion: reduce) {
                html {
                    scroll-behavior: auto;
                }
                
                .snap-container {
                    scroll-behavior: auto;
                }
            }
        </style>

        <script>
            function throttle(func, limit) {
                let inThrottle;
                return function() {
                    const args = arguments;
                    const context = this;
                    if (!inThrottle) {
                        func.apply(context, args);
                        inThrottle = true;
                        setTimeout(() => inThrottle = false, limit);
                    }
                }
            }

            document.addEventListener('DOMContentLoaded', () => {
                const container = document.querySelector('.snap-container');
                
                // Throttle scroll event
                container.addEventListener('scroll', throttle(() => {
                    const sections = document.querySelectorAll('.snap-section');
                    let currentSection = '';
                    
                    sections.forEach(section => {
                        const rect = section.getBoundingClientRect();
                        if (rect.top >= -100 && rect.top <= 100) {
                            currentSection = section.id;
                        }
                    });
                    
                    if (currentSection) {
                        history.replaceState(null, null, `#${currentSection}`);
                    }
                }, 100));

                // Smooth scroll untuk link navigasi
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function (e) {
                        e.preventDefault();
                        const targetId = this.getAttribute('href').substring(1);
                        const target = document.getElementById(targetId);
                        
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                        }
                    });
                });

                // Optimize IntersectionObserver
                const observerOptions = {
                    root: null,
                    rootMargin: '0px',
                    threshold: 0.5
                };

                const observer = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            requestAnimationFrame(() => {
                                entry.target.classList.add('visible');
                            });
                            observer.unobserve(entry.target); // Unobserve setelah trigger
                        }
                    });
                }, observerOptions);

                // Observe elements dengan delay untuk mengurangi beban saat load
                setTimeout(() => {
                    document.querySelectorAll('.skill-card').forEach(el => observer.observe(el));
                }, 100);
            });
        </script>
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
{{--            <section id="footer" class="snap-section">--}}
{{--                <div class="">--}}
{{--                    <x-footer />--}}
{{--                </div>--}}
{{--            </section>--}}
        </div>
    </body>
</html>
