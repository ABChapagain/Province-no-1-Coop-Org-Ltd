<?php
require_once('./components/Header.php');

require_once('./config/db_config.php');

?>


<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-image-5 ptb-170">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h3>PRODUCTS</h3>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li class="active">Products</li>
            </ul>
        </div>
    </div>
</div>
<!-- Breadcrumb Area End -->

<!-- Shop Page Area Start -->
<div class="shop-page-area ptb-100">
    <div class="container">
        <div class="row">

            <?php
            $sql = "SELECT * FROM category";

            $result = $conn->query($sql);
            $result->fetch_all(MYSQLI_ASSOC);
            ?>

            <div class="col-lg-3">
                <div class="shop-sidebar-wrapper gray-bg-7 shop-sidebar-mrg">
                    <div class="shop-widget">
                        <h4 class="shop-sidebar-title">Category</h4>
                        <div class="sidebar-list-style mt-20">
                            <ul>
                                <?php
                                foreach ($result as $category) {
                                    echo "
                                    <li>
                                    <input type='radio' name='productCategory' id='productCategory$category[id]' onclick='productFetch(`$category[name]`)'/>
                                    <label for='productCategory$category[id]'>$category[name]</label>
                                    </li>
                                    ";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view pb-20">
                        <div class="row" id="productsList">
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>
<!-- Shop Page Area End -->

<?php require_once('./components/Footer.php');

?>


<script>
const productsList = document.getElementById('productsList')
const productFetch = (category) => {
    $.ajax({
        type: "POST",
        url: "./ajax/products.php",
        data: {
            category: category
        },
        dataType: "JSON",
        success: function(response) {

            let productListHTML = '';

            if (response.length === 0) {
                productListHTML = `<div class='col-12 text-center'>
                                        <h3>No Products Found</h3>
                                    </div>`;
            } else {

                response.forEach(product => {
                    productListHTML += `
                            <div class='product-width col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 mb-30'>
                                <div class='product-wrapper mb-30 shadow rounded'>
                                    <div class='rounded'>
                                    <a  href='product.php?id=${product.id}'>
                                        <img alt='Product' class='product-image'
                                            width='100%'
                                            src='uploads/products/${product.image}' />
                                    </a>
                                    </div>

                                    <div class='blog-content px-2 py-3'>
                                        <h4>${product.name}</h4>
                                        <p>${product.short_description.length > 100 ? product.short_description.substr(0, 100) + '....' : product.short_description}</p>
                                        <a class='action-compare' href='product.php?id=${product.id}' >
                                            Read More
                                        </a>
                                    </div>
                                </div>
                            </div>`;

                })
            }
            productsList.innerHTML = productListHTML;
        }
    });
}
productFetch('all');
</script>