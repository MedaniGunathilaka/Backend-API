<?php
  header('Access-Control-Allow-Origin:*');
  header('Content-Type:application/json');
  header('Access-Control-Allow-Methods:PUT');
  header('Access-Control-Allow-Headers:Content-Type,Access-Control-Allow-Headers,Autorization,X-Requested-With');

  include '../config/config.php';
  include '../request/requests.php';

  $database=new DBConfig();
  $connection=$database->connect();
  $request=new Request($connection);
  
  $jsonData=file_get_contents('php://input');

  $dataArray=json_decode($jsonData,true);
    $request->id=$dataArray['id'];
    $request->title=$dataArray['title'];
    $request->body=$dataArray['body'];
    $request->autor=$dataArray['autor'];

  $result=$request->update();

  if($result){
      $message=array('message'=>'Data updated sucessfully');
      echo json_encode($message);
  }
  else{
      $message=array('message'=>'Record not found');
      echo json_encode($message);
  }

?>  