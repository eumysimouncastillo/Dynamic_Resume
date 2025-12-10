// Modal-based Editor for Dynamic Portfolio
class ModalEditor {
    constructor(contentLoader) {
        this.loader = contentLoader;
        this.modal = null;
        this.currentElement = null;
    }

    init() {
        this.createModal();
        this.setupEventListeners();
    }

    createModal() {
        // Create modal HTML
        const modalHTML = `
            <div class="modal fade" id="dynamic-edit-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                Edit Content
                                <span class="section-badge" id="modal-section-badge"></span>
                            </h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="dynamic-edit-form">
                                <div class="mb-3">
                                    <label for="edit-content" class="form-label">Content</label>
                                    <textarea class="form-control" id="edit-content" rows="6" style="resize: vertical;"></textarea>
                                    <div class="form-text" id="field-info"></div>
                                </div>
                                
                                <!-- For typed items (special case) -->
                                <div class="mb-3" id="typed-items-group" style="display: none;">
                                    <label for="typed-items" class="form-label">Typed Items (comma-separated)</label>
                                    <input type="text" class="form-control" id="typed-items" placeholder="Item 1, Item 2, Item 3">
                                    <div class="form-text">Enter comma-separated values for the typing animation</div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="save-content">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        `;

        // Add modal to body
        document.body.insertAdjacentHTML('beforeend', modalHTML);
        this.modal = new bootstrap.Modal(document.getElementById('dynamic-edit-modal'));
        
        // Initialize modal instance
        const modalElement = document.getElementById('dynamic-edit-modal');
        modalElement.addEventListener('hidden.bs.modal', () => {
            this.currentElement = null;
        });
    }

    setupEventListeners() {
        // Save button
        document.getElementById('save-content').addEventListener('click', () => {
            this.saveContent();
        });
    }

    openEditModal(element) {
        const section = element.getAttribute('data-section');
        const field = element.getAttribute('data-field');
        
        // Check if this is an image field
        if (field.includes('_image') || element.tagName === 'IMG' || field.includes('image')) {
            this.openImageEditModal(element);
            return;
        }
        
        this.currentElement = element;
        
        // Get current value
        let currentValue = '';
        if (field === 'typed_items') {
            currentValue = element.getAttribute('data-typed-items') || '';
        } else if (element.querySelector('.contact-text')) {
            currentValue = element.querySelector('.contact-text').textContent;
        } else {
            // Get text content without edit button
            currentValue = this.getElementText(element);
        }
        
        // Update modal UI
        document.getElementById('modal-section-badge').textContent = `${section}.${field}`;
        
        // Show/hide appropriate fields
        if (field === 'typed_items') {
            document.getElementById('typed-items-group').style.display = 'block';
            document.getElementById('edit-content').style.display = 'none';
            document.getElementById('typed-items').value = currentValue;
            document.getElementById('field-info').textContent = 'Editing typed animation items';
        } else {
            document.getElementById('typed-items-group').style.display = 'none';
            document.getElementById('edit-content').style.display = 'block';
            document.getElementById('edit-content').value = currentValue;
            document.getElementById('field-info').textContent = `Editing ${field.replace('_', ' ')}`;
        }
        
        // Show modal
        this.modal.show();
    }

    // SAFE METHOD: Update element without removing edit button - SIMPLEST FIX
    updateElementSafely(element, field, newContent) {
        if (field === 'typed_items') {
            element.setAttribute('data-typed-items', newContent);
            // Reinitialize typed.js if needed
            if (window.Typed && window.typedInstance) {
                window.typedInstance.destroy();
                const items = newContent.split(',').map(item => item.trim());
                window.typedInstance = new Typed('.typed', {
                    strings: items,
                    typeSpeed: 100,
                    backSpeed: 50,
                    loop: true
                });
            }
        } else if (element.querySelector('.contact-text')) {
            element.querySelector('.contact-text').textContent = newContent;
        } else if (element.querySelector('.btn-text')) {
            element.querySelector('.btn-text').textContent = newContent;
        } else {
            // Find and update only text nodes, ignore buttons
            let hasTextNode = false;
            for (let child of element.childNodes) {
                if (child.nodeType === Node.TEXT_NODE && child.textContent.trim()) {
                    child.textContent = newContent;
                    hasTextNode = true;
                    break;
                }
            }
            
            // If no text node found, create one at the beginning
            if (!hasTextNode) {
                const textNode = document.createTextNode(newContent);
                element.insertBefore(textNode, element.firstChild);
            }
        }
    }

    // NEW METHOD: Handle image upload
    openImageEditModal(element) {
        this.currentElement = element;
        const section = element.getAttribute('data-section');
        const field = element.getAttribute('data-field');
        const currentImage = element.getAttribute('src');
        
        // Create special image upload modal
        const imageModalHTML = `
            <div class="modal fade" id="image-upload-modal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">
                                <i class="bi bi-image"></i> Edit Image
                                <span class="section-badge">${section}.${field}</span>
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-4">
                                <h6>Current Image</h6>
                                <img src="${currentImage}" alt="Current" class="img-fluid rounded mb-3" style="max-height: 200px;">
                                <p class="text-muted small">${currentImage}</p>
                            </div>
                            
                            <form id="image-upload-form">
                                <div class="mb-3">
                                    <label for="image-upload" class="form-label">Upload New Image/GIF</label>
                                    <input type="file" class="form-control" id="image-upload" accept=".jpg,.jpeg,.png,.gif,.webp">
                                    <div class="form-text">
                                        Maximum file size: 5MB. Allowed: JPG, PNG, GIF, WebP
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="image-url" class="form-label">Or Enter Image URL</label>
                                    <input type="text" class="form-control" id="image-url" placeholder="https://example.com/image.jpg">
                                </div>
                                
                                <div class="image-preview mb-3" id="image-preview" style="display: none;">
                                    <h6>Preview</h6>
                                    <img id="preview-image" src="" alt="Preview" class="img-fluid rounded" style="max-height: 150px;">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="remove-image">Remove Image</button>
                            <button type="button" class="btn btn-primary" id="save-image">Save Image</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Remove existing image modal if any
        const existingModal = document.getElementById('image-upload-modal');
        if (existingModal) {
            existingModal.remove();
        }
        
        // Add modal to body
        document.body.insertAdjacentHTML('beforeend', imageModalHTML);
        const imageModal = new bootstrap.Modal(document.getElementById('image-upload-modal'));
        
        // Setup event listeners for image modal
        const imageUpload = document.getElementById('image-upload');
        const imageUrl = document.getElementById('image-url');
        const previewContainer = document.getElementById('image-preview');
        const previewImage = document.getElementById('preview-image');
        
        // Preview uploaded image
        imageUpload.addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewImage.src = e.target.result;
                    previewContainer.style.display = 'block';
                    imageUrl.value = ''; // Clear URL field
                };
                reader.readAsDataURL(file);
            }
        });
        
        // Preview from URL
        imageUrl.addEventListener('input', function() {
            if (this.value) {
                previewImage.src = this.value;
                previewContainer.style.display = 'block';
                imageUpload.value = ''; // Clear file input
            } else {
                previewContainer.style.display = 'none';
            }
        });
        
        // Save image
        document.getElementById('save-image').addEventListener('click', () => {
            this.saveImage(element, section, field, imageModal);
        });
        
        // Remove image
        document.getElementById('remove-image').addEventListener('click', () => {
            this.removeImage(element, section, field, imageModal);
        });
        
        // Show modal
        imageModal.show();
    }

    // NEW METHOD: Save uploaded image
    async saveImage(element, section, field, modal) {
        const imageUpload = document.getElementById('image-upload');
        const imageUrl = document.getElementById('image-url');
        
        let imagePath = '';
        
        // Check if file was uploaded
        if (imageUpload.files && imageUpload.files[0]) {
            const formData = new FormData();
            formData.append('image', imageUpload.files[0]);
            formData.append('section', section);
            formData.append('field', field);
            
            try {
                const response = await fetch('/dynamic_resume/dynamic/api/upload-image.php', {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    imagePath = result.path;
                } else {
                    this.loader.showNotification('Upload failed: ' + result.error, 'error');
                    return;
                }
            } catch (error) {
                this.loader.showNotification('Upload error: ' + error.message, 'error');
                return;
            }
        } 
        // Check if URL was entered
        else if (imageUrl.value.trim()) {
            imagePath = imageUrl.value.trim();
        } else {
            this.loader.showNotification('Please select an image or enter a URL', 'error');
            return;
        }
        
        // Save to database via content loader
        const result = await this.loader.updateContent(section, field, imagePath);
        
        if (result.success) {
            // Update image src
            if (imagePath.startsWith('http')) {
                element.src = imagePath;
            } else {
                // Remove any leading slash to avoid double slashes
                element.src = imagePath.replace(/^\//, '');
            }
            
            // Close modal
            modal.hide();
            
            // Remove modal from DOM
            document.getElementById('image-upload-modal').remove();
            
            this.loader.showNotification('Image updated successfully!');
        } else {
            this.loader.showNotification('Error saving image: ' + result.error, 'error');
        }
    }

    // NEW METHOD: Remove image
    async removeImage(element, section, field, modal) {
        if (confirm('Are you sure you want to remove this image?')) {
            // Set to default/placeholder image
            const defaultImage = 'assets/img/placeholder.jpg'; // Create this placeholder
            
            // Save to database
            const result = await this.loader.updateContent(section, field, defaultImage);
            
            if (result.success) {
                // Update image src
                element.src = defaultImage;
                
                // Close modal
                modal.hide();
                
                // Remove modal from DOM
                document.getElementById('image-upload-modal').remove();
                
                this.loader.showNotification('Image removed successfully!');
            } else {
                this.loader.showNotification('Error removing image: ' + result.error, 'error');
            }
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    if (window.ContentLoader) {
        window.ModalEditor = new ModalEditor(window.ContentLoader);
        window.ModalEditor.init();
    }
});