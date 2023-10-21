
    <?php
    error_reporting(E_ALL);
    ini_set('display_errors', 'On');
    
    include("../connection.php");



    if($_POST){
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $oldcode=$_POST["oldcode"];
        $spec=$_POST['spec'];
        $code=$_POST['code'];
        $quan=$_POST['Quan'];
		$desc=$_POST['Desc'];
		$pric=$_POST['Pric'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        $id=$_POST['id00'];
        $image = '';
        echo $id;
        if ($password==$cpassword){
            $error='3';
            $result= $database->query("select inventory.invid from inventory WHERE invcode='$code' AND invid!='$id'");
            if($result->num_rows>=1){
                $id2=$result->fetch_assoc()["invid"];
            }else{
                $id2=$id;
            }
            
            echo $id2."jdfjdfdh";
            if($id2!=$id){
                $error='1';
                    
            }else{

                if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
                    $targetDirectory = "..\uploads\products\\" . $id . "\\";
                    if (!file_exists(str_replace("\\", "/", $targetDirectory))) {
                        mkdir(str_replace("\\", "/", $targetDirectory), 0777, true);
                    }
                    $targetFile = $targetDirectory . basename($_FILES['image']['name']);
    
                    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                        $image = str_replace('\\', '/', $targetFile);
                        
                    }
                }

				$sql1="update inventory set invcode='$code',invname='$name',invpassword='$password',invquantity='$quan',invcategory='$spec', invdescription='$desc', invprice='$pric', image='$image' where invid=$id ;";

				$database->query($sql1);
                
                $sql1="update webuser set code='$code' where code='$oldcode' ;";
                $database->query($sql1);
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        $error='3';
    }
    

    header("location: inventory.php?action=edit&error=".$error."&id=".$id);
    ?>
    
   

</body>
</html>