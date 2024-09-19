<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php';

?>

<div class="higt spadding"> 

 <div class="container-fluid border ">
  <div class="row ">
    <div class="col-md-12 col-sm-12 col-xs-12 p-1 sag" style="text-align: center;">

      <a href="javascript:history.go(-1)"> <button class="btn btn-outline-dark btn-sm font-weight-bold" name="budce_smeta">GERİ</button></a>
      <a href="smeta_duzelis.php?smeta_id=<?php echo $smetaemeliyyatcek['smeta_id']  ?>"> <button class="btn btn-outline-dark btn-sm font-weight-bold" name="budce_smeta">DÜZƏLİŞ</button></a>
      <button class="btn btn-outline-dark btn-sm font-weight-bold" onclick="document.getElementById('id01').style.display='block'" >SİL</button>
      <a href="yeni_madde"> <button class="btn btn-outline-dark btn-sm font-weight-bold" name="budce_smeta">YENİLƏ</button></a>

    </div>
    <hr>
  </div>
</div>


<div class="container-fluid border mt-1">

 <div class="row">
  <div class="col-md-12 col-sm-12 col-xs-12">
   <div class="widget-box" style="margin-top: 0;">
    <div class="text-center">
      <h3></h3>      
      <table class="table table-bordered table-hover" style="border">
        <thead>
          <tr>
           <th>№</th>
           <th><a href="">Maddənin adı</a></th>
           <th><a href="">Kod</a></th>
           <th>Cəmi</th>
           <th>I RÜB</th>
           <th>II RÜB</th>
           <th>III RÜB</th>
           <th>IV RÜB</th>
         </tr>

       </thead>
       <?php 
       $say=0;
       $bolmesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and bome_ust=:bome_ust");
       $bolmesor->execute(array(
        'smeta_id'=>$_GET['smeta_id'],
        'bome_ust'=>0));
       while ($bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC)) {
        $kb_ustid=$bolmecek['bome_id'];
        $say++;
        ?>        
        <tbody>
          <tr>

            <td ><?php echo $say ?></td>
            <td class="text-lg-left"><?php echo $bolmecek['madde_ad'] ?></td>
            <td><?php echo $bolmecek['madde_kod'] ?></td>
            <td><?php echo $bolmecek['cemi'] ?></td>
            <td ><?php echo $bolmecek['I_RUB'] ?></td>
            <td><?php echo $bolmecek['II_RUB'] ?></td>
            <td><?php echo $bolmecek['III_RUB'] ?></td>
            <td><?php echo $bolmecek['IV_RUB'] ?></td>
          </tr>
        </tbody> 


        <?php 
        $komekcibolmesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and kb_ustid=:kb_ustid");
        $komekcibolmesor->execute(array(
          'smeta_id'=>$_GET['smeta_id'],
          'kb_ustid'=> $kb_ustid));
        while ($komekcibolmecek = $komekcibolmesor->fetch(PDO::FETCH_ASSOC)) {
          $pargarf_ustid=$komekcibolmecek['iqtisaditesnifat_kb_id'];
          $say++;
          ?>        
          <tbody>
            <tr>

              <td ><?php echo $say ?></td>
              <td class="text-lg-left"><?php echo $komekcibolmecek['madde_ad'] ?></td>
              <td><?php echo $komekcibolmecek['madde_kod'] ?></td>
              <td><?php echo $komekcibolmecek['cemi'] ?></td>
              <td ><?php echo $komekcibolmecek['I_RUB'] ?></td>
              <td><?php echo $komekcibolmecek['II_RUB'] ?></td>
              <td><?php echo $komekcibolmecek['III_RUB'] ?></td>
              <td><?php echo $komekcibolmecek['IV_RUB'] ?></td>
            </tr>
          </tbody> 



          <?php 
          $paragrafsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and pargarf_ustid=:pargarf_ustid");
          $paragrafsor->execute(array(
            'smeta_id'=>$_GET['smeta_id'],
            'pargarf_ustid'=> $pargarf_ustid));
          while ($paragrafcek = $paragrafsor->fetch(PDO::FETCH_ASSOC)) {
            $madde_ust=$paragrafcek['pargarf_id'];
            $say++;
            ?>        
            <tbody>
              <tr>

                <td ><?php echo $say ?></td>
                <td class="text-lg-left"><?php echo $paragrafcek['madde_ad'] ?></td>
                <td><?php echo $paragrafcek['madde_kod'] ?></td>
                <td><?php echo $paragrafcek['cemi'] ?></td>
                <td ><?php echo $paragrafcek['I_RUB'] ?></td>
                <td><?php echo $paragrafcek['II_RUB'] ?></td>
                <td><?php echo $paragrafcek['III_RUB'] ?></td>
                <td><?php echo $paragrafcek['IV_RUB'] ?></td>
              </tr>
            </tbody> 



            <?php 
            $maddesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and madde_ust=:madde_ust");
            $maddesor->execute(array(
              'smeta_id'=>$_GET['smeta_id'],
              'madde_ust'=> $madde_ust));
            while ($maddecek = $maddesor->fetch(PDO::FETCH_ASSOC)) {
              $yarimmadde_ust=$maddecek['madde_id'];
              $say++;
              ?>        
              <tbody>
                <tr>

                  <td ><?php echo $say ?></td>
                  <td class="text-lg-left"><?php echo $maddecek['madde_ad'] ?></td>
                  <td><?php echo $maddecek['madde_kod'] ?></td>
                  <td><?php echo $maddecek['cemi'] ?></td>
                  <td ><?php echo $maddecek['I_RUB'] ?></td>
                  <td><?php echo $maddecek['II_RUB'] ?></td>
                  <td><?php echo $maddecek['III_RUB'] ?></td>
                  <td><?php echo $maddecek['IV_RUB'] ?></td>
                </tr>
              </tbody> 

              <?php 
              $yarimmaddesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and yarimmadde_ust=:yarimmadde_ust");
              $yarimmaddesor->execute(array(
                'smeta_id'=>$_GET['smeta_id'],
                'yarimmadde_ust'=> $yarimmadde_ust));
              while ($yarimaddecek = $yarimmaddesor->fetch(PDO::FETCH_ASSOC)) {
               
                $say++;
                ?>        
                <tbody>
                  <tr>

                    <td ><?php echo $say ?></td>
                    <td class="text-lg-left"><?php echo $yarimaddecek['madde_ad'] ?></td>
                    <td><?php echo $yarimaddecek['madde_kod'] ?></td>
                    <td><?php echo $yarimaddecek['cemi'] ?></td>
                    <td ><?php echo $yarimaddecek['I_RUB'] ?></td>
                    <td><?php echo $yarimaddecek['II_RUB'] ?></td>
                    <td><?php echo $yarimaddecek['III_RUB'] ?></td>
                    <td><?php echo $yarimaddecek['IV_RUB'] ?></td>
                  </tr>
                </tbody> 









                <?php
                }
              }
            }
          } 
        }?>

      </table>
    </div>
  </div>
</div>
</div>

</div>
</div>


<!-- Modal Buradan baslayir
Istifadə üçün buradan kopyalamaqq lazimdir bitdiyi yerə qədər
-->

<div id="id01" class="modal-oz">
  <div class="modalicerikkontent">
    <div class="modal_baslik">


    </div>
    <div class="modalcontiner" >

      <div class="modalicerik">
        <p style="text-align: center;">
          <b style="color: red;font-size: 30px;">Diqqət! Diqqət! </b><br> <span style="font-size: 20px;">Simeta silinəçək və orada olan bütün məlumatlar itəcək!<br>
            <b style="color: red;font-size: 25px;">Silmək istədiyinizdən əminziniz?</b>
          </span>
        </p>
        <div class="container-fluid" style="text-align: center !important;">
          <div class="row " style="text-align: center !important;"> 
           <button class="btn  btn-danger col-md-5 m-2 " style="font-size: 20px;" id=" <?php echo $smetaemeliyyatcek['smeta_id']  ?>" onclick="smetasil()">Sil</button>                
           <button class="btn btn-dark col-md-5 m-2" style="font-size: 20px;"  onclick="document.getElementById('id01').style.display='none'">İmtina Et</button>
         </div>
       </div>
     </div>
   </div>

 </div>
</div>







<!-- Modal Buradan bitir-->







<?php require_once 'panel/footer.php'?>
<script>
  function smetasil(){
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




