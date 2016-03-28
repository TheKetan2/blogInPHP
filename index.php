<?php include 'config/config.php'; ?>
<?php include 'libs/Database.php'; ?>
<?php include 'helpers/format_helper.php';?>
<?php include 'includes/header.php';?>


<?php
    //create database contructor and call connect function from it
    $db = new Database();
    
    //crete query
    $query = "SELECT *FROM `posts` ORDER BY id DESC";
    
    //run the query
    $posts = $db->select($query);
    //categories
    $query = "SELECT * FROM `categories` ORDER BY id DESC";
    
    //run the query
    $cats = $db->select($query);
    
    ?>
    
    <?php if($posts): ?>
      <div class="blog-header">
        <h1 class="blog-title">PHP Blog</h1>
        <p class="lead blog-description">This Blog in Developed in PHP and demonstrate simple CRUD operations. Feel free to Browse Around.</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">
        <?php while($row=$posts->fetch_assoc()):?>
          <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $row['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($row['date']) ;?><a href="#"><?php echo $row['author']; ?></a></p>
                <?php echo shortenText($row['body']);?>
            <a class="readmore" href="post.php?id=<?php  echo urlencode($row['id']);?>">Read More</a>
          </div><!-- /.blog-post -->
        <?php endwhile;?>
         
          <nav>
            <ul class="pager">
              <li><a href="#">Previous</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </nav>


        </div><!-- /.blog-main -->
    <!-- /.blog-post -->
           <div class="col-sm-3 col-sm-offset-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>About</h4>
          <p><?php echo $site_disc;?></p> 
          </div>
          <div class="sidebar-module">
            <?php if($cats):?>
            <h4>Categories</h4>
            <ol class="list-unstyled">
            <?php while($row=$cats->fetch_assoc()): ?>
             <li><a href="posts.php?category=<?php echo $row['id'];?>"><?php echo $row['name'];?></a></li>
            <?php endwhile; ?>
            </ol>
            <?php else:?>
                <p>No Categories</p>
            <?php endif;?>
                
          </div>
        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->
      <?php else:?>
        <p>No posts.</p>
      <?php endif;?>

<?php include 'includes/footer.php';?>