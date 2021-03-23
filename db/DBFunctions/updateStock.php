<?php
function updateStock() {
    $stmt = getDB()->prepare("UPDATE Products SET quantity = 5 WHERE out_of_stock = 1");
    $stmt->execute();
   /* $affected = $stmt->rowCount();
        if($affected == 1){
                return array("status"=>200, "message"=>"Product data found");
        } else if ($affected == 2) {
                return ["status"=>200, "message"=>"Product data updated"];
        }
        else{
                //must return a proper message so that the app can parse it
                //and display a user friendly message to the user
                return array("status"=>400, "message"=>"Product not found");
        }
   */
    
    
    
    
    
    
    
    /* if ($out_of_stock == "true") {
                //1 means true, product is out of stock
                $out_of_stock = 1;
        } else {
                //0 means false, product is in stock
                $out_of_stock = 0;
        }
        $stmt = getDB()->prepare("INSERT INTO Products (asin, title, current_price, description, features, images, out_of_stock) VALUES(:asin, :title, :current_price, :description, :features, :images, :out_of_stock) ON DUPLICATE KEY UPD>        
        $stmt->execute([":asin"=>$asin, ":title"=>$title, ":current_price"=>$current_price, ":description"=>$description, ":features"=>$features, ":images"=>$images, ":out_of_stock"=>$out_of_stock]);
        $affected = $stmt->rowCount();
        if($affected == 1){
                return array("status"=>200, "message"=>"Product data found");
        } else if ($affected == 2) {
                return ["status"=>200, "message"=>"Product data updated"];
        }
        else{
                //must return a proper message so that the app can parse it
                //and display a user friendly message to the user
                return array("status"=>400, "message"=>"Product not found");
        }
*/
    }
?>

