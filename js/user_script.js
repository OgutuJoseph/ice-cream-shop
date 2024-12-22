let profile = document.querySelector('.header .flex .profile-detail');
let searchForm = document.querySelector('.header .flex .search-form');
let navbar = document.querySelector('.navbar');


document.querySelector('#user-btn').onclick = () => {
    profile.classList.toggle('active');
    searchForm.classList.remove('active');
}

document.querySelector('#search-btn').onclick = () => {
    searchForm.classList.toggle('active');
    profile.classList.remove('active');
}

document.querySelector('#menu-btn').onclick = () => {
    navbar.classList.toggle('active');
}

/*************** Slider ********************/
const imgBox = document.querySelector('.slider-container');
const slides = document.getElementsByClassName('slideBox');
var i = 0;

function nextSlide() {
    console.log('here,,,next')
    slides[i].classList.remove('active');
    i = (i + 1)% slides.length;
    slides[i].classList.add('active');
}

function prevSlide() {
    console.log('here,,,prev')
    slides[i].classList.remove('active');
    i = (i - 1 + slides.length) % slides.length;
    slides[i].classList.add('active');
}

/*************** Testimonial ********************/
const btn = document.getElementsByClassName('btn1');
const slide = document.getElementById('slide');

btn[0].onclick = function () {
    console.log('here 1')
    slide.style.transform = "translateX(0px)";
    for (var  i = 0; i < 4; i++){
        btn[i].classList.remove("active");
    }
    this.classList.add("active");
}

btn[1].onclick = function () {
    slide.style.transform = "translateX(-800px)";
    for (var  i = 0; i < 4; i++){
        btn[i].classList.remove("active");
    }
    this.classList.add("active");
}

btn[2].onclick = function () {
    slide.style.transform = "translateX(-1600px)";
    for (var  i = 0; i < 4; i++){
        btn[i].classList.remove("active");
    }
    this.classList.add("active");
}

btn[3].onclick = function () {
    slide.style.transform = "translateX(-2400px)";
    for (var  i = 0; i < 4; i++){
        btn[i].classList.remove("active");
    }
    this.classList.add("active");
}

