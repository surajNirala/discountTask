<?php
error_reporting(E_ALL & ~E_NOTICE); 
try {
	if(isset($_POST['submit'])){
	$price = $_POST['price'];
	$discount = $_POST['discount'];
	$disamount = $_POST['discount_amount'];

	if($discount == 1){

		if($disamount > $price){
			$ErrorMsg = "Please enter discount Amount lower then price.";
			//return false;
		}
		else{
		$total = $price - $disamount;

		$success = $total;
		}

	}elseif($discount == 2){

		if($disamount > $price){
			$ErrorMsg = "Please enter discount Amount lower then price.";
			//return false;
		}
		else{

		$percent = ($disamount / 100) * $price;

		$success =  $price-$percent;
	}

	}else{
		dd('error');
	}

}
} catch (Exception $e) {
	dd($e);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Discount</title>
</head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script type="text/javascript">
	function validate()
	{
		var regex = /[0-9]|\./;

		if(document.myform.price.value == "")
		{
			document.getElementById("price").style.borderColor = "red";
			document.myform.price.focus();
			return false;
		}else if(isNaN(document.myform.price.value)){

			document.getElementById("priceSpan").innerHTML = "Please Enter Numeric.";
			document.myform.discount.focus();
			return false;
			/*document.form.price.onchange = function() {
		    document.getElementById('priceSpan').removeHTML();
			}*/

		}else if(document.myform.discount.value == "" || document.myform.discount.value == 0)
		{
			document.getElementById("discount").style.borderColor = "red";
			//document.myform.discount.focus();
			return false;
		}else if(document.myform.discount_amount.value == "")
		{
			document.getElementById("discount_amount").style.borderColor = "red";
			document.myform.discount_amount.focus();
			return false;
		}else if(isNaN(document.myform.discount_amount.value)){
			//alert('Please Enter Numeric.');
			document.getElementById("discountAmount").innerHTML = "Please Enter Numeric.";
			return false
		}
	}
	$(document).ready(function(){
		//alert();
		$("#successMessage").delay(3000).slideUp(300);
		$("#errorMessage").fadeOut(5000);
		$(".priceSpan").remove();
	})
</script>
<style type="text/css">
	
	body {
    background: url('http://s.bootply.com/assets/64531/green_suburb.jpg') no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
	color:#fff;
  	background-color:#333;
  	font-family: 'Open Sans',Arial,Helvetica,Sans-Serif;
}
</style>
<body>
	<form method="post" id="myform" name="myform" onsubmit="return(validate());" class="form-horizontal">
		<fieldset>

		<!-- Form price -->
		<legend>Discount Stytem!</legend>

		<!-- Select Basic -->
		<div class="form-group">
		  <label class="col-md-4 control-label" for="selectbasic">Price</label>
		  <div class="col-md-4">
		    <input type="text" class="form-control" id=price name="price">
		    <span id="priceSpan" class="priceSpann" style="color: red;"></span>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-4 control-label" for="selectbasic">Discount Type</label>
		  <div class="col-md-4">
		    <select name="discount" id="discount" class="form-control">
		      <option value="0"></option>
		      <option value="1">Flat</option>
		      <option value="2">Percentage</option>
		    </select>
		    <span id="err" ></span>
		  </div>
		</div>
		<div class="form-group">
		  <label class="col-md-4 control-label" for="selectbasic">Discount Amount</label>
		  <div class="col-md-4">
		    <input type="text" class="form-control" id="discount_amount" name="discount_amount">
		    <span id="discountAmount" class="discountAmount" style="color:red;"></span>
		  </div>
		</div>
		<div class="form-group">
		  <div class="col-md-4 col-md-offset-4">
		  	<input type="submit" class="form-control btn btn-info" id="submit" value="Submit" name="submit">
		  </div>
		</div>
		<div id="successMessage" class="col-md-4 col-md-offset-4">
			<?php if(isset($success)) { ?>
			<p class="alert alert-success"><strong><?php echo $success; ?></strong></p>
			<?php  } ?>
		</div>
		<div id="errorMessage" class="col-md-4 col-md-offset-4">
			<?php if(isset($ErrorMsg)) { ?>
			<p class="alert alert-danger"><strong><?php echo $ErrorMsg; ?></strong></p>
			<?php  } ?>
		</div>
		</fieldset>
		</form>
</body>
</html>