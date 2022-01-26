<?php include './includes/head.php' ?>

<?php
    if(isset($_POST['submit'])){
        //get data (title, description)
        $title = $_POST["title"];
        $description = $_POST["description"];

        //create query
        $sql = "INSERT INTO `posts`(`title`,`description`) VALUES ('$title','$description') ";
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
            <form action="new-post.php" method="POST">
                <div class="mb-3">
                    <label for="title" class="form-label">Post title </label>
                    <input type="title" class="form-control" id="title" name="title"  required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
    </div>
</div>



<?php include './includes/footer.php' ?>
<?php include './includes/bottom.php' ?>