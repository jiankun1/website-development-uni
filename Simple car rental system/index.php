<!DOCTYPE html>

<html>
    <head>
        <title> Hertz-UTS Online Car Rental</title>
    </head>

    <style>
        /*the hearder style, equal spacing between logo, title and button*/
        .header{
            background-color: black;
            /*text-align: center;*/
            display: flex;
            align-items: center;
            /*justify-content: center;*/
            justify-content: space-between;
            /*position: relative;*/
        }
        /*title*/
        h1 {
            text-align: center;
        }
        /*position of botton*/
        #button{
            /*position: absolute;
            right: 0;*/
            float: right;
        }
        /*logo size*/
        #logo{
            float: left;
            width: 150px;
            height: 75px;
        }
        /*button color and other style*/
        button[type=submit]{
            background-color: rgb(69, 126, 212);
            border: none;
            color: white;
            text-decoration: none;
            cursor: pointer;
            margin: 3px 2px;
            padding: 8px 16px;
        }
        .button{
            background-color: rgb(69, 126, 212);
            border: none;
            color: white;
            text-decoration: none;
            cursor: pointer;
            margin: 5px 5px;
            padding: 8px 16px;
        }
        /* the section contains all the car div*/
        .allsection{
            margin:20px;
            /*display:table;
            width:100%;*/
           
        }
        /* clear floats after each section*/
        .allsection:after{
            content: "";
            display: table;
            clear: both;
            
        }
        /*section for each car*/
        .section{
            margin: 10px;
            border: 1px solid #ccc;
            width: 20%;
            float: left;
            height:540px;
            padding: 10px;
            
        }
        .section:hover{
            border:1px solid #777;
        }
        /*check the width of section for each car*/
        @media screen and (max-width: 600px) {
            .section{
                width: 100%;
            }
        }
        /*make the image within the section*/
        img {
            width: 100%;
            height:200px;
            object-fit:contain;
        }
        /*style for car description*/
        p {
            width: 100%;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

    </style>

    <body >
        <div class="header">
            <img src="/pic/logo.jpg" alt="logo image" id="logo" >
            <h1 style="color:white; text-align:center;">Car Rental Center</h1>
            <form id="button" method="POST" action="session.php" >
            <button  type="submit"   value="submit"> Car Reservation </button>
            </form>
        </div>
        <!--all cars will be shown in this div section-->
        <div class="allsection" id="carlist">
            <!-- all car will be shown in this section-->
        </div>
        <!-- submit form and stay on this page, reference: https://stackoverflow.com/questions/5733808/submit-form-and-stay-on-same-page-->
        <iframe id="hiddenframe" name="hiddenframe" style="position: absolute; width:0; height:0; border:0;"></iframe>
    </body>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>-->
    <script type="text/javascript">
        //$(document).ready(function(){
            //use ajax to access json
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // extract the data and store the json data into array
                    var thecars = JSON.parse(this.responseText);
                    // loop 11 cars in json file and add content to each div section
                    //set global variable
                    var i=0;
                    //loop the array
                    for (i=0; i<11; i++) {
                        // set the model name as variable
                        var carmodel = thecars["cars"][i]["Model"];
                        // set the div section of each car
                        var allcar = document.createElement("div");
                        allcar.id=carmodel;
                        allcar.classList.add("section");
                        document.getElementById("carlist").appendChild(allcar);
                        //create image tag
                        var carimage = document.createElement("img");
                        //use the model name variable to set the source attribute of image tag
                        carimage.src = "pic/"+carmodel+".jpg";
                        //add the image to the specific div tag
                        allcar.appendChild(carimage);
                        //create the title of each car by using brand, model and model year
                        var cartitle = document.createElement("h2");
                        cartitle.innerHTML = thecars["cars"][i]["Brand"] +"-"+ thecars["cars"][i]["Model"]+"-"+thecars["cars"][i]["Model year"];
                        allcar.appendChild(cartitle);
                        // show the rest of detail
                        var cardetail = document.createElement("P");
                        cardetail.innerHTML = "<b>Mileage: </b>"  + thecars["cars"][i]["Mileage"];
                        cardetail.innerHTML += "<br>";
                        cardetail.innerHTML += "<b>Fuel type: </b>"  + thecars["cars"][i]["Fuel type"];
                        cardetail.innerHTML += "<br>";
                        cardetail.innerHTML += "<b>Seats: </b>"  + thecars["cars"][i]["Seats"];
                        cardetail.innerHTML += "<br>";
                        cardetail.innerHTML += "<b>Price per day: $</b>"  + thecars["cars"][i]["Price per day"];
                        cardetail.innerHTML += "<br>";
                        cardetail.innerHTML += "<b>Availability: </b>"  + thecars["cars"][i]["Availability"];
                        allcar.appendChild(cardetail);
                        // show the description of the car
                        var desp = document.createElement("p");
                        desp.innerHTML = "<b>Description: </b>" + thecars["cars"][i]["Description"];
                        allcar.appendChild(desp);
                        // set a button to check the availability and submit the form to session
                        // reference:https://stackoverflow.com/questions/13001830/creating-and-submitting-a-form-with-javascript/13001878
                        var addcart = document.createElement("button");
                        addcart.innerHTML = "Add to cart";
                        var avail = thecars["cars"][i]["Availability"];
                        addcart.setAttribute("value", avail);
                        addcart.setAttribute("data-value",thecars["cars"][i]["Model"])
                        // set the button name as same as the id of the following form
                        addcart.setAttribute("name", "myform"+thecars["cars"][i]["Model"]);
                        addcart.setAttribute("class","button");
                        allcar.appendChild(addcart);
                        // create form to contain the car info for each car
                        var myform = document.createElement("form");
                        myform.method = "POST";
                        myform.action = "session.php";
                        myform.setAttribute("target","hiddenframe");
                        // set the id as same as button name above, so button can submit this form using following function
                        myform.setAttribute("id", "myform"+thecars["cars"][i]["Model"]);
                        // set the input contained car name
                        var elementcar = document.createElement("input");
                        elementcar.value = thecars["cars"][i]["Model"];
                        elementcar.name = "carname";
                        elementcar.setAttribute("type","hidden");
                        myform.appendChild(elementcar);
                        // set the input contained car details
                        var elementcardetails = document.createElement("input");
                        elementcardetails.value = thecars["cars"][i]["Model year"] +"-"+ thecars["cars"][i]["Brand"] +"-"+ thecars["cars"][i]["Model"];
                        elementcardetails.name = "cardetails";
                        elementcardetails.setAttribute("type","hidden");
                        myform.appendChild(elementcardetails);
                        // set the input contained car price
                        var elementcarprice = document.createElement("input");
                        elementcarprice.value = thecars["cars"][i]["Price per day"];
                        elementcarprice.name = "carprice";
                        elementcarprice.setAttribute("type","hidden");
                        myform.appendChild(elementcarprice);
                        // append the form to each div section
                        allcar.appendChild(myform);

                        // add the click function to the button in each div section
                        addcart.addEventListener("click", function(){
                            // the value is availability
                            var elementavail = this.value;
                            // the name is the same as the id of the form
                            var dataval = this.name;
                            //console.log(dataval);
                            // check if availability is true
                            if ( elementavail == "True"){
                                document.getElementById(dataval).submit();
                                alert("Add to the cart successfully.");
                            } else if (elementavail == "False") {
                                alert("Sorry, the car is notavailable now. Please try other cars.");
                            }
                        });
                    
                    }
                }
            };
            xmlhttp.open("GET", "cars.json", true);
            xmlhttp.send();
        //});
    </script>
</html>