<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php'
?>
<div class="higt spadding">
 <div class="container-fluid border mt-1">
   <div class="row ">
    <div class="col-md-12 col-sm-12 col-xs-12"> 
      <div class="mt-5">
       <div class="x_content">
        <form action="nedmin/islem.php" method="POST">
          <div class="form-group col-md-12 col-sm-12 col-xs-12">
            <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right" >Üst bölmə</label>
            <div class="col-md-5 col-sm-5 col-xs-12">
              <select class=" form-control bolme select2_single"  name="iqtisaditesnifat_bolme_id">
                <option></option>
                <?php 
                $iqtisaditesnifat_bolme_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme where iqtisaditesnifat_bolme_status=:iqtisaditesnifat_bolme_status order by iqtisaditesnifat_bolme_kod ASC");
                $iqtisaditesnifat_bolme_sor->execute(array(
                  'iqtisaditesnifat_bolme_status'=>1));
                  while ($iqtisaditesnifat_bolme_cek = $iqtisaditesnifat_bolme_sor->fetch(PDO::FETCH_ASSOC)) {?>    
                    <option value="<?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id'] ?>"><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_kod'] ?> - <?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_ad'] ?></option>
                  <?php } ?>                    
                </select>
              </div>
            </div>

            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Köməkçi Bölməin Adı:</label>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <input type="text" min="0" class="form-control"  id="yeniad" placeholder="Adı" name="iqtisaditesnifat_kb_ad">
              </div>
            </div> 

            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Köməkçi Bölməin Kodu:</label>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <input type="number" min="0" class="form-control"  id="yenikod" placeholder="Kod" name="iqtisaditesnifat_kb_kod">
              </div>
            </div> 


            <!-- Ck Editör Başlangıç -->

            <div class="form-group col-md-12 col-sm-12 col-xs-12">
             <label class="control-label col-md-2 col-sm-2 col-xs-12 text-lg-right">Açıqlam</label>
           </label>
           <div class="col-md-7 col-sm-7 col-xs-12">

            <textarea  class="ckeditor" id="editor1" name="iqtisaditesnifat_kb_aciqlama"></textarea>
          </div>
        </div>



        <!-- Ck Editör Bitiş -->


        <div class="form-group col-md-12 col-sm-12 col-xs-12">
          <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3 ">
            <button type="button" onclick="iqtisadi_tesnifat_kb_yeni()" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4 mr-4 ">Ə L A V Ə &emsp; E T</button>
            <a href="javascript:history.go(-1)">
              <button type="button" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4">İ M T İ N A &emsp; E T</button>
            </a>
          </div>
        </div>



        <!--Yeni köməkçi bölmə yarad modalı buradan başlayır -->

        <div id="iqtisadi_tesnifat_kb_yeni_modal" class="modal-oz">
          <div class="modalicerikkontent">
            <div class="modal_baslik">
              <span onclick="document.getElementById('id01').style.display='none'" 
              class="w3-button w3-display-topright"><!--Bağla--></span>
            </div>
            <div class="modalcontiner" >
              <div class="modalicerik">
                <p style="text-align: center;">
                  <b style="color: red;font-size: 30px;">Diqqət!
                  </b>
                </p>
                <p>
                  <b style="font-size: 20px;">Yeni Köməkçi Bölmənin <br>
                  </b>

                  <b style="font-size: 20px;">
                   &emsp;Adı:&emsp; <span style="color: red" id="yenitesdiq_ad"></span><br>
                   &emsp;Kodu: <span style="color: red" id="yenitesdiq_kod"></span>
                 </b>
               </p>
               <p style="text-align: center;">
                <b style="color: red;font-size: 30px;">Əlavə Etmək İstəyirsiniz?
                </b>
              </p>
              <div class="container-fluid" style="text-align: center !important;">
                <div class="row " style="text-align: center !important;"> 
                  <button type="submit" class="btn btn-danger col-md-5 m-2" id="yeni_kbgonder" style="font-size: 20px;" name="iqtisaditesnifat_yeni_kb" >Təsdiqlə</button>              
                  <button type="button" class="btn btn-dark col-md-5 m-2" style="font-size: 20px;"  onclick="document.getElementById('iqtisadi_tesnifat_kb_yeni_modal').style.display='none'">İmtina Et</button>
                </div>
              </div>
            </div>
          </div>

        </div>
      </div>

      <!--Yeni köməkçi bölmə yarad modalı burada bitir-->


    </form>
  </div>
</div>
</div>
</div>
</div>
</div>
<?php require_once 'panel/footer.php' ?>

<!--Yeni köməkçi bölmə yarad javascripti buradan başlayır-->
<script >
 function iqtisadi_tesnifat_kb_yeni(){
   document.getElementById('iqtisadi_tesnifat_kb_yeni_modal').style.display='block';
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
   document.getElementById("yenibolmetesdiq_ad").innerHTML = "Bölmə adını yazın ";
   document.getElementById("yenibolmetesdiq_kod").innerHTML = "Bölmə kodunu yazin ";
   document.getElementById('iqtisadi_tesnifat_yeni_bolmeid').setAttribute("disabled", "")
 }

}

/*Hərəkət etdirmə*/
dragElement(document.getElementById("iqtisadi_tesnifat_kb_yeni_modal"));

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
<!--Yeni köməkçi bölmə yarad javascripti burada bitir-->