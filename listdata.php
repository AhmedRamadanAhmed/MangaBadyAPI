<?php
define ("SERVER","localhost");
define("USER","root");
define("PASSWORD","");
define("DB","mangabadyapi");

$mysql=new mysqli(SERVER,USER,PASSWORD,DB);
$response=array();


if($mysql->connect_error){
$response["MESSAGE"]="ERROR IN SERVER";
$response["STATE"]=500;

}//end 1f
else{
$data=array();
$sql="SELECT * FROM users";
$table_data=$mysql->query($sql);
    while($row=$table_data->fetch_array(MYSQLI_ASSOC)){

    $data[]=$row;
    // print"<img src=".$data[0]["Profile"].">";


    }
        if(count($data)>0){

$response["DATA"]=$data;
$response["MESSAGE"]="data found";
$response["STATE"]=200;


        }
        else{
$response["MESSAGE"]="data not found";
$response["STATE"]=404;


            }



}

print(json_encode($response));

?>