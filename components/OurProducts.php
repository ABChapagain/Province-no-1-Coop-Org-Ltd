<?php
$sql = "SELECT  products.id, products.name, category.name as category FROM products JOIN category WHERE products.category = category.id ORDER BY products.id DESC LIMIT 10";


$res = $conn->query($sql);
$result = $res->fetch_all(MYSQLI_ASSOC);

if ($res->num_rows !== 0) {

?>
<!-- New Products Start -->
<div class="product-area gray-bg pt-90 pb-65">
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
                        ?>
                    <div class="product-wrapper-single">
                        <?php
                                for ($j = 0; $j < 2; $j++) {

                                    $sql = "select * from product_image where id =" . $result[$i]['id'] . " AND featured = 1";
                                    $image = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
                                    $image = $image[0]['name'];
                                ?>
                        <div class="product-wrapper mb-30">
                            <div class="product-img">
                                <a href="product.php?id=<?php echo $result[$i]['id'] ?>">
                                    <img alt="" src="uploads/products/<?php echo $image ?>" />
                                </a>
                                <div class="product-action">
                                    <a class="action-compare" href="product.php?id=<?php echo $result[$i]['id'] ?>">
                                        <i class="ion-ios-eye-outline"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="product-content text-left">
                                <div class="product-hover-style">
                                    <div class="product-title">
                                        <h4>
                                            <a
                                                href="product.php?id=<?php echo $result[$i]['id'] ?>"><?php echo $result[$i]['name'] ?></a>
                                        </h4>
                                    </div>
                                </div>
                                <div class="product-price-wrapper">
                                    <span><?php echo $result[$i]['category'] ?></span>
                                </div>
                            </div>
                        </div>
                        <?php
                                    $i++;
                                }
                                ?>
                    </div>
                    <?php
                        }
                        ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- New Products End -->

<?php
} else {
    echo "";
}
?>