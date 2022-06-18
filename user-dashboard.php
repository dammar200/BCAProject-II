<?php include("inc/header.php") ;?>

<body class="" style="background-color:#A1A1A1">

    <?php include("inc/navbar.php") ;?>

    <section class="m-5">
        <div class="container bg-dark p-5 signup">
            <div class="row pb-3">
                <div class=" col-md-6 d-flex justify-content-start text-white">
                    <h2>
                        <?php 
                            if (isset($_SESSION['name'])) {
                                echo $_SESSION['name'];
                                } 
                        ?>
                    </h2>
                </div>
                <div class="col-md-6 image-register d-flex justify-content-end">
                    <img class="col-12 col-md-6" alt="Logo" src="admin/assets/images/logoblue.png" width="190"
                        height="57">
                </div>
                <span class="text-warning d-flex justify-content-end pt-0">Business Directory</span>

            </div>
            <div class="row">
                <div class="col-md-6">
                    <h3 class="title text-white">Your Profile </h3>
                    <div class="listing p-2">
                        <?php
                        $query = "SELECT * FROM users";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <p class="text-white fs-5">Name:
                            <?php echo  $row['name']; ?>
                        </p>
                        <p class="text-white fs-5">Email:
                            <?php
                                if (isset($_SESSION['email'])) {
                                echo $_SESSION['email'];
                                } ?>
                        </p>
                        <p class="text-white fs-5">Phone:
                                <?php echo  $row['phone']; ?>
                        </p>
                        <a href="admin/manageuser.php">Edit Your Profile</a>
                    </div>
                    
                </div>
                    <div class="col-md-6">
                        <h3 class="title text-white">Your Listing </h3>
                    <?php
                    $query = "SELECT * FROM businesslists";
                    $result = mysqli_query($conn, $query);
                    while($row = mysqli_fetch_assoc($result)) {
                        echo '<div class="col-md-6">';
                        echo '<div class="listing p-2 text-white fs-5">';
                        echo $row['business_name'];
                        echo '</div>';
                        echo '</div>';
                    }
                    ?>
            </div>
    </section>
    <?php include("inc/footer.php") ;?>