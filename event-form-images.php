<label for="image-1">Obrázek 1</label><input type="file" id="image-1" name="image-1" accept=".jpg,.png,.jpeg" <?php if(!empty($img_required)) { echo $img_required; } ?> />	
						<div class="error"><?php if(!empty($error_img1)) { echo $error_img1; } ?></div>	
						<label for="image-2">Obrázek 2</label><input type="file" id="image-2" name="image-2" accept=".jpg,.png,.jpeg" />						
						<div class="error"><?php if(!empty($error_img2)) { echo $error_img2; } ?></div>	
						<label for="image-3">Obrázek 3</label><input type="file" id="image-3" name="image-3" accept=".jpg,.png,.jpeg" />						
						<div class="error"><?php if(!empty($error_img3)) { echo $error_img3; } ?></div>	

						<script type="text/javascript">

							var uploadField1 = document.getElementById("image-1");
							var uploadField2 = document.getElementById("image-2");
							var uploadField3 = document.getElementById("image-3");
							var fileExtension = "";

							uploadField1.onchange = function () {

								if (uploadField1.value.lastIndexOf(".") > 0) {
						            fileExtension = uploadField1.value.substring(uploadField1.value.lastIndexOf(".") + 1, uploadField1.value.length);
						        }

						        if (fileExtension.toLowerCase() != "jpeg" && fileExtension.toLowerCase() != "jpg"  && fileExtension.toLowerCase() != "png") {
								       alert(fileExtension+" - Omlouváme se, ale fotografie musí být ve formátu: JPG, JPEG nebo PNG");
								       this.value = "";
						        }
							    if(this.files[0].size > 4194304){
							       alert("Omlouváme se, ale fotografie je příliš velká, maximální velikost činí 4MB");
							       this.value = "";
							    };
							};

							uploadField2.onchange = function () {

								if (uploadField2.value.lastIndexOf(".") > 0) {
						            fileExtension = uploadField2.value.substring(uploadField2.value.lastIndexOf(".") + 1, uploadField2.value.length);
						        }

						        if (fileExtension.toLowerCase() != "jpeg" && fileExtension.toLowerCase() != "jpg"  && fileExtension.toLowerCase() != "png") {
								       alert(fileExtension+" - Omlouváme se, ale fotografie musí být ve formátu: JPG, JPEG nebo PNG");
								       this.value = "";
						        }
							    if(this.files[0].size > 4194304){
							       alert("Omlouváme se, ale fotografie je příliš velká, maximální velikost činí 4MB");
							       this.value = "";
							    };
							};

							uploadField3.onchange = function () {

								if (uploadField3.value.lastIndexOf(".") > 0) {
						            fileExtension = uploadField3.value.substring(uploadField3.value.lastIndexOf(".") + 1, uploadField3.value.length);
						        }

						        if (fileExtension.toLowerCase() != "jpeg" && fileExtension.toLowerCase() != "jpg"  && fileExtension.toLowerCase() != "png") {
								       alert(fileExtension+" - Omlouváme se, ale fotografie musí být ve formátu: JPG, JPEG nebo PNG");
								       this.value = "";
						        }
							    if(this.files[0].size > 4194304){
							       alert("Omlouváme se, ale fotografie je příliš velká, maximální velikost činí 4MB");
							       this.value = "";
							    };
							};

						</script>