<?php 

// start session : to save the product ID , the one that we will click on 
session_start(); 


require ("./php/class_connection.php"); 
require ("./php/class_items.php"); 

require ("./php/component.php"); 


$pdo = new Connection(); 



if(isset($_POST['add'])){  // add is the name that we gave to the button 

 

    if(isset($_SESSION['cart'])){

        // this function is going to return an array of ID 
        $item_array_id = array_column($_SESSION['cart'], "product_id"); 
       

        
        
        if(in_array($_POST['product_id'], $item_array_id)){
            // if the product is already in the shopping cart 
            echo "<script>alert('product is already added in the cart ... !')</script>"; 
            echo "<script>window.location ='index.php'</script>"; 
        }else {
          
            // if the product is not in the session variable (not already in the shopping card)
            $count = count($_SESSION['cart']); 
            $item_array = [
                "product_id" => $_POST['product_id']
            ]; 

            $_SESSION['cart'][$count] = $item_array; 

           
        }
    }else {
        $item_array = [
            "product_id" => $_POST['product_id']
        ]; 

        // $item_array = arrar(
        //     "product_id" => $_POST['product_id']
        // ); 
        $_SESSION['cart'][0] = $item_array; 
        // print_r($_SESSION['cart']); 
    }
}


?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Shopping Cart</title>
    <!-- Font-Awesome CDN  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.css" integrity="sha256-PF6MatZtiJ8/c9O9HQ8uSUXr++R9KBYu4gbNG5511WE=" crossorigin="anonymous" />
    <!-- bootstrap CDN - css -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- CSS file -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    
    <?php 
        require ("./php/header.php"); 

    ?>
    



    <!-- create a simple shopping cart template  -->

    <div class="container">
        <div class="row text-center py-5">
            <?php 
              

                $items = new Items($pdo); 

                $items->getItems(); 
                
            ?>
        </div>
    </div>


    
    <!-- bootstrap CDN - JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>