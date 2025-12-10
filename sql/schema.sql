CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

/* Insert an initial admin user */
INSERT INTO users (username, password)
VALUES ('admin', '$2y$10$.JVHNYBOxIlhbZZKJIwA3e21PJjGmub2RGuB/.pV2b1f0Sk93GP4G');

CREATE TABLE sections (
    id INT AUTO_INCREMENT PRIMARY KEY,
    section_name VARCHAR(50) NOT NULL,
    field_name   VARCHAR(100) NOT NULL,
    content      TEXT NOT NULL,
    display_order INT DEFAULT 0,
    is_visible BOOLEAN DEFAULT TRUE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    UNIQUE KEY unique_section_field (section_name, field_name)
);



-- HERO SECTION
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('hero', 'title', 'Eumy''s Portfolio', 1),
('hero', 'name', 'Eumy Simoun J. Castillo', 2),
('hero', 'tagline', 'I''m a Full Stack Web Developer', 3),
('hero', 'typed_items', 'Full Stack Web Developer,Dedicated Problem Solver,Passionate Programmer', 4),
('hero', 'description', 'Dedicated and passionate on solving real-world problems through versatile coding and thoughtful user-centric design.', 5);

-- ABOUT SECTION
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('about', 'title', 'Random Things About Me', 1),
('about', 'description_1', 'Hi! I am a blah blah, and below i will tell you random things about myselfHi! I am a blah blah, and below i will tell you random things about myselfHi! I am a blah blah, and below i will tell you random things about myself', 2),
('about', 'description_2', 'Im a 4th year compsci student blah blahHi! I am a blah blah, and below i will tell you random things about myselfHi! I am a blah blah, and below i will tell you random things about myself', 3),
('about', 'projects_count', '30+', 4),
('about', 'projects_label', 'Personal Projects Completed', 5),
('about', 'experience_count', '4+', 6),
('about', 'experience_label', 'Years Coding Experience', 7),
('about', 'languages_count', '10+', 8),
('about', 'languages_label', 'Languages and Frameworks Used', 9);

-- PROFILE INFO (For multiple locations)
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('profile', 'full_name', 'Eumy Simoun J. Castillo', 1),
('profile', 'profession', 'Full Stack Web Developer', 2),
('profile', 'email', 'eumy.simoun.castillo@gmail.com', 3),
('profile', 'phone', '+63 9391071735', 4),
('profile', 'location', 'Philippines', 5);

-- LIKES AND DISLIKES (Array format - JSON)
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('likes', 'title', 'What I Like', 1),
('likes', 'items', '["I like dogs and cats, and everything in between", "I like to play PC and mobile games", "I like to code"]', 2),
('dislikes', 'title', 'What I Don''t Like', 3),
('dislikes', 'items', '["Unorganized code", "Missing deadlines", "Poor documentation"]', 4);

-- SKILLS (More complex - might need separate table, but let's use JSON)
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('skills', 'frontend_title', 'Front-end Development', 1),
('skills', 'frontend_skills', '[{"name": "HTML/CSS", "percentage": 95, "description": "Expert level knowledge of semantic HTML5 and modern CSS3 techniques"}, {"name": "JavaScript", "percentage": 85, "description": "Strong proficiency in ES6+, DOM manipulation, and modern frameworks"}, {"name": "React", "percentage": 80, "description": "Experience with React hooks, state management, and component architecture"}]', 2),
('skills', 'backend_title', 'Back-end Development', 3),
('skills', 'backend_skills', '[{"name": "Node.js", "percentage": 75, "description": "Server-side JavaScript development with Express and REST APIs"}, {"name": "Python", "percentage": 70, "description": "Python development with Django and data analysis tools"}, {"name": "SQL", "percentage": 65, "description": "Database design, optimization, and complex queries"}]', 4);

-- EXPERIENCE (Array of experiences)
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('experience', 'title', 'Professional Experience', 1),
('experience', 'items', '[{"job_title": "Senior Software Architect", "company": "Tech Innovations Inc.", "period": "2022 - Present", "description": ["Lead the architectural design and implementation of enterprise-scale applications", "Mentor team of 12 developers and establish technical best practices", "Drive adoption of microservices architecture and cloud-native solutions", "Reduce system downtime by 75% through improved architecture and monitoring"]}, {"job_title": "Lead Developer", "company": "Digital Solutions Corp.", "period": "2019 - 2022", "description": ["Spearheaded development of company''s flagship product reaching 1M+ users", "Implemented CI/CD pipeline reducing deployment time by 60%", "Managed team of 8 developers across multiple projects", "Increased code test coverage from 45% to 90%"]}]', 2);

-- EDUCATION
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('education', 'title', 'Education', 1),
('education', 'items', '[{"degree": "Bachelor of Science in Computer Science", "institution": "Your University", "period": "2020 - 2024", "description": "Specialized in Web Development and Database Management"}, {"degree": "High School Diploma", "institution": "Your High School", "period": "2016 - 2020", "description": "Graduated with honors"}]', 2);

-- CONTACT INFO
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('contact', 'title', 'Contact Info', 1),
('contact', 'description', 'Feel free to reach out for collaborations or just a friendly hello!', 2),
('contact', 'email', 'eumy.simoun.castillo@gmail.com', 3),
('contact', 'phone', '+63 9391071735', 4),
('contact', 'location', 'Philippines', 5);

-- SOCIAL LINKS
INSERT INTO sections (section_name, field_name, content, display_order) VALUES
('social', 'github', 'https://github.com/eumysimouncastillo', 1),
('social', 'linkedin', '#', 2),
('social', 'twitter', '#', 3),
('social', 'instagram', '#', 4);