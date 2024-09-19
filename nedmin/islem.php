<?php
ob_start();
session_start();
date_default_timezone_set("Asia/Baku");
require_once 'baglan.php';
require_once '../panel/fonksiyon.php';


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bolme yarad başlayır*/
if (isset($_POST['iqtisadi_tesnifat_yeni_bolme'])) {
  $kaydet = $db->prepare("INSERT INTO iqtisaditesnifat_bolme SET
   iqtisaditesnifat_bolme_aciqlama=:iqtisaditesnifat_bolme_aciqlama,
   iqtisaditesnifat_bolme_ad=:iqtisaditesnifat_bolme_ad,
   iqtisaditesnifat_bolme_kod=:iqtisaditesnifat_bolme_kod");
  $insert = $kaydet->execute(array(
    'iqtisaditesnifat_bolme_aciqlama' => $_POST['iqtisaditesnifat_bolme_aciqlama'],
    'iqtisaditesnifat_bolme_ad' => $_POST['iqtisaditesnifat_bolme_ad'],
    'iqtisaditesnifat_bolme_kod' => $_POST['iqtisaditesnifat_bolme_kod']
  ));
  if ($insert) {
    $stmt = $db->query("SELECT LAST_INSERT_ID()");
    $son_id = $stmt->fetchColumn();
    header("Location:../iqtisaditesnifat_bolme.php?iqtisadi_tesnifat_yeni_bolme=ok&son_id=$son_id");
  } else {
    header("Location:../iqtisaditesnifat_bolme.php?iqtisadi_tesnifat_yeni_bolme=no");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bolme yarad bitir*/



/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bölmə düzəliş başlayır*/
if (isset($_POST['iqtisadi_tesnifat_bolme_duzelis'])) {
  $iqtisaditesnifat_bolme_id = $_POST['iqtisaditesnifat_bolme_id'];
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_bolme SET   
   iqtisaditesnifat_bolme_aciqlama=:iqtisaditesnifat_bolme_aciqlama,  
   iqtisaditesnifat_bolme_ad=:iqtisaditesnifat_bolme_ad,
   iqtisaditesnifat_bolme_kod=:iqtisaditesnifat_bolme_kod
   WHERE iqtisaditesnifat_bolme_id={$_POST['iqtisaditesnifat_bolme_id']}");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_bolme_aciqlama' => $_POST['iqtisaditesnifat_bolme_aciqlama'],
    'iqtisaditesnifat_bolme_ad' => $_POST['iqtisaditesnifat_bolme_ad'],
    'iqtisaditesnifat_bolme_kod' => $_POST['iqtisaditesnifat_bolme_kod']
  ));
  if ($update) {
    header("Location:../iqtisaditesnifat_bolme.php?iqtisadi_tesnifat_bolme_duzelis=ok&iqtisaditesnifat_bolme_id=$iqtisaditesnifat_bolme_id");
  } else {
    header("Location:../iqtisaditesnifat_bolme.php?iqtisadi_tesnifat_bolme_duzelis=no&iqtisaditesnifat_bolme_id=$iqtisaditesnifat_bolme_id");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bölmə düzəliş bitir*/



/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bölmələri aktiv ve passiv etme başlayır*/
if (isset($_POST['iqtisadi_tesnifat_bolme_status_id'])) {
  $iqtisaditesnifat_bolme_id = $_POST['iqtisadi_tesnifat_bolme_status_id'];
  $iqtisadi_tesnifat_bolme_status_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme where iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id");
  $iqtisadi_tesnifat_bolme_status_sor->execute(array(
    'iqtisaditesnifat_bolme_id' => $iqtisaditesnifat_bolme_id
  ));
  $iqtisadi_tesnifat_bolme_status_cek = $iqtisadi_tesnifat_bolme_status_sor->fetch(PDO::FETCH_ASSOC);
  if ($iqtisadi_tesnifat_bolme_status_cek['iqtisaditesnifat_bolme_status'] == 1) {
    $status = 0;
  } else {
    $status = 1;
  }
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_bolme SET     
   iqtisaditesnifat_bolme_status=:iqtisaditesnifat_bolme_status   
   WHERE iqtisaditesnifat_bolme_id=$iqtisaditesnifat_bolme_id");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_bolme_status' => $status
  ));
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bölmələri aktiv ve passiv etme bitir*/


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bölmələri toplu sil başlayır*/
if (isset($_POST["bolmetoplusilid"])) {
  $rowCount = count($_POST["bolmetoplusilid"]);
  for ($i = 0; $i < $rowCount; $i++) {
    $sil = $db->prepare("DELETE from iqtisaditesnifat_bolme where iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id");
    $kontrol = $sil->execute(array(
      'iqtisaditesnifat_bolme_id' => $_POST["bolmetoplusilid"][$i]
    ));
    if ($kontrol) {
      header("Location:../iqtisaditesnifat_bolme.php?sil=ok");
    } else {
      header("Location:../iqtisaditesnifat_bolme.php?sil=no");
    }
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının bölmələri toplu sil bitir*/






/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bolme yarad başlayır*/
if (isset($_POST['iqtisaditesnifat_yeni_kb'])) {
  $kaydet = $db->prepare("INSERT INTO iqtisaditesnifat_kb SET
    iqtisaditesnifat_kb_aciqlama=:iqtisaditesnifat_kb_aciqlama,
    iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id,
    iqtisaditesnifat_kb_ad=:iqtisaditesnifat_kb_ad,
    iqtisaditesnifat_kb_kod=:iqtisaditesnifat_kb_kod");
  $insert = $kaydet->execute(array(
    'iqtisaditesnifat_kb_aciqlama' => $_POST['iqtisaditesnifat_kb_aciqlama'],
    'iqtisaditesnifat_bolme_id' => $_POST['iqtisaditesnifat_bolme_id'],
    'iqtisaditesnifat_kb_ad' => $_POST['iqtisaditesnifat_kb_ad'],
    'iqtisaditesnifat_kb_kod' => $_POST['iqtisaditesnifat_kb_kod']
  ));
  if ($insert) {
    $stmt = $db->query("SELECT LAST_INSERT_ID()");
    $son_id = $stmt->fetchColumn();
    header("Location:../iqtisaditesnifat_kb.php?iqtisaditesnifat_yeni_kb=ok&son_id=$son_id");
  } else {
    header("Location:../iqtisaditesnifat_kb.php?iqtisaditesnifat_yeni_kb=no");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bolme yarad bitir*/


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmə düzəliş başlayır*/
if (isset($_POST['iqtisaditesnifat_kb_duzelis'])) {
  $iqtisaditesnifat_kb_id = $_POST['iqtisaditesnifat_kb_id'];
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_kb SET 
   iqtisaditesnifat_kb_aciqlama=:iqtisaditesnifat_kb_aciqlama,  
   iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id,
   iqtisaditesnifat_kb_ad=:iqtisaditesnifat_kb_ad,
   iqtisaditesnifat_kb_kod=:iqtisaditesnifat_kb_kod
   WHERE iqtisaditesnifat_kb_id={$_POST['iqtisaditesnifat_kb_id']}");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_kb_aciqlama' => $_POST['iqtisaditesnifat_kb_aciqlama'],
    'iqtisaditesnifat_bolme_id' => $_POST['iqtisaditesnifat_bolme_id'],
    'iqtisaditesnifat_kb_ad' => $_POST['iqtisaditesnifat_kb_ad'],
    'iqtisaditesnifat_kb_kod' => $_POST['iqtisaditesnifat_kb_kod']
  ));
  if ($update) {
    header("Location:../iqtisaditesnifat_kb.php?iqtisaditesnifat_kb_duzelis=ok&iqtisaditesnifat_kb_id=$iqtisaditesnifat_kb_id");
  } else {
    header("Location:../iqtisaditesnifat_kb_duzelis.php?iqtisaditesnifat_kb_duzelis=no&iqtisaditesnifat_kb_id=$iqtisaditesnifat_kb_id");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmə bitir*/



/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının kÖməkçi bölmə sil başlayır*/

if (isset($_POST["kbtoplusilid"])) {
  $rowCount = count($_POST["kbtoplusilid"]);
  for ($i = 0; $i < $rowCount; $i++) {
    $sil = $db->prepare("DELETE from iqtisaditesnifat_kb where iqtisaditesnifat_kb_id=:iqtisaditesnifat_kb_id");
    $kontrol = $sil->execute(array(
      'iqtisaditesnifat_kb_id' => $_POST["kbtoplusilid"][$i]
    ));
    if ($kontrol) {
      header("Location:../iqtisaditesnifat_kb.php?sil=ok");
    } else {
      header("Location:../iqtisaditesnifat_kb.php?sil=no");
    }
  }
}

/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının kÖməkçi bölmə sil bitir*/


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmələri aktiv ve passiv etme başlayır*/
if (isset($_POST['iqtisaditesnifat_kb_status_id'])) {
  $iqtisaditesnifat_kb_id = $_POST['iqtisaditesnifat_kb_status_id'];
  $iqtisaditesnifat_kb_status_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_kb where iqtisaditesnifat_kb_id=:iqtisaditesnifat_kb_id");
  $iqtisaditesnifat_kb_status_sor->execute(array(
    'iqtisaditesnifat_kb_id' => $iqtisaditesnifat_kb_id
  ));
  $iqtisaditesnifat_kb_status_cek = $iqtisaditesnifat_kb_status_sor->fetch(PDO::FETCH_ASSOC);

  if ($iqtisaditesnifat_kb_status_cek['iqtisaditesnifat_kb_status'] == 1) {
    $status = 0;
  } else {
    $status = 1;
  }
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_kb SET     
   iqtisaditesnifat_kb_status=:iqtisaditesnifat_kb_status   
   WHERE iqtisaditesnifat_kb_id=$iqtisaditesnifat_kb_id");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_kb_status' => $status
  ));
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmələri aktiv ve passiv etme bitir*/




/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bolme yarad başlayır*/
if (isset($_POST['iqtisaditesnifat_yeni_paragraf'])) {
  $kaydet = $db->prepare("INSERT INTO iqtisaditesnifat_paragraf SET
    iqtisaditesnifat_paragraf_aciqlama=:iqtisaditesnifat_paragraf_aciqlama,
    iqtisaditesnifat_kb_id=:iqtisaditesnifat_kb_id,
    iqtisaditesnifat_paragraf_ad=:iqtisaditesnifat_paragraf_ad,
    iqtisaditesnifat_paragraf_kod=:iqtisaditesnifat_paragraf_kod");
  $insert = $kaydet->execute(array(
    'iqtisaditesnifat_paragraf_aciqlama' => $_POST['iqtisaditesnifat_paragraf_aciqlama'],
    'iqtisaditesnifat_kb_id' => $_POST['iqtisaditesnifat_kb_id'],
    'iqtisaditesnifat_paragraf_ad' => $_POST['iqtisaditesnifat_paragraf_ad'],
    'iqtisaditesnifat_paragraf_kod' => $_POST['iqtisaditesnifat_paragraf_kod']
  ));
  if ($insert) {
    $stmt = $db->query("SELECT LAST_INSERT_ID()");
    $son_id = $stmt->fetchColumn();
    header("Location:../iqtisaditesnifat_paragraf.php?iqtisaditesnifat_yeni_paragraf=ok&son_id=$son_id");
  } else {
    header("Location:../iqtisaditesnifat_paragraf.php?iqtisaditesnifat_yeni_paragraf=no");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bolme yarad bitir*/




/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmə düzəliş başlayır*/
if (isset($_POST['iqtisaditesnifat_paragraf_duzelis'])) {
  $iqtisaditesnifat_paragraf_id = $_POST['iqtisaditesnifat_paragraf_id'];
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_paragraf SET 
   iqtisaditesnifat_paragraf_aciqlama=:iqtisaditesnifat_paragraf_aciqlama,
   iqtisaditesnifat_kb_id=:iqtisaditesnifat_kb_id,
   iqtisaditesnifat_paragraf_ad=:iqtisaditesnifat_paragraf_ad,
   iqtisaditesnifat_paragraf_kod=:iqtisaditesnifat_paragraf_kod
   WHERE iqtisaditesnifat_paragraf_id={$_POST['iqtisaditesnifat_paragraf_id']}");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_paragraf_aciqlama' => $_POST['iqtisaditesnifat_paragraf_aciqlama'],
    'iqtisaditesnifat_kb_id' => $_POST['iqtisaditesnifat_kb_id'],
    'iqtisaditesnifat_paragraf_ad' => $_POST['iqtisaditesnifat_paragraf_ad'],
    'iqtisaditesnifat_paragraf_kod' => $_POST['iqtisaditesnifat_paragraf_kod']
  ));
  if ($update) {
    header("Location:../iqtisaditesnifat_paragraf.php?iqtisaditesnifat_paragraf=ok&iqtisaditesnifat_paragraf_id=$iqtisaditesnifat_paragraf_id");
  } else {
    header("Location:../iqtisaditesnifat_paragraf_duzelis-<?=seo($iqtisaditesnifat_paragraf_id) ?>");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmə bitir*/


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının kÖməkçi bölmə sil başlayır*/

if (isset($_POST["paragrafsilid"])) {
  $rowCount = count($_POST["paragrafsilid"]);
  for ($i = 0; $i < $rowCount; $i++) {
    $sil = $db->prepare("DELETE from iqtisaditesnifat_paragraf where iqtisaditesnifat_paragraf_id=:iqtisaditesnifat_paragraf_id");
    $kontrol = $sil->execute(array(
      'iqtisaditesnifat_paragraf_id' => $_POST["paragrafsilid"][$i]
    ));
    if ($kontrol) {
      header("Location:../iqtisaditesnifat_paragraf.php?sil=ok");
    } else {
      header("Location:../iqtisaditesnifat_paragraf.php?sil=no");
    }
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının kÖməkçi bölmə sil bitir*/




/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmələri aktiv ve passiv etme başlayır*/
if (isset($_POST['iqtisaditesnifat_paragraf_status_id'])) {

  $iqtisaditesnifat_paragraf_id = $_POST['iqtisaditesnifat_paragraf_status_id'];
  $iqtisaditesnifat_paragraf_status_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_paragraf where iqtisaditesnifat_paragraf_id=:iqtisaditesnifat_paragraf_id");
  $iqtisaditesnifat_paragraf_status_sor->execute(array(
    'iqtisaditesnifat_paragraf_id' => $iqtisaditesnifat_paragraf_id
  ));
  $iqtisaditesnifat_paragraf_status_cek = $iqtisaditesnifat_paragraf_status_sor->fetch(PDO::FETCH_ASSOC);

  if ($iqtisaditesnifat_paragraf_status_cek['iqtisaditesnifat_paragraf_status'] == 1) {
    $status = 0;
  } else {
    $status = 1;
  }
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_paragraf SET     
   iqtisaditesnifat_paragraf_status=:iqtisaditesnifat_paragraf_status   
   WHERE iqtisaditesnifat_paragraf_id=$iqtisaditesnifat_paragraf_id");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_paragraf_status' => $status
  ));
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmələri aktiv ve passiv etme bitir*/


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının madde yarad başlayır*/
if (isset($_POST['iqtisaditesnifat_yeni_madde'])) {
  $kaydet = $db->prepare("INSERT INTO iqtisaditesnifat_madde SET
    iqtisaditesnifat_madde_aciqlama=:iqtisaditesnifat_madde_aciqlama,
    iqtisaditesnifat_paragraf_id=:iqtisaditesnifat_paragraf_id,
    iqtisaditesnifat_madde_ad=:iqtisaditesnifat_madde_ad,
    iqtisaditesnifat_madde_kod=:iqtisaditesnifat_madde_kod");
  $insert = $kaydet->execute(array(
    'iqtisaditesnifat_madde_aciqlama' => $_POST['iqtisaditesnifat_madde_aciqlama'],
    'iqtisaditesnifat_paragraf_id' => $_POST['iqtisaditesnifat_paragraf_id'],
    'iqtisaditesnifat_madde_ad' => $_POST['iqtisaditesnifat_madde_ad'],
    'iqtisaditesnifat_madde_kod' => $_POST['iqtisaditesnifat_madde_kod']
  ));
  if ($insert) {
    $stmt = $db->query("SELECT LAST_INSERT_ID()");
    $son_id = $stmt->fetchColumn();
    header("Location:../iqtisaditesnifat_madde.php?iqtisaditesnifat_yeni_madde=ok&son_id=$son_id");
  } else {
    header("Location:../iqtisaditesnifat_madde_yeni.php?iqtisaditesnifat_yeni_madde=no");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının madde yarad bitir*/


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddəsinə düzəliş başlayır*/
if (isset($_POST['iqtisaditesnifat_madde_duzenle'])) {
  $iqtisaditesnifat_madde_id = $_POST['iqtisaditesnifat_madde_id'];
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_madde SET 
    iqtisaditesnifat_madde_aciqlama=:iqtisaditesnifat_madde_aciqlama,
    iqtisaditesnifat_paragraf_id=:iqtisaditesnifat_paragraf_id,
    iqtisaditesnifat_madde_ad=:iqtisaditesnifat_madde_ad,
    iqtisaditesnifat_madde_kod=:iqtisaditesnifat_madde_kod
    WHERE iqtisaditesnifat_madde_id={$_POST['iqtisaditesnifat_madde_id']}");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_madde_aciqlama' => $_POST['iqtisaditesnifat_madde_aciqlama'],
    'iqtisaditesnifat_paragraf_id' => $_POST['iqtisaditesnifat_paragraf_id'],
    'iqtisaditesnifat_madde_ad' => $_POST['iqtisaditesnifat_madde_ad'],
    'iqtisaditesnifat_madde_kod' => $_POST['iqtisaditesnifat_madde_kod']
  ));
  if ($update) {
    header("Location:../iqtisaditesnifat_madde.php?iqtisaditesnifat_madde_duzenle=ok&iqtisaditesnifat_madde_id=$iqtisaditesnifat_madde_id");
  } else {
    header("Location:../iqtisaditesnifat_madde_duzenle-<?=seo($iqtisaditesnifat_madde_id) ?>");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddəsinə düzəliş bitir*/


/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmələri aktiv ve passiv etme başlayır*/
if (isset($_POST['iqtisaditesnifat_madde_status_id'])) {
  $iqtisaditesnifat_madde_id = $_POST['iqtisaditesnifat_madde_status_id'];
  $iqtisaditesnifat_madde_status_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_madde where iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id");
  $iqtisaditesnifat_madde_status_sor->execute(array(
    'iqtisaditesnifat_madde_id' => $iqtisaditesnifat_madde_id
  ));
  $iqtisaditesnifat_madde_status_cek = $iqtisaditesnifat_madde_status_sor->fetch(PDO::FETCH_ASSOC);

  if ($iqtisaditesnifat_madde_status_cek['iqtisaditesnifat_madde_status'] == 1) {
    $status = 0;
  } else {
    $status = 1;
  }
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_madde SET     
   iqtisaditesnifat_madde_status=:iqtisaditesnifat_madde_status   
   WHERE iqtisaditesnifat_madde_id=$iqtisaditesnifat_madde_id");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_madde_status' => $status
  ));
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmələri aktiv ve passiv etme bitir*/




/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddə sil başlayır*/

if (isset($_POST["maddesilis"])) {
  $rowCount = count($_POST["maddesilis"]);
  for ($i = 0; $i < $rowCount; $i++) {
    $sil = $db->prepare("DELETE from iqtisaditesnifat_madde where iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id");
    $kontrol = $sil->execute(array(
      'iqtisaditesnifat_madde_id' => $_POST["maddesilis"][$i]
    ));
    if ($kontrol) {
      header("Location:../iqtisaditesnifat_madde.php?sil=ok");
    } else {
      header("Location:../iqtisaditesnifat_madde.php?sil=no");
    }
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddə sil bitir*/




/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının yarıç madde yarad başlayır*/
if (isset($_POST['iqtisaditesnifatyeniyarimmadde'])) {
  $kaydet = $db->prepare("INSERT INTO iqtisaditesnifat_yarimmadde SET
    iqtisaditesnifat_yarimmadde_aciqlama=:iqtisaditesnifat_yarimmadde_aciqlama,
    iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id,
    iqtisaditesnifat_yarimmadde_ad=:iqtisaditesnifat_yarimmadde_ad,
    iqtisaditesnifat_yarimmadde_kod=:iqtisaditesnifat_yarimmadde_kod");
  $insert = $kaydet->execute(array(
    'iqtisaditesnifat_yarimmadde_aciqlama' => $_POST['iqtisaditesnifat_yarimmadde_aciqlama'],
    'iqtisaditesnifat_madde_id' => $_POST['iqtisaditesnifat_madde_id'],
    'iqtisaditesnifat_yarimmadde_ad' => $_POST['iqtisaditesnifat_yarimmadde_ad'],
    'iqtisaditesnifat_yarimmadde_kod' => $_POST['iqtisaditesnifat_yarimmadde_kod']
  ));
  if ($insert) {
    $stmt = $db->query("SELECT LAST_INSERT_ID()");
    $son_id = $stmt->fetchColumn();
    header("Location:../iqtisaditesnifat_yarimmadde.php?iqtisaditesnifat_yeni_yarimmadde=ok&son_id=$son_id");
  } else {
    header("Location:../iqtisaditesnifat_madde_yeni.php?iqtisaditesnifat_yeni_yarimmadde=no");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının yarıç madde yarad bitir*/





/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddəsinə düzəliş başlayır*/
if (isset($_POST['iqtisaditesnifat_yarimmadde_duzenle'])) {
  $iqtisaditesnifat_yarimmadde_id = $_POST['iqtisaditesnifat_yarimmadde_id'];
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_yarimmadde SET 
    iqtisaditesnifat_yarimmadde_aciqlama=:iqtisaditesnifat_yarimmadde_aciqlama,
    iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id,
    iqtisaditesnifat_yarimmadde_ad=:iqtisaditesnifat_yarimmadde_ad,
    iqtisaditesnifat_yarimmadde_kod=:iqtisaditesnifat_yarimmadde_kod
    WHERE iqtisaditesnifat_yarimmadde_id={$_POST['iqtisaditesnifat_yarimmadde_id']}");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_yarimmadde_aciqlama' => $_POST['iqtisaditesnifat_yarimmadde_aciqlama'],
    'iqtisaditesnifat_madde_id' => $_POST['iqtisaditesnifat_madde_id'],
    'iqtisaditesnifat_yarimmadde_ad' => $_POST['iqtisaditesnifat_yarimmadde_ad'],
    'iqtisaditesnifat_yarimmadde_kod' => $_POST['iqtisaditesnifat_yarimmadde_kod']
  ));
  if ($update) {
    header("Location:../iqtisaditesnifat_yarimmadde.php?iqtisaditesnifat_yarimmadde_duzenle=ok&iqtisaditesnifat_yarimmadde_id=$iqtisaditesnifat_yarimmadde_id");
  } else {
    header("Location:../iqtisaditesnifat_yarimmadde-<?=seo($iqtisaditesnifat_yarimmadde_id) ?>");
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddəsinə düzəliş bitir*/





if (isset($_POST['iqtisaditesnifat_yarim_madde_status_id'])) {
  $iqtisaditesnifat_yarimmadde_id = $_POST['iqtisaditesnifat_yarim_madde_status_id'];
  $iqtisaditesnifat_yarim_madde_status_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_yarimmadde where iqtisaditesnifat_yarimmadde_id=:iqtisaditesnifat_yarimmadde_id");
  $iqtisaditesnifat_yarim_madde_status_sor->execute(array(
    'iqtisaditesnifat_yarimmadde_id' => $iqtisaditesnifat_yarimmadde_id
  ));
  $iqtisaditesnifat_yarim_madde_status_cek = $iqtisaditesnifat_yarim_madde_status_sor->fetch(PDO::FETCH_ASSOC);

  if ($iqtisaditesnifat_yarim_madde_status_cek['iqtisaditesnifat_yarimmadde_status'] == 1) {
    $status = 0;
  } else {
    $status = 1;
  }
  $duzenle = $db->prepare("UPDATE iqtisaditesnifat_yarimmadde SET     
   iqtisaditesnifat_yarimmadde_status=:iqtisaditesnifat_yarimmadde_status   
   WHERE iqtisaditesnifat_yarimmadde_id=$iqtisaditesnifat_yarimmadde_id");
  $update = $duzenle->execute(array(
    'iqtisaditesnifat_yarimmadde_status' => $status
  ));
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının köməkçi bölmələri aktiv ve passiv etme bitir*/





/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddə sil başlayır*/
if (isset($_POST["yarimmaddesilis"])) {
  $rowCount = count($_POST["yarimmaddesilis"]);
  for ($i = 0; $i < $rowCount; $i++) {
    $sil = $db->prepare("DELETE from iqtisaditesnifat_yarimmadde where iqtisaditesnifat_yarimmadde_id=:iqtisaditesnifat_yarimmadde_id");
    $kontrol = $sil->execute(array(
      'iqtisaditesnifat_yarimmadde_id' => $_POST["yarimmaddesilis"][$i]
    ));
    if ($kontrol) {
      header("Location:../iqtisaditesnifat_yarimmadde.php?sil=ok");
    } else {
      header("Location:../iqtisaditesnifat_yarimmadde.php?sil=no");
    }
  }
}
/*Azərbaycan Respublikasının büdcə xərclərinin iqtisadi təsnifatının maddə sil bitir*/








/*Budcə smeta yarat baslayir*/
if (isset($_POST['budce_smeta'])) {
  $tarix = date("d.m.Y");
  $kaydet = $db->prepare("INSERT INTO smeta SET
    smeta_tarix=:smeta_tarix,
    smeta_status=:smeta_status,
    vesait=:vesait");
  $insert = $kaydet->execute(array(
    'smeta_tarix' => $tarix,
    'smeta_status' => 0,
    'vesait' => 1
  ));

  if ($insert) {
    $stmt = $db->query("SELECT LAST_INSERT_ID()");
    $smeta_id = $stmt->fetchColumn();
    $bolmesor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme where iqtisaditesnifat_bolme_status=:iqtisaditesnifat_bolme_status");
    $bolmesor->execute(array(
      'iqtisaditesnifat_bolme_status' => 1
    ));
    while ($bolmecek = $bolmesor->fetch(PDO::FETCH_ASSOC)) {
      $iqtisaditesnifat_bolme_id = $bolmecek['iqtisaditesnifat_bolme_id'];
      $kaydet = $db->prepare("INSERT INTO smeta_detay SET
      smeta_id=:smeta_id,
      madde_ad=:madde_ad,
      madde_kod=:madde_kod,
      bome_id=:bome_id,
      bome_ust=:bome_ust");
      $insert = $kaydet->execute(array(
        'smeta_id' => $smeta_id,
        'madde_ad' => $bolmecek['iqtisaditesnifat_bolme_ad'],
        'madde_kod' => $bolmecek['iqtisaditesnifat_bolme_kod'],
        'bome_id' => $bolmecek['iqtisaditesnifat_bolme_id'],
        'bome_ust' => 0
      ));

      if ($insert) {
        $komekcibolmesor = $db->prepare("SELECT * FROM iqtisaditesnifat_kb where  iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id and iqtisaditesnifat_kb_status=:iqtisaditesnifat_kb_status");
        $komekcibolmesor->execute(array(
          'iqtisaditesnifat_bolme_id' => $iqtisaditesnifat_bolme_id,
          'iqtisaditesnifat_kb_status' => 1
        ));
        while ($komekcibolmecek = $komekcibolmesor->fetch(PDO::FETCH_ASSOC)) {
          $iqtisaditesnifat_kb_id = $komekcibolmecek['iqtisaditesnifat_kb_id'];
          $kaydet = $db->prepare("INSERT INTO smeta_detay SET
        smeta_id=:smeta_id,
        madde_ad=:madde_ad,
        madde_kod=:madde_kod,
        iqtisaditesnifat_kb_id=:iqtisaditesnifat_kb_id,
        kb_ustid=:kb_ustid");
          $insert = $kaydet->execute(array(
            'smeta_id' => $smeta_id,
            'madde_ad' => $komekcibolmecek['iqtisaditesnifat_kb_ad'],
            'madde_kod' => $komekcibolmecek['iqtisaditesnifat_kb_kod'],
            'iqtisaditesnifat_kb_id' => $komekcibolmecek['iqtisaditesnifat_kb_id'],
            'kb_ustid' => $komekcibolmecek['iqtisaditesnifat_bolme_id']
          ));
          if ($insert) {
            $paragrafsor = $db->prepare("SELECT * FROM iqtisaditesnifat_paragraf where  iqtisaditesnifat_kb_id=:iqtisaditesnifat_kb_id and iqtisaditesnifat_paragraf_status=:iqtisaditesnifat_paragraf_status");
            $paragrafsor->execute(array(
              'iqtisaditesnifat_kb_id' => $iqtisaditesnifat_kb_id,
              'iqtisaditesnifat_paragraf_status' => 1
            ));
            while ($paragarfcek = $paragrafsor->fetch(PDO::FETCH_ASSOC)) {
              $iqtisaditesnifat_paragraf_id = $paragarfcek['iqtisaditesnifat_paragraf_id'];
              $kaydet = $db->prepare("INSERT INTO smeta_detay SET
            smeta_id=:smeta_id,
            madde_ad=:madde_ad,
            madde_kod=:madde_kod,
            pargarf_id=:pargarf_id,
            pargarf_ustid=:pargarf_ustid");
              $insert = $kaydet->execute(array(
                'smeta_id' => $smeta_id,
                'madde_ad' => $paragarfcek['iqtisaditesnifat_paragraf_ad'],
                'madde_kod' => $paragarfcek['iqtisaditesnifat_paragraf_kod'],
                'pargarf_id' => $paragarfcek['iqtisaditesnifat_paragraf_id'],
                'pargarf_ustid' => $paragarfcek['iqtisaditesnifat_kb_id']
              ));

              if ($insert) {
                $maddesor = $db->prepare("SELECT * FROM iqtisaditesnifat_madde where  iqtisaditesnifat_paragraf_id=:iqtisaditesnifat_paragraf_id and iqtisaditesnifat_madde_status=:iqtisaditesnifat_madde_status");
                $maddesor->execute(array(
                  'iqtisaditesnifat_paragraf_id' => $iqtisaditesnifat_paragraf_id,
                  'iqtisaditesnifat_madde_status' => 1
                ));
                while ($maddecek = $maddesor->fetch(PDO::FETCH_ASSOC)) {
                  $iqtisaditesnifat_madde_id = $maddecek['iqtisaditesnifat_madde_id'];
                  $kaydet = $db->prepare("INSERT INTO smeta_detay SET
              smeta_id=:smeta_id,
              madde_ad=:madde_ad,
              madde_kod=:madde_kod,
              madde_id=:madde_id,
              madde_ust=:madde_ust");
                  $insert = $kaydet->execute(array(
                    'smeta_id' => $smeta_id,
                    'madde_ad' => $maddecek['iqtisaditesnifat_madde_ad'],
                    'madde_kod' => $maddecek['iqtisaditesnifat_madde_kod'],
                    'madde_id' => $maddecek['iqtisaditesnifat_madde_id'],
                    'madde_ust' => $maddecek['iqtisaditesnifat_paragraf_id']
                  ));

                  if ($insert) {
                    $yarimmaddesor = $db->prepare("SELECT * FROM iqtisaditesnifat_yarimmadde where  iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id and iqtisaditesnifat_yarimmadde_status=:iqtisaditesnifat_yarimmadde_status");
                    $yarimmaddesor->execute(array(
                      'iqtisaditesnifat_madde_id' => $iqtisaditesnifat_madde_id,
                      'iqtisaditesnifat_yarimmadde_status' => 1
                    ));
                    while ($yarimmaddecek = $yarimmaddesor->fetch(PDO::FETCH_ASSOC)) {
                      $kaydet = $db->prepare("INSERT INTO smeta_detay SET
                smeta_id=:smeta_id,
                madde_ad=:madde_ad,
                madde_kod=:madde_kod,
                yarimmadde_id=:yarimmadde_id,
                yarimmadde_ust=:yarimmadde_ust");
                      $insert = $kaydet->execute(array(
                        'smeta_id' => $smeta_id,
                        'madde_ad' => $yarimmaddecek['iqtisaditesnifat_yarimmadde_ad'],
                        'madde_kod' => $yarimmaddecek['iqtisaditesnifat_yarimmadde_kod'],
                        'yarimmadde_id' => $yarimmaddecek['iqtisaditesnifat_yarimmadde_id'],
                        'yarimmadde_ust' => $yarimmaddecek['iqtisaditesnifat_madde_id']
                      ));
                    }
                    if ($insert) {

                      header("Location:../smeta.php?buccesmeta=ok");
                    } else {
                      header("Location:../smeta.php?buccesmeta=no");
                    }
                  } else {
                    header("Location:../smeta.php?buccesmeta=no");
                  }
                }
              } else {
                header("Location:../smeta.php?buccesmeta=maddenos");
              }
            }
          } else {
            header("Location:../smeta.php?buccesmeta=maddenoa");
          }
        }
      } else {
        header("Location:../smeta.php?buccesmeta=maddenoa");
      }
    }
  } else {
    header("Location:../smeta.php?buccesmeta=maddenoa");
  }
}







/*Budcə smeta yarat bitir*/



/*Xüsusi smeta yarat baslayir*/
if (isset($_POST['xususi_smeta'])) {
  $kaydet = $db->prepare("INSERT INTO smeta SET
    smeta_status=:smeta_status,
    vesait=:vesait");
  $insert = $kaydet->execute(array(
    'smeta_status' => 0,
    'vesait' => 2
  ));

  if ($insert) {
    $stmt = $db->query("SELECT LAST_INSERT_ID()");
    $smeta_id = $stmt->fetchColumn();
    $iqtisaditesnifatsor = $db->prepare("SELECT * FROM iqtisaditesnifat where iqtisaditesnifat_status=:iqtisaditesnifat_status");
    $iqtisaditesnifatsor->execute(array(
      'iqtisaditesnifat_status' => 1
    ));
    while ($iqtisaditesnifatcek = $iqtisaditesnifatsor->fetch(PDO::FETCH_ASSOC)) {
      $kaydet = $db->prepare("INSERT INTO smeta_detay SET
      smeta_id=:smeta_id,
      vesait=:vesait,
      iqtisaditesnifat_id=:iqtisaditesnifat_id,
      iqtisaditesnifat_ust_id=:iqtisaditesnifat_ust_id,
      iqtisaditesnifat_ad=:iqtisaditesnifat_ad,
      iqtisaditesnifat_kod=:iqtisaditesnifat_kod");
      $insert = $kaydet->execute(array(
        'smeta_id' => $smeta_id,
        'vesait' => 2,
        'iqtisaditesnifat_id' => $iqtisaditesnifatcek['iqtisaditesnifat_id'],
        'iqtisaditesnifat_ust_id' => $iqtisaditesnifatcek['iqtisaditesnifat_ust_id'],
        'iqtisaditesnifat_ad' => $iqtisaditesnifatcek['iqtisaditesnifat_ad'],
        'iqtisaditesnifat_kod' => $iqtisaditesnifatcek['iqtisaditesnifat_kod']
      ));
    }
    if ($insert) {
      header("Location:../smeta.php?xususismeta=ok");
    } else {
      header("Location:../smeta.php?xususismeta=no");
    }
  } else {
    header("Location:../smeta.php?xususismeta=noss");
  }
}






/*Smeta sil baslayır*/
if (isset($_POST['smetasil_id'])) {
  $sil = $db->prepare("DELETE from smeta where smeta_id=:smeta_id");
  $kontrol = $sil->execute(array(
    'smeta_id' => $_POST['smetasil_id']
  ));
  if ($kontrol) {
    $smetadetaysor = $db->prepare("SELECT * FROM smeta_detay where smeta_id=:smeta_id ");
    $smetadetaysor->execute(array(
      'smeta_id' => $_POST['smetasil_id']
    ));
    while ($smetadetaycek = $smetadetaysor->fetch(PDO::FETCH_ASSOC)) {
      $smeta_id = $smetadetaycek['smeta_id'];
      $sil = $db->prepare("DELETE from smeta_detay where smeta_id=:smeta_id");
      $kontrol = $sil->execute(array(
        'smeta_id' => $smeta_id
      ));
    }
  }
}
/*Smeta sil bitir*/
