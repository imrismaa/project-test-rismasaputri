<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suitmedia</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <div class="overlay">
            <span></span>
            <span></span>
        </div>
        <!-- <img src="https://suitmedia.com/_ipx/w_100&f_webp&q_100/assets/img/site-logo.png" alt=""> -->
        <nav id="navbar" class="navbar navbar-expand-md fixed-top">
            <div class="container">
                <a href="">
                    <img class="logo-img logos-invert" src="https://suitmedia.com/_ipx/w_100&f_webp&q_100/assets/img/site-logo.png"></i>
                </a>
                <nav class="collapse navbar-collapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="">Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="">Services</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#ideas">Ideas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="">Careers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <div class="container parallax-container">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="contents">
                    <h1 class="parallax-text">Ideas</h1>
                    <p class="parallax-text">Where all our great things begin</p>
                </div>
            </div>
        </div>
    </div>


    <section id="ideas">
        <div class="container mt-5 pt-5">
            <div class="row mt-5 pt-5">
                <div class="col">
                    <p>Showing 1 - 10 of 100</p>
                </div>
                <div class="col justify-content-end d-flex flex-row">
                    <div class="col">
                        <form id="" action="" method="GET">
                            <label for="">Show per page:</label>
                            <select>
                                <option value="10">10</option>
                                <option value="20">20</option>
                                <option value="50">50</option>
                            </select>
                        </form>
                    </div>
                    <div class="col">
                        <label for="">Sort by:</label>
                        <select name="" id="">
                            <option value="">Newest</option>
                            <option value="">Oldest</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row d-flex flex-row px-0">
                @foreach($ideas as $idea)
                    <div class="col-lg-3 col-sm-6 col-xs-auto px-0 d-flex justify-content-center">
                        <div class="card"">
                            <img src="{{ $idea['imgurl'] }}" class="card-img-top" alt="">
                            <div class="card-body">
                                <?php $publishedDate = \Carbon\Carbon::parse($idea['published_at']); ?>
                                <p class="card-title">{{ $publishedDate->format('d F Y') }}</p>
                                <h5 class="card-text title">{{ $idea['title'] }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        let lastScrollTop = 0;
        window.addEventListener('scroll', function() {
            let navbar = document.getElementById('navbar');
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;
            if (currentScroll > lastScrollTop) {
                navbar.classList.add('navbar-hidden');
            } else {
                navbar.classList.remove('navbar-hidden');
                navbar.classList.add('navbar-transparent');
            }
            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;

            if (currentScroll <= 0) {
                navbar.classList.remove('navbar-hidden');
                navbar.classList.remove('navbar-transparent');
            }
        });

        window.addEventListener('scroll', function() {
            let scrolled = window.scrollY;
            let parallaxText = document.querySelectorAll('.parallax-text');
            parallaxText.forEach(function(element) {
                element.style.transform = 'translateY(' + (scrolled * 1) + 'px)';
            });
        });
    </script>
</body>
</html>