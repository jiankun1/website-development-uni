<!DOCTYPE html>
<!-- This is the homepage of the website, it contains the structure of three frames,
and a image showing the category, five nodes can be click to show the subcategory. 
Initially image map is used for showing the subcategory, but now using the CSS to make 
the mouseover effect and link the subcategory image-->

<html>
    <head>
        <title> Online Grocery Store</title>
    </head>
<!-- css, set the area for frame -->
<style>
    /* set a reasonable size */
    html,body {
        height: 800px;
        width:1600px;
        padding: 0;
        margin: 0;
    }

    /* left  hand frame*/
    .left {
        height: 100%;
        width: 50%;
        float: left;
    }
 
     /*  right hand frame*/
     .right {
        height: 100%;
        width: 50%;
        float: right;
    }  

    /* top right frame*/
    .top {
        height: 315px;
        width: 700px;
        background-color: lightblue;
        
    }

    /* bottom right frame*/
    .bottom {
        height: 315px;
        width: 700px;
        background-color: lightpink;
    }
    /* set five area cover the five categories to achieve mouseover effect,
    set these areas invisible first*/
    .area {
    background:rgb(206, 166, 166);
    display:block;
    opacity:0;
    position:absolute;  
    width: 120px;
    height: 78px;
    }
    #area1{
    left:49px;
    top:200px;
    }
    #area2{
    left:188px;
    top:200px;
    }
    #area3{
    left:335px;
    top:200px;
    }
    #area4{
    left:480px;
    top:200px;
    }
    #area5{
    left:630px;
    top:200px;
    }
    /* show the area when mouse over */
    #area1:hover, #area2:hover, #area3:hover, #area4:hover, #area5:hover{
        opacity:0.5;
    }
    /* make the iframe invisible */
    .subcategory {
        display:none;
    }
</style>
<!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->



<body>
    <!-- left frame -->
    <div class="left">
        <!-- 
            use <a> tag and CSS to make a mouse over effect, make the image map become interactive,
            in this way. When mouse move on each area, it shows corresponding subcategory.
            (href="frozenfood.php" target="subcategory")
        -->
        <a id="area1" class="area" alt="frozen food" href="#"  onmouseover="openimage('frozenfood')"></a>
        <a id="area2" class="area" alt="fresh food" href="#" onmouseover="openimage('freshfood')"></a>
        <a id="area3" class="area" alt="beverages" href="#" onmouseover="openimage('beverages')"></a>
        <a id="area4" class="area" alt="home health" href="#"  onmouseover="openimage('homehealth')"></a>
        <a id="area5" class="area" alt="pet food" href="#"  onmouseover="openimage('petfood')"></a>
        
        <!-- image of the category section -->
        <img src="pic/main.JPG" alt="main menu" style="width:800px; height: 278px;" usemap="#categorymap">
        
        <!-- these iframes represent different subcategory, initially the frames are invisible -->
        <iframe  id="frozenfood" class="subcategory" src="frozenfood.php" style="width:800px; height: 350px; margin:0px; border:0;"></iframe>
        <iframe  id="freshfood" class="subcategory" src="freshfood.php" style="width:800px; height: 350px; margin:0px; border:0;"></iframe>
        <iframe  id="beverages" class="subcategory" src="beverages.php" style="width:800px; height: 350px; margin:0px; border:0;"></iframe>
        <iframe  id="homehealth" class="subcategory" src="homehealth.php" style="width:800px; height: 350px; margin:0px; border:0;"></iframe>
        <iframe  id="petfood" class="subcategory" src="petfood.php" style="width:800px; height: 350px; margin:0px; border:0;"></iframe>
        <!-- 
            image map for category section, this is the initial design of the left section, but it does
            not have mouseover effect
        -->
        <!--
        <map name="categorymap">
            <area shape="rect" coords="48,198,167,277" alt="frozen food"  href="frozenfood.php" target="subcategory">
            <area shape="rect" coords="187,198,307,277" alt="fresh food" href="freshfood.php" target="subcategory">
            <area shape="rect" coords="335,198,453,277" alt="beverages" href="beverages.php" target="subcategory">
            <area shape="rect" coords="482,198,603,277" alt="home health" href="homehealth.php" target="subcategory">
            <area shape="rect" coords="632,198,750,277" alt="pet food" href="petfood.php" target="subcategory">
        </map> 
        -->
        
        <!-- to show the detailed products below the category section -->
        
        <!--<iframe id="subcategory" name="subcategory" style="width:800px; height: 350px; margin:0px; border:0;">
            
        </iframe>-->
    </div>
    
    <!-- right frame-->
    <div class="right">
        <!-- top right frame -->
        <div class="top"> 
            <iframe  name="products" style="width:700px; height: 315px; margin:0px; border:0;"> 
                <!-- in this iframe section, product details will be retrieved from mysql and displayed in a table-->
            </iframe>
        </div>
        
        <!-- bottom right frame -->
        <div class="bottom" id="bottomright">
            <iframe name="cart" style="width:700px; height: 315px; margin:0px; border:0;"> 
            </iframe>
        </div>
    </div>
    <!-- use script to display corresponding subcategory -->
    <script>
            function openimage(Name) {
                var i, subcategory;
                subcategory = document.getElementsByClassName("subcategory");
                for (i = 0; i < subcategory.length; i++) {
                    subcategory[i].style.display="none";
                }
                document.getElementById(Name).style.display="block";
            }
    </script>
</body>
</html> 