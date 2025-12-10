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
        this.currentElement = element;
        const section = element.getAttribute('data-section');
        const field = element.getAttribute('data-field');
        
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

    // Get text content without edit button
    getElementText(element) {
        // Clone the element to avoid modifying the original
        const clone = element.cloneNode(true);
        
        // Remove edit button if it exists
        const editBtn = clone.querySelector('.edit-btn');
        if (editBtn) {
            editBtn.remove();
        }
        
        // Return the text content
        return clone.textContent.trim();
    }

    async saveContent() {
        if (!this.currentElement) return;
        
        const section = this.currentElement.getAttribute('data-section');
        const field = this.currentElement.getAttribute('data-field');
        let newContent = '';
        
        // Get content based on field type
        if (field === 'typed_items') {
            newContent = document.getElementById('typed-items').value;
        } else {
            newContent = document.getElementById('edit-content').value;
        }
        
        // Save via content loader
        const result = await this.loader.updateContent(section, field, newContent);
        
        if (result.success) {
            // Update UI - use safe method that preserves edit button
            this.updateElementSafely(this.currentElement, field, newContent);
            
            // Show success message
            this.loader.showNotification('Content updated successfully!');
            
            // Close modal
            this.modal.hide();
        } else {
            this.loader.showNotification('Error saving changes: ' + (result.error || 'Unknown error'), 'error');
        }
    }

    // SAFE METHOD: Update element without removing edit button
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
            // Get existing edit button
            const existingEditBtn = element.querySelector('.edit-btn');
            
            // Clear element but preserve edit button
            while (element.firstChild) {
                element.removeChild(element.firstChild);
            }
            
            // Add the new text
            element.appendChild(document.createTextNode(newContent));
            
            // Re-add the edit button if it existed
            if (existingEditBtn) {
                // Clone the button to avoid reference issues
                const newEditBtn = existingEditBtn.cloneNode(true);
                
                // Re-add event listener
                newEditBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    this.openEditModal(element);
                });
                
                element.appendChild(newEditBtn);
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