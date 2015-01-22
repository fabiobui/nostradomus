<?php 

$app->get('/login', function () use ($app) {
    // Sample log message
    $app->log->info("SmartHome '/login' route");
    // Render index view
    $app->render('login.html.twig');
});


$app->post('/login', function() use ($app) {
    require_once 'class-phpass.php';
    $db = new DbHandler();
    $password = $app->request()->post('password');
    $email = $app->request()->post('email');
    $user = $db->getOneRecord("select id,user_login,user_pass,user_email,user_registered,user_url from wp_users where user_email='$email'");
    $hasher = new PasswordHash(8, TRUE);
    if ($user != NULL) {
        if($hasher->CheckPassword($password, $user['user_pass'])){
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION['uid'] = $user['id'];
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $user['user_login'];
        $_SESSION['server_url'] = str_replace('http://', '', $user['user_url']);
        } else {
            $app->flash('error', 'Login failed. Incorrect credentials');
            $app->redirect('/login');
        }
    }else {
            $app->flash('error', 'No such user is registered');
            $app->redirect('/login');
        }
    $app->redirect('/');
});


// Web service in order to store server's IP

$app->post('/ws', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('email', 'key', 'myip'), $r);
    $email = $r->email;
    $key = $r->key;
    $user_url = $r->myip;
    $db = new DbHandler();
    $user = $db->getOneRecord("select id from wp_users where user_email='$email'");
    $serverkey = $db->getOneRecord("select meta_value from wp_usermeta where user_id=".$user['id']." AND meta_key='serverkey'");
    if (($user != NULL) && (!empty($serverkey['meta_value'])) && ($key==$serverkey['meta_value']) && (!empty($user_url))) {
        // update user_url
        $result = $db->updateFieldTable('user_url', $user_url, 'wp_users', $user['id']);
        if ($result) {
           $response["status"] = "success";
           echoResponse(200, $response); 
       } else {
           $response["status"] = "error";
           $response["message"] = "Failed to update user_url!"; 
           echoResponse(201, $response);         
       }
    } else {
        $response["status"] = "error";
        if ($user != NULL) {
           if ($key!=$serverkey['meta_value']) {
              $response["message"] = "User server key doesn't match !";     
           } else if (empty($user_url)) {
              $response["message"] = "Server IP is empty!";    
           } else {
              $response["message"] = "User server key not set!";    
           }
        } else {
           $response["message"] = "User doesn't exist!";
        }
        echoResponse(201, $response);
    }
});



$app->post('/signUp', function() use ($app) {
    $response = array();
    $r = json_decode($app->request->getBody());
    verifyRequiredParams(array('email', 'name', 'password'),$r->customer);
    require_once 'passwordHash.php';
    $db = new DbHandler();
    $phone = $r->customer->phone;
    $name = $r->customer->name;
    $email = $r->customer->email;
    $address = $r->customer->address;
    $password = $r->customer->password;
    $isUserExists = $db->getOneRecord("select 1 from customers_auth where phone='$phone' or email='$email'");
    if(!$isUserExists){
        $r->customer->password = passwordHash::hash($password);
        $tabble_name = "customers_auth";
        $column_names = array('phone', 'name', 'email', 'password', 'city', 'address');
        $result = $db->insertIntoTable($r->customer, $column_names, $tabble_name);
        if ($result != NULL) {
            $response["status"] = "success";
            $response["message"] = "User account created successfully";
            $response["uid"] = $result;
            if (!isset($_SESSION)) {
                session_start();
            }
            $_SESSION['uid'] = $response["uid"];
            $_SESSION['phone'] = $phone;
            $_SESSION['name'] = $name;
            $_SESSION['email'] = $email;
            echoResponse(200, $response);
        } else {
            $response["status"] = "error";
            $response["message"] = "Failed to create customer. Please try again";
            echoResponse(201, $response);
        }            
    }else{
        $response["status"] = "error";
        $response["message"] = "An user with the provided phone or email exists!";
        echoResponse(201, $response);
    }
});
$app->get('/logout', function() use ($app) {
    $db = new DbHandler();
    $session = $db->destroySession();
    $app->redirect('/login');
});
?>