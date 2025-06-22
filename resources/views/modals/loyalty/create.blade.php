<div class="modal fade" id="addLoyaltyModal" aria-labelledby="LoyaltyModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="createLoyaltyForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="LoyaltyModalLabel">Add New Loyalty</h5>
                    <button type="button" class="btn-close" id="loyaltyCloseBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Loyalty Name -->
                    <div class="mb-3" id="loyaltyNameDiv">
                        <label for="Loyalty_id" class="form-label">Title</label>
                        <input type="text" class="form-control" id="loyalty_name" name="title">
                        <div class="invalid-feedback" id="loyaltyTitleError"></div>
                    </div>

                    <!-- Description -->
                    <div class="mb-3" id="loyaltyDescriptionDiv">
                        <label for="description_id" class="form-label">Description</label>
                        <textarea class="form-control" id="description_id" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="loyaltyDescriptionError"></div>
                    </div>

                    <!-- Image Upload -->
                    <div class="mb-3" id="loyaltyImageDiv">
                        <label for="image_id" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="image_id" name="image">
                        <div class="invalid-feedback" id="loyaltyImageError"></div>
                    </div>




                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" id="saveBtn">Save Loyalty</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                            id="loyaltyCancelBtn">Cancel</button>
                    </div>
            </form>
        </div>
    </div>
</div>
