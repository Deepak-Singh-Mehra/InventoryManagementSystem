<?php  
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']) == 0) {
  header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Daily Expense Tracker || Manage Expense</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body>
<?php include_once('includes/header.php');?>
<?php include_once('includes/sidebar.php');?>
	
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
	<div class="row">
		<ol class="breadcrumb">
			<li><a href="#"><em class="fa fa-home"></em></a></li>
			<li class="active">Product</li>
		</ol>
	</div>

	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">Manage Product</div>
				<div class="panel-body">
					<div class="col-md-12">
						<div class="table-responsive">
							<table class="table table-bordered mg-b-0">
								<thead>
									<tr>
										<th>S.NO</th>
										<th>Product</th>
										<th>Number OF Product</th>
										<th>Date</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
<?php
$userid = $_SESSION['detsuid'];
$ret = mysqli_query($con, "SELECT * FROM tblexpense WHERE UserId='$userid'");
$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {
?>
									<tr>
										<td><?php echo $cnt; ?></td>
										<td><?php echo $row['ExpenseItem']; ?></td>
										<td><?php echo $row['ExpenseCost']; ?></td>
										<td><?php echo $row['ExpenseDate']; ?></td>
										<td>
											<a href="update-expense.php?id=<?php echo $row['ID']; ?>">Update</a>
										</td>
									</tr>
<?php
	$cnt++;
}
?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
			<?php include_once('includes/footer.php');?>
		</div>
	</div>
</div>

<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>
