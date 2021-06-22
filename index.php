<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
 
    
  </head>
  <body>
    <?php
    include("baglan.php");
      if(isset($_POST["kaydet"]))
      {
          $sozlesme_kabul=(isset($_POST['sozlesme_kabul']))?1:0;
          $sql = "INSERT INTO `kisisel_bilgiler` 
          (`id`, `ad`, `soyad`, `numara`, `eposta`, `cinsiyet`, `sehir`, `sozlesme_kabul`) 
          VALUES 
          (NULL, '".$_POST['ad']."', '".$_POST['soyad']."', '".$_POST['numara']."', '".$_POST['eposta']."', 
          '".$_POST['cinsiyet']."', '".$_POST['sehir']."', '".$sozlesme_kabul."')";
          
          $baglanti->query($sql);
      }
      else if(isset($_POST["guncelle"]))
      {
          $sozlesme_kabul=(isset($_POST['sozlesme_kabul']))?1:0;
          $sorgu="UPDATE `kisisel_bilgiler` SET `ad` = '".$_POST['ad']."',`soyad` = '".$_POST['soyad']."', `numara` = '".$_POST['numara']."', `eposta` = '".$_POST['eposta']."', `cinsiyet` = '".$_POST['cinsiyet']."', `sehir` = '".$_POST['sehir']."', `sozlesme_kabul` = '".$sozlesme_kabul."' 
          WHERE `kisisel_bilgiler`.`id` = ".$_POST['kayit_no'].";";
          
          $baglanti->query($sorgu);
      }
      
      else if(isset($_POST["sil"]))
      {
        $sorgu="DELETE FROM `kisisel_bilgiler` WHERE `kisisel_bilgiler`.`id` = ".$_POST['kayit_no'];
        $baglanti->query($sorgu);
        
      }

      else if(isset($_POST["duzenle"]))
      {
        $sorgu="SELECT * FROM `kisisel_bilgiler` WHERE `id` = ".$_POST['kayit_no'];
        $sonuc=$baglanti->query($sorgu);
        $kayit=$sonuc->fetch_assoc();
        
      }
    ?>
     
    <h1 style="text-align:center;">PHP Basit CRUD Örneği</h1>
   
    <div class='container'>
        <div class="row">
        
            <div class="col-md-12">
              <?php
                if(!isset($_POST["duzenle"]))
                {
              ?>
                <form action="" method="POST">
                    <div class="row mb-3">
                      <label for="ad" class="col-sm-2 col-form-label">Ad</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" name="ad">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="soyad" class="col-sm-2 col-form-label">Soyad</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" name="soyad">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="numara" class="col-sm-2 col-form-label">Numara</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" name="numara">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label">E-Posta</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" name="eposta">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="cinsiyet">
                                Cinsiyet
                            </label>
                            <div class="col-sm-10">
                                
                                <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet" value="kadin">
                                <label class="form-check-label" for="gridRadios1">
                                     Kadın
                                </label>
                                  
                                
                                <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet" value="erkek">
                                <label class="form-check-label" for="gridRadios2">
                                    Erkek
                                </label>
                                                             
                            </div>
                        </div> 
                    </div> 

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label">Şehir</label>
                        <div class="col-sm-10">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sehir">
                                <option value="istanbul">İstanbul</option>
                                <option value="Balıkesir">Balıkesir</option>
                                <option value="Bursa">Bursa</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label">Sözleşme Kabul</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="on" id="flexCheckChecked" checked name="sozlesme_kabul">
                                <label class="form-check-label" for="flexCheckChecked">
                                  Kabul Ediyorum
                                </label>
                              </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary" name="kaydet" value="kaydet">kaydet</button>

                            <button type="reset" class="btn btn-danger" name="temizle" value="temizle">temizle</button>
                        </div>
                    </div>
                </form>
              <?php
                }
                else
                {
                  ?>
                  <form action="" method="POST">
                    <div class="row mb-3">
                      <label for="ad" class="col-sm-2 col-form-label">Ad</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputEmail3" name="ad" value="<?=$kayit["ad"]?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                        <label for="soyad" class="col-sm-2 col-form-label">Soyad</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" name="soyad" value="<?=$kayit["soyad"]?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="numara" class="col-sm-2 col-form-label">Numara</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="inputEmail3" name="numara" value="<?=$kayit["numara"]?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label">E-Posta</label>
                        <div class="col-sm-10">
                          <input type="email" class="form-control" id="inputEmail3" name="eposta" value="<?=$kayit["eposta"]?>">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label" for="cinsiyet" >
                                Cinsiyet
                            </label>
                            <div class="col-sm-10">
                                
                                <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet" value="kadin" 
                                <?=($kayit["cinsiyet"]=="kadin")?"checked":""?>
                                >
                                <label class="form-check-label" for="gridRadios1">
                                     Kadın
                                </label>
                                  
                                
                                <input class="form-check-input" type="radio" name="cinsiyet" id="cinsiyet" value="erkek" 
                                <?=($kayit["cinsiyet"]=="erkek")?"checked":""?>
                                >
                                <label class="form-check-label" for="gridRadios2">
                                    Erkek
                                </label>
                                                             
                            </div>
                        </div> 
                    </div> 

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label">Şehir</label>
                        <div class="col-sm-10">
                            <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="sehir">
                                <option value="istanbul" <?=($kayit["sehir"]=="İstanbul")?"selected":""?>>İstanbul</option>
                                <option value="Balıkesir" <?=($kayit["sehir"]=="Balıkesir")?"selected":""?>>Balıkesir</option>
                                <option value="Bursa" <?=($kayit["sehir"]=="Bursa")?"selected":""?>>Bursa</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label">Sözleşme Kabul</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="sozlesme_kabul"
                                <?=($kayit["sozlesme_kabul"])?"checked":""?>
                                >
                                <label class="form-check-label" for="flexCheckChecked">
                                  Kabul Ediyorum
                                </label>
                              </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="eposta" class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                            <input type="hidden" name="kayit_no" value="<?=$kayit["id"]?>">
                            <button type="update" class="btn btn-warning" name="guncelle" value="guncelle">Güncelle</button>

                            <button type="reset" class="btn btn-danger" name="temizle" value="temizle">temizle</button>
                        </div>
                    </div>
                </form>
                
                <?php
                }
              ?>
            </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <table class="table table-striped table-hover">
                <thead>
                  <tr>
                  <th scope="col">#</th>
                    <th scope="col">ad</th>
                    <th scope="col">soyad</th>
                    <th scope="col">numara</th>
                    <th scope="col">eposta</th>
                    <th scope="col">cinsiyet</th>
                    <th scope="col">Şehir</th>
                    <th scope="col">Sözleşme durumu</th>
                    <th scope="col">İşlem</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                    $sorgu="SELECT * FROM `kisisel_bilgiler`";
                    $sonuc=$baglanti->query($sorgu);
                    $i=0;
                    while($kayit=$sonuc->fetch_assoc())
                    {
                        $i++;
                  ?>
                    <tr>
                      <th scope="row"><?=$i?></th>
                      <td><?=$kayit["ad"]?></td>
                      <td><?=$kayit["soyad"]?></td>
                      <td><?=$kayit["numara"]?></td>
                      <td><?=$kayit["eposta"]?></td>
                      <td><?=$kayit["cinsiyet"]?></td>
                      <td><?=$kayit["sehir"]?></td>
                      <td><?=($kayit["sozlesme_kabul"])?"kabul":"red"?></td>
                      <td>
                        <form action="" method="post">
                          <input type="hidden" name="kayit_no" value="<?=$kayit["id"]?>">
                          <button type="update" class="btn btn-success" name="duzenle" value="duzenle">düzenle</button>
                          <button type="submit" class="btn btn-danger" name="sil" value="sil">sil</button>
                         
                        </form>
                      </td>
                      
                      <?php
                        }         
                      ?>
                    </tr>
                </tbody>
            </table>
          </div>
        </div>
    </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>