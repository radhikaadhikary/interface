<?php require('../config/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
</head>

<body>
    <div class="container w-25 shadow my-5 p-3 mx-auto">
        <!-- <a class="btn btn-primary btn-sm " href="index.php" role="button">layout </a> -->

        <h3 class="text-center">Create Task </h3>

        <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];

            $filename = $_FILES['dataFile']['name'];
            $filesize = $_FILES['dataFile']['size'];

            $explode = explode('.', $filename);
            $file = strtolower($explode['0']);
            $ext = strtolower($explode['1']);

            $lastfile = str_replace(' ', '', $file);

            $finalname = $lastfile . time() . '.' . $ext;
            
            $description = $_POST['description'];

            if ($title != "" && $description != "") {

                if ($filesize < 1024 * 1024) {
                    if($ext=='jpg' || $ext=='png'){
                        if(move_uploaded_file($_FILES['dataFile']['tmp_name'],'../uploads/'.$finalname)){
                            $query= "INSERT INTO files (title,file_link, description, type) VALUES('$title', '$finalname', '$description', '$ext')";
                            $result= mysqli_query($con , $query);

                            if($result){
                                echo "file  is submitted";
                                header('Refresh:2;');
                            }
                            else{
                                echo 'file is not submitted';
                            }
                        }

                    }else{
                        echo " ext does not match";
                    }
                } else {
                    echo "file size must be lessthan 2MB";
                }
            } else {
                echo "field are required";
            }
        }
        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">File name</label>
                <input type="text" class="form-control" name="title" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Image</label>
                <input type="file" name="dataFile" class="form-control" id="exampleInputPassword1">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>