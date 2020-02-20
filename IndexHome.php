<?php
define ("SERVER","localhost");
define("USER","root");
define("PASSWORD","");
define("DB","mangabadyapi");


$mysql=new mysqli(SERVER,USER,PASSWORD,DB);
$response=array();

if($mysql->connect_error){
$response["MESSAGE "]="ERROR IN SERVER";
$response["STATE"]=500;
}
else{


    if(/*is_uploaded_file($_FILES['profile']["tmp_name"]) &&@$_POST['name'] */true )
        {
print_r($_SERVER['REQUEST_METHOD']);
            $tmp_file=$_FILES['profile']["tmp_name"];


            $img_name=$_FILES['profile']["name"];
            $upload_dir="./images/".$img_name;
            $sql="INSERT INTO users (name,profile) VALUES ('{$_POST['name']}','{$upload_dir}')";
            
           //print"<img src=\"$upload_dir\" width=\"100px\" height=\"100px\"\/>";

            print($sql);
print("---");

            if(move_uploaded_file($tmp_file,$upload_dir) && $mysql->query($sql)){
                $response["MESSAGE"]="UPLOAD SUCCEEDED";
$response["STATE"]=200;

            }else{

                $response["MESSAGE"]="UPLOAD FAILED";
$response["STATE"]=404;

            }



        } 
        else{
               $response["MESSAGE"]="INVALID REQUEST";
$response["STATE"]=400;

        }      
}

echo json_encode($response);

?>