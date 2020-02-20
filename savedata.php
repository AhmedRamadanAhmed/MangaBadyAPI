<?php
define ("SERVER","localhost");
define("USER","root");
define("PASSWORD","");
define("DB","mangabadyapi");

$mysql=new mysqli(SERVER,USER,PASSWORD,DB);

$response=array();
print_r($_SERVER['REQUEST_METHOD']);


if($mysql->connect_error){
$response["MESSAGE"]="ERROR IN SERVER";
$response["STATE"]=500;

}//end 1f

else{

        $jsonDate=file_get_contents("php://input");
        $jsonDecode=json_decode($jsonDate,true);
        if(is_array($jsonDecode)){
        foreach($jsonDecode as $key =>$value)
            {
        $_POST[$key]=$value;

            }


                }//END IF FOREAC

if($_POST["name"]&&$_POST["profile"])
{
$sql="INSERT INTO users(name,profile) VALUES
 ('{$_POST['name']}','{$_POST['profile']}')";

            if($mysql->query($sql)){
$response["MESSAGE"]="Save succed";
$response["STATE"]=200;



}
else{
$response["MESSAGE"]="Save Failed";
$response["STATE"]=500;

}

                }//IF


            else{

                $response["MESSAGE"]="INV REq";
            $response["STATE"]=400;

            }

        }
echo json_encode($response);
?>