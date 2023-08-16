<?php 
    include 'connect.php'; 
    $parent = mysqli_fetch_assoc(mysqli_query($con,"select * from parent where pid = '{$_GET['parent']}'"));
    $subscr = mysqli_query($con,"select * from subscriptions where pid = '{$_GET['parent']}'");
    $total_working_days = mysqli_num_rows(mysqli_query($con,"SELECT COUNT(*) FROM `delivary` GROUP BY `date`"));
    ?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="Bhavani/" data-template="vertical-menu-template-free">

<head>
    <?php include 'bhavani.php'; ?>
</head>

<body>
    <?php include 'header.php'; ?>
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- Content -->

        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

                <div class="card mb-4">

                    <h5 class="card-header">Parent Details</h5>
                    <!-- Account -->
                    <div class="card-body">
                            <p>Name : </p> <h5><?php echo $parent['pname'] ?></h5>
                            <p>Phone :</p> <h5><?php echo $parent['pid'] ?></h5>
                            <p>Email :</p> <h5><?php echo $parent['email'] ?></h5>
                            <p>Address :</p> <h5><a href="<?php echo $parent['address'] ?>">Address</a></h5>
                    </div>
                    <hr class="my-0" />
                    <!-- /Account -->
                </div>
                
                <?php while($row = mysqli_fetch_assoc($subscr)){ 
                    $student = mysqli_fetch_assoc(mysqli_query($con,"select * from student where stdid = '{$row['stdid']}'"));
                    $school = mysqli_fetch_assoc(mysqli_query($con,"select school_name from schools where sid = '{$student['school']}'"))['school_name'];
                    $delivered = mysqli_num_rows(mysqli_query($con,"select * from delivary where stdid = '{$row['stdid']}' and status = 1"));
                    $in_transit = mysqli_num_rows(mysqli_query($con,"select * from delivary where stdid = '{$row['stdid']}' and status = 0"));
                    $not_pickedup = $total_working_days - $in_transit - $delivered;
                    ?>

                <div class="card mb-4">

                    <h5 class="card-header"><?php echo $student['sname'] ?></h5>
                    <!-- Account -->
                    <div class="card-body">
                        <div class="d-flex align-items-start align-items-sm-center gap-4">
                            <img src="../Upload/<?php echo $student['photo'] ?>" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar" />
                            <div class="flex-grow-1">
                                <h5><?php echo "$school" ?></h5>
                                <p class="mb-0">No Picked Boxes : <?php echo $not_pickedup ?></p>
                                <p class="mb-0">Delevered Boxes : <?php echo $delivered ?></p>
                                <p class="mb-0">Intrasntion Boxes : <?php echo $in_transit ?></p>

                        </div>
                    </div>  
                    <hr class="my-0" />
                    <!-- /Account -->
                </div>
                <?php } ?>




            </div>
        </div>
        <!-- / Content -->

        <!-- Footer -->
        <footer class="content-footer footer bg-footer-theme">
            <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
                <div class="mb-2 mb-md-0">
                    ©
                    <script>
                        document.write(new Date().getFullYear());
                    </script>
                    , made with ❤️ by
                    <a href="https://github.com/praveentech21" target="_blank" class="footer-link fw-bolder">Sai
                        Praveen</a>
                </div>

            </div>
        </footer>
        <!-- / Footer -->

    </div>
    <!-- Content wrapper -->
    <?php include 'fotter.php'; ?>
</body>

</html>