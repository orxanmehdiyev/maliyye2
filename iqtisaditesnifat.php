<?php 
require_once 'panel/header.php';
require_once 'panel/menu.php';
?>
<div class="higt spadding"> 
	<div class="container-fluid border ">
		<div class="row ">
			<div class="col-md-12 col-sm-12 col-xs-12 p-1 sag" style="text-align: center;">
				<button class="btn btn-outline-dark btn-sm font-weight-bold">YENİ BÖLMƏ</button>
				
			</div>
			<hr>
		</div>
	</div>
	<div class="container-fluid border mt-1">
		<div class="row">
			
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="widget-box" style="margin-top: 0;">
					<div class="text-center">
						<h3>Azərbaycan Respublikasının Büdcə Xərclərinin İqtisadi Təsnifatı</h3>      
						<table class="table table-bordered table-hover" style="border">
							<thead>
								<tr>
									<th>№</th>
									<th><a href="iqtisaditesnifat_bolme.php">Bölmə</a></th>
									<th><a href="iqtisaditesnifat_kb.php">Köməkçi bölmə</a></th>
									<th><a href="">Paraqraf</a></th>
									<th><a href="">Maddə</a></th>
									<th><a href="">Yarım maddə</a></th>
									<th>Kod</th>
									<th>Acıqlama</th>
									<th>Status</th>
									<th>Düzəliş</th>
								</tr>
							</thead>
							<?php 
							$bolmesay=0;
							$kbsay=0;
							$paragrafsay=0;
							$maddesay=0;
							$yarimmaddesay=0;
							$iqtisaditesnifat_bolme_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_bolme order by iqtisaditesnifat_bolme_kod ASC");
							$iqtisaditesnifat_bolme_sor->execute();
							while ($iqtisaditesnifat_bolme_cek = $iqtisaditesnifat_bolme_sor->fetch(PDO::FETCH_ASSOC)) {
								$bolmesay++;
								$silid=$iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id'];
								$iqtisaditesnifat_bolme_id=$iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_id'];
								?>        
								<tbody>
									<tr>
										<td>
											<input class="sec" type="checkbox" name="bolmetoplusilid[]" value="<?php echo $iqtisaditesnifat_bolme_cek["iqtisaditesnifat_bolme_id"]; ?>" >
										</td>
										<td class="text-lg-left"><?php echo $iqtisaditesnifat_bolme_cek['iqtisaditesnifat_bolme_ad'] ?></td>
										<td></td>     
										<td></td>   
										<td></td>   
										<td></td>  
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

								$iqtisaditesnifat_kb_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_kb where iqtisaditesnifat_bolme_id=:iqtisaditesnifat_bolme_id order by iqtisaditesnifat_kb_kod ASC");
								$iqtisaditesnifat_kb_sor->execute(array(
									'iqtisaditesnifat_bolme_id'=>$iqtisaditesnifat_bolme_id));
								while ($iqtisaditesnifat_kb_cek=$iqtisaditesnifat_kb_sor->fetch(PDO::FETCH_ASSOC)) {
									$kbsil_id=$iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_id'];
									$iqtisaditesnifat_kb_id=$iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_id'];
									$kbsay++;

									?>  
									<tbody >
										<tr>
											<td>
												<input class="sec" type="checkbox" name="kbtoplusilid[]" value="<?php echo $iqtisaditesnifat_kb_cek["iqtisaditesnifat_kb_id"]; ?>" >
											</td>
											<td></td>
											<td class="text-lg-left"><?php echo $iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_ad'] ?></td>
											<td></td>
											<td></td>
											<td></td>
											<td><?php echo $iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_kod'] ?></td>
											<td class="text-lg-left"><?php echo $iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_aciqlama'] ?></td>   
											<td>
												<label class="checkbox">
													<input <?php if($iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_status']==1){
														echo "checked";
													}else{
														echo "";
													} ?>  type="checkbox" id="<?php echo $iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_id'] ?>" onchange="kb_kontrol()" > 
													<span class="checkbox"> 
														<span></span>
													</span>
												</label>

											</td>
											<td>
												<a href="iqtisaditesnifat_kb_duzelis-<?=seo($iqtisaditesnifat_kb_cek['iqtisaditesnifat_kb_id']) ?>">
													<button type="button" class="btn btn-outline-dark btn-sm">Düzəliş</button> 
												</a>
											</td>
										</tr>
									</tbody>
									<?php 

									$iqtisaditesnifat_paragraf_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_paragraf where iqtisaditesnifat_kb_id=:iqtisaditesnifat_kb_id  order by iqtisaditesnifat_paragraf_kod ASC");
									$iqtisaditesnifat_paragraf_sor->execute(array(
										'iqtisaditesnifat_kb_id'=>$iqtisaditesnifat_kb_id));
									while ($iqtisaditesnifat_paragraf_cek=$iqtisaditesnifat_paragraf_sor->fetch(PDO::FETCH_ASSOC)) {
										$iqtisaditesnifat_paragraf_id=$iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_id'];
										$paragrafsay++;
										?>        
										<tbody>
											<tr>
												<td>
													<input class="sec" type="checkbox" name="paragrafsilid[]" value="<?php echo $iqtisaditesnifat_paragraf_cek["iqtisaditesnifat_paragraf_id"]; ?>" >
												</td>              
												<td></td> 
												<td></td> 
												<td id="paragraf_ad<?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_id']?>" class="text-lg-left"><?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_ad'] ?></td>
												<td></td> 
												<td></td> 
												<td id="paragraf_kod<?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_id']?>"   ><?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_kod'] ?></td>
												<td class="text-lg-left"><?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_aciqlama'] ?></td>   
												<td>
													<label class="checkbox">
														<input <?php if($iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_status']==1){
															echo "checked";
														}else{
															echo "";
														} ?>  type="checkbox" id="<?php echo $iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_id'] ?>" onchange="paragraf_kontrol()" > 
														<span class="checkbox"> 
															<span></span>
														</span>
													</label>
												</td>  
												<td>
													<a href="iqtisaditesnifat_paragraf_duzelis-<?=seo($iqtisaditesnifat_paragraf_cek['iqtisaditesnifat_paragraf_id']) ?>">
														<button type="button"  class="btn btn-outline-dark btn-sm">Düzəliş</button> 
													</a>
												</td>     
											</tr>
										</tbody>
										<?php 

										$iqtisaditesnifat_madde_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_madde where iqtisaditesnifat_paragraf_id=:iqtisaditesnifat_paragraf_id order by iqtisaditesnifat_madde_kod ASC");
										$iqtisaditesnifat_madde_sor->execute(array(
											'iqtisaditesnifat_paragraf_id'=>$iqtisaditesnifat_paragraf_id));
										while ($iqtisaditesnifat_madde_cek=$iqtisaditesnifat_madde_sor->fetch(PDO::FETCH_ASSOC)) {
											$iqtisaditesnifat_madde_id=$iqtisaditesnifat_madde_cek["iqtisaditesnifat_madde_id"];
											$maddesay++;
											?>        
											<tbody>
												<tr>
													<td>
														<input class="sec" type="checkbox" name="maddesilis[]" value="<?php echo $iqtisaditesnifat_madde_cek["iqtisaditesnifat_madde_id"]; ?>" >
													</td>          
													<td></td> 
													<td></td> 
													<td></td> 													
													<td class="text-lg-left"><?php echo $iqtisaditesnifat_madde_cek['iqtisaditesnifat_madde_ad'] ?></td>
													<td></td> 
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

											$iqtisaditesnifat_yarimmadde_sor = $db->prepare("SELECT * FROM iqtisaditesnifat_yarimmadde where iqtisaditesnifat_madde_id=:iqtisaditesnifat_madde_id order by iqtisaditesnifat_yarimmadde_kod ASC");
											$iqtisaditesnifat_yarimmadde_sor->execute(array(
												'iqtisaditesnifat_madde_id'=>$iqtisaditesnifat_madde_id));
											while ($iqtisaditesnifat_yarimmadde_cek=$iqtisaditesnifat_yarimmadde_sor->fetch(PDO::FETCH_ASSOC)) {
													$yarimmaddesay++;
												?>        
												<tbody>
													<tr>
														<td>
															<input class="sec" type="checkbox" name="yarimmaddesilis[]" value="<?php echo $iqtisaditesnifat_yarimmadde_cek["iqtisaditesnifat_yarimmadde_id"]; ?>" >
														</td>          
														<td></td> 
														<td></td> 
														<td></td> 
														<td></td> 
														<td class="text-lg-left"><?php echo $iqtisaditesnifat_yarimmadde_cek['iqtisaditesnifat_yarimmadde_ad'] ?></td>
														<td><?php echo $iqtisaditesnifat_yarimmadde_cek['iqtisaditesnifat_yarimmadde_kod'] ?></td>
														<td class="text-lg-left"><?php echo $iqtisaditesnifat_yarimmadde_cek['iqtisaditesnifat_yarimmadde_aciqlama'] ?></td>   
														<td>
															<label class="checkbox">
																<input <?php if($iqtisaditesnifat_yarimmadde_cek['iqtisaditesnifat_yarimmadde_status']==1){
																	echo "checked";
																}else{
																	echo "";
																} ?>  type="checkbox" id="<?php echo $iqtisaditesnifat_yarimmadde_cek['iqtisaditesnifat_yarimmadde_id'] ?>" onchange="yarimmadde_status()" > 
																<span class="checkbox"> 
																	<span></span>
																</span>
															</label>
														</td>  

														<td>
															<a href="iqtisaditesnifat_yarimmadde_duzenle-<?=seo($iqtisaditesnifat_yarimmadde_cek['iqtisaditesnifat_yarimmadde_id']) ?>">
																<button type="button"  class="btn btn-outline-dark btn-sm">Düzəliş</button> 
															</a>
														</td>    
													</tr>
												</tbody>




												<?php
											}
										} 
									}
								}
							}
							?>

						</table>
						<div class="text-lg-right mr-5" style="color: red;font-size: 18px;">
							<div style="float: left;">
								<b>
									<?php 
									if($bolmesay>0){
										echo " Bölmə -";
									}else{
										echo "";
									} ?> 
									<?php echo $bolmesay;
									if($bolmesay>0){
										echo " ədəd ;";
									}else{
										echo "";
									}
									?></b>



									<hr>
									<b>
										<?php 
										if($kbsay>0){
											echo " Köməkçi bolmə -";
										}else{
											echo "";
										} ?> 
										<?php echo $kbsay;
										if($kbsay>0){
											echo " ədəd ;";
										}else{
											echo "";
										}
										?></b>
										<hr>
										<b>
											<?php 
											if($paragrafsay>0){
												echo " Praqraf -";
											}else{
												echo "";
											} ?> 
											<?php echo $paragrafsay;
											if($paragrafsay>0){
												echo " ədəd ;";
											}else{
												echo "";
											}
											?></b>
											<hr>
											<b>
												<?php 
												if($maddesay>0){
													echo " Maddə -";
												}else{
													echo "";
												} ?> 
												<?php echo $maddesay;
												if($maddesay>0){
													echo " ədəd ;";
												}else{
													echo "";
												}
												?></b>
													<hr>
											<b>
												<?php 
												if($yarimmaddesay>0){
													echo "Yarım Maddə -";
												}else{
													echo "";
												} ?> 
												<?php echo $yarimmaddesay;
												if($yarimmaddesay>0){
													echo " ədəd ;";
												}else{
													echo "";
												}
												?></b>



											</div>




										</div>
									</div>
								</div>
							</div>
						</div>
  <!-- Modal Buradan baslayir
Istifadə üçün buradan kopyalamaqq lazimdir bitdiyi yerə qədər
-->
<div id="IQT_TES_SIL_YOXLA" class="modal-oz">
	<div class="modalicerikkontent">
		<div class="modal_baslik">
			<span onclick="document.getElementById('id01').style.display='none'" 
			class="w3-button w3-display-topright"><!--Bağla--></span>
		</div>
		<div class="modalcontiner" >
			<div class="modalicerik">
				<p style="text-align: center;">
					<?php  ?>
					<b style="color: red;font-size: 30px;">Diqqət! Diqqət! </b><br> <span style="font-size: 20px;">Azərbaycan Resbublikasının büdcə xərclərinin iqtisadi dəsnifatından aşağıdakı kod silinəçək!<br>
						<b style="color: red;font-size: 20px;">Silmək istədiyinizdən əminziniz?</b>
					</span>
				</p>
				<div class="container-fluid" style="text-align: center !important;">
					<div class="row " style="text-align: center !important;"> 
						<button class="btn  btn-danger col-md-5 m-2 " style="font-size: 20px;" name="IQT_TES_SIL"  onclick="IQT_TES_SILfun()" >Sil</button>              
						<button class="btn btn-dark col-md-5 m-2" style="font-size: 20px;"  onclick="document.getElementById('IQT_TES_SIL_YOXLA').style.display='none'">İmtina Et</button>
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




<script >
	function tesyoxla(){
		var id=event.target.id;
		document.getElementById('IQT_TES_SIL_YOXLA').style.display='block';
		document.getElementsByName("IQT_TES_SIL")[0].setAttribute("id", id); 
	}
</script>
<script>
	function IQT_TES_SILfun(){ 
		var iqtisaditesnifasil_id=event.target.id;
		var iqtisaditesnifatsil_xhttp=new XMLHttpRequest();
		iqtisaditesnifatsil_xhttp.open("POST","nedmin/islem.php",true);
		iqtisaditesnifatsil_xhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		iqtisaditesnifatsil_xhttp.send("iqtisaditesnifasil_id="+iqtisaditesnifasil_id);
		iqtisaditesnifatsil_xhttp.onreadystatechange=function(){
			if (this.readyState==4 && this.status==200) {
				window.location = "iqtisaditesnifat.php"
			} else {
			}
		} 
	};
</script>