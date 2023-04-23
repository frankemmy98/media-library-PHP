<?php 
include("inc/data.php");
include("inc/functions.php");

$pageTitle = "Full Catalog";
$section = null;

// PHP isset function
if (isset($_GET["cat"])) {
    if ($_GET["cat"] == "books") {
        $pageTitle = "Books";
        $section = "books";
    } else if ($_GET["cat"] == "movies") {
        $pageTitle = "Movies";
        $section = "movies";
    } else if ($_GET["cat"] == "music") {
        $pageTitle = "Music";
        $section = "music";
    }
}

include("inc/header.php"); ?>

<div class="section catalog page">
    <div class="wrapper">
        <div class="breadcrumbs">
            <a href="catalog.php">Full Catalog</a>
            &gt; <a href="catalog.php?cat=<?php echo strtolower($item["category"]); ?>">
            <?php echo $item["category"]; ?></a>
            &gt; <?php echo $item["title"]; ?>
        </div>
   
        <h1>
            <?php
            if ($section != null) {
                echo "<a href='catalog.php'>Full Catalog</a> &gt;";
            }
             echo $pageTitle; ?>
        </h1>

        <ul class='items'>
             <?php
            $categories = array_category($catalog, $section);
            foreach($categories as $id) {
                echo get_item_html($id, $catalog[$id]);
            }
            ?>
        </ul>
    </div>
</div>

<?php include("inc/footer.php"); ?>





