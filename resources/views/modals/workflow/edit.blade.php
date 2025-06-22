<div class="modal fade" id="editWorkflowModal" aria-labelledby="edit_workflowModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editWorkflowForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="edit_workflowModalLabel">Edit Workflow</h5>
                    <button type="button" class="btn-close" id="edit_workflowCloseBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Workflow Name -->
                    <div class="mb-3" id="edit_workflowNameDiv">
                        <label for="edit_workflow_id" class="form-label">Workflow Title</label>
                        <input type="text" class="form-control" id="edit_workflow_title" name="title">
                        <div class="invalid-feedback" id="edit_workflowTitleError"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3" id="edit_workflowDescriptionDiv">
                        <label for="edit_description_id" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_description_id" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="edit_workflowDescriptionError"></div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3" id="edit_workflowImageDiv">
                        <label for="edit_image_id" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="edit_image_id" name="image">
                        <div class="invalid-feedback" id="edit_workflowImageError"></div>
                    </div>

                    <div class="mb-3">
                        <img id="edit_image_preview" src="" alt="Image Preview" class="img-thumbnail"
                            style="max-width: 150px;">
                    </div>
                </div> <!-- end modal-body -->

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="saveBtn">Update Workflow</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="edit_workflowCancelBtn">Cancel</button>
                </div>
            </form>
        </div> <!-- end modal-content -->
    </div> <!-- end modal-dialog -->
</div> <!-- end modal -->
