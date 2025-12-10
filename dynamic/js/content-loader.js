// Content Loader - Fetches and displays content from database
class ContentLoader {
    constructor() {
        this.contentData = {};
        this.isLoggedIn = false;
        this.baseUrl = '/dynamic_resume/dynamic/api';
    }

    async init() {
        // Check login status
        await this.checkAuth();
        
        // Load content from database
        await this.loadContent();
        
        // Populate content on page
        this.populateContent();
        
        // If logged in, enable edit mode
        if (this.isLoggedIn) {
            this.enableEditMode();
        }
    }

    async checkAuth() {
        try {
            const response = await fetch(`${this.baseUrl}/check-auth.php`);
            const data = await response.json();
            this.isLoggedIn = data.isLoggedIn || false;
        } catch (error) {
            console.error('Error checking auth:', error);
            this.isLoggedIn = false;
        }
    }

    async loadContent() {
        try {
            const response = await fetch(`${this.baseUrl}/get-content.php`);
            const sections = await response.json();
            
            // Transform flat array to nested object
            this.transformContent(sections);
            
        } catch (error) {
            console.error('Error loading content:', error);
            // Fallback: Keep existing HTML content
        }
    }

    transformContent(sectionsArray) {
        sectionsArray.forEach(item => {
            const section = item.section_name;
            const field = item.field_name;
            const content = item.content;
            
            if (!this.contentData[section]) {
                this.contentData[section] = {};
            }
            
            // Try to parse JSON, otherwise use as string
            try {
                this.contentData[section][field] = JSON.parse(content);
            } catch {
                this.contentData[section][field] = content;
            }
        });
    }

    populateContent() {
        // Find all elements with data-section attribute
        document.querySelectorAll('[data-section]').forEach(element => {
            const section = element.getAttribute('data-section');
            const field = element.getAttribute('data-field');
            
            if (this.contentData[section] && this.contentData[section][field] !== undefined) {
                const content = this.contentData[section][field];
                
                // Update element content - FIXED: Added image handling
                if (element.tagName === 'IMG') {
                    // Handle image elements
                    element.src = this.getImagePath(content);
                } else if (element.classList.contains('typed')) {
                    // Special handling for typed items
                    element.setAttribute('data-typed-items', content);
                } else if (element.querySelector('.contact-text')) {
                    // Update contact text span
                    element.querySelector('.contact-text').textContent = content;
                } else if (element.querySelector('.btn-text')) {
                    // Update button text
                    element.querySelector('.btn-text').textContent = content;
                } else {
                    // Update regular text
                    element.textContent = content;
                }
            }
        });
    }

    enableEditMode() {
        // Add edit mode class to body
        document.body.classList.add('edit-mode-active');
        
        // Create edit buttons
        this.createEditButtons();
        
        // Create admin toolbar
        this.createAdminToolbar();
        
        // Initialize modal editor
        if (window.ModalEditor) {
            window.ModalEditor.init(this);
        }
    }

    createEditButtons() {
        document.querySelectorAll('[data-section]').forEach(element => {
            // Skip if already has edit button
            if (element.querySelector('.edit-btn')) return;
            
            const editBtn = document.createElement('button');
            editBtn.className = 'edit-btn';
            editBtn.innerHTML = '<i class="bi bi-pencil"></i>';
            editBtn.title = 'Edit this content';
            
            editBtn.addEventListener('click', (e) => {
                e.preventDefault();
                e.stopPropagation();
                
                if (window.ModalEditor) {
                    window.ModalEditor.openEditModal(element);
                }
            });
            
            element.style.position = 'relative';
            element.appendChild(editBtn);
        });
    }

    createAdminToolbar() {
        const toolbar = document.createElement('div');
        toolbar.id = 'dynamic-admin-toolbar';
        toolbar.innerHTML = `
            <div class="admin-toolbar-header">
                <strong><i class="bi bi-person-check"></i> Admin Mode</strong>
            </div>
            <div class="btn-group">
                <button class="btn btn-sm btn-outline-primary" id="refresh-content">
                    <i class="bi bi-arrow-clockwise"></i> Refresh
                </button>
                <button class="btn btn-sm btn-outline-secondary" id="toggle-edit">
                    <i class="bi bi-pencil"></i> Toggle Edit
                </button>
                <button class="btn btn-sm btn-outline-danger" id="logout-btn">
                    <i class="bi bi-box-arrow-right"></i> Logout
                </button>
            </div>
        `;
        
        document.body.appendChild(toolbar);
        toolbar.style.display = 'block';
        
        // Use setTimeout to ensure buttons exist before adding event listeners
        setTimeout(() => {
            const refreshBtn = document.getElementById('refresh-content');
            const toggleBtn = document.getElementById('toggle-edit');
            const logoutBtn = document.getElementById('logout-btn');
            
            if (refreshBtn) {
                refreshBtn.addEventListener('click', () => {
                    location.reload();
                });
            }
            
            if (toggleBtn) {
                toggleBtn.addEventListener('click', () => {
                    document.body.classList.toggle('edit-mode-active');
                });
            }
            
            if (logoutBtn) {
                logoutBtn.addEventListener('click', () => {
                    window.location.href = '/dynamic_resume/auth/logout.php';
                });
            }
        }, 100);
    }

    async updateContent(section, field, content) {
        try {
            const response = await fetch(`${this.baseUrl}/update-content.php`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    section_name: section,
                    field_name: field,
                    content: content
                })
            });
            
            const result = await response.json();
            return result;
            
        } catch (error) {
            console.error('Error updating content:', error);
            return { success: false, error: error.message };
        }
    }

    showNotification(message, type = 'success') {
        let notification = document.getElementById('dynamic-notification');
        
        if (!notification) {
            notification = document.createElement('div');
            notification.id = 'dynamic-notification';
            notification.className = 'dynamic-notification';
            document.body.appendChild(notification);
        }
        
        notification.textContent = message;
        notification.className = `dynamic-notification ${type}`;
        notification.style.display = 'block';
        
        setTimeout(() => {
            notification.style.display = 'none';
        }, 3000);
    }

    getImagePath(content) {
        if (content.startsWith('http')) {
            return content;
        } else if (content.startsWith('/')) {
            return content;
        } else if (content.startsWith('dynamic_resume/')) {
            // Already has dynamic_resume, just add leading slash
            return '/' + content;
        } else {
            // Add dynamic_resume/ for other paths
            return '/dynamic_resume/' + content;
        }
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', async () => {
    window.ContentLoader = new ContentLoader();
    await window.ContentLoader.init();
});