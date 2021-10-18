<html>
    <head> 
        <title> Frozen food</title>
    </head>
    <!-- the CSS is used for creating the areas to cover every product on the image,
    initially image map was applied, but now using the CSS to create areas and link to database-->
    <style>
    .area1 {
        background:rgb(206, 166, 166);
        display:block;
        width: 155px;
        height: 65px;
        opacity:0;
        position:absolute;
        left:25px;
        top:107px;
    }
    .area2 {
        background:rgb(206, 166, 166);
        display:block;
        width: 92px;
        height: 50px;
        opacity:0;
        position:absolute;
        left:166px;
        top:239px;
    }
    .area3 {
        background:rgb(206, 166, 166);
        display:block;
        width: 92px;
        height: 50px;
        opacity:0;
        position:absolute;
        left:281px;
        top:239px;
    }
    .area4 {
        background:rgb(206, 166, 166);
        display:block;
        width: 155px;
        height: 65px;
        opacity:0;
        position:absolute;
        left:375px;
        top:107px;
    }
    .area5 {
        background:rgb(206, 166, 166);
        display:block;
        width: 91px;
        height: 51px;
        opacity:0;
        position:absolute;
        left:522px;
        top:233px;
    }
    .area6 {
        background:rgb(206, 166, 166);
        display:block;
        width: 90px;
        height: 51px;
        opacity:0;
        position:absolute;
        left:650px;
        top:233px;
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
        <!-- these areas cover all the product nodes on the image, and link to the database-->
        <a id="area1" class="area1" alt="Hamburger Patties" href="#" onclick="dosubmit(1002); myfunction();"></a>
        <a id="area2" class="area2" alt="500 gram fish fingers"  href="#" onclick="dosubmit(1000); myfunction();"></a>
        <a id="area3" class="area3" alt="1000 gram fish fingers"  href="#" onclick="dosubmit(1001); myfunction();"></a>
        <a id="area4" class="area4" alt="Shelled prawns"  href="#" onclick="dosubmit(1003); myfunction();"></a>
        <a id="area5" class="area5" alt="1 litre tub icecream"  href="#" onclick="dosubmit(1004); myfunction();"></a>
        <a id="area6" class="area6" alt="2 litre tub icecream"  href="#" onclick="dosubmit(1005); myfunction();"></a>
        <!-- the subcategory image of frozen food-->
        <img src="pic/frozenFood.JPG" alt="frozen food" style="width:100%; height:100%;" usemap="#frozenmap">
        <!-- image map to link the database, but now is covered by the CSS designed areas-->
        <map name="frozenmap">
            <area shape="rect" coords="21,105,177,169" alt="Hamburger Patties" href="#" onclick="dosubmit(1002); myfunction();" >
            <area shape="rect" coords="162,236,254,286" alt="500 gram fish fingers"  href="#" onclick="dosubmit(1000); myfunction();">
            <area shape="rect" coords="278,236,370,286" alt="1000 gram fish fingers"  href="#" onclick="dosubmit(1001); myfunction();">
            <area shape="rect" coords="371,105,525,165" alt="Shelled prawns"  href="#" onclick="dosubmit(1003); myfunction();">
            <area shape="rect" coords="518,229,609,280" alt="1 litre tub icecream"  href="#" onclick="dosubmit(1004); myfunction();">
            <area shape="rect" coords="646,229,736,280" alt="2 litre tub icecream"  href="#" onclick="dosubmit(1005); myfunction();">
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