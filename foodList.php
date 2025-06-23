<?php
    session_start();
    include("database/db_connection.php");

    $sqlFoodList = "SELECT * FROM foodlist WHERE id BETWEEN 1 AND 20";
    $stmt = $conn->prepare($sqlFoodList);
    $stmt->execute();
    $foodList = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // print_r($foodList);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crunch & Munch</title>
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <link href="style.css" rel="stylesheet">
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container p-5">
        <div class="row">
                <?php foreach ( $foodList as $row) {
                    echo "
                        <div class=\"col-lg-3 col-md-4 mb-3\">
                            <div class=\"card text-bg-dark text-center p-2\">
                                <a href=\"$row[url]\" class=\"link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover\">
                                <img src=\"$row[image_small_url]\" class=\"card-img-top m-auto\" style=\"max-height:100px;height:100px;max-width:100px;width:100px; \">
                                <div class=\"card-body\">
                                    <h6 class=\"card-title\"> $row[product_name]";
                                    if(!empty($row["brands"])) {
                                        echo " - " . $row["brands"];
                                    } echo "</h6>
                                </a>
                                        <p class=\"card-text\"> 
                                            <ul class=\"list-group\">
                                                <li class=\"list-group-item list-group-item-dark\">Origine : $row[countries]</li>
                                                <li class=\"list-group-item list-group-item-dark\">Type de produit : $row[pnns_groups_1]</li>
                                                <li class=\"list-group-item list-group-item-dark\">Calories : $row[energy_kcal_100g]</li>
                                            </ul>                                                                  
                                        </p>
                                    </div>
                            </div>
                        </div>
                        "
                ;} ?>
        </div>
    </main>

    <footer class="bg-dark text-white text-center py-3">
        <?php include 'footer.php'; ?>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
        crossorigin="anonymous">
    </script>
</body>

</html>