<form action="../inc/t_upload.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id_user" value="<?= $_SESSION['id'] ?>">

    <div class="upload-wrapper text-center">
      <label for="fileUpload" class="upload-label">
        <p id="fileNameDisplay" class="mb-2">Not selected file</p>
        <div class="upload-box">
          <span class="btn btn-outline-secondary px-4">Choose Files</span>
        </div>
        <input class="form-control" type="file" name="files[]" id="fileUpload" multiple hidden>
      </label>
    </div>

    <div class="text-center mt-3">
      <button type="submit" class="btn btn-primary px-4 py-2 fw-semibold rounded">
        Upload
      </button>
    </div>
  </form>
</div>

<style>
.containere {
    transform: translateX(182%);
  height: 150px;
  width: 300px;
  border-radius: 10px;
  box-shadow: 4px 4px 30px rgba(0, 0, 0, .2);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: space-between;
  padding: 10px;
  gap: 5px;
  background-color: rgba(0, 110, 255, 0.041);
}

</style>
