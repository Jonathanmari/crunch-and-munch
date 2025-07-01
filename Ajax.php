<?php

    session_start();
    include("database/db_connection.php");

if (isset($_POST['search'])) {

    $food = $_POST['search'];
    $foodPreview= "SELECT product_name, url FROM foodlist WHERE product_name LIKE '%$food%' LIMIT 10";
    $query = $conn->prepare($foodPreview);
    $query->execute();

    echo '
<ul>
  ';

    while ($Result = $query->fetch(PDO::FETCH_ASSOC)) {
        $url = $Result['url'];
        ?>

        <li onclick='fill("<?php echo $Result['product_name']; ?>")'>
            <a href="<?php echo $url; ?>">
                <!-- Assigning searched result in "Search box" in "search.php" file. -->
                <?php echo $Result['product_name'];?>
        </li></a>
        <?php
    }
    echo '</ul>';
}
?>