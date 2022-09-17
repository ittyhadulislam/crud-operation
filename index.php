<?php
    include ("function.php");

    $objcrudadmin = new crudApp();

    if(isset($_POST["info_btn"]))
    {
        $returnmsg = $objcrudadmin->add_info($_POST);
    }

    $read_info = $objcrudadmin->display_data();

    if(isset($_GET["status"]))
    {
        if($_GET["status"] = "delete")
        {
            $delete_id = $_GET["id"];
            $delete_info = $objcrudadmin->delete_info($delete_id);

        }
    }
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CRUD OPERATION</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>
<body>

    <div class="container my-4 p-5 shadow">
        <h2><a href="index.php" style = "text-decoration : none;">CRUD OPERATION</a></h2>
        <form class= "form" action="" method="post" enctype = "multipart/form-data">
            <input class = "form-control mb-2" type="text" name = "name" placeholder = "Enter Name">
            <input class = "form-control mb-2" type="text" name = "roll" placeholder = "Enter Roll"><br>
            <label for="file_img"><h5>Upload Image</h5></label><br>
            <input type="file" name="img_file" id=""><br><br>
            <p align = "center">
                <?php
                if(isset($returnmsg))
                {
                    echo $returnmsg;
                }
                if(isset($delete_info))
                {
                    echo $delete_info;
                }
                ?>
            </p>
            <input type="submit" value="submit" name = "info_btn" class= "form-control bg-warning">
        </form>
    </div>

    <div class="container my-4 p-5 shadow">
        <table class = "table table-responsive">
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Roll</th>
                <th>Image</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php while($display = mysqli_fetch_assoc($read_info))      
                    {
                ?>
                <tr>
                    <td><?php echo $display["ID"] ?></td>
                    <td><?php echo $display["std_name"] ?></td>
                    <td><?php echo $display["std_roll"] ?></td>
                    <td><img src="upload/<?php echo $display["std_img"] ?> " style = "height : 70px;"></td>
                    <td>
                        <a href="edit.php?status=edit&&id=<?php echo $display['ID']; ?>" class = "btn btn-success">Edit</a>
                        <a href="?status=delete&&id=<?php echo $display["ID"] ?>" class = "btn btn-warning">Delete</a>
                    </td>
                </tr>
                <?php
                    } 
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>