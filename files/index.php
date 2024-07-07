<?php require('../config/config.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

</head>

<body>
    <section>
        <div class="container py-5">
        <a class="btn btn-primary btn-sm " href="create.php" role="button">Add </a>
            <table class="table py-5">
                <thead>
                    <tr>
                        <th scope="col">sn</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Image</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT * FROM files";
                    $result = mysqli_query($con, $query);

                    if ($result) {
                        $values = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch all rows as an associative array
                        $i = 1;
                        foreach ($values as $data) {
                    ?>
                            <tr>
                                <th scope="row"><?php echo $i++; ?></th>
                                <td><?php echo htmlspecialchars($data['title']); ?></td>
                                <td><img src="<?php echo htmlspecialchars('../uploads/'. $data['file_link']); ?>" width="100" height="100" alt=""></td>
                                <td><?php echo htmlspecialchars($data['description']); ?></td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $data['id']; ?>" role="button"> Edit</a>
                                    <a class="btn btn-info btn-sm" href="show.php?id=<?php echo $data['id']; ?>" role="button"> Show</a>
                                    <a class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete data??')" href="delete.php?id=<?php echo $data['id']; ?>" role="button"> Delete</a>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No records found.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>

</html>