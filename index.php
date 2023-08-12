<?php
//server created
session_start();
$request_method = strtoupper($_SERVER['REQUEST_METHOD']);
$msg = " ";

if ($request_method==='POST') {
        //initialising server
        $servername = "localhost";
        $dbname = "reway technologies";
        $username = "root";
        $password = "str0ngpAssw0rd";
        //make connection with sql
        $conn = new mysqli($servername,$username,$password,$dbname);
        echo "<br/>";
        if($conn->connect_error)
         {
            die("CONNECTION FAILED".$conn->connect_error);
         }
        $firstname = $_POST['firstname'];
        $email=$_POST['email'];
        $address=$_POST['address'];
        $message = $_POST['message'];
        $date = date("Y/m/d");
        $msg = "";
        $sql = "INSERT INTO `contactform` ( `Name`, `Email`, `Address`, `Message`, `Date`) VALUES ('$firstname', '$email', '$address', '$message',current_timestamp())";
        if ($conn->query($sql) === TRUE) {
            // place variables to sessions
            $msg =  "Your response has been received!!";
            $_SESSION["msg"] = $msg;
                header('Location: ./index.php' , true, 301);
                exit;
            } else {
                $msg =  "Error: " . $sql . "<br>" . $conn->error;
                $_SESSION["msg"] = $msg;
        }
    $conn->close();
}elseif ($request_method==='GET'){
    if (isset($_SESSION["msg"])) {
        // get the valid state from the session
        $msg = $_SESSION["msg"];
        unset($_SESSION["msg"]);
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-MRCFFG5B');</script>
<!-- End Google Tag Manager -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reway</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="./input.css">
    <link rel="stylesheet" href="./output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11209824567"></script>
    <link rel="icon" type="image/x-icon" href="./assets/">
    <script> window.dataLayer = window.dataLayer || []; function gtag() { dataLayer.push(arguments); } gtag('js', new Date()); gtag('config', 'AW-11209824567'); </script>
    <!-- Event snippet for Page view conversion page -->
    <script> gtag('event', 'conversion', { 'send_to': 'AW-11209824567/7r1ZCOK_lrAYELeyoeEp' }); </script>
    <script async custom-element="amp-analytics" src="https://cdn.ampproject.org/v0/amp-analytics-0.1.js"></script>
    

    <!-- Event snippet for Website lead conversion page In your html page, add the snippet and call gtag_report_conversion when someone clicks on the chosen link or button. -->
    <script> function gtag_report_conversion(url) { var callback = function () { if (typeof(url) != 'undefined') { window.location = url; } }; gtag('event', 'conversion', { 'send_to': 'AW-11209824567/2TqJCL349cAYELeyoeEp', 'event_callback': callback }); return false; } </script>
    
    
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '603276148584573');
    fbq('track', 'PageView');
    </script>

    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=603276148584573&ev=PageView&noscript=1"/>
</noscript>
    <!-- End Meta Pixel Code -->
</head>


<body class="bg-[var(--white)] w-[100%] ">
    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MRCFFG5B"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
    



    <!-- NAVBAR -->

    <nav
        class="relative font--head font-bold p-[10px] m-0 text-[var(--white)] max-h-[70px]  bg-[var(--green)] flex items-center justify-between shadow-[var(--green)] shadow-md">
        <div class="scale-150 mx-4 ">
            <a href="./" onclick=route() class="my-auto text-[1rem] "><img src="assets/logo1.png" class="" alt=""
                    width="80px"></a>
        </div>


        <ul class="flex justify-between items-center gap-10 text-sm nav-menu shadow-[var(--green)]  ">

            <li>
                <a href="#DOWNLOAD" target="_blank"><button>Download the App</button></a>
            </li>

            <li class="list-none  nav-item">
                <a href="#ABOUT" class="nav-link  " style="text-decoration:none;">About Us</a>
            </li>


            <!-- <li class="list-none nav-item ">
                <a href="/team" onclick=route() class="nav-link   " style="text-decoration:none; ">Our
                    Team</a>
            </li> -->

            <li class="list-none nav-item ">
                <a href="/campaigns" onclick="route()" class="nav-link " style="text-decoration:none; ">Campaigns</a>
            </li>

            <li class="list-none nav-item ">
                <a href="#CONTACT" class="nav-link h " style="text-decoration:none; ">Contact
                    Us</a>
            </li>
            <!-- <li class="list-none nav-item ">
                <a href="https://forms.gle/dZyHcSAuZ1Xy3dDt5"
                    class="nav-link h text-[#FF3E00] opacity-90" style="text-decoration:none; ">Schedule a Pickup</a>
            </li> -->


        </ul>
        <div class="hamburger">
            <span class="bar">
            </span>
            <span class="bar">
            </span>
            <span class="bar">
            </span>

        </div>
    </nav>
    <!-- first section  -->


    <section class="text-[var(--white)] overflow-x-hidden w-[100%]  ">

        <div class="swiper-container h ">
            <div class="swiper-wrapper ">
                <div class="absolute swiper-slide    mx-auto">
                    <div
                        class="relative my-auto  h-0 px-10 top-16 sm:top-20 md:top-48 lg:top-60 lg:left-20 opacity-100 ">
                        <h1 class=" sm:text-6xl text-[var(--green)] flex items-start font-bold  text-4xl  ">
                            E-waste recycling
                        </h1>
                        <div class="font-bold  text-3xl mt-4">
                            The Key to Circular Economy
                        </div>
                    </div>
                    <!-- <div class="bg-black  absolute z-[-1] border-2 border-black  h-full max-w-full  "> -->
                    <div class="bg-black h-[600px]  z-[-10] ">
                        <img src="./assets/section1/img1.png" alt="" class="object-cover w-full opacity-[0.33] h-full">



                    </div>


                </div>
                <div class="absolute swiper-slide    mx-auto">
                    <div
                        class="relative my-auto  h-0 px-10 top-16 sm:top-20 md:top-48 lg:top-60 lg:left-20 opacity-100 ">
                        <h1 class=" sm:text-6xl text-[var(--green)] flex items-start font-bold  text-4xl  ">
                            We are the
                        </h1>
                        <div class="font-bold  text-3xl mt-4">
                            largest and most extensive eWaste collection network in <span
                                class="text-[#FF3E00]">Bharat.</span>
                        </div>
                    </div>
                    <!-- <div class="bg-black  absolute z-[-1] border-2 border-black  h-full max-w-full  "> -->
                    <div class="bg-black   z-[-10] h-[600px]">
                        <img src="./assets/section1/img3.png" alt="" class="object-cover w-full opacity-[0.33] h-full">



                    </div>


                </div>
                <div class="absolute swiper-slide    mx-auto">
                    <div
                        class="relative my-auto  h-0 px-10 top-16 sm:top-20 md:top-48 lg:top-60 lg:left-16 opacity-100 ">
                        <h1 class=" sm:text-6xl text-[var(--green)] flex items-start font-bold  text-4xl  ">
                            Did You Know?
                        </h1>
                        <div class="font-bold  text-3xl mt-4">
                            87% carbon footprint can be reduced by E waste recycling, compared to virgin mining.
                        </div>
                    </div>
                    <!-- <div class="bg-black  absolute z-[-1] border-2 border-black  h-full max-w-full  "> -->
                    <div class="bg-black   z-[-10] h-[600px]">
                        <img src="./assets/section1/img2.png" alt="" class="object-cover w-full opacity-[0.33] h-full">



                    </div>


                </div>


            </div>
    </section>
    <!-- second section -->
    <!-- <section class="">
        <h1 class=" sm:text-6xl text-[var(--green)] flex items-center justify-center font-bold  text-4xl mt-4 ">
            Who are <span class="pl-2 text-[var(--green-sec)]"> We?</span>
        </h1>
    </section> -->
    <!-- <img src="./assets//wave.svg" alt=""> -->



    <section class="pb-10  md:px-4 md:mb-0  pt-12 bg-[var(--green)]  " id="ABOUT" style="">
        <h1
            class=" sm:text-6xl md:mb-2  flex items-center text-[var(--white)] justify-center font-bold text-center text-6xl bg ">
            About Us
        </h1>

        <div class="  mx-auto grid  md:grid-cols-2  ">
            <div class="  ">
                <div class="mx-auto flex items-center justify-center">
                    <img src=" ./assets/img1.png" alt="" class="flex items-center justify-center">
                </div>
            </div>
            <div
                class=" bg-[var(--green)]  rounded-md   px-4 flex flex-col mb-5  lg:w-[75%]  w-full mx-auto md:mt-4 text-[var(--white)] ">
                <h3 class="text-[var(--white)] text-2xl mx-auto mb-5 italic">
                    Who Are We?
                </h3>
                <div class="nchild">
                    <span class="font-semibold imp"> Are you tired of struggling with the disposal of
                        electronic
                        waste generated by your organization?</span>
                    Reway is here to help you efficiently manage your electronic waste through a sustainable take back
                    system.
                </div>
                <div class="nchild">
                    <span class="imp"> With us, you can easily schedule </span>
                    pickups for your bulk electronic waste and rest assured that it
                    will be disposed of in an environmentally friendly way.
                </div>
                <div class="nchild">
                    <span class="imp">Reway's team of experts will work with you</span> to ensure that your electronic
                    waste is processed in
                    compliance with all applicable regulations, including data security, recycling, and hazardous waste
                    management.

                </div>

                <div class="nchild ">
                    <span class="imp"> Join the ranks of multinational companies and organizations</span> that have
                    already made the switch to
                    Reway for their electronic waste management needs.
                </div>

                <a href="#CONTACT hover::text-[var(--green)]" id="diff">
                    <div
                        class="bg-[var(--green-sec)] opacity-50 rounded-lg p-4  mx-auto text-center text-xl font-bold my-10">
                        Contact us today to learn more and schedule your first pickup!

                    </div>
                </a>
            </div>
        </div>
        </div>

        <div class=" md:w-[75%]  mx-auto w-[90%] p-4  md:p-10 rounded-xl   " id="#DOWNLOAD">
            <h1 class="md:text-4xl text-2xl text-[var(--white)] font-bold text-center mb-10">Download the Reway App
            </h1>
            <div class="md:grid md:grid-cols-2  bg-[var(--white)] p-4 shadow-xl rounded-md ">
                <div class="md:p-8 my-10">
                    <h3 class="md:text-2xl  text-xl font-bold mb-4 text-[var(--green)] ">Reway for <span
                            class="text-[var(--orange)]">Recyclers</span>.</h3>
                    <p class="mb-4">Find More E-Waste Pickpus! Grow your Recycling Business</p>
                    <a href="https://play.google.com/store/apps/details?id=com.rewaytech.rewayrecyclers ">
                        <div
                            class="shadow-2xl shadow-black bg-black text-white w-40 h-12 my-auto justify-center items-center rounded-md p-2 gap-2 flex">
                            <div>
                                <img src="assets/playstore.png" alt="">
                            </div>
                            <div class="flex flex-col -space-y-1">
                                <p class="font-light text-xs">GET IT ON</p>
                                <div class="font-bold">Google Play</div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="md:p-8 my-10">
                    <h3 class="md:text-2xl  text-xl font-bold mb-4 text-[var(--green)] ">Reway for <span
                            class="text-[var(--orange)]">Sellers</span>.</h3>
                    <p class="mb-4">
                        Transform e-waste, sell to trusted recyclers,track impact,earn rewards
                    </p>
                    <div class="">
                        <a class="" href="https://play.google.com/store/apps/details?id=com.rewaytech.rewayusers">
                            <div
                                class="shadow-2xl shadow-black bg-black text-white w-40 h-12 my-auto justify-center items-center rounded-md p-2 gap-2 flex">
                                <div>
                                    <img src="assets/playstore.png" alt="">
                                </div>
                                <div class="flex flex-col -space-y-1">
                                    <p class="font-light text-xs">GET IT ON</p>
                                    <div class="font-bold">Google Play</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="my-8" style="">
        <div class="grid md:grid-cols-2 bg-[var(--white)]">
            <div class="justify-center items-center mx-auto ">
                <div class="text-5xl font-bold text-[var(--green)] items-center mx-auto flex justify-center">
                    Our Mission
                </div>
                <div class=" px-10 my-5 text-[var(--white)]">
                    <div class=" rotate-[+2.5deg]  rounded-lg drop-shadow-xl backdrop-blur-sm">
                        <div
                            class=" bg-[var(--green-sec)] rotate-[-5deg] p-1 my-6 rounded-lg drop-shadow-xl backdrop-blur-sm ">
                            <div class="opacity rotate-[2.5deg] p-2 bg-[var(--green)] shadow-xl rounded-lg  ">
                                At Reway, We are committed to protecting the environment and reducing the negative
                                impact of electronic waste by providing a safe, efficient, and responsible way to
                                dispose of and recycle end-of-life electronics.
                            </div>
                        </div>
                    </div>
                    <div
                        class=" bg-[var(--green-sec)] rotate-[-2.5deg] p-1 my-6 rounded-lg drop-shadow-xl backdrop-blur-sm">
                        <div class="opacity rotate-[2.5deg] p-2 bg-[var(--green)] shadow-xl rounded-lg  ">
                            Our goal is to create a closed-loop system that maximizes the value of electronics while
                            minimizing waste and environmental harm. By partnering with manufacturers, retailers, and
                            other stakeholders, we aim to make a positive impact on the environment and society by
                            promoting a circular economy and sustainable consumption patterns
                        </div>
                    </div>
                    <div
                        class=" bg-[var(--green-sec)] rotate-[-2.5deg] p-1 my-6 rounded-lg drop-shadow-xl backdrop-blur-sm">
                        <div class="opacity rotate-[2.5deg] p-2 bg-[var(--green)] shadow-xl rounded-lg  ">
                            Through our state-of-the-art facilities and experienced team of professionals, we strive to
                            deliver reliable and cost-effective solutions that meet the highest standards of compliance,
                            security, and sustainability. We believe that by working together, we can create a cleaner
                            and healthier future for generations to come.
                        </div>
                    </div>




                </div>
            </div>
            <div class="justify-center items-center mx-auto ">
                <div class="text-5xl font-bold text-[var(--green)] items-center mx-auto flex justify-center">
                    Our Vision
                </div>
                <div class=" px-10 my-5 text-[var(--white)]">
                    <div
                        class=" bg-[var(--green-sec)] rotate-[-2.5deg] p-1 my-6 rounded-lg drop-shadow-xl backdrop-blur-sm">
                        <div class="opacity rotate-[+2.5deg] p-2 bg-[var(--green)] shadow-xl rounded-lg ">
                            At Reway, we envision a future where the negative impact of electronic waste on our planet
                            is minimized through a circular economy approach. Our goal is to ensure that all electronic
                            waste is handled in an ethical and environmentally responsible manner, preventing it from
                            ending up in landfills.
                        </div>
                    </div>

                    <div
                        class=" bg-[var(--green-sec)] rotate-[-2.5deg] p-1 my-6 rounded-lg drop-shadow-xl backdrop-blur-sm">
                        <div class="opacity rotate-[+2.5deg] p-2 bg-[var(--green)] shadow-xl rounded-lg ">
                            In addition to this, we also provide Extended Producer Responsibility (EPR) programs for
                            manufacturers to ensure that they take responsibility for the environmental impact of their
                            products throughout their entire lifecycle. We collaborate with manufacturers to design
                            sustainable products that are easier to recycle, reduce waste and toxicity, and are
                            environmentally friendly.
                        </div>
                    </div>
                    <div
                        class=" bg-[var(--green-sec)] rotate-[-2.5deg] p-1 my-6 rounded-lg drop-shadow-xl backdrop-blur-sm">
                        <div class="opacity rotate-[2.5deg] p-2 bg-[var(--green)] shadow-xl rounded-lg ">
                            We are committed to leading the way in creating a sustainable future for generations to
                            come, and we believe that our innovative approach to electronic waste management and EPR
                            services will help us achieve that vision
                        </div>
                    </div>



                </div>
            </div>
        </div>

    </section>


    <section class="px-10   bg-[var(--white)]  ">
        <div class="main  ">
            <div class=" flex ">
                <h1 class=" sm:text-6xl text-[var(--green)] flex  font-bold text-center text-6xl mt-4 ">
                    Our
                    Process
                </h1>
            </div>
            <div>
                <img src="assets/section2/process.png" alt="">
            </div>
            <div class="container mt-12">
                <ul class="h-96 ">
                    <li class=" ">
                        <h1 class=" font-bold md:text-5xl  text-xl mb-4  text-center text-[var(--white)]">
                            How we benefit <span class="text-[var(--green-sec)]">Consumers!</span>
                        </h1>
                        <div class="md:grid md:grid-flow-col md:grid-cols-2">
                            <div class="mx-auto">

                                <img src="./assets/section2/img1.png" alt="">
                            </div>
                            <div class="lg:flex flex-col justify-center lg:my-auto  ">
                                <div class="  font-semibold text-[var(--white)] flex justify-start my-2 ">
                                    <span class="text-[var(--green-sec)] font-bold">01.</span>
                                    <span class="self-start text-left">
                                        Get
                                        <span class="text-[var(--green-sec)] font-bold">rid of your
                                            electronic
                                            waste</span>
                                        without any
                                        hassle
                                    </span>
                                </div>

                                <div class=" font-semibold text-[var(--white)] flex  my-2">
                                    <span class="text-[var(--green-sec)] font-bold">02.</span>
                                    <span class="self-start text-left">Get
                                        <span class="text-[var(--green-sec)] font-bold"> amazing offers, cashbacks
                                            and discounts</span> on future purchases of your
                                        electronic products.
                                    </span>
                                </div>

                            </div>
                        </div>


                        <span class="circle"></span>
                    </li>
                    <li class="">
                        <h1 class="font-bold md:text-5xl text-3xl  mb-4  text-center text-[var(--white)]">
                            How we benefit <span class="text-[var(--green-sec)]">Producers!</span>
                        </h1>
                        <div class="md:grid md:grid-flow-col md:grid-cols-2">
                            <div>

                                <img src="./assets/section2/img2.png" alt="">
                            </div>
                            <div class="lg:flex flex-col justify-center lg:my-auto ">
                                <!-- <div
                                    class="text-xs -tracking-tight font-semibold text-[var(--white)] flex justify-start my-2 ">
                                    <span class="text-[var(--green-sec)] font-bold">01.</span>
                                    <span class="self-start text-left">

                                        <span class=""> Manufacturers, producers and Importers </span>
                                        are usually held responsible for the handling and disposal of the E waste
                                    </span>
                                </div> -->

                                <div class="  font-semibold text-[var(--white)] flex my-2">
                                    <span class="text-[var(--green-sec)] font-bold">01.</span>
                                    <span class="self-start text-left">
                                        We help them <span class="text-[var(--green-sec)] font-bold">
                                            meet their EPR requirements
                                        </span> and achieve their targets
                                    </span>
                                </div>
                                <div class="  font-semibold text-[var(--white)] flex  my-2">
                                    <span class="text-[var(--green-sec)] font-bold">02.</span>
                                    <span class="self-start text-left">Ensure complete<span
                                            class="text-[var(--green-sec)] font-bold">
                                            end-to-end procedure of logistics management
                                        </span> from collection to
                                        proper disposal of electronic waste.

                                    </span>
                                </div>

                            </div>
                        </div>


                        <span class="circle"></span>
                    </li>
                    <li class=" ">
                        <h1 class="font-bold text-xl md:text-5xl mb-4  text-center text-[var(--white)]">
                            How we benefit <span class="text-[var(--green-sec)]">Recyclers!</span>
                        </h1>
                        <div class="md:grid md:grid-flow-col  md:grid-cols-2">
                            <div class="mx-auto">
                                <img src="./assets/section2/img3.png" alt="">
                            </div>
                            <div class="lg:flex flex-col justify-center  lg:my-auto">
                                <div class="  font-semibold text-[var(--white)] flex justify-start my-2 ">
                                    <span class="text-[var(--green-sec)] font-bold">01.</span>
                                    <span class="self-start text-left">
                                        ReWay provides deeper <span
                                            class="text-[var(--green-sec)] font-bold">penetration into the
                                            market</span> to get more E-waste reach
                                        their recycling facilities.
                                    </span>
                                </div>

                                <div class=" font-semibold text-[var(--white)] flex  my-2">
                                    <span class="text-[var(--green-sec)] font-bold">02.</span>
                                    <span class="self-start text-left">
                                        We aid the recyclers by providing them the <span
                                            class="text-[var(--green-sec)] font-bold">access to optimum quantity of
                                            eWaste</span>
                                        through our extensive collection network.

                                    </span>
                                </div>

                            </div>
                        </div>


                        <span class="circle"></span>
                    </li>

                    <span class="circle"></span>


                </ul>
            </div>
        </div>
    </section>
    <!-- <section class="team mt-10 border-b-2 border-[var(--white)]"> -->
    <!-- <div class=" flex justify-center">
            <h1 class="my-10 sm:text-6xl text-[var(--green)] flex  font-bold text-center text-6xl mt-4 ">
                Our Team
            </h1>
        </div>
        <div class="grid md:grid-cols-2 gap-10 p-10">

            <div
                class="mx-auto  grid sm:grid-flow-col rounded-xl mb-4  opacity-90 bg-[var(--green)] shadow-xl  p-5 gap-5  ">
                <div class="md:max-w-[350px] min-w-[150%] ">
                    <img src="assets/team/divyansh.jpg" alt="" class="w-48 rounded-[50%]">
                </div>
                <div
                    class="md:justify-end md:items-end text-center md:mt-[119%]  font-bold text-2xl text-[var(--white)]">

                    <p class="whitespace-nowrap text-xl">Divyansh Tuli</p>
                    <p class="text-sm mx-auto text-center">CEO & CTO</p>

                    <div class="my-3 flex  justify-around ">
                        <a href="https://twitter.com/tulidivyansh " type="button" target="_blank"
                            class="rounded-full border-2 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter"
                                class="w-3 h-full mx-auto" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                </path>
                            </svg>
                        </a>

                        <a href="https://www.linkedin.com/in/divyansh-tuli25/" type="button" target="_blank"
                            class="rounded-full border-2 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in"
                                class="w-3 h-full mx-auto" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path fill="currentColor"
                                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div
                class="mx-auto  grid sm:grid-flow-col rounded-xl mb-4  opacity-90 bg-[var(--green)] shadow-xl  p-5 gap-5  ">
                <div class="md:max-w-[350px] min-w-[150%] ">
                    <img src="assets/team/lakshya.jpg" alt="" class="w-48 rounded-[50%]">
                </div>
                <div
                    class="md:justify-end md:items-end text-center md:mt-[100%]  font-bold text-2xl text-[var(--white)]">


                    <p class="whitespace-nowrap text-xl">Lakshya Narang</p>
                    <p class="text-sm mx-auto text-center">CMO & COO</p>

                    <div class="my-3 flex  justify-around ">
                        <a href=" https://twitter.com/Lakshyaaa11" type="button" target="_blank"
                            class="rounded-full border-2 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter"
                                class="w-3 h-full mx-auto" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor"
                                    d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                </path>
                            </svg>
                        </a>

                        <a href=" https://www.linkedin.com/in/lakshya-narang-b34aaa22a/" type="button" target="_blank"
                            class="rounded-full border-2 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
                            <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in"
                                class="w-3 h-full mx-auto" role="img" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 448 512">
                                <path fill="currentColor"
                                    d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                </path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div> 




        </div> -->
    <!-- </section> -->
    <section class="md:p-40 my-10 relative ">
        <h1
            class=" sm:text-6xl  flex items-center text-[var(--green)] justify-center font-bold text-center text-6xl ">
            Contact Us
        </h1>
        <form method="post" action="./index.php"  class="md:p-24 flex flex-col gap-9 my-4 md:mx-auto ">

            <div class="flex flex-col px-10  my-2  ">
                <label >Name</label>
                <input  required type="text" class=" rounded-md p-2 border-2" id="fname" name="firstname"
                    placeholder="Your name..">
            </div>

            <div class="flex flex-col px-10 my-2">
                <label >Email</label>
                <input required class="rounded-md p-2 border-2" type="text" req name="email" placeholder="abc@example.com">

            </div>
            <div class="flex flex-col px-10 my-2">
                <label >
                    Address
                </label>

                <select required id="address" name="address" class="rounded-md p-2 border-2">
                    <option value="India">India</option>
                    <option value="canada">Canada</option>
                    <option value="usa">USA</option>
                </select>
            </div>

            <div width="">
                <div class="flex flex-col px-10 my-2">
                    <label >Message</label>
                    <textarea required id="subject" name="message" placeholder="Write something.."
                        class="rounded-md p-2 border-2" style="height:200px"></textarea>
                </div>
            </div>

            <div class="my-6 ">
                <input type="submit" name="submit" value="submit" class="rounded-lg mx-auto flex bg-[var(--green)] p-4"></input>
                
                <p class = "my-10 mx-auto text-xl font-bold text-center ">
                    <?php
                       echo( $msg." ");
                    ?>
                </p>
            </div>
        </form>


      

    </section>
    <footer class="relative w-full z-10 bg-[var(--green)] pt-10 text-[var(--white)]  pb-10  lg:pb-20" id="CONTACT">
        <div class="mx-auto px-4  flex justify-center items-center ">
            <div class="-mx-4 flex flex-wrap justify-center align-middle">
                <div class="w-full  sm:w-2/3 lg:w-3/12">
                    <div class="mb-10 w-full text-center">
                        <a href="#HOME" class="inline-block max-w-[160px]">
                            <img src="./assets/logo1.png" alt="logo" class="max-w-full" />
                        </a>
                        <p class="text-body-color mb-7 text-base font-bold">
                            ReWay Inc. <br>Delhi Technological University
                        </p>
                        <p class="text-dark flex items-center justify-center text-sm font-medium">
                            <span class="text-primary mr-3">
                                <svg width="19" height="21" viewBox="0 0 19 21" class="fill-current">
                                    <path
                                        d="M17.8076 11.8129C17.741 11.0475 17.1088 10.5151 16.3434 10.5151H2.16795C1.40261 10.5151 0.803643 11.0808 0.703816 11.8129L0.00502514 18.8008C-0.0282506 19.2001 0.104853 19.6327 0.371059 19.9322C0.637265 20.2317 1.03657 20.398 1.46916 20.398H17.0755C17.4748 20.398 17.8741 20.2317 18.1736 19.9322C18.4398 19.6327 18.5729 19.2334 18.5396 18.8008L17.8076 11.8129ZM17.2751 19.1668C17.2419 19.2001 17.1753 19.2667 17.0422 19.2667H1.46916C1.36933 19.2667 1.2695 19.2001 1.23623 19.1668C1.20295 19.1336 1.1364 19.067 1.16968 18.9339L1.86847 11.9127C1.86847 11.7463 2.00157 11.6465 2.16795 11.6465H16.3767C16.5431 11.6465 16.6429 11.7463 16.6762 11.9127L17.375 18.9339C17.3417 19.0337 17.3084 19.1336 17.2751 19.1668Z" />
                                    <path
                                        d="M9.25704 13.1106C7.95928 13.1106 6.92773 14.1422 6.92773 15.4399C6.92773 16.7377 7.95928 17.7693 9.25704 17.7693C10.5548 17.7693 11.5863 16.7377 11.5863 15.4399C11.5863 14.1422 10.5548 13.1106 9.25704 13.1106ZM9.25704 16.6046C8.6248 16.6046 8.09239 16.0722 8.09239 15.4399C8.09239 14.8077 8.6248 14.2753 9.25704 14.2753C9.88928 14.2753 10.4217 14.8077 10.4217 15.4399C10.4217 16.0722 9.88928 16.6046 9.25704 16.6046Z" />
                                    <path
                                        d="M0.802807 6.05619C0.869358 7.52032 2.16711 8.11928 2.83263 8.11928H5.16193C5.19521 8.11928 5.19521 8.11928 5.19521 8.11928C6.19348 8.05273 7.19175 7.38722 7.19175 6.05619V5.25757C8.28985 5.25757 10.8188 5.25757 11.9169 5.25757V6.05619C11.9169 7.38722 12.9152 8.05273 13.9135 8.11928H13.9467H16.2428C16.9083 8.11928 18.206 7.52032 18.2726 6.05619C18.2726 5.95636 18.2726 5.59033 18.2726 5.25757C18.2726 4.99136 18.2726 4.75843 18.2726 4.72516C18.2726 4.69188 18.2726 4.6586 18.2726 4.6586C18.1727 3.72688 17.84 2.96154 17.2743 2.36258L17.241 2.3293C16.4091 1.56396 15.4109 1.13138 14.6455 0.865169C12.416 0 9.62088 0 9.48778 0C7.52451 0.0332757 6.26003 0.199654 4.36331 0.865169C3.63125 1.0981 2.63297 1.53068 1.80108 2.29603L1.7678 2.3293C1.20212 2.92827 0.869359 3.69361 0.769531 4.62533C0.769531 4.6586 0.769531 4.69188 0.769531 4.69188C0.769531 4.75843 0.769531 4.95809 0.769531 5.22429C0.802807 5.52377 0.802807 5.92308 0.802807 6.05619ZM2.5997 3.12792C3.26521 2.52896 4.09711 2.16292 4.7959 1.89672C6.52624 1.26448 7.65761 1.13138 9.55433 1.0981C9.68743 1.0981 12.2829 1.13138 14.2795 1.89672C14.9783 2.16292 15.8102 2.49568 16.4757 3.12792C16.8417 3.52723 17.0746 4.05964 17.1412 4.69188C17.1412 4.79171 17.1412 4.95809 17.1412 5.22429C17.1412 5.55705 17.1412 5.92308 17.1412 6.02291C17.1079 6.78825 16.3759 6.95463 16.276 6.95463H13.98C13.6472 6.92135 13.1148 6.78825 13.1148 6.05619V4.69188C13.1148 4.42567 12.9485 4.22602 12.7155 4.12619C12.5159 4.05964 6.69262 4.05964 6.49296 4.12619C6.26003 4.19274 6.09365 4.42567 6.09365 4.69188V6.05619C6.09365 6.78825 5.56124 6.92135 5.22848 6.95463H2.93246C2.83263 6.95463 2.10056 6.78825 2.06729 6.02291C2.06729 5.92308 2.06729 5.55705 2.06729 5.22429C2.06729 4.95809 2.06729 4.82498 2.06729 4.72516C2.00073 4.05964 2.23366 3.52723 2.5997 3.12792Z" />
                                </svg>
                            </span>
                            <span>+91 7290908877</span>
                        </p>
                    </div>
                </div>

                <div class="w-full px-4 sm:w-1/2 lg:w-2/12 text-center">
                    <div class="mb-10 w-full">
                        <h4 class="text-dark mb-3 text-lg font-bold">Quick Links</h4>
                        <ul>
                            <li>
                                <a href="./index.html/#ABOUT"
                                    class="text-body-color hover:text-primary hover:font-bold mb-2 inline-block text-base leading-loose">
                                    About Us
                                </a>
                            </li>
                            <li>
                                <a href="./team"
                                    class="text-body-color hover:text-primary mb-2 hover:font-bold inline-block text-base leading-loose">
                                    Our Team
                                </a>
                            </li>

                            <li>
                                <a href="/campaigns"
                                    class="text-body-color hover:text-primary mb-2 hover:font-bold inline-block text-base leading-loose">
                                    Campaigns
                                </a>
                            </li>
                            <li>
                                <a href="https://docs.google.com/forms/d/10jSEsZ_n06XOSH7ppfcrbOMg1iAV3osNPs74VgEPMIg/edit?usp=drivesdk"
                                    class="text-[#FF9E00] hover:text-primary mb-2 hover:font-bold inline-block text-base leading-loose">
                                    Schedule a Pickup!!
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 text-center content-center lg:w-3/12">
                    <div class="mb-3 w-full mx-auto">
                        <h4 class="text-dark mb-4 text-lg text-center font-bold">Follow Us On</h4>
                        <div class="mb-8 flex items-center content-center justify-center">
                            <a href="https://twitter.com/Reway_ewaste?t=MLcx3T6k0d42_2T6-tnyFw&s=08" type="button"
                                target="_blank"
                                class="rounded-full border-2 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="twitter"
                                    class="w-3 h-full mx-auto" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 512 512">
                                    <path fill="currentColor"
                                        d="M459.37 151.716c.325 4.548.325 9.097.325 13.645 0 138.72-105.583 298.558-298.558 298.558-59.452 0-114.68-17.219-161.137-47.106 8.447.974 16.568 1.299 25.34 1.299 49.055 0 94.213-16.568 130.274-44.832-46.132-.975-84.792-31.188-98.112-72.772 6.498.974 12.995 1.624 19.818 1.624 9.421 0 18.843-1.3 27.614-3.573-48.081-9.747-84.143-51.98-84.143-102.985v-1.299c13.969 7.797 30.214 12.67 47.431 13.319-28.264-18.843-46.781-51.005-46.781-87.391 0-19.492 5.197-37.36 14.294-52.954 51.655 63.675 129.3 105.258 216.365 109.807-1.624-7.797-2.599-15.918-2.599-24.04 0-57.828 46.782-104.934 104.934-104.934 30.213 0 57.502 12.67 76.67 33.137 23.715-4.548 46.456-13.32 66.599-25.34-7.798 24.366-24.366 44.833-46.132 57.827 21.117-2.273 41.584-8.122 60.426-16.243-14.292 20.791-32.161 39.308-52.628 54.253z">
                                    </path>
                                </svg>
                            </a>

                            <a href="https://www.linkedin.com/company/reway-e-waste-management/" type="button"
                                target="_blank"
                                class="rounded-full border-2 text-white leading-normal uppercase hover:bg-black hover:bg-opacity-5 focus:outline-none focus:ring-0 transition duration-150 ease-in-out w-9 h-9 m-1">
                                <svg aria-hidden="true" focusable="false" data-prefix="fab" data-icon="linkedin-in"
                                    class="w-3 h-full mx-auto" role="img" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 448 512">
                                    <path fill="currentColor"
                                        d="M100.28 448H7.4V148.9h92.88zM53.79 108.1C24.09 108.1 0 83.5 0 53.8a53.79 53.79 0 0 1 107.58 0c0 29.7-24.1 54.3-53.79 54.3zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.69 37.7-55.69 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.69-48.3 87.88-48.3 94 0 111.28 61.9 111.28 142.3V448z">
                                    </path>
                                </svg>
                            </a>
                        </div>
                        <p class="text-body-color text-base">&copy; ReWay Inc.</p>
                        <!-- <button
                            class="opacity-40 hover:opacity-100 text-[var(--white)] bg-[var(--green-sec)] px-2 rounded-md mt-4">FILL
                            THE FORM
                            NOW</button> -->
                    </div>
                </div>
                <div class="w-full px-4  sm:w-1/2 lg:w-1/4 mt--2 flex items-center justify-center content-center">
                    <img src="./assets/footer/img1.png" alt="">
                </div>

            </div>
        </div>
        <div>
            <span class="absolute left-0 bottom-0 z-[-1]">
                <svg width="217" height="229" viewBox="0 0 217 229" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M-64 140.5C-64 62.904 -1.096 1.90666e-05 76.5 1.22829e-05C154.096 5.49924e-06 217 62.904 217 140.5C217 218.096 154.096 281 76.5 281C-1.09598 281 -64 218.096 -64 140.5Z"
                        fill="url(#paint0_linear_1179_5)" />
                    <defs>
                        <linearGradient id="paint0_linear_1179_5" x1="76.5" y1="281" x2="76.5" y2="1.22829e-05"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#3056D3" stop-opacity="0.08" />
                            <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </span>
            <span class="absolute top-10 right-10 z-[-1]">
                <svg width="75" height="75" viewBox="0 0 75 75" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M37.5 -1.63918e-06C58.2107 -2.54447e-06 75 16.7893 75 37.5C75 58.2107 58.2107 75 37.5 75C16.7893 75 -7.33885e-07 58.2107 -1.63918e-06 37.5C-2.54447e-06 16.7893 16.7893 -7.33885e-07 37.5 -1.63918e-06Z"
                        fill="url(#paint0_linear_1179_4)" />
                    <defs>
                        <linearGradient id="paint0_linear_1179_4" x1="-1.63917e-06" y1="37.5" x2="75" y2="37.5"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#13C296" stop-opacity="0.31" />
                            <stop offset="1" stop-color="#C4C4C4" stop-opacity="0" />
                        </linearGradient>
                    </defs>
                </svg>
            </span>
        </div>
    </footer>







    <script src="./swiper.js"></script>

    <script src="./script.js"></script>

   

</body>


</html>
<!-- //hover:transition-all  hover:rounded-md hover:border-4 -->




