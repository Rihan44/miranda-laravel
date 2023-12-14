 <html lang="es">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />
     <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
     <link rel="stylesheet" href="/css/styles.css">
     @toastifyCss
     <script type="text/javascript" src="/js/main.js" defer></script>
     @yield('scripts')
     <title>@yield('title')</title>
 </head>

 <body>
     <header class="header">
         <div class="header__boxgeneral">
             <button class="header__menubutton" id="burguer__icon">
                 <img id="img_icon" src="/img/burguer_icon.png" class="header-menubutton__icon" alt="burger_icon">
             </button>
             <div class="header__titlebox">
                 <div class="header__boxlogo">
                     H
                 </div>
                 <a href="/">
                     <h1 class="header-titlebox__title">
                         HOTEL
                         <span class="header-titlebox-title__span">
                             MIRANDA
                         </span>
                     </h1>
                 </a>
             </div>
             <nav class="header-menu-desktop">
                 <ul class="header-menu-desktop-menu__items">
                     <li><a class="menu__link" href="/about">About Us</a></li>
                     <li><a class="menu__link" href="/rooms">Rooms</a></li>
                     <li><a class="menu__link" href="/offers">Offers</a></li>
                     <li><a class="menu__link" href="/contact">Contact</a></li>
                 </ul>
             </nav>
             <div class="header-boxgeneral__icons">
                <a class="header__profileicon" href="/profile">
                    <img class="header-profileicon__icon" src="/img/profile_icon.png" alt="profile_icon">
                </a>
            </div>
         </div>
         <nav id="nav_menu" class="header-menu__burguer">
             <ul class="header-menu__items">
                 <li><a class="menu__link" href="/about">About Us</a></li>
                 <li><a class="menu__link" href="/rooms">Rooms</a></li>
                 <li><a class="menu__link" href="/offers">Offers</a></li>
                 <li><a class="menu__link" href="/contact">Contact</a></li>
             </ul>
         </nav>
     </header>
     <main>
         @yield('content')
     </main>
     <footer>
         <div class="footer-container">
             <div class="footer-container__socials">
                 <div class="footer__titlebox">
                     <div class="footer__boxlogo">
                         H
                     </div>
                     <h2 class="footer-titlebox__title">
                         HOTEL
                         <span class="footer-titlebox-title__span">
                             MIRANDA
                         </span>
                     </h2>
                 </div>
                 <p class="footer__paraph">
                     Lorem ipsum dolor sit amet, consect etur adipisicing elit, sed doing eius mod tempor incididunt ut
                     labore et
                     dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitat ion ullamco laboris nisi.
                 </p>
                 <div class="footer__socials">
                     <a class="footer-socials__link" href="#">
                         <i class="fa-brands fa-square-facebook fa-lg"></i>
                     </a>
                     <a class="footer-socials__link" href="#">
                         <i class="fa-brands fa-square-twitter fa-lg"></i>
                     </a>
                     <a class="footer-socials__link" href="#">
                         <i class="fa-brands fa-square-behance fa-lg"></i>
                     </a>
                     <a class="footer-socials__link" href="#">
                         <i class="fa-brands fa-linkedin fa-lg"></i>
                     </a>
                     <a class="footer-socials__link" href="#">
                         <i class="fa-brands fa-square-youtube fa-lg"></i>
                     </a>
                 </div>
             </div>
             <div class="footer-service-contact__container">
                 <div class="footer__services">
                     <h3 class="footer-services__h3">Services.</h3>
                     <div class="footer-services__list">
                         <div class="footer-services-list__first">
                             <p class="footer-services-list__paraphs">+ Resturant & Bar</p>
                             <p class="footer-services-list__paraphs">+ Swimming Pool</p>
                             <p class="footer-services-list__paraphs">+ Wellness & Spa</p>
                             <p class="footer-services-list__paraphs">+ Restaurant</p>
                             <p class="footer-services-list__paraphs">+ Conference Room</p>
                             <p class="footer-services-list__paraphs">+ Coctail Party House</p>
                         </div>
                         <div class="footer-services-list__second">
                             <p class="footer-services-list__paraphs">+ Gaming Zone</p>
                             <p class="footer-services-list__paraphs">+ Marrige Party</p>
                             <p class="footer-services-list__paraphs">+ Party Planning</p>
                             <p class="footer-services-list__paraphs">+ Tour Consultancy</p>
                         </div>
                     </div>
                 </div>
                 <div class="footer__contact">
                     <h3 class="footer-contact__h3">Contact Us.</h3>
                     <div class="footer-contact__container">
                         <img class="footer-contact-container__img" src="/img/phone-icon.png" alt="phone" />
                         <div class="footer-contact-container__info">
                             <h4 class="footer-contact-container-info__h4">Phone Number</h4>
                             <p class="footer-contact-container-info__paraph">+987 876 765 76 577</p>
                         </div>
                     </div>
                     <div class="footer-contact__container">
                         <img class="footer-contact-container__img" src="/img/email-icon.png" alt="email" />
                         <div class="footer-contact-container__info">
                             <h4 class="footer-contact-container-info__h4">Email</h4>
                             <p class="footer-contact-container-info__paraph">email@gmail.com</p>
                         </div>
                     </div>
                     <div class="footer-contact__container">
                         <img class="footer-contact-container__img" src="/img/location-icon.png" alt="location" />
                         <div class="footer-contact-container__info">
                             <h4 class="footer-contact-container-info__h4">Location</h4>
                             <p class="footer-contact-container-info__paraph">Street 2305 f 12</p>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <div class="footer__copyright">
             <p class="footer-copyright__paraph">Copyright By@Example - 2020</p>
             <p class="footer-copyright__paraph">Terms of use | Privacy Environmental Policy</p>
         </div>
     </footer>
       
     <script src="https://kit.fontawesome.com/b85064bdf0.js" crossorigin="anonymous"></script>
     <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
     @toastifyJs
 </body>
 </html>