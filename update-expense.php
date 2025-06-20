<?php
session_start();
include('includes/dbconnection.php');
if (strlen($_SESSION['detsuid']) == 0) {
  header('location:logout.php');
} else {
  $eid = intval($_GET['id']);

  if (isset($_POST['update'])) {
    $item = $_POST['expenseitem'];
    $cost = $_POST['expensecost'];
    $date = $_POST['expensedate'];

    $query = mysqli_query($con, "UPDATE tblexpense SET ExpenseItem='$item', ExpenseCost='$cost', ExpenseDate='$date' WHERE ID='$eid'");
    if ($query) {
      echo "<script>alert('Record updated successfully');</script>";
      echo "<script>window.location.href='manage-expense.php'</script>";
    } else {
      echo "<script>alert('Update failed');</script>";
    }
  }

  $result = mysqli_query($con, "SELECT * FROM tblexpense WHERE ID='$eid'");
  $data = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Update Expense</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container">
    <h2>Update Product Details</h2>
    <form method="post">
      <div class="form-group">
        <label>Product</label>
        <input type="text" name="expenseitem" class="form-control" value="<?php echo $data['ExpenseItem']; ?>" required>
      </div>
      <div class="form-group">
        <label>Number of Product</label>
        <input type="number" name="expensecost" class="form-control" value="<?php echo $data['ExpenseCost']; ?>" required>
      </div>
      <div class="form-group">
        <label>Date</label>
        <input type="date" name="expensedate" class="form-control" value="<?php echo $data['ExpenseDate']; ?>" required>
      </div>
      <button type="submit" name="update" class="btn btn-primary">Update</button>
    </form>
  </div>
</body>
</html>
<?php } ?>
