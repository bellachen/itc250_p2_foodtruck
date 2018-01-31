<?php
//items4.php

$myItem = new Item(1,"Burger","100% Grass-fed beef",6.95);
$myItem->addExtra("None");
$myItem->addExtra("Tomatoes");
$myItem->addExtra("Onion");    
$config->items[] = $myItem;
$myItem = new Item(2,"Fries","Fresh cut fries",3.95);
$myItem->addExtra("None");
$myItem->addExtra("Garlic Mayo");
$myItem->addExtra("Sriracha Mayo");     
$config->items[] = $myItem;     
$myItem = new Item(3,"Vanilla Ice Cream","100% organic milk",4.95);
$myItem->addExtra("None");
$myItem->addExtra("Oreo cookies");
$myItem->addExtra("Fresh Berries"); 
$config->items[] = $myItem;    
$myItem = new Item(4,"Salad","Caesar Salad",5.95);
$myItem->addExtra("None");
$myItem->addExtra("Croutons");
$myItem->addExtra("Bacon");     
$config->items[] = $myItem;    
$myItem = new Item(5,"xxxxx","Caesar Salad",7.95);
$myItem->addExtra("None");
$myItem->addExtra("Croutons");
$myItem->addExtra("Bacon");     
$config->items[] = $myItem; 
/*
$myItem = new Item(1,"Taco","Our Tacos are awesome!",4.95);
$myItem->addExtra("Sour Cream");
$myItem->addExtra("Cheese");
$myItem->addExtra("Guacamole");
$config->items[] = $myItem;

$myItem = new Item(2,"Sundae","Our Sundaes are awesome!",3.95);
$myItem->addExtra("Sprinkles");
$myItem->addExtra("Chocolate Sauce");
$myItem->addExtra("Nuts");
$config->items[] = $myItem;

$myItem = new Item(3,"Salad","Our Salads are awesome!",5.95);
$myItem->addExtra("Croutons");
$myItem->addExtra("Bacon");
$myItem->addExtra("Lemon Wedges");
$myItem->addExtra("Avacado");
$config->items[] = $myItem;
*/

//create a counter to load the ids...
//$items[] = new Item(1,"Taco","Our Tacos are awesome!",4.95);
//$items[] = new Item(2,"Sundae","Our Sundaes are awesome!",3.95);
//$items[] = new Item(3,"Salad","Our Salads are awesome!",5.95);

/*
echo '<pre>';
var_dump($items);
echo '</pre>';
die;
*/


class Item
{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();
    
    public function __construct($ID,$Name,$Description,$Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        
    }#end Item constructor
    
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;
        
    }#end addExtra()

}#end Item class











