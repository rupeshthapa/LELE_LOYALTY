<div class="modal fade" id="addProjectModal" aria-labelledby="projectModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="createProjectForm" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="projectModalLabel">Add New Project</h5>
          <button type="button" class="btn-close" id="projectCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <!-- Project Name -->
        <div class="mb-3" id="projectNameDiv">
            <label for="project_id" class="form-label">Project Name</label>
            <input type="text" class="form-control" id="project_name" name="name">
            <div class="invalid-feedback" id="projectNameError"></div>
        </div>

        <!-- Description -->
        <div class="mb-3" id="projectDescriptionDiv">
            <label for="description_id" class="form-label">Description</label>
            <textarea class="form-control" id="description_id" name="description" rows="3"></textarea>
            <div class="invalid-feedback" id="projectDescriptionError"></div>
        </div>

        <!-- Image Upload -->
        <div class="mb-3" id="projectImageDiv">
            <label for="image_id" class="form-label">Upload Logo</label>
            <input type="file" class="form-control" id="image_id" name="logo">
            <div class="invalid-feedback" id="projectImageError"></div>
        </div>

        <!-- Project URL -->
        <div class="mb-3" id="projectUrlDiv">
            <label for="url_id" class="form-label">Project URL</label>
            <input type="url" class="form-control" id="url_id" name="url" placeholder="https://example.com">
            <div class="invalid-feedback" id="projectUrlError"></div>
        </div>
    </div>


        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="saveBtn">Save Project</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="projectCancelBtn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
