<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php';
?>
<div class="higt spadding"> 
  <?php require_once 'iqtisaditesnifat_button.php'; ?>
  <div class="container-fluid border mt-1 ">
   <div class="row pb-1" >
    <!--Yeni Bölmə yarad buradan başlayır-->
    <div class="row" style="display: none;" id="yeni">
      <div class="col-md-12 col-sm-12 col-xs-12"> 
        <div class="mt-5">
          <div class="x_content">
            <form action="nedmin/islem.php" method="POST" id="yeniform" >
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Ad:</label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" class="form-control" placeholder="Adı" id="yenibolmead" name="iqtisaditesnifat_bolme_ad">
                </div>
              </div> 
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Kod:</label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="number" min="0" class="form-control"  id="yenibolmekod" placeholder="Kod" name="iqtisaditesnifat_bolme_kod">
                </div>
              </div> 
              <!-- Ck Editör Başlangıç -->
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
               <label class="control-label col-md-2 col-sm-2 col-xs-12 text-lg-right">Açıqlam</label>        
               <div class="col-md-7 col-sm-7 col-xs-12">
                <textarea  class="ckeditor" id="editor1" name="iqtisaditesnifat_bolme_aciqlama"></textarea>
              </div>
            </div>  
            <!-- Ck Editör Bitiş -->
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3 ">
                <button type="button" onclick="iqtisaditesnifatyenibolmes()" class="btn btn-outline-dark btn-sm col-md-4 col-sm-4 col-xs-4 mr-4">Ə L A V Ə &emsp; E T</button>
                <a href="javascript:history.go(-1)">
                  <button type="button" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4" onclick="yenibolmeimtina()">İ M T İ N A &emsp; E T</button>
                </a>
              </div>
            </div>
            <!--Yeni Bölmə yarad Təsdiq modali burada başlayır-->
            <div id="iqtisaditesnifatyenibolme_modal" class="modal-oz">
              <div class="modalicerikkontent">
                <div class="modal_baslik">
                  <span onclick="document.getElementById('iqtisaditesnifatyenibolme_modal').style.display='none'" class="w3-button w3-display-topright"><!--Bağla--></span>
                </div>
                <div class="modalcontiner" >
                  <div class="modalicerik">
                    <p style="text-align: center;"><b style="color: red;font-size: 30px;">Diqqət!</b></p>
                    <p>
                      <b style="font-size: 20px;">Yeni Bölmənin<br></b>
                      <b style="font-size: 20px;" id="yenibolmetesdiq_adyazilmauyanda">&emsp;Adı:&emsp; <span style="color: red" id="yenibolmetesdiq_ad"></span> </b><br>
                      <b style="font-size: 20px;">&emsp;Kodu: <span style="color: red" id="yenibolmetesdiq_kod"></span></b>
                    </p>
                    <p style="text-align: center;"><b style="color: red;font-size: 30px;">Əlavə Etmək İstəyirsiniz?</b></p>
                    <div class="container-fluid" style="text-align: center !important;">
                      <div class="row" style="text-align: center !important;"> 
                        <button type="submit" class="btn  btn-danger col-md-5 m-2" style="font-size:20px;" name="iqtisadi_tesnifat_yeni_bolme"
                        id="iqtisadi_tesnifat_yeni_bolmeid">Təsdiqlə</button>              
                        <button type="button" class="btn btn-dark col-md-5 m-2" style="font-size: 20px;"  onclick="document.getElementById('iqtisaditesnifatyenibolme_modal').style.display='none'">İmtina Et</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <script >
             function iqtisaditesnifatyenibolmes(){
               document.getElementById('iqtisaditesnifatyenibolme_modal').style.display='block';
               var yeni_bolme_ad=document.getElementById("yenibolmead").value;
               var yeni_bolme_kod=document.getElementById("yenibolmekod").value;
               var bosluk = (yeni_bolme_ad.split(" ").length - 1);
               var yeni_bolme_ads=yeni_bolme_ad.length;
               var yeni_bolme_adsay= Number(yeni_bolme_ads-bosluk);
               var yeni_bolme_kodsay=yeni_bolme_kod.length;
               if(yeni_bolme_adsay>0 && yeni_bolme_kodsay>0){
                document.getElementById("yenibolmetesdiq_ad").innerHTML = yeni_bolme_ad;
                document.getElementById("yenibolmetesdiq_kod").innerHTML = yeni_bolme_kod;
                document.getElementById('iqtisadi_tesnifat_yeni_bolmeid').removeAttribute("disabled");
              }
              else{
               document.getElementById("yenibolmetesdiq_ad").innerHTML = "Bölmə adını yazın ";
               document.getElementById("yenibolmetesdiq_kod").innerHTML = "Bölmə kodunu yazin ";
               document.getElementById('iqtisadi_tesnifat_yeni_bolmeid').setAttribute("disabled", "")
             }
           } 
           /*Hərəkət etdirmə*/
           dragElement(document.getElementById("iqtisaditesnifatyenibolme_modal"));
           function dragElement(elmnt) {
            var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
            if (document.getElementById(elmnt.id + "header")) {
              /* if present, the header is where you move the DIV from:*/
              document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
            } else {
              /* otherwise, move the DIV from anywhere inside the DIV:*/
              elmnt.onmousedown = dragMouseDown;
            }
            function dragMouseDown(e) {
              e = e || window.event;
              e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }
  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }
  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
<!--Yeni Bölmə yarad Təsdiq modali burada bitir-->
</form>
</div>
</div>
</div>
</div>
<!--Yeni Bölmə yarad buradan bitir-->
<form name="frmUser" method="post" action="" class="col-md-12 col-sm-12 col-xs-12">
  <!--Mövcut Bölmələrin siyahisi buradan başlayır-->
  <div class="col-md-12 col-sm-12 col-xs-12" id="bolmeler">
   <div class="widget-box" style="margin-top: 0;">
    <div class="text-center" >
      <h3>Azərbaycan Respublikasının Büdcə Xərclərinin İqtisadi Təsnifatının Bölmələri</h3> 
      <?php 
      $bolme_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme order by iqtisaditesnifat_bolme_kod ASC");
      $bolme_sor->execute();
      $count = $bolme_sor->rowCount();
      if($count>0){
       ?>
       <table class="table table-bordered table-hover" style="border">
        <thead>
          <tr>
           <th><input type='checkbox' name='showhide' onchange="checkAll(this)"></th>          
           <th>Bölmə ID Kod</th>
           <th>Bölmə Adı</th>
           <th>Bölmə Kodu</th>
           <th>Bölmə Açıqlama</th>
           <th>Bölmə Statusu</th>         
           <th>Düzəliş</th>
         </tr>
       </thead>
       <?php 
       $say=0;
       $iqtisaditesnifat_bolme_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme order by iqtisaditesnifat_bolme_kod ASC");
       $iqtisaditesnifat_bolme_sor->execute();
       while ($iqtisaditesnifat_bolme_cek = $iqtisaditesnifat_bolme_sor->fetch(PDO::FETCH_ASSOC)) {
         $say++;
         $silid=$iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id'];
         ?>        
         <tbody>
          <tr>
            <td>
              <input class="sec" type="checkbox" name="bolmetoplusilid[]" value="<?php echo $iqtisaditesnifat_bolme_cek["iqtisaditesnifat_bolme_id"]; ?>" >
            </td>
            
            <td><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id'] ?></td> 
            <td class="text-lg-left"><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_ad'] ?></td>
            <td><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_kod'] ?></td>
            <td class="text-lg-left"><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_aciqlama'] ?></td>
            <td>
              <label class="checkbox">
                <input <?php if($iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_status']==1){
                  echo "checked";
                }else{
                  echo "";
                } ?>  type="checkbox" id="<?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id'] ?>" onchange="kontrol()" > 
                <span class="checkbox"> 
                  <span></span>
                </span>
              </label>
            </td>            
            <td>
              <a href="iqtisadi_tesnifat_bolme_duzelis-<?=seo($iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id']) ?>">
                <button type="button"  class="btn btn-outline-dark btn-sm">Düzəliş</button> 
              </a>
            </td> 
          </tr>
        </tbody>
        <?php
      } ?>
    </form>
  </table>
<?php } else{?>
 <div >
  <h3 style="color:red; type">Bölmə mövcut deyil. Yeni Bölmə əlavə edin</h3>
</div>
<?php } ?>
<div class="text-lg-right mr-5" style="color: red;font-size: 25px;">
  <b><?php echo $say;
  if($say>0){
    echo " ədəd";
  }else{
    echo "";
  }
  ?></b>
</div>
<!--Toplu sil yoxlanış təsdiq başlayır-->
<div id="toplusiltesdiqok" class="modal-oz">
  <div class="modalicerikkontent" style="width: 580px;">
    <div class="modal_baslik">
      <span onclick="document.getElementById('toplusiltesdiqok').style.display='none'" 
      class="w3-button w3-display-topright">Bağla</span>
    </div>
    <div class="modalcontiner" >
      <div class="modalicerik">
        <p style="text-align: center;"  >
          <h3 style="color: red;font-size: 30px;"><b>Diqqət!</b></h3>
          <span style="font-size: 20px;" id="diqqet1"></span>
        </p>
        <p style="font-size: 20px;text-align:center;color: red; " ><b id="diqqet2"></b></p>
        <div class="container-fluid" style="text-align: center !important;">
         <div class="row">
          <div class="col">
            <button type="button" class="btn  btn-danger btn-block" style="font-size: 20px;" name="iqtisadi_tesnifat_maddesil_sil" id="toplusiltesdiqid"  onclick="toplusil()" >Sil</button>
          </div>
          <div class="col">
           <button type="button" class="btn btn-dark btn-block" style="font-size: 20px;"  onclick="document.getElementById('toplusiltesdiqok').style.display='none'">İmtina Et</button>
         </div>
       </div>
     </div>
   </div>
 </div>
</div>
</div>
<script >
 function toplusiltesdiq(){
   document.getElementById('toplusiltesdiqok').style.display='block';
   var inputs = document.getElementsByClassName('sec');
   var checked = 0;   
   for (var i = 0; i < inputs.length; i++) {   
    var input = inputs[i];
    if('checkbox' == inputs[i].type && inputs[i].checked)
      checked++;
    var say=checked;
  }
  if(say==0){
   document.getElementById('toplusiltesdiqid').setAttribute("disabled", "");
   document.getElementById("diqqet1").innerHTML = " ";
   document.getElementById("diqqet2").innerHTML = "Secim Edilməyib!";
 }
 else{
  document.getElementById('toplusiltesdiqid').removeAttribute("disabled");
  document.getElementById("diqqet1").innerHTML = "Azərbaycan Resbublikasının büdcə xərclərinin iqtisadi təsnifatının secili bölmələr silinəçək!  ";
  document.getElementById("diqqet2").innerHTML = "Silmək istədiyinizdən əminsiniz?";
}
if(typeof window.history.pushState == 'function') {
  window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
}
} 
/*Hərəkət etdirmə*/
<?php 
$hereketsor = $db->prepare("SELECT * FROM iqtisaditesnifat_yarimmadde ");
$hereketsor->execute();
$toplam=$hereketsor->rowCount();
if ($toplam>0) {  ?>
 dragElement(document.getElementById("toplusiltesdiqok"));
<?php  } else{
  echo "";
} ?> 
function dragElement(elmnt) {
  var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
  if (document.getElementById(elmnt.id + "header")) {
    /* if present, the header is where you move the DIV from:*/
    document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
  } else {
    /* otherwise, move the DIV from anywhere inside the DIV:*/
    elmnt.onmousedown = dragMouseDown;
  }
  function dragMouseDown(e) {
    e = e || window.event;
    e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }
  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }
  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
<!--Toplu sil yoxlanış təsdiq bitir-->
</div>
</div>
</div>
<!-- Mövcut Bolmələrin siyahisi burada bitir-->
</div>
<!-- Istifadə üçün buradan kopyalamaqq lazimdir bitdiyi yerə qədər-->
<div id="iqtisadi_tesnifat_bolme_duzelis" class="modal-oz">
  <div class="modalicerikkontent">
    <div class="modal_baslik">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright"><!--Bağla--></span>
    </div>
    <div class="modalcontiner" >
      <div class="modalicerik">
        <p style="text-align: center;">
          <b style="color: red;font-size: 30px;">Yenilənmə Uğurlu!</b>
        </p>
        <p>
          <?php 
          $duzelissor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme where iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id");
          $duzelissor->execute(array(
            'iqtisaditesnifat_bolme_id'=>$_GET['iqtisaditesnifat_bolme_id']));
          $duzeliscek = $duzelissor->fetch(PDO::FETCH_ASSOC)
          ?>          
          <b style="font-size: 20px;">Yenilənən Kod: <?php echo $duzeliscek['iqtisaditesnifat_bolme_kod'] ?></b>
        </p>
        <p><b style="font-size: 20px;">Yenilənən Ad: <?php echo $duzeliscek['iqtisaditesnifat_bolme_ad'] ?></b></p>
        <div class="container-fluid" style="text-align: center !important;">
          <div class="row " style="text-align: center !important;">              
            <button class="btn btn-dark btn-block" style="font-size: 20px;"  onclick="document.getElementById('iqtisadi_tesnifat_bolme_duzelis').style.display='none'">Bağla</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Modal Buradan bitir-->
</div>
</div>
<?php require_once 'panel/footer.php'?> 
<?php 
if (@$_GET['iqtisadi_tesnifat_yeni_bolme']=="ok")  {
  ?>  
  <script>
    document.getElementById('iqtisadi_tesnifat_yeni_bolme_ok').style.display='block';
    if(typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
    /*Hərəkət etdirmə*/
    dragElement(document.getElementById("iqtisadi_tesnifat_yeni_bolme_ok"));
    function dragElement(elmnt) {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      if (document.getElementById(elmnt.id + "header")) {
        /* if present, the header is where you move the DIV from:*/
        document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
      } else {
        /* otherwise, move the DIV from anywhere inside the DIV:*/
        elmnt.onmousedown = dragMouseDown;
      }
      function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }
  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }
  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
<?php } ?>
<?php 
if (@$_GET['iqtisadi_tesnifat_bolme_duzelis']=="ok")  {
  ?>  
  <script>
    document.getElementById('iqtisadi_tesnifat_bolme_duzelis').style.display='block';
    if(typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
    /*Hərəkət etdirmə*/
    dragElement(document.getElementById("iqtisadi_tesnifat_bolme_duzelis"));
    function dragElement(elmnt) {
      var pos1 = 0, pos2 = 0, pos3 = 0, pos4 = 0;
      if (document.getElementById(elmnt.id + "header")) {
        /* if present, the header is where you move the DIV from:*/
        document.getElementById(elmnt.id + "header").onmousedown = dragMouseDown;
      } else {
        /* otherwise, move the DIV from anywhere inside the DIV:*/
        elmnt.onmousedown = dragMouseDown;
      }
      function dragMouseDown(e) {
        e = e || window.event;
        e.preventDefault();
    // get the mouse cursor position at startup:
    pos3 = e.clientX;
    pos4 = e.clientY;
    document.onmouseup = closeDragElement;
    // call a function whenever the cursor moves:
    document.onmousemove = elementDrag;
  }
  function elementDrag(e) {
    e = e || window.event;
    e.preventDefault();
    // calculate the new cursor position:
    pos1 = pos3 - e.clientX;
    pos2 = pos4 - e.clientY;
    pos3 = e.clientX;
    pos4 = e.clientY;
    // set the element's new position:
    elmnt.style.top = (elmnt.offsetTop - pos2) + "px";
    elmnt.style.left = (elmnt.offsetLeft - pos1) + "px";
  }
  function closeDragElement() {
    /* stop moving when mouse button is released:*/
    document.onmouseup = null;
    document.onmousemove = null;
  }
}
</script>
<?php } ?>





