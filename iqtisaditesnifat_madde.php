<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php';
?>
<div class="higt spadding"> 
 <?php require_once 'iqtisaditesnifat_button.php'; ?>
 <div class="container-fluid border mt-1">
   <div class="row">
    <form name="frmUser" method="post" action="" class="col-md-12 col-sm-12 col-xs-12">
     <div class="col-md-12 col-sm-12 col-xs-12" id="bolmeler">
       <div class="widget-box" style="margin-top: 0;">
        <div class="text-center">
          <h3>Azərbaycan Respublikasının Büdcə Xərclərinin İqtisadi Təsnifatının Maddəsi</h3>  
          <?php 
          $maddesor = $db->prepare("SELECT * FROM iqtisaditesnifat_madde");
          $maddesor->execute();
          $maddesay = $maddesor->rowCount();
          if($maddesay>0){
           ?>     
           <table class="table table-bordered table-hover" style="border">
            <thead>
              <tr>
               <th><input type='checkbox' name='showhide' onchange="checkAll(this)"></th>
               <th>Maddə İD Kod</th>
               <th>Maddə Adı</th>
               <th>Maddə Kodu</th>
               <th>Maddə Açıqlama</th>
               <th>Maddə Statusu</th>             
               <th>Düzəliş</th>
             </tr>
           </thead>
           <?php 
           $say=0;
           $iqtisaditesnifat_madde_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_madde order by iqtisaditesnifat_madde_kod ASC");
           $iqtisaditesnifat_madde_sor->execute();
           while ($iqtisaditesnifat_madde_cek=$iqtisaditesnifat_madde_sor->fetch(PDO::FETCH_ASSOC)) {
            $iqtisaditesnifat_paragraf_id=$iqtisaditesnifat_madde_cek['iqtisaditesnifat_paragraf_id'];
            $paragrafsaysor=$db->prepare("SELECT * FROM iqtisaditesnifat_paragraf where iqtisaditesnifat_paragraf_id=:iqtisaditesnifat_paragraf_id");
            $paragrafsaysor->execute(array(
              'iqtisaditesnifat_paragraf_id'=>$iqtisaditesnifat_paragraf_id));
            $parsay=$paragrafsaysor->rowCount();
            $say++;
            ?>        
            <tbody style="<?php
             if ($parsay>0) {
             }
             else{ ?>
               background-color: #ff4d4d;
               <?php } ?>  ">
              <tr>
               <td>
                <input class="sec" type="checkbox" name="maddesilis[]" value="<?php echo $iqtisaditesnifat_madde_cek["iqtisaditesnifat_madde_id"]; ?>" >
              </td>          
              <td><?php echo $iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_id']?></td> 
              <td class="text-lg-left"><?php echo $iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_ad'] ?></td>
              <td><?php echo $iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_kod'] ?></td>
              <td class="text-lg-left"><?php echo $iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_aciqlama'] ?></td>   
              <td>
                <label class="checkbox">
                  <input <?php if($iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_status']==1){
                    echo "checked";
                  }else{
                    echo "";
                  } ?>  type="checkbox" id="<?php echo $iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_id'] ?>" onchange="madde_status()" > 
                  <span class="checkbox"> 
                    <span></span>
                  </span>
                </label>
              </td> 
              <td>
                <a href="iqtisaditesnifat_madde_duzenle-<?=seo($iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_id']) ?>">
                  <button type="button" class="btn btn-outline-dark btn-sm">Düzəliş</button> 
                </a>
              </td>   
            </tr>
          </tbody>
          <?php
        } ?>
      </table>
    <?php } else{?>
     <div >
      <h3 style="color:red; type">Maddə mövcut deyil. Yeni Maddə əlavə edin</h3>
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
</div>
</div>
</div>
</form>

<!-- Yeni maddə yarad buradan başlayır-->
<div class="row" style="display: none;" id="yeni">
  <div class="col-md-12 col-sm-12 col-xs-12"> 
    <div class="mt-5">
     <div class="x_content">
      <form action="nedmin/islem.php" method="POST" id="yeniform">
        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right" >Paragraf</label>
          <div class="col-md-5 col-sm-5 col-xs-12">
            <select class=" form-control bolme select2_single" required=""  name="iqtisaditesnifat_paragraf_id" style="width: 400px;">
              <option></option>
              <?php 
              $iqtisaditesnifat_paragraf_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_paragraf where iqtisaditesnifat_paragraf_status=:iqtisaditesnifat_paragraf_status order by iqtisaditesnifat_paragraf_kod ASC");
              $iqtisaditesnifat_paragraf_sor->execute(array(
                'iqtisaditesnifat_paragraf_status'=>1));
                while ($iqtisaditesnifat_paragraf_cek = $iqtisaditesnifat_paragraf_sor->fetch(PDO::FETCH_ASSOC)) {?>    
                  <option value="<?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_id'] ?>"><?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_kod'] ?> - <?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_ad'] ?></option>
                <?php } ?>                    
              </select>
            </div>
          </div>
          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Maddənin Adı:</label>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <input type="text" min="0" class="form-control"  required="" id="yeniad" placeholder="Adı" name="iqtisaditesnifat_madde_ad">
            </div>
          </div> 

          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Maddənin Kodu:</label>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <input type="number" min="0" class="form-control" required=""  id="yenikod" placeholder="Kod" name="iqtisaditesnifat_madde_kod">
            </div>
          </div> 

          <div class="form-group col-md-12 col-sm-12 col-xs-12">
           <label class="control-label col-md-2 col-sm-2 col-xs-12 text-lg-right">Açıqlam</label>          
           <div class="col-md-7 col-sm-7 col-xs-12">
            <textarea  class="ckeditor" id="editor1" required="" name="iqtisaditesnifat_madde_aciqlama"></textarea>
          </div>
        </div>

        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3 ">
            <button type="button" onclick="iqtisadi_tesnifat_yeni_madde()" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4 mr-4 ">Ə L A V Ə &emsp; E T</button>
            <button type="button" onclick="imtina()" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4">İ M T İ N A &emsp; E T</button>
          </div>
        </div>


        <!--Yeni maddə yarad modalı buradan başlayır -->
        <div id="iqtisadi_tesnifat_yeni_madde_modal" class="modal-oz">
          <div class="modalicerikkontent">
            <div class="modal_baslik">
              <span onclick="document.getElementById('id01').style.display='none'" 
              class="w3-button w3-display-topright"><!--Bağla--></span>
            </div>
            <div class="modalcontiner" >
              <div class="modalicerik">
               <p style="text-align: center;"><b style="color: red;font-size: 30px;">Diqqət!</b></p>
               <p><b style="font-size: 20px;">Yeni Maddənin<br></b>
                <b style="font-size: 20px;">
                 &emsp;Adı:&emsp; <span style="color: red" id="yenitesdiq_ad"></span><br>
                 &emsp;Kodu: <span style="color: red" id="yenitesdiq_kod"></span>
               </b>
             </p>
             <p style="text-align: center;"><b style="color: red;font-size: 30px;">Əlavə Etmək İstəyirsiniz?</b></p>
             <div class="container-fluid" style="text-align: center !important;">
              <div class="row " style="text-align: center !important;"> 
                <button type="submit" class="btn  btn-danger col-md-5 m-2 " id="yeni_kbgonder" style="font-size: 20px;" name="iqtisaditesnifat_yeni_madde">Təsdiqlə</button>              
                <button type="button" class="btn btn-dark col-md-5 m-2" style="font-size: 20px;"  onclick="document.getElementById('iqtisadi_tesnifat_yeni_madde_modal').style.display='none'">İmtina Et</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--Yeni paragraf yarad modalı burada bitir-->
  </form>
</div>
</div>
</div>
<script >
 function iqtisadi_tesnifat_yeni_madde(){
   document.getElementById('iqtisadi_tesnifat_yeni_madde_modal').style.display='block';
   var yeni_ad=document.getElementById("yeniad").value;
   var yeni_kod=document.getElementById("yenikod").value;
   var bosluk = (yeni_ad.split(" ").length - 1);
   var yeni_ads=yeni_ad.length;
   var yeni_adsay= Number(yeni_ads-bosluk);
   var yeni_kodsay=yeni_kod.length;
   if(yeni_adsay>0 && yeni_kodsay>0){
     document.getElementById("yenitesdiq_ad").innerHTML = yeni_ad;
     document.getElementById("yenitesdiq_kod").innerHTML = yeni_kod;
     document.getElementById('yeni_kbgonder').removeAttribute("disabled");
   }
   else{
     document.getElementById("yenitesdiq_ad").innerHTML = "Maddə adını yazın";
     document.getElementById("yenitesdiq_kod").innerHTML = "Maddə kodunu yazın";
     document.getElementById('yeni_kbgonder').setAttribute("disabled", "")
   }
 }
 /*Hərəkət etdirmə*/
 dragElement(document.getElementById("iqtisadi_tesnifat_yeni_madde_modal"));
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
<!--Yeni paragraf yarad javascripti burada bitir-->
</div>
</div>

<!--İqtisadi təsnifat köməkçi bolmə düzəliş xatırlatma buradan başlayır -->
<div id="iqtisaditesnifat_madde_duzenle_ok" class="modal-oz">
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
          $duzelissor = $db->prepare("SELECT * FROM iqtisaditesnifat_madde where iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id");
          $duzelissor->execute(array(
            'iqtisaditesnifat_madde_id'=>$_GET['iqtisaditesnifat_madde_id']));
          $duzeliscek = $duzelissor->fetch(PDO::FETCH_ASSOC)
          ?>          
          <b style="font-size: 20px;">Yenilənən Kod: <?php echo $duzeliscek['iqtisaditesnifat_madde_kod'] ?>  
        </b>
      </p>
      <p>
       <b style="font-size: 20px;">Yenilənən Ad: <?php echo $duzeliscek['iqtisaditesnifat_madde_ad'] ?>  
     </b> 
   </p>
   <div class="container-fluid" style="text-align: center !important;">
    <div class="row " style="text-align: center !important;">              
      <button class="btn btn-dark btn-block" style="font-size: 20px;"  onclick="document.getElementById('iqtisaditesnifat_madde_duzenle_ok').style.display='none'">Bağla</button>
    </div>
  </div>
</div>
</div>
</div>
</div>
<!--İqtisadi təsnifat köməkçi bolmə düzəliş xatırlatma burada bitir -->

</div>
</div>


<!-- İqtisadi təsnifat yeni maddə yarad təsdiq modalı buradan başlayır-->
<div id="iqtisaditesnifat_yeni_madde_ok" class="modal-oz">
  <div class="modalicerikkontent">
    <div class="modal_baslik">
      <span onclick="document.getElementById('id01').style.display='none'" 
      class="w3-button w3-display-topright"><!--Bağla--></span>
    </div>
    <div class="modalcontiner" >
      <div class="modalicerik">
        <p style="text-align: center;">
         <b style="color: red;font-size: 30px;">Diqqət! </b>
       </p>
       <p style="text-align: left;">
        <?php
        $iqtisaditesnifat_yeni_madde = $db->prepare("SELECT * FROM iqtisaditesnifat_madde where iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id");
        $iqtisaditesnifat_yeni_madde->execute(array(
          'iqtisaditesnifat_madde_id'=>$_GET['son_id']));
        $iqtisaditesnifat_yeni_madde_cek = $iqtisaditesnifat_yeni_madde->fetch(PDO::FETCH_ASSOC)
        ?>
        <b style="font-size: 20px;">Yeni Maddənin<br>
        </b>
        <b style="font-size: 20px;">
          &emsp;Adı:&emsp; <span style="color: red"><?php echo $iqtisaditesnifat_yeni_madde_cek['iqtisaditesnifat_madde_ad']?></span><br>
          &emsp;Kodu: <span style="color: red"><?php echo $iqtisaditesnifat_yeni_madde_cek['iqtisaditesnifat_madde_kod']?></span>
        </b>
      </p>
    </p>
    <div class="container-fluid" style="text-align: center !important;">
      <div class="row " style="text-align: center !important;"> 
        <button class="btn btn-dark btn-block " style="font-size: 20px;"  onclick="document.getElementById('iqtisaditesnifat_yeni_madde_ok').style.display='none'">OK</button>
      </div>
    </div>
  </div>
</div>
</div>
</div>
<!-- İqtisadi təsnifat yeni maddə yarad təsdiq modalı burada bitir-->
<?php require_once 'panel/footer.php' ?> 
<!--Iqtisadi təsnifat yeni madde javascript kodu buradan başlayır -->
<?php 
if (@$_GET['iqtisaditesnifat_yeni_madde']=="ok")  {
  ?>  
  <script>
    document.getElementById('iqtisaditesnifat_yeni_madde_ok').style.display='block';
    if(typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }
    /*Hərəkət etdirmə*/
    dragElement(document.getElementById("iqtisaditesnifat_yeni_madde_ok"));
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
<!--Iqtisadi təsnifat yeni paragraf javascript kodu burada bitir-->






<?php 
if (@$_GET['iqtisaditesnifat_madde_duzenle']=="ok")  {
  ?>  
  <script>
    document.getElementById('iqtisaditesnifat_madde_duzenle_ok').style.display='block';

    if(typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }


    /*Hərəkət etdirmə*/
    dragElement(document.getElementById("iqtisaditesnifat_madde_duzenle_ok"));

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
          <h3 style="color: red;font-size: 30px; text-align: center"><b>Diqqət!</b></h3>
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
  document.getElementById("diqqet1").innerHTML = "Azərbaycan Resbublikasının büdcə xərclərinin iqtisadi təsnifatının secili maddəsi silinəçək!";
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
</div>
<!--Toplu sil yoxlanış təsdiq bitir-->