<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from events where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

$sql = "select * from event_images where id='$id'";
$images = $conn->query($sql)->fetch_all(MYSQLI_ASSOC);
?>

<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Events</h3>
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
                        <?php echo $rows['posted_date'] ?>
                    </div>
                </div>
                <hr>

                <div class="PopupDate">
                    <span class="font-weight-bold">Popup date</span>
                    <div class="card-body">
                        <?php echo $rows['start_popup'] . " to " . $rows['end_popup'] ?>
                    </div>
                </div>
                <hr>

                <div class="images">
                    <span class="font-weight-bold">Images:</span>
                    <div class="image-preview">
                        <?php foreach ($images as $image) :
                        ?>
                            <div class="position-relative">
                                <div class="image">
                                    <a href="<?php echo event_url . $image['name'] ?>" data-toggle="lightbox">
                                        <img src="<?php echo event_url . $image['name'] ?>" width=" 80px" class="img-fluid mb-2" alt="image" />
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



    <?php
    require app . "/pages/includes/js_links.php";
    ?>




</body>