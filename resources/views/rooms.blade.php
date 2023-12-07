@extends('layout')
@section('title', 'Rooms')

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
        <a class="banner-buttons__about" href="../rooms.php
                ">
            Rooms
        </a>
    </div>
</section>

<section class="rooms__list">
    @if(count($rooms) <= 0)
    <h3 class="rooms__list-no-rooms">There are no rooms in that date range, search again?</h3>
    <section class="banner__checkdate">
        <form class="banner-checkdate__form" id="form_check_availability" method="GET">
            <div class="banner-checkdate-form__input-container">
                <label for="arrive">Arrival date</label>
                <input type="date" name="check_in" id="check_in_rooms" min="<?= date('Y-m-d') ?>" required />
            </div>
            <div class="banner-checkdate-form__input-container">
                <label>Departure Date</label>
                <input type="date" name="check_out" id="check_out_rooms" required />
            </div>
            <button class="banner-checkdate-form__button" type="submit">
                CHECK AVAILABILITY
            </button>
        </form>
    </section>
    @else

    <div class="rooms-list-grid__container">
        <div class="swiper my__swiper">
            <div class="swiper-wrapper">
                @foreach ($rooms as $room)
                <div class="swiper-slide">
                    <div class="rooms-list__room">
                        <img class="rooms-list-room__img" src="{{$room['URL']}}" alt="room" />
                        <div class="discover-rooms__icons">
                            @foreach ($room->amenities_array as $amenity)
                                @if (isset($amenity_icons[$amenity]))
                                    <img class="discover-rooms-icons__img" src="{{ $amenity_icons[$amenity] }}" alt="{{ $amenity }}" />
                                @endif
                            @endforeach
                        </div>
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
            <div class="swiper-pagination rooms__swiper-pagination"></div>
        </div>
    </div>
    @endif
</section>
@endsection