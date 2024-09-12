<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style/style.css">
    <link rel="stylesheet" type="text/css" href="style/login.css">
<link href="img/favicon.ico" rel="shortcut icon" type="image/x-icon" />
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bree+Serif&family=Merriweather&family=Open+Sans:wght@700&family=Pacifico&family=Yeseva+One&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Merriweather:wght@300&display=swap');
    </style>
    <title>Login</title>
</head>
<body>
    <nav>
        <div class="logo">
            <img src="img/logo_stis.png" alt="logo">
            <h2> <a href="index.php">EventQue STIS</a></h2>
        </div>
    </nav>
    <div class="container-body">
        <div class="container" id='container'>
            <form action="" method = "post">
                <div class="row">
                    <h1>Welcome!</h1>
                    <div class="vl">
                        <span class="vl-innertext">or</span>
                    </div>
          
                    <div class="col">
                        <div class="dummy btn"></div>
                        <a href="regist.php" class="guest btn"> Sign Up </a>
                    </div>
          
                    <div class="col">
                    <div class="hide-md-lg">
                        <p>Or sign in </p>
                    </div>
                        <input type="text" name="username" placeholder="Username" required>
                        <input type="password" name="password" placeholder="Password" required>
                        <input type="submit" value="Login">
                    </div>
                
                </div>
            </form>
            <div class="alert" id='alert'>
              <p style="color:red; padding:10px; text-align:center;" id='alert'></p>
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
            if (isset($_REQUEST['username'])) 
                $username = $_REQUEST['username'];
            if (isset($_REQUEST['password'])) 
                $password = $_REQUEST['password'];

            require_once("router/config.php");
           try {
               if(isset($_REQUEST['username']) && isset($_REQUEST['password'])){
                
                $stmt = $pdo->prepare("SELECT * FROM users WHERE username=?");
                $stmt->execute(array($username));
                $row =  $stmt->fetch();
 
                if($row) {

                     if (md5($password)== $row['pass']) {
                         session_start();
                         $_SESSION['username'] = $_POST['username'];
                         $_SESSION['role'] = $row["jenis"];
                         header("Location: index.php");
                     }
                     else{
                        echo "<script type ='text/JavaScript'>  
                        var tag = document.getElementById('alert');
                        var text = document.createTextNode('password salah!');
                        tag.appendChild(text);
                        document.getElementById('alert').style.color = 'red';
                        document.getElementById('alert').style.padding = '10px';
                        document.getElementById('alert').style.textAlign = 'center';</script>"; 
                     }
                } else{
                 echo "<script type ='text/JavaScript'>  
                 var tag = document.getElementById('alert');
                 var text = document.createTextNode('username salah!');
                 tag.appendChild(text);
                 document.getElementById('alert').style.color = 'red';
                 document.getElementById('alert').style.padding = '10px';
                 document.getElementById('alert').style.textAlign = 'center';</script>"; 
                }
                $pdo = NULL;
            } 
               }
               catch (PDOException $e) {
                exit ("PDO Error : ".$e->getMessage()."<br>");
            }
               
?>
