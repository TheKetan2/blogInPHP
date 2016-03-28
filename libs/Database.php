<?php
class Database{
    public $host=DB_HOST;
    public $username=DB_USER;
    public $password=DB_PASS;
    public $db_name=DB_NAME;
    
    public $link;
    public $error;
    
    public function __construct(){ 
        //call connect
        $this->connect();
    }
    private function connect(){
            $this->link=new mysqli($this->host,$this->username,$this->password,$this->db_name);
            if(!$this->link){
                $this->error="Connection Failed:".$this->link->connect_error;
                return false;
            }
        }
    //select
    public function select($query){
        $result = $this->link->query($query) or die($this->link->connect_error.__LINE__);
        if($result->num_rows>0){
            return $result;
        }
        else{
            return false;
        }
    }
    
    //insert
    public function insert($query){
            $insert_row = $this->link->query($query) or die($this->link->error.__LINE__);
            
            //validate insert
            if($insert_row){
                header ("Location:index.php?msg=".urlencode('Record Added'));
            }
            else{
                die('Error :('.$this->link->errno.')'.$this->link->error.__LINE__);
            }
    
    }
     //update
    public function update($query){
            $update_row = $this->link->query($query) or die($this->link->error.__LINE__);
            
            //validate update
            if($update_row){
                header ("Location:index.php?msg=".urlencode('Record Updated'));
            }
            else{
                die('Error :('.$this->link->errno.')'.$this->link->error.__LINE__);
            }
    }
    
     //delete
    public function delete($query){
            $delete_row = $this->link->query($query) or die($this->link->error.__LINE__);
            
            //validate delete
            if($delete_row){
                header ("Location:index.php?msg=".urlencode('Record Deleted'));
            }
            else{
                die('Error :('.$this->link->errno.')'.$this->link->error.__LINE__);
            }
    }
 
}