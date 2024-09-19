<?php
require_once 'panel/header.php';
require_once 'panel/menu.php';
$smetadetaysor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id ");
$smetadetaysor->execute(array(
 'smeta_id' => $_GET['smeta_id']
));
$smetaemeliyyatsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id ");
$smetaemeliyyatsor->execute(array(
 'smeta_id' => $_GET['smeta_id']
));
$smetaemeliyyatcek = $smetaemeliyyatsor->fetch(PDO::FETCH_ASSOC);


?>

<div class="higt spadding">

 <div class="container-fluid border ">
  <div class="row ">
   <div class="col-md-12 col-sm-12 col-xs-12 p-1 sag" style="text-align: center;">

    <a href="javascript:history.go(-1)"> <button class="btn btn-outline-dark btn-sm font-weight-bold" name="budce_smeta">İmtina</button></a>
    <a href="smeta_duzelis.php?smeta_id=<?php echo $smetaemeliyyatcek['smeta_id']  ?>"> <button class="btn btn-outline-dark btn-sm font-weight-bold" name="budce_smeta">Yaddaşa yaz</button></a>
    <button class="btn btn-outline-dark btn-sm font-weight-bold" onclick="document.getElementById('id01').style.display='block'">SİL</button>
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
      <h3><?php
          if ($smetaemeliyyatcek['vesait'] == 1) {
           echo "Büdcə vəsaiti üzrə " . $smetaemeliyyatcek['smeta_tarix'] . " tarixli simataya düzəliş edirsiniz";
          } elseif ($smetaemeliyyatcek['vesait'] == 2) {
           echo "Xüsusi vəsait üzrə " . $smetaemeliyyatcek['smeta_tarix'] . " tarixli simataya düzəliş edirsiniz";
          }


          ?></h3>

      <table class="table table-bordered " style="border">
       <thead>
        <tr>
         <th>№</th>
         <th><a href="">Maddənin adı</a></th>
         <th><a href="">Kod</a></th>
         <th style="max-width: 10px !important;">Cəmi</th>
         <th>I RÜB</th>
         <th>II RÜB</th>
         <th>III RÜB</th>
         <th>IV RÜB</th>
        </tr>
        <style type="text/css">
         .table td {
          padding: 1px 1px 1px 1px !important;
          margin: 0 !important;
          vertical-align: middle;
          border-top: 1px solid #dee2e6;
          height: 38px;
          font-size: 20px;
         }

         input {
          text-align: right;
          margin: -29px;
          width: 100%;
          height: 36px;
          line-height: 36px;

         }
        </style>
       </thead>
       <?php
       $say = 0;
       while ($smetadetaycek = $smetadetaysor->fetch(PDO::FETCH_ASSOC)) {
        $say++;
        ?>
        <tbody>
         <tr>

          <td><?php echo $say ?></td>
          <td class="text-lg-left"><?php echo $smetadetaycek['madde_ad'] ?></td>
          <td><?php echo $smetadetaycek['madde_kod'] ?></td>

          <td style="max-width: 140px !important;">
           <input min="0" id="<?php echo $smetadetaycek['smeta_detay_id'] ?>" type="number" disabled value="<?php echo $smetadetaycek['cemi'] ?>">

          </td>

          <td style="max-width: 100px !important;">


           <input <?php
                  $kb_ustid = $smetadetaycek['bome_id'];
                  $bolmesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and kb_ustid=:kb_ustid ");
                  $bolmesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'kb_ustid' => $kb_ustid
                  ));
                  $bolmesorsay = $bolmesor->rowCount();
                  $pargarf_ustid = $smetadetaycek['iqtisaditesnifat_kb_id'];
                  $kbsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and pargarf_ustid=:pargarf_ustid ");
                  $kbsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'pargarf_ustid' => $pargarf_ustid
                  ));
                  $kbsay = $kbsor->rowCount();
                  $madde_ust=$smetadetaycek['pargarf_id'];
                  $paragrafsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and madde_ust=:madde_ust ");
                  $paragrafsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'madde_ust' => $madde_ust
                  ));
                  $paragrafsay = $paragrafsor->rowCount();



                  $yarimmadde_ust=$smetadetaycek['madde_id'];
                  $maddesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and yarimmadde_ust=:yarimmadde_ust ");
                  $maddesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'yarimmadde_ust' => $yarimmadde_ust
                  ));
                  $maddesay = $maddesor->rowCount();

                  if ($bolmesorsay > 0 or $kbsay > 0 or $paragrafsay>0 or $maddesay >0 ) {
                   echo "disabled";
                  } else {
                   echo "";
                  } ?> min="0" class="<?php echo $smetadetaycek['smeta_detay_id'] ?>" type="number" value="<?php echo $smetadetaycek['I_RUB'] ?>" onchange='topla()'>
          </td>

          <td style="max-width: 100px !important;">
           <input 
           <?php
                  $kb_ustid = $smetadetaycek['bome_id'];
                  $bolmesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and kb_ustid=:kb_ustid ");
                  $bolmesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'kb_ustid' => $kb_ustid
                  ));
                  $bolmesorsay = $bolmesor->rowCount();
                  $pargarf_ustid = $smetadetaycek['iqtisaditesnifat_kb_id'];
                  $kbsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and pargarf_ustid=:pargarf_ustid ");
                  $kbsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'pargarf_ustid' => $pargarf_ustid
                  ));
                  $kbsay = $kbsor->rowCount();
                  $madde_ust=$smetadetaycek['pargarf_id'];
                  $paragrafsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and madde_ust=:madde_ust ");
                  $paragrafsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'madde_ust' => $madde_ust
                  ));
                  $paragrafsay = $paragrafsor->rowCount();



                  $yarimmadde_ust=$smetadetaycek['madde_id'];
                  $maddesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and yarimmadde_ust=:yarimmadde_ust ");
                  $maddesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'yarimmadde_ust' => $yarimmadde_ust
                  ));
                  $maddesay = $maddesor->rowCount();

                  if ($bolmesorsay > 0 or $kbsay > 0 or $paragrafsay>0 or $maddesay >0 ) {
                   echo "disabled";
                  } else {
                   echo "";
                  } ?> min="0" class="<?php echo $smetadetaycek['smeta_detay_id'] ?>" type="number" value="<?php echo $smetadetaycek['II_RUB'] ?>" onchange='topla()'>
          </td>

          <td style="max-width: 100px !important;">
           <input
           <?php
                  $kb_ustid = $smetadetaycek['bome_id'];
                  $bolmesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and kb_ustid=:kb_ustid ");
                  $bolmesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'kb_ustid' => $kb_ustid
                  ));
                  $bolmesorsay = $bolmesor->rowCount();
                  $pargarf_ustid = $smetadetaycek['iqtisaditesnifat_kb_id'];
                  $kbsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and pargarf_ustid=:pargarf_ustid ");
                  $kbsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'pargarf_ustid' => $pargarf_ustid
                  ));
                  $kbsay = $kbsor->rowCount();
                  $madde_ust=$smetadetaycek['pargarf_id'];
                  $paragrafsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and madde_ust=:madde_ust ");
                  $paragrafsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'madde_ust' => $madde_ust
                  ));
                  $paragrafsay = $paragrafsor->rowCount();



                  $yarimmadde_ust=$smetadetaycek['madde_id'];
                  $maddesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and yarimmadde_ust=:yarimmadde_ust ");
                  $maddesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'yarimmadde_ust' => $yarimmadde_ust
                  ));
                  $maddesay = $maddesor->rowCount();

                  if ($bolmesorsay > 0 or $kbsay > 0 or $paragrafsay>0 or $maddesay >0 ) {
                   echo "disabled";
                  } else {
                   echo "";
                  } ?> min="0" class="<?php echo $smetadetaycek['smeta_detay_id'] ?>" type="number" value="<?php echo $smetadetaycek['III_RUB'] ?>" onchange='topla()'>
          </td>

          <td style="max-width: 100px !important;">
           <input 
           <?php
                  $kb_ustid = $smetadetaycek['bome_id'];
                  $bolmesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and kb_ustid=:kb_ustid ");
                  $bolmesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'kb_ustid' => $kb_ustid
                  ));
                  $bolmesorsay = $bolmesor->rowCount();
                  $pargarf_ustid = $smetadetaycek['iqtisaditesnifat_kb_id'];
                  $kbsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and pargarf_ustid=:pargarf_ustid ");
                  $kbsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'pargarf_ustid' => $pargarf_ustid
                  ));
                  $kbsay = $kbsor->rowCount();
                  $madde_ust=$smetadetaycek['pargarf_id'];
                  $paragrafsor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and madde_ust=:madde_ust ");
                  $paragrafsor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'madde_ust' => $madde_ust
                  ));
                  $paragrafsay = $paragrafsor->rowCount();



                  $yarimmadde_ust=$smetadetaycek['madde_id'];
                  $maddesor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id and yarimmadde_ust=:yarimmadde_ust ");
                  $maddesor->execute(array(
                   'smeta_id' => $_GET['smeta_id'],
                   'yarimmadde_ust' => $yarimmadde_ust
                  ));
                  $maddesay = $maddesor->rowCount();

                  if ($bolmesorsay > 0 or $kbsay > 0 or $paragrafsay>0 or $maddesay >0 ) {
                   echo "disabled";
                  } else {
                   echo "";
                  } ?> min="0" class="<?php echo $smetadetaycek['smeta_detay_id'] ?>" type="number" value="<?php echo $smetadetaycek['IV_RUB'] ?>" onchange='topla()'>
          </td>
         </tr>
        </tbody>
       <?php
      } ?>

      </table>
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
    <div class="modalcontiner">
     <div class="modalicerik">
      <p style="text-align: center;">
       <b style="color: red;font-size: 30px;">Diqqət! Diqqət! </b><br> <span style="font-size: 20px;">Simeta silinəçək və orada olan bütün məlumatlar itəcək!<br>
        <b style="color: red;font-size: 25px;">Silmək istədiyinizdən əminziniz?</b>
       </span>
      </p>
      <div class="container-fluid" style="text-align: center !important;">
       <div class="row " style="text-align: center !important;">
        <button class="btn  btn-danger col-md-5 m-2 " style="font-size: 20px;" id=" <?php echo $smetaemeliyyatcek['smeta_id']  ?>" onclick="smetasil()">Sil</button>
        <button class="btn btn-dark col-md-5 m-2" style="font-size: 20px;" onclick="document.getElementById('id01').style.display='none'">İmtina Et</button>
       </div>
      </div>
     </div>
    </div>

   </div>
  </div>
  <!-- Modal Buradan bitir-->
 </div>
</div>
<?php require_once 'panel/footer.php'     ?>

<?php require_once 'panel/footer.php' ?>
<script>
 function smetasil() {
  var smetasil_id = event.target.id;
  var smetasil_xhttp = new XMLHttpRequest();
  smetasil_xhttp.open("POST", "nedmin/islem.php", true);
  smetasil_xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  smetasil_xhttp.send("smetasil_id=" + smetasil_id);
  smetasil_xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
    window.location = "smeta.php"
   } else {}
  }
 };
</script>

<script>
 function topla() {
  var clas_id = event.target.className;
  var elements = document.getElementsByClassName(clas_id);
  var total = 0;
  for (var i = 0; i < elements.length; ++i) {
   total += parseInt(elements[i].value);
  };
  document.getElementById(clas_id).value = total;
 }
</script>