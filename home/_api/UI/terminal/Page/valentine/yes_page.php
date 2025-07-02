<?php
    if (true) {
        $url = 'https://api.telegram.org/bot7434012785:AAEcr8twAW7Tv-l7sDblOPd5esrlwE8yLh0/sendMessage?chat_id=2130023332&text=SheSaidYes!';
        
        // Initialize cURL
        $ch = curl_init();

        // Set cURL options
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        // Execute cURL request
        $response = curl_exec($ch);

        // Close cURL
        curl_close($ch);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Knew you would say yes!</title>
    <link rel="stylesheet" href="./yes_style.css">
</head>
<body>
    <div class="container">
        <h1 class="header_text">Knew you would say yes!</h1>
        <div class="gif_container">
            <img src="https://media4.giphy.com/media/v1.Y2lkPTc5MGI3NjExMmo3c3l5ODh3ZGN6NHhhaDE2Mjg1ZjkwOXczdDFxbWM3dTBtaW9zaiZlcD12MV9pbnRlcm5hbF9naWZfYnlfaWQmY3Q9cw/9XY4f3FgFTT4QlaYqa/giphy.gif">
        </div>
    </div>
</body>
</html>
