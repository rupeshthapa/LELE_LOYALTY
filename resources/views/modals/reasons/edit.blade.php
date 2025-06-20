<div class="modal fade" id="editReasonModal" aria-labelledby="editReasonModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editReasonForm" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title" id="editReasonModalLabel">Edit Record</h5>
          <button type="button" class="btn-close" id="reasonCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Edit Title -->
          <div class="mb-3" id="reasonNameDiv">
            <label for="edit_reason_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="edit_reason_title" name="title">
            <div class="invalid-feedback" id="edit_reasonTitleError"></div>
          </div>

          <!-- Description -->
          <div class="mb-3" id="edit_reasonDescriptionDiv">
            <label for="edit_description_id" class="form-label">Description</label>
            <textarea class="form-control" id="edit_description_id" name="description" rows="3"></textarea>
            <div class="invalid-feedback" id="edit_reasonDescriptionError"></div>
          </div>

          <!-- Image Upload -->
          <div class="mb-3" id="edit_reasonImageDiv">
            <label for="icon_id" class="form-label">Upload Icon</label>
            <input type="file" class="form-control" id="icon_id" name="icon">
            <div class="invalid-feedback" id="edit_reasonIconError"></div>
          </div>

          <!-- Current Icon Preview -->
          <div class="mb-3">
            <label class="form-label">Current Icon</label><br>
            <img id="editIconPreview" src="" class="img-thumbnail mb-2" style="max-height: 120px; display: none;">
          </div>
        </div> 

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="saveBtn">Save Record</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="edit_reasonCancelBtn">Cancel</button>
        </div>

      </form>
    </div>
  </div>
</div>
