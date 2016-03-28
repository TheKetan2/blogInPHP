<?php include '../config/config.php'; ?>
<?php include '../libs/Database.php'; ?>
<?php include '../helpers/format_helper.php';?>
<?php include 'includes/header.php'; ?>
<?php

    $id = $_GET['id'];
    
    //crete DB Object
    $db = new Database;
    
    //Crete Query
    $query = "SELECT * FROM categories where id=".$id;
    
    //run query
    $cat = $db->select($query);
    
    $result = $cat->fetch_assoc();
    
    
    //run query
  ?>
<?php
    // create a database object
        $db = new Database;
    if(isset($_POST['submit'])){
        //Assign post vars
        $name = mysqli_real_escape_string($db->link, $_POST['cat']);
       
        if($name==''){
                //set error
                $error = "Please fill all requires fields.";
        }
        else{
            $query = "UPDATE categories SET name = '$name' WHERE id=".$id;
            $update_row = $db->update($query);
        }
    }

        if(isset($_POST['delete'])){
              $query = "DELETE FROM categories WHERE id=".$id;
              $row_update = $db->delete($query);
              
          }
        
?>
<form role="form" method="post" action="edit_categories.php?id=<?php echo $id; ?>">
    <div class="form-group">
        <label>
            Category Name:
        </label>
        <input value=" <?php echo $result['name'];?>" name="cat" type="text" class="form-control" placeholder="Enter Category"/>
    </div>
    
    <input name="submit" value="Submit" type="submit" class="btn btn-default">
   
    <a href="index.php" class="btn btn-default">Cancel</a>
    <input name="delete" value="Delete" type="submit" class="btn btn-default">
    </div>
    <br>
    
</form>
<?php include 'includes/footer.php'; ?>


<?php include 'includes/footer.php'; ?>