<?php
   include("router/auth_session.php");
   require_once("router/config.php");
    try {
        $id= $_GET['id'];
        $qr = "SELECT * FROM event WHERE id = ?";
        $stmt=$pdo->prepare($qr);
        $stmt->execute(array($id));
        $myevent = $stmt->fetch();
        $pdo = NULL;
    }
    catch (PDOException $e) {
        exit("PDO Error: ".$e->getMessage()."<br>");
    }
?>
<h2><?php echo $myevent['nama'] ?></h2>
<div class="isi">
    <div class="image-modal" ><img src = "img/poster/<?php echo $myevent["poster"];?>" alt="poster lomba" ></div>
    <div class="mydesc">
        <div class="desc">
            <img src ="img/logo_regist.png" alt="registrasi">
            <div class="keterangan"><?php echo date('d F Y', strtotime($myevent["tutup"]));?></div>
        </div>
                            <div class="desc">
                                <img src ="img/logo_price.png" alt="harga">
                                <div class="keterangan"><?php echo $myevent["price"];?></div>
                            </div>
                            <div class="desc">
                                <img src ="img/logo_date.png" alt="mulai">
                                <div class="keterangan"><?php echo date('d F Y', strtotime($myevent["tglmulai"]));?></div>
                            </div>
                            <div class="desc">
                                <img src ="img/logo_participant.png" alt="participant">
                                <div class="keterangan"><?php echo $myevent["participant"];?></div>
                            </div>
                            <div class="desc">
                                <img src ="img/logo_tag.png" alt="tag">
                                <div class="keterangan"><?php echo $myevent["tag"];?></div>
                            </div>
    </div>
    <div class="mycapt">
            <p>Caption </p>
            <pre class="capt"><?php echo $myevent["caption"]?></pre>
    </div>
</div>
