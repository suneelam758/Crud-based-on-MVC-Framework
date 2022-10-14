<?php 
include "navbar.php";
?>
<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4">

    <form id="insertform">
			<br />NAME:<input name="name" value="" type="text" class="form-control"/>

			<br />EMAIL:<input name="email" value="" type="email" class="form-control"/>

			<br />NUMBER:<input name="number" value="" type="number" class="form-control"/>

			<br />TELEPHONE:<input name="telephone" value="" type="tel" class="form-control"/>

			<br />PASSWORD:<input name="password" value="" type="password" class="form-control"/>

			<br />CHECKBOX:<input
				name="checkbox[]"
				value="cirket"
				type="checkbox" class="form-control"
			/>cricket
			<input name="checkbox[]" value="shoopting" type="checkbox" class="form-control"/>shooting
			<input name="checkbox[]" value="fencing" type="checkbox" class="form-control"/>fencing

			<br />DATE:<input name="date" value="" type="date" class="form-control"/>

			<br />MONTH:<input name="month" value="" type="month" class="form-control"/>

			<br />RADIO:<input name="radio" value="punjabi" type="radio" class="form-control"/>panjabi
			<input name="radio" value="hindi" type="radio" class="form-control"/>hindi
			<input name="radio" value="english" type="radio" class="form-control"/>english

			<br />RANGE:<input
				name="range_input"
				id="range_input"
				value=""
				type="range"
				class="form-control"/>

			<br />COLLEGE:<select name="select_input" value="" id="" class="form-control">
				<option value="">choose collage</option>
				<option value="ITM">itm</option>
				<option value="IIITM">iiitm</option>
				<option value="IPS">ips</option>
			</select>
			<br />COLOR:<input name="color" value="" type="color" class="form-control"/>

			<br /><button  type="submit" class="btn btn-success form-control">
				Register
			</button>
		</form>
  </div>
</main>
<!--Main layout-->
<script>
 $(document).ready(function()
 {
	$("#insertform").submit(function(e) {
	 e.preventDefault();
	 var data1 = $("#insertform").serialize();
	//  console.log(data1)
				$.ajax({
					type: 'POST',
					url: 'http://localhost/HRMSGLOBAL2/welcome/read1',
					data: data1,
					success: function(data) {
						// console.log(data);
						alert("insert successfully");
					},
				});
			});
 })
</script>
<?php
include "sidebar.php";
include "footer.php";
?>

<!-- <a href="http://localhost/HRMSGLOBAL_MVC/login/logout">BUTTON</a> -->
