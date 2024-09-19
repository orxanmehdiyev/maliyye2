<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php'
?>


<div class="higt spadding "  >


 <div class="container-fluid border mt-1">

   <div class="row ">
    <div class="col-md-12 col-sm-12 col-xs-12"> 

      <div class="mt-5">

        <div class="">

                 
          </div>
          <div class="x_content" >
            <form action="nedmin/islem.php" method="POST" >
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Ad:</label>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <input type="text" class="form-control" placeholder="Adı" name="iqtisaditesnifat_bolme_ad">
              </div>
            </div> 

            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <label class="control-label col-md-3 col-sm-3 col-xs-12 text-lg-right">Kod:</label>
              <div class="col-md-5 col-sm-5 col-xs-12">
                <input type="number" min="0" class="form-control" placeholder="Kod" name="iqtisaditesnifat_bolme_kod">
              </div>
            </div> 



            <!-- Ck Editör Başlangıç -->

            <div class="form-group col-md-12 col-sm-12 col-xs-12">
               <label class="control-label col-md-2 col-sm-2 col-xs-12 text-lg-right">Açıqlam</label>
              </label>
              <div class="col-md-7 col-sm-7 col-xs-12">

                <textarea  class="ckeditor" id="editor1" name="iqtisaditesnifat_bolme_aciqlama"></textarea>
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


            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <div class="col-md-6 col-sm-6 col-xs-12 offset-md-3 ">
                <button type="submit" name="iqtisadi_tesnifat_yeni_bolme" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4 mr-4 ">Ə L A V Ə &emsp; E T</button>
                <a href="javascript:history.go(-1)">
                  <button type="button" class="btn btn-outline-dark btn-sm  col-md-4 col-sm-4 col-xs-4">İ M T İ N A &emsp; E T</button>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php require_once 'panel/footer.php' ?>
