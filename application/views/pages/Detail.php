<!DOCTYPE html>
<html>
<head>
    <title>Mangga Tiga</title>
    <?php
      echo $js;
      echo $css;
	?>
	<script src="<?php echo base_url('assets/js/bootstrap-input-spinner.js'); ?>"></script>
</head>
<body>
<?php 
    echo $staticnavbarUnloggedin;
	echo $dynamicnavbar;
?>
<div class="container" style="margin-bottom:25px;">
	<div class="card">
		<div class="container-fluid">
			<div class="wrapper row">
				<div class="preview col-md-6">
					<div class="preview-pic tab-content">
					  <div class="tab-pane active" id="pic-1"><img src="mwbgod.jpg" /></div>
					  <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
					  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
					  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
					  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div>
					</div>
					<ul class="preview-thumbnail nav nav-tabs">
					  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
					</ul>			
				</div>
				<div class="details col-md-6">
					<h3 class="product-title">Mario Alexander</h3>
					<div class="container">
						<p class="product-description">Mau Cari orang untuk dibully dan dikata katai inilah produk yang tepat.</p>
						<h4 class="price">current price: <span> FREE</span></h4>
						<label>Jumlah : </label>
						<div class="row">
							<input id='txtQty' placeholder="Enter number" value="" min="0" max="50" type="number" class="input col-3" required>
						</div>
						<br>	
						<div class="action row">
							<button class="btn btn-success" type="button">Add To Cart</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php 
    echo $footer;
?>
<script>
    $("#txtQty").inputSpinner();
</script>
</body>
</html>