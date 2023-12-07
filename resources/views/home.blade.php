@extends('layout')
@section('title', 'Home')

@section('content')
<section class="banner">
    <img src="./img/strong_team.jpg" alt="banner" class="banner__img"/>
    <div class="banner__container">
        <h2 class="banner__firstitle">THE ULTIMATE LUXURY EXPERIENCE</h2>
        <h3 class="banner__secondtitle">The Perfect Base For You</h3>
        <div class="banner__buttons">
            <button class="banner-buttons__tour" id="btn_tour">
                Take a Tour
            </button>
            <button class="banner-buttons__more" id="btn_learn_more">
                Learn more
            </button>
        </div>
    </div>
</section>

<section class="banner__checkdate">
    <form class="banner-checkdate__form" id="form_check_availability" method="GET" action="rooms.php">
        <div class="banner-checkdate-form__input-container">
            <label for="arrive">Arrival date</label>
            <input type="date" name="check_in" id="check_in_rooms" value="<?=date('Y-m-d')?>" min="<?=date('Y-m-d')?>"/>
        </div>
        <div class="banner-checkdate-form__input-container">
            <label>Departure Date</label>
            <input type="date" name="check_out" id="check_out_rooms"/>
        </div>
        <button class="banner-checkdate-form__button" type="submit">
            CHECK AVAILABILITY
        </button>
    </form>
</section>
<section class="discover">
    <div class="discover-container">
        <div class="discover__titlebox">
            <h2 class="discover-titlebox__about">About us</h2>
            <h4 class="discover-titlebox__title">Discover Our Underground.</h4>
            <p class="discover-titlebox__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                do
                eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
                nostrud
                exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            <button class="discover-titlebox__button" id="discover-titlebox__button">Book now</button>
        </div>

        <div class="discover-container__strong-luxury">
            <div class="discover-strong-team">
                <div class="discover-strong-team__box">
                    <div class="discover-strong-team__img">
                        <img class="discover-strong-team-img__imgcover" src="img/strong_team.jpg" alt="strong" />
                    </div>
                    <div class="discover-strong-team__description">
                        <img class="discover-strong-team-description__team-img" src="img/team-color.png" alt="teamcolor" />
                        <h4 class="discover-strong-team-description__title">Strong team</h4>
                        <p class="discover-strong-team-description__paraph">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
            <div class="discover-luxury-room">
                <div class="discover-luxury-room__box">
                    <div class="discover-luxury-room__img">
                        <img class="discover-luxury-room-img__imgcover" src="img/luxury-hotel.jpg" alt="luxury" />
                    </div>
                    <div class="discover-luxury-room__description">
                        <img class="discover-luxury-room-description__team-img" src="img/luxury-icon.png" alt="luxury-icon" />
                        <h4 class="discover-luxury-room-description__title">Luxury Room</h4>
                        <p class="discover-luxury-room-description__paraph">Lorem ipsum dolor sit amet,
                            consectetur
                            adipisicing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="discover-rooms">
        <h2 class="discover-rooms__h2">ROOMS</h2>
        <h4 class="discover-rooms__h4">Hand Picked Rooms</h4>
        <div class="discover-rooms__icons">
            <img class="discover-rooms-icons__img" src="img/bed-icon.png" alt="bed-icon" />
            <img class="discover-rooms-icons__img" src="img/wifi-icon.png" alt="wifi-icon" />
            <img class="discover-rooms-icons__img" src="img/car-icon.png" alt="car-icon" />
            <img class="discover-rooms-icons__img" src="img/cold-icon.png" alt="snow-icon" />
            <img class="discover-rooms-icons__img" src="img/gym-icon.png" alt="gym-icon" />
            <img class="discover-rooms-icons__img" src="img/no-smoking-icon.png" alt="no-smoking-icon" />
            <img class="discover-rooms-icons__img" src="img/cocktail-icon.png" alt="cocktail-icon" />
        </div>
        <div class="swiper" id="swipper-rooms">
            <div class="swiper-wrapper">
                @foreach ($rooms as $room)
                <div class="swiper-slide slide-img4">
                    <img class="swiper-slide__img" src="{{$room['URL']}}" alt="img{{$room['id']}}" />
                    <div class="discover-rooms__minimal">
                        <div class="discover-rooms-minimal__info-container">
                            <h3 class="discover-rooms-minimal__h3">{{$room['room_type']}}</h3>
                            <p class="discover-rooms-minimal__paraph">{{$room['description']}}</p>
                        </div>
                        <h2 class="discover-rooms-minimal__h2">${{$room['price']}}<span class="discover-rooms-minimal-h2__span">/Night</span></h2>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev" id="swiper-button-prev-rooms"></div>
            <div class="swiper-button-next" id="swiper-button-next-rooms"></div>
        </div>
    </div>
</section>

<section class="meet-video">
    <div class="meet-video__container">
        <h2 class="meet-video-container__h2">Intro video</h2>
        <h3 class="meet-video-container__h3">Meet With Our Luxury Place.</h3>
        <p class="meet-video-container__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
            eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
            exercitation
            ullamco laboris nisi ut aliquip ex ea commodo consequat you have to understand this.</p>
        <button class="meet-video-container__button-dektop">
            <a href="/rooms.php">
                ROOMS
            </a>
        </button>
    </div>
    <iframe class="meet-video__iframe" src="https://www.youtube.com/embed/Bu3Doe45lcU?si=5QAaDhCSNoHIDPD3&amp;start=25&end=69" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; muted; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
    <button class="meet-video__button">
        <a href="/rooms.php">
            ROOMS
        </a></button>
    <div class="meet-video__background-gold-desktop">
    </div>
</section>

<section class="facilities">
    <h2 class="facilities__h2">Facilities</h2>
    <h4 class="facilities__h4">Core Features</h4>
    <div class="swiper swiper__facilities" id="swiper__facilities">
        <div class="swiper-wrapper swiper-wrapper__facilities">
            <div class="swiper-slide facilities-slide__article1 slider-facilities-articles">
                <img class="facilities-slide__img" src="img/facilities-icon1.png" alt="finger-icon" />
                <h3 class="facilities-slide__h3">Have High Rating</h3>
                <p class="facilities-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-slide__article2 slider-facilities-articles">
                <img class="facilities-slide__img" src="img/facilities-icon2.png" alt="clock-icon" />
                <h3 class="facilities-slide__h3">Quiet Hours</h3>
                <p class="facilities-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-slide__article3 slider-facilities-articles">
                <img class="facilities-slide__img" src="img/facilities-icon3.png" alt="location-icon" />
                <h3 class="facilities-slide__h3">Best Locations</h3>
                <p class="facilities-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-slide__article4 slider-facilities-articles">
                <img class="facilities-slide__img" src="img/facilities-icon4.png" alt="timer-icon" />
                <h3 class="facilities-slide__h3">Free Cancellation</h3>
                <p class="facilities-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-slide__article5 slider-facilities-articles">
                <img class="facilities-slide__img" src="img/facilities-icon5.png" alt="card-icon" />
                <h3 class="facilities-slide__h3">Payment Options</h3>
                <p class="facilities-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
            <div class="swiper-slide facilities-slide__article6 slider-facilities-articles">
                <img class="facilities-slide__img" src="img/facilities-icon6.png" alt="medal-icon" />
                <h3 class="facilities-slide__h3">Special Offers</h3>
                <p class="facilities-slide__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna..</p>
            </div>
        </div>
        <div class="swiper-pagination" id="facilities-bullets-pagination"></div>
    </div>

</section>

<section class="menu">
    <img class="menu__img" src="img/menu-icon.png" alt="pizza-icon" />
    <h4 class="menu__h4">Menu</h4>
    <h2 class="menu__h2">Our Foods Menu</h2>
    <div class="swiper-menu" id="swiper-menu">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-menu">
                <div class="slide-menu__food">
                    <div class="slider-menu-food-container__img1">
                    </div>
                    <div class="slider-menu-food-container__description">
                        <h3 class="slider-menu-food__h3">Eggs & Bacon</h3>
                        <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                            isicing elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div class="slide-menu__food">
                    <div class="slider-menu-food-container__img2">
                    </div>
                    <div class="slider-menu-food-container__description">
                        <h3 class="slider-menu-food__h3">Tea or Coffee</h3>
                        <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip isicing
                            elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div class="slide-menu__food">
                    <div class="slider-menu-food-container__img3">
                    </div>
                    <div class="slider-menu-food-container__description">
                        <h3 class="slider-menu-food__h3">Chia Oatmeal</h3>
                        <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip isicing
                            elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide-menu">
                <div class="slide-menu__food">
                    <div class="slider-menu-food-container__img4">
                    </div>
                    <div class="slider-menu-food-container__description">
                        <h3 class="slider-menu-food__h3">Fruit Parfait</h3>
                        <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip isicing
                            elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div class="slide-menu__food">
                    <div class="slider-menu-food-container__img5">
                    </div>
                    <div class="slider-menu-food-container__description">
                        <h3 class="slider-menu-food__h3">Marmalade Selection</h3>
                        <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip isicing
                            elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
                <div class="slide-menu__food">
                    <div class="slider-menu-food-container__img6">
                    </div>
                    <img class="slider-menu-food-container__img" src="img/cheeseplate.jpg" alt="cheeseplate" />
                    <div class="slider-menu-food-container__description">
                        <h3 class="slider-menu-food__h3">Cheese Plate</h3>
                        <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip isicing
                            elit, sed do eiusmod tempor.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-menu__buttons">
            <div class="swiper-button-next swiper-menu-buttons__next"></div>
            <div class="swiper-button-prev swiper-menu-buttons__prev"></div>
        </div>
    </div>

    <div class="swiper-menu swiper-menu-desktop" id="swiper-menu-desktop">
        <div class="swiper-wrapper">
            <div class="swiper-slide slide-menu">
                <div class="slide-menu__container">
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/eggs&bacon.jpg" alt="egg" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Eggs & Bacon</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/tea&coffe.jpg" alt="tea" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Tea or Coffee</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/chia.jpg" alt="chia" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Chia Oatmeal</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="slide-menu__container">
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/fruit.jpg" alt="fruit" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Fruit Parfait</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/marmalade.jpeg" alt="marmalade" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Marmalade Selection</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/cheeseplate.jpg" alt="cheeseplate" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Cheese Plate</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide slide-menu">
                <div class="slide-menu__container">
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/fruit.jpg" alt="fruit" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Fruit Parfait</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/marmalade.jpeg" alt="marmalade" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Marmalade Selection</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/cheeseplate.jpg" alt="cheeseplate" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Cheese Plate</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
                <div class="slide-menu__container">
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/eggs&bacon.jpg" alt="eggs" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Eggs & Bacon</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/tea&coffe.jpg" alt="tea" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Tea or Coffee</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                    <div class="slide-menu__food">
                        <img lass="slider-menu-food-container__img" src="img/chia.jpg" alt="chia" />
                        <div class="slider-menu-food-container__description">
                            <h3 class="slider-menu-food__h3">Chia Oatmeal</h3>
                            <p class="slider-menu-food__paraph">Lorem ipsum dolor sit amet, consectetur adip
                                isicing
                                elit, sed do eiusmod tempor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-menu__buttons">
            <div class="swiper-button-next swiper-menu-buttons__next"></div>
            <div class="swiper-button-prev swiper-menu-buttons__prev"></div>
        </div>
    </div>
</section>

<div class="images-food__slider">
    <div class="swiper swiper-images-food-slider">
        <div class="swiper-wrapper">
            <div class="swiper-slide swiper-images-food__container">
                <img class="swiper-images-food-container__img" src="img/cheeseplate.jpg" alt="cheeseplate" />
            </div>
            <div class="swiper-slide swiper-images-food__container">
                <img class="swiper-images-food-container__img" src="img/tea&coffe.jpg" alt="te" />
            </div>
            <div class="swiper-slide swiper-images-food__container">
                <img class="swiper-images-food-container__img" src="img/marmalade.jpeg" alt="marmalade" />
            </div>
        </div>
        <div class="swiper-pagination swiper-pagination-images-food"></div>
    </div>
</div>

<div class="images-food__slider-desktop">
    <img class="swiper-images-food-container__img" src="img/cheeseplate.jpg" alt="cheeseplate" />
    <img class="swiper-images-food-container__img" src="img/tea&coffe.jpg" alt="te" />
    <img class="swiper-images-food-container__img" src="img/marmalade.jpeg" alt="marmalade" />
</div>

<section class="logros-icon">
    <div class="logros-icon__container">
        <img class="logros-icon-container__img" src="img/rocket-icon.png" alt="rocket" />
        <h2 class="logros-icon-container-description__h2">
            84k+
            <span class="logros-icon-container-description__span">
                Projects are Completed
            </span>
        </h2>
    </div>
    <div class="logros-icon__container">
        <img class="logros-icon-container__img" src="img/persons-icon.png" alt="persons" />
        <h2 class="logros-icon-container-description__h2">
            10M+
            <span class="logros-icon-container-description__span">
                Active Backers Around World
            </span>
        </h2>
    </div>
    <div class="logros-icon__container">
        <img class="logros-icon-container__img" src="img/investment-icon.png" alt="investment" />
        <h2 class="logros-icon-container-description__h2">
            02k+
            <span class="logros-icon-container-description__span">
                Categories Served
            </span>
        </h2>
    </div>
    <div class="logros-icon__container">
        <img class="logros-icon-container__img" src="img/book-icon.png" alt="book" />
        <h2 class="logros-icon-container-description__h2">
            100M+
            <span class="logros-icon-container-description__span">
                Idea Raised Funds
            </span>
        </h2>
    </div>
</section>
@endsection