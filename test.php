<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

    <div class="row">
        <?php

        $conn = new mysqli("Localhost", "root", "", "province");
        $sql = "select * from department";
        $result = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);

        foreach ($result as $rows) {
        ?>
        <div class="col-3"><?php echo $rows['department_name'] ?></div>

        <?php
        } ?>


    </div>
</body>

</html>