<?php


/**
 * class to work with the comments 
 * to add, edit, delete a comment 
 * 
 */
class Items
{


    protected $pdo;

    /**
     * function to build an Object 
     * @param [Connection] $pdo
     */
    public function __construct(Connection $pdo)
    {
        $this->pdo = $pdo;
    }

    
    // get product from the database 
    public function getItems(){
     
        $pdo = $this->pdo->openConnection();      
        
        $sql = "SELECT * FROM producttb"; 
        // $result = $pdo->query($sql); 
        
        foreach ($pdo->query($sql) as $row) {
            component($row['product_name'], $row['product_price'],$row['product_image'], $row['id']); 
        }
        
        $pdo = $this->pdo->closeConnection(); 

    }
    // get product from the database 
    public function getCartItems($product_id, $total, $quantity){
     
        $pdo = $this->pdo->openConnection();      
        
        $sql = "SELECT * FROM producttb"; 
        // $result = $pdo->query($sql); 
        
        foreach ($pdo->query($sql) as $row) {
            foreach($product_id as $id ){
                if($row['id'] == $id){
                    foreach ($quantity as $key => $value) {
                       
                        if($row['id'] == $value['product_id'] ){
                            if(!isset($value['quantity'])){
                                cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id'], 1); 
                                $total = $total + ((int)$row['product_price'] * 1);
                            }else{

                                cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id'], $value['quantity']); 
                                $total = $total + ((int)$row['product_price'] * $value['quantity']); 
                            }
                        }
                    }

                // $total = $total + (int)$row['product_price']; 
                }
                
            }

        }
        $pdo = $this->pdo->closeConnection(); 
        return $total; 
    }

}
