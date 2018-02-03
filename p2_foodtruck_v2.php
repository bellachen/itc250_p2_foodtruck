<html>
<head>
    <title>Food Truck</title>
    <link rel="stylesheet" href="p2_foodtruck_v2.css" type="text/css" media="all" />
</head>
<body>

<?php
    
//create class
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

//calculate based on user input
foreach($items as $item){
    $item->Qty = $_POST['qty'.$item->Name];
    $item->Selected = $_POST['select'.$item->Name];
    if($_POST['select'.$item->Name] == "None" ||''){
        $item->Total = $_POST["qty".$item->Name] * $item->Price; 
    } else {
        $item->Total = ($_POST["qty".$item->Name] * $item->Price) + ($_POST["qty".$item->Name] * $item->ExtraCharge); 
    }   
}
    
//calculate total
$grandtotal = 0;
foreach($items as $item){
    $grandtotal += $item->Total;
}

?>        
    
<!-- MENU -->     
<form action="p2_foodtruck_v2.php" method="post">    
<table>
    <tr>
        <td colspan="4" align="center">
            <h2>Menu</h2>
        </td>    
    </tr>
    <tr>
        <th colspan="2">ITEM</th>
        <th>QTY</th>
    </tr>
    
    <?php
        foreach($items as $item){
            echo '<tr>
                <td>
                    <h3>' . $item->Name . '</h3>
                    <p>' . $item->Description . '</p>
                </td>
                <td>
                    <h3>$' . $item->Price . '</h3>
                </td>
                <td>
                    <select name="select'.$item->Name.'">';
                        foreach($item->Extras as $item->Extra) {
                            echo '<option>' . $item->Extra . '</option>';
                        }
                    echo '
                    </select>    
                </td>
                <td>
                    <h3><input type="text" name="qty'.$item->Name.'" size="5" pattern="\d{1,4}"></h3>
                </td>
            </tr>';     
        }
    ?>
    
    <tr>
        <td colspan="4" align="right">
            <input type="submit" name="submit" value="Submit" class="submit"/> 
        </td>
    </tr>
    
</table>
</form>
    
    <?php
        if(isset($_POST['submit'])){
        echo '    
            <!-- RECEIPT -->    
            <table>
                <tr>
                    <td colspan="6" align="center">
                        <h2>Receipt</h2>
                    </td>    
                </tr>
                <tr>
                    <th>ITEM</th> 
                    <th colspan="2">QTY</th>
                    <th class="total">TOTAL</th>
                </tr>';
        foreach($items as $item){
            if($item->Qty != 0){
                    echo '
                    <tr>
                        <td>
                            <h3>' . $item->Name . '</h3>
                            <p>' . $item->Description . '</p>
                        </td>
                        <td>
                            <h3>' . $item->Selected . '</h3>
                        </td>
                        <td>
                            <h3> $' . $item->Price . '</h3>
                        </td>
                        <td>
                            <h3>x</h3>
                        </td>
                        <td>
                            <h3>' . $item->Qty . '</h3>
                        </td>
                        <td class="total">
                            <h3>$' . $item->Total . '</h3>
                        </td>
                    </tr> ';}
            }
        echo '
            <!--Totals-->
                <tr class="grandtotal">
                    <td colspan="5">
                        <h3>SUBTOTAL</h3>
                    </td>
                    <td class="grandtotal">
                        <h3>$' . $grandtotal . '</h3>
                    </td>
                </tr>
            </table>
            <h1>Thank you!<h1>';
        }
    ?>
   
</body>      
</html>