<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from reports where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();


?>

<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Reports</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="title">
                    <span class="font-weight-bold">Title:</span>
                    <?php echo $rows['title'] ?>
                </div>
                <hr>

                <div class="short_description">
                    <span class="font-weight-bold">Short Description:</span>
                    <?php echo $rows['short_description'] ?>
                </div>
                <hr>

                <div class="Description">
                    <span class="font-weight-bold">Description:</span>
                    <div class="card-body">
                        <textarea id="summernote" name="description" readonly> <?php echo $rows['description'] ?>
                        </textarea>
                    </div>
                </div>
                <hr>

                <div class="PublishedDate">
                    <span class="font-weight-bold">Published Date</span>
                    <div class="card-body">
                        <?php echo $rows['published_date'] ?>
                    </div>
                </div>
                <hr>

                <!-- <div class="PopupDate">
                    <span class="font-weight-bold">Popup date</span>
                    <div class="card-body">
                        <?php //echo $rows['start_popup'] . " to " . $rows['end_popup'] 
                        ?>
                    </div>
                </div>
                <hr> -->

                <div class="files">
                    <span class="font-weight-bold">Files:</span>

                    <div class="file-collection">

                        <div class="file">
                            <div class="link">
                                <div class="pdf">
                                    <div class="pdf_img">
                                        <a target="_blank" class="file" href="<?php echo report_url . $rows['file_name'] ?>">
                                            <img class="" src="<?php echo url ?>dist/img/pdf.png" alt="" height="50px">
                                        </a>
                                    </div>

                                </div>
                            </div>
                            <div class="file_name">
                                <span><?php echo $rows['file_name'] ?></span>
                            </div>

                        </div>
                    </div>


                </div>
            </div>

        </div>
    </div>
    </div>

    <?php
    require app . "/pages/includes/js_links.php";
    ?>




</body>