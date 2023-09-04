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
		<div class="card">
			<div class="card-header"><button class="btn btn-warning"data-mdb-toggle="modal" data-mdb-target="#addModal">Add Student</button></div>
			<div class="card-body">
				<table class="table table-bordered" >
                    <thead class="bg-success text-white">
                        <th>Student Name</th>
                        <th>Class</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="tableRow">
					<?php foreach ($data as $student): ?>
                        <tr>
                            <td><?php echo $student['name']; ?></td>
                            <td><?php echo $student['student_class']; ?></td>
							<td>
								<a href="" class="btn btn-primary">Edit</a>
								<button type="button" class="btn btn-danger"  data-mdb-toggle="modal" data-mdb-target="#deleteModal<?php echo  $student['id'];?>">Delete</button>
							</td>
                        </tr>



						<!-- Modal -->
							<div class="modal fade" id="deleteModal<?php echo  $student['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Delete Student </h5>
									<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">Are you sure! You delete this file</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
									<button type="button" id="deleteBtn" data-id="<?php echo $student['id'];?>" class="btn btn-danger">Delete Student</button>
								</div>
								</div>
							</div>
							</div>
                    <?php endforeach; ?>
                    </tbody>
                </table>
			</div>
		</div>

	</div>
</div>

<!----ADD Modal ----->
<!-- Modal -->
<div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Delete Student </h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form action="">
					<div class="form-group">
						<label for="">Student Name</label>
						<input type="text"  placeholder="Enter Student Name" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Student Image</label>
						<input type="file" placeholder="Student Image" class="form-control">
					</div>
					<div class="form-group">
						<label for="">Class</label>
						<select type="file" class="form-control">
							<option value="">----Select---</option>
							<option value="Hon's Final Year">Hon's Final Year</option>
							<option value="HSC">HSC</option>
							<option value="SSC">SSC</option>
						</select>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
				<button type="button" id="addBtn"  class="btn btn-danger">Add Student</button>
			</div>
		</div>
	</div>
</div>


<!-- MDB -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.1/mdb.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

$(document).ready(function(){
	$(document).on('click','#deleteBtn',function(){
		var studentId=$(this).data('id');
		$.ajax({
            url: '<?=base_url('student/delete')?>', // Modify the URL to match your controller method
            type: 'POST',
            data: { id: studentId },
            success: function(response) {
                if (response==1) {
					//alert(response.success);
                    // Student deleted successfully
                    // You can display a success message or refresh the page
                    location.reload(); // Refresh the page for example
                } else {
                    // Error occurred
                    toastr.error('Error deleting student');
                }
            },
            error: function(xhr, status, error) {
                // Handle AJAX errors here
                toastr.error('AJAX Error: ' + error);
            }
        });
	});
});

</script>
</body>
</html>