<!-- Edit About Modal -->
<div class="modal fade" id="editAboutModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editAboutForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="about_editModalLabel">Edit About</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="about_editCloseBtn"></button>
                </div>

                <div class="modal-body">

                    <!-- Title -->
                    <div class="mb-3" id="about_editNameDiv">
                        <label for="about_edit_name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="about_edit_title" name="title">
                        <div class="invalid-feedback" id="about_editTitleError"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3" id="about_editDescriptionDiv">
                        <label for="edit_description_id" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_description_id" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="about_editDescriptionError"></div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3" id="about_editImageDiv">
                        <label for="edit_image_id" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="edit_image_id" name="image">
                        <div class="invalid-feedback" id="about_editImageError"></div>
                    </div>

                    <!-- Optional Preview -->
                    <div class="mb-3">
                        <img id="edit_image_preview" src="" alt="Image Preview" class="img-thumbnail"
                            style="max-width: 150px;">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="saveBtn">Update Section</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="about_editCancelBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
