const userBtn = document.querySelector('#user-btn');
// console.log(userBtn);
userBtn.addEventListener('click', function() {
    const userBox = document.querySelector('.profile-detail');
    // console.log(userBox);
    userBox.classList.toggle('active');
});

const toggle = document.querySelector('.toggle-btn');
    // console.log(toggle);
    toggle.addEventListener('click', function() {
    const sidebar = document.querySelector('.sidebar');
    // console.log(sidebar)
    sidebar.classList.toggle('active');
});
