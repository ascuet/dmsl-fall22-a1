<?php session_start(); ?>
<?php include '../isLoggedIn.php' ?>
<?php include '../connection.php' ?>

<?php 
    $s = "SELECT courses.*, departments.name as department_name FROM courses INNER JOIN departments ON courses.dept_id=departments.department_id";
    $result = mysqli_query($conn, $s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Course - Show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>All Courses</h2>
        <a href="create.php" class="btn btn-secondary">Create Course</a>
        <br>
        <table class="table table-striped">
            <thead>
                <th>Code</th>
                <th>Name</th>
                <th>Credit</th>
                <th>Type</th>
                <th>Department</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php 
                    while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['course_code'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['credit'] ?></td>
                            <td><?php echo $row['type'] ?></td>
                            <td><?php echo $row['department_name'] ?></td>
                            <td>
                                <a href="edit.php?code=<?php echo $row['course_code'] ?>" class="btn btn-secondary">Edit</a>
                                <a href="delete.php?code=<?php echo $row['course_code'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php }
                ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>