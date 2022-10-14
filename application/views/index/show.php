
<?php 
include "navbar.php";
if (isset($_SESSION['user'])){
	$data = $_SESSION['user'];
}
else{
	header('location: http://localhost/HRMSGLOBAL2');
	
}
?>
<tt>
<main style="margin-top: 58px;" >
  <div class="container-fluid pt-4" style="background-color: aliceblue;">
  <center> <h1>स्वागतम <?php echo $data ?> </h1> </center> 
  <table class="table">
			<thead>
				<tr>
					<th scope="col">id</th>
					<th scope="col">Name</th>
					<th scope="col">Email</th>
					<th scope="col">Number</th>
					<th scope="col">Edit</th>
					<th scope="col">Delete</th>
				</tr>
			</thead>
			<tbody id="tbody"></tbody>
		</table>
		
  </div>
</main>


</tt>
<script>
			abc();
			function abc() {
				$.ajax({
					type: "ajax",
					url: "http://localhost/HRMSGLOBAL2/welcome/read",
					async: false,
					dataType: "json",
					success: function (data) {
						var html = "";
						for (i = 0; i < data.length; i++) {
							html +=
								"<tr>" +
								"<td>" +
								data[i].id +
								"</td>" +
								"<td>" +
								data[i].name +
								"</td>" +
								"<td>" +
								data[i].email +
								"</td>" +
								"<td>" +
								data[i].number +
								"</td>" +
								
								"<td><button class='btn btn-success'><a href=http://localhost/HRMSGLOBAL2/welcome/edit?id=" +
								data[i].id + " style='color:aliceblue'>edit</a></button></td>" +
								"<td><button class='btn btn-danger' onclick=boom(" +
								data[i].id +
								")>delete</button></td>" +
								"</tr>";
						}

						$("#tbody").html(html);
					},
				});
			}
			function boom(id) {
				$.ajax({
					url: "http://localhost/HRMSGLOBAL2/welcome/delete",
					type: "POST",
					data: { id: id },
					success: function (data) {
						alert("Delete successfully");
						window.location.reload();
					},
					error: function () {
						alert("Error");
					},
				});
			}
			
      </script>
<!--Script layout-->
<?php 
include "sidebar.php";
include "footer.php";
?>

