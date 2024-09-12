<?php
include("../router/auth_session.php");
   require_once("../router/config.php");
    try {
        $id = $_GET['id'];
        $stmt = $pdo->prepare("SELECT * FROM event WHERE id=?");
        $stmt->execute(array($id));
        $event = $stmt->fetch();
        $poster_img = $event['poster'];
        unlink("../img/poster/$poster_img");
        $state = $pdo->prepare("DELETE FROM wishlist WHERE (eventid=?)");
        $state->execute(array($id));
        $state = $pdo->prepare("DELETE FROM maker WHERE (eventid=?)");
        $state->execute(array($id));
        $state = $pdo->prepare("DELETE FROM event WHERE (id=?)");
        $state->execute(array($id));
        echo "<script>alert('event berhasil dihapus');window.location.href = '../akun.php';</script>";
        
        $pdo = NULL;
        
            
        
    
    }
    catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>
