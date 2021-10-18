<?php
// this php file include session and session is used for recording the product that added to the cart
session_start();
// confirm the input
if (isset($_POST['productname'], $_POST['unitquan'], $_POST['unitprice'], $_POST['amount']))
{
    //check if some products have been put into shopping chart
    if (!isset($_SESSION['cart'])) 
    {   
        
        //if no product in shopping cart, put in the prodcut details as array in session
        $newProductname =  $_POST['productname'];
        $newUnitprice = $_POST['unitprice'];
        $newUnitquantity = $_POST['unitquan'];
        $theAmount = $_POST['amount'];
        $_SESSION['cart']=array(array('productName'=>$_POST['productname'], 'unitquantity'=>$newUnitquantity, 'uniPrice'=>$newUnitprice, 'quantity'=>$theAmount));
    
        //print_r($_SESSION['cart']);
    }
    else
    {
        // if some products are already put in the shopping cart
        $newProductname =  $_POST['productname'];
        $newUnitprice = $_POST['unitprice'];
        $newUnitquantity = $_POST['unitquan'];
        $theAmount = $_POST['amount'];
        
        // check if the same products already in the cart
        $max=sizeof($_SESSION['cart']);
        for($i=0;$i<$max;$i++)
        {
            //if same product in the cart, just add the quantity
            if ($_SESSION['cart'][$i]['productName']==$newProductname && $_SESSION['cart'][$i]['uniPrice']==$newUnitprice)
            {
                $oldAmount=$_SESSION['cart'][$i]['quantity'];
                $newAmount=$oldAmount+$theAmount;
                $_SESSION['cart'][$i]['quantity']=$newAmount;
                break;
            }  
            if ($i==($max-1))
            {
                //if not have the same product. add the product
                array_push($_SESSION['cart'],array('productName'=>$newProductname, 'unitquantity'=>$newUnitquantity, 'uniPrice'=>$newUnitprice, 'quantity'=>$theAmount));
            }

        
        //print_r($_SESSION['cart']);
        }
    }

}
// to delete one product, just unset the row of array and reorder the session array
if (isset($_POST['deleterow']))
{
    $numrow=sizeof($_SESSION['cart']);
    $row = $_POST['deleterow'];
    unset($_SESSION['cart'][$row]);
    //$_SESSION['cart']=array_diff($_SESSION['cart'],$row);
    $_SESSION['cart']=array_values($_SESSION['cart']);
    // if no product in the shopping cart, delete the session to prevent any bugs
    if($row == 0 && $numrow==1)
    {
        session_destroy();
    }
    
}
// if delete all the products, unset all the array and delete the session
if (isset($_POST['deleteallrow']))
{
    $row=sizeof($_SESSION['cart']);
    for($j=0;$j<$row;$j++)
    {
        unset($_SESSION['cart'][$j]);
    }
    session_destroy();
}

    print "<style>
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
            </style>";
    // display the shopping cart as table
    print "<b> Shopping cart </b>";
    print "<table border='1' style='width:100%; text-align:center;'>";
    print "<tr>";
    print "<th>Product name</th>";
    print "<th>Unit quantity</th>";
    print "<th>Unit price</th>";
    print "<th>Purchase quantity</th>";
    print "<th>Subtotal</th>";
    print "<td>Operation</td>";
    print "</tr>";
    $currentrow=sizeof($_SESSION['cart']);
    for($r=0;$r<$currentrow;$r++){
        print "<tr>";
        print "<td>". $_SESSION['cart'][$r]['productName'] ."</td>";
        print "<td>". $_SESSION['cart'][$r]['unitquantity'] ."</td>";
        print "<td>". $_SESSION['cart'][$r]['uniPrice'] ."</td>";
        print "<td>". $_SESSION['cart'][$r]['quantity'] ."</td>";
        $subTotal = $_SESSION['cart'][$r]['uniPrice']*$_SESSION['cart'][$r]['quantity'];
        print "<td>". $subTotal ."</td>";
        //a button for clearing one product
        print "<td> 
               <form method='POST' action='session.php' target='cart'>
               <input type='hidden' name='deleterow' value= '". intval($r). "'>
               <button type='submit' value='submit'> Clear </button> 
               </form>
               </td>";
        print "<tr>";
    }
    
    $finalTotal = 0;
    for($r=0;$r<$currentrow;$r++){
        $finalTotal += $_SESSION['cart'][$r]['uniPrice']*$_SESSION['cart'][$r]['quantity'];
    }
    print "<tr>";
    print "<th>Total</th>";
    print "<td colspan='5'>". $finalTotal ."</td>";
    print "<tr>";
    print "</table>";
    //print_r($_SESSION['cart']);
    // a button to clear all the product
    print "<form method='POST' action='session.php' target='cart'>
               <input type='hidden' name='deleteallrow' value= '1'>
               <button type='submit' value='submit'> Clear all</button> 
               </form>";
    // a button to check out            
    print "<form method='POST' action='checkout.php' target='_blank' onsubmit='return validateprod()'>
               <input type='hidden' name='checkOut' value= '1'>
               <button type='submit' value='submit'> Check out </button> 
               </form>";
//for testing
//$x =  $_GET['productname'];
//$y =  $_GET['unitprice'];
//$z =  $_GET['amount'];
//echo $_POST['productname'];
//echo $_POST['unitprice'];
//echo $_POST['amount'];
//include 'form_submitted.php';
//echo $prodname;

?>
<!-- to validate that if any products exist in the shopping cart-->
<script type="text/javascript">
                function validateprod()
                {
                    var finalprice = "<?php echo $finalTotal; ?>";
                    if (finalprice==0){
                        alert("Please add the product to the cart");
                        return false;
                    }
                    return true;
                }
</script>