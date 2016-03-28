<?php include '../config/config.php'; ?>
<?php include '../libs/Database.php'; ?>
<?php include '../helpers/format_helper.php';?>
<?php include 'includes/header.php'; ?>

<?php
         //create database contructor and call connect function from it
    $db = new Database();
    
    //crete query
    $query =    "SELECT posts.*, categories.name FROM posts
                INNER JOIN categories
                ON posts.category = categories.id ORDER BY id DESC";
    
    //run the query
    $posts = $db->select($query);
    //categories
    $query = "SELECT * FROM `categories` order by id desc";
    
    //run the query
    $cats = $db->select($query);

?>
       <?php if($posts): ?>
            <table class="table table-striped">
                <tr>
                    <th>Post #ID</th>
                    <th>Post Title</th>
                    <th>Category</th>
                    <th>Author</th>
                    <th>Date</th>
                </tr>
                
                <?php while($row=$posts->fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><a href="edit_post.php?id=<?php echo $row['id'];?>"><?php echo $row['title']; ?></a></td>
                        <td><?php echo $row['name']; ?></td>
                        <td><?php echo $row['author']; ?></td>
                        <td><?php echo formatDate($row['date']); ?></td>
                    </tr>
                <?php  endwhile; ?>
                
            </table>
            <table class="table table-striped">
                
                <tr>
                    <th>Category #ID</th>
                    <th>Category Name</th>
                </tr>
                 <?php while($row=$cats->fetch_assoc()):?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><a href="edit_categories.php?id=<?php echo $row['id'];?>"><?php echo $row['name']; ?></a></td>
                    </tr>
                <?php  endwhile; ?>
                
                
            </table>
            <?php else :?>
            <p>No Posts Yet!</p>
            <?php endif; ?>

   <?php include 'includes/footer.php'; ?>