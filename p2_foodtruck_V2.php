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
    public function __construct($Name,$Description,$Price,$Qty,$Selected,$Total) {
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = (float)$Price;
        $this->Qty = (int)$Qty;
        $this->Selected = $Selected;
        $this->Total = (float)$Total;
        }
    
    public function addExtra($Extra){
        $this->Extras[] = $Extra;
    }
}
//create object
$myItem = new Item("Burger","100% Grass-fed beef",6.95,'','','');
$myItem->addExtra("None");
$myItem->addExtra("Tomatoes");
$myItem->addExtra("Onion");    
$items[] = $myItem;
$myItem = new Item("Fries","Fresh cut fries",3.95,'','',''); 
$myItem->addExtra("None");
$myItem->addExtra("Garlic Mayo");
$myItem->addExtra("Sriracha Mayo");     
$items[] = $myItem;     
$myItem = new Item("Vanilla Ice Cream","100% organic milk",4.95,'','','');
$myItem->addExtra("None");
$myItem->addExtra("Oreo cookies");
$myItem->addExtra("Fresh Berries"); 
$items[] = $myItem;    
$myItem = new Item("Salad","Caesar Salad",5.95,'','','');
$myItem->addExtra("None");
$myItem->addExtra("Croutons");
$myItem->addExtra("Bacon");     
$items[] = $myItem;     
//calculate based on user input
$items[0]->Qty = $_POST['Qty0'];
$items[0]->Selected = $_POST["Select0"]; 
$items[0]->Total = $_POST["Qty0"] * 6.95; 
$items[0]->addExtra= $_POST["Qty0"] * 6.95+ 0.50;
    
$items[1]->Qty = $_POST['Qty1'];
$items[1]->Selected = $_POST["Select1"]; 
$items[1]->Total = $_POST["Qty1"] * 3.95;     
$items[2]->Qty = $_POST['Qty2'];
$items[2]->Selected = $_POST["Select2"];
$items[2]->Total = $_POST["Qty2"] * 4.95;     
$items[3]->Qty = $_POST['Qty3'];
$items[3]->Selected = $_POST["Select3"];
$items[3]->Total = $_POST["Qty3"] * 5.95;     
//calculate total
$grandtotal = $items[0]->Total + $items[1]->Total + $items[2]->Total + $items[3]->Total 
?>


    
<!-- MENU -->     
<form action="p2_foodtruck_v2.php" method="post">    
<table>
    <tr>
        <td colspan="4" align="center">
            <h1>Menu</h1>
        </td>    
    </tr>
    <tr>
        <th colspan="2">Item</th>
        <th>Extras</th> 
        <th>Qty</th>
    </tr>
    <!--First Item-->
    <tr>
        <td>
            <h3><?php echo $items[0]->Name;?></h3>
            <p><?php echo $items[0]->Description;?></p>
        </td>
        <td>
            <h3><?php echo "$" . $items[0]->Price;?></h3>
        </td>
        <td>
            <select name="Select0">
                <option value="none"><?php echo $items[0]->Extras[0];?></option>
                <option value="tomato"><?php echo $items[0]->Extras[1];?></option>
                <option value="onion"><?php echo $items[0]->Extras[2];?></option>
            </select>    
        </td>
        <td>
            <h3><input type="text" name="Qty0" size="5"></h3>
        </td>
    </tr>  
    <!--Second Item-->
    <tr>
        <td>
            <h3><?php echo $items[1]->Name;?></h3>
            <p><?php echo $items[1]->Description;?></p>
        </td>
        <td>
            <h3><?php echo "$" . $items[1]->Price;?></h3>
        </td>
        <td>
            <select name="Select1">
                <option><?php echo $items[1]->Extras[0];?></option>
                <option><?php echo $items[1]->Extras[1];?></option>
                <option><?php echo $items[1]->Extras[2];?></option>
            </select>    
        </td>
        <td>
            <h3><input type="text" name="Qty1" size="5"></h3>
        </td>
    </tr>
    <!--Third Item-->
    <tr>
        <td>
            <h3><?php echo $items[2]->Name;?></h3>
            <p><?php echo $items[2]->Description;?></p>
        </td>
        <td>
            <h3><?php echo "$" . $items[2]->Price;?></h3>
        </td>
        <td>
            <select name="Select2">
                <option><?php echo $items[2]->Extras[0];?></option>
                <option><?php echo $items[2]->Extras[1];?></option>
                <option><?php echo $items[2]->Extras[2];?></option>
            </select>    
        </td>
        <td>
            <h3><input type="text" name="Qty2" size="5"></h3>
        </td>
    </tr>
    <!--Fourth Item-->
    <tr>
        <td>
            <h3><?php echo $items[3]->Name;?></h3>
            <p><?php echo $items[3]->Description;?></p>
        </td>
        <td>
            <h3><?php echo "$" . $items[3]->Price;?></h3>
        </td>
        <td>
            <select name="Select3">
                <option><?php echo $items[3]->Extras[0];?></option>
                <option><?php echo $items[3]->Extras[1];?></option>
                <option><?php echo $items[3]->Extras[2];?></option>
            </select>    
        </td>
        <td>
            <h3><input type="text" name="Qty3" size="5"></h3>
        </td>
    </tr>   
</table>
    
<input type="submit" name="submit" value="Submit" class="submit"/>    
</form>    

<?php
    if(isset($_POST['submit'])){
        echo '    
            <!-- RECEIPT -->    
            <table>
                <tr>
                    <td colspan="6" align="center">
                        <h1>Receipt</h1>
                    </td>    
                </tr>
                <tr>
                    <th>Item</th>
                    <th colspan="2">Extras</th> 
                    <th colspan="2">Qty</th>
                    <th class="total">Total</th>
                </tr>
                <!--First Item-->
                <tr>
                    <td>
                        <h3>' . $items[0]->Name . '</h3>
                        <p>' . $items[0]->Description . '</p>
                    </td>
                    <td>
                        <h3>' . $items[0]->Selected . '</h3>
                    </td>
                    <td>
                        <h3> $' . $items[0]->Price . '</h3>
                    </td>
                    <td>
                        <h3>x</h3>
                    </td>
                    <td>
                        <h3>' . $items[0]->Qty . '</h3>
                    </td>
                    <td class="total">
                        <h3>$' . $items[0]->Total . '</h3>
                    </td>
                </tr>      
                <!--Second Item-->
                <tr>
                    <td>
                        <h3>' . $items[1]->Name . '</h3>
                        <p>' . $items[1]->Description . '</p>
                    </td>
                    <td>
                        <h3>' . $items[1]->Selected . '</h3>
                    </td>
                    <td>
                        <h3>$' . $items[1]->Price . '</h3>
                    </td>
                    <td>
                        <h3>x</h3>
                    </td>
                    <td>
                        <h3>' . $items[1]->Qty . '</h3>
                    </td>
                    <td class="total">
                        <h3>$' . $items[1]->Total . '</h3>
                    </td>
                </tr>      
                <!--Third Item-->
                <tr>
                    <td>
                        <h3>' . $items[2]->Name . '</h3>
                        <p>' . $items[2]->Description . '</p>
                    </td>
                    <td>
                        <h3>' . $items[2]->Selected . '</h3>
                    </td>
                    <td>
                        <h3>$' . $items[2]->Price . '</h3>
                    </td>
                    <td>
                        <h3>x</h3>
                    </td>
                    <td>
                        <h3>' . $items[2]->Qty . '</h3>
                    </td>
                    <td class="total">
                        <h3>$' . $items[2]->Total . '</h3>
                    </td>
                </tr>      
                <!--Fourth Item-->
                <tr>
                    <td>
                        <h3>' . $items[3]->Name . '</h3>
                        <p>' . $items[3]->Description . '</p>
                    </td>
                    <td>
                        <h3>' . $items[3]->Selected . '</h3>
                    </td>
                    <td>
                        <h3>$' . $items[3]->Price . '</h3>
                    </td>
                    <td>
                        <h3>x</h3>
                    </td>
                    <td>
                        <h3>' . $items[3]->Qty . '</h3>
                    </td>
                    <td class="total">
                        <h3>$' . $items[3]->Total . '</h3>
                    </td>
                </tr>
                <!--Totals-->
                <tr class="grandtotal">
                    <td colspan="5" class="border">
                        <h3>SUBTOTAL</h3>
                    </td>
                    <td class="grandtotal">
                        <h3>$' . $grandtotal . '</h3>
                    </td>
                </tr>
            </table>
        ';                  
    }
?>

</body>      
</html>
