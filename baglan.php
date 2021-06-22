<?php
    $sunucu_adi="localhost";
    $kullanici_adi="root";
    $sifre="";
    $vt="php_crud";

    $baglanti=new mysqli ($sunucu_adi, $kullanici_adi, $sifre, $vt);

    mysqli_set_charset($baglanti,"utf8");

    if($baglanti->connect_error)
    {
        die("baglantı sağlanamadı".$baglanti->connect_error);
    }

?>