<?php

require "Connection.php";


// if(isset($_POST['return'])){
//     $id = $_POST['Id'];
//     $sql = "SELECT * FROM `task` WHERE Id = $id LIMIT 1";
//     $res = mysqli_query($connection,$sql);
//     $row = mysqli_fetch_assoc($res);
// }
    $title ='';
    if(isset($_POST['edit'])){
        $id = $_POST['edit'];
        $sql = "SELECT * FROM `task` WHERE Id = $id LIMIT 1";
        $res = mysqli_query($connection,$sql);
        $row = $res->fetch_array();
        if(count($row)==1){
            $title = $row['Title'];
            $type = $row['Type'];
            $proirity = $row['Proirity'];
            $status = $row['Status'];
            $date = $row['Date'];
            $description = $row['Description'];
        }
    }
    
?>


	<!-------------------------------------------- Modal-Update ------------------------------------------------>
    <div class="modal fade" id="update<?php echo $element['Id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
	<div class="modal-content">
		<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLabel">Update Task</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
		</div>
		<div class="modal-body">
			<form action="chen.php?id=<?php echo $element['Id']?>" method="post">
				<div class="mb-3">
					<label for="title" class="from-label fw-bold">Title</label>
					<input type="text" name="Title" id="title" class="form-control" placeholder="Title" value="<?php echo $element['Title'];?>">
				</div>
				<label for="type" class="from-label fw-bold">Type</label>
				<div class="mb-3">
					<div class="mb-1">
						<input type="radio" checked class="form-check-input" name="Type" id="feature" value="feature"<?php echo ($element['Type']=='feature')?"checked":"";?>>
						<label for="type" class="form-check-label">feature</label>
					</div>
					<div class="mb-1">
						<input type="radio" class="form-check-input" name="Type" id="bug" value="bug"<?php echo ($element['Type']=='bug')?"checked":"";?>>
						<label for="type" class="form-check-label">bug</label>
					</div>
				</div>
				<div class="mb-3">
					<label for="Priority" class="from-label fw-bold">Priority</label>
					<select name="Priority" required id="Priority" class="form-select" >
						<option disabled selected>Please select</option>
						<option value="Low"<?php echo ($element['Priority']=='Low')?"selected":"";?>>Low</option>
						<option value="Medium"<?php echo ($element['Priority']=='Medium')?"selected":"";?>>Medium</option>
						<option value="High"<?php echo ($element['Priority']=='High')?"selected":"";?>>High</option>
						<option value="Critical"<?php echo ($element['Priority']=='Critical')?"selected":"";?>>Critical</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="status" class="from-label fw-bold">Status</label>
					<select name="Status" required id="status" class="form-select" >
						<option value="" disabled selected>Please select</option>
						<option value="To Do"<?php echo ($element['Status']=='To Do')?"selected":"";?>>To do</option>
						<option value="In Progress"<?php echo ($element['Status']=='In Progress')?"selected":"";?>>In Progress</option>
						<option value="Done"<?php echo ($element['Status']=='Done')?"selected":"";?>>Done</option>
					</select>
				</div>
				<div class="mb-3">
					<label for="Date" class="from-label fw-bold">Date</label>
					<input type="date" class="form-control" name="Date" id="date" value="<?php echo $element['Date']?>">
				</div>
				<div class="mb-3">
					<label for="description" class="from-label fw-bold">Description</label>
					<textarea class="form-control" name="Description" id="description" rows="10"><?php echo $element['Description']?></textarea>
				</div>
				<div class="modal-footer" id="modal-footer">
					<button type="submit" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
					<button type="submit" name="delete" class="btn btn-red" data-bs-dismiss="modal">Delete</button>
					<button type="submit" name="btn-update"  class="btn btn-primary" data-bs-dismiss="modal">Update</button>
				</div>
			</form>
		</div>
		
	</div>
	</div>
</div>
<!-- Modal -->
