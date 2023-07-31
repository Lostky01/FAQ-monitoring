<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search</title>
    <style>
        /* Add your own CSS styles here to make the page look like Google.com */
        body {
            font-family: Arial, sans-serif;
            background-color: #f1f1f1;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .google-logo {
            max-width: 150px;
            height: auto;
            margin-right: 20px;
        }

        .search-bar {
            display: flex;
            align-items: center;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 8px;
            width: 100%;
            max-width: 500px;
            background-color: #fff;
        }

        .search-input {
            flex: 1;
            border: none;
            padding: 8px;
            font-size: 16px;
            outline: none;
        }

        .search-button {
            padding: 8px 12px;
            font-size: 16px;
            background-color: #4285F4;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Google Logo -->
        <img src="https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png"
            alt="Google Logo" class="google-logo">

        <!-- Search Bar -->
        <form action="{{ route('search.results') }}" method="GET" class="search-bar">
            <input type="text" name="q" class="search-input" placeholder="Search Google Scholar...">
            <button type="submit" class="search-button">Google Scholar Search</button>
        </form>
    </div>
</body>

</html>
