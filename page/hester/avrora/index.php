<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ΛΞV | Avrora</title>
    <link rel="stylesheet" href="../style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            flex-direction: row;
            width: 100%;
            max-width: 1200px;
            margin: 20px;
        }
        .form-container {
            flex: 1;
            padding: 20px;
            padding: 1.25rem;
            cursor: pointer;
            width: 100%;
            flex-shrink: 0;
            border-radius: 0.75rem;
            background: var(--secondary-color);
            text-align: left;
        }
        .image-container {
            flex: 1;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: white;
        }
        input[type="text"], input[type="number"] {
            width: calc(100% - 10px);
            height: 100%;
            outline: none;
            border: 1px solid gray;
            background: var(--secondary-color);
            border-radius: 6.2rem;
            padding: 1.1rem 4rem 1.1rem 1.5rem;
            font-size: 1rem;
            color: var(--text-color);
        }
        button {
            background: linear-gradient(10deg, #217bfe 0%, #ac87eb 30%, #ee4d5d 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1em;
        }
        img {
            max-width: 100%;
            max-height: 400px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        h1 {
            font-size: 2.7rem;
            background: linear-gradient(10deg, #217bfe 0%, #ac87eb 30%, #ee4d5d 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-container">
            <div class="form-group">
                <h1>Avrora | ImageGX [Beta]</h1>
                <label for="promptInput">Enter your prompt:</label>
                <input type="text" id="promptInput" placeholder="Enter your prompt">
            </div>
            <button onclick="generateImage()">Generate Image</button>
            <label>Generation may take some time...</label>
        </div>
        <div class="image-container" id="imageContainer">
            <!-- Generated image will be displayed here -->
        </div>
    </div>

    <script>
        function generateImage() {
            const prompt = document.getElementById('promptInput').value;
            const imageUrl = `https://image.pollinations.ai/prompt/${encodeURIComponent(prompt)}?nologo=true`;
            const imgElement = document.createElement('img');
            imgElement.src = imageUrl;
            imgElement.alt = prompt;

            const imageContainer = document.getElementById('imageContainer');
            imageContainer.innerHTML = ''; // Clear previous images
            imageContainer.appendChild(imgElement);
        }
    </script>
</body>
</html>
