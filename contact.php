<?php 
include 'includes/config.php';
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dark.scss">
    <link rel="stylesheet" href="assets/css/animation.css">
    <title>Movie's service</title>
</head>
<body>
    <div class="content">
        <div class="header">
            <p class="header-title">NeoServices</p>
            <div class="header-buttons">
                <a class="header-buttons-btn" href="index">Home</a>
                <a class="header-buttons-btn" href="portfolio">Portfolio</a>
            </div>
        </div>
        <div class="contact-panel">
            <form method="POST">
                <?php 
                    if(isset($_POST['submit'])){
                        $name = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['name']));
                        $email = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['email']));
                        $text = htmlspecialchars(mysqli_real_escape_string($conn, $_POST['text']));
                        $date = date('Y-m-d H:i:s A');
                        $sql = "INSERT INTO contact (name, email, text, timest) VALUES ('".$name."', '".$email."', '".$text."', '".$date."')";
                        $result = mysqli_query($conn, $sql);
                        header("Location: contact");
                        $_SESSION['status'] = "success";
                        exit();
                    }
                ?>
                <p class="contact-panel-title">Contact us here!</p>
                <input type="text" placeholder="what should we call you?" name="name" class="contact-panel-input">
                <input type="email" placeholder="email" name="email" class="contact-panel-input">
                <textarea type="text" placeholder="Tell us about your design. How you want it to look, what type of pictures, maybe if you have a drawing send a URL. Everything that can help us." name="text" class="contact-panel-input contact-textarea"></textarea>
                <button name="submit" type="submit" class="contact-panel-input">Send Ticket</button>
            </form>
        </div>
        
        <p class="footer-text">Made with ❤️ By Movie <br>© 2023 NeoServices, All rights reserved.</p>
    </div>
    </script>
    <script src="https://kit.fontawesome.com/ba23ae2d89.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php 
    if(isset($_SESSION['status']) == "success"){
            ?>
            <script>
                Swal.fire(
                  'Thank you!',
                  'We will be in contact with you shortly!',
                  'success'
                );
            </script>
    <?php 
    unset($_SESSION['status']);
    }
    ?>
</body>
</html>