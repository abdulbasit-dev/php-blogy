<?php include './includes/head.php' ?>

<?php


if (isset($_GET['postId'])) {
    $id = $_GET['postId'];
    $sql = "SELECT * FROM `posts` WHERE `id` = $id";
    $query = mysqli_query($db, $sql);
    $data = mysqli_fetch_assoc($query);
}

if (isset($_POST['update'])) {
    $postId = $_POST['postId'];
    $title = $_POST['title'];
    $description = $_POST['description'];

    $sql = "UPDATE `posts` 
        SET `title` = '$title',
            `description` = '$description'
        WHERE `id`= '$postId'";

    $query = mysqli_query($db, $sql);
     if($query){
         header('Location:index.php');
     }
}


?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('.<?php echo $data['image'] ?>')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Edit Page</h1>
                    <span class="subheading">Edit Post <span class="fw-bold"><?php echo $data['title'] ?></span></span>
                </div>
            </div>
        </div>
    </div>
</header>


<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <form action="edit.php" method="POST" enctype="multipart/form-data">
                <input type="number" class="form-control" hidden  name="postId" value="<?php echo $data['id'] ?>" required>
                <div class="mb-3">
                    <label for="title" class="form-label">Post title </label>
                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $data['title'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Post Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" required> <?php echo $data['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-info" name="update">Update</button>
            </form>
        </div>
    </div>
</div>



<?php include './includes/footer.php' ?>
<?php include './includes/bottom.php' ?>