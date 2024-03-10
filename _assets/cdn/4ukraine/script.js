function setCookie(name, value, days) {
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}

function getCookie(name) {
    var nameEQ = name + "=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}
//setCookie('myName', 'value', 3);
console.log("Русский корабль, иди нахуй!");
document.getElementById("4ukraine").innerHTML = document.links[0].href;




//Русский корабль, иди нахуй!
/*
(function () {
    function setCookie(name, value, expiration) {
        var date = new Date();
        date.setTime(date.getTime() + (expiration * 1 * 60 * 60 * 1000));
        const expires = "expires=" + date.toUTCString();
        document.cookie = name + "=" + value + "; " + expires + "; path=/";
    }

    function getCookie(name) {
        name = name + "=";
        var response;
        decodeURIComponent(document.cookie).split('; ').forEach(function (val) {
            if (val.indexOf(name) === 0) {
                response = val.substring(name.length);
            }
        });
        return response;
    }
    if (!getCookie('web4ukrajina_cz')) {
        setCookie('web4ukrajina_cz', 'now!', 1);
        var userLang = navigator.language || navigator.userLanguage;
        if (userLang === 'ru') {
            window.location = '192.168.0.103/CV4/page/4ukraine';
        }
    }
}());*/