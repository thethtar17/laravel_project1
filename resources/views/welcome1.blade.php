<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our School Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
            color: #333;
        }
        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #4CAF50;
            font-size: 2.5em;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.2em;
            margin-bottom: 30px;
        }
        .buttons {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        .button {
            text-decoration: none;
            padding: 10px 20px;
            font-size: 1em;
            color: white;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Welcome to the School Management System</h1>
    <p>Your gateway to managing student information, staff records, and academic resources efficiently.</p>
    <div class="buttons">
        <a href="/login" class="button">Login</a>
        <a href="/register" class="button">Register</a>
    </div>
</div>

</body>
</html>
