
<div class="modal fade" id="editProjectModal" aria-labelledby="projectModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editProjectForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="projectModalLabel">Edit Project</h5>
          <button type="button" class="btn-close" id="projectCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <!-- Project Name -->
        <div class="mb-3" id="editProjectNameDiv">
            <label for="edit_project_id" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="edit_project_name" name="name">
            <div class="invalid-feedback" id="projectNameEditError"></div>
        </div>

        <!-- Description -->
        <div class="mb-3" id="editProjectDescriptionDiv">
            <label for="edit_description_id" class="form-label">Description</label>
            <textarea class="form-control" id="edit_description_id" name="description" rows="3"></textarea>
            <div class="invalid-feedback" id="projectDescriptionEditError"></div>
        </div>

        <!-- Image Upload -->
        <div class="mb-3" id="editProjectImageDiv">
            <label for="edit_image_id" class="form-label">Upload Logo</label>
            <input type="file" class="form-control" id="edit_image_id" name="logo">
            <div class="invalid-feedback" id="projectImageError"></div>
        </div>

        <div class="mb-3">
        <label class="form-label">Current Logo</label><br>
        <img id="editLogoPreview" src="" class="img-thumbnail mb-2" style="max-height: 120px; display: none;">
    </div>

        <!-- Project URL -->
        <div class="mb-3" id="editProjectUrlDiv">
            <label for="edit_url_id" class="form-label">Project URL</label>
            <input type="url" class="form-control" id="edit_url_id" name="url" placeholder="https://example.com">
            <div class="invalid-feedback" id="projectUrlEditError"></div>
        </div>
    </div>


        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="updateBtn">Update Project</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="projectCancelBtn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
