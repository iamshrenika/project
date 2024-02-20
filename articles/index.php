<?php
include "../header.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NavBar</title>
    <link rel="stylesheet" href="../assets/css/articles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<div class="container mt-2">
	<div class="row">
		<div class="col-lg-8">
            <?php
            if ($rows){
                while($result=mysqli_fetch_assoc($run)){     
                }
            }
            ?>
				<div class="card-body d-flex blog_flex">
					<div class="flex-part1">
						<a href=""> <img src="../admin/upload"> </a>
					</div>
					<div class="flex-grow-1 flex-part2">
						  <a href="" id="title">Title</a>
						<p>
						  <a href="" id="body">
						  	Body
						  </a> <span><br>
                          <a href="" class="btn btn-sm btn-outline-primary">Read more
                          </a></span>
                        </p>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>