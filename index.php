<?php
session_start();

include 'db.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="konten/favicon.ico" type="image/x-icon">
    <title>MuleTunes</title>
    <link rel="stylesheet" href="style.css">
</head>
<style>
.responsive-image {
    width: 100%;
    height: auto;
}
</style>
<body>
<?php include 'header.php' ?>
    <!--Content 1-->
        <div id="wrapper">
        <section>
            <img src="konten/JumbotronHeadphone.jpg" alt="Deskripsi Gambar" class="responsive-image">
        </section>
        </div>
    <!--Content 1 End-->

    <!--Content 2--> 
        <div id="wrapper">
            <div class="container-content">
                <img src="konten/headphoneHome2.jpg" alt="gambar1" style="height: auto; width: 600px; margin-left: 50px;">
                    <div class="text">
                        <h1 font-family='astonpoliz'>MuleTunes</h1>
                        <h1>The best choice</h1>
                        <h1>For your daily</h1>
                        <h2>#SoundtrackYourLife</h2>
                        <button class="button"><a href="profile.php">About Us</a></button>
                    </div>
            </div>
        </div> 
    <!--Content 2 End-->

    <!--Content 3-->
    <div id="wrapper">
        <div class="container-content">
            <div class="text">
                <h1>A Comfortable</h1>
                <h1>Headphone</h1>
                <h1>made for U</h1>
                <h2>Give your new grads premium sound they can enjoy anywhere</h2>
                <button class="button" ><a href="product.php">Our Product</a></button>
            </div>
                <img src="konten/Headphone2.png" alt="gambar2" style="height: auto; width: 500px; margin-right: 50px; margin-bottom: 20px;">
        </div>
    </div>   
    <!--Content 3 End-->
<?php include 'inc_footer.php'?>
</body>
</html>