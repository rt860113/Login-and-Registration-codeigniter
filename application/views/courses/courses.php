<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Courses</title>
</head>
<body>
	<p><?= $this->session->userdata('error_t');?></p>
	<div>
		<h1>Add a new course</h1>
		<form action="<?php echo base_url('/courses/create')?>" method='post'>
			<label>Course Name:</label><input type="text" name="name"><br>
			<label>Description:</label><input type="text" name="description"><br>
			<input type="submit" value="Add">
		</form>
	</div>
	<div>
		<form action="<?php echo base_url('/courses/destroy')?>" method='post'>
			<input type="submit" value="Delete">
		</form>
	</div>
	<div>
		<h2>Courses</h2>
		<table>
			<thead>
				<th>Course Name</th>
				<th>Description</th>
				<th>Date Added</th>
			</thead>
			<tbody>
			<?php foreach ($result as $value):?>
				<tr>
					<td><?= $value['name']?></td>
					<td><?= $value['description']?></td>
					<td><?= $value['created_at']?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>
	
</body>
</html>