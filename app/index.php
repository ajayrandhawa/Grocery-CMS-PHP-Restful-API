<?php
require 'config.php';
require 'Slim/Slim.php';

\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();

$app->post('/login','login');
$app->post('/homepage','homepage');
$app->post('/allcategory','allcategory'); 
$app->post('/getlist','getlist');
$app->post('/savecustomer','savecustomer');
$app->post('/placeorder','placeorder');

$app->run();

/************************* USER LOGIN *************************************/
/* ### User login ### */
function login() {
    
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    
    try {
        
        $db = getDB();
        $userData ='';
        $sql = "SELECT user_id, fname, lname, username FROM users WHERE username=:username and password = :password";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("username", $data->username,PDO::PARAM_STR);
        $password=hash('sha256',$data->password);
        $stmt->bindParam("password", $password,PDO::PARAM_STR);
        $stmt->execute();
        $mainCount=$stmt->rowCount();
        $userData = $stmt->fetch(PDO::FETCH_OBJ);
        
        if(!empty($userData))
        {
            $user_id=$userData->user_id;
            $userData->token = apiToken($user_id);
        }
        
        $db = null;
         if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Bad request wrong rollno and password"}}';
            }

           
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* ### User registration ### */
function signup() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $fname=$data->fname;
    $lname=$data->lname;
    $username=$data->username;
    $password=$data->password;
    
    try {
        
        $username_check = preg_match('~^[A-Za-z0-9_]{3,20}$~i', $username);
        $password_check = preg_match('~^[A-Za-z0-9!@#$%^&*()_]{6,20}$~i', $password);
        
        
        if (strlen(trim($username))>0 && strlen(trim($password))>0 && $username_check>0 && $password_check>0)
        {
            $db = getDB();
            $userData = '';
            $sql = "SELECT user_id FROM users WHERE username=:username";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("username", $username,PDO::PARAM_STR);
            $stmt->execute();
            $mainCount=$stmt->rowCount();
            $created=time();
            if($mainCount==0)
            {
                
                /*Inserting user values*/
                $sql1="INSERT INTO users(username,password,fname,lname)VALUES(:username,:password,:fname,:lname)";
                $stmt1 = $db->prepare($sql1);
                $stmt1->bindParam("username", $username,PDO::PARAM_STR);
                $password=hash('sha256',$data->password);
                $stmt1->bindParam("password", $password,PDO::PARAM_STR);
                $stmt1->bindParam("fname", $fname,PDO::PARAM_STR);
                $stmt1->bindParam("lname", $lname,PDO::PARAM_STR);
                $stmt1->execute();
                
                $userData=internalUserDetails($username);
                
            }
            
            $db = null;
         

            if($userData){
               $userData = json_encode($userData);
                echo '{"userData": ' .$userData . '}';
            } else {
               echo '{"error":{"text":"Enter valid data"}}';
            }

           
        }
        else{
            echo '{"error":{"text":"Enter valid data"}}';
        }
    }
    catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}


/* ### internal Username Details ### */
function internalUserDetails($input) {
    
    try {
        $db = getDB();
        $sql = "SELECT user_id, fname, lname, username FROM users WHERE username=:input";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("input", $input,PDO::PARAM_STR);
        $stmt->execute();
        $usernameDetails = $stmt->fetch(PDO::FETCH_OBJ);
        $usernameDetails->token = apiToken($usernameDetails->user_id);
        $db = null;
        return $usernameDetails;
        
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    
}

// Get All Category List

function allcategory(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token; //get app token
    $systemToken=apiToken(); // server token
    try {     
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            $sql = "SELECT * FROM category";
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);    
            $db = null;
            echo '{"feedData": ' . json_encode($feedData) . '}';
        } else{
            echo '{"error":{"text":"No Access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }    
}

// Get All Category List 

function getlist(){
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token; //get app token
    $catgoryname=$data->categoryname; //get categoryid
    $systemToken=apiToken(); // server token
    try {     
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            $sql = "SELECT * FROM items WHERE category = :categoryname";
            $stmt = $db->prepare($sql);
            $stmt->bindParam("categoryname", $catgoryname,PDO::PARAM_STR);
            $stmt->execute();
            $feedData = $stmt->fetchAll(PDO::FETCH_OBJ);    
            $db = null;
            echo '{"feedData": ' . json_encode($feedData) . '}';
        } else{
            echo '{"error":{"text":"No Access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }    
}

// Save Customer Data

function savecustomer() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $fname=$data->fname;
    $lname=$data->lname;
    $mobile=$data->mobile;
    $area=$data->area;
    $address=$data->address;
    $systemToken=apiToken();
    try {  
        if($systemToken == $token){
            $db = getDB();
            $sql1="INSERT INTO users(fname, lname, area, address, mobile)VALUES(:fname,:lname,:area,:address,:mobile)";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("fname", $fname,PDO::PARAM_STR);
            $stmt1->bindParam("lname", $lname,PDO::PARAM_STR);
            $stmt1->bindParam("mobile", $mobile,PDO::PARAM_STR);
            $stmt1->bindParam("area", $area,PDO::PARAM_STR);
            $stmt1->bindParam("address", $address,PDO::PARAM_STR);
            $stmt1->execute();
            $db = null;
            echo '{"success":{"text":"Saved Sucessfully"}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// Get Homepage Products

function homepage() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());
    $token=$data->token;
    $systemToken=apiToken();
    $homepage = "YES";
    try {
         
        if($systemToken == $token){
            $feedData = '';
            $db = getDB();
            $sql1="SELECT * FROM items WHERE homepage = :homepage";
            $stmt1 = $db->prepare($sql1);
            $stmt1->bindParam("homepage", $homepage,PDO::PARAM_STR);
            $stmt1->execute();
            $feedData = $stmt1->fetchAll(PDO::FETCH_OBJ);    
            $db = null;
            echo '{"feedData": ' . json_encode($feedData) . '}';
        } else{
            echo '{"error":{"text":"No Access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

// Place Order

function placeorder() {
    $request = \Slim\Slim::getInstance()->request();
    $data = json_decode($request->getBody());

    $token=$data->token;
    $fname=$data->fname;
    $lname=$data->lname;
    $mobile=$data->mobile;
    $area=$data->area;
    $address=$data->address;

    $orderitems=$data->orderitems;

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

            foreach ($orderitems as $orderitem) {

                $itemname = $orderitem->itemname;
                $itemquantity = $orderitem->itemquantity;
                $itemprice = $orderitem->itemprice;
                $itemtotal = $orderitem->itemtotal;

                $sqlitem = "INSERT INTO orderslist (orderid,itemname,itemquantity,itemprice,itemtotal) VALUES (:orderid,:itemname,:itemquantity,:itemprice,:itemtotal)";   
                $stmtitem = $db->prepare($sqlitem);
                $stmtitem->bindParam("orderid", $lastid, PDO::PARAM_STR);
                $stmtitem->bindParam("itemname", $itemname, PDO::PARAM_STR);
                $stmtitem->bindParam("itemquantity",$itemquantity, PDO::PARAM_INT);
                $stmtitem->bindParam("itemprice", $itemprice, PDO::PARAM_INT);
                $stmtitem->bindParam("itemtotal", $itemtotal, PDO::PARAM_INT);
                $stmtitem->execute();
          }  
            $db = null;
            echo '{"success":{"text":"Order Placed Sucessfully":' . $lastid .'}}';
        } else{
            echo '{"error":{"text":"No access"}}';
        }
       
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
}

/* ### internal Username Details ### */
function internalContactDetails($input) {
    
    try {
        $db = getDB();
        $sql = "SELECT user_id, fname, lname, username FROM users WHERE username=:input";
        $stmt = $db->prepare($sql);
        $stmt->bindParam("input", $input,PDO::PARAM_STR);
        $stmt->execute();
        $usernameDetails = $stmt->fetch(PDO::FETCH_OBJ);
        $usernameDetails->token = apiToken($usernameDetails->user_id);
        $db = null;
        return $usernameDetails;
        
    } catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}';
    }
    
}


?>