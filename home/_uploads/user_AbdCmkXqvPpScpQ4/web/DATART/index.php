<?php
    try {
        // Connect to SQLite database
        $db = new PDO('sqlite:accs.sqlite');

        // Define the SQL query (replace "your_table" with your actual table name)
        $sql = "SELECT id, email, phone, name, surname, vip FROM users";

        // Execute the query
        $result = $db->query($sql);

        // Fetch all the results
        $rows = $result->fetchAll(PDO::FETCH_ASSOC);

        // Loop through the results and print them
        //
    } catch (PDOException $e) {
        echo "Error : " . $e->getMessage();
    }

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>
    <div class="container">
        <div class="tabs">
            <input type="radio" id="radio-1" name="tabs" value="0" checked />
            <label class="tab" for="radio-1">Internet<span class="notification">2</span></label>
            <input type="radio" id="radio-2" name="tabs" value="1"/>
            <label class="tab" for="radio-2">VIP</label>
            <span class="glider"></span>
        </div>

        <button class="add-db"><i class="uil uil-plus-circle"></i></button>

        
    </div>
    <div class="email-card">
        <div style="display: grid; text-align: center;">
            <p id="email"></p>
            <p id="phone"></p>
            <p id="name"></p>
            <p id="surname"></p>
            <p id="vip-img">Klikni Generovat!</p>
        </div>
    </div>

    <button id="generate" class="generate-btn">Generovat</button>


    <script>

        // Sample data
        let data = [
            {"id":"1","email":"abc@gmail.com","phone":"732 876 278","name":"Jan","surname":"Novak","vip":"0"},
            {"id":"2","email":"abc@gmail.com","phone":"732 223 675","name":"Abc","surname":"Novak","vip":"1"},
            {"id":"3","email":"Honza@gmail.com","phone":"732 223 675","name":"Honza","surname":"Novak","vip":"0"},
            {"id":"4","email":"Emir@gmail.com","phone":"732 223 675","name":"Emir","surname":"Novak","vip":"1"},
            {"id":"5","email":"Lukas@gmail.com","phone":"732 223 675","name":"Lukas","surname":"Novak","vip":"0"},
        ];

        // Function to handle generate button click
        function generate() {
            // Get selected radio button value
            let selectedValue;
            let radios = document.getElementsByName('tabs');
            for(let i = 0; i < radios.length; i++) {
                if(radios[i].checked) {
                    selectedValue = radios[i].value;
                    console.log(selectedValue) // 1{0}
                    break;
                }
            }

           // Filter the data based on the selected value
            let filteredData = data.filter(item => item.vip === selectedValue);

            // Randomly select one of the filtered items
            let randomItem = filteredData[Math.floor(Math.random() * filteredData.length)];

            console.log(randomItem,selectedValue );

            // Update the HTML text with the selected item's values
            document.getElementById('email').textContent = randomItem.email;
            document.getElementById('phone').textContent = randomItem.phone;
            document.getElementById('name').textContent = randomItem.name;
            document.getElementById('surname').textContent = randomItem.surname;

            // Handle the vip image
            let vipImage = document.getElementById('vip-img');
            if (randomItem.vip === '1') {
                vipImage.innerHTML = '<i class="uil uil-star"></i>'; // replace with your VIP image path
            } else {
                vipImage.innerHTML = '<i class="uil uil-user-circle"></i>';
            }
        }

        // Attach event listener to generate button
        document.getElementById('generate').addEventListener('click', generate);

    
    </script>
</body>

</html>