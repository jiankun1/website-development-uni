<html>
    <head> 
        <title> berverages </title>
    </head>
    <!-- the CSS is used for creating the areas to cover every product on the image,
    initially image map was applied, but now using the CSS to create areas and link to database-->
    <style>
    .area1 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:27px;
        top:235px;
    }
    .area2 {
        background:rgb(206, 166, 166);
        display:block;
        width: 90px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:136px;
        top:235px;
    }
    .area3 {
        background:rgb(206, 166, 166);
        display:block;
        width: 90px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:255px;
        top:235px;
    }
    .area4 {
        background:rgb(206, 166, 166);
        display:block;
        width: 89px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:363px;
        top:235px;
    }
    .area5 {
        background:rgb(206, 166, 166);
        display:block;
        width: 89px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:470px;
        top:235px;
    }
    .area6 {
        background:rgb(206, 166, 166);
        display:block;
        width: 152px;
        height: 63px;
        opacity:0;
        position:absolute;
        left:561px;
        top:117px;
    }
    .area1:hover, .area2:hover, .area3:hover, .area4:hover, .area5:hover,.area6:hover {
        opacity:0.5;
    }  
    </style>
    <body>
        <!-- this is the form that sends product id to database and retrieve the product -->
        <form id="theproduct" name="theproduct" method="POST" action="productdetail.php" target="products">
            <input type="hidden" id="theid" name="theid" value="1000">
        </form>        
        <!-- these areas cover all the product nodes on the image, and link to the database -->
        <a id="area1" class="area1" alt="200 gram coffee"  href="#" onclick="dosubmit(4003); myfunction();"></a>
        <a id="area2" class="area2" alt="500 gram coffee"  href="#" onclick="dosubmit(4004); myfunction();"></a>
        <a id="area3" class="area3" alt="Earl grey tea bags pack 25"  href="#" onclick="dosubmit(4000); myfunction();"></a>
        <a id="area4" class="area4" alt="Earl grey tea bags pack 100"  href="#" onclick="dosubmit(4001); myfunction();"></a>
        <a id="area5" class="area5" alt="Earl grey tea bags pack 200"  href="#" onclick="dosubmit(4002); myfunction();"></a>
        <a id="area6" class="area6" alt="Chocolate bar"  href="#" onclick="dosubmit(4005); myfunction();"></a>
        <!-- the subcategory image of beverages-->
        <img src="pic/beverages.JPG" alt="beverages" style="width:100%; height:100%;" usemap="#beveragemap">
        <!-- image map to link the database, but now is covered by the CSS designed areas-->
        <map name="beveragemap">
            <area shape="rect" coords="21,231,112,279" alt="200 gram coffee"  href="#" onclick="dosubmit(4003); myfunction();">
            <area shape="rect" coords="132,231,222,279" alt="500 gram coffee"  href="#" onclick="dosubmit(4004); myfunction();">
            <area shape="rect" coords="250,231,340,279" alt="Earl grey tea bags pack 25"  href="#" onclick="dosubmit(4000); myfunction();">
            <area shape="rect" coords="358,231,447,279" alt="Earl grey tea bags pack 100"  href="#" onclick="dosubmit(4001); myfunction();">
            <area shape="rect" coords="465,231,554,279" alt="Earl grey tea bags pack 200"  href="#" onclick="dosubmit(4002); myfunction();">
            <area shape="rect" coords="557,113,710,176" alt="Chocolate bar"  href="#" onclick="dosubmit(4005); myfunction();">
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