<div class="modal fade" id="addOfficeModal" aria-labelledby="officeModalLabel" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="createOfficeForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="officeModalLabel">Add New Office</h5>
                    <button type="button" class="btn-close" id="officeCloseBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Title -->
                    <div class="mb-3" id="officeTitleDiv">
                        <label for="office_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="office_title" name="title">
                        <div class="invalid-feedback" id="officeTitleError"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3" id="officeDescriptionDiv">
                        <label for="office_description" class="form-label">Description</label>
                        <textarea class="form-control" id="office_description" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="officeDescriptionError"></div>
                    </div>

                    <!-- Icon -->
                    <div class="mb-3" id="officeIconDiv">
                        <label for="office_icon" class="form-label">Icon (FontAwesome class e.g. <code>fas
                                fa-building</code>)</label>
                        <input type="text" class="form-control" id="office_icon" name="icon">
                        <div class="invalid-feedback" id="officeIconError"></div>
                    </div>
                    <p class="form-text text-muted small fst-italic mt-1">Note: Use /n to create a new line.</p>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="saveOfficeBtn">Save Office</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="officeCancelBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
