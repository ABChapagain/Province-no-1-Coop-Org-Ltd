<?php
require_once('./components/Header.php');

require_once('./config/db_config.php');

?>


<?php require_once('./components/Footer.php');
?>

<script>
    $.ajax({
        type: "post",
        url: "products-fetch.php",
        data: "data",
        dataType: "json",
        success: function(response) {
            alert("check")
        }
    });
</script>