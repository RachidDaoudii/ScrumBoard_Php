<?php include "Connection.php";

if (isset($_POST['submit'])){
    $title = $_POST['title'];
    $type = $_POST['feature'];
    $Proirity = $_POST['priority'];
    $Status = $_POST['status'];
    $date = $_POST['date'];
    $description = $_POST['description'];


    $commande = "INSERT INTO `task` (`Id`,`Title`,`Type`,`Ptiority`,`Status`,`Date`,`Description`)
	VALEUS (9,$title,$type,$Proirity,$Status,$date,$description)";

    $resul = mysqli_query($connection,$commande);


    if($resul){
        header("location: index.php?msg = hhhh");
    }
}


?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8" />
	<title>YouCode | Scrum Board</title>
	<meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
	<meta content="" name="description" />
	<meta content="" name="author" />
	
	<!-- ================== BEGIN core-css ================== -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
	<link href="assets/css/vendor.min.css" rel="stylesheet" />
	<link href="assets/css/default/app.min.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css">
	<!-- ================== END core-css ================== -->
</head>
<body>
	<!-- BEGIN #app -->
	<div id="app" class="app-without-sidebar">
		<!-- BEGIN #content -->
		<div id="content" class="app-content main-style">
			<div class="d-flex justify-content-between">
				<div>
					<ol class="container-fluid d-flex justify-content-evenly">
						<li class="btn-home"><a href="javascript:;" class="text-decoration-none text-black">Home</a></li>
						<li class="btn-scrum">Scrum Board </li>
					</ol>
					<!-- BEGIN page-header -->
					<h1 class="page-header fw-bold p-2">
						Scrum Board 
					</h1>
					<!-- END page-header -->
				</div>
				
				<div class="btn-task align-self-center">
					<button class="btn btn-success rounded-pill d-flex" data-bs-toggle="modal" data-bs-target="#Modal" ><i class='bx bx-plus p-1' style='color:#00218b'></i> Add Task</button>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="p-2">
						<div class="">
							<h4 class="p-2 mb-0 bg-black text-light fs-6">To do (<span id="to-do-tasks-count">0</span>)</h4>
						</div>
						<div class="todo" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							
							<?php 
								//$sql = "SELECT * FROM  `task` ";
								//$res = mysqli_query($connection,$res);
								//while ($element = mysqli_fetch_assoc($res)){
									?>
									<button class=" w-100 bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal" id="btn">
										<div class="fs-2">
											<i class='bx bx-help-circle' style='color:#00d68a'></i> 
										</div>
										<div class="p-2 text-start">
											<div class="fw-bold" id="titre"><?php //echo $element['Title'] ?></div>
											<div class="pt-1">
												<div class=" text-secondary">#<?php //echo $element['Id'] ?> created in <?php //echo $element['Date'] ?></div>
												<div class="text-truncate" title=""><?php //echo $element['Description'] ?></div>
											</div>
											<div class="pt-1">
												<span class="p-1 btn btn-primary border border-0">High</span>
												<span class="p-1 btn btn-secondary border border-0 text-black">Feature</span>
											</div>
										</div>
									</button>
									<?php
								//}
							?>
							
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="p-2">
						<div class="">
							<h4 class="p-2 mb-0 bg-black text-light fs-6">In Progress (<span id="in-progress-tasks-count">0</span>)</h4>

						</div>
						<div class="progres" id="in-progress-tasks">
							<!-- IN PROGRESS TASKS HERE -->
							<button class="w-100 bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-loader-alt' style='color:#00d68a'></i> 
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Describe steps to reproduce an issue</div>
									<div class="pt-1">
										<div class="text-secondary">#6 created in 2022-10-08</div>
										<div class="text-truncate" title="including as many details as possible.">including as many details as possible.</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button>
						</div>
					</div>
				</div>
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="p-2">
						<div class="">
							<h4 class="p-2 mb-0 bg-black text-light fs-6">Done (<span id="done-tasks-count">0</span>)</h4>

						</div>
						<div class="done" id="done-tasks">
							<!-- DONE TASKS HERE -->
							<button class="w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-check-circle' style='color:#00d68a'  ></i>
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Provide access to logs</div>
									<div class="pt-1">
										<div class="text-secondary">#10 created in 2022-10-08</div>
										<div class="" title="as they can be helpful in reproducing the steps that caused the problem in the first place.">as they can be helpful in reproducing the steps that ca...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0 ">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- END #content -->
		
		
		<!-- BEGIN scroll-top-btn -->
		<a href="javascript:;" class="btn btn-icon btn-circle btn-success btn-scroll-to-top" data-toggle="scroll-to-top"><i class="fa fa-angle-up"></i></a>
		<!-- END scroll-top-btn -->
	</div>
	<!-- END #app -->
	
	<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="index.php" method="post">
							<div class="mb-3">
								<label for="title" class="from-label fw-bold">Title</label>
								<input type="text" name="Title" id="title" class="form-control">
							</div>
							<label for="type" class="from-label fw-bold">Type</label>
							<div class="mb-3">
								<div class="mb-1">
									<input type="radio" checked class="form-check-input" name="type" id="feature" value="1">
									<label for="type" class="form-check-label">feature</label>
								</div>
								<div class="mb-1">
									<input type="radio" class="form-check-input" name="type" id="bug" value="2">
									<label for="type" class="form-check-label">bug</label>
								</div>
							</div>
							<div class="mb-3">
								<label for="Priority" class="from-label fw-bold">Priority</label>
								<select name="Priority" required id="Priority" class="form-select" >
									<option disabled selected>Please select</option>
									<option value="Low">Low</option>
									<option value="Medium">Medium</option>
									<option value="High">High</option>
									<option value="Critical">Critical</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="status" class="from-label fw-bold">Status</label>
								<select name="status" required id="status" class="form-select" >
									<option value="" disabled selected>Please select</option>
									<option value="To Do">To do</option>
									<option value="In Progress">In Progress</option>
									<option value="Done">Done</option>
								</select>
							</div>
							<div class="mb-3">
								<label for="date" class="from-label fw-bold">Date</label>
								<input type="date" class="form-control" name="date" id="date">
							</div>
							<div class="mb-3">
								<label for="description" class="from-label fw-bold">Description</label>
								<textarea class="form-control" name="description" id="description" rows="10"></textarea>
							</div>
						</form>
					</div>
					<div class="modal-footer" id="modal-footer">
						<button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
						<button type="button" id="delete" onclick="delete_task()" class="btn btn-red" data-bs-dismiss="modal">Delete</button>
						<button type="button" id="submit" class="btn btn-primary" data-bs-dismiss="modal" onclick="Ajouter()">Save</button>
					</div>
				</div>
				</div>
			</div>
			<!-- Modal -->
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- <script src="assets/js/data.js"></script>
	<script src="assets/js/main.js"></script> -->
	<!-- ================== END core-js ================== -->
</body>
</html>