<html>
    <head> 
        <title> Fresh food</title>
    </head>
    <!-- the CSS is used for creating the areas to cover every product on the image,
    initially image map was applied, but now using the CSS to create areas and link to database-->
    <style>
    .area1 {
        background:rgb(206, 166, 166);
        display:block;
        width: 89px;
        height: 72px;
        opacity:0;
        position:absolute;
        left:26px;
        top:101px;
    }
    .area2 {
        background:rgb(206, 166, 166);
        display:block;
        width: 92px;
        height: 50px;
        opacity:0;
        position:absolute;
        left:72px;
        top:233px;
    }
    .area3 {
        background:rgb(206, 166, 166);
        display:block;
        width: 92px;
        height: 50px;
        opacity:0;
        position:absolute;
        left:196px;
        top:233px;
    }
    .area4 {
        background:rgb(206, 166, 166);
        display:block;
        width: 93px;
        height: 72px;
        opacity:0;
        position:absolute;
        left:242px;
        top:101px;
    }
    .area5 {
        background:rgb(206, 166, 166);
        display:block;
        width: 92px;
        height: 72px;
        opacity:0;
        position:absolute;
        left:347px;
        top:101px;
    }
    .area6 {
        background:rgb(206, 166, 166);
        display:block;
        width: 90px;
        height: 72px;
        opacity:0;
        position:absolute;
        left:452px;
        top:101px;
    }
    .area7 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 72px;
        opacity:0;
        position:absolute;
        left:561px;
        top:101px;
    }
    .area8 {
        background:rgb(206, 166, 166);
        display:block;
        width: 93px;
        height: 72px;
        opacity:0;
        position:absolute;
        left:669px;
        top:101px;
    }
    .area1:hover, .area2:hover, .area3:hover, .area4:hover, .area5:hover,.area6:hover, .area7:hover,.area8:hover {
        opacity:0.5;
    }  
    </style>
    <body>
        <!-- this is the form that sends product id to database and retrieve the product -->
        <form id="theproduct" name="theproduct" method="POST" action="productdetail.php" target="products">
            <input type="hidden" id="theid" name="theid" value="1000">
        </form>        
        <!-- these areas cover all the product nodes on the image, and link to the database -->
        <a id="area1" class="area1" alt="T bone steak"  href="#" onclick="dosubmit(3002); myfunction();"></a>
        <a id="area2" class="area2" alt="500 gram chedder cheese"  href="#" onclick="dosubmit(3000); myfunction();"></a>
        <a id="area3" class="area3" alt="1000 gram chedder cheese"  href="#" onclick="dosubmit(3001); myfunction();"></a>
        <a id="area4" class="area4" alt="Navel oranges"  href="#" onclick="dosubmit(3003); myfunction();"></a>
        <a id="area5" class="area5" alt="Bananas"  href="#" onclick="dosubmit(3004); myfunction();"></a>
        <a id="area6" class="area6" alt="Grapes"  href="#" onclick="dosubmit(3006); myfunction();"></a>
        <a id="area7" class="area7" alt="Apples"  href="#" onclick="dosubmit(3007); myfunction();"></a>
        <a id="area8" class="area8" alt="Peaches"  href="#" onclick="dosubmit(3005); myfunction();"></a>
        <!-- the subcategory image of fresh food-->
        <img src="pic/freshFood.JPG" alt="fresh food" style="width:100%; height:100%;" usemap="#freshmap">
        <!-- image map to link the database, but now is covered by the CSS designed areas-->
        <map name="freshmap">
            <area shape="rect" coords="20,98,109,170" alt="T bone steak"  href="#" onclick="dosubmit(3002); myfunction();">
            <area shape="rect" coords="69,230,161,279" alt="500 gram chedder cheese"  href="#" onclick="dosubmit(3000); myfunction();">
            <area shape="rect" coords="193,230,285,279" alt="1000 gram chedder cheese"  href="#" onclick="dosubmit(3001); myfunction();">
            <area shape="rect" coords="238,98,331,170" alt="Navel oranges"  href="#" onclick="dosubmit(3003); myfunction();">
            <area shape="rect" coords="343,98,435,170" alt="Bananas"  href="#" onclick="dosubmit(3004); myfunction();">
            <area shape="rect" coords="447,98,537,170" alt="Grapes"  href="#" onclick="dosubmit(3006); myfunction();">
            <area shape="rect" coords="555,98,646,170" alt="Apples"  href="#" onclick="dosubmit(3007); myfunction();">
            <area shape="rect" coords="666,98,759,170" alt="Peaches"  href="#" onclick="dosubmit(3005); myfunction();">
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