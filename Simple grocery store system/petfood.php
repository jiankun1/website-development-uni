<html>
    <head> 
        <title> pet food</title>
    </head>
    <!-- the CSS is used for creating the areas to cover every product on the image,
    initially image map was applied, but now using the CSS to create areas and link to database-->
    <style>
    .area1 {
        background:rgb(206, 166, 166);
        display:block;
        width: 143px;
        height: 63px;
        opacity:0;
        position:absolute;
        left:65px;
        top:113px;
    }
    .area2 {
        background:rgb(206, 166, 166);
        display:block;
        width: 138px;
        height: 63px;
        opacity:0;
        position:absolute;
        left:247px;
        top:113px;
    }
    .area3 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 50px;
        opacity:0;
        position:absolute;
        left:383px;
        top:247px;
    }
    .area4 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 50px;
        opacity:0;
        position:absolute;
        left:513px;
        top:247px;
    }
    .area5 {
        background:rgb(206, 166, 166);
        display:block;
        width: 139px;
        height: 63px;
        opacity:0;
        position:absolute;
        left:613px;
        top:113px;
    }

    .area1:hover, .area2:hover, .area3:hover, .area4:hover, .area5:hover{
        opacity:0.5;
    }  
    </style>
    <body>
        <!-- this is the form that sends product id to database and retrieve the product -->
        <form id="theproduct" name="theproduct" method="POST" action="productdetail.php" target="products">
            <input type="hidden" id="theid" name="theid" value="1000">
        </form>          
        <!-- these areas cover all the product nodes on the image, and link to the database -->
        <a id="area1" class="area1" alt="Bird food"  href="#" onclick="dosubmit(5002); myfunction();"></a>
        <a id="area2" class="area2" alt="Cat food"  href="#" onclick="dosubmit(5003); myfunction();"></a>
        <a id="area3" class="area3" alt="1kg pack dry dog food"  href="#" onclick="dosubmit(5001); myfunction();"></a>
        <a id="area4" class="area4" alt="5kg pack dry dog food"  href="#" onclick="dosubmit(5000); myfunction();"></a>
        <a id="area5" class="area5" alt="Fish food"  href="#" onclick="dosubmit(5004); myfunction();"></a>
        <!-- the subcategory image of home health-->
        <img src="pic/petFood.JPG" alt="pet food" style="width:100%; height:100%;" usemap="#petmap">
        <!-- image map to link the database, but now is covered by the CSS designed areas-->
        <map name="petmap">
            <area shape="rect" coords="60,109,203,173" alt="Bird food"  href="#" onclick="dosubmit(5002); myfunction();">
            <area shape="rect" coords="243,109,381,173" alt="Cat food"  href="#" onclick="dosubmit(5003); myfunction();">
            <area shape="rect" coords="379,243,470,293" alt="1kg pack dry dog food"  href="#" onclick="dosubmit(5001); myfunction();">
            <area shape="rect" coords="509,243,600,293" alt="5kg pack dry dog food"  href="#" onclick="dosubmit(5000); myfunction();">
            <area shape="rect" coords="607,109,747,173" alt="Fish food"  href="#" onclick="dosubmit(5004); myfunction();">
        </map>   
        <!-- the function dosubmit() is for sending product id, myfunction() is for triggerring the submit button-->
        <script>
            function myfunction() {
                document.getElementById("theproduct").submit();
            }
            
            function dosubmit(number) {
                document.theproduct.theid.value = number;
                return true;
            }
        </script>     
    </body>
</html>