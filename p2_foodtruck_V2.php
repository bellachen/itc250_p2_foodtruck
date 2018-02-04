<?php
// itmes.php
// '' -> empty value
// $this->ID = $ID; born of OBJECT
/// __construct is to give birth of the OBJECT
// Birht of an array $Items[] = $myItem
// build array

// Birth of an array


$myItem = new Item(1,"Burger","Burger is 100% augus Beef",19.95);
$myItem->addExtra("onins");
$myItem->addExtra("Black Pepepr");
$myItem->addExtra("Green pepepr");
$items[] = $myItem;

$myItem = new Item(2,"fries","Fries is on sale this week",1.95);
$myItem->addExtra("chochlate");
$myItem->addExtra("Nuts");
$myItem->addExtra("sprnkas");
$items[] = $myItem;    


/*
$myItem[] = new Item(1,"Taco","Out taco is nice",4.95);
$myItem[] = new Item(2,"Sundae","sundae is on sale",10.95);
$myItem[] = new Item(3,"ICE CREAM","Today is a hot day for ICE",3.00);
$myItem[] = new Item(4,"Steak","midume rear",100.95);
*/


//$myItem = new Item(1,"Taco","Out taco is nice",4.95);

echo '<pre>';
var_dump ($items);
echo '</pre>';



class Item{
    
    public $ID= 0;
    public $Name= '';
    public $Description= 0;
    public $Price= 0;
    public $Extras = array();
    
    public function __construct($ID,$Name,$Description,$Price)
    
    {
        $this->ID = (int) $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = (float) $Price;
        
    }// end construct 
    
    public function addExtra($extra)
    {
        $this->Extras[]= $extra;
        
        
    }//end addExtra
