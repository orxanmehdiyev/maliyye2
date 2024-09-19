<div id="sil_ok" class="modal-oz" style="padding-top: 214px;">
  <div class="modalicerikkontent" style="width: 500px;">
    <div class="modal_baslik">
      <span onclick="document.getElementById('sil_ok').style.display='none'" 
      class="w3-button w3-display-topright">Bağla
    </div>
    <div class="modalcontiner" >
      <div class="modalicerik">
        <p style="text-align: center;">
         <b style="color: red;font-size: 30px;">Silmə Əməliyyatı Uğurlu </b>
       </p>
       
       <div class="container-fluid" style="text-align: right !important;">
        <div class="justify-content-end "> 
          <button type="button" class="btn btn-outline-dark" style="font-size: 20px;"  onclick="document.getElementById('sil_ok').style.display='none'">Bağla</button>
        </div>
      </div>
    </div>
  </div>

</div>
</div>
<!-- Modal Buradan bitir-->




<div class="row">
  <div id="footer"> 2012 &copy; Marutii Admin. Brought to you by <a href="http://themedesigner.in">Themedesigner.in</a> </div>
</div>
</div>
</div>
<script src="disk/jquery/jquery.js"></script> 
<script src="disk/popper/popper.min.js" ></script>
<script src="disk/bootstrap/js/bootstrap.js"></script> 
<script src="disk/select2/js/select2.full.js"></script>
<script src="js/ajax.js"></script> 
<script src="js/javascript.js"></script> 
</div>
</div>
</div>
<script>
  /*İqtisadi təsnifat köməkci bölmə bölmə adi*/
  $(document).ready(function() {
    $(".bolme").select2({
      placeholder: "Bölmə seçin",
      allowClear: true
    });
    $(".select2_group").select2({});
  });
  /*İqtisadi təsnifat köməkci bölmə bölmə adi*/
</script>

<script>
  /*İqtisadi təsnifat köməkci bölmə bölmə adi*/
  $(document).ready(function() {
    $(".kbolme").select2({
      placeholder: "Köməkçi Bölmə seçin",
      allowClear: true
    });
    $(".select2_group").select2({});
  });
  /*İqtisadi təsnifat köməkci bölmə bölmə adi*/
</script>

<script type="text/javascript">
  window.addEventListener('keydown',function(e){if(e.keyIdentifier=='U+000A'||e.keyIdentifier=='Enter'||e.keyCode==13){if(e.target.nodeName=='INPUT'){e.preventDefault();return false;}}},true);
</script>

<?php require_once 'footer.php'     ?> 
</body>
</html>


<?php 
if ($_GET['sil']=="ok")  {
  ?>  
  <script>
    document.getElementById('sil_ok').style.display='block';

    if(typeof window.history.pushState == 'function') {
      window.history.pushState({}, "Hide", '<?php echo $_SERVER['PHP_SELF'];?>');
    }

    /*Hərəkət etdirmə*/
    dragElement(document.getElementById("sil_ok"));

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

<script>
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





<script >
 function checkAll(e) {
   var checkboxes = document.getElementsByClassName('sec');
   if (e.checked) {
     for (var i = 0; i < checkboxes.length; i++) { 
       checkboxes[i].checked = true;
     }
   } else {
     for (var i = 0; i < checkboxes.length; i++) {
       checkboxes[i].checked = false;
     }
   }
 }
</script>