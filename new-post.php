<?php include './includes/head.php' ?>

<?php
    if(isset($_POST['submit'])){
        //get data (title, description)
        $title = $_POST["title"];
        $description = $_POST["description"];
        $image = $_FILES["image"];
        $video = $_FILES["video"];

        // Array ( [name] => Screenshot 2022-01-22 at 20-12-57 Student Graduation Projects.png [type] => image/png [tmp_name] => C:\xampp\tmp\php309F.tmp [error] => 0 [size] => 2030085 ) 
        $imageName = $image["name"];
        $imageType = $image["type"];
        $imageTmpName = $image["tmp_name"];
        $imageErrot = $image["error"];
        $imageSize = $image["size"];
        
        $imageTypeExt = explode('/', $imageType)[1];
        $imageNewName = time().'.'.$imageTypeExt;


        $videoName = $video["name"];
        $videoType = $video["type"];
        $videoTmpName = $video["tmp_name"];
        $videoErrot = $video["error"];
        $videoSize = $video["size"];
        
        $videoTypeExt = explode('/', $videoType)[1];
        $videoNewName = time().'.'.$videoTypeExt;

        move_uploaded_file($imageTmpName, "./uploads/image/$imageNewName");
        move_uploaded_file($videoTmpName, "./uploads/video/$videoNewName");

        //create query
        $sql = "INSERT INTO `posts`(`title`,`description`,`image`,`video`) VALUES ('$title','$description','/uploads/image/$imageNewName','/uploads/video/$videoNewName') ";
        //insert to database
        $query = mysqli_query($db,$sql);
        //redirec to home
        if($query){
            header("Location:index.php");
        }
    }
 ?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Add New Post</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5 mb-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <form action="new-post.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="title" class="form-label">Post title </label>
                    <input type="title" class="form-control" id="title" name="title"  required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Post Image</label>
                    <input type="file" class="form-control" id="image" name="image"  required>
                </div>
                <div class="mb-3">
                    <label for="video" class="form-label">Post video </label>
                    <input type="file" class="form-control" id="video" name="video" required>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php include './includes/footer.php' ?>
<?php include './includes/bottom.php' ?>