<?php 
session_start();
require_once "connection/ApiController.php";
$hoopCont = new hoopController();

if (! empty($_GET["action"])) {
    switch ($_GET["action"]) {
        
        case "validate": 
            if(isset($_POST['login'])){

                $email = $_POST['email'];
                $password = md5($_POST['password']);

                if(!empty($email) && !empty($password))
                {
                    $userCredentials = $hoopCont->userLogin($password, $email);
                    if(!empty($userCredentials))
                    {
                
                       if($userCredentials[0]["designation"] == 1)
                       {
                           $_SESSION['user_id'] = $userCredentials[0]["user_id"];
                           $user_id = $_SESSION['user_id'];
                           
                           if (isset($_POST['remember_me'])) {
                               function generateRandomToken($length = 32) {
                                   $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                   $token = '';
                               
                                   for ($i = 0; $i < $length; $i++) {
                                       $token .= $characters[mt_rand(0, strlen($characters) - 1)];
                                   }
                               
                                   return $token;
                               }
                               
                               $token = generateRandomToken();
                               $hoopCont->saveTokenToDatabase($user_id, $token);
                               setcookie('remember_me_cookie', $token, time() + (30 * 24 * 60 * 60)); // Cookie expires in 30 days
                           }
                           
                           header('Location: home.php');
                           exit;
                       }else{
                            $_SESSION['user_id'] = $userCredentials[0]["user_id"];
                            $user_id = $_SESSION['user_id'];
                            
                            if (isset($_POST['remember_me'])) {
                                function generateRandomToken($length = 32) {
                                    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                                    $token = '';
                                
                                    for ($i = 0; $i < $length; $i++) {
                                        $token .= $characters[mt_rand(0, strlen($characters) - 1)];
                                    }
                                
                                    return $token;
                                }
                                
                                $token = generateRandomToken();
                                $hoopCont->saveTokenToDatabase($user_id, $token);
                                setcookie('remember_me_cookie', $token, time() + (30 * 24 * 60 * 60)); // Cookie expires in 30 days
                            }
                            
                            header('Location: home.php');
                            exit;
                       }  
                    }  
                }
            }
        break;
    }
}