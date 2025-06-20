<div class="modal fade" id="editFeatureModal" aria-labelledby="editFeatureModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editFeatureForm" enctype="multipart/form-data">
        @csrf
        @method('POST') <!-- or PATCH if you prefer -->

        <div class="modal-header">
          <h5 class="modal-title" id="editFeatureModalLabel">Edit Feature</h5>
          <button type="button" class="btn-close" id="editFeatureCloseBtn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <!-- Title -->
          <div class="mb-3" id="editFeatureTitleDiv">
            <label for="editFeature_title" class="form-label">Title</label>
            <input type="text" class="form-control" id="editFeature_title" name="title">
            <div class="invalid-feedback" id="editFeatureTitleError"></div>
          </div>

          <!-- Description -->
          <div class="mb-3" id="editFeatureDescriptionDiv">
            <label for="editFeature_description" class="form-label">Description</label>
            <textarea class="form-control" id="editFeature_description" name="description" rows="3"></textarea>
            <div class="invalid-feedback" id="editFeatureDescriptionError"></div>
          </div>

          <!-- Feature Class Dropdown -->
          <div class="mb-3" id="editFeatureClassDiv">
            <label for="editFeature_class" class="form-label">Feature Animation Class</label>
            <select class="form-select" id="editFeature_class" name="class">
              <option value="">-- Select Feature Class --</option>
              <option value="rotate-class">rotate-class</option>
              <option value="shake-class">shake-class</option>
              <option value="scale-class">scale-class</option>
              <option value="shakehorizontal-class">shakehorizontal-class</option>
            </select>
            <div class="invalid-feedback" id="editFeatureClassError"></div>
          </div>

          <!-- Image Class Dropdown (disabled) -->
          <div class="mb-3" id="editImageClassDiv">
            <label for="edit_image_class" class="form-label">Image Animation Class</label>
            <select class="form-select" id="edit_image_class" name="image_class" disabled>
              <option value="">-- Select Image Class --</option>
              <option value="rotate">rotate</option>
              <option value="shake">shake</option>
              <option value="scale">scale</option>
            </select>
            <!-- Hidden input to submit image_class -->
            <input type="hidden" id="edit_image_class_hidden" name="image_class">
            <div class="invalid-feedback" id="editImageClassError"></div>
          </div>

          <!-- Image Upload -->
          <div class="mb-3" id="editFeatureImageDiv">
            <label for="editFeature_image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="editFeature_image" name="image" accept="image/*">
            <div class="invalid-feedback" id="editFeatureImageError"></div>

            <!-- Preview Image -->
            <div class="mt-3" id="imagePreviewWrapper" style="display:none;">
              <label class="form-label">Current Image Preview:</label><br>
              <img id="imagePreview" src="#" alt="Preview" style="max-height: 200px;" class="img-thumbnail">
            </div>
          </div>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-success" id="saveEditFeatureBtn">Update Feature</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="editCancelFeatureBtn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
