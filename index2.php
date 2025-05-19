
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LifeLine for Strays</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">

    <link rel="stylesheet" href="scroll.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
</head>
<body >


    
    <nav class="nav ">
        <div >
            <img id="logo" src="logo.png" alt="">
        </div>
        <div class="tags   ">
                <?php 
                    $encrypted_uid = $_GET['uid'];
                ?> 
            <ul > <a class="tag" href="http://localhost/project/Adopt/index.php?uid=<?php echo $encrypted_uid; ?>">Adopt</a></ul>
            <ul > <a class="tag" href="http://localhost/project/donate/donate.html">Donate</a></ul>
            <ul > <a class="tag" href="http://localhost/project/Medicine/index.php?uid=<?php echo $encrypted_uid; ?>">Animal Health-Care</a></ul>
            <ul > <a class="tag" href="http://localhost/project/soonAlert.php?uid=<?php echo $encrypted_uid; ?>">Stray Animal Conservation</a></ul>
            <ul > <a class="tag" href="http://localhost/project/soonAlert.php?uid=<?php echo $encrypted_uid; ?>">Habitat Preservation</a></ul>
            <ul > <a class="tag" href="/">Support</a></ul>
            <ul > <a class="tag" href="/">About-Us</a></ul>
        </div>
        <div >
            <img  class="flag" src="https://s.yimg.com/fz/api/res/1.2/a.Ab5Etcf1OW0RF0In.QDw--~C/YXBwaWQ9c3JjaGRkO2ZpPWZpdDtoPTI2MDtxPTgwO3c9MzMy/https://s.yimg.com/zb/imgv1/16676c2c-38d4-3f0a-8ddd-4a2ff804ed60/t_500x300" alt="">
        </div>

        <?php 
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "signup_db";

            $conn = new mysqli($servername, $username, $password, $dbname);
            
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $secret_key = '12345678'; 
            $iv = '1234567812345678'; 
            $encrypted_uid = $_GET['uid'];
            $uid = openssl_decrypt($encrypted_uid, 'aes-256-cbc', $secret_key, 0, $iv);

            if (!empty($uid)) {
              $query = "SELECT * FROM users WHERE uid='$uid'";
              $result = mysqli_query($conn, $query);
            
              if (mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                // $email = $row['email'];
                // Fetch other columns as needed
             
          
        ?>
        <div class="loginDiv">
            <div class="profile-container">
                
                <img src="images/profile.png" alt="Profile Photo" class="profile-photo">
                <div class="username">Hello! <?php echo $username; ?></div>

                <div class="dropdown-menu">
                    <a href="http://localhost/project/profile.php?uid=<?php echo $encrypted_uid; ?>"><img src="images/profile.png"
                            alt="Profile Icon">Profile</a>
                    <a href=""><img src="images/setting.png" alt="Settings Icon">Settings</a>
                    <a href=""><img src="images/help.png" alt="Help Icon">Help/Support</a>
                    <a href="http://localhost/project/index.html"><img src="images/logout.png" alt="Logout Icon">Logout</a>
                </div>
            </div>
        </div>
        <?php 
         } else {
            echo "No user found with the given UID.";
          }
            } else {
                echo "Invalid User.";
                }

            $conn->close();
        ?>
    </nav>

<div class="slider-container">
    <div class="slider">

        <div class="slide">
            <div class=" content1 ">
               <p class=" para11">Prevent, Protect, Thrive </p> 
               <p class=" para12">For a Healthier Pet..</p>
               <p class=" para13"> | <a class="key1" href="/">Regular Veterinary Check-ups</a> | <a class="key1" href="/">Proper Nutrition and Diet</a>  | <a class="key1" href="/">Monitoring health and mental well-being</a> <br>| <a class="key1" href="/">Emergency Care and First Aid</a></p>
            
            
               <div class=" info1">
                <a href="http://localhost/project/Medicine/index.php?uid=<?php echo $encrypted_uid; ?>">
                   <button class="topic1"> Medical Healthcare <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
            
                   <button class="know1 "> Know More </button>
               </div>
           </div>
       
       
           <img class=" post1 " src="dog.png" alt="">
        </div>


        <div class="slide">
            <div class=" content1 ">
               <p class=" para11">Give Them a Home,</p> 
               <p class=" para12"> They’ll Give You a Heart.</p>
               <p class=" para13"> | <a class="key1" href="/">Adopting Saves Lives</a> | <a class="key1" href="/">Variety of Pets Available</a>  | <a class="key1" href="/">Adoption is Cost-Effective</a> <br>| <a class="key1" href="/">Adoption Supports the Community</a></p>


               <div class=" info1">
                 <a href="http://localhost/project/Adopt/index.php?uid=<?php echo $encrypted_uid; ?>">
                   <button class="topic1"> Adopt pets <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>

                   <button class="know1 "> Know More </button>
               </div>
           </div>

       
           <img class=" post1 " src="cat_123.png" alt="">
       </div>



       <div class="slide">
             <div class=" content1 ">
                <p class=" para11">Every Pet Deserves a Future</p> 
                <p class=" para12"> Help and Protect Them!</p>
                <p class=" para13"> | <a class="key1" href="/">Reducing Poaching and illegal Trade</a> | <a class="key1" href="/">Restoring Ecosystems</a>  | <a class="key1" href="/">Education and Awareness</a> <br>| <a class="key1" href="/">Community-Based Conservation and Scientific Research</a></p>      


                <div class=" info1">
                    <a href="http://localhost/project/soonAlert.php?uid=<?php echo $encrypted_uid; ?>">
                    <button class="topic1"> Protect Animal <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>    

                    <button class="know1 "> Know More </button>
                </div>
             </div>

         
            <img class=" post3 " src="cow12345.png" alt="">
        </div>




        <div class="slide">
            <div class=" content1 ">
               <p class=" para11">Be Their LifeLine</p> 
               <p class=" para12"> Donate to Protect Animals!</p>
               <p class=" para13"> | <a class="key1" href="/">Donor Recognition</a> | <a class="key1" href="/">Easy Donation Process</a>  | <a class="key1" href="/">Process Transperency</a> <br>| <a class="key1" href="/">Animal Care Guidelines</a></p>      


               <div class=" info1">
                   <a href="http://localhost/project/donate/donate.html"><button class="topic1"> Donate Animals <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>  

                   <button class="know1 "> Know More </button>
               </div>
             </div>


                <img class=" post4 " src="girlWithCat1.png" alt="">
        </div>


       <div class="slide">
         <div class=" content1 ">
           <p class=" para11">Every animals deserves a place,</p> 
           <p class=" para12"> Help protect their living space.</p>
           <p class=" para13"> | <a class="key1" href="/">Importance of Habitat Conservation</a> | <a class="key1" href="/">Restoration of Damaged Habitats</a>  | <a class="key1" href="/">Human Impact and Responsibility</a> <br>| <a class="key1" href="/">Education and Awareness for Habitat Protection</a></p>      


            <div class=" info1">
                <a href="http://localhost/project/soonAlert.php?uid=<?php echo $encrypted_uid; ?>">
               <button class="topic1"> Habitat Preservation <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>     

               <button class="know1 "> Know More </button>
            </div>
            </div>


            <img class=" post5 " src="DogHabitate.png" alt="">
        </div>


    </div>
    
    <button class="prev"><img src="backward.png" alt="" class="btnImg"></button>
    <button class="next"><img src="forward.png" alt="" class="btnImg"></button>

</div>





<div class="searchDiv">
    <div class="search-container">
        <ul class="intro-text">
            <img class="searchImg" src="magnifying-glass.png" alt="">   I'm here to   
        </ul>
        <ul class="options-list">
            <ul class="option-item"> <a href="/">Adopt</a></ul>
            <ul class="option-item"> <a href="/">Donate</a></ul>
            <ul class="option-item"> <a href="/">Animal Health-Care</a></ul>
            <ul class="option-item"> <a href="/">Stray Animal Conservation</a></ul>
            <ul class="option-item"> <a href="/">Habitat Preservation</a></ul>
        </ul>
        <div class="last-text">
            <ul>// Find the best product for your Business</ul>
        </div>
    </div>
</div>   




<!-- Scroll Section -->


    <div class="Scroll-container">
        
        <section class="hero pinned">
            <h1>
                Protect Animals<br> Preserve Our Future  
            </h1>
        </section>

        <section class="card pinned" id="topcard">
            <div class="HeadDiv">
            <div class="HeadDiv-container">
                
                <ul class="options-list">
                    <div>  <h4 class="HeadText">Adopt </h4>                         <div class="text-underline line1 "></div> </div>
                    <div>  <h4 class="HeadText">Animal Health-Care </h4>            <div class="text-underline "></div> </div>
                    <div>  <h4 class="HeadText">Donate </h4>                        <div class="text-underline "></div> </div>
                    <div>  <h4 class="HeadText">Stray Animal Conservation </h4>     <div class="text-underline "></div> </div>
                    <div>  <h4 class="HeadText">Habitat Preservation </h4>          <div class="text-underline "></div> </div> 
                </ul>
                
                    <button class="Head-button">Get Start Now</button>
                
            </div>
        </div> </section>


        <section class="card pinned"> 
            <div id="Scroll-div1" class="Scroll-div"> 
                <h1 class="boxhead"> Lets Adopt  </h1>
                
                <section class="BoxContainer">
                <div class="box1 box">  
                    <img class="boximg1" src="AdoptCat1.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Adopt Cats</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>

                        <a href="http://localhost/project/Adopt/index1.php?category=Cat&uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Adopt <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                        <button class="PageInfo2"> Know More </button> 
                </div> </div> </section>

                <div class="box1  box">   <img class="boximg1" src="AdoptDog1.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Adopt Dogs</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>

                        <a href="http://localhost/project/Adopt/index1.php?category=Dog&uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Adopt <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                        <button class="PageInfo2"> Know More </button> 
                    </div> </div>

                <div class="box1 box">   <img class="boximg1" src="AdoptCow1.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Adopt Cows</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>

                        <a href="http://localhost/project/Adopt/index1.php?category=Cow&uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Adopt <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                        <button class="PageInfo2"> Know More </button> 
                    </div> </div>

                <div class="box1 box">   <img class="boximg1" src="AdoptRabbit1.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Adopt Other Animals</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>

                        <a href="http://localhost/project/Adopt/index1.php?category=Other&uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Adopt <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                        <button class="PageInfo2"> Know More </button> 
                    </div> </div>

            </div>
            
        </section>

        <section class="card pinned"> 
            <div id="Scroll-div2" class="Scroll-div">
                <h1 class="boxhead"> Animal Health-Care  </h1>



                <div class="box1">   <img class="boximg1" src="HealthMedicine1.jpg" alt="">
                     <div class="boxcontent">
                        <h3>Medicines For Animals</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>
                        <a href="http://localhost/project/Medicine/index.php?uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Explore <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>

                        <button class="PageInfo2"> Know More </button>
                     </div> </div>

                <div class="box1">   <img class="boximg1" src="HealthHospital1.jpg" alt="">
                     <div class="boxcontent">
                        <h3>Animal Hospitals</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>
                        <a href="http://localhost/project/Medicine/index.php?uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Explore <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                        <button class="PageInfo2"> Know More </button>
                     </div> </div>

                 <div class="box1">   <img class="boximg1" src="HealthCheckup1.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Proper Check-Up</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>
                        <a href="http://localhost/project/Medicine/consultForm.php?uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Explore <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                                                
                        <button class="PageInfo2"> Know More </button>
                    </div> </div>

                <div class="box1">   <img class="boximg1" src="HealthVaccination1.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Vaccination facility</h3>
                        <p>Lorem ipsum dolor sit amet  adipisicing elit. Necessitatibus, asperiores.</p>
                        <a href="http://localhost/project/Medicine/consultForm.php?uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Explore <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                                                
                        <button class="PageInfo2"> Know More </button>
                    </div> </div>

            </div>
        </section>

        <section class="card pinned"> 
            <div id="Scroll-div3" class="Scroll-div">
                <h1 class="boxhead"> Donate Animals  </h1>

                <div class="box1">   <img class="boximg1" src="LocalAnimalShelter1.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Local Animal Shelter</h3>
                        <p>Donate to local shelters supporting animal welfare.</p>
                        <a href="http://localhost/project/donate/donate.html">
                        <button class="PageInfo1"> Donate <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                        <button class="PageInfo2"> Know More </button>
                    </div> </div>

                <div class="box1">   <img class="boximg1" src="AnimalConservationCenter.jpg" alt="">
                     <div class="boxcontent">
                        <h3>Animal Conservation Center</h3>
                        <p>Donate to support conservation efforts and protect endangered species.</p>
                        <a href="http://localhost/project/donate/donate.html">
                        <button class="PageInfo1"> Donate <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>                        
                        <button class="PageInfo2"> Know More </button>
                     </div> </div>

                <div class="box1">   <img class="boximg1" src="OnlineDonate.jpg" alt="">
                     <div class="boxcontent">
                        <h3>Online Donations</h3>
                        <p> Donate online through organizations' websites or platforms</p>
                        <a href="http://localhost/project/donate/donate.html">
                        <button class="PageInfo1"> Donate <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>

                        <button class="PageInfo2"> Know More </button>
                     </div> </div>

                <div class="box1 unusedbox">   </div> 

            </div>
        </section>

        <section id="forth" class="card pinned"> 
            <div id="Scroll-div4" class="Scroll-div">
                <h1 class="boxhead"> Stray Animal Conservation  </h1>

                <div class="box1">   <img class="boximg1" src="AnimalDisasterRelief.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Disaster Response and Relief</h3>
                        <p>support and care for stray animals during natural disasters.</p>
                        <a href="http://localhost/project/soonAlert.php?uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Explore <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>                        
                        <button class="PageInfo2"> Know More </button>
                    </div> </div>

                <div class="box1">   <img class="boximg1" src="AnimalFoodSupport.jpg" alt="">
                     <div class="boxcontent">
                        <h3>Food and Water Support</h3>
                        <p> Providing food, water, and shelter for stray animals.    </p>
                        <a href="http://localhost/project/soonAlert.php?uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Explore <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>                        
                        <button class="PageInfo2"> Know More </button>
                     </div> </div>

                
                <div class="box1 unusedbox">   </div> 
                <div class="box1 unusedbox">   </div> 

            </div>
        </section>

        <section id="unwanted-card" class=" card pinned"> 
            <div id="unwanted-card-div">div 0</div>
        </section>

        <section id="fifth" class="card  scroll"> 
            <div id="Scroll-div5" class="Scroll-div">
                <h1 class="boxhead">Habitat Preservation  </h1>

                <div class="box1">   <img class="boximg1" src="Habitat Preservation.jpg" alt=""> 
                    <div class="boxcontent">
                        <h3>Habitat Preservation</h3>
                        <p>support and care for stray animals during natural disasters.</p>
                        <a href="http://localhost/project/soonAlert.php?uid=<?php echo $encrypted_uid; ?>">
                        <button class="PageInfo1"> Explore <b>&rarr;</b> <ion-icon name="arrow-forward"></ion-icon> </button></a>
                        <button class="PageInfo2"> Know More </button>
                    </div> </div>

                <div class="box1 unusedbox">   </div> 

                
                <div class="box1 unusedbox">   </div> 
                <div class="box1 unusedbox">   </div> 
            </div>
        </section>



        <section  class="footer1  ">
            
        <style>
            .marquee {
                background-color: #62b3b9;
                width: 100%;
                height: 50px;
                white-space: nowrap;
                overflow: hidden;
                position: relative;
            }
            .marquee-content {
                display: inline-block;
                min-width: 50%;
                animation: marquee 20s linear infinite;
                padding-top: 11px;
                
            }
    
            .marquee-content:hover {
                animation-play-state: paused;
            }       
            
            @keyframes marquee {
                from {
                    transform: translateX(0%);
                }
                to {
                    transform: translateX(-50%);
                }
            }
            .marquee span {
                font-size: 24px;
                font-weight: bold;
                color: #111;
                
                padding: 0 20px;
               
            }
        </style>
        <div class="marquee">
            <div class="marquee-content">
                <span> • PHP </span>
                <span> • NODE JS </span>
                <span> • CURL </span>
                <span> • JAVA </span>
                <span> • PYTHON </span>
                <span> • PHP </span>
                <span> • NODE JS </span>                   
                <span> • CURL </span> 
                <span> • JAVA  </span> 
                <span> • PYTHON </span> 
                <span> • PHP </span> 
                <span> • NODE JS </span> 
                <span> • CURL </span> 
                <span> • JAVA  </span> 
                <span> • CURL </span> 
                <span>  • PHP </span>
                <span> • NODE JS </span>
                <span> • CURL </span>
                <span> • JAVA </span>
                <span> • PYTHON </span>
                <span> • PHP </span>
                <span> • NODE JS </span> 
                
            </div>
        </div>
        </section>
    </div>
  


    <div class="last"></div>




    <!-- for Team section  -->



    <style>
       
       .TeamMember{
        padding-top: 20px;
        width: auto;
        background-color: #032a3e;
        height: 650px;
       }
        .teamcontainer {
            perspective: 1000px;
            display: flex;
            justify-content: center;
            gap: 70px;
            margin-bottom: 10%;
            
        }
        .imgcard {
            width: 290px;
            height: 350px;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.9s;
        }
        .imgcard:hover {
            transform: rotateY(180deg);
        }
        .imgcard .frontview, .imgcard .backview {
            position: absolute;
            width: 100%;
            height: 100%;
            backface-visibility: hidden;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 15px 18px rgba(125, 125, 125, 0.3);
        }
        .imgcard .frontview #Teamimages {
            width: 100%;
            height: 100%;
            object-fit: cover;
            
        }
        .imgcard .backview {
            background: white;
            color: rgb(0, 0, 0);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            padding: 20px;
            transform: rotateY(180deg);
        }
        .downimgcard{
            margin-top: 90px;
            
        }
        .TeamInfo{
            font-size: xxx-large;
            margin-bottom: 60px;
            display: flex;
            color: #e6eaec;
            font-family: "TASA Orbiter Display SemiBold", "TASA Orbiter Display SemiBold Placeholder", sans-serif;
            
        }
        .TeamInfo p{
            color: green;
            margin-left: 10px;
            font-family: "TASA Orbiter Display SemiBold", "TASA Orbiter Display SemiBold Placeholder", sans-serif;
        }

        .frontview p{
            color: rgb(0, 0, 0);
            position: fixed;
            margin-top: -50px;
            margin-left: 20px;
            font-weight: bold;
        }
        

    </style>
    <div class="TeamMember">
    <h1 class="TeamInfo">Our  Team  <p>Members</p> </h1>
    <div class="teamcontainer">
        <div class="imgcard">
            <div class="frontview">
                <img id="Teamimages" src="Abhishek.png" alt="Abhishek Saket">
                <p> <u>Abhishek Saket</u></p>
            </div>
            <div class="backview">
                <h3>Abhishek Saket</h3><br><br><br>
                <p>From: B-tech CSE, Batch:2022-26</p>
                <p>Age: 20</p>
                <p>Address: Satna (MP), India</p>
                <br>
                <p>Project Leader</p>
                <p>Work: Back-end and Front-end Design </p>
            </div>
        </div>
        <div class="imgcard downimgcard">
            <div class="frontview">
                <img id="Teamimages" src="ankush.png" alt="Ankush Mishra"> 
                <p> <u>Ankush Mishra</u></p>
            </div>
            <div class="backview">
                <h3>Ankush Mishra</h3><br><br><br>
                <p>From: B-tech CSE, Batch:2022-26</p>
                <p>Age: 20</p>
                <p>Address: Satna (MP), India</p>
                <br>
                <p>Project Coe-Leader</p>
                <p>Work: Back-end and Front-end Design </p>
            </div>
        </div>
        <div class="imgcard">
            <div class="frontview">
                <img id="Teamimages" src="Aman.jpg" alt="Aman Tripathi">
                <p> <u>Aman Tripathi</u></p>
            </div>
            <div class="backview">
                <h3>Aman Tripathi</h3><br><br><br>
                <p>From: B-tech CSE, Batch:2022-26</p>
                <p>Age: 20</p>
                <p>Address: Satna (MP), India</p>
                <br>
                <p>Team Members</p>
                <p>Work: Content creation </p>
            </div>
        </div>
        <div class="imgcard downimgcard">
            <div class="frontview">
                <img id="Teamimages" src="anurag.jpg" alt="Anurag Jatav">
                <p> <u>Anurag Jatav</u></p>
            </div>
            <div class="backview">
                <h3>Anurag Jatav</h3><br><br><br>
                <p>From: B-tech CSE, Batch:2022-26</p>
                <p>Age: 20</p>
                <p>Address: Satna (MP), India</p>
                <br>
                <p>Team Members</p>
                <p>Work: Content creation </p>
            </div>
        </div>
    </div>
</div>
<br><br>
<hr><hr>
<br><br><br><br>
    
<!-- Footer section with copyright -->

<style>

        
    .footer-logo {
        font-size: 2em;
        margin-bottom: 10px;
        color: rgba(255, 0, 140, 0.556);
        height: 50px;
    }.footer-logo:hover{
        color: rgb(255, 0, 128);
    }

    .footer p {
       
        letter-spacing: normal;
        line-height: 1.6;
        cursor: pointer;

        margin-bottom: 15px;
        font-size: 11.2px;
        font-weight: 500;
        font-family: framer-font-family, Inter, Inter Placeholder, sans-serif;
        color: rgb(137, 150, 169);
        
    }
    .footer p:hover{
        color: rgba(55, 55, 55, 0.699);
    }

    .footer ul {
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .footer li {
        line-height: 1.6;
        font-weight: bold;
        margin-bottom: 5px;
        color: rgba(0, 0, 255, 0.648);
        font-size: 13px;
        font-family:  sans-serif;
        cursor: pointer;
    }

   

    

    .footer-section {
        margin-bottom: 30px;
    }

    .footerInfo{
        width: 650px;
        margin-right: 100px;
    }

    .footer-section-title {
        font-size: 15.5px;
        margin-bottom: 10px;
        font-weight: bold;
        color: rgba(90, 87, 87, 0.822);
    }
    .footer-section-title:hover{
        color: black;
    }

    .footer-content {
        display: flex;
        flex-wrap: wrap;
    }

    .footer-section-item {
        width: 25%; /* Adjust width as needed */
        padding: 10px;
    }

    .footer {
        display: flex;
        margin-left: 200px;
        font-family: framer-font-family, Inter, Inter Placeholder, sans-serif;
    }

    .Copyright-info{
        /* position: fixed; */
        display: flex;
        justify-content: center;
        bottom: 10px;
        padding-bottom: 30px;
    
    }
    .Copyright-info:hover{
        color: rgba(255, 0, 0, 0.918);
    }
        /* social media logo in footer section  */
    .social_media-logo{
        width: 25px;
        height: 25px;
        cursor: pointer;
        margin-left: 15px;
    }

     .media-logo1{
        margin-left: 0px;
     }
    
    .social_media-logo-div{
        display: flex;
        
    }
    


</style>



<div class="footer">
    <div class="section footerInfo">
        <h2 class="footer-logo">LifeLine for Strays</h2>
        <p>Stray Animal Lifeline Stray Animal Lifeline is the only organization in India that provides comprehensive healthcare and support services to stray animals, ensuring their well-being and welfare. Stray Animal Lifeline also collaborates with local animal welfare groups and organizations to amplify its impact.</p>
        <p>Stray Animal Lifeline's lifeline program supercharges the organization's ability to provide critical care and support services to stray animals. The lifeline program also enables the organization to expand its outreach and education initiatives, promoting animal welfare and advocating for policy changes that benefit stray animals.</p>
        <p>Stray Animal Lifeline's healthcare program is designed to provide stray animals with access to quality medical care, including emergency treatment, surgery, and diagnostic services.</p>
        <p>Disclaimer: Stray Animal Lifeline invites you to join its mission to protect and care for stray animals. By supporting the organization's healthcare and lifeline programs, you can help make a tangible difference in the lives of stray animals. Together, we can create a more compassionate and inclusive society, where every animal has access to the care and support they deserve. Donate today and help Stray Animal Lifeline continue its vital work.</p>
    </div>

    <div class="footer-section">
        <div class="footer-content">
            <div class="footer-section-item">
                <div class="footer-section-title">MISSION AND VISION</div>
                <ul>
                    <li>Adoption Program</li>
                    <li>Animal Health-Care</li>
                    <li>Animal Conservation</li>
                    <li>Habitat Preservation</li>
                    <li>Animal Donate</li>
                    <li>Rescue and Rehabilitation</li>
                    <li>Animal Shelter </li>
                   
                    
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">ANIMAL RESCUE</div>
                <ul>
                    <li>Animal Care Services</li>
                    <li>Vaccination And Medical Care</li>
                    <li>Adoption Events</li>
                    <li>Animal Welfare</li>
                    <li>Establish Animal Shelter</li>
                    <li>Humans Education </li>
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">COMPANY</div>
                <ul>
                    <li>About Us</li>
                    <li>Careers</li>
                    <li>Terms of Use</li>
                    <li>Privacy Policy</li>
                    <li>Responsible Disclosure</li>
                    <li>Partners</li>
                    <li>Corporate Information</li>
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">MORE</div>
                <ul>
                    <li>Online Pet Adoption</li>
                    <li>Medicines For Animals</li>
                    <li>Animal Vaccination</li>
                    <li>Animal Regular Check-Up</li>
                    <li>Community Engagement</li>
                    
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">RESOURCES</div>
                <ul>
                    <li>Event Planning</li>
                    <li>Animal Shelter</li>
                    <li>Animal Hospitals</li>
                    <li>Blog Platforms</li>
                    <li>Online Pet Adoption</li>
                    
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">SOLUTIONS</div>
                <ul>
                    <li>Education</li>
                    <li>Animal Shelter</li>
                    <li>Volunteer Management</li>
                    <li>Animal Clinic</li>
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">FREE TOOLS</div>
                <ul>
                    <li>Animal Management</li>
                    <li>Online Platforms</li>
                    <li>Blog Platforms</li>
                    <li>Education and Outreach</li>
                </ul>
            </div>
            
            <div class="footer-section-item">
                <div class="footer-section-title">BECOME A PARTNER</div>
                <ul>
                    <li>Refer and Earn</li>
                    <li>Onboarding APIs</li>
                    <li>By Spreeding Rescue Program</li>
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">DEVELOPERS</div>
                <ul>
                    <li>Software developers</li>
                    <li>Docs</li>
                    <li>Integrations</li>
                    <li>API Reference</li>
                </ul>
            </div>
            
            <div class="footer-section-item">
                <div class="footer-section-title">HELP & SUPPORT</div>
                <ul>
                    <li>Support</li>
                    <li>Contact Us</li>
                  
                </ul>
            </div>
            <div class="footer-section-item">
                <div class="footer-section-title">FIND US ONLINE</div>
                    <ul class="social_media-logo-div">
                        <div class="social_media-logo media-logo1"> <a href="https://www.facebook.com/">    <img  src="https://framerusercontent.com/images/YRXitHymasSlS8X9ZIiR2tX2TUw.svg" alt="" >   </a></div>
                        <div class="social_media-logo">             <a href="https://www.instagram.com/">   <img  src="https://framerusercontent.com/images/TP5kqhLBes902Uao1H8nfJOtGE.svg" alt="" >    </a></div>
                        <div class="social_media-logo">             <a href="https://github.com/">          <img  src="https://framerusercontent.com/images/5nwAOxv4z9wxjzIuH4TQLtktCd0.svg" alt="">    </a></div>
                        <div class="social_media-logo">             <a href="https://linkedin.com/">        <img  src="https://framerusercontent.com/images/Btfp3nySlkWunZieqoNHMYnkX8.svg" alt="" >    </a></div>
                    </ul>
            </div>
        </div>
    </div>

    
</div>
<h4 class="Copyright-info">Copyright- © 2023 Stray Animal Lifeline. All rights reserved.
</h4>
        







<script src="scroll.js"></script>



<script src="slider.js"></script>
    </body>
    </html>




   

