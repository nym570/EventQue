<?php
include("router/auth_session.php");
require_once("router/config.php");
$username = $_SESSION['username'];
$role = $_SESSION['role'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/dashboard.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
	<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&family=Yeseva+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap');
    </style>
    <title>EventQue STIS</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="img/logo_stis.png" alt="logo stis">
            <h2> <a href="index.php">EventQue STIS</a></h2>
        </div>
        <ul>
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="event.php">Event</a></li>
            <?php if($role=='mahasiswa'||$role=='eventMaker'): ?>
            <li><a href="akun.php">Akun</a></li>
            <?php endif ?>
            <?php if($role=='admin'): ?>
            <li><a href="admin.php">Admin</a></li>
            <?php endif ?>
            <li><a href="logout.php">Logout</a></li>

        </ul>
        <div class="menu-toogle">
            <input type="checkbox"/>
            <span></span>
            <span></span>
            <span></span>
            
        </div>
        <script src="script.js"></script>
    </nav>
    <div class="container-body">
        <header class="header">
            <div class="hero">
                <h2 class="heading">EventQue STIS</h2>
                <p class="sub-heading">Info lomba dan Event Politeknik Statistika STIS</p>
            </div>
            <div class="features feature-1">
                <h4 class="new-event">New Event</h4>
                <p class="item">Update event terbaru setiap saat</p>
            </div>
            <div class="features feature-2">
                <h4 class="new-event">Hot Event</h4>
                <p class="item">Cari Event-event Terbaik yang diminati semua</p>
            </div>
        </header>
        <section class="services">
            <div class="service">
                <div class="icon"><img src = "img/logo_lomba.png" alt="logo lomba"></div>
                <h3>Perlombaan</h3>
                <p>
                    Jadilah mahasiswa berprestasi dengan mengikuti lomba-lomba. mengikuti perlombaan dapat meningkatkan jiwa kompetitif serta menguji kemampuan mahasiswa.
                </p>
            </div>
            <div class="service">
                <div class="icon"><img src = "img/logo_org.png" alt="logo organisasi"></div>
                <h3>Panitia & Organisasi</h3>
                <p>
                    Isi waktu luang mahasiswa degan kegiatan yang membangun softskill. mengikuti kepanitiaan dan organisasi dapat meningkatkan jiwa kepemimpinan dan melatih kerjasama.
                </p>
            </div>
            <div class="service">
                <div class="icon"><img src = "img/logo_seminar.png" alt="logo seminar"></div>
                <h3>Seminar & Workshop</h3>
                <p>
                    Jadilah mahasiswa yang berwawasan luas. melalui keikutsertaan dalam seminar & workshop mahasiswa akan memperkaya ilmu.
                </p>
            </div>
            <div class="service">
                <div class="icon"><img src = "img/logo_event.png" alt="logo event"></div>
                <h3>Event</h3>
                <p>
                   memiliki Hobi? atau ingin mencari hal-hal baru? cari event-event menarik lainnya. 
                </p>
            </div>
        </section>
        
    </div>
    <footer>
        <div class="footer-content">
            <h3>EventQue STIS</h3>
            <p>EventQue merupakan platform event mahasiswa STIS. pada platform ini, mahasiswa dengan mudah dapat menemukan informasi terkait open recruitment kepanitiaan, perlombaan, dan event lainnya. Hal ini bertujuan agar mahasiswa dapat berperan aktif dalam kegiata lain diluar perkuliahan. </p>
            <ul class="socials">
                <li><a href="https://www.facebook.com/lailifatqulia"><img src="img/logo_facebook.png" alt="facebook"></a></li>
                <li><a href="https://twitter.com/lailifatqulia"><img src="img/logo_twitter.png" alt ="twitter"></a></li>
                <li><a href="https://www.instagram.com/rflaili/"><img src="img/logo_instagram.png" alt = "instagram"></a></li>
                <li><a href="mailto: laililili45@gmail.com"><img src="img/logo_email.png" alt = "email"></a></li>
            </ul>
        </div>
        <div class="footer-bottom">
            <p>copyright &copy;2022 <a href="https://www.linkedin.com/in/laili-fatqulia-36b577136/">Laili Fatqulia Rahma</a>  </p>
            <div class="footer-menu">
                <ul class="f-menu">
                <li class="active"><a href="index.php">Home</a></li>
            <li><a href="event.php">Event</a></li>
            <?php if($role=='mahasiswa'||$role=='eventMaker'): ?>
            <li><a href="akun.php">Akun</a></li>
            <?php endif ?>
            <?php if($role=='admin'): ?>
            <li><a href="admin.php">Admin</a></li>
            <?php endif ?>
            <li><a href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
        
    </footer>
</body>
</html>