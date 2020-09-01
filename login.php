
<!-- kk -->
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Find alum</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/mycss.css">
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery.js"></script>


    <!-- deee -->

	<!-- Script -->
	<script type="text/javascript">
        		$(document).ready(function(){

			   $("#login").click(function(){

					username=$("#username").val();
					password=$("#password").val();
					 $.ajax({
						type: "POST",
						url: "cl.php",
						data: "username="+username+"&password="+password,
						success: function(html){
						  if(html=='true')
						  {

							  $("#add_err2").html('<div class="alert alert-success"> \
													<strong>Authenticated</strong> \ \
												</div>');

							window.location.href = "admin.php";

						  } else if (html=='false') {
								$("#add_err2").html('<div class="alert alert-danger"> \
													<strong>Authentication</strong> failure. \ \
												</div>');


						  } else {
								$("#add_err2").html('<div class="alert alert-danger"> \
													<strong>Error</strong> processing request. Please try again. \ \
												</div>');
						  }
						},
						beforeSend:function()
						{
                            $("#add_err2").html("loading...");
						}
					});
					 return false;
				});
});
    </script>

</head>
<style>
.mid{
justify-content:center;
}
.box{
    border:3px solid lightgrey;
    opacity:0.7;
}
</style>
<body>



    <div class="container-fluid">
        <div class="mid row">
            <div class="box">
                <div class="col-lg-12">

					<div class="text-center alert alert-danger">
					<small><strong>You must be logged in to access the Admin Page.</strong></small>
					</div>


					<hr>
                    <h2 class="intro-text text-center">
                        <strong>Login</strong>
                    </h2>
                    <hr>
                    <div id="add_err2"></div>
                    <form role="form" >
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label>Username</label>
                                <input type="text" id="username" name="username" maxlength="25" class="form-control">
                            </div>
                            <div class="clearfix"></div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input type="password" id="password" name="password" maxlength="10" class="form-control">
                            </div>
                            <div class="form-group col-lg-12">
                            <button type="submit" id="login" class="btn btn-primary">Login</button>
                            </div>
                        </div>



                </div>
            </div>
        </div>

    </div>

    <script src="js/bootstrap.min.js"></script>
</body>

</html>
