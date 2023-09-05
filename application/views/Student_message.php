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
                        <th>Image</th>
                        <th>Class</th>
                        <th>Action</th>
                    </thead>
                    <tbody id="tableRow">
					<?php foreach ($data as $student): ?>
                        <tr>
                            <td><?php echo $student['name']; ?></td>
                            <td><img src=" <?php echo base_url();?>/<?php echo $student['file_path'];?>" height="50px" width="100px" class="rounded"/></td>
                            <td><?php echo $student['student_class']; ?></td>
							<td>
								<button type="button" class="btn btn-primary"  data-mdb-toggle="modal" data-mdb-target="#editModal<?php echo  $student['id'];?>">Edit</button>
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


							<div class="modal fade" id="editModal<?php echo  $student['id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog card shadow">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Update Student </h5>
											<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body ">
										<form id="editStudentForm" enctype="multipart/form-data">
												<div class="form-group d-none">
													<label >Student ID</label>
													<input type="text" id="update_student_id"class="form-control" value="<?php echo $student['id'];?>">
												</div>
												<div class="form-group mb-3 ">
													<label >Student Name</label>
													<input type="text" id="update_name"class="form-control" value="<?php echo $student['name'];?>">
												</div>
												<div class="form-group mb-3">
													<label for="image">Student Image</label>
													<input type="file" id="update_image"  class="form-control">
												</div>
												<div class="form-group mb-3">
													<img src="<?php echo base_url(); ?>/<?php echo $student['file_path']; ?>" alt="" class="img-fluid img-thumbnail" id="old_image" style="max-width: 200px; height: 100px;">
												</div>


												<div class="form-group mb-3 ">
													<label >Class</label>
													<select id="update_student_class" class="form-select">
													<?php
														$studentClass = $student['student_class'];
														$classOptions = ["Hon's Final Year", "HSC", "SSC"];

														foreach ($classOptions as $classOption) {
															if ($classOption === $studentClass) {
																echo "<option value='$classOption' selected>$classOption</option>";
															} else {
																echo "<option value='$classOption'>$classOption</option>";
															}
														}
														?>
													</select>
												</div>
											</form>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button>
											<button type="button" id="updateBtn"  class="btn btn-danger">Update Student</button>
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
				<h5 class="modal-title" id="exampleModalLabel">Add Student </h5>
				<button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body card shadow">
			<form id="addStudentForm" enctype="multipart/form-data">
                    <div class="form-group mb-3 ">
                        <label for="name">Student Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Student Name" class="form-control">
                    </div>
                    <div class="form-group mb-3 ">
                        <label for="image">Student Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                    </div>
					<div class="form-group mb-3 ">
                        <img src="https://www.pngitem.com/pimgs/m/35-350426_profile-icon-png-default-profile-picture-png-transparent.png" alt="" class="img-fluid img-thumbnail" id="imgPreview" style="max-width: 200px; height: 100px;">
                    </div>
                    <div class="form-group mb-3 ">
                        <label for="student_class">Class</label>
                        <select id="student_class" name="student_class" class="form-select">
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

	// /*Update student ,,,,,,show image before upload*/
	// $(document).on('change','#update_image',function(evt){
	// 	this.onchange = evt => {
	// 		const [file] = this.files
	// 		if (file) {
	// 			imgPreview.src = URL.createObjectURL(file)
	// 		}
	// 	}
	// });
	// /*Update student ,,,,,,show image before upload*/







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
                    location.reload(); // Refresh the page
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




	
	 //preview image beore uploaded
	 image.onchange = evt => {
			const [file] = image.files
			if (file) {
				imgPreview.src = URL.createObjectURL(file)
			}
    	}
		



	/* Student Add Ajax call  */
	$(document).on('click','#addBtn',function(){
		// GET the form data
		var student_name=$("#name").val();
		var imageData = $("#image").prop('files')[0];
		var student_class=$("#student_class").val();

		/* Validation ruls  */
		if (student_name.length==0) {
			alert('Name is Require');
		}else if(student_class.length==0){
			alert('Student Class is Require');
		}else{
			var add_student_data = "0";

			/* Create a Form Data and append this  */
			var form_data = new FormData();
			form_data.append('file', imageData);
			form_data.append('student_name', student_name);
			form_data.append('student_class', student_class);
			form_data.append('add_student_data', add_student_data);
			/*Ajax calll Request Start */
			$.ajax({
				type: 'POST',
				url:'<?=base_url('student/add')?>',
				data: form_data,
				dataType: 'script',
				cache: false,
				contentType: false,
				processData: false,
				success: function(response) {
					if (response == 1) {
						location.reload();
					}else if(response == 2){alert("Large file not allow")}
					else if(response == 3){alert("Error moving the uploaded file")}
					else if(response == 0){alert("Invalid file extension")}
					else {
						alert('Something was wrong!!1 ');
					}
				}
			});
			/*Ajax calll Request End */
		}
	});



	/* Student Update Ajax call  */
	$(document).on('click', '#updateBtn', function (e) {
    e.preventDefault();

    // GET the form data
    var update_student_id = $("#update_student_id").val();
    var student_name = $("#update_name").val();
    var update_image = $("#update_image").prop('files')[0];
	var update_data=0;


	var old_image = $("#old_image").attr("src");
	//console.log(old_image);
		var imageName = old_image.replace("<?=base_url()?>/", "");
        
        // remove localhost:8000/ new name image/asasd43.jpg
        $("#old_image").attr("src", imageName);

		//console.log("Image Name: " + imageName);

    var update_student_class = $("#update_student_class").val();

    /* Validation rules */
    if (student_name.length == 0) {
        alert('Name is required');
    } else if (update_student_class.length == 0) {
        alert('Student Class is required');
    } else {
        // Create a FormData object and append the data
        var form_data = new FormData();
        form_data.append('update_image', update_image);
        form_data.append('old_image', imageName);
        form_data.append('student_name', student_name);
        form_data.append('update_student_class', update_student_class);
        form_data.append('update_student_id', update_student_id);
        form_data.append('update_data', update_data);

        // AJAX call to update the student data
        $.ajax({
            type: 'POST',
            url: '<?=base_url('student/update')?>', // Replace with your update URL
            data: form_data,
            dataType: 'script',
            cache: false,
            contentType: false,
            processData: false,
            success: function (response) {
                if (response == 1) {
                    location.reload();
                    // You can also reload the page or update the student data on the page if needed
                } else {
                    alert('Something went wrong: ' + response);
                }
            },
            error: function (xhr, status, error) {
                alert('Error: ' + error);
            }
        });
    }
});





});

</script>
</body>
</html>