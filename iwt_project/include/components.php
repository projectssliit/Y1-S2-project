<?php

function component($bookimg,$bookname,$sbookprice,$bookprice,$bookid){
    $element="
    <div class=\"column\">
    <form action=\"shop.php\" method=\"post\">
    <div class=\"product-card\">
    <div class=\"product-tumb\">
        <img src= \"$bookimg\" alt=\"...\" />
        </div>    
        <div class=\"product-details\">
        <h5>$bookname</h5>
        <div class=\"product-bottom-details\">       
        <div class=\"product-price\"><small>$sbookprice</small>LKR$bookprice</div>
        <div class=\"product-links\">
        <form action=\"shop.php\" methode=\"post\">
        <button type=\"submit\" name=\"add\" style=\"border: none;border: none;color: white; padding: 14px 28px;background-color: #046ed0;\">Add to cart<i class=\"fas fa-shopping-cart\"></i></button>
        </form >
        </div>
        <input type='hidden' name='bookid' value='$bookid'>
    </div>
</div>
</div>       
</form>  
</div>  
";
    echo $element;
}

function s_component($simg,$sname,$sprice,$sid){
    $element="
    <div class=\"column\">
    <form action=\"stationary.php\" method=\"post\">
    <div class=\"product-card\">
    <div class=\"product-tumb\">
        <img src= \"$simg\" alt=\"...\" />
        </div>    
        <div class=\"product-details\">
        <h4>$sname</h4>
        <div class=\"product-bottom-details\">       
        <div class=\"product-price\">LKR$sprice</div>
        <div class=\"product-links\">
        <form action=\"shop.php\" methode=\"post\">
        <button type=\"submit\" name=\"add\" style=\"border: none;border: none;color: white; padding: 14px 28px;background-color: #046ed0;\" >Add to cart<i class=\"fas fa-shopping-cart\"></i></button>
        </form >
        </div>
        <input type='hidden' name='stationaryid' value='$sid'>
    </div>
</div>
</div>       
</form>  
</div>  
";
    echo $element;
}




