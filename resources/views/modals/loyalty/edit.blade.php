<!-- Edit Loyalty Modal -->
<div class="modal fade" id="editLoyaltyModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="editLoyaltyForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="loyalty_editModalLabel">Edit Loyalty</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                        id="loyalty_editCloseBtn"></button>
                </div>

                <div class="modal-body">

                    <!-- Title -->
                    <div class="mb-3" id="loyalty_editNameDiv">
                        <label for="loyalty_edit_name" class="form-label">Title</label>
                        <input type="text" class="form-control" id="loyalty_edit_title" name="title">
                        <div class="invalid-feedback" id="loyalty_editTitleError"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3" id="loyalty_editDescriptionDiv">
                        <label for="edit_description_id" class="form-label">Description</label>
                        <textarea class="form-control" id="edit_description_id" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="loyalty_editDescriptionError"></div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3" id="loyalty_editImageDiv">
                        <label for="edit_image_id" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="edit_image_id" name="image">
                        <div class="invalid-feedback" id="loyalty_editImageError"></div>
                    </div>

                    <!-- Optional Preview -->
                    <div class="mb-3">
                        <img id="edit_image_preview" src="" alt="Image Preview" class="img-thumbnail"
                            style="max-width: 150px;">
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="saveBtn">Update Record</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="loyalty_editCancelBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
