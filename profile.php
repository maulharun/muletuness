<?php
session_start();

include 'db.php';


$username = $_SESSION['username'] ?? '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php include 'header.php' ?>
    <!--Content 1-->
        <header id="jumbotron-profile">
            <div class="header-jmbtrn-opacity"></div>
            <div class="header-jumbotron" >
                <h4>MuleTunes</h4>
                <h5>#SoundtrackYourLife</h5>
            </div>
        </header>
    <!--End Content 1-->

    <!--About Us-->
    <section id="about-us">
        <div class="container">
        <h1>About Us</h1>
        </div>
        <!--<img src="konten/Jumbotron2.jpg" alt="" style="width: 100%; height: 1200px; justify-content: center; display: flex; margin: auto; position: relative;">-->
    <div class="content2">
        
        <p>MuleTunes, a pioneering brand in the realm of audio excellence, boasts an array of cutting-edge headphones that redefine the auditory experience. With a commitment to innovation and precision, MuleTunes delivers top-tier performance that resonates with audiophiles worldwide.</p>
        <p>At the heart of MuleTunes' success lies its state-of-the-art software platform, catering to over 175 million users. MuleTunes Sync seamlessly integrates with a myriad of devices, offering unparalleled connectivity and control. Meanwhile, MuleTunes Illumine bathes your surroundings in a symphony of customizable RGB lighting, enhancing your immersive audio journey.</p>
        <p>In addition to its stellar hardware and software offerings, MuleTunes extends its reach into the realm of finance, providing tailored payment solutions for the modern era. MulePay revolutionizes the way gamers and tech enthusiasts transact, while MuleFintech empowers emerging markets with innovative financial services.</p>
        <p>Established in 2024, MuleTunes proudly calls Indonesia home, with a global presence spanning 19 offices worldwide. With a dual headquarters in Jakarta and Bandung, MuleTunes is poised to lead the charge in audio innovation, capturing the hearts and minds of discerning listeners across the globe.</p>
    </div>
    </section>
    <!--About Us end-->

    <!--History-->
        <div id="history">
            <h1>History</h1>
            <ul>
                <li>In 2024, MuleTunes continued its legacy of innovation and excellence, cementing its position as a trailblazer in the audio industry. Building on its rich heritage, MuleTunes unveiled a stunning array of groundbreaking products and initiatives that captivated audiences worldwide</li>
                <li>At the prestigious Consumer Electronics Show (CES) 2024, MuleTunes once again stole the spotlight, clinching the Best of CES award for the third consecutive year. This remarkable feat underscored MuleTunes' unwavering commitment to pushing the boundaries of audio technology. Amidst the glitz and glamour of CES, MuleTunes introduced the next generation of its flagship headphones, setting a new standard for immersive sound and unparalleled comfort.</li>
                <li>In a strategic move to enhance its haptic capabilities, MuleTunes announced the acquisition of SensoryScape, a leading software company specializing in haptic solutions. This milestone acquisition paved the way for the development of groundbreaking haptic technologies that would revolutionize the audio landscape</li>
                <li>As part of its ongoing sustainability efforts, MuleTunes launched EcoTune, a groundbreaking initiative aimed at reducing the company's carbon footprint. Through EcoTune, MuleTunes pledged to offset the environmental impact of its products and operations, thereby contributing to a greener, more sustainable future.</li>
                <li>In a nod to its commitment to environmental stewardship, MuleTunes unveiled the world's first eco-friendly headphones, crafted from sustainable materials and designed to minimize environmental impact. These eco-conscious headphones not only delivered exceptional audio performance but also embodied MuleTunes' ethos of sustainability and responsibility.</li>
                <li>At MuleCon 2024 - a virtual extravaganza celebrating innovation and creativity - MuleTunes unveiled a dazzling array of new products and collaborations. From cutting-edge headphones to revolutionary audio accessories, MuleTunes showcased its relentless pursuit of excellence and innovation, captivating audiences around the globe.</li>
                <li>With its unwavering dedication to pushing the boundaries of audio technology and its commitment to sustainability, MuleTunes continued to inspire and delight audiophiles worldwide, solidifying its position as a global leader in the audio industry</li>
            </ul>
        </div>
    <!--History End-->

    <!--Contact-->
    <?php include 'inc_footer.php'?>
</body>
</html>