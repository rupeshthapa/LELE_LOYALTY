<div class="modal fade" id="editSectorModal" aria-labelledby="sectorModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editSectorForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="sectorModalLabel">Edit Sector</h5>
          <button type="button" class="btn-close" id="sectorEditCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- sector Name -->
          <div class="mb-3" id="sectorNameDiv">
            <label for="sectorEdit_id" class="form-label">Title</label>
            <input type="text" class="form-control" id="edit_sector_title" name="title">
            <div class="invalid-feedback" id="edit_sectorTitleError"></div>
          </div>

          <!-- Image Upload -->
          <div class="mb-3" id="sectorImageDiv">
            <label for="edit_image_id" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="edit_image_id" name="image">
            <div class="invalid-feedback" id="edit_sectorImageError"></div>
          </div>

          <div class="mb-3">
            <img id="edit_image_preview" src="" alt="Image Preview" class="img-thumbnail" style="max-width: 150px;">
          </div>
        </div> 

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="saveBtn">Update Record</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="sectorCancelBtn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
