<?php
    session_start();
    include("database/db_connection.php");
?>

<!DOCTYPE html>
<html>

<head>
    <title>Live Search using AJAX</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    <script type="text/javascript" src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    
    <?php include 'header.php'; ?>

    <main class="container p-5">
        <div class="row">
                <!-- Search box. -->
                <input type="text" id="search" placeholder="Search" style="margin-bottom:20px"/>

                <!-- Suggestions will be displayed in below div. -->
                <div id="display" class="row"></div>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <?php include 'footer.php'; ?>
    </footer>
</body>

</html>