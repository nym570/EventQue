<?php
include("router/auth_session.php");
require_once("router/config.php");
$username = $_SESSION['username'];
$role = $_SESSION['role'];
if($role=='mahasiswa'){
    $qr = $pdo->query("SELECT * FROM wishlist RIGHT JOIN event ON wishlist.eventid = event.id AND username = '$username' ORDER BY event.id DESC");
    
}
if($role=='eventMaker'){
    $qr = $pdo->query("SELECT * FROM maker RIGHT JOIN event ON maker.eventid = event.id ORDER BY event.id DESC");
}
if($role=='admin'){
    $qr = $pdo->query("SELECT * FROM event ORDER BY id DESC");
}
$all = $qr->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/event.css">
    <link rel="stylesheet" type="text/css" href="style/style.css">
<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&family=Yeseva+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap');
    </style>
    <title>Event</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="img/logo_stis.png" alt="logo stis">
            <h2> <a href="index.php">EventQue STIS</a></h2>
        </div>
        <ul>
        <li ><a href="index.php">Home</a></li>
            <li class="active"><a href="event.php">Event</a></li>
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
    <div class="search-con">
        <h1>Temukan Event yang Anda Cari</h1>
         <div class="input-search">
            <input type="text" class="search_input cariLomba" placeholder="Ketikkan nama lomba atau tag terkait..." id = "searchbox" onkeyup="getSearch()">
            <select name="sort" class="search_input sort" id="sort" onchange = "getSearch()" >
                <option value="new">Event Terbaru</option>    
                <option value="deadline">Event Terdekat</option>    
                <option value="hot">Event Popular</option>  
            </select>
        </div>
    </div>
    <div class="container-body">
        <div class="col-body">
            <div class="filter-con">
                <div class="section_title">
                    <h3>Filter By Time</h3>
                </div>
                <div>
                <select name="filter" class="filter" id="kategori" onchange = "getSearch()" >
                <option value="all">All</option>    
                <option value="open">Open</option>    
                <option value="closed">Closed</option>  
            </select>
                </div>
                
                
            </div>
            <div class="hasil-con">
                <div class="con-judul">
                <h1>Hasil Pencarian</h1> 
                <?php if ($role!='mahasiswa') :?>
                <a href="createEvent.php" class="btn-make">+ Make Event</a>
                <?php endif ?>  
                </div>
                
                <section class="services" id="services">
                    
                    <?php foreach($all as $event) :?>
                        
                    <div class="service">
                        <div class="poster"><img src = "img/poster/<?php echo $event["poster"];?>" alt="poster lomba"></div>
                        <h4><?php echo $event["nama"];?></h4>
                        <p><?php echo $event["deskripsi"];?></p>
                        
                        <div class="desc">
                            <img src ="img/logo_regist.png">
                            <div class="keterangan"><?php echo date('d F Y', strtotime($event["tutup"]));?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_price.png">
                            <div class="keterangan"><?php echo $event["price"];?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_date.png">
                            <div class="keterangan"><?php echo date('d F Y', strtotime($event["tglmulai"]));?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_participant.png">
                            <div class="keterangan"><?php echo $event["participant"];?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_tag.png">
                            <div class="keterangan"><?php echo $event["tag"];?></div>
                        </div>
                        <button class="btn-info" id='info' onclick="readMore(<?php echo $event['id'] ?>)">Read More >>></button>

                    
                    	 <?php
                            $qy = $pdo->query("SELECT CURDATE() as date_now");
                            $dataNow = $qy->fetch();
                            $interval = strtotime($event['tutup']) - strtotime($dataNow['date_now']);
                            $interval = $interval/86400;
                            
                        ?>
                        
                        <?php if($role=='mahasiswa'&&$event['username']!=$username&&$interval>=0) :?>
                            <a href="action/wish.php?id=<?php echo $event['id'];?>&username=<?php echo $username;?>"><button class="btn-wish">+ Wishlist</button></a>
                        <?php endif ?>
                        <?php if($role=='eventMaker'&&$event['username']==$username) :?>
                            <a href="editEvent.php?id=<?php echo $event['id'];?>"><button class="btn-wish">Edit</button></a>
                            <a href="action/hapusevent.php?id=<?php echo $event['id'];?>"><button class="btn-delete">Hapus</button></a>
                        <?php endif ?>
                      
                        <?php if($role=='admin') :?>
                            <a href="editEvent.php?id=<?php echo $event['id'];?>"><button class="btn-wish">Edit</button></a>
                            <a href="action/hapusevent.php?id=<?php echo $event['id'];?>"><button class="btn-delete">Hapus</button></a>
                        <?php endif ?>
                        <?php if($interval>=0) : ?>
                        <p class ="reminder"> <?php echo $interval;?> Hari sebelum pendaftaran ditutup</p>
                        <?php endif; if($interval<0) :?>
                        <p class ="tutup"> Pendaftaran telah ditutup</p>
                        <?php endif?>
                    </div>
                    
                    <?php endforeach; ?>
                     
                </section>
                <div id="myModal" class="modal">

  <div class="modal-content">
    <div class="modal-header">
      <span class="close">&times;</span>
      <h2>Deskripsi Kegiatan</h2>
    </div>
    <div class="modal-body" id="modal-body">
    </div>
    <div class="modal-footer">
        <h2>EventQue STIS</h2>
    </div>
  </div>

</div>
            </div>
              
        </div>
        
        
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
            <p>copyright &copy;2022  <a href="https://www.linkedin.com/in/laili-fatqulia-36b577136/">Laili Fatqulia Rahma</a>  </p>
            <div class="footer-menu">
                <ul class="f-menu">
                <li ><a href="index.php">Home</a></li>
            <li class="active"><a href="event.php">Event</a></li>
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
    <script src='eventcon.js'></script>
</body>
</html>