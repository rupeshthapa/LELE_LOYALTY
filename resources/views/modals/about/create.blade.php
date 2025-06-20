<div class="modal fade" id="addAboutModal" aria-labelledby="aboutModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="createAboutForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="aboutModalLabel">Add New About</h5>
          <button type="button" class="btn-close" id="aboutCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <!-- about Name -->
        <div class="mb-3" id="aboutNameDiv">
            <label for="about_id" class="form-label">Title</label>
            <input type="text" class="form-control" id="about_name" name="title">
            <div class="invalid-feedback" id="aboutTitleError"></div>
        </div>

        <!-- Description -->
        <div class="mb-3" id="aboutDescriptionDiv">
            <label for="description_id" class="form-label">Description</label>
            <textarea class="form-control" id="description_id" name="description" rows="3"></textarea>
            <div class="invalid-feedback" id="aboutDescriptionError"></div>
        </div>

        <!-- Image Upload -->
        <div class="mb-3" id="aboutImageDiv">
            <label for="image_id" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image_id" name="image">
            <div class="invalid-feedback" id="aboutImageError"></div>
        </div>

      


        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="saveBtn">Save Section</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="aboutCancelBtn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
