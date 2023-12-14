@extends('layout')
@section('title', 'Offers')

@section('content')
<section class="rooms__banner">
    <h2 class="rooms__firsttitle" id="rooms__firsttitle">THE ULTIMATE LUXURY </h2>
    <h3 class="rooms__secondtitle" id="rooms__secondtitle">Our Offers</h3>
    <div class="rooms__buttons" id="rooms__buttons">
        <a class="banner-buttons__home" href="/index.php
                ">
            Home
        </a>
        <p>|</p>
        <a class="banner-buttons__about" href="/offers.php
                ">
            Offers
        </a>
    </div>
</section>

{{-- <div class="swiper offer_swiper">
    <div class="swiper-wrapper">
        @foreach ($rooms as $room)
            <div class="swiper-slide">
                <section class="luxury-rooms-offers">
                    <div class="luxury-rooms-offers-container__info-price">
                        @foreach($room->first_photo as $photo)
                            <img class="luxury-rooms-offers-container-info-price__img" src="{{$photo->room_photo_url}}" alt="luxury-room" />
                        @endforeach
                        <div class="luxury-rooms-offers-container-info-prices__container">
                            <h4 class="luxury-rooms-offers-container-info-price__price-before">
                                <del>${{$room['price']}}</del><span>/Night</span>
                            </h4>
                            <h4 class="luxury-rooms-offers-container-info-price__price-after">${{$room['price'] * $room['discount'] / 100}}<span>/Night</span></h4>
                        </div>
                    </div>
                    <div class="luxury-rooms-offers__container">
                    <div class="container-info">
                        <h3 class="luxury-rooms-offers-container__h3">Double Bed</h3>
                        <h2 class="luxury-rooms-offers-container__h2">{{$room['room_type']}}</h2>
                        <p class="luxury-rooms-offers-container__paraph">{{$room['description']}}</p>
                    </div>
            
                        <div class="luxury-rooms-offers-container__amenities">
                            <div class="container-icons">
                                <div class="room-details-amenities__icon-container">
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/air-icon.png" alt="air" />
                                        <p class="room-details-amenities-icon-container-info__paraph">
                                            Air conditioner
                                        </p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/launch-icon.png" alt="launch" />
                                        <p class="room-details-amenities-icon-container-info__paraph">
                                            Breakfast
                                        </p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/cleaning-icon.png" alt="cleaning" />
                                        <p class="room-details-amenities-icon-container-info__paraph">
                                            Cleaning
                                        </p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/grocery-icon.png" alt="grocery" />
                                        <p class="room-details-amenities-icon-container-info__paraph">
                                            Grocery
                                        </p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/shopper-icon.png" alt="shop" />
                                        <p class="room-details-amenities-icon-container-info__paraph">Shop near</p>
                                    </div>
                                </div>
                                <div class="room-details-amenities__icon-container container__2">
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/wifi-gold-icon.png" alt="wifi" />
                                        <p class="room-details-amenities-icon-container-info__paraph">High speed WIFI</p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/kitchen-icon.png" alt="kitchen" />
                                        <p class="room-details-amenities-icon-container-info__paraph">Kitchen</p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/bath-icon.png" alt="batch" />
                                        <p class="room-details-amenities-icon-container-info__paraph">Shower</p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/single-bed-icon.png" alt="single-bed" />
                                        <p class="room-details-amenities-icon-container-info__paraph">Single bed</p>
                                    </div>
                                    <div class="room-details-amenities-icon-container__info">
                                        <img class="room-details-amenities-icon-container-info__img" src="/img/toalla-icon.png" alt="towel" />
                                        <p class="room-details-amenities-icon-container-info__paraph">Towels</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button class="luxury-rooms-offers-container__button">
                        <a href="rooms_details/{{$room['id']}}">BOOK NOW</a>
                    </button>
                </section>
            </div>
        @endforeach
    </div>
    <div class="swiper-pagination rooms__swiper-pagination"></div>
</div> --}}

@foreach ($rooms as $room)
    <section class="luxury-rooms-offers">
        <div class="luxury-rooms-offers-container__info-price">
            @foreach($room->first_photo as $photo)
                <img class="luxury-rooms-offers-container-info-price__img" src="{{$photo->room_photo_url}}" alt="luxury-room" />
            @endforeach
            <div class="luxury-rooms-offers-container-info-prices__container">
                <h4 class="luxury-rooms-offers-container-info-price__price-before">
                    <del>${{$room['price']}}</del><span>/Night</span>
                </h4>
                <h4 class="luxury-rooms-offers-container-info-price__price-after">${{$room['price'] * $room['discount'] / 100}}<span>/Night</span></h4>
            </div>
        </div>
        <div class="luxury-rooms-offers__container">
        <div class="container-info">
            <h3 class="luxury-rooms-offers-container__h3">Double Bed</h3>
            <h2 class="luxury-rooms-offers-container__h2">{{$room['room_type']}}</h2>
            <p class="luxury-rooms-offers-container__paraph">{{$room['description']}}</p>
        </div>

            <div class="luxury-rooms-offers-container__amenities">
                <div class="container-icons">
                    <div class="room-details-amenities__icon-container">
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/air-icon.png" alt="air" />
                            <p class="room-details-amenities-icon-container-info__paraph">
                                Air conditioner
                            </p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/launch-icon.png" alt="launch" />
                            <p class="room-details-amenities-icon-container-info__paraph">
                                Breakfast
                            </p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/cleaning-icon.png" alt="cleaning" />
                            <p class="room-details-amenities-icon-container-info__paraph">
                                Cleaning
                            </p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/grocery-icon.png" alt="grocery" />
                            <p class="room-details-amenities-icon-container-info__paraph">
                                Grocery
                            </p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/shopper-icon.png" alt="shop" />
                            <p class="room-details-amenities-icon-container-info__paraph">Shop near</p>
                        </div>
                    </div>
                    <div class="room-details-amenities__icon-container container__2">
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/wifi-gold-icon.png" alt="wifi" />
                            <p class="room-details-amenities-icon-container-info__paraph">High speed WIFI</p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/kitchen-icon.png" alt="kitchen" />
                            <p class="room-details-amenities-icon-container-info__paraph">Kitchen</p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/bath-icon.png" alt="batch" />
                            <p class="room-details-amenities-icon-container-info__paraph">Shower</p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/single-bed-icon.png" alt="single-bed" />
                            <p class="room-details-amenities-icon-container-info__paraph">Single bed</p>
                        </div>
                        <div class="room-details-amenities-icon-container__info">
                            <img class="room-details-amenities-icon-container-info__img" src="/img/toalla-icon.png" alt="towel" />
                            <p class="room-details-amenities-icon-container-info__paraph">Towels</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="luxury-rooms-offers-container__button">
            <a href="rooms_details/{{$room['id']}}">BOOK NOW</a>
        </button>
    </section>
@endforeach

<section class="popular-rooms">
    <h2 class="popular-rooms__h2">Popular List</h2>
    <h3 class="popular-rooms__h3">Popular Rooms</h3>

    <div class="rooms-list__room">
        <div class="swiper" id="swipper-rooms-offers">
            <div class="swiper-wrapper swiper-wrapper__rooms-offers">
                @foreach ($two_rooms as $room)
                    <div class="swiper-slide slide-img1">
                        <div class="discover-rooms__icons">
                            @foreach ($room->amenities as $amenity)
                                <img class="discover-rooms-icons__img" src="{{ $amenity_icons[$amenity->amenity_name] }}" alt="{{ $amenity }}" />
                            @endforeach
                        </div>
                        @foreach($room->first_photo as $photo)
                            <img class="swiper-slide__img" src="{{$photo->room_photo_url}}" alt="luxury-room" />
                        @endforeach
                        <div class="box-container">
                            <h3 class="rooms-list-room__h3">{{$room['room_type']}}</h3>
                            <p class="rooms-list-room__paraph">{{$room['description']}}.</p>
                            <div class="rooms-list-room__price-info">
                                @if($room['offer_price'])
                                <div>
                                    <h2 class="rooms-list-room-price-info__h2" style="font-size: 0.8em;">
                                        <del>{{$room['price']}}</del><span class="discover-rooms-minimal-h2__span">/Night</span>
                                    </h2>
                                    <h2 class="rooms-list-room-price-info__h2" style="color: rgb(222, 87, 119);">
                                        ${{$room['price'] * $room['discount'] / 100}}<span class="discover-rooms-minimal-h2__span">/Night</span>
                                    </h2>
                                </div>
                                @else 
                                    <h2 class="rooms-list-room-price-info__h2">
                                        ${{$room['price']}}<span class="discover-rooms-minimal-h2__span">/Night</span>
                                    </h2>
                            @endif
                                <button class="rooms-list-room-price-info__button" style="border: none;"> 
                                    <a href="rooms_details/{{$room['id']}}">Booking now</a>
                            </button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-button-prev" id="swiper-button-prev-rooms-offers"></div>
            <div class="swiper-button-next" id="swiper-button-next-rooms-offers"></div>
        </div>

    </div>
</section>

@endsection