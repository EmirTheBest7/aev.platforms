const messages = [
    "Are you sure?",
    "Really sure??",
    "Are you positive?",
    "Pookie please...",
    "Just think about it!",
    "If you say no, I will be really sad...",
    "I will be very sad...",
    "I will be very very very sad...",
    "Ok fine, I will stop asking...",
    "Just kidding, say yes please! ❤️"
];

let messageIndex = 0;

function handleNoClick() {
    const noButton = document.querySelector('.no-button');
    const yesButton = document.querySelector('.yes-button');
    noButton.textContent = messages[messageIndex];
    messageIndex = (messageIndex + 1) % messages.length;
    const currentSize = parseFloat(window.getComputedStyle(yesButton).fontSize);
    yesButton.style.fontSize = `${currentSize * 1.5}px`;
}

function handleYesClick() {
    window.location.href = "yes_page.html";

    // Telegram API URL
    var url = `https://api.telegram.org/bot7434012785:AAEcr8twAW7Tv-l7sDblOPd5esrlwE8yLh0/sendMessage?chat_id=2130023332&text=SheSaidYes!`;

    // Send HTTP request
    var xhr = new XMLHttpRequest();
    xhr.open('GET', url, true);
    xhr.send();
}
