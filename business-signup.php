<?php include("connection/config.php") ;?>
<?php include("inc/header.php") ;?>

<!-- <meta http-equiv="refresh" content="0.5;URL=manageadmin.php"> -->

<body class="" style="background-color:#A1A1A1">

    <?php include("inc/navbar.php") ;?>
    <section class="m-5">
        <div class="container col-sm-6 col-md-4 xm-auto bg-dark p-5 signin">
            <div class="row pb-3">
                <div class=" col-md-6 d-flex justify-content-start text-white">
                    <h2>Sign Up Business</h2>
                </div>
                <div class="col-md-6 image-register d-flex justify-content-end">
                    <img class="col-12 col-md-6" alt="Logo" src="admin/assets/images/logoblue.png" width="190"
                        height="57">
                </div>
                <span class="text-warning d-flex justify-content-end pt-0">Business Directory</span>

            </div>
            <?php
		if (isset($_POST['submit'])) {
			$username = addslashes($_POST['username']);
			$password = addslashes(md5($_POST['password']));
			$confirm_password = addslashes(md5($_POST['confirm_password']));

			if ($username != "" && $password != "" && $confirm_password != "") {
				if ($password == $confirm_password) {
					$query = "INSERT INTO bsignup (username, password, confirm_password) 
                    VALUES ('$username', '$password','$confirm_password')";
					$result = mysqli_query($conn, $query);
					if ($result) {
		?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Admin is added successfully.</strong>
                <meta http-equiv="refresh" content="0.5;URL=business-login.php">
            </div>

            <script>
            $(".alert").alert();
            </script>
            <?php
					} else {
					?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <strong>Admin couldn't be added successfully.</strong>
            </div>
            <script>
            $(".alert").alert();
            </script>
            <?php
					}
				} else {
					echo "Both password field doesn't match.";
				}
			} else {
				echo "All fields are necessary.";
			}
		}
		?>

            <form action="#" method="POST" enctype="multipart/form-data">
                <div class="mb-3 ">
                    <label for="exampleInputEmail1" class="form-label text-white fs-4">Username</label>
                    <input type="text" class="form-control" name="username" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label text-white fs-4">Password</label>
                    <input type="password" class="form-control" name="password" id="exampleInputPassword1">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label text-white fs-4">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password" id="exampleInputPassword1">
                </div>
                <div class="mb-3">

                    <label class="text-white" for="exampleCheck1">
                        <a href="business-login.php" class=" text-warning">Login</a>
                    </label>
                </div>
                <button type="submit" class="btn btn-outline-light fs-4" name="submit">Submit</button>
            </form>
        </div>

    </section>


    <?php include("inc/footer.php") ;?>