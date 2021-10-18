<html>
    <head> 
        <title> home health</title>
    </head>
    <!-- the CSS is used for creating the areas to cover every product on the image,
    initially image map was applied, but now using the CSS to create areas and link to database-->
    <style>
    .area1 {
        background:rgb(206, 166, 166);
        display:block;
        width: 121px;
        height: 65px;
        opacity:0;
        position:absolute;
        left:33px;
        top:107px;
    }
    .area2 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:128px;
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
        width: 120px;
        height: 65px;
        opacity:0;
        position:absolute;
        left:338px;
        top:107px;
    }
    .area5 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:452px;
        top:230px;
    }
    .area6 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 48px;
        opacity:0;
        position:absolute;
        left:571px;
        top:232px;
    }
    .area7 {
        background:rgb(206, 166, 166);
        display:block;
        width: 121px;
        height: 65px;
        opacity:0;
        position:absolute;
        left:635px;
        top:107px;
    }
    
    .area1:hover, .area2:hover, .area3:hover, .area4:hover, .area5:hover,.area6:hover, .area7:hover{
        opacity:0.5;
    }  
    </style>
    <body>
        <!-- this is the form that sends product id to database and retrieve the product -->
        <form id="theproduct" name="theproduct" method="POST" action="productdetail.php" target="products">
            <input type="hidden" id="theid" name="theid" value="1000">
        </form>           
        <!-- these areas cover all the product nodes on the image, and link to the database -->
        <a id="area1" class="area1" alt="Bath soap"  href="#" onclick="dosubmit(2002); myfunction();"></a>
        <a id="area2" class="area2" alt="Panadol pack 24"  href="#" onclick="dosubmit(2000); myfunction();"></a>
        <a id="area3" class="area3" alt="Panadol bottle 50"  href="#" onclick="dosubmit(2001); myfunction();"></a>
        <a id="area4" class="area4" alt="Washing powder"  href="#" onclick="dosubmit(2005); myfunction();"></a>
        <a id="area5" class="area5" alt="Small garbage bags"  href="#" onclick="dosubmit(2003); myfunction();"></a>
        <a id="area6" class="area6" alt="Large garbage bags"  href="#" onclick="dosubmit(2004); myfunction();"></a>
        <a id="area7" class="area7" alt="Laundry bleach"  href="#" onclick="dosubmit(2006); myfunction();"></a>
        <!-- the subcategory image of home health-->
        <img src="pic/homeHealth.JPG" alt="home health" style="width:100%; height:100%;" usemap="#healthmap">
        <!-- image map to link the database, but now is covered by the CSS designed areas-->
        <map name="healthmap">
            <area shape="rect" coords="28,103,149,168" alt="Bath soap"  href="#" onclick="dosubmit(2002); myfunction();">
            <area shape="rect" coords="123,230,214,278" alt="Panadol pack 24"  href="#" onclick="dosubmit(2000); myfunction();">
            <area shape="rect" coords="250,230,340,278" alt="Panadol bottle 50"  href="#" onclick="dosubmit(2001); myfunction();">
            <area shape="rect" coords="333,103,453,168" alt="Washing powder"  href="#" onclick="dosubmit(2005); myfunction();">
            <area shape="rect" coords="447,225,538,273" alt="Small garbage bags"  href="#" onclick="dosubmit(2003); myfunction();">
            <area shape="rect" coords="567,225,658,273" alt="Large garbage bags"  href="#" onclick="dosubmit(2004); myfunction();">
            <area shape="rect" coords="631,103,752,168" alt="Laundry bleach"  href="#" onclick="dosubmit(2006); myfunction();">
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