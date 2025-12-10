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



