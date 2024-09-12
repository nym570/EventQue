<?php
   require_once("../router/config.php");
    try {
        $id = $_GET['id'];
        $username = $_GET['username'];
        $state = $pdo->prepare("INSERT INTO wishlist(username,eventid) VALUES (?,?)");
        $state->execute(array($username,$id));
            $qr = "UPDATE event SET popular = popular + 1 WHERE id =?";
            $stmt=$pdo->prepare($qr);
            $stmt->execute(array($id));
            $pdo = NULL;
            echo "<script>alert('wishlist berhasil ditambah');window.location.href = '../akun.php';</script>";
        
            
        
    
    }
    catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>