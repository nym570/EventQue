<?php
    include("router/auth_session.php");
    require_once("router/config.php");
    $eventid = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM event WHERE id=?");
    $stmt->execute(array($eventid));
    $event = $stmt->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/regist.css">
<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&family=Yeseva+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap');
    </style>
    <title>Edit Event</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="img/logo_stis.png" alt="logo stis">
            <h2> <a href="index.php">EventQue STIS</a></h2>
        </div>
    </nav>
    <div class="container-body">
      <h1>Edit Event</h1>
        <div class="container">
          <div class="registrasi_content">
            <form action="" class="registrasi_form" id="registarsi_form" method="post" enctype="multipart/form-data">
                <div>
                    <label>Nama Acara</label>
                    <input type="text" class="registrasi_input" placeholder="Hology 2020" name = "nama" value="<?php echo $event['nama'] ?>" required="required">
                    <p id="namealert"></p>
                </div>
                <div>
                    <label>Penyelenggara</label>
                    <input type="text" class="registrasi_input" placeholder="Filkom Universitas Brawijaya" name = "penyelenggara" value="<?php echo $event['penyelenggara'] ?>" required="required">
                    <p id="penyelenggaraalert"></p>
                </div>
                <div>
                    <label>Kategori</label>
                    <select name="kategori" class="registrasi_input">
                        <option value="lomba"<?php if($event['kategori']=='lomba') echo 'selected'?>>Perlombaan</option>
                        <option value="kepanitiaan"<?php if($event['kategori']=='kepanitiaan') echo 'selected'?>>Kepanitiaan/Organisasi</option>
                        <option value="seminar"<?php if($event['kategori']=='seminar') echo 'selected'?>>Seminar/Workshop</option>
                        <option value="lainnya"<?php if($event['kategori']=='lainnya') echo 'selected'?>>Lainnya</option>
                    </select>
                </div>
                <div>
                    <label>Deskripsi Singkat</label>
                    <input type="text" class="registrasi_input" placeholder="deskripsi singkat (max 250 huruf)" name = "desc" value="<?php echo $event['deskripsi'] ?>" required="required">
                    <p id="descalert"></p>
                </div>
                <div>
                    <label>Caption</label>
                    <textarea class="registrasi_input" placeholder="caption lengkap (max 3000 huruf)" name = "caption" required="required"><?php echo $event['caption'] ?></textarea>
                    <p id="captalert"></p>
                </div>
                <div>
                    <label>Tanggal Mulai Acara</label>
                    <input type="date" class="registrasi_input"  name = "mulai" value="<?php echo $event['tglmulai'] ?>" onfocus="this.min=new Date().toISOString().split('T')[0]">
                </div>
                <div>
                    <label>Tanggal Berakhir Acara</label>
                    <input type="date" class="registrasi_input"  name = "akhir" value="<?php echo $event['tglselesai'] ?>" onfocus="this.min=new Date().toISOString().split('T')[0]">
                    <p id="akhiralert"></p>
                </div>
                <div>
                    <label>Participant</label>
                    <select name="participant" class="registrasi_input">
                        <option value="individu" <?php if($event['participant']=='individu') echo 'selected'?>>Individu</option>
                        <option value="team" <?php if($event['participant']=='team') echo 'selected'?>>Team</option>
                        <option value="bebas" <?php if($event['participant']=='bebas') echo 'selected'?> >Bebas</option>
                    </select>
                </div>
                <div>
                    <label>Price</label>
                    <select name="price" class="registrasi_input">
                        <option value="gratis"<?php if($event['price']=='gratis') echo 'selected'?>>Gratis</option>
                        <option value="berbayar"<?php if($event['price']=='berbaris') echo 'selected'?>>Berbayar</option>
                    </select>
                </div>
                <div>
                    <label>Tag</label>
                    <input type="text" class="registrasi_input" placeholder="tag1, tag2, tag3, ..." name = "tag" required="required" value="<?php echo $event['tag'] ?>">
                    <p id="tagalert"></p>
                </div>
                <div>
                    <label>Poster Acara</label>
                    <input type="file" class="registrasi_input"  id="img" name="img" accept="image/*">
                    <span>Poster lama : <?php echo $event['poster']?></span>
                </div>
                <div>
                    <label>Penutupan Pendaftaran</label>
                    <input type="date" class="registrasi_input"  name = "tutup" value="<?php echo $event['tutup'] ?>" onfocus="this.min=new Date().toISOString().split('T')[0]">
                    <p id="tutupalert"></p>
                </div>
                
                <input type="submit" name="submit" value="Confirm" class="registrasi_button">
                <input type="button" value="Batal" onclick= "location.href='event.php';" class="batal_button"></input>
            </form>
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
            <p>copyright &copy;2022 <a href="https://www.linkedin.com/in/laili-fatqulia-36b577136/">Laili Fatqulia Rahma</a>  </p>
        </div>
    </footer>
</body>
</html>
<?php 
try{
    require_once("router/config.php");
    if(isset($_POST['submit'])){
        $filename = $_FILES["img"]["name"];
       $name = $_POST['nama'];
       $penyelenggara = $_POST['penyelenggara'];
       $kategori = $_POST['kategori'];
       $desc = $_POST['desc'];
       $caption = $_POST['caption'];
       $mulai = $_POST['mulai'];
       $akhir = $_POST['akhir'];
       $participant = $_POST['participant'];
       $price = $_POST['price'];
       $tag = $_POST['tag'];
       $tutup = $_POST['tutup'];
       $isValid = true;
       
       if(strlen($name)>150){
        $isValid = false;
        echo "<script type ='text/JavaScript'>  
                    var tag = document.getElementById('namealert');
                    var text = document.createTextNode('Nama acara maksimal 150 karakter');
                    tag.appendChild(text);
                    document.getElementById('namealert').style.color = 'red';</script>"; 
        }
        if(strlen($penyelenggara)>150){
            $isValid = false;
            echo "<script type ='text/JavaScript'>  
                        var tag = document.getElementById('penyelenggaraalert');
                        var text = document.createTextNode('penyelenggara acara maksimal 150 karakter');
                        tag.appendChild(text);
                        document.getElementById('penyelenggaraalert').style.color = 'red';</script>"; 
            }
       if(strlen($desc)>250){
        $isValid = false;
        echo "<script type ='text/JavaScript'>  
                    var tag = document.getElementById('descalert');
                    var text = document.createTextNode('deskripsi singkat maksimal 250 character');
                    tag.appendChild(text);
                    document.getElementById('descalert').style.color = 'red';</script>"; 
        }
        if(strlen($caption)>3000){
            $isValid = false;
            echo "<script type ='text/JavaScript'>  
                        var tag = document.getElementById('captalert');
                        var text = document.createTextNode('caption maksimal 3000 character');
                        tag.appendChild(text);
                        document.getElementById('captalert').style.color = 'red';</script>"; 
            }
        if($akhir<$mulai){
            $isValid = false;
            echo "<script type ='text/JavaScript'>  
                        var tag = document.getElementById('akhiralert');
                        var text = document.createTextNode('tanggal berkahir event harus sama atau lebih dari tanggal mulai');
                        tag.appendChild(text);
                        document.getElementById('akhiralert').style.color = 'red';</script>"; 
            
        }
       if(strlen($tag)>100){
         $isValid = false;
         echo "<script type ='text/JavaScript'>  
                     var tag = document.getElementById('tagalert');
                     var text = document.createTextNode('maksimal karakter adalah 100');
                     tag.appendChild(text);
                     document.getElementById('tagalert').style.color = 'red';</script>"; 
       }
       if($mulai<$tutup){
        $isValid = false;
        echo "<script type ='text/JavaScript'>  
                    var tag = document.getElementById('tutupalert');
                    var text = document.createTextNode('tanggal penutupan pendaftaran harus sebelum dimulainya acara');
                    tag.appendChild(text);
                    document.getElementById('tutupalert').style.color = 'red';</script>"; 
        
    }
       if($isValid){
        
        $stmt = $pdo->prepare("UPDATE event SET nama=? , penyelenggara=?, kategori=?, deskripsi=?, caption=?, tglmulai=?,tglselesai=?,participant=?,price=?,tag=?,tutup=? WHERE id=?");
        
        $stmt->execute(array($name,$penyelenggara,$kategori,$desc,$caption,$mulai,$akhir,$participant,$price,$tag,$tutup,$eventid));
        if($filename != ""){
            $tempname = $_FILES["img"]["tmp_name"];   
            $folder = "img/poster/".$filename;
            move_uploaded_file($tempname, $folder);
            $stmt = $pdo->prepare("UPDATE event SET poster=? WHERE id=?");
            $stmt->execute(array($filename,$eventid));
        $poster_img = $event['poster'];
        unlink("img/poster/$poster_img");
        }
        $pdo = NULL;
        echo "<script>alert('event berhasil diedit');window.location.href = 'akun.php';</script>";
       }
      
    }
}
catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}

?>