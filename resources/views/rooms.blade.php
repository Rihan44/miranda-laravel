@extends('layout')
@section('title', 'Rooms')

@section('content')

@if(session('success'))
    {{toastify()->success(session('success'));}}
@elseif(session('error'))
    {{toastify()->error(session('error'));}}
@endif

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
                        @foreach($room->first_photo as $photo)
                            <img class="rooms-list-room__img" src="{{$photo->room_photo_url}}" alt="img{{$room->room_type}}" />
                        @endforeach
                        <div class="discover-rooms__icons">
                            @foreach ($room->amenities as $amenity)
                                <img class="discover-rooms-icons__img" src="{{ $amenity_icons[$amenity->amenity_name] }}" alt="{{ $amenity }}" />
                            @endforeach
                        </div>
                        <h3 class="rooms-list-room__h3">{{$room['room_type']}}</h3>
                        <p class="rooms-list-room__paraph">{{$room['description']}}</p>
                        <div class="rooms-list-room__price-info">
                            @if($room['offer_price'])
                            <div>
                                <h2 class="rooms-list-room-price-info__h2" style="font-size: 0.8em;">
                                    <del>{{$room_price}}</del><span class="discover-rooms-minimal-h2__span"">/Night</span>
                                </h2>
                                <h2 class="rooms-list-room-price-info__h2" style="color: rgb(222, 87, 119);">
                                ${{$room['price']}}<span class="discover-rooms-minimal-h2__span">/Night</span>
                                </h2>
                            </div>
                            @else 
                                <h2 class="rooms-list-room-price-info__h2">
                                    ${{$room['price']}}<span class="discover-rooms-minimal-h2__span">/Night</span>
                                </h2>
                            @endif
                            <button class="rooms-list-room-price-info__button">
                                @if($check_in !== '' && $check_out !== '')
                                    <a href="rooms_details/{{$room['id']}}?check_in={{$check_in}}&check_out={{$check_out}}">Booking now</a>
                                @else 
                                    <a href="rooms_details/{{$room['id']}}">Booking now</a>
                                @endif
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
