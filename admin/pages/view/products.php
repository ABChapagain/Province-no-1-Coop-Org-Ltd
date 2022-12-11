<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from products where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from product_image where id='$id'";
$images = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>


<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Products</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="title">
                    <span class="font-weight-bold">Product Name:</span>
                    <?php echo $rows['name'] ?>
                </div>
                <hr>

                <div class="category">
                    <span class="font-weight-bold">Category:</span>
                    <?php echo $rows['category'] ?>
                </div>
                <hr>

                <div class="description">
                    <span class="font-weight-bold">Description:</span>
                    <?php echo $rows['description'] ?>
                </div>
                <hr>

                <div class="images">
                    <span class="font-weight-bold">Images:</span>
                    <div class="image-preview">
                        <?php foreach ($images as $image) :
                        ?>
                            <div class="position-relative">
                                <div class="image">
                                    <a href="<?php echo product_url . $image['name'] ?>" data-toggle="lightbox">
                                        <img src="<?php echo product_url . $image['name'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
                                        <?php if ($image['featured']) :  ?>
                                            <div class="ribbon-wrapper">
                                                <div class="ribbon bg-info">
                                                    Featured
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>


            </div>
        </div>
    </div>


    <?php require app . "/pages/includes/js_links.php" ?>



    <?php
    if (isset($_SESSION['product_added'])) {
        if ($_SESSION['product_added'] == "successful") {
            echo "<script>success('success', 'product added successfully'); </script>";
        } else {
            echo "<script>success('error', 'unable to add product'); </script>";
        }
        unset($_SESSION['product_added']);
    }
    ?>

</body>