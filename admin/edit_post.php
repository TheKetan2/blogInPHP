<?php include '../config/config.php'; ?>
<?php include '../libs/Database.php'; ?>
<?php include '../helpers/format_helper.php';?>
<?php include 'includes/header.php'; ?>

<?php
        $id= $_GET['id'];
        $db = new Database;
                
        $query ="select * from posts where id=".$id;
        $posts =$db->select($query);
        $post = $posts->fetch_assoc();
        
        //create query
        $query = "select * from categories";
        //run query
        $cats = $db->select($query);
        
        
        
?>

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
            $query = "UPDATE posts SET  title='$title',
                                        body='$body',
                                        category='$category',
                                        author='$author',
                                        tags='$tags'
                                        WHERE id=".$id;
            $insert_row = $db->update($query);
            
        }
    }
    if(isset($_POST['delete'])){
        $query = "DELETE FROM posts WHERE id=".$id;
        $delete_row = $db->delete($query);
        
    }
?>

<form role="form" method="post" action="edit_post.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>
            Post Title
        </label>
        <input value="<?php echo $post['title']; ?>" name="title" type="text" class="form-control" placeholder="Enter Title"/>
    </div>
    <div class="form-group">
        <label>
            Body
        </label>
        <textarea name="body" class="form-control" placeholder="Enter body">
                <?php echo $post['body']; ?>
        </textarea>
    </div>
    <div class="form-group">
        <label>
            Category
        </label>
        <select name="category" class="form-control">
                
            <?php while($row=$cats->fetch_assoc()):?>
                <?php if($row['id']==$post['category']){
                        $selected='selected';
                        }
                        else{
                                $selected='';
                        }
                ?>
                <option value="<?php echo $row['id']; ?>" <?php echo $selected; ?> ><?php echo $row['name'];?></option>
            <?php endwhile; ?>
            
        </select>
    </div>
    <div class="form-group">
        <label>
            Author
        </label>
        <input value="<?php echo $post['author']; ?>" name="author" type="text" class="form-control" placeholder="Enter Author Name"/>
    </div> 
    <div class="form-group">
        <label>
            Tags
        </label>
        <input value="<?php echo $post['tags']; ?>" name="tags" type="text" class="form-control" placeholder="Enter Tags"/>
    </div>
    <div>
    <input name="submit" value="Submit" type="submit" class="btn btn-default">
   
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input name="delete" value="Delete" type="submit" class="btn btn-danger">
    </div>
    <br>
</form>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/footer.php'; ?>