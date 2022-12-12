<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />

</head>

<body>


    <div class="my-dropzone"></div>
</body>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>


<script>
    // Dropzone has been added as a global variable.
    const dropzone = new Dropzone("div.my-dropzone", {
        url: "/file/post"
    });
</script>


        foreach ($result as $rows) {
        ?>
        <div class="col-3"><?php echo $rows['department_name'] ?></div>
        <?php
        } ?>


    </div>
</body>

</html>