/* variables */
let burguer_icon = document.getElementById('burguer__icon');
let img_icon = document.getElementById('img_icon');
let nav_menu = document.getElementById('nav_menu');
let check_menu = true;
let dw = document.querySelector('#form_check_availability');
let title = document.title;
let menu_links = document.getElementsByClassName('menu__link');

/* HEADER MOVIL */

burguer_icon.addEventListener('click', () => {
    if (check_menu) {
        nav_menu.style.top = '85px';
        nav_menu.style.transition = '0.5s';
        nav_menu.style.paddingBottom = '15px';
        img_icon.src = '/img/close_icon.png';
        check_menu = false;
    } else {
        nav_menu.style.top = '-250px';
        nav_menu.style.transition = '0.5s';
        img_icon.src = '/img/burguer_icon.png';
        check_menu = true;
    }
});

/* HEADER DESKTOP */

let scree_width = screen.width;

if (scree_width > 1000) {
    let header_desktop = document.querySelector('.header__boxgeneral');
    let header = document.querySelector('.header');

    function porcentajeTotal() {
        let altura_pantalla = window.scrollY;
        let alturaTotal_pantalla = document.documentElement.scrollHeight - window.innerHeight;
        let porcentajeTotal = (altura_pantalla / alturaTotal_pantalla) * 100;
        return Math.floor(porcentajeTotal);
    }

    window.addEventListener('mousemove', (e) => {
        const mouse = e.clientY;

        if (mouse === 0) {
            header_desktop.style.top = '36px';
            header_desktop.style.transition = '0.5s';
            header.style.position = 'fixed';
        }
    });

    window.addEventListener('scroll', () => {
        let porcentaje = porcentajeTotal();

        if (porcentaje > 0) {
            header_desktop.style.top = '-250px';
            header_desktop.style.transition = '0.5s';
            header.style.position = 'absolute';
        } else if (porcentaje === 0) {
            header_desktop.style.top = '36px';
            header_desktop.style.transition = '0.5s';
            header.style.position = 'fixed';
        }

    });
}

/* ---------HOME---------- */

if(title === 'Home') {
    let swiper__facilities = document.querySelector('.swiper__facilities');
    let swiper__wrapper = document.querySelector('.swiper-wrapper__facilities');
    let form_home = document.querySelector('#form_check_availability');
    let check_in = document.querySelector('#check_in_rooms');
    let check_out = document.querySelector('#check_out_rooms');
    let book_now = document.querySelector('#discover-titlebox__button');
    let btn_tour = document.querySelector('#btn_tour');
    let btn_learn_more = document.querySelector('#btn_learn_more');

    btn_tour.addEventListener('click', () => {
        location.href = '/rooms.php';
    });

    btn_learn_more.addEventListener('click', () => {
        location.href = '/contact.php';
    });

    book_now.addEventListener('click', () => {
        location.href = '/rooms.php';
    });

    form_home.addEventListener('submit', (e) => {

        if(check_out.value < check_in.value) {
            e.preventDefault();

            Toastify({
                text: "Please select a valid date, check out must be after check in",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        } else if(check_in.value === '' || check_out.value === '') {
            e.preventDefault();

            Toastify({
                text: "Please select a valid date",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        }
    });
    
    function initSwiperRooms() {
        if (window.matchMedia("(max-width: 1000px").matches) {
            new Swiper('#swipper-rooms', {
                keyboard: true,
                loop: true,
                autoplay: {
                    delay: 3000
                },
                cssMode: true,
                navigation: {
                    nextEl: '#swiper-button-next-rooms',
                    prevEl: '#swiper-button-prev-rooms',
                }
            });
        } else {
            new Swiper('#swipper-rooms', {
                slidesPerView: 1.5,
                centeredSlides: true,
                spaceBetween: 50,
                loop: true,
                navigation: {
                    nextEl: '#swiper-button-next-rooms',
                    prevEl: '#swiper-button-prev-rooms',
                }
            });
        }
    }
    
    initSwiperRooms();
    
    function initSwiperFacilities() {
        if (window.matchMedia("(max-width: 1000px").matches) {
            swiper__facilities.classList.add('swiper');
            new Swiper('#swiper__facilities', {
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 3000
                },
                pagination: {
                    el: "#facilities-bullets-pagination",
                    type: "bullets",
                    clickable: true
                }
    
            });
        } else {
            swiper__facilities.classList.remove("swiper");
            swiper__wrapper.classList.remove("swiper-wrapper");
        }
    
    }
    
    initSwiperFacilities();
    
    let swiperMenu = new Swiper(".swiper-menu", {
        cssMode: true,
    
        navigation: {
            nextEl: ".swiper-menu-buttons__next",
            prevEl: ".swiper-menu-buttons__prev",
        },
    });
    
    let swiperImagesFood = new Swiper('.swiper-images-food-slider', {
        direction: 'horizontal',
        loop: true,
        autoplay: {
            delay: 3000
        },
        cssMode: true,
    
        pagination: {
            el: ".swiper-pagination-images-food",
            type: "bullets",
            clickable: true
        }
    
    });
    
    window.addEventListener('resize', () => {
        initSwiperRooms();
        initSwiperFacilities();
    })
    
}

function activeNav(url){
    for (let i = 0; i < menu_links.length; i++) {
        let pos = menu_links[i].href.lastIndexOf('/');
        let result = menu_links[i].href.substring(pos + 1);
        
        if(result == url) {
            menu_links[i].classList.add('active');
        } else {
            menu_links[i].classList.remove('active');
        }
    }
}

/* -------ABOUT US------- */

if(title === 'About Us'){
    let swiper__facilities_about = document.querySelector('.swiper-facilities-about-us');
    let swiper__wrapper_about = document.querySelector('.swiper-wrapper-about-us');
    
    let swiper_counter = document.querySelector('#swiper-counter');
    let swiper_wrapper_counter = document.querySelector('.swiper-wrapper__counter');
    activeNav('about_us.php');

    function initSwiperAbout() {
        if (window.matchMedia("(max-width: 1000px").matches) {
            swiper__facilities_about.classList.add('swiper');
            new Swiper('#swiper-facilities-about-us', {
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 3000
                },
                pagination: {
                    el: "#facilities-about-us-bullets-pagination",
                    type: "bullets",
                    clickable: true
                }
    
            });
        } else {
            swiper__facilities_about.classList.remove("swiper");
            swiper__wrapper_about.classList.remove("swiper-wrapper");
        }
    }
    
    initSwiperAbout();
    
    function initSwiperCounter() {
        if (window.matchMedia("(max-width: 1000px").matches) {
            swiper_counter.classList.add('swiper');
            new Swiper('#swiper-counter', {
                direction: 'horizontal',
    
                cssMode: true,
    
                pagination: {
                    el: "#swiper-pagination-counter",
                    type: "bullets",
                    clickable: true
                }
    
            });
        } else {
            swiper_counter.classList.remove("swiper");
            swiper_wrapper_counter.classList.remove("swiper-wrapper");
        }
    }
    
    initSwiperCounter();
    
    window.addEventListener('resize', () => {
    
        initSwiperAbout();
        initSwiperCounter();
    
    })
}

/* ----ROOMS DETAILS ---- */

if(title === 'Room Detail') {
    let swiper_rooms_details = document.querySelector('#swiper-rooms-details');
    let swiper_wrapper__rooms_details = document.querySelector('.swiper-wrapper__rooms-details');

    function initSwiperRoomsDetails() {
        if (window.matchMedia("(max-width: 1000px").matches) {
            swiper_rooms_details.classList.add('swiper');
            new Swiper('#swiper-rooms-details', {
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 3000
                },
    
                navigation: {
                    nextEl: '#swiper-button-next-rooms-details',
                    prevEl: '#swiper-button-prev-rooms-details',
                }
    
            });
        } else {
            swiper_rooms_details.classList.remove("swiper");
            swiper_wrapper__rooms_details.classList.remove("swiper-wrapper");
        }
    }
    
    initSwiperRoomsDetails();
    
    window.addEventListener('resize', () => {
        initSwiperRoomsDetails();
    });
    
    /* BOOK ROOMS */
    
    let form_book_now = document.getElementById('room-details-type-availability__form');
    let check_in = document.querySelector('#room-details-type-availability-form__check-in');
    let check_out = document.querySelector('#room-details-type-availability-form__check-out');
    let full_name = document.querySelector('#room-details-type-availability-form__name');
    let email = document.querySelector('#room-details-type-availability-form__email');
    let phone = document.querySelector('#room-details-type-availability-form__phone');
    let message = document.querySelector('#room-details-type-availability-form__message');

    form_book_now.addEventListener('submit', (e) => {

        if(check_out.value < check_in.value) {
            e.preventDefault();

            Toastify({
                text: "Please select a valid date, check out must be after check in",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
                
        } else if(check_in.value === '' || check_out.value === '') {
            e.preventDefault();

            Toastify({
                text: "Please select a valid date",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();

        } else if(full_name.value.trim() === ''){
            e.preventDefault();
            Toastify({
                text: "Full name cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        }else if(email.value == '') {
            e.preventDefault();
            Toastify({
                text: "Email cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        } else if(phone.value === '' || isNaN(parseInt(phone.value))
        || parseInt(phone.value.length) != 9) {
            e.preventDefault();
            Toastify({
                text: "Phone have to be a real phone number and cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        }  else if(message.value == '') {
            e.preventDefault();
            Toastify({
                text: "Message cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        }
    });
}

/* ----OFFERS---- */

if(title === 'Offers') {
    let swipper_rooms_offers = document.querySelector('#swipper-rooms-offers');
    let swiper_wrapper_rooms_offers = document.querySelector('.swiper-wrapper__rooms-offers');
    activeNav('offers.php');

    function initSwiperRoomsOffers() {
        if (window.matchMedia("(max-width: 1000px").matches) {
            swipper_rooms_offers.classList.add('swiper');
            new Swiper('#swipper-rooms-offers', {
                direction: 'horizontal',
                loop: true,
                autoplay: {
                    delay: 3000
                },
    
                navigation: {
                    nextEl: '#swiper-button-next-rooms-offers',
                    prevEl: '#swiper-button-prev-rooms-offers',
                }
    
            });
        } else {
            swipper_rooms_offers.classList.remove("swiper");
            swiper_wrapper_rooms_offers.classList.remove("swiper-wrapper");
        }
    }
    
    initSwiperRoomsOffers();
    
    window.addEventListener('resize', () => {
        initSwiperRoomsOffers();
    })
    
}

/* ----CONTACT---- */
/* TODO HACERLO CON UNA FUNCION EL TEMA DEL TOSTIFY */

if(title === 'Contact') {
    let form_contact = document.querySelector('#form_contact');
    let full_name = document.querySelector('#full-name');
    let number_input = document.querySelector('#number-input');
    let email_input = document.querySelector('#email-input');
    let subject_input = document.querySelector('#subject-input');
    let message = document.querySelector('#message');

    activeNav('contact.php');

    form_contact.addEventListener('submit', (e) => {

        if(full_name.value.trim() === ''){
            e.preventDefault();
            Toastify({
                text: "Full name cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        } else if(number_input.value === '' || isNaN(parseInt(number_input.value))
        || parseInt(number_input.value.length) != 9) {
            e.preventDefault();
            Toastify({
                text: "Phone have to be a real phone number and cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        } else if(email_input.value == '') {
            e.preventDefault();
            Toastify({
                text: "Email cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        } else if(subject_input.value == '') {
            e.preventDefault();
            Toastify({
                text: "Email subject cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        } else if(message.value == '') {
            e.preventDefault();
            Toastify({
                text: "Message cant be empty!",
                duration: 3000,
                newWindow: true,
                close: true,
                gravity: "top", 
                position: "center", 
                stopOnFocus: true, 
                style: {
                    background: "red",
                    color: "#fff"
                }
                }).showToast();
        }
    
    });
}

/* ----- ROOMS -------- */
if(title === 'Rooms'){

    activeNav('rooms.php');

    function swiperRooms() {
        if (window.matchMedia("(min-width: 1000px").matches) {
            new Swiper(".my__swiper", {
                direction: "horizontal",
                slidesPerView: 3,
                grid: {
                    rows: 2,
                },
                pagination: {
                    el: ".rooms__swiper-pagination",
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '">' + (index + 1) + "</span>";
                    },
                },
            });
        } else {
            new Swiper(".my__swiper", {
                direction: "vertical",
                slidesPerView: 3,
                pagination: {
                    el: ".rooms__swiper-pagination",
                    clickable: true,
                    renderBullet: function (index, className) {
                        return '<span class="' + className + '">' + (index + 1) + "</span>";
                    },
                },
            });
        }
    }

    swiperRooms();
   
    window.addEventListener('resize', () => {
        swiperRooms();
    })
   
}


