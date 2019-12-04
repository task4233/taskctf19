const username = document.getElementById("username");
const password = document.getElementById("password");

username.addEventListener('input', function (e) {
    const value = e.target.value;
    e.target.value = value.slice(0, 8);
})

password.addEventListener('input', function (e) {
    const value = e.target.value;
    e.target.value = value.slice(0, 8);
})