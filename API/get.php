<?php
    header('Access-Control-Allow-Origin:*');
    header('Content-Type:application/json');

    require_once '../config/config.php';
    require_once '../request/requests.php';
        //instantiate DBConfig
        $database=new DBConfig();
        $connection=$database->connect();
        //instantiate Request and send arguments to constructor
        $request=new Request($connection);
        $result=$request->getAll();
        if(mysqli_num_rows($result)){
            $resultArray=array();
            $resultArray['data']=array();
            while($row=mysqli_fetch_assoc($result)){
                //array indexes to variables
                extract($row);
                $resultItems=array(
                    'id'=>$id,
                    'title'=>$title,
                    'body'=>$body,
                    'autor'=>$autor,
                    'created_at'=>$created_at
                );
                //add resultItems at the end of the resultArray
                array_push($resultArray['data'],$resultItems);
            }
            //encode to json
            $jsonResult=json_encode($resultArray);
            echo $jsonResult;
        }
        else{
            //no data rows
            $error=array('message'=>'No data found!');
            echo json_encode($error);
        }

?>