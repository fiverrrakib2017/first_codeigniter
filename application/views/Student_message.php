<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Student Message</title>
	<!-- Font Awesome -->
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
	rel="stylesheet"
	/>
	<!-- Google Fonts -->
	<link
	href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
	rel="stylesheet"
	/>
	<!-- MDB -->
	<link
	href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.css"
	rel="stylesheet"
	/>
</head>
<body>
<div class="container">
	<div class="row mt-5">

	<table class="table table-bordered" >
                    <thead class="bg-success text-white">
                        <th>Student Name</th>
                        <th>Image</th>
                        <th>Class</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="tableRow">
					<?php foreach ($result as $student): ?>
                        <tr>
                            <td><?php echo $student['name']; ?></td>
                            <td><?php echo $student['class']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                    
                </table>





		<!-- <div class="col-md-6">
			<div class="card">
				<div class="card-header">
					Student Add
				</div>
				<div class="card-body">
					<form action="">
						<div class="form-group">
							<label for="">Username</label>
							<input type="text" placeholder="Enter Username" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Password</label>
							<input type="password" placeholder="Enter Your Password" class="form-control">
						</div>
						<div class="form-group">
							<label for="">Address</label>
							<textarea type="text" placeholder="Enter Your Address" class="form-control"></textarea>
						</div>
					</form>
				</div>
				<button class="btn btn-primary">Add Now</button>
			</div>
		</div> -->
	</div>
</div>



<!-- MDB -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	
});

</script>
</body>
</html>