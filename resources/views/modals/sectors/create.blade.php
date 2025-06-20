<div class="modal fade" id="addSectorModal" aria-labelledby="sectorModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="createSectorForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="sectorModalLabel">Add New Sector</h5>
          <button type="button" class="btn-close" id="sectorCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <!-- sector Name -->
        <div class="mb-3" id="sectorNameDiv">
            <label for="sector_id" class="form-label">Title</label>
            <input type="text" class="form-control" id="sector_title" name="title">
            <div class="invalid-feedback" id="sectorTitleError"></div>
        </div>

        <!-- Image Upload -->
        <div class="mb-3" id="sectorImageDiv">
            <label for="image_id" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image_id" name="image">
            <div class="invalid-feedback" id="sectorImageError"></div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="saveBtn">Save Section</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="sectorCancelBtn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
