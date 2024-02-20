<?php 
include "header.php";
include "connect.php";
?> 
<div class="container">
    <h5 class="mb-2 text-gray-800">Articles</h5>
    <div class="row">
        <div class="col-xl-7 col-lg-5">
            <div class="card">
                <div class="card-header">
                    <h6 class="font-weight-bold text-primary mt-2">Publish articles</h6>
                </div>
                <div class="card-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        <div class="mb-3"> 
                            <input type="text" name="article_title" placeholder="Title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label>Body/Description</label>
                            <textarea class="form-control" name="article_content" rows="2" id="article"></textarea>
                        </div>
                        <div class="mb-3">
                        <input type="file" name="article_image" class="form-control" required>
                        </div>
                        <div class="mb-3">
                        <input type="submit" name="add_article" value="Add" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php";
if (isset($_POST['add_article'])){
    $title = mysqli_real_escape_string($conn,$_POST['article_title']);
    $content = mysqli_real_escape_string($conn,$_POST['article_content']);
    $filename = $_FILES['article_image']['name'];
    $tmp_name = $_FILES['article_image']['tmp_name'];
    $size = $_FILES['article_image']['size'];
    $image_ext = strtolower(pathinfo($filename,PATHINFO_EXTENSION));
    $allow_type = ['jpg','png','jpeg'];
    $destination = "upload/".$filename;
    if(in_array($image_ext,$allow_type)){
        if($size<=2097152){
            if (move_uploaded_file($tmp_name, $destination)) {
                echo "File successfully uploaded.";
            } else {
                print_r($errors);
                die();
            }
        }
    }
    else{
        echo "File type is not allowed(only jpg,png and jpeg)";
        }
    
    }
?>