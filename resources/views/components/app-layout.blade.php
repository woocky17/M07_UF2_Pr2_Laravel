<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movies List</title>

    <!-- Add Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <style>
        .custom-width {
            max-width: 300px;
        }

        .header,
        .footer {
            text-align: center;
            padding: 20px;
        }

        .header img,
        .footer img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="container">

    <header class="header">
        <img src="header.jpg" alt="Header Image" class="img-fluid">
    </header>

    {{$slot}}

    <footer class="footer">
        <img src="footer.jpg" alt="Footer Image" class="img-fluid">
    </footer>

    <!-- Add Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>

</html>