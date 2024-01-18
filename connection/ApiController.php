<?php
require_once "DBController.php";

class hoopController extends DBController
{
    function userLogin($password, $email)
    {
        $query = "SELECT * FROM tbl_users TU LEFT JOIN tbl_designation TD ON TU.role = TD.rid WHERE TU.password = ? AND TU.email = ?";

        $params = array(
            
            array(
                "param_type" => "s",
                "param_value" => $password
            ),array(
                "param_type" => "s",
                "param_value" => $email
            )
        );
        
        $userCredentials = $this->getDBResult($query, $params);
        return $userCredentials;
    }

    function getUserDetails($session_id)
    {
        $query = "SELECT * FROM tbl_users TU LEFT JOIN tbl_designation TD ON TU.role = TD.rid WHERE TU.user_id = ?";

        $params = array(
           
           array(
               "param_type" => "i",
               "param_value" => $session_id
           )
       );
       
       $userCredentials = $this->getDBResult($query, $params);
       return $userCredentials;

   }

   function getShoeMarketPrice($sku){
   $query = "SELECT * FROM tbl_shoe_verification_information TSVI  WHERE TSVI.sku = ?";

    $params = array(
       
       array(
           "param_type" => "s",
           "param_value" => $sku
       )
   );
   
   $userCredentials = $this->getDBResult($query, $params);
   return $userCredentials;

   }

   function checkShoeProductDetails($sku)
   {
    $query = "SELECT * FROM tbl_product_shoe TPS  WHERE TPS.sku = ?";

    $params = array(
       
       array(
           "param_type" => "s",
           "param_value" => $sku
       )
   );
   
   $userCredentials = $this->getDBResult($query, $params);
   return $userCredentials;
   }

   function checkShoeProductImage($sku)
   {
    $query = "SELECT * FROM tbl_product_shoe_images TPSI  WHERE TPSI.sku = ?";

    $params = array(
       
       array(
           "param_type" => "s",
           "param_value" => $sku
       )
   );
   
   $userCredentials = $this->getDBResult($query, $params);
   return $userCredentials;
   }

   function saveTokenToDatabase($user_id, $token)
   {
       date_default_timezone_set('Asia/Manila');

       $query = "INSERT INTO remember_me_tokens (user_id,token,expiration_date)
       VALUES (?,?,?)"; 

       $params = array(
                  
           array(
               "param_type" => "i",
               "param_value" => $user_id
           ),
           array(
               "param_type" => "s",
               "param_value" => $token
           ),
           array(
               "param_type" => "s",
               "param_value" => date('Y-m-d H:i:s', strtotime('+30 days'))
           )
       );
       $this->insertDB($query, $params);
   }

   function addShoeProduct($product, $brand, $condition, $color, $size, $fitting, $sku)
   {
      date_default_timezone_set('Asia/Manila');
      
      $query = "INSERT INTO tbl_product_shoe (sku,product,brand,conditions,color,size,fitting,date_created) VALUES (?,?,?,?,?,?,?,?)"; 

      $params = array(
          array(
              "param_type" => "s",
              "param_value" => $sku
          ),
          array(
              "param_type" => "s",
              "param_value" => $product
          ),
          array(
            "param_type" => "s",
            "param_value" => $brand
          ),
          array(
            "param_type" => "s",
            "param_value" => $condition
          ),
          array(
            "param_type" => "s",
            "param_value" => $color
          ),
          array(
            "param_type" => "s",
            "param_value" => $size
          ),
          array(
            "param_type" => "s",
            "param_value" => $fitting
          ),
          array(
              "param_type" => "s",
              "param_value" => date('Y-m-d')
          )
      );
      $this->insertDB($query, $params);
   }

   function addShirtProduct($product, $color, $size, $sku)
   {
       date_default_timezone_set('Asia/Manila');
       $query = "INSERT INTO tbl_product_shirt (sku,product,color,size,date_created)
       VALUES (?,?,?,?,?)"; 

       $params = array(
                  
           array(
               "param_type" => "s",
               "param_value" => $sku
           ),
           array(
               "param_type" => "s",
               "param_value" => $product
           ),
           array(
            "param_type" => "s",
            "param_value" => $color
           ),
           array(
            "param_type" => "s",
            "param_value" => $size
           ),
           array(
               "param_type" => "s",
               "param_value" => date('Y-m-d')
           )
       );
       $this->insertDB($query, $params);
   }

   function addShirtProductImageInformation($sku)
   {
    date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO tbl_product_shoe_images (sku) VALUES (?)"; 

    $params = array(       
        array(
            "param_type" => "s",
            "param_value" => $sku
        )
    );
    $this->insertDB($query, $params);
   }

   function shoeMarketVerif($sku, $upc_remit, $title, $color, $size, $weight, $price, $currency,  $image)
   {
    date_default_timezone_set('Asia/Manila');
    $query = "INSERT INTO tbl_shoe_verification_information (sku, upc_remit, title, color, size, weight, price, currency, image, date_verified) VALUES (?,?,?,?,?,?,?,?,?,?)"; 

    $params = array(       
        array(
            "param_type" => "s",
            "param_value" => $sku
        ),
        array(
            "param_type" => "s",
            "param_value" => $upc_remit
        ),
        array(
            "param_type" => "s",
            "param_value" => $title
        ),
        array(
            "param_type" => "s",
            "param_value" => $color
        ),
        array(
            "param_type" => "s",
            "param_value" => $size
        ),
        array(
            "param_type" => "s",
            "param_value" => $weight
        ),
        array(
            "param_type" => "s",
            "param_value" => $price
        ),
        array(
            "param_type" => "s",
            "param_value" => $currency
        ),
        array(
            "param_type" => "s",
            "param_value" => $image
        ),
        array(
            "param_type" => "s",
            "param_value" => date('Y-m-d')
        )
    );
    $this->insertDB($query, $params);
   }

   function uploadShoeAppearance($sku, $photoPath)
   {
    $query = "UPDATE tbl_product_shoe_images SET shoeappearance = ?  WHERE sku = ?";
        
        $params = array(  
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => $sku
            )
        );
        
        $this->updateDB($query, $params);
   }

   function uploadShoeInside($sku, $photoPath)
   {
    $query = "UPDATE tbl_product_shoe_images SET shoeinside = ?  WHERE sku = ?";
        
        $params = array(  
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => $sku
            )
        );
        
        $this->updateDB($query, $params);
   }

   function uploadShoeInsole($sku, $photoPath)
   {
    $query = "UPDATE tbl_product_shoe_images SET shoeinsole = ?  WHERE sku = ?";
        
        $params = array(  
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => $sku
            )
        );
        
        $this->updateDB($query, $params);
   }

   function uploadShoeInsoleStitch($sku, $photoPath)
   {
    $query = "UPDATE tbl_product_shoe_images SET shoeinsolestitch = ?  WHERE sku = ?";
        
        $params = array(  
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => $sku
            )
        );
        
        $this->updateDB($query, $params);
   }

   function uploadShoeBox($sku, $photoPath)
   {
    $query = "UPDATE tbl_product_shoe_images SET shoebox = ?  WHERE sku = ?";
        
        $params = array(  
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => $sku
            )
        );
        
        $this->updateDB($query, $params);
   }

   function uploadShoeDate($sku, $photoPath)
   {
    $query = "UPDATE tbl_product_shoe_images SET shoedate = ?  WHERE sku = ?";
        
        $params = array(  
            array(
                "param_type" => "s",
                "param_value" => $photoPath
            ),
            array(
                "param_type" => "s",
                "param_value" => $sku
            )
        );
        
        $this->updateDB($query, $params);
   }

   function addPricingProductUpdate($sku, $pricing)
   {
    $query = "UPDATE tbl_product SET price = ? WHERE code = ?";
        
        $params = array(  
            array(
                "param_type" => "i",
                "param_value" => $pricing
            ),
            array(
                "param_type" => "s",
                "param_value" => $sku
            )
        );
        
        $this->updateDB($query, $params);
   }

   function addPricingProduct($name, $sku, $pricing){
    $query = "INSERT INTO tbl_product (name, code, price) VALUES (?,?,?)"; 

    $params = array(       
        array(
            "param_type" => "s",
            "param_value" => $name
        ),
        array(
            "param_type" => "s",
            "param_value" => $sku
        ),
        array(
            "param_type" => "i",
            "param_value" => $pricing
        )
    );
    $this->insertDB($query, $params);
   }

   function checkIfThePricingProductExist($sku)
   {
    $query = "SELECT * FROM tbl_product TP  WHERE TP.code = ?";

    $params = array(
       
       array(
           "param_type" => "s",
           "param_value" => $sku
       )
   );
   
   $userCredentials = $this->getDBResult($query, $params);
   return $userCredentials;
   }

   function getShoeList()
   {
       date_default_timezone_set('Asia/Manila');
       $query = "SELECT * FROM tbl_product_shoe";

       $ShoeResult = $this->getDBResult($query);
       return $ShoeResult;    
   }

   function getShirtList()
   {
       date_default_timezone_set('Asia/Manila');
       $query = "SELECT * FROM tbl_product_shirt";

       $ShirtResult = $this->getDBResult($query);
       return $ShirtResult;    
   }

}