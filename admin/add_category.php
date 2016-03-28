<?php include '../config/config.php'; ?>
<?php include '../libs/Database.php'; ?>
<?php include '../helpers/format_helper.php';?>
<?php include 'includes/header.php'; ?>
<?php
    // create a database object
        $db = new Database;
    if(isset($_POST['submit'])){
        //Assign post vars
        $name = mysqli_real_escape_string($db->link, $_POST['name']);
       
        if($name==''){
                //set error
                $error = "Please fill all requires fields.";
        }
        else{
            $query = "INSERT INTO categories
                        (name) values('$name')";
            $update_row = $db->update($query);
        }
    }
?>
<form role="form" method="post" action="add_category.php">
    <div class="form-group">
        <label>
            Category Name:
        </label>
        <input name="name" type="text" class="form-control" placeholder="Enter Category"/>
    </div>
    
    <input name="submit" value="Submit" type="submit" class="btn btn-default">
   
    <a href="index.php" class="btn btn-default">Cancel</a>
    </div>
    <br>
</form>
<?php include 'includes/footer.php'; ?>