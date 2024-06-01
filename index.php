<?php
    error_log(true);
    ini_set("display_errors", true);
    require_once("File.php");
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
<title>Upload Image</title>
</head>
<body>

<div class="container">
    <div class="col-md-6 my-5">
        <h5>Upload File</h5>
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="input-group">
                <input type="file" class="form-control" name="image" aria-label="Upload">
                <input class="btn btn-outline-secondary" type="submit" value="Upload"/>
            </div>
        </form>

<?php
$uploaded = File::upload("image", "uploads", "1GB");

/*
---- Listen for the file uploads from multiple file inputs ----

$first_file = File::upload("image1", "uploads", "1GB");
$second_file = File::upload("image2", "uploads", "2GB");
...

*/

if($uploaded !== false){
    $status = $uploaded["status"];
    $file_name = $uploaded["name"];
    $msg = $uploaded["msg"];
?>
    <div class="alert mt-5 alert-<?= ($status == "success") ? 'success' : 'danger'; ?>" role="alert">
        <p>Status: <?= $status ?></p>
        <p>Message: <?= $msg ?></p>
        <p>File Name: <?= (!empty($file_name)) ? $file_name : '-'; ?></p>
    </div>
<?php } ?>

</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
