<?php 


function component ($productName, $productPrice,$productImage, $productID){

     $element = '
    <div class="col-md-3 col-sm-6 my-3 my-md-0">
            <form action="index.php" method="post">
                <div class="card shadow">
                    <div>
                        <img src="'.$productImage.'" alt="image1" class="img-fluid card-img-top">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">'.$productName.'</h5>
                        <h6>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </h6>
                        <p class="card-text">
                            Some quick example text to build on the card 
                        </p>
                        <h5>
                        <small><s class="text-secondary">&euro; 519</s></small>
                            <span class="price">&euro; '.$productPrice.'</span>
                        </h5>
                        <button class="btn btn-warning my-3" type="submit" name="add">Add to Cart <i class="fas fa-shopping-cart"></i></button>
                        <input type="hidden" name="product_id" value="'.$productID.'" >
                    </div>
                </div>
            
            </form>
        </div>
    '; 

    echo $element; 
    
}


function cartElement ($productImage, $productName, $productPrice, $productID, $quantity){


    $element = '
    
    <form action="cart.php?action=remove&id='.$productID.'" method="post" class="cart-items">
    <div class="border rounded">
        <div class="row bg-white">
            <div class="col-md-3 pl-0">
                <img src="'.$productImage.'" alt="image1" class="img-fluid">
            </div>
            <div class="col-md-6">
                <h5 class="pt-2">'.$productName.'</h5>
                <small class="text-secondary">Seller: imaginary shop</small>
                <h5 class="pt-2 product-price">&euro; '.$productPrice.'</h5>
                
                <button type="submit" class="btn btn-danger" name="remove">Remove</button>

            </div>
            
            <div class="col-md-3 py-5">
                <div>
                <button type="submit" name="plus" class="btn bg-light border rounded-circle pluss"><i class="fas fa-plus"></i></button>
                <input type="text" value="'.$quantity.'" class="form-control w-50 d-inline product-quantity-input">
                <button type="submit" name="minus" class="btn bg-light border rounded-circle"><i class="fas fa-minus"></i></button>
                    <input type="hidden" name="productID" value="'.$productID.'" >
                    <input type="hidden" name="quantity" value="'.$quantity.'" >
                </div>
            </div>
        </div>
    </div>
    </form>'; 

    echo $element; 

}


