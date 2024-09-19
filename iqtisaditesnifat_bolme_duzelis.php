<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php';
$iqtisaditesnifat_bolme_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme where iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id ");
$iqtisaditesnifat_bolme_sor->execute(array(
  'iqtisaditesnifat_bolme_id'=>$_GET['iqtisaditesnifat_bolme_id']));
$iqtisaditesnifat_bolme_cek = $iqtisaditesnifat_bolme_sor->fetch(PDO::FETCH_ASSOC)
?>


<div class="higt spadding "  >


 <div class="container-fluid border mt-1">

   <div class="row ">
    <div class="col-md-12 col-sm-12 col-xs-12"> 

      <div class="mt-5">

        <div class="">

          <?php if($_GET['i_bolme'] == "no"){ ?>
            <div class="alert alert-danger mt-1" role="alert">
             <b> Bölmə Əlavə edilmədi</b>
             </div><?php }else{
              echo"";
            } ?>          
          </div>
          <div class="x_content" >
            <form action="nedmin/islem.php" method="POST" >
              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Ad:</label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="text" class="form-control" value="<?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_ad'] ?>" name="iqtisaditesnifat_bolme_ad">
                </div>
              </div> 

              <div class="form-group col-md-12 col-sm-12 col-xs-12">
                <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Kod:</label>
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <input type="number" min="0" class="form-control" value="<?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_kod'] ?>" name="iqtisaditesnifat_bolme_kod">
                </div>
              </div> 


              <!-- Ck Editör Başlangıç -->

              <div class="form-group col-md-12 col-sm-12 col-xs-12">
               <label class="control-label col-md-2 col-sm-2 col-xs-12 text-lg-right">Açıqlama:</label>
             </label>
             <div class="col-md-7 col-sm-7 col-xs-12">

              <textarea  class="ckeditor" id="editor1" name="iqtisaditesnifat_bolme_aciqlama"><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_aciqlama'] ?></textarea>
            </div>
          </div>

          <script type="text/javascript">

           CKEDITOR.replace( 'editor1',

           {

            filebrowserBrowseUrl : 'ckfinder/ckfinder.html',

            filebrowserImageBrowseUrl : 'ckfinder/ckfinder.html?type=Images',

            filebrowserFlashBrowseUrl : 'ckfinder/ckfinder.html?type=Flash',

            filebrowserUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',

            filebrowserImageUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

            filebrowserFlashUploadUrl : 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash',

            forcePasteAsPlainText: true

          } 

          );

        </script>

        <!-- Ck Editör Bitiş -->
        <input type="hidden" name="iqtisaditesnifat_bolme_id" value="<?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id'] ?>" >

        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3 ">
            <button type="button" onclick="smetaduzelisyoxla()"  class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4 mr-4 font-weight-bold">YENİLƏ</button>
            <a href="javascript:history.go(-1)">
              <button type="button" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4 font-weight-bold">İMTİNA ET</button>
            </a>
          </div>
        </div>
              <!-- Modal Buradan baslayir
İqtisadi təsnifat düzəliş təsddiq burada başlayır
-->
<div id="iqtisadi_tesnifat_bolme_duzelis_tesdiq" class="modal-oz">
  <div class="modalicerikkontent">
    <div class="modal_baslik"> 
    </div>
    <div class="modalcontiner" >
      <div class="modalicerik">
        <p style="text-align: center;">
          <b style="color: red;font-size: 30px;">Diqqət!  </b><br> <span style="font-size: 20px;"><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_kod'] ?>-<?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_ad'] ?> bölməyə düzəliş edirsiniz!<br>
            <b style="color: red;font-size: 25px;">Məlumatin yeniləmək istədiyinizdən əminsiniz?</b>
            
          </span>
        </p>
        <p>
         <b style="font-size: 25px;">Yeni Adı:&emsp;<span id="yeni_ad"></span></b><br>
         <b style="font-size: 25px;">Yeni kod:&emsp;<span id="yeni_kod"></span></b>

       </p>
       <div class="container-fluid" style="text-align: center !important;">

         <div class="row">
          <div class="col">
            <button  type="submit" name="iqtisadi_tesnifat_bolme_duzelis" class="btn  btn-danger btn-block" style="font-size: 20px;" id=" <?php echo $smetaemeliyyatcek['smeta_id']  ?>">Təsdiq et</button>
          </div>
          <div class="col">

            <button class="btn btn-dark btn-block" style="font-size: 20px;"  onclick="document.getElementById('iqtisadi_tesnifat_bolme_duzelis_tesdiq').style.display='none'">İmtina Et</button>
          </div>
        </div>
        <div class="row " style="text-align: center !important;"> 


        </div>
      </div>
    </div>
  </div>
</div>
</div>
<!-- Modal Buradan bitir-->
</form>
</div>
</div>
</div>
</div>
</div>
</div>



<?php require_once 'panel/footer.php' ?>
<script >
 function smetaduzelisyoxla(){
   var id=event.target.id;
   document.getElementById('iqtisadi_tesnifat_bolme_duzelis_tesdiq').style.display='block';
   var yenikod=document.getElementsByName("iqtisaditesnifat_bolme_kod")[0].value;
   var yeniad=document.getElementsByName("iqtisaditesnifat_bolme_ad")[0].value;
   document.getElementById("yeni_kod").innerHTML = yenikod;
   document.getElementById("yeni_ad").innerHTML =yeniad;
 }
 
 /*Hərəkət etdirmə*/
 dragElement(document.getElementById("iqtisadi_tesnifat_bolme_duzelis_tesdiq"));

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