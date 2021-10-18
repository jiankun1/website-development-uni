
<html>
    <head>
        <title> Car Rental Center</title>
    </head>
    
    <style>
        .header{
            background-color: black;
            text-align: center;
        }
        button[type=submit]{
            background-color: rgb(69, 126, 212);
            border: none;
            color: white;
            text-decoration: none;
            cursor: pointer;
            margin: 3px 2px;
            padding: 8px 16px;
        }
        table {
            width: 100%;
            border-collapse:collapse;
        }
        .label {
            background-color: lightgrey;
            width:25%;
        }
        td{
            height:30px;
        }
        input {
            width: 50%;
        }
        select {
            width: 50%;
        }
    </style>
    <body>
        
        <div class='header'>
            <h1 style='color:white;'>Car Rental Center</h1>
        </div>
        <h2 style=' text-align:center;'>Check Out</h2>
        <h3>Customer Details and Payment</h3>
        <p>Please fill in your details. <span style="color:red">* </span> indicates required field.</p>
        
        <!--reference to tutorial-->
        <table>
            <!--first name-->
            <tr>
                <td class="label">
                    First Name <span style="color:red">* </span>
                </td>
                <td>
                    <input type="text" id="fname" name="fname" form="cusdetail">
                </td>
            </tr>
            <!--last name-->
            <tr>
                <td class="label">
                    Last Name <span style="color:red">* </span>
                </td>
                <td>
                    <input type="text" id="lname" name="lname" form="cusdetail">
                </td>
            </tr>
            <!--email address -->
            <tr>
                <td class="label">
                    Email Address <span style="color:red">* </span>
                </td>
                <td>
                    <input type="text" id="email" name="email" form="cusdetail" >
                </td>
            </tr>
            <!-- address 1-->
            <tr>
                <td class="label">
                    Address Line 1 <span style="color:red">* </span>
                </td>
                <td>
                    <input type="text" id="address1" name="address1" form="cusdetail">
                </td>
            </tr>
            <!-- address 2-->
            <tr>
                <td class="label">
                    Address Line 2 
                </td>
                <td>
                    <input type="text" id="address2" name="address2" form="cusdetail">
                </td>
            </tr>
            <!-- city-->
            <tr>
                <td class="label">
                    City <span style="color:red">* </span>
                </td>
                <td>
                    <input type="text" id="city" name="city" form="cusdetail">
                </td>
            </tr>
            <!-- state-->
            <tr>
                <td class="label">
                    State <span style="color:red">* </span>
                </td>
                <td>
                    <select id="state" name="state" form="cusdetail">
                        <option value="NSW">New South Wales</option>
                        <option value="ACT">Australian Capital Territory</option>
                        <option value="VIC">Victoria</option>
                        <option value="QLD">Queensland</option>
                        <option value="SA">South Australia</option>
                        <option value="WA">Western Australia</option>
                        <option value="TAS">Tasmania</option>
                        <option value="NT">Northern Territory</option>
                    </select>
                </td>
            </tr>
            <!-- postcode-->
            <tr>
                <td class="label">
                    Post Code <span style="color:red">* </span>
                </td>
                <td>
                    <input type="text" id="postcode" name="postcode" form="cusdetail">
                </td>
            </tr>
            <!-- payment type-->
            <tr>
                <td class="label">
                    Payment Type <span style="color:red">* </span>
                </td>
                <td>
                    <select id="payment" name="payment" form="cusdetail">
                        <option value="VISA">VISA</option>
                        <option value="Mastercard">Mastercard</option>
                        <option value="AmericanExpress">American Express</option>
                    </select>
                </td>
            </tr>
        </table>
        <?php
            // print the total cost
            if (isset($_POST['total'])){
                $total = $_POST['total'];
                print "<p> You are reuqired to pay $ $total";
                print "<input type='hidden' id='total' name='total' value='$total' form='cusdetail'>";
            }
        ?>
        <!-- button can return to first page-->
        <form id='firstpage' method='GET' action='index.php'>
            <button type="submit" value="submit">Continue selection</button>
        </form>
        <!-- inputs in the table will link to this form, reference: https://stackoverflow.com/questions/5967564/form-inside-a-table-->
        <form method="POST" id="cusdetail" name="cusdetail" action="delivery.php" onsubmit="return validate()">
            <button type="submit" value="Booking" >Booking</button>
        </form>
        
    </body>
    <script type="text/javascript">
        // validate if the input value is empty
        function validate(){
            if (document.getElementById("fname").value=="")
            {
                alert("Please enter your first name");
                return false;
            }
            if (document.getElementById("lname").value=="")
            {
                alert("Please enter your last name");
                return false;
            }
            if (document.getElementById("email").value=="")
            {
                alert("Please enter your email address");
                return false;
            }
            if (document.getElementById("address1").value=="")
            {
                alert("Please enter your address");
                return false;
            }
            if (document.getElementById("city").value=="")
            {
                alert("Please enter your city");
                return false;
            }
            if (document.getElementById("postcode").value=="")
            {
                alert("Please enter your post code");
                return false;
            }
            // check the email format, reference: https://stackoverflow.com/questions/7635533/validate-email-address-textbox-using-javascript
            var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
            if (reg.test(document.getElementById("email").value) == false) 
            {
                alert('Invalid Email Address');
                return false;
            }
            
            return true;
        }
    </script>
</html>