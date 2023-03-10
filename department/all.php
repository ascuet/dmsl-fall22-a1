<?php include '../connection.php' ?>
<?php 
    $s = "SELECT * FROM departments";
    $result = mysqli_query($conn, $s);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department - Show</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>All Departments</h2>
        <table class="table table-striped">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Established</th>
            </thead>
            <tbody>
                <?php 
                    while($row=mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $row['department_id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['established_at'] ?></td>
                        </tr>
                    <?php }
                ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>