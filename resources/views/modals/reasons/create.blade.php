<div class="modal fade" id="addReasonModal" aria-labelledby="reasonModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="createReasonForm" enctype="multipart/form-data">
        @csrf

        <div class="modal-header">
          <h5 class="modal-title" id="ReasonModalLabel">Add New Record</h5>
          <button type="button" class="btn-close" id="reasonCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Reason Name -->
          <div class="mb-3" id="reasonNameDiv">
            <label for="reason_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="reason_title" name="title">
            <div class="invalid-feedback" id="reasonTitleError"></div>
          </div>

          <!-- Description -->
          <div class="mb-3" id="reasonDescriptionDiv">
            <label for="description_id" class="form-label">Description</label>
            <textarea class="form-control" id="description_id" name="description" rows="3"></textarea>
            <div class="invalid-feedback" id="reasonDescriptionError"></div>
          </div>

          <!-- Image Upload -->
          <div class="mb-3" id="reasonImageDiv">
            <label for="icon_id" class="form-label">Upload Icon</label>
            <input type="file" class="form-control" id="icon_id" name="icon">
            <div class="invalid-feedback" id="reasonIconError"></div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="saveBtn">Save Record</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="reasonCancelBtn">Cancel</button>
        </div>

      </form>
    </div>
  </div>
</div>
