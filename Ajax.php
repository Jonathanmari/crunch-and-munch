<?php

session_start();
include("database/db_connection.php");

if (isset($_POST['search'])) {

    $food = $_POST['search'];
    $foodPreview = "SELECT product_name, url, image_small_url FROM foodlist WHERE product_name LIKE '%$food%' LIMIT 20";
    $query = $conn->prepare($foodPreview);
    $query->execute();

    while ($Result = $query->fetch(PDO::FETCH_ASSOC)) {
        $url = $Result['url'];
        $image = $Result['image_small_url'];
        ?>

        <div class="col-lg-3 col-md-4 mb-3" onclick='fill("<?php echo $Result['product_name']; ?>")'>
            
                <div class="card text-bg-dark text-center p-2">
                    <img src="<?php echo $image; ?>" class="card-img-top m-auto"
                        style="max-height:100px;height:100px;max-width:100px;width:100px;">
                    <a href="<?php echo $url; ?>" class="link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">
                        <!-- Assigning searched result in "Search box" in "search.php" file. -->
                        <?php echo $Result['product_name']; ?>
                    </a>
                </div>
            
    </div>
        <?php
    }

}
?>