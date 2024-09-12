<?php
    include("router/auth_session.php");
    require_once("router/config.php");
    $username = $_SESSION['username'];
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
    $stmt->execute(array($username));
    $user = $stmt->fetch();
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
    <title>Edit Akun</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="img/logo_stis.png" alt="logo stis">
            <h2> <a href="index.php">EventQue STIS</a></h2>
        </div>
    </nav>
    <div class="container-body">
      <h1>Edit Akun</h1>
        <div class="container">
          <div class="registrasi_content">
            <form action="" class="registrasi_form" id="registarsi_form" method="post" enctype="multipart/form-data">
            <div>
                  <label>Username</label>
                  <input type="text" name="username" class="registrasi_input" value ="<?php echo $user['username'] ?>" required="required" disabled>
              </div>    
            <div class="row">
                    <div>
                        <label>First Name</label>
                        <input type="text" name="fname" class="registrasi_input" placeholder="John" value ="<?php echo $user['fname'] ?>" required="required">
                        <p id="fnamemalert"></p>
                    </div>
                    <div>
                        <label>Last Name</label>
                        <input type="text" name="lname" class="registrasi_input" placeholder="Doe" value ="<?php echo $user['lname'] ?>" required="required">
                        <p id="lnamemalert"></p>
                    </div>
                </div>
                <div>
                    <label>Tanggal Lahir</label>
                    <input type="date" name="date" class="registrasi_input"  value ="<?php echo $user['tanggal_lahir'] ?>" onfocus="this.max=new Date().toISOString().split('T')[0]">
                    <p id="tanggalalert"></p>
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" class="registrasi_input" placeholder="dummy@gmail.com" value ="<?php echo $user['email'] ?>" required="required">
                </div>
                <div>
                    <label>Phone Number</label>
                    <input type="text" name="contact" class="registrasi_input" placeholder="62895621061193" value ="<?php echo $user['contact'] ?>" required="required">
                    <p id="phonealert"></p>
                </div>
              <div>
                <label>Password</label>
                <input type="password" name="password" class="registrasi_input" placeholder="Password" required="required">
              </div>
              <div>
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="registrasi_input" placeholder="Confirm Password" required="required">
                <p id="confirmalert"></p>
              </div>
              
              
              <div>
                <label>Foto Profil</label>
                <input type="file" class="registrasi_input" id="img" name="img" accept="image/*"> <span>foto profil lama : <?php echo $user['foto']?></span>
              </div>
                <input type="submit" name="submit" value="Confirm" class="registrasi_button">
                <input type="button" value="Batal" onclick= "location.href='akun.php';" class="batal_button"></input>
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
    if(isset($_POST['submit'])){
        $filename = $_FILES["img"]["name"];
       $fname = $_POST['fname'];
       $lname = $_POST['lname'];
       $tanggal = $_POST['date'];
       $contact = $_POST['contact'];
       $password = $_POST['password'];
       $email = $_POST['email'];
       $confirmpassword = $_POST['confirmpassword'];
       $isValid = true;
       if(!preg_match("/^([a-zA-Z' ]+)$/",$fname)){
        $isValid = false;
        echo "<script type ='text/JavaScript'>  
                    var tag = document.getElementById('fnamemalert');
                    var text = document.createTextNode('Nama harus huruf');
                    tag.appendChild(text);
                    document.getElementById('fnamemalert').style.color = 'red';</script>"; 
        }
        if(!preg_match("/^([a-zA-Z' ]+)$/",$lname)){
            $isValid = false;
            echo "<script type ='text/JavaScript'>  
                        var tag = document.getElementById('lnamemalert');
                        var text = document.createTextNode('Nama harus huruf');
                        tag.appendChild(text);
                        document.getElementById('lnamemalert').style.color = 'red';</script>"; 
            }
        $date_now = new DateTime();
        if(!preg_match("/^62[0-9]\d{1,15}/",$contact)){
            if(strlen($contact)!=0){
                $isValid = false;
            echo "<script type ='text/JavaScript'>  
                        var tag = document.getElementById('phonealert');
                        var text = document.createTextNode('nomor hp tidak valid');
                        tag.appendChild(text);
                        document.getElementById('phonealert').style.color = 'red';</script>"; 
            }
            
        }
       if($password != $confirmpassword){
         $isValid = false;
         echo "<script type ='text/JavaScript'>  
                     var tag = document.getElementById('confirmalert');
                     var text = document.createTextNode('Confirm Password tidak match!');
                     tag.appendChild(text);
                     document.getElementById('confirmalert').style.color = 'red';</script>"; 
       }
       
       if($isValid){
        $hash_pass = md5($password);
        
        $stmt = $pdo->prepare("UPDATE users SET pass=? , fname=?, lname=?, tanggal_lahir=?, email=?, contact=? WHERE username=?");
        $stmt->execute(array($hash_pass,$fname,$lname,$tanggal,$email,$contact,$username));
        if($filename != ""){
            $tempname = $_FILES["img"]["tmp_name"];   
            $folder = "img/profil/".$filename;
            move_uploaded_file($tempname, $folder);
            $stmt = $pdo->prepare("UPDATE users SET foto = ? WHERE username=?");
            $stmt->execute(array($filename,$username));
        $foto = $user['foto'];
        	unlink("img/profil/$foto");
        }
        $pdo = NULL;
        echo "<script>alert('akun berhasil diupdate');window.location.href = 'akun.php';</script>";
        
       }
      
    }
}
catch (PDOException $e) {
    exit("PDO Error: ".$e->getMessage()."<br>");
}

?>