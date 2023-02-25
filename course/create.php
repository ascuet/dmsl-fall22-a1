<?php include '../connection.php' ?>
<?php include '../isLoggedIn.php' ?>
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
    <title>Course - Create</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <div class="container">
        <h2>Create Course</h2>
        <form action="" method="post">
            <div class="form-group">
                <label for="">Code</label>
                <input type="text" class="form-control" name="code">
            </div>
            <div class="form-group">
                <label for="">Name</label>
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Credit</label>
                <select name="credit" class="form-control">
                    <option value="">SELECT CREDIT</option>
                    <option value="1.5">1.5 Credit</option>
                    <option value="2">2 Credit</option>
                    <option value="3">3 Credit</option>
                    <option value="4">4 Credit</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Type</label>
                <select name="type" class="form-control">
                    <option value="">SELECT TYPE</option>
                    <option value="Theory">Theory</option>
                    <option value="Lab">Lab</option>
                    <option value="Project">Project</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Department</label>
                <select name="department" class="form-control">
                    <option value="">SELECT DEPARTMENT</option>

                    <?php 
                         while($row=mysqli_fetch_assoc($result)){ ?>
                            <option value="<?php echo $row['department_id'] ?>"><?php echo $row['name'] ?></option>
                        <?php }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
    </div>
</body>
</html>
<?php 
    if(isset($_POST['submit'])){
        $course_code = $_POST['code'];
        $course_name = $_POST['name'];
        $course_credit = $_POST['credit'];
        $course_type = $_POST['type'];
        $department = $_POST['department'];
        $str = "INSERT INTO courses(course_code, name, credit, type, dept_id) 
                VALUES ('".$course_code."', '".$course_name."', '".$course_credit."', '".$course_type."', $department)";
        if(mysqli_query($conn, $str)){
            header('Location: all.php');
        }
    }
?>