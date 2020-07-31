<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		  integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<!-- ///TODO: use bootstrap-->
<div class="navbar navbar-dark bg-dark">
	<div class="container">
		<a href="#" class="navbar-brand">CRUD APPLICATION - View Users</a>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-md-12" style="padding-top: 10px;">
			<?php
			$success = $this->session->userdata('success');
			if($success !=""){
			?>
			<div class="alert alert-success"><?php echo $success; ?></div>
			<?php }	?>
			<?php
			$failure = $this->session->userdata('failure');
			if($failure !=""){
			?>
			<div class="alert alert-danger"><?php echo $failure; ?></div>
			<?php }	?>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-sm-8"><h3>View User</h3></div>
		<div class="col-sm-4"><a href="<?php echo base_url().'index.php/user/create'; ?>" class="btn btn-primary">Create New</a></div>
	</div>
	<div class="row">
		<div class="col-md-12">

			<table class="table">
				<thead class="thead-dark">
				<tr>
					<th>User Id</th>
					<th>Name</th>
					<th>Email</th>
					<th width="100">Edit</th>
					<th width="100">Delete</th>
				</tr>
				</thead>
				<tbody>
				<?php if (!empty($users)) {
					foreach ($users as $user) { ?>
						<tr>
							<td><?php echo $user['user_id']; ?></td>
							<td><?php echo $user['name']; ?></td>
							<td><?php echo $user['email']; ?></td>
							<td><a href="<?php echo base_url() . 'index.php/user/edit/' . $user['user_id']; ?>"
								   class="btn btn-primary">Edit</a>
							</td>
							<td><a href="<?php echo base_url() . 'index.php/user/delete/' . $user['user_id']; ?>"
								   class="btn btn-danger">Delete</a></td>
						</tr>
					<?php }
				} else { ?>
					<tr>
						<td colspan="5">Record not found</td>
					</tr>
				<?php } ?>
				</tbody>
			</table>
		</div>
	</div>

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
</body>
</html>
