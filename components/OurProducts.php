<?php
$sql = "SELECT * FROM products LIMIT 10";

$res = $conn->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);

if ($res->num_rows !== 0) {

?>
<!-- New Products Start -->
<div id="products" class="product-area gray-bg pt-90 pb-65">
    <div class="container">
        <div class="product-top-bar section-border mb-55">
            <div class="section-title-wrap text-center">
                <h3 class="section-title">Our Products</h3>
            </div>
        </div>
        <div class="tab-content jump">
            <div class="tab-pane active">
                <div class="featured-product-active owl-carousel product-nav">
                    <?php
                        $max = $res->num_rows % 2 == 0 ? $res->num_rows : $res->num_rows - 1;
                        $i = 0;
                        while ($i < $max) {
                            echo "<div class='product-wrapper-single'>";
                            for ($j = 0; $j < 2; $j++) {
                                echo "<div class='product-wrapper mb-30 shadow rounded'>
                                <div class='rounded'>";

                                $sql = "select * from product_image where id =" . $result[$i]['id'];
                                $image = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                                $image = $image[0]['name'];

                                echo "<img alt='Product'
                                style='object-fit:cover; height: 180px; border-top-left-radius: 5px; border-top-right-radius: 5px;'
                                src='uploads/products/" . $image . "' />
                                </div>
                                <div class='blog-content px-2 py-3'>
                                <h4>" . $result[$i]['name'] . "</h4>";
                                $description = $result[$i]['description'];
                                if (strlen($description) > 100) {
                                    $description = trim(substr($description, 0, 100));
                                    $description .= "...";
                                }

                                echo "<p>$description</p>
                            <a class='action-compare' href='product.php?id=" . $result[$i]['id'] . "'" . " >
                                        Read More
                                </a>";

                                echo "</div>
                                </div>";
                                $i++;
                            }
                            echo "</div>";
                        }
                        ?>
                </div>
            </div>
        </div>
        <div class="ms-auto text-end">
            <a class="btn py-2 px-4 rounded text-white text-end bg-project" href="products.php">Show
                More</a>
        </div>
    </div>
</div>
<!-- New Products End -->

<?php
} else {
    echo "";
}
?>