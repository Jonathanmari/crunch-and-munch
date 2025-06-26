<?php
    session_start();
    include("database/db_connection.php");
    
    // Détermine sur quel page on est
    if(isset($_GET['page']) && !empty($_GET['page'])){
        $currentPage = (int) strip_tags($_GET['page']);
    }else{
        $currentPage = 1;
    }

    $parPage = 20;

    // Calcul du 1er article de la page
    $premier = ($currentPage * $parPage) - $parPage;

    $sqlFoodList = "SELECT * FROM foodlist LIMIT :premier, :parpage";

    $query = $conn->prepare($sqlFoodList);
    $query->bindValue(':premier', $premier, PDO::PARAM_INT);
    $query->bindValue(':parpage', $parPage, PDO::PARAM_INT);
    $query->execute();
    $foodList = $query->fetchAll(PDO::FETCH_ASSOC);

    // nombre de lignes et d'articles dans la bdd foodlist
    $sqlFoodListLines = "SELECT COUNT(*) FROM foodlist";
    $res = $conn->query($sqlFoodListLines);
    $count = $res->fetchColumn();

    $nbArticles = (int) $count;
    $pages = ceil($count / 20);

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            

        }); 
    </script>
</head>

<body>
    <?php include 'header.php'; ?>

    <main class="container p-5">
        <div class="row">
                <!-- liste des food -->
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
                <!-- liste des nav buttons -->
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">

                            <!-- Lien vers la page précédente (désactivé si on se trouve sur la 1ère page) -->
                            <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                                <a href="http://localhost/Crunch-and-munch/foodList.php?page=<?= $currentPage - 1 ?>" class="page-link text-light bg-dark">Précédente</a>
                            </li>
                            
                            
                            <?php for($page = 1; $page <= $pages; $page++): ?>
                                <!-- Lien vers chacune des pages (activé si on se trouve sur la page correspondante) -->
                                <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                                    <a href="http://localhost/Crunch-and-munch/foodList.php?page=<?= $page ?>" class="page-link text-light bg-dark"><?= $page ?></a>
                                </li>
                            <?php endfor ?>
                                <!-- Lien vers la page suivante (désactivé si on se trouve sur la dernière page) -->
                                <li class="page-item <?= ($currentPage == $pages) ? "disabled" : "" ?>">
                                <a href="http://localhost/Crunch-and-munch/foodList.php?page=<?= $currentPage + 1 ?>" class="page-link text-light bg-dark">Suivante</a>
                            </li>
                        
                    </ul>
                </nav>
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