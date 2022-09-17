<?php
    class crudApp
    {
        private $conn;

        public function __construct()
        {
            $db_host = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "crudapp";

            // $dbhost = 'localhost';
            // $dbuser = 'root';
            // $dbpass = "";
            // $dbname = 'crudapp';

            $this->conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

            if (!$this->conn)
            {
                die("connection unsuccessful!!");
            }
        }

        public function add_info($data)
        {
            $std_name = $data["name"];
            $std_roll = $data["roll"];
            $std_img = $_FILES["img_file"]["name"];
            $tmp_img = $_FILES["img_file"]["tmp_name"];

            $query = "INSERT INTO STUDENTS(std_name,std_roll,std_img) VALUES('{$std_name}','{$std_roll}','{$std_img}')";

            if(mysqli_query($this->conn, $query))
            {
                move_uploaded_file($tmp_img, "upload/" . $std_img);
                return "Information Added Successfully";
            }

        }

        public function display_data()
        {
            $query = "SELECT * FROM STUDENTS";

            if(mysqli_query($this->conn, $query))
            {
                $returndata = mysqli_query($this->conn, $query);

                return $returndata;
            }
        }

        public function data_display_by_id($id)
        {
            $query = "SELECT * FROM STUDENTS WHERE ID = $id";

            if(mysqli_query($this->conn, $query))
            {
                $display_by_id = mysqli_query($this->conn, $query);
                $fatch_data_id = mysqli_fetch_assoc($display_by_id);
                
                return $fatch_data_id;
            }
        }

        public function update_data($data)
        {
            $update_std_name = $data["update_name"];
            $update_std_roll = $data["update_roll"];
            $update_std_img = $_FILES["update_img_file"]["name"];
            $update_tmp_name = $_FILES["update_img_file"]["tmp_name"];
            $id_no = $data["std_id"];

            $query = "UPDATE STUDENTS SET std_name = '$update_std_name', std_roll = $update_std_roll, std_img = '$update_std_img' WHERE ID = $id_no";
            // $query = "UPDATE students SET std_name='$std_name', std_roll=$std_roll, stg_img='$std_img' WHERE id=$idno";

            if(mysqli_query($this->conn, $query))
            {
                move_uploaded_file($update_tmp_name, "upload/" . $update_std_img);
                return "Information Updated Successfully";
            }
        }

        public function delete_info($ID)
        {
            $chatch_info_query = "SELECT * FROM STUDENTS WHERE ID = $ID ";
            $del_by_id = mysqli_query($this->conn, $chatch_info_query);
            $fatch_info = mysqli_fetch_assoc($del_by_id);
            $del_img = $fatch_info["std_img"];
            $query = "DELETE FROM STUDENTS WHERE ID = $ID";

            if(mysqli_query($this->conn, $query))
            {
                unlink("upload/".$del_img);
                header("location:index.php");
                return "Information Deleted Successfully";
            }
        }

    }

?>