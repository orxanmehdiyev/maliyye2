<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php';

?>


<div class="higt spadding"> 

 <div class="container-fluid border ">
  <div class="row ">
    <div class="col-md-12 col-sm-12 col-xs-12 p-1 sag" style="text-align: center;">
      <form action="nedmin/islem.php" method="POST" >
       <button class="btn btn-outline-dark btn-sm  font-weight-bold" name="budce_smeta">B Ü D C Ə &emsp; V Ə S A İ T İ &emsp; Ü Z R Ə &emsp; Y E N İ &emsp; S M E T A &emsp; Ə L A V Ə &emsp; E T</button>
       <button class="btn btn-outline-dark btn-sm  font-weight-bold" name="xususi_smeta">X Ü S U S İ &emsp; V Ə S A İ T  &emsp; Ü Z R Ə &emsp; Y E N İ &emsp; S M E T A &emsp; Ə L A V Ə &emsp; E T</button>
     </form>
   </div>
   <hr>
 </div>
</div>


<div class="container-fluid border mt-1">

 <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="widget-box" style="margin-top: 0;">
    <div class="text-center">
      <h3>Müəsisənin Saxlanılma Xərclərinin Simetaları</h3>      
      <table class="table table-bordered table-hover" style="border">
        <thead>
          <tr>
           <th>№</th>
           <th class="text-lg-left"><a href="">Tərtib olunma tarixi</a></th>
           <th><a href="">Statusu</a></th>
           <th><a href="">Təsdiq Edən</a></th>
           <th><a href="">Mənbəyi</a></th>
           <th>Bax</th>
           <th>Düzəliş</th>
           <th>Sil</th>
           <th>Təsdiqlə</th>
         </tr>

       </thead>
       <?php 
       $smetasor = $db->prepare("SELECT * FROM smeta  order by smeta_id DESC");
       $smetasor->execute();
       while ($smetacek = $smetasor->fetch(PDO::FETCH_ASSOC)) {

         ?>        
         <tbody>
          <tr>
            <td><?php echo $smetacek['smeta_id'] ?></td>
            <td class="text-lg-left"><?php echo $smetacek['smeta_tarix'] ?></td>
            <td><?php 

            if($smetacek['smeta_status']==0){
              echo "Təsdiq Gözləyir";
            }elseif($smetacek['smeta_status']==1){
              echo "Təsdiq olunub";
            }else{
              echo "Mənbəyi bilinmir";
            }
            ?></td>
            <td><?php echo $smetacek['smeta_testiq'] ?></td>
            <td><?php 
            if($smetacek['vesait']==1){
              echo "Büdcə";
            }elseif($smetacek['vesait']==2){
              echo "Xüsusi";
            }else{
              echo "Mənbəyi bilinmir";
            }



            ?></td>
            <td><a href="smeta_detay-<?=seo($smetacek['smeta_id']) ?>"><button  class="btn btn-outline-dark btn-sm">Bax</button></a></td>   
            <td>
             <?php
             if ($smetacek['smeta_status']==1) {?>
              <a href="smeta_duzelis-<?=seo($smetacek['smeta_id']) ?>"> <button disabled class="btn btn-outline-dark btn-sm">Düzəliş</button></a>
            <?php } else {  ?> 
             <a href="smeta_duzelis-<?=seo($smetacek['smeta_id']) ?>"> <button  class="btn btn-outline-dark btn-sm">Düzəliş</button></a>
           <?php } ?>  
         </td>   
         <td>
          <?php
          if ($smetacek['smeta_status']==1) {?>
           <button disabled  onclick="smetasils()" id="<?php echo $smetacek['smeta_id'] ?>" class="btn btn-outline-danger btn-sm  "><i class="far fa-trash-alt"></i> Sil</button> 
         <?php } else {  ?> 
          <button   onclick="yoxla()"  id="<?php echo $smetacek['smeta_id'] ?>" class="btn btn-outline-danger btn-sm  "><i class="far fa-trash-alt"></i> Sil</button> 
        <?php } ?>          
      </td> 
      <td>
        <?php
        if ($smetacek['smeta_status']==1) {?>
         <button disabled  onclick="sil()" id="<?php echo $bolmecek['iqtisaditesnifat_id'] ?>" class="btn btn-outline-dark btn-sm  "> Təsdiq Olunub</button> 
       <?php } else {  ?> 
        <button  onclick="sil()" id="<?php echo $bolmecek['iqtisaditesnifat_id'] ?>" class="btn btn-outline-dark btn-sm  "> Təsdiq Et</button> 
      <?php } ?>  

    </td> 
  </tr>
</tbody> 
<?php 
} ?>

</table>
</div>
</div>


<!-- Modal Buradan baslayir
Istifadə üçün buradan kopyalamaqq lazimdir bitdiyi yerə qədər
-->
<div id="id01" class="modal-oz">
  <div class="modalicerikkontent">
    <div class="modal_baslik">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright"><!--Bağla--></span>

    </div>
    <div class="modalcontiner" >

      <div class="modalicerik">
        <p style="text-align: center;">
          <b style="color: red;font-size: 30px;">Diqqət! Diqqət! </b><br> <span style="font-size: 20px;">Simeta silinəçək və orada olan bütün məlumatlar itəcək!<br>
            <b style="color: red;font-size: 20px;">Silmək istədiyinizdən əminziniz?</b>
          </span>
        </p>
        <div class="container-fluid" style="text-align: center !important;">
          <div class="row " style="text-align: center !important;"> 
            <button class="btn  btn-danger col-md-5 m-2 " style="font-size: 20px;" name="sil"  onclick="smetasils()" >Sil</button>              
            <button class="btn btn-dark col-md-5 m-2" style="font-size: 20px;"  onclick="document.getElementById('id01').style.display='none'">İmtina Et</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal Buradan bitir-->




<!-- Modal Buradan baslayir
Istifadə üçün buradan kopyalamaqq lazimdir bitdiyi yerə qədər
yeni maddenin tesdiq modali
-->
<div id="idtesdiq" class="modal-oz">
  <div class="modalicerikkontent">
    <div class="modal_baslik">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright"><!--Bağla--></span>

    </div>
    <div class="modalcontiner" >

      <div class="modalicerik">
        <p style="text-align: center;">
          <b style="color: red;font-size: 30px;">Diqqət! </b><br> <span style="font-size: 20px;">Yeni Smeta Uğurla Əlavə Olundu!<br>
            <b style="color: red;font-size: 20px;">Yeni simetaya düzəliş edərək hazırlaya bilərsiniz.<br>
              Smeta təsdiq olunduqdan sonra ona dəyişiklik ediləməz
            </b>
          </span>
        </p>
        <div class="container-fluid  ">
          <div class="row "> 

            <button  class="btn btn-dark  btn-block " style="font-size: 25px !important;"  onclick="document.getElementById('idtesdiq').style.display='none'">B a ğ l a</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal Buradan bitir-->



<!-- Modal Buradan baslayir
Istifadə üçün buradan kopyalamaqq lazimdir bitdiyi yerə qədər
Yeni Madde xususi tesdiq modali
-->
<div id="Xususitesdiq" class="modal-oz">
  <div class="modalicerikkontent">
    <div class="modal_baslik">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright"><!--Bağla--></span>
    </div>
    <div class="modalcontiner" >
      <div class="modalicerik">
        <p style="text-align: center;">
          <b style="color: red;font-size: 30px;">Diqqət! </b><br> <span style="font-size: 20px;">Xüsusi Vəsait Üzrə Yeni Smeta Uğurla Əlavə Olundu!<br>
            <b style="color: red;font-size: 20px;">Yeni simetaya düzəliş edərək hazırlaya bilərsiniz.<br>
              Smeta təsdiq olunduqdan sonra ona dəyişiklik ediləməz
            </b>
          </span>
        </p>
        <div class="container-fluid  ">
          <div class="row "> 
            <button  class="btn btn-dark  btn-block " style="font-size: 25px !important;"  onclick="document.getElementById('Xususitesdiq').style.display='none'">B a ğ l a</button>
          </div>
        </div>
      </div>
    </div>

  </div>
</div>
<!-- Modal Buradan bitir-->
</div>
</div>
</div>
</div>
<?php require_once 'panel/footer.php'?> 





<?php if (@$_GET['xususismeta']=="ok")  {
  ?>  
  <script>
    document.getElementById('Xususitesdiq').style.display='block';   
   if(typeof window.history.pushState == 'function') {
    window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
  }
</script>
<?php } 





if (@$_GET['buccesmeta']=="ok")  {
  ?>  
  <script>
    document.getElementById('idtesdiq').style.display='block';

    if(typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
  </script>
<?php } ?>





<script >
 function yoxla(){
   var id=event.target.id;
   document.getElementById('id01').style.display='block';
   document.getElementsByName("sil")[0].setAttribute("id", id); 
 }
</script>
<script>
  function smetasils(){   
   var smetasil_id=event.target.id;
   var smetasil_xhttp=new XMLHttpRequest();
   smetasil_xhttp.open("POST","nedmin/islem.php",true);
   smetasil_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
   smetasil_xhttp.send("smetasil_id="+smetasil_id);
   smetasil_xhttp.onreadystatechange=function(){
    if (this.readyState==4 && this.status==200) {
      window.location = "smeta.php"
    } else {
    }
  } 
};
</script>



