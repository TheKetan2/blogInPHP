<?php include '../config/config.php'; ?>
<?php include '../libs/Database.php'; ?>
<?php include '../helpers/format_helper.php';?>
<?php include 'includes/header.php'; ?>
<?php
    // create a database object
        $db = new Database;
    if(isset($_POST['submit'])){
        //Assign post vars
        $title = mysqli_real_escape_string($db->link, $_POST['title']);
        $body = mysqli_real_escape_string($db->link, $_POST['body']);
        $category = mysqli_real_escape_string($db->link, $_POST['category']);
        $author = mysqli_real_escape_string($db->link, $_POST['author']);
        $tags = mysqli_real_escape_string($db->link, $_POST['tags']);
        if($title==''||$body==''||$category==''||$author==''){
                //set error
                $error = "Please fill all requires fields.";
        }
        else{
            $query = "INSERT INTO posts
                        (title,body,category,author,tags) values('$title','$body','$category','$author','$tags')";
            $insert_row = $db->insert($query);
        }
    }
?>
<?php
        
        
        //create query
        $query = "select * from categories";
        //run query
        $cats = $db->select($query);
        
?>

<form role="form" method="post" action="add_posts.php">
    <div class="form-group">
        <label>
            Post Title
        </label>
        <input name="title" type="text" class="form-control" placeholder="Enter Title"/>
    </div>
    <div class="form-group">
        <label>
            Body
        </label>
        <textarea name="body" class="form-control" placeholder="Enter body"></textarea>
    </div>
    <div class="form-group">
        <label>
            Category
        </label>
        <select name="category" class="form-control">
            <?php while($row = $cats->fetch_assoc()):?>
                <option value="<?php echo $row['id']; ?>"><?php echo $row['name'];?></option>
            <?php endwhile; ?>
            
        </select>
    </div>
    <div class="form-group">
        <label>
            Author
        </label>
        <input name="author" type="text" class="form-control" placeholder="Enter Author Name"/>
    </div>
    <div class="form-group">
        <label>
            Tags
        </label>
        <input name="tags" type="text" class="form-control" placeholder="Enter Tags"/>
    </div>
    <div>
    <input name="submit" value="Submit" type="submit" class="btn btn-default">
   
    <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
    <br>
</form>

<?php include 'includes/footer.php'; ?>