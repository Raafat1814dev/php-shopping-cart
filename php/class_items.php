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
        // while($row = $pdo->exec($sql)) {
            // component($row['product_name'], $row['product_price'],$row['product_image'], $row['id']); 
        //  }

    }
    // get product from the database 
    public function getCartItems($product_id, $total){
     
        $pdo = $this->pdo->openConnection();      
        
        $sql = "SELECT * FROM producttb"; 
        // $result = $pdo->query($sql); 
        
        foreach ($pdo->query($sql) as $row) {
            foreach($product_id as $id ){
                if($row['id'] == $id){
                cartElement($row['product_image'], $row['product_name'],$row['product_price'], $row['id']); 

                $total = $total + (int)$row['product_price']; 
                }
                
            }

        }
        $pdo = $this->pdo->closeConnection(); 
        return $total; 
    }

}
