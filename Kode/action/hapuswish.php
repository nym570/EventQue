<?php
include("../router/auth_session.php");
   require_once("../router/config.php");
    try {
        $id = $_GET['id'];
        $username = $_GET['username'];
        $state = $pdo->prepare("DELETE FROM wishlist WHERE (username=? AND eventid=?)");
        $state->execute(array($username,$id));
        $qr = $pdo->prepare("UPDATE event SET popular = popular - 1 WHERE id = ?");
        $qr->execute(array($id));
        $pdo = NULL;
        echo "<script>alert('wishlist berhasil diremove');window.location.href = '../akun.php';</script>";
        
            
        
    
    }
    catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>
