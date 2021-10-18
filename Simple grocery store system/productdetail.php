<?php 
//this php file is used for retrieving data from database, and display to the top right section
//Establish connection with the endpoint address
$connection = mysqli_connect('aacqe9w2e84egt.ctflyysjshdp.us-east-1.rds.amazonaws.com', 'uts', 'internet', 'uts');
if (!$connection)
   die("Could not connect to Server");

$productid = $_REQUEST['theid'];

$query_string = "select * from product where product_id = $productid";

$result = mysqli_query($connection,$query_string);

//use associative array to print the target product
$num_rows=mysqli_num_rows($result);
if ($num_rows > 0) {
    print "<style>
            table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            }
            </style>";
    print "<table  style='width:100%; text-align:center;'>";
    print "<tr>";
    print "<th>Product Id</th>";
    print "<th>Product Name</th>";
    print "<th>Unit Price</th>";
    print "<th>Unit Quantity</th>";
    print "<th>In Stock</th>";
    print "</tr>";

    while ( $a_row = mysqli_fetch_assoc($result)) {
        print "<tr>\n";
        print "<td>$a_row[product_id]</td>";
        print "<td>$a_row[product_name]</td>";
        print "<td>$a_row[unit_price]</td>";
        print "<td>$a_row[unit_quantity]</td>";
        print "<td>$a_row[in_stock]</td>";
        print "</tr>";
        //create variables used for the session
        $prod=$a_row['product_name'];
        $price=$a_row['unit_price'];
        $quan=$a_row['unit_quantity'];
    }

    print "</table><br>";
}

mysqli_close($connection);

    // customers to add product to the shopping cart
    /*echo $productid."<br>";
    echo $prod;
    echo $price;
    echo "<form method='POST' action='session.php' target='cart'>";
    echo '<input type="hidden" name="productname" value="'.$prod.'"/>';
    echo "<input type='hidden' name='unitprice' value='test'>";
    echo "Enter amount: <input type='number' name='amount' size='5'>";
    echo "<button type='submit' value='submit'> Add to cart </button>";
    echo "</form>";

echo '<script> document.getElementById(unitprice).value = "'. $price.'"; </script>';*/

?>
<html>
    <body>
        <div style="text-align: center;">
        <!-- attach the product image, the images are quoted from Woolworths website-->
        <img src="pic/<?php echo $productid;?>.JPG" style="width:150px; height:150px;">
        <!-- if add the product to the cart, send the product and the amount to the session-->
        <form method='POST' action='session.php' target='cart' onsubmit="return validatenum()">
            <input type="hidden" name="productname" value="<?php echo $prod; ?>">
            <input type="hidden" name="unitquan" value="<?php echo $quan; ?>">
            <input type="hidden" name="unitprice" value="<?php echo $price; ?>">
            Enter amount: <input type='number' id='amount' name='amount' size='5'>
            <button type='submit' value='submit'> Add to cart </button>
        </form>
        </div>
        <!-- the script is to validate the input, input number must be larger than 0 and smaller than 20 -->
        <script type="text/javascript">
            function validatenum()
            {
                if (document.getElementById("amount").value=="")
                {
                    alert("Please enter the amount you want to purchase");
                    return false;
                }
                var theamount = document.getElementById("amount").value;
                if (theamount < 0)
                {
                    alert("The amount must be at least 1");
                    return false;
                }
                if (theamount > 20)
                {
                    alert("Each customer can only purchase 20 items for each product");
                    return false;
                }
                return true;
            }
        </script>
    </body>
</html>