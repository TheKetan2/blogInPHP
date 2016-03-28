<?php include 'config/config.php'; ?>
<?php include 'libs/Database.php'; ?>
<?php include 'includes/header.php'; ?>
<?php include 'helpers/format_helper.php';?>
<?php
    //create database contructor and call connect function from it
    $db = new Database();
    
    $id = $_GET['id'];
    
    //crete query
    $query = "SELECT *FROM `posts` WHERE id=".$id;
    
    //run the query
    $posts = $db->select($query)->fetch_assoc();
    
    
    //categories
    $query = "SELECT * FROM `categories`";
    
    //run the query
    $cats = $db->select($query);
    
    ?>
   <?php if($posts):?>
  <div class="blog-header">
        <h1 class="blog-title">PHP Lovers Blog</h1>
        <p class="lead blog-description">Videos Lorem Ipsum Lipsum</p>
      </div>

      <div class="row">

        <div class="col-sm-8 blog-main">

           <div class="blog-post">
            <h2 class="blog-post-title"><?php echo $posts['title'];?></h2>
            <p class="blog-post-meta"><?php echo formatDate($posts['date']) ;?><a href="#"><?php echo $posts['author']; ?></a></p>
                <?php echo $posts['body'];?>
           
          </div><!-- /.blog-post -->

          
          <nav>
            <ul class="pager">
              <li><a href="post.php?id=<?php echo $id-1;?>">Previous</a></li>
              <li><a href="post.php?id=<?php echo $id+1;?>">Next</a></li>
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
      <?php else: ?>
        <p>Sorry No More Posts.</p>
      <?php endif;?>
<?php include 'includes/footer.php'; ?>