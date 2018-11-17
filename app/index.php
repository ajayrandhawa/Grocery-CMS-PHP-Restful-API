<?php
require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/gethomepage','gethomepage');
$app->post('/categoryfilter','categoryfilter');
$app->post('/placeorder','placeorder');
$app->post('/getnotification','getnotification');
$app->post('/fetchorder','fetchorder');
$app->post('/fetchorderdetail','fetchorderdetail');
$app->post('/sendmessage','sendmessage');
$app->post('/searchproduct','searchproduct');
$app->run();


function gethomepage(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $systemToken=apiToken();
    $homepage = "YES";
    
    try {
        if($token == $systemToken){
            $db = getDB();
            $sqlhome = "SELECT * FROM items WHERE homepage = :homepage ORDER BY id DESC";
            $stmthome = $db->prepare($sqlhome);
            $stmthome->bindParam("homepage",$homepage, PDO::PARAM_STR);
            $stmthome->execute();
            $tempData = $stmthome->rowCount();
            $homeData = $stmthome->fetchAll(PDO::FETCH_OBJ);

            $sqlcate = "SELECT * FROM category";
            $stmtCate = $db->prepare($sqlcate);
            $stmtCate->execute();
            $catetempData = $stmtCate->rowCount();
            $CateData = $stmtCate->fetchAll(PDO::FETCH_OBJ);
            $db = null;

            echo '{
                "HomeData": '. json_encode($homeData) .' ,
                "CateData": '. json_encode($CateData) .' 
            }';
                }
            else{
                echo '{"Error":"Error"}'; 
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 
}

function getnotification(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $systemToken=apiToken();
    
    try {
        if($token == $systemToken){
            $db = getDB();
            $sqlhome = "SELECT * FROM notification ORDER BY id DESC";
            $stmthome = $db->prepare($sqlhome);
            $stmthome->execute();
            $NotiData = $stmthome->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"NotiData": ' . json_encode($NotiData) . '}';
            }
            else{
                echo '{"Error":"Error"}'; 
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 

}


function fetchorder(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $mobileno=$data->mobileno;
    $systemToken=apiToken();
    
    try {
        if($token == $systemToken){
            $db = getDB();
            $sqlorder = "SELECT * FROM orders WHERE mobile = :mobileno ORDER BY orderid DESC";
            $stmtOrder = $db->prepare($sqlorder);
            $stmtOrder->bindParam("mobileno",$mobileno, PDO::PARAM_STR);
            $stmtOrder->execute();
            $OrderData = $stmtOrder->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"OrderData": ' . json_encode($OrderData) . '}';
            }
            else{
                echo '{"Error":"Error"}'; 
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 

}

function fetchorderdetail(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $orderid=$data->orderid;
    $systemToken=apiToken();
    
    try {
        if($token == $systemToken){
            $db = getDB();
            $sqlorder = "SELECT * FROM orderslist WHERE orderid = :orderid";
            $stmtOrder = $db->prepare($sqlorder);
            $stmtOrder->bindParam("orderid",$orderid, PDO::PARAM_STR);
            $stmtOrder->execute();
            $OrderDetail = $stmtOrder->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"OrderDetail": ' . json_encode($OrderDetail) . '}';
            }
            else{
                echo '{"Error":"Error"}'; 
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 

}

function categoryfilter(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $category=$data->categoryname;
    $systemToken=apiToken();
    
    try {
        if($token == $systemToken){
            $db = getDB();
            $sqlhome = "SELECT * FROM items where category = :categoryname";
            $stmthome = $db->prepare($sqlhome);
            $stmthome->bindParam("categoryname",$category, PDO::PARAM_STR);
            $stmthome->execute();
            $tempData = $stmthome->rowCount();
            $homeData = $stmthome->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"CateFilterData": ' . json_encode($homeData) . '}';
            }
            else{
                echo '{"Error":"Error"}'; 
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 

}

function searchproduct(){

    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $search=$data->squery;
    $systemToken=apiToken();
    
    try {
        if($token == $systemToken){
            $db = getDB();
            $sqlsearch = "SELECT * FROM items Where name = :sname";
            $stmtsearch = $db->prepare($sqlsearch);
            $stmtsearch->bindParam("sname",$search, PDO::PARAM_STR);
            $stmtsearch->execute();
            $tempData = $stmtsearch->rowCount();
            $searchData = $stmtsearch->fetchAll(PDO::FETCH_OBJ);
            $db = null;
            echo '{"SearchData": ' . json_encode($searchData) . '}';
            }
            else{
                echo '{"Error":"Error"}'; 
        }
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    } 

}

function placeorder() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    $token=$data->token;
    $fname=$data->fname;
    $lname=$data->lname;
    $mobile=$data->mobile;
    $area=$data->area;
    $address=$data->address;

    $orderitems=$data->items;

    $systemToken=apiToken();
    try {
         
        if($systemToken == $token){
            $db = getDB();
            $sqlorder = "INSERT INTO orders(fname, lname, area, address, mobile)VALUES(:fname,:lname,:area,:address,:mobile)";
            $stmtorder = $db->prepare($sqlorder);
            $stmtorder->bindParam("fname", $fname,PDO::PARAM_STR);
            $stmtorder->bindParam("lname", $lname,PDO::PARAM_STR);
            $stmtorder->bindParam("mobile", $mobile,PDO::PARAM_STR);
            $stmtorder->bindParam("area", $area,PDO::PARAM_STR);
            $stmtorder->bindParam("address", $address,PDO::PARAM_STR);
            $stmtorder->execute();
            $lastid = $db->lastInsertId();

            $sqluser = "INSERT INTO users(fname, lname, area, address, mobile)VALUES(:fname,:lname,:area,:address,:mobile)";
            $stmtuser = $db->prepare($sqluser);
            $stmtuser->bindParam("fname", $fname,PDO::PARAM_STR);
            $stmtuser->bindParam("lname", $lname,PDO::PARAM_STR);
            $stmtuser->bindParam("mobile", $mobile,PDO::PARAM_STR);
            $stmtuser->bindParam("area", $area,PDO::PARAM_STR);
            $stmtuser->bindParam("address", $address,PDO::PARAM_STR);
            $stmtuser->execute();

            foreach ($orderitems as $orderitem) {

                $itemname = $orderitem->itemname;
                $itemquantity = $orderitem->itemquantity;
                $itemquantitytype = $orderitem->itemquantitytype;
                $itemprice = $orderitem->itemprice;
                $itemtotal = $orderitem->itemtotal;

                $sqlitem = "INSERT INTO orderslist (orderid,itemname,itemquantity,itemquantitytype,itemprice,itemtotal) VALUES (:orderid,:itemname,:itemquantity,:itemquantitytype,:itemprice,:itemtotal)";   
                $stmtitem = $db->prepare($sqlitem);
                $stmtitem->bindParam("orderid", $lastid, PDO::PARAM_STR);
                $stmtitem->bindParam("itemname", $itemname, PDO::PARAM_STR);
                $stmtitem->bindParam("itemquantity",$itemquantity, PDO::PARAM_INT);
                $stmtitem->bindParam("itemquantitytype",$itemquantitytype, PDO::PARAM_STR);
                $stmtitem->bindParam("itemprice", $itemprice, PDO::PARAM_INT);
                $stmtitem->bindParam("itemtotal", $itemtotal, PDO::PARAM_INT);
                $stmtitem->execute();
          }  
            $db = null;
            echo '{"success":"' . $lastid .'"}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}



function sendmessage() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    $token=$data->token;
    $cname=$data->cname;
    $cmobile=$data->cmobile;
    $cmsg=$data->cmsg;

    $systemToken=apiToken();
    try {
         
        if($systemToken == $token){
            $db = getDB();
            $sqlorder = "INSERT INTO message(cname, cmobile, cmsg)VALUES(:cname,:cmobile,:cmessage)";
            $stmtorder = $db->prepare($sqlorder);
            $stmtorder->bindParam("cname", $cname,PDO::PARAM_STR);
            $stmtorder->bindParam("cmobile", $cmobile,PDO::PARAM_STR);
            $stmtorder->bindParam("cmessage", $cmsg,PDO::PARAM_STR);
            $stmtorder->execute();
            $lastid = $db->lastInsertId();

            $db = null;
            echo '{"success":"' . $lastid .'"}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

?>