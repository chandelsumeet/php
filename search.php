<?php 
// header
include("include/header.php");

//database connection
include("include/db.php");  
?>

<!-- Navigation -->

<?php include("include/navigation.php"); ?>

<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

            <?php 


            if(isset($_POST['submit']))
            {

             $search=$_POST['search'];

             $query="SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";

             $result= $conn->query($query);

             if($result==false)
             {
                 die("failed");
             }
             else
             {
             

              while($row =$result->fetch_assoc() )
              {
                $post_title =$row['post_title'];
                $post_author =$row['post_author'];
                $post_date =$row['post_date'];
                $post_img =$row['post_img'];
                $post_content =$row['post_content'];
                ?>    
                <h1 class="page-header">
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <h2>
                    <a href="#"><?php echo $post_title ?>  </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo  $post_author  ?> </a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> <?php echo $post_date ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_img; ?>" alt="">
                <hr>
                <p><?php echo $post_content ?></p>
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>











            <?php } 
        }

  }



    ?>






    <!-- Second Blog Post -->


</div>

<!-- Blog Sidebar Widgets Column -->

<?php include("include/sidebar.php") ?>

</div>
<!-- /.row -->

<hr>


<!--footer-->
<?php include("include/footer.php") ?>