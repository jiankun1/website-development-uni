<?php
    if (isset($_POST['fname'])){
        $name = $_POST['fname'] ." ". $_POST['lname'];
        $email = $_POST['email'];
        $address = $_POST['address1'] ." ". $_POST['address2'] ." ". $_POST['city'] ." ". $_POST['state'] ." ". $_POST['postcode'];
        $total = $_POST['total'];
        print "<html>";
        print "<body>";
        print "<h3> Delivery details </h3> ";
        print "Name: $name <br>";
        print "Email: $email <br>";
        print "Address: $address <br>";
        print "Total cost: $ $total";
        print "</body>";
        print "</html>";
    } 
?>