<div class="modal fade" id="addFeatureModal" aria-labelledby="featureModalLabel" aria-hidden="true"
    data-bs-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form id="createFeatureForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="featureModalLabel">Add New Feature</h5>
                    <button type="button" class="btn-close" id="featureCloseBtn" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <!-- Feature Title -->
                    <div class="mb-3" id="featureTitleDiv">
                        <label for="feature_title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="feature_title" name="title">
                        <div class="invalid-feedback" id="featureTitleError"></div>
                    </div>

                    <!-- Feature Description -->
                    <div class="mb-3" id="featureDescriptionDiv">
                        <label for="feature_description" class="form-label">Description</label>
                        <textarea class="form-control" id="feature_description" name="description" rows="3"></textarea>
                        <div class="invalid-feedback" id="featureDescriptionError"></div>
                    </div>

                    <!-- Feature Class Dropdown -->
                    <div class="mb-3" id="featureClassDiv">
                        <label for="feature_class" class="form-label">Feature Animation Class</label>
                        <select class="form-select" id="feature_class" name="class">
                            <option value="">-- Select Feature Class --</option>
                            <option value="rotate-class">rotate-class</option>
                            <option value="shake-class">shake-class</option>
                            <option value="scale-class">scale-class</option>
                            <option value="shakehorizontal-class">shakehorizontal-class</option>
                        </select>
                        <div class="invalid-feedback" id="featureClassError"></div>
                    </div>

                    <!-- Image Class Dropdown (disabled) -->
                    <div class="mb-3" id="imageClassDiv">
                        <label for="image_class" class="form-label">Image Animation Class</label>
                        <select class="form-select" id="image_class" name="image_class" disabled>
                            <option value="">-- Select Image Class --</option>
                            <option value="rotate">rotate</option>
                            <option value="shake">shake</option>
                            <option value="scale">scale</option>
                        </select>
                        <!-- Hidden input to hold value for submission -->
                        <input type="hidden" id="image_class_hidden" name="image_class">
                        <div class="invalid-feedback" id="imageClassError"></div>
                    </div>

                    <!-- Feature Image Upload -->
                    <div class="mb-3" id="featureImageDiv">
                        <label for="feature_image" class="form-label">Upload Image</label>
                        <input type="file" class="form-control" id="feature_image" name="image">
                        <div class="invalid-feedback" id="featureImageError"></div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" id="saveFeatureBtn">Save Feature</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"
                        id="cancelFeatureBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
