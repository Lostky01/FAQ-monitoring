<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results</title>
    <style>
        /* Add your own CSS styles here to make the page look like Google Scholar */
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
        }

        .result {
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 10px;
            margin-bottom: 20px;
        }

        .result-title {
            font-size: 18px;
            font-weight: bold;
        }

        .result-url {
            color: #1a0dab;
        }

        .result-description {
            color: #545454;
        }

        .search-again {
            margin-top: 20px;
            font-size: 16px;
            color: #1a0dab;
            text-decoration: none;
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="result">
            <div class="result-title">Sample Search Result 1</div>
            <div class="result-url">www.example.com/sample-1</div>
            <div class="result-description">This is a sample description for search result 1. Lorem ipsum dolor sit amet,
                consectetur adipiscing elit.</div>
        </div>

        <div class="result">
            <div class="result-title">Sample Search Result 2</div>
            <div class="result-url">www.example.com/sample-2</div>
            <div class="result-description">This is a sample description for search result 2. Sed do eiusmod tempor
                incididunt ut labore et dolore magna aliqua.</div>
        </div>


        <a href="{{ route('search.index') }}" class="search-again">Search Again</a>
    </div>
</body>

</html>
