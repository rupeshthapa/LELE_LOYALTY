<div class="modal fade" id="addWorkflowModal" aria-labelledby="workflowModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="createWorkflowForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="workflowModalLabel">Add New Workflow</h5>
                    <button type="button" class="btn-close" id="workflowCloseBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Workflow Name -->
                    <div class="mb-3" id="workflowNameDiv">
                        <label for="workflow_id" class="form-label">Workflow Title</label>
                        <input type="text" class="form-control" id="workflow_title" name="title">
                        <div class="invalid-feedback" id="workflowTitleError"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3" id="workflowDescriptionDiv">
                        <label for="description_id" class="form-label">Description</label>
                        <textarea class="form-control" id="description_id" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="workflowDescriptionError"></div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3" id="workflowImageDiv">
                        <label for="image_id" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image_id" name="image">
                        <div class="invalid-feedback" id="workflowImageError"></div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="saveBtn">Save Workflow</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="workflowCancelBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
