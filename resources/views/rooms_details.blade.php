@extends('layout')
@section('title', 'Room Detail')

@section('content')
<section class="rooms__banner">
    <h2 class="rooms__firsttitle" id="rooms__firsttitle">THE ULTIMATE LUXURY </h2>
    <h3 class="rooms__secondtitle" id="rooms__secondtitle">The Ultimate Room</h3>
    <div class="rooms__buttons" id="rooms__buttons">
        <a class="banner-buttons__home" href="../index.php
                ">
            Home
        </a>
        <p>|</p>
        <a class="banner-buttons__about" href="../index.php
                ">
            Rooms Details
        </a>
    </div>
</section>

<section class="room-details__type">
    @foreach ($room_detail as $room)
    <div class="room-details-type__info">
        <div class="room-details-type-info__container">
            <h2 class="room-details-type-info__h2">Double Bed</h2>
            <h4 class="room-details-type-info__h4">{{$room['room_type']}}</h4>
        </div>
        @if($room['offer_price'])
            <h3 class="room-details-type-info__h3" style="color: rgb(222, 87, 119);">
                ${{$room['price'] * $room['discount'] / 100}}<span class="room-details-type-info-h3__span">/Night</span>
            </h3>
        @else 
            <h3 class="room-details-type-info__h3">
                ${{$room['price']}}<span class="room-details-type-info-h3__span">/Night</span>
            </h3>
        @endif
    </div>
    <img class="room-details-type__img" src="{{$room['URL']}}" alt="room" />
    @endforeach

    <div class="room-details-type__availability">
        <h4 class="room-details-type-availability__h4">Check Availability</h4>
        <form class="room-details-type-availability__form" id="room-details-type-availability__form" method="POST">
            @csrf
            <label for="check-in">Check In</label>
            <input type="date" name="check-in" value="{{$check_in}}" id="room-details-type-availability-form__check-in" min="{{date('Y-m-d')}}" {{ $check_in ? 'readonly' : '' }}/>
            <label for="check-out">Check Out</label>
            <input type="date" name="check-out" value="{{$check_out}}" id="room-details-type-availability-form__check-out" min="{{date('Y-m-d', strtotime('+1 day'))}}" {{ $check_out ? 'readonly' : '' }}/>
            <label for="name">Full Name</label>
            <input type="text" name="name" id="room-details-type-availability-form__name" placeholder="Full Name" required/>
            <label for="email">Email</label>
            <input type="email" name="email" id="room-details-type-availability-form__email" placeholder="Email" required/>
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="room-details-type-availability-form__phone" placeholder="Number Phone" required/>
            <label for="message">Message</label>
            <input type="text" name="message" id="room-details-type-availability-form__message" placeholder="Your Message" required/>
            <input type="hidden" name="room_price" value="{{$room_detail_price}}"/>
            <input type="hidden" name="room_id" value="{{$room_detail_id}}"/>
            <button 
                id="room-details-type-availability-form__button" 
                class="room-details-type-availability-form__button" 
                type="submit">
                BOOK NOW
            </button>
        </form>
    </div>
    @foreach ($room_detail as $room)
        <p class="room-details-type__paraph">{{$room['description']}}</p>
    @endforeach
</section>

<section class="room-details__amenities">
    <h2 class="room-details-amenities__h2">Amenities</h2>
    <div class="room-details-amenitie__container">
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
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="/img/headphone-icon.png" alt="headphones" />
                <p class="room-details-amenities-icon-container-info__paraph">24/7 Online Support</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="/img/locked-icon.png" alt="locked" />
                <p class="room-details-amenities-icon-container-info__paraph">Smart Security</p>
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
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="/img/llave-icon.png" alt="key-locker" />
                <p class="room-details-amenities-icon-container-info__paraph">Strong Locker</p>
            </div>
            <div class="room-details-amenities-icon-container__info">
                <img class="room-details-amenities-icon-container-info__img" src="/img/expert-icon.png" alt="expert" />
                <p class="room-details-amenities-icon-container-info__paraph">Expert Team</p>
            </div>
        </div>
    </div>
</section>

<div class="founder">
    <div class="founder__img-container">
        <img class="founder-img-container__img" src="/img/profile1.png" alt="profile" />
        <div class="founder-img-container__square">
            <img class="founder-img-container-square-check__img" src="/img/white-check-icon.png" alt="check" />
        </div>
    </div>
    <h2 class="founder__h2">A.S Muela Bustamante</h2>
    <h3 class="founder__h3">Founder, Qux Co.</h3>
    <p class="founder__paraph">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
        incididunt ut labore et dolore.</p>
</div>

<section class="cancellation-info">
    <h2 class="cancellation-info__h2">Cancellation</h2>
    <p class="cancellation-info__paraph">Phasellus volutpat neque a tellus venenatis, a euismod augue facilisis.
        Fusce ut metus mattis, consequat metus nec, luctus lectus. Pellentesque orci quis hendrerit sed eu
        dolor. Cancel up to 14 days to get a full refund.</p>
</section>

<section class="related-rooms">
    <h2 class="related-rooms__h2">Related Rooms</h2>
    <div class="rooms-list__room">

        <div class="swiper" id="swiper-rooms-details">
            <div class="swiper-wrapper swiper-wrapper__rooms-details">
                @foreach ($related_rooms as $room)
                <div class="swiper-slide slide-img1">
                    <div class="discover-rooms__icons">
                        <img class="discover-rooms-icons__img" src="/img/bed-icon.png" alt="bed-icon" />
                        <img class="discover-rooms-icons__img" src="/img/wifi-icon.png" alt="wifi-icon" />
                        <img class="discover-rooms-icons__img" src="/img/car-icon.png" alt="car-icon" />
                        <img class="discover-rooms-icons__img" src="/img/cold-icon.png" alt="snow-icon" />
                        <img class="discover-rooms-icons__img" src="/img/gym-icon.png" alt="gym-icon" />
                        <img class="discover-rooms-icons__img" src="/img/no-smoking-icon.png" alt="no-smoking-icon" />
                        <img class="discover-rooms-icons__img" src="/img/cocktail-icon.png" alt="cocktail-icon" />
                    </div>
                    <img class="swiper-slide__img" src="{{$room['URL']}}" alt="img1" />
                    <div class="box-container">
                        <h3 class="rooms-list-room__h3">{{$room['room_type']}}</h3>
                        <p class="rooms-list-room__paraph">{{$room['description']}}</p>
                        <div class="rooms-list-room__price-info">
                            <h2 class="rooms-list-room-price-info__h2">${{$room['price']}}/Night</h2>
                            <button class="rooms-list-room-price-info__button"> 
                                <a href="rooms_details/{{$room['id']}}">Booking now</a>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-prev" id="swiper-button-prev-rooms-details"></div>
            <div class="swiper-button-next" id="swiper-button-next-rooms-details"></div>
        </div>

    </div>

</section>

@endsection