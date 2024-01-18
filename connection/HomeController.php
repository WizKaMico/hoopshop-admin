<?php 
include('connection/LoginSession.php');
require_once "connection/ApiController.php";
$hoopCont = new hoopController;
date_default_timezone_set('Asia/Manila');

$userSession = $hoopCont->getUserDetails($session_id);

if(!empty($_GET['sku'])){
    $sku = $_GET['sku'];
    $product = $hoopCont->checkShoeProductDetails($sku);
    $product_image = $hoopCont->checkShoeProductImage($sku);
}

if (!empty($_GET["action"])) {
  switch ($_GET["action"]) {

       case "addShoe": 
        if(isset($_POST['add_shoe'])){
            $product = $_POST['product'];
            $brand = $_POST['brand'];
            $condition = $_POST['condition'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $fitting = $_POST['fitting'];

            if(!empty($product) && !empty($brand) && !empty($condition) && !empty($color) && !empty($size) && !empty($fitting)){
                $sku = 'hoopshop-'.date('Ymd').rand(666666,999999);
                $hoopCont->addShoeProduct($product, $brand, $condition, $color, $size, $fitting, $sku); 
                $hoopCont->addShirtProductImageInformation($sku);
                header('Location: home.php?view=HOME&message=success');
            }else{
                header('Location: home.php?view=HOME&message=fail');
            }
        }
        break;

       case "addShirt":
        if(isset($_POST['add_shirt'])){
            $product = $_POST['product'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            if(!empty($product) && !empty($color) && !empty($size)){
                $sku = 'hoopshop-'.date('Ymd').rand(666666,999999);
                $hoopCont->addShirtProduct($product, $color, $size, $sku);
                header('Location: home.php?view=HOME&message=success');
            }else{
                header('Location: home.php?view=HOME&message=fail');
            }
        }
        break;

        case "ShoeAppearance":
            if(isset($_POST['add_details'])){
                $sku = $_POST['sku'];
                $photoName = $_FILES['photo']['name'];
                $photoTmpName = $_FILES['photo']['tmp_name'];

                if(!empty($sku) && !empty(($photoName)))
                {
                    $uploadDir = 'ShoeImage/' . strtolower($sku); // Use '.' for string concatenation in PHP

                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0777, true);
                    }
                    
                    $photoPath = $uploadDir . '/' . $photoName;
                    
                    // Move the uploaded file to the directory
                    move_uploaded_file($photoTmpName, $photoPath);

                    $hoopCont->uploadShoeAppearance($sku, $photoPath);
                    header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');

                }
            }
            break;

            case "ShoeInside":
                if(isset($_POST['add_details'])){
                    $sku = $_POST['sku'];
                    $photoName = $_FILES['photo']['name'];
                    $photoTmpName = $_FILES['photo']['tmp_name'];
    
                    if(!empty($sku) && !empty(($photoName)))
                    {
                        $uploadDir = 'ShoeImage/' . strtolower($sku); // Use '.' for string concatenation in PHP
    
                        if (!file_exists($uploadDir)) {
                            mkdir($uploadDir, 0777, true);
                        }
                        
                        $photoPath = $uploadDir . '/' . $photoName;
                        
                        // Move the uploaded file to the directory
                        move_uploaded_file($photoTmpName, $photoPath);
    
                        $hoopCont->uploadShoeInside($sku, $photoPath);
                        header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');
    
                    }
                }
                break;
            
                case "ShoeInsole":
                    if(isset($_POST['add_details'])){
                        $sku = $_POST['sku'];
                        $photoName = $_FILES['photo']['name'];
                        $photoTmpName = $_FILES['photo']['tmp_name'];
        
                        if(!empty($sku) && !empty(($photoName)))
                        {
                            $uploadDir = 'ShoeImage/' . strtolower($sku); // Use '.' for string concatenation in PHP
        
                            if (!file_exists($uploadDir)) {
                                mkdir($uploadDir, 0777, true);
                            }
                            
                            $photoPath = $uploadDir . '/' . $photoName;
                            
                            // Move the uploaded file to the directory
                            move_uploaded_file($photoTmpName, $photoPath);
        
                            $hoopCont->uploadShoeInsole($sku, $photoPath);
                            header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');
        
                        }
                    }
                    break;

                    case "ShoeInsoleStitch":
                        if(isset($_POST['add_details'])){
                            $sku = $_POST['sku'];
                            $photoName = $_FILES['photo']['name'];
                            $photoTmpName = $_FILES['photo']['tmp_name'];
            
                            if(!empty($sku) && !empty(($photoName)))
                            {
                                $uploadDir = 'ShoeImage/' . strtolower($sku); // Use '.' for string concatenation in PHP
            
                                if (!file_exists($uploadDir)) {
                                    mkdir($uploadDir, 0777, true);
                                }
                                
                                $photoPath = $uploadDir . '/' . $photoName;
                                
                                // Move the uploaded file to the directory
                                move_uploaded_file($photoTmpName, $photoPath);
            
                                $hoopCont->uploadShoeInsoleStitch($sku, $photoPath);
                                header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');
            
                            }
                        }
                        break;

                        case "ShoeBox":
                            if(isset($_POST['add_details'])){
                                $sku = $_POST['sku'];
                                $photoName = $_FILES['photo']['name'];
                                $photoTmpName = $_FILES['photo']['tmp_name'];
                
                                if(!empty($sku) && !empty(($photoName)))
                                {
                                    $uploadDir = 'ShoeImage/' . strtolower($sku); // Use '.' for string concatenation in PHP
                
                                    if (!file_exists($uploadDir)) {
                                        mkdir($uploadDir, 0777, true);
                                    }
                                    
                                    $photoPath = $uploadDir . '/' . $photoName;
                                    
                                    // Move the uploaded file to the directory
                                    move_uploaded_file($photoTmpName, $photoPath);
                
                                    $hoopCont->uploadShoeBox($sku, $photoPath);
                                    header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');
                
                                }
                            }
                            break;

                            case "ShoeDate":
                                if(isset($_POST['add_details'])){
                                    $sku = $_POST['sku'];
                                    $photoName = $_FILES['photo']['name'];
                                    $photoTmpName = $_FILES['photo']['tmp_name'];
                    
                                    if(!empty($sku) && !empty(($photoName)))
                                    {
                                        $uploadDir = 'ShoeImage/' . strtolower($sku); // Use '.' for string concatenation in PHP
                    
                                        if (!file_exists($uploadDir)) {
                                            mkdir($uploadDir, 0777, true);
                                        }
                                        
                                        $photoPath = $uploadDir . '/' . $photoName;
                                        
                                        // Move the uploaded file to the directory
                                        move_uploaded_file($photoTmpName, $photoPath);
                    
                                        $hoopCont->uploadShoeDate($sku, $photoPath);
                                        header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');
                    
                                    }
                                }
                                break;

                                case "ShoeValue":
                                    if(isset($_POST['check_price'])){
                                        $sku = $_POST['sku'];
                                        $upc = $_POST['upc'];
                                        if(!empty($sku) && !empty($upc)){
                                            $api_token = "69b5047bbb6161c23fb2";

                                            $api_url = "https://api.barcodespider.com/v1/lookup?token=$api_token&upc=$upc";
                                            $curl = curl_init($api_url);
                                            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                                            $response = curl_exec($curl);
                        
                                            if ($response === false) {
                                                echo "Error: " . curl_error($curl);
                                            } else {
                                
                                                $data = json_decode($response, true);
                                                $itemAttributes = $data['item_attributes']; // Array containing item attributes
                                                $stores = $data['Stores'];
                                                
                                                // Access individual attributes
                                                $title = $itemAttributes['title'];
                                                $upc_remit = $itemAttributes['upc'];
                                                $color = $itemAttributes['color'];
                                                $size = $itemAttributes['size'];
                                                $weight = $itemAttributes['weight'];
                                                $image = $itemAttributes['image'];
                                                
                                                if (isset($stores[0])) {
                                                    $store = $stores[0];
                                                    $price = $store['price']; // Access 'price' from the specific store array, not from $stores directly
                                                    $currency = $store['currency']; // Similarly, access 'currency'
                                                
                                                    if (!empty($upc_remit)) {
                                                        $hoopCont->shoeMarketVerif($sku, $upc_remit, $title, $color, $size, $weight, $price, $currency, $image);
                                                        header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');
                                                    } else {
                                                        header('Location: home.php?view=DETAILS&sku='.$sku.'&message=fail');
                                                    }
                                                }
                                                
                                            }
                                        
                                            // Close cURL session
                                            curl_close($curl);
                                        }
                                    }
                                    break;

                                case "AmountPosting":
                                    if(isset($_POST['add_pricing'])){
                                        $sku = $_POST['sku']; 
                                        $pricing = $_POST['pricing'];
                                        $name = $_POST['product']; 

                                        if(!empty($sku) && !empty($pricing) && !empty($name)){
                                            $check = $hoopCont->checkIfThePricingProductExist($sku);
                                            if(!empty($check)){
                                            $hoopCont->addPricingProductUpdate($sku, $pricing);   
                                            }else{
                                            $hoopCont->addPricingProduct($name, $sku, $pricing);
                                            }
                                            header('Location: home.php?view=DETAILS&sku='.$sku.'&message=success');
                                            
                                        }else{
                                            header('Location: home.php?view=DETAILS&sku='.$sku.'&message=fail');
                                        }
                                    }
                                    break;



  }
}


?>