console.log('Cześć, jesteś na dobrej drodze by poznać passy 👋 aleee to nie będzie takie łatwe, zaszyfrowałem je, spróbuj się domyślić, podpowiedź to alfabet i brak polskich liter. User to: 8 5 12 12 15; Hasło to: 21 15 17 12 4;');

const user = document.getElementById('user');
const password = document.getElementById('pass');

function check() {
    if (user.value === "hello" && password.value === "world") {
        location.replace('index2.html');
    } else {
        alert('Niepoprawne Hasło lub Użytkownik');
    }
}

password.addEventListener("keypress", function(event) {
    if (event.key === "Enter") {
        event.preventDefault();
        check();
    }
});