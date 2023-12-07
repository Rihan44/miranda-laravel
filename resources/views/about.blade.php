@extends('layout')
@section('title', 'About Us')

@section('content')
<section class="about-us__banner">
    <h2 class="about-us-banner__firsttitle">THE ULTIMATE LUXURY </h2>
    <h3 class="about-us-banner__secondtitle">About Us</h3>
    <div class="about-us-banner__buttons">
        <a class="banner-buttons__home" href="../index.php
                ">
            Home
        </a>
        <p>|</p>
        <a class="banner-buttons__about" href="../index.php
                ">
            About
        </a>
    </div>
</section>
<section class="video-about__presentation">
    <iframe class="video-about-presentation__iframe" src="https://www.youtube.com/embed/Bu3Doe45lcU?si=5QAaDhCSNoHIDPD3&amp;start=25&end=69" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; muted; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
    </iframe>
    <h3 class="video-about-presentation__title">
        Hello. Our hotel has been present for over 20 years. We make the best for all our customers.
    </h3>
    <div class="video-about-presentation__our-services">
        <div class="video-about-presentation-our-services__container">
            <img class="video-about-presentation-our-services-container__img" src="/img/breakfast-icon.png" alt="breakfast" />
            <h4 class="video-about-presentation-our-services-container__h4">Breakfast</h4>
        </div>
        <div class="video-about-presentation-our-services__container plane">
            <img class="video-about-presentation-our-services-container__img" src="/img/plane-icon.png" alt="plane" />
            <h4 class="video-about-presentation-our-services-container__h4">Airport Pickup</h4>
        </div>
        <div class="video-about-presentation-our-services__container">
            <img class="video-about-presentation-our-services-container__img" src="/img/map-location-icon.png" alt="location" />
            <h4 class="video-about-presentation-our-services-container__h4">City Guide</h4>
        </div>
        <div class="video-about-presentation-our-services__container">
            <img class="video-about-presentation-our-services-container__img" src="/img/room-icon.png" alt="breakfast" />
            <h4 class="video-about-presentation-our-services-container__h4">Luxury Room</h4>
        </div>
    </div>
</section>

<section class="restaurant">
    <div class="restaurant__container">
        <img class="restaurant__img" src="/img/restaurant.jpg" alt="restaurant" />
        <div class="restaurant__info">
            <h2 class="restaurant__title">Restaurant</h2>
            <h4 class="restaurant__subtitle">Get Restaurant Facilities & Many Other More</h4>
            <p class="restaurant__paragraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tem por incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip.</p>
            <button class="restaurant__cta">Take a Tour</button>
        </div>
    </div>
</section>

<section class="facilities-about-us">
    <h2 class="facilities-about-us__h2">Facilities</h2>
    <h4 class="facilities-about-us__h4">Core Features</h4>
    <div class="swiper swiper-facilities-about-us" id="swiper-facilities-about-us">
        <div class="swiper-wrapper swiper-wrapper-about-us">
            <div class="swiper-slide facilities-about-us-slide__article1 slider-facilities-about-us-articles">
                <img class="facilities-about-us-slide__img" src="/img/facilities-icon1.png" alt="finger-icon" />
                <h3 class="facilities-about-us-slide__h3">Have High Rating</h3>
                <p class="facilities-about-us-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-about-us-slide__article2 slider-facilities-about-us-articles">
                <img class="facilities-about-us-slide__img" src="/img/facilities-icon2.png" alt="clock-icon" />
                <h3 class="facilities-about-us-slide__h3">Quiet Hours</h3>
                <p class="facilities-about-us-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-about-us-slide__article3 slider-facilities-about-us-articles">
                <img class="facilities-about-us-slide__img" src="/img/facilities-icon3.png" alt="location-icon" />
                <h3 class="facilities-about-us-slide__h3">Best Locations</h3>
                <p class="facilities-about-us-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-about-us-slide__article4 slider-facilities-about-us-articles">
                <img class="facilities-about-us-slide__img" src="/img/facilities-icon4.png" alt="timer-icon" />
                <h3 class="facilities-about-us-slide__h3">Free Cancellation</h3>
                <p class="facilities-about-us-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-about-us-slide__article5 slider-facilities-about-us-articles">
                <img class="facilities-about-us-slide__img" src="/img/facilities-icon5.png" alt="card-icon" />
                <h3 class="facilities-about-us-slide__h3">Payment Options</h3>
                <p class="facilities-about-us-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-about-us-slide__article6 slider-facilities-about-us-articles">
                <img class="facilities-about-us-slide__img" src="/img/facilities-icon6.png" alt="medal-icon" />
                <h3 class="facilities-about-us-slide__h3">Special Offers</h3>
                <p class="facilities-about-us-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
        </div>
        <div class="swiper-pagination" id="facilities-about-us-bullets-pagination"></div>
    </div>

</section>

<section class="counter">
    <h2 class="counter__h2">Counter</h2>
    <h4 class="counter__h4">Some Fun Facts</h4>
    <div class="counter-container">
        <div class="counter-container__box">
            <img class="counter-container__img1" src="/img/happy-user-icon.png" alt="happy-user" />
            <div class="counter-container__info">
                <h2 class="counter-container-info__h2">8000</h2>
                <p class="counter-container-info__paraph">Happy Users</p>
            </div>
            <img class="counter-container__img2" src="/img/arrow-icon.png" alt="arrow" />
        </div>
        <div class="counter-container__box">
            <img class="counter-container__img1" src="/img/okey-icon.png" alt="okey-finger" />
            <div class="counter-container__info">
                <h2 class="counter-container-info__h2">10M</h2>
                <p class="counter-container-info__paraph">Reviews & Appriciate</p>
            </div>
            <img class="counter-container__img2" src="/img/arrow-icon.png" alt="arrow" />
        </div>
        <div class="counter-container__box">
            <img class="counter-container__img1" src="/img/earth-icon.png" alt="earth" />
            <div class="counter-container__info">
                <h2 class="counter-container-info__h2">100</h2>
                <p class="counter-container-info__paraph">Country Coverage</p>
            </div>
            <img class="counter-container__img2" src="/img/arrow-icon.png" alt="arrow" />
        </div>
    </div>

    <div class="swiper" id="swiper-counter">
        <div class="swiper-wrapper swiper-wrapper__counter">
            <div class="swiper-slide swiper-slide-counter">
                <img class="swiper-slider-counter__img" src="/img/counter-img1.jpg" alt="img1" />
            </div>
            <div class="swiper-slide swiper-slide-counter">
                <img class="swiper-slider-counter__img" src="/img/counter-img2.jpg" alt="img2" />
            </div>
        </div>
        <div class="swiper-pagination" id="swiper-pagination-counter"></div>
    </div>

</section>
@endsection