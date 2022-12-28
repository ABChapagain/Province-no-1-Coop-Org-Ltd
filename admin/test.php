<?php

use function PHPSTORM_META\type;

include "./config/config.php";
?>

<form action="" enctype="multipart/form-data" method="post">


    <input type="file" name="file[]" id="" multiple>
    <input type="submit" value="submit" name="submit">
</form>


<?php

function test($file)
{


    echo $file;
    if ($file < 1048576)
        return 1;
    else
        return 0;
}


if (isset($_POST['submit'])) {
    if (strlen($_FILES['file']['name'][0]) != 0) {
        // test($_FILES['file']); //validating the size

        $countfiles = count($_FILES['file']['name']);
        for ($i = 0; $i < $countfiles; $i++) {
            $validation =  test($_FILES['file']["size"][$i]);
            if ($validation) {
                echo "<br> validated";
            } else
                echo "<br> not validated";
        }
    }
}

?>





<?php
if (isset($_SESSION['report_deleted'])) {
    echo $_SESSION['report_deleted'];
    if ($_SESSION['report_deleted'] == "successful") {
        echo "<script>success('success', 'report deleted successfully'); </script>";
    } else {
        echo "<script>success('error', 'unable to delete report'); </script>";
    }
    unset($_SESSION['report_deleted']);
}
?>