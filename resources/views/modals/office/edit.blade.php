<div class="modal fade" id="editOfficeModal" aria-labelledby="editOfficeModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editOfficeForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="editOfficeModalLabel">Edit Office</h5>
                    <button type="button" class="btn-close" id="editOfficeCloseBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Title -->
                    <div class="mb-3" id="editOfficeTitleDiv">
                        <label for="edit_office_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="edit_office_title" name="title">
                        <div class="invalid-feedback" id="editOfficeTitleError"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3" id="editOfficeDescriptionDiv">
                        <label for="edit_office_description" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_office_description" name="description" rows="3"></textarea>
                        <p class="form-text text-muted small fst-italic mt-1">Note: Use /n to create a new line.</p>
                        <div class="invalid-feedback" id="editOfficeDescriptionError"></div>
                    </div>

                    <!-- Icon -->
                    <div class="mb-3" id="editOfficeIconDiv">
                        <label for="edit_office_icon" class="form-label">Icon (FontAwesome class e.g. <code>fas
                                fa-building</code>)</label>
                        <input type="text" class="form-control" id="edit_office_icon" name="icon">
                        <div class="invalid-feedback" id="editOfficeIconError"></div>
                    </div>
                    
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" id="updateOfficeBtn">Update Office</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="editOfficeCancelBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
