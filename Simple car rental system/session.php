<?php
    // create session to store the cars added by the user
    session_start();
    // confirm the input
    if (isset($_POST['carname'], $_POST['cardetails'], $_POST['carprice']))
    {
        // if session does not exit, then put all varibales in the new session
        if (!isset($_SESSION['reservation'])) 
        {   
            $newcarname =  $_POST['carname'];
            $newcardetails = $_POST['cardetails'];
            $newcarprice = $_POST['carprice'];
            $_SESSION['reservation']=array(array('CarName'=>$newcarname, 'CarDetails'=>$newcardetails, 'CarPrice'=>$newcarprice));
        }
        // if session existed, if session has same car , will not add the car, if session does not have the same car, add to the session
        else
        {
            $newcarname = $_POST['carname'];
            $newcardetails = $_POST['cardetails'];
            $newcarprice = $_POST['carprice'];
            
            $max=sizeof($_SESSION['reservation']);
                for($i=0;$i<$max;$i++)
                {
            
                    if ($_SESSION['reservation'][$i]['CarName']==$newcarname )
                    {
                        break;
                    }  
                    if ($i==($max-1))
                    {
                        
                        array_push($_SESSION['reservation'],array('CarName'=>$newcarname, 'CarDetails'=>$newcardetails, 'CarPrice'=>$newcarprice));
                    }
                }
        }
    }
    // if the clear button is clicked, the specific array will be deleted and the session will be reordered,
    // if not value in the session after delete, destroy the session prevent any bug
    if (isset($_POST['deleterow']))
    {
        $numrow=sizeof($_SESSION['reservation']);
        $row = $_POST['deleterow'];
        unset($_SESSION['reservation'][$row]);
        
        $_SESSION['reservation']=array_values($_SESSION['reservation']);
        
        if($row == 0 && $numrow==1)
        {
            session_destroy();
        }
        
    }
    
    // if session exists and is not empty, print the table for user
    if (isset($_SESSION['reservation']) && !empty($_SESSION['reservation'])) {    
        print "<html>";
        print "<head>
                <title> Car Rental Center</title>
                </head>";
        print "<style>
                table, th, td {
                    border: 0px solid black;
                    border-collapse: collapse;
                    text-align: center;
                }
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
                </style>";
        
        print "<body>";
        
        print "<div class='header'>
                <h1 style='color:white;'>Car Rental Center</h1>
                </div>";
        print "<h2 style=' text-align:center;'>Car Reservation</h2>";
        print "<table border='0' style='width:100%; text-align:center;'>";
        print "<tr>";
        print "<th>Thumbnail</th>";
        print "<th>Vehicle</th>";
        print "<th>Price Per Day</th>";
        print "<th>Rental Days</th>";
        print "<th>Actions</th>";
        print "</tr>";
        
        $currentrow=sizeof($_SESSION['reservation']);
        for($r=0;$r<$currentrow;$r++){
            $currentprice = $_SESSION['reservation'][$r]['CarPrice'];
            print "<tr>";
            $pic=$_SESSION['reservation'][$r]['CarName'];
            print "<td> <img src='/pic/".$pic.".jpg' alt='car image' width='150' height='100'></td>";
            //print "<td>". $_SESSION['reservation'][$r]['CarName'] ."</td>";
            print "<td>". $_SESSION['reservation'][$r]['CarDetails'] ."</td>";
            print "<td>". $_SESSION['reservation'][$r]['CarPrice'] ."</td>";
            // two inputs contain rental days and car price and id of second input will be the current row number plus 12 to prvent any conficts to previous input
            // two inputs are used for calculating the total cost
            print "<td> 
                   <input type='number' name='numberofdays' id= '".intval($r)."' min='1' max='60'>
                   <input type='hidden' value='".strval($currentprice)."' id = '".intval($r + 12 )."'>
                   </td>";
            // this form is used for triggered the detele action
            print "<td> 
                   <form method='POST' action='session.php'>
                   <input type='hidden' name='deleterow' value= '". intval($r). "'>
                   <button type='submit' value='submit'> Clear </button> 
                   </form>
                   </td>";
            print "<tr>";
        }
    
        print "<tr>";
        print 
        // calculated total cost will be add to this form and send to check out page
        print "<td colspan='4' >
                <form method='POST' id='tocheckout' action='checkout.php'>
                <input type='hidden' id='total' name='total' value= ''>
                </form>
                </td>";
        // this button is used for calculating total cost and submitting form        
        print "<td style='text-align: center;'> 
                <button type='submit' value='submit' onclick='checkoutfunction()'> Proceeding to Checkout </button>
                </td>";
                   
        print "<tr>";
        print "</table>";
        // this form will not be triggered because the following php script will run first
        print "<form id='firstpage' method='GET' action='index.php'></form>";
        print "</body>";
        print "</html>";
    
    }
    // if no data in the session, the page will diaplay a alert and return to first page
    else{
        $currentrow=0;
        print "<form id='firstpage' method='GET' action='index.php'></form>";
        echo "<script>
                alert('No car has been reserved');
                document.getElementById('firstpage').submit();
                </script>";
    }
    
?>

<script>
    // function to calculate the total cost
    function checkoutfunction() {
        // the number of car in reservation list
        var numberofcar = "<?php echo $currentrow; ?>";
        //this variable is used for validating the input value
        var status = true;
        // if data exists in the session, calculate the total price
        if (numberofcar > 0){
            var finalprice = 0;
            var i=0;
            for (i=0; i<numberofcar; i++){
                var singleprice = document.getElementById(i+12).value;
                var useday = document.getElementById(i).value;
                finalprice += singleprice * useday;
                //if the input value is smaller than 0, change the status
                if (useday <= 0){
                    status = false;
                }
            }
            //if all rental days input larger than 0, attach the total cost and submit the form
            if (status == true){
                document.getElementById('total').value = finalprice;
                document.getElementById("tocheckout").submit();
            }else{
                alert("Rental days must be larger than 0");
            }
        }
        // this function will not be triggered because the php script will run firstly to check the session if it is empty
        else if(numberofcar == 0){
            alert("No car has been reserved");
            document.getElementById("firstpage").submit();
        }
    }
</script>