<?php include './includes/head.php' ?>

<?php 

$sql = "SELECT * FROM `posts`";
$query = mysqli_query($db,$sql);
?>

<!-- Page Header-->
<header class="masthead" style="background-image: url('assets/img/home-bg.jpg')">
    <div class="container position-relative px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="site-heading">
                    <h1>Clean Blog</h1>
                    <span class="subheading">A Blog Theme by Start Bootstrap</span>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Main Content-->
<div class="container px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 justify-content-center">
        <div class="col-md-10 col-lg-8 col-xl-7">
            <?php while($data = mysqli_fetch_assoc($query)) : ?>
            <!-- Post preview-->
            <div class="post-preview">
                <a href="post.html">
                    <h2 class="post-title"><?php echo $data['title']?></h2>
                    <h3 class="post-subtitle"><?php echo $data['description']?></h3>
                </a>
                <p class="post-meta">
                    Posted by
                    <a href="#!">Start Bootstrap</a>
                    on <?php echo $data['created_at']?>
                </p>
            </div>
            <!-- Divider-->
            <hr class="my-4" />

            <?php endwhile; ?>

    
        </div>
    </div>
</div>



<?php include './includes/footer.php' ?>
<?php include './includes/bottom.php' ?>