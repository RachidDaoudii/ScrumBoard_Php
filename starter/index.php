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
					<button class="btn btn-success rounded-pill d-flex" data-bs-toggle="modal" data-bs-target="#Modal" ><i class='bx bx-plus p-1' style='color:#00218b'></i> Add Task</a>
				</div>
			</div>
			<?php
				require 'Connection.php'	
			?>
			
			<!-- Modal -->
			<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
				<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Add Task</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					</div>
					<div class="modal-body">
						<form action="#">
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
			<div class="row">
				<div class="col-lg-4 col-md-6 col-sm-12">
					<div class="p-2">
						<div class="">
							<h4 class="p-2 mb-0 bg-black text-light fs-6">To do (<span id="to-do-tasks-count">0</span>)</h4>
						</div>
						<div class="todo" id="to-do-tasks">
							<!-- TO DO TASKS HERE -->
							<button class=" w-100 bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal" id="btn">
								<div class="fs-2">
									<i class='bx bx-help-circle' style='color:#00d68a'></i> 
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold" id="titre">Keep all the updated requirements in one place</div>
									<div class="pt-1">
										<div class=" text-secondary">#1 created in 2022-10-08</div>
										<div class="text-truncate" title="">There is hardly anything more frustrating than having t...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary border border-0 text-black">Feature</span>
									</div>
								</div>
							</button>
							<!-- <button class="w-100 bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-help-circle' style='color:#00d68a'></i>  
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Consider creating an acceptance criteria list</div>
									<div class="pt-1">
										<div class="text-secondary">#2 created in 2022-10-08</div>
										<div class="" title="Descriptive requirements are very helpful when it comes to understanding the context of a problem, yet finally it is good to precisely specify what is expected. Thus the developer will not have to look for the actual requirements in a long, descriptive text but he will be able to easily get to the essence. One might find that sometimes — when acceptance criteria are well defined — there is little or no need for any additional information. Example:
						a) User navigates to “/accounts” and clicks on red download CSV button
						b) Popup appears with two buttons: “This year” and “Last year”
						c) If user clicked on “Last year” download is initiated
						d) CSV downloaded includes following columns…">Descriptive requirements are very helpful when it comes...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary btn-sm border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Feature</span>
									</div>
								</div>
							</button>
							<button class="w-100 bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-help-circle' style='color:#00d68a'></i>  
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Provide examples, credentials, etc</div>
									<div class="pt-1">
										<div class="text-secondary">#3 created in 2022-10-08</div>
										<div class="" title="">If the expectation is to process or generate some file ...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Feature</span>
									</div>
								</div>
							</button>
							<button class="w-100 bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-help-circle' style='color:#00d68a'></i>  
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Annotate</div>
									<div class="pt-1">
										<div class="text-secondary">#4 created in 2022-10-08</div>
										<div class="" title="">The mockup provided can sometimes be confusing for deve...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Feature</span>
									</div>
								</div>
							</button>
							<button class="w-100 bg-white border-0 rounded-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-help-circle' style='color:#00d68a'></i>  
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Use charts and diagrams</div>
									<div class="pt-1">
										<div class="text-secondary">#5 created in 2022-10-08</div>
										<div class="" title="">While it is not always necessary, sometimes it might be...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Feature</span>
									</div>
								</div>
							</button> -->
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
							<!-- <button class="w-100 bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-loader-alt' style='color:#00d68a'></i> 
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Provide access</div>
									<div class="pt-1">
										<div class="text-secondary">#7 created in 2022-10-08</div>
										<div class="" title="to the affected account and services if possible. It might be hard to reproduce the exact environment on a local machine.">to the affected account and services if possible. It mi...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button>
							<button class="w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-loader-alt' style='color:#00d68a'></i> 
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Provide environment information</div>
									<div class="pt-1">
										<div class="text-secondary">#8 created in 2022-10-08</div>
										<div class="" title="i.e., browser version, operating system version etc. Sometimes a list of installed browser plugins and extensions might be helpful as well.">i.e., browser version, operating system version etc. So...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button>
							<button class="w-100 bg-white bg-white border-0 rounded-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-loader-alt' style='color:#00d68a'></i>  
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Provide a link to an exception and/or a stack trace</div>
									<div class="pt-1">
										<div class="text-secondary">#9 created in 2022-10-08</div>
										<div class="" title="as investigating those is usually the first step to take in resolving the problem.">as investigating those is usually the first step to tak...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button> -->
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
							<!-- <button class="w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-check-circle' style='color:#00d68a'  ></i> 
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Provide access to the affected server or database dump</div>
									<div class="pt-1">
										<div class="text-secondary">#11 created in 2022-10-08</div>
										<div class="" title="If it is possible and when it does not violate security policies, it is usually helpful for the developer to access the original data that might have played a role in the problem.">If it is possible and when it does not violate security...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button>
							<button class="w-100 bg-white bg-white border-0 border-secondary border-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-check-circle' style='color:#00d68a'  ></i> 
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Make a screencast</div>
									<div class="pt-1">
										<div class="text-secondary">#12 created in 2022-10-08</div>
										<div class="" title="It is not always necessary, but many times a short screencast (or at least a screenshot) says more than a thousand words. While working on MacOS you can use QuickTime Player for the purpose but there are plenty of tools available for other operating systems as well.">It is not always necessary, but many times a short scre...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="bp-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button>
							<button  class="w-100 bg-white bg-white border-0 rounded-bottom d-flex" data-bs-toggle="modal" data-bs-target="#Modal">
								<div class="fs-2">
									<i class='bx bx-check-circle' style='color:#00d68a'  ></i>
								</div>
								<div class="p-2 text-start">
									<div class="fw-bold">Provide contact information</div>
									<div class="pt-1">
										<div class="text-secondary">#13 created in 2022-10-08</div>
										<div class="" title="of the person that reported the bug. This will not always be possible, but in some cases it might be advantageous and most effective if a developer can have a chat with a person that actually experienced the bug, especially if the steps to reproduce a problem are not deterministic.">of the person that reported the bug. This will not alwa...</div>
									</div>
									<div class="pt-1">
										<span class="p-1 btn btn-primary border border-0">High</span>
										<span class="p-1 btn btn-secondary btn-sm border border-0 text-black">Bug</span>
									</div>
								</div>
							</button> -->
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
	
	<!-- TASK MODAL -->
	<div class="modal fade" id="modal-task">
		<!-- Modal content goes here -->
	</div>
	
	<!-- ================== BEGIN core-js ================== -->
	<script src="assets/js/vendor.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<!-- <script src="assets/js/data.js"></script>
	<script src="assets/js/main.js"></script> -->
	<!-- ================== END core-js ================== -->
</body>
</html>