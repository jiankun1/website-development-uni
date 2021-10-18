<?php
//this php file is to dispaly the checkout component in a new window
//with the product cost and input form of delivery detail
session_start();
// call the session again to get the purchased product
if (isset($_POST['checkOut']))
{
    if (isset($_SESSION['cart']))
    {
        //the receipt
        print "<table border='1'>";
        print "<tr>";
        print "<th style='text-align:left;'>Product</th>";
        print "<th>Amount</th>";
        print "<th> Cost </th>";
        print "</tr>";
        $currentrow=sizeof($_SESSION['cart']);
        for($r=0;$r<$currentrow;$r++)
        {
            print "<tr>";
            print "<td>". $_SESSION['cart'][$r]['productName']." ". $_SESSION['cart'][$r]['unitquantity'] ."</td>";
            print "<td>". $_SESSION['cart'][$r]['quantity'] ."</td>";
            $subTotal = $_SESSION['cart'][$r]['uniPrice']*$_SESSION['cart'][$r]['quantity'];
            print "<td style='text-align:right;'>". $subTotal ."</td>";
        }
        $finalTotal = 0;
        for($r=0;$r<$currentrow;$r++)
        {
            $finalTotal += $_SESSION['cart'][$r]['uniPrice']*$_SESSION['cart'][$r]['quantity'];
        }
        print "<tr>";
        print "<th style='text-align:left;'>Total</th>";
        print "<td colspan='2' style='text-align:right;'>".'$'. $finalTotal ."</td>";
        print "<tr>";
        print "</table>";
    }
}

?>

<html>
    <body>
        <p> Enter your delivery details</p>
            <form name="purchaseform" id="purchaseform" method="POST" action="complete.php" onsubmit="return validate()">
                <table border="0">
                    <!-- input name -->
                    <tr> 
                        <td style="width:90px">
                            Name:
                            <span style="color:red">* </span>
                        </td>
                        <td style="width:120px">
                            <input type="text" id="name" name="name">
                        </td>
                    </tr>
                    <!-- input address -->
                    <tr>
                        <td>
                            Address:
                            <span style="color:red">* </span>
                        </td>
                        <td>
                            <input type="text" id="address" name="address">
                        </td>
                    </tr>
                    <!-- input suburb -->
                    <tr>
                        <td>
                            Suburb:
                            <span style="color:red">* </span>
                        </td>
                        <td>
                            <input type="text" id="suburb" name="suburb">
                        </td>
                    </tr>
                    <!-- input state -->
                    <tr>
                        <td>
                            State:
                            <span style="color:red">* </span>
                        </td>
                        <td>
                            <input type="text" id="state" name="state">
                        </td>
                    </tr>
                    <!-- input country -->
                    <tr>
                        <td>
                            Country:
                            <span style="color:red">* </span>
                        </td>
                        <td>
                            <input type="text" id="country" name="country">
                        </td>
                    </tr>
                    <!-- input email address -->
                    <tr>
                        <td>
                            Email:
                            <span style="color:red">* </span>
                        </td>
                        <td>
                            <input type="text" id="email" name="email">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="submit" value = "Submit">
                        </td>
                    </tr>
                </table>
            </form>
            <!--use script to validate the input value that is not empty-->
            <script type="text/javascript">
                function validate()
                {
                    if (document.getElementById("name").value=="")
                    {
                        alert("Please enter your name");
                        return false;
                    }
                    if (document.getElementById("address").value=="")
                    {
                        alert("Please enter your address");
                        return false;
                    }
                    if (document.getElementById("suburb").value=="")
                    {
                        alert("Please enter the suburb");
                        return false;
                    }
                    if (document.getElementById("state").value=="")
                    {
                        alert("Please enter the state");
                        return false;
                    }
                    if (document.getElementById("country").value=="")
                    {
                        alert("Please enter the country");
                        return false;
                    }
                    if (document.getElementById("email").value=="")
                    {
                        alert("Please enter your email");
                        return false;
                    }
                    var theemail = document.getElementById("email").value;
                    //theemail.split("@") == 1 || theemail.split(".") == 1 || theemail.split("@") == 0
                    if (theemail.search("@") == -1) {
                        alert("Please enter correct email format");
                        return false;
                    }
                    return true;
                }
            </script>
    </body>
</html>