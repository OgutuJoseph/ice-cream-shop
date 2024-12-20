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

