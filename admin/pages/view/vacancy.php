<?php
include "../../includes.php";


$id = $_GET['id'];
$sql = "select * from vacancy where id='$id'";
$result = $conn->query($sql);
$rows = $result->fetch_assoc();

?>

<body>
    <div class="items">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">View Vacancy</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body" style="height: fit-content;">
                <div class="title">
                    <span class="font-weight-bold">Title:</span>
                    <?php echo $rows['title'] ?>
                </div>
                <hr>

                <div class="vacancy">
                    <span class="font-weight-bold">Vacant Seats:</span>
                    <?php echo $rows['vacancy_seats'] ?>
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

                <div class="RegistrationDate">
                    <span class="font-weight-bold">Registration Date</span>
                    <div class="card-body">
                        <?php echo $rows['starting_date'] . " to " . $rows['termination_date'] ?>
                    </div>
                </div>
                <hr>

                   <div class="RegistrationDate">
                    <span class="font-weight-bold">Registration Date</span>
                    <div class="card-body">
                        <?php echo $rows['start_popup_date'] . " to " . $rows['end_popup_date'] ?>
                    </div>
                </div>
                <hr>

            </div>
        </div>
    </div>



    <?php
    require app . "/pages/includes/js_links.php";
    ?>




</body>