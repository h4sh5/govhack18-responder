<!DOCTYPE html>
<html lang="en">
<?php

$servername = "localhost";
$dbname = 'responder';
$username = "oghacks";
$password = "g0vhack2018";


// foreach ($_SERVER as $key => $value) {
//     if (strpos($key, "MYSQLCONNSTR_localdb") !== 0) {
//         continue;
//     }
    
//     $servername = preg_replace("/^.*Data Source=(.+?);.*$/", "\\1", $value);
//     $db = preg_replace("/^.*Database=(.+?);.*$/", "\\1", $value);
//     $username = preg_replace("/^.*User Id=(.+?);.*$/", "\\1", $value);
//     $password = preg_replace("/^.*Password=(.+?)$/", "\\1", $value);
// }

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

?>

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Chat Room</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/the-big-picture.css" rel="stylesheet">

  </head>

  <body>

    <!-- Page Content -->
    <section>
					<div class="row">
						<h1 class="ml-4">Chatroom</h1>
					</div>
					<div class="row" style="height:100">
						<div class="col-lg-2 border">
							<section class="ml-2 mt-1">
								<h3>
									Requests
								</h3>

							</section>

                            <!-- requests go here -->
                            <?php

                            $result = $conn->query("SELECT description FROM request");
                            if (!$result) {
                                    echo "Error!". $conn->error ;
                            } else {
                                $descriptions = $result->fetch_array(MYSQLI_NUM);
                                foreach ($descriptions as $desc){
                                    //echo $desc;
                                    echo "<section class=\"ml-4\">" . "<p> <a>" . $desc . "</a>" . "</p>" . "</section>";
                                }
                            }
                            unset($desc);

                            ?>


						</div>
						<div class="col-lg-7 border" style="height:900px">

							<div class="border" style="height:80%">
								<p>
									Hello
								</p>
							</div>
							<div style="height:20%">
								<div class="row">
									<div class="col-lg-10">
										<label for="comment">Say something:</label>
		  							<textarea class="form-control" rows="5" id="comment"></textarea>
									</div>
									<div class="col-lg-2 text-center">
										<button type="button" class="btn btn-success p-4">Send</button>
									</div>

								</div>
								</div>

						</div>
						<div class="col-lg-3 border">
							<h1>Hi</h1>
						</div>

    </section>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script>
			function toggleChannel(){
				var channel = document.getElementById('channel1')
			}
		</script>

  </body>

</html>
