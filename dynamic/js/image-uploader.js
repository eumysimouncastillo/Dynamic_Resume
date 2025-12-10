// Simple Image Uploader - Separate from text editor
class ImageUploader {
    constructor() {
        this.baseUrl = '/dynamic_resume/dynamic/api';
        this.init();
    }

    async init() {
        // Check if user is logged in
        await this.checkAuth();
        
        if (this.isLoggedIn) {
            this.addImageEditButtons();
        }
    }

    async checkAuth() {
        try {
            const response = await fetch(`${this.baseUrl}/check-auth.php`);
            const data = await response.json();
            this.isLoggedIn = data.isLoggedIn || false;
        } catch (error) {
            this.isLoggedIn = false;
        }
    }

    addImageEditButtons() {
        // Find all image fields in your HTML
        const imageSelectors = [
            '[data-field="hero_image"]',
            '[data-field="profile_image"]',
            '[data-field="resume_image"]',
            '[data-field*="project"][data-field*="image"]'
        ];
        
        imageSelectors.forEach(selector => {
            document.querySelectorAll(selector).forEach(img => {
                this.addEditButtonToImage(img);
            });
        });
    }

    addEditButtonToImage(imgElement) {
        // Create container for the image
        const container = document.createElement('div');
        container.className = 'image-edit-container';
        container.style.position = 'relative';
        container.style.display = 'inline-block';
        
        // Wrap the image
        imgElement.parentNode.insertBefore(container, imgElement);
        container.appendChild(imgElement);
        
        // Add edit button
        const editBtn = document.createElement('button');
        editBtn.className = 'image-edit-btn';
        editBtn.innerHTML = '<i class="bi bi-image"></i>';
        editBtn.title = 'Edit Image';
        editBtn.style.cssText = `
            position: absolute;
            top: 5px;
            right: 5px;
            background: #667eea;
            color: white;
            border: none;
            border-radius: 4px;
            width: 30px;
            height: 30px;
            cursor: pointer;
            z-index: 100;
            opacity: 0;
            transition: opacity 0.3s;
        `;
        
        container.appendChild(editBtn);
        
        // Show button on hover
        container.addEventListener('mouseenter', () => {
            editBtn.style.opacity = '1';
        });
        
        container.addEventListener('mouseleave', () => {
            editBtn.style.opacity = '0.8';
        });
        
        // Open upload modal on click
        editBtn.addEventListener('click', (e) => {
            e.preventDefault();
            this.openImageUploadModal(imgElement);
        });
    }

    openImageUploadModal(imgElement) {
        const section = imgElement.getAttribute('data-section');
        const field = imgElement.getAttribute('data-field');
        const currentSrc = imgElement.src;
        
        // Create modal
        const modalHTML = `
            <div class="modal fade" id="simple-image-upload" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Upload Image</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                        <div class="modal-body">
                            <div class="current-image mb-3 text-center">
                                <img src="${currentSrc}" style="max-height: 150px; border-radius: 8px;">
                                <p class="small text-muted mt-2">Current: ${currentSrc.split('/').pop()}</p>
                            </div>
                            
                            <form id="simple-upload-form">
                                <div class="mb-3">
                                    <label class="form-label">Choose Image (JPG, PNG, GIF, WebP - max 5MB)</label>
                                    <input type="file" class="form-control" id="image-file" accept=".jpg,.jpeg,.png,.gif,.webp" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Or enter URL</label>
                                    <input type="url" class="form-control" id="image-url" placeholder="https://example.com/image.jpg">
                                </div>
                                
                                <div id="upload-preview" class="text-center mb-3" style="display: none;">
                                    <img id="preview" style="max-height: 100px; border-radius: 6px;">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary" id="upload-now">Upload & Save</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        // Remove existing modal
        const oldModal = document.getElementById('simple-image-upload');
        if (oldModal) oldModal.remove();
        
        // Add new modal
        document.body.insertAdjacentHTML('beforeend', modalHTML);
        const modal = new bootstrap.Modal(document.getElementById('simple-image-upload'));
        
        // Setup preview
        document.getElementById('image-file').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    document.getElementById('upload-preview').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
        
        // Handle upload
        document.getElementById('upload-now').addEventListener('click', async () => {
            await this.uploadImage(imgElement, section, field, modal);
        });
        
        // Show modal
        modal.show();
    }

    async uploadImage(imgElement, section, field, modal) {
        const fileInput = document.getElementById('image-file');
        const urlInput = document.getElementById('image-url');
        
        let imagePath = '';
        
        // Use file if selected
        if (fileInput.files && fileInput.files[0]) {
            const formData = new FormData();
            formData.append('image', fileInput.files[0]);
            formData.append('section', section);
            formData.append('field', field);
            
            try {
                const response = await fetch(`${this.baseUrl}/upload-image.php`, {
                    method: 'POST',
                    body: formData
                });
                
                const result = await response.json();
                
                if (result.success) {
                    imagePath = result.path;
                } else {
                    alert('Upload failed: ' + result.error);
                    return;
                }
            } catch (error) {
                alert('Upload error: ' + error.message);
                return;
            }
        }
        // Use URL if entered
        else if (urlInput.value.trim()) {
            imagePath = urlInput.value.trim();
        } else {
            alert('Please select an image or enter a URL');
            return;
        }
        
        // Save to database
        try {
            const response = await fetch(`${this.baseUrl}/update-content.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    section_name: section,
                    field_name: field,
                    content: imagePath
                })
            });
            
            const result = await response.json();
            
            if (result.success) {
                // Update image on page
                imgElement.src = imagePath.startsWith('http') ? imagePath : '/' + imagePath;
                
                // Close modal
                modal.hide();
                
                // Show success
                alert('Image updated successfully!');
            } else {
                alert('Error saving: ' + result.error);
            }
            
        } catch (error) {
            alert('Error: ' + error.message);
        }
    }
}

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    window.ImageUploader = new ImageUploader();
});