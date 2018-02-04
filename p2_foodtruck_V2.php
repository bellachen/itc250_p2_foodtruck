<?php
// itmes.php
// '' -> empty value
// $this->ID = $ID; born of OBJECT
/// __construct is to give birth of the OBJECT
// Birht of an array $Items[] = $myItem
// build array

// Birth of an array



class Item {
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Qty = 0;
    public $Selected = '';
    public $Extras = array();
    public $Total = 0;
    public $ExtraCharge = 0;
    
    public function __construct($Name,$Description,$Price,$Qty,$Selected,$Total,$ExtraCharge) {
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = (float)$Price;
        $this->Qty = (int)$Qty;
        $this->Selected = $Selected;
        $this->Total = (float)$Total;
        $this->ExtraCharge = (float)$ExtraCharge;
        }
    
    public function addExtra($Extra){
        $this->Extras[] = $Extra;
    }
}
//create object
$myItem = new Item("Burger","100% Grass-fed beef",6.95,'','','',0.5);
$myItem->addExtra("None");
$myItem->addExtra("Tomatoes");
$myItem->addExtra("Onion");    
$items[] = $myItem;
$myItem = new Item("Fries","Fresh cut fries",3.95,'','','',0.5); 
$myItem->addExtra("None");
$myItem->addExtra("Garlic Mayo");
$myItem->addExtra("Sriracha Mayo");     
$items[] = $myItem;     
$myItem = new Item("IceCream","100% organic milk",4.95,'','','',0.5);
$myItem->addExtra("None");
$myItem->addExtra("Oreo cookies");
$myItem->addExtra("Fresh Berries"); 
$items[] = $myItem;    
$myItem = new Item("Salad","Caesar Salad",5.95,'','','',0.5);
$myItem->addExtra("None");
$myItem->addExtra("Croutons");
$myItem->addExtra("Bacon");     
$items[] = $myItem;     
