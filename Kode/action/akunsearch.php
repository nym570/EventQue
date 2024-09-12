<?php
   include("../router/auth_session.php");
   require_once("../router/config.php");
   $username = $_SESSION['username'];
   $role = $_SESSION['role'];
    try {
        $search = $_GET['keyword'];
        $str = $_GET['sort'];
        $kat = $_GET['kategori'];
        if($role=='mahasiswa'){
        if($str=='new'){
            $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND wishlist.username = ? ORDER BY event.id DESC");
            
            if($kat=='open'){
                $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE ((nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE())) AND wishlist.username = ?  ORDER BY event.id DESC");
            }
            if($kat=='closed'){
                $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE ((nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE())) AND wishlist.username = ? ORDER BY event.id DESC");
            }
        }
            
        if($str=='hot'){
            $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND wishlist.username = ? ORDER BY popular DESC");
            if($kat=='open'){
                $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND wishlist.username = ? ORDER BY popular DESC");
            }
            if($kat=='closed'){
                $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND wishlist.username = ? ORDER BY popular DESC");
            }
        }
        if($str=='deadline'){
            $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND wishlist.username = ? ORDER BY tutup ASC");
            if($kat=='open'){
                $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND wishlist.username = ? ORDER BY tutup ASC");
            }
            if($kat=='closed'){
                $stmt = $pdo->prepare("SELECT * FROM wishlist INNER JOIN event ON wishlist.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND wishlist.username = ? ORDER BY tutup ASC");
            }
        }
        }
        if($role=='eventMaker'){
            if($str=='new'){
            $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND maker.username = ? ORDER BY event.id DESC");
            if($kat=='open'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND maker.username = ? ORDER BY event.id DESC");
            }
            if($kat=='closed'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND maker.username = ? ORDER BY event.id DESC");
            }  
        }
            if($str=='hot'){
            $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND maker.username = ? ORDER BY popular DESC") ;
            if($kat=='open'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND maker.username = ? ORDER BY popular DESC");
            }
            if($kat=='closed'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND maker.username = ? ORDER BY popular DESC");
            }
        }
        if($str=='deadline'){
            $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND maker.username = ? ORDER BY tutup ASC");
            if($kat=='open'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND maker.username = ? ORDER BY tutup ASC");
            }
            if($kat=='closed'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND maker.username = ? ORDER BY tutup ASC");
            }
        }
        }
        if($role=='admin'){
            if($str=='new'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND maker.username = ? ORDER BY event.id DESC");
                if($kat=='open'){
                    $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND maker.username = ? ORDER BY event.id DESC");
                }
                if($kat=='closed'){
                    $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND maker.username = ? ORDER BY event.id DESC");
                }  
            }
                if($str=='hot'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND maker.username = ? ORDER BY popular DESC");
                if($kat=='open'){
                    $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND maker.username = ? ORDER BY popular DESC");
                }
                if($kat=='closed'){
                    $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND maker.username = ? ORDER BY popular DESC");
                }
            }
            if($str=='deadline'){
                $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND maker.username = ? ORDER BY tutup ASC");
                if($kat=='open'){
                    $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup >=CURDATE()) AND maker.username = ? ORDER BY tutup ASC");
                }
                if($kat=='closed'){
                    $stmt = $pdo->prepare("SELECT * FROM maker INNER JOIN event ON maker.eventid = event.id WHERE (nama LIKE ? OR tag LIKE ? OR kategori LIKE ? OR price LIKE ? OR participant LIKE ?) AND (tutup < CURDATE()) AND maker.username = ? ORDER BY tutup ASC");
                }
            }
        }
        $stmt->execute(array("%$search%","%$search%","%$search%","%$search%","%$search%",$username));
        $all = $stmt->fetchAll();
        $qy = $pdo->query("SELECT CURDATE() as date_now");
                            $dataNow = $qy->fetch(); 
        $pdo = NULL;
    }
    catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>
<?php foreach($all as $event) :?>
                        <div class="service">
                        <div class="poster"><img src = "img/poster/<?php echo $event["poster"];?>" alt="poster lomba"></div>
                        <h4><?php echo $event["nama"];?></h4>
                        <p><?php echo $event["deskripsi"];?></p>
                        <div class="desc">
                            <img src ="img/logo_regist.png" alt="registrasi">
                            <div class="keterangan"><?php echo date('d F Y', strtotime($event["tutup"]));?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_price.png" alt="harga">
                            <div class="keterangan"><?php echo $event["price"];?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_date.png" alt="mulai">
                            <div class="keterangan"><?php echo date('d F Y', strtotime($event["tglmulai"]));?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_participant.png" alt="participant">
                            <div class="keterangan"><?php echo $event["participant"];?></div>
                        </div>
                        <div class="desc">
                            <img src ="img/logo_tag.png" alt="tag">
                            <div class="keterangan"><?php echo $event["tag"];?></div>
                        </div>
                        
                        <?php if($role=='mahasiswa') :?>
                        <a href="action/hapuswish.php?id=<?php echo $event['id'];?>&username=<?php echo $username;?>"><button class="btn-delete">Remove</button></a>
                            <?php endif ?>
                            <?php if($role!='mahasiswa') :?>
                        <a href="editEvent.php?id=<?php echo $event['id'];?>"><button class="btn-wish">Edit</button></a>
                        <a href="action/hapusevent.php?id=<?php echo $event['id'];?>"><button class="btn-delete">Hapus</button></a>
                            <?php endif ?>

                            <button class="btn-info" id='info' onclick="readMore(<?php echo $event['id'] ?>)">Read More >>></button>
                            <?php
                            
                            $interval = strtotime($event['tutup']) - strtotime($dataNow['date_now']);
                            $interval = $interval/86400;
                            if($interval>=0) :
                        ?>
                        <p class ="reminder"> <?php echo $interval;?> Hari sebelum pendaftaran ditutup</p>
                        <?php endif; if($interval<0) :?>
                        <p class ="tutup"> Pendaftaran telah ditutup</p>
                        <?php endif?>
                    </div>
                    <?php endforeach; ?>   
                    <script src='eventcon.js'></script>