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
        <h3 class="text-center">Create Task </h3>
        <a class="btn btn-primary btn-sm " href="index.php" role="button"> back</a>

        <?php

        if(isset($_GET['id'])){
            $id= $_GET['id'];
            $select="SELECT *FROM form where id=$id";
            $select_result= mysqli_query($con, $select);
            $data=mysqli_fetch_assoc($select_result);
        }

        ?>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">User Name</label>
                <input type="text" class="form-control" readonly value="<?php  echo $data['name'] ?>" name="name" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" name="email" readonly value="<?php  echo $data['email'] ?>" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            </div>

        </form>
    </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>

</html>