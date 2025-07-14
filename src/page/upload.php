<form action="../inc/t_upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">
    <input type="file" name="files[]" multiple>
    <input type="submit" value="Upload">
</form>