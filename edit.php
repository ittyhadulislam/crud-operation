<?php
    include ("function.php");

    $objcrudadmin = new crudApp();


    if(isset($_GET["status"]))
    {
        if($_GET["status"]='edit')
        {
            $id = $_GET["id"];
            $returndata = $objcrudadmin->data_display_by_id($id);
        }
    }

    if(isset($_POST["update_info_btn"]))
    {
        $update_data = $objcrudadmin->update_data($_POST);
    }

    $read_info = $objcrudadmin->display_data();
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
            <input class = "form-control mb-2" type="text" name = "update_name" value = "<?php echo $returndata["std_name"]; ?>">
            <input class = "form-control mb-2" type="text" name = "update_roll" value = "<?php echo $returndata["std_roll"]; ?>"><br>
            <label for="file_img"><h5>Upload Image</h5></label><br>
            <input type="file" name="update_img_file" id="" value = "<?php echo $returndata["std_img"]; ?>"><br><br>
            
            <input type="hidden" name="std_id" value = "<?php echo $returndata["ID"]; ?>">
            <p align = "center">
                <?php
                    if(isset($update_data))
                    {
                        echo $update_data;
                    }
                ?>
            </p>

            <input type="submit" value="update information" name = "update_info_btn" class= "form-control bg-warning">
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.min.js" integrity="sha384-ODmDIVzN+pFdexxHEHFBQH3/9/vQ9uori45z4JjnFsRydbmQbmL5t1tQ0culUzyK" crossorigin="anonymous"></script>
</body>
</html>