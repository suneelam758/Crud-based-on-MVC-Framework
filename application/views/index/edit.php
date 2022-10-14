	<?php 
include "navbar.php";
include "sidebar.php";
?>
<!--Main layout-->
<?php
if(isset($_GET['id'])){
  $id=$_GET['id'];
}
?>
<main style="margin-top: 58px;">
  <div class="container pt-4">
  <form id="updateform">
	<input type="hidden" id="id3" name="id" value="<?php echo $id;?>">
			<br />NAME:<input name="user" id="name" value="" type="text" class="form-control" />

			<br />EMAIL:<input name="email" id="email" value="" type="email" class="form-control"/>

			<br />NUMBER:<input id="number" name="number" value="" type="number" class="form-control"/>

			<br />TELEPHONE:<input id="telephone" name="telephone"	value="" type="tel"
			/>

			<br />PASSWORD:<input	id="password"	name="password"	value=""	type="password"
			/>

			<br />CHECKBOX:<input	name="checkbox[]"	value="cricket"	type="checkbox" class="form-control"	/>cricket
			<input name="checkbox[]" value="shooting" type="checkbox" class="form-control"/>shooting
			<input name="checkbox[]" value="fencing" type="checkbox" class="form-control"/>fencing

			<br />DATE:<input name="date" id="date" value="" type="date" class="form-control"/>

			<br />MONTH:<input name="month" id="month" value="" type="month" class="form-control"/>

			<br />RADIO:<input name="radio"	id="radio"	value="punjabi"	type="radio"class="form-control"/>Sanskrit
			 <input name="radio" value="hindi" type="radio" class="form-control"/> Hindi
			<input name="radio" value="english" type="radio" class="form-control"/>English

			<br />RANGE:<input	name="range_input"	id="range_input"	value=""	type="range" class="form-control"	/>

			<br />COLLEGE:<select name="select_input" value="" id="" class="form-control">
				<option value="">choose collage</option>
				<option value="ITM">itm</option>
				<option value="IIITM">iiitm</option>
				<option value="IPS">ips</option>
			</select>
			<br />COLOR:<input name="color" id="color" value="" type="color" class="form-control" />

			<br /><button type="submit" class="btn btn-success">
				save
			</button>
		</form>

  </div>
</main>
<!--Main layout-->
<script>
  upd();
  function upd() {
	  var id=document.getElementById('id3').value;

	             $.ajax({
					url: "http://localhost/HRMSGLOBAL2/welcome/formalldata",
					type: "POST",
					data: { id: id },
					dataType: "json",
					success:function(response){
						$("#name").val(response.name);
						$("#email").val(response.email);
						$("#number").val(response.number);
						$("#telephone").val(response.telephone);
						$("#password").val(response.password);
						$("#checkbox").val(response.checkbox);
						$("#date").val(response.date);
						$("#month").val(response.month);
						$("#radio").val(response.radio);
						$("#range_input").val(response.range_input);
						$("#select_input").val(response.select_input);
						$("#color").val(response.color);
					},
					error: function () {
						alert("Error");
					},
				});
			}
			
	$("#updateform").submit(function() {
				$.ajax({
					type: 'POST',
					url: 'http://localhost/HRMSGLOBAL2/welcome/update/38',
					data: $("#updateform").serialize(),
					dataType: "json",
					success: function(data) {
						 
						alert("update successfully");
						window.location = "http://localhost/HRMSGLOBAL2/welcome/index";
					},
					error: function () {
						alert("Error");
					},
				});
			});

		
</script>
<?php
include "footer.php";
?>

