<?php require "Connection.php";?>
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


	<!-- Ajouter -->
	<?php 
		require "Connection.php";

		// extract($_POST);

		if(isset($_POST['save'])){
			$title = $_POST['Title'];
			$type = $_POST['Type'];
			$Proirity = $_POST['Priority'];
			$Status = $_POST['Status'];
			$date = $_POST['Date'];
			$description = $_POST['Description'];

			if(isset($title) && isset($type) && isset($Proirity) && isset($Status) && isset($date) && isset($description)){
				$commande ="INSERT INTO `task`(`Title`, `Type`, `Priority`, `Status`, `Date`, `Description`)
				VALUES ('$title','$type','$Proirity','$Status','$date','$description')";
				$resul = mysqli_query($connection,$commande);
				header('location:index.php');
			}
		}
	?>
	<!-- Ajouter -->


	<!-- Update -->
	<?php 
		if(isset($_POST['return'])){
			$id = $_POST['Id'];
			$sql = "SELECT * FROM `task` WHERE Id = $id LIMIT 1";
			$res = mysqli_query($connection,$sql);
			$row = mysqli_fetch_assoc($res);
		}
		
	?>
	<!-- Update -->
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
					<button id="addTask" class="btn btn-success rounded-pill d-flex" data-bs-toggle="modal" data-bs-target="#Modal" ><i class='bx bx-plus p-1' style='color:#00218b'></i> Add Task</button>
				</div>
			</div>
			<div class="row">
				
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="p-2">
						<div class="">
							<?php ?>
							<h4 class="p-2 mb-0 bg-black text-light fs-6">To do (<span id="to-do-tasks-count">0</span>)</h4>
						</div>
						<div class="todo" id="to_do_tasks">
							<!-- TO DO TASKS HERE -->
							<?php 
								$commande = "SELECT * FROM  `task` WHERE status = 'To Do'";
								$sql= mysqli_query($connection,$commande);
								while ($element = mysqli_fetch_assoc($sql)){
									?>
									<div name="return" onclick="'?id=<?php echo $element['Id'] ?>'" id="<?php echo $id = $element['Id'] ?>" class="show w-100 bg-white border-0 border-secondary border-bottom d-flex" >
										<div class="fs-2">
											<i class='bx bx-help-circle' style='color:#00d68a'></i> 
										</div>
										<div class="p-2 text-start">
											<div class="fw-bold" id="titre"><?php echo $element['Title'] ?></div>
											<div class="pt-1">
												<div class=" text-secondary">#<?php echo $element['Id'] ?> created in <?php echo $element['Date'] ?></div>
												<div class="text-truncate" title=""><?php echo $element['Description'] ?></div>
											</div>
											<div class="pt-1">
												<span class="p-1 btn btn-primary border border-0"><?php echo $element['Priority'] ?></span>
												<span class="p-1 btn btn-secondary border border-0 text-black"><?php echo $element['Type'] ?></span>
												<a class="up" href="index.php?id=<?php echo $element['Id'] ?>">Update</a>
											</div>
										</div>
								</div>
									<?php
								};
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
							<?php 
								$commande = "SELECT * FROM  `task` WHERE status = 'In Progress'";
								$sql= mysqli_query($connection,$commande);
								while ($element = mysqli_fetch_assoc($sql)){
									?>
									<button name="return" onclick="//location.href='Update.php?id=<?php// echo $element['Id'] ?>'"  class="w-100 bg-white border-0 border-secondary border-bottom d-flex button_task" data-bs-toggle="modal" data-bs-target="#Modal">
										<div class="fs-2">
											<i class='bx bx-loader-alt' style='color:#00d68a'></i> 
										</div>
										<div class="p-2 text-start">
											<div class="fw-bold" id="titre"><?php echo $element['Title'] ?></div>
											<div class="pt-1">
												<div class=" text-secondary">#<?php echo $element['Id'] ?> created in <?php echo $element['Date'] ?></div>
												<div class="text-truncate" title=""><?php echo $element['Description'] ?></div>
											</div>
											<div class="pt-1">
												<span class="p-1 btn btn-primary border border-0"><?php echo $element['Priority'] ?></span>
												<span class="p-1 btn btn-secondary border border-0 text-black"><?php echo $element['Type'] ?></span>
											</div>
										</div>
									</button>
									<?php
								};
							?>
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
							<?php 
								$commande = "SELECT * FROM  `task` WHERE status = 'Done'";
								$sql= mysqli_query($connection,$commande);
								while ($element = mysqli_fetch_assoc($sql)){
									?>
									<button name="return" onclick="//location.href='?id=<?php// echo $element['Id'] ?>'" class="show w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex btn_update" data-bs-toggle="modal" data-bs-target="#Modal">
										<div class="fs-2">
											<i class='bx bx-check-circle' style='color:#00d68a'  ></i>
										</div>
										<div class="p-2 text-start">
											<div class="fw-bold" id="titre"><?php echo $element['Title'] ?></div>
											<div class="pt-1">
												<div class=" text-secondary">#<?php echo $element['Id'] ?> created in <?php echo $element['Date'] ?></div>
												<div class="text-truncate" title=""><?php echo $element['Description'] ?></div>
											</div>
											<div class="pt-1">
												<span class="p-1 btn btn-primary border border-0"><?php echo $element['Priority'] ?></span>
												<span class="p-1 btn btn-secondary border border-0 text-black"><?php echo $element['Type'] ?></span>
											</div>
										</div>
									</button>
									<?php
								};
							?>
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
	
	<!--------------------------------- Modal ------------------------------------------------>
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="" method="post">
				<div class="mb-3">
					<label for="title" class="from-label fw-bold">Title</label>
					<input type="text" name="Title" id="title" class="form-control" placeholder="Title" value="<?php echo $row['Title']?>">
				</div>
				<label for="type" class="from-label fw-bold">Type</label>
				<div class="mb-3">
					<div class="mb-1">
						<input type="radio" checked class="form-check-input" name="Type" id="feature" value="feature"<?php //echo ($row['Type']=='feature')?"checked":"";?>>
						<label for="type" class="form-check-label">feature</label>
					</div>
					<div class="mb-1">
						<input type="radio" class="form-check-input" name="Type" id="bug" value="bug"<?php //echo ($row['Title']=='bug')?"checked":"";?>>
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
					<select name="Status" required id="status" class="form-select" >
						<option value="" disabled selected>Please select</option>
						<option value="To Do">To do</option>
						<option value="In Progress">In Progress</option>
						<option value="Done">Done</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="Date" class="from-label fw-bold">Date</label>
					<input type="date" class="form-control" name="Date" id="date" value="<?php //echo $row['Date']?>">
				</div>
				<div class="mb-3">
					<label for="description" class="from-label fw-bold">Description</label>
					<textarea class="form-control" name="Description" id="description" rows="10" value="<?php //echo $row['Description']?>"></textarea>
				</div>
				<div class="modal-footer" id="modal-footer">
					<button type="submit" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
					<button type="submit" id="delete" name="delete" class="btn btn-red" data-bs-dismiss="modal">Delete</button>
					<button type="submit" id="submit" name="save"  class="btn btn-primary" data-bs-dismiss="modal">Save</button>
				</div>
			</form>
		</div>
		
	</div>
	</div>
</div>
<!-- Modal -->


<!--------------------------------- Modal Update------------------------------------------------>
<!-- <div class="modal fade" id="Modal_update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="update.php" method="post">
				<div class="mb-3">
					<label for="title" class="from-label fw-bold">Title</label>
					<input type="text" name="Title" id="title" class="form-control" placeholder="Title">
				</div>
				<label for="type" class="from-label fw-bold">Type</label>
				<div class="mb-3">
					<div class="mb-1">
						<input type="radio" checked class="form-check-input" name="Type" id="feature" value="feature">
						<label for="type" class="form-check-label">feature</label>
					</div>
					<div class="mb-1">
						<input type="radio" class="form-check-input" name="Type" id="bug" value="bug">
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
					<select name="Status" required id="status" class="form-select" >
						<option value="" disabled selected>Please select</option>
						<option value="To Do">To do</option>
						<option value="In Progress">In Progress</option>
						<option value="Done">Done</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="Date" class="from-label fw-bold">Date</label>
					<input type="date" class="form-control" name="Date" id="date">
				</div>
				<div class="mb-3">
					<label for="description" class="from-label fw-bold">Description</label>
					<textarea class="form-control" name="Description" id="description" rows="10"></textarea>
				</div>
				<div class="modal-footer" id="modal-footer">
					<button type="submit" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
					<button type="submit" id="delete" onclick="" class="btn btn-red" data-bs-dismiss="modal">Delete</button>
					<button type="submit" id="update" name="update" class="btn btn-primary" data-bs-dismiss="modal" onclick="">Updatas</button>
				</div>
			</form>
		</div>
		
	</div>
	</div>
</div> -->
<!-- Modal -->




	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- <script src="assets/js/data.js"></script> -->
	<script src="assets/js/main.js"></script>
	<!-- ================== END core-js ================== -->
</body>
</html>