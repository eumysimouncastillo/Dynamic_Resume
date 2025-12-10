<?php
session_start();
$isLoggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - SnapFolio Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Dynamic Portfolio CSS -->
  <link href="dynamic/css/edit-mode.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: SnapFolio
  * Template URL: https://bootstrapmade.com/snapfolio-bootstrap-portfolio-template/
  * Updated: Jul 21 2025 with Bootstrap v5.3.7
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header dark-background d-flex flex-column justify-content-center">
    <i class="header-toggle d-xl-none bi bi-list"></i>

    <div class="header-container d-flex flex-column align-items-start">
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active"><i class="bi bi-house navicon"></i>Home</a></li>
          <li><a href="#about"><i class="bi bi-person navicon"></i> About</a></li>
          <li><a href="#resume"><i class="bi bi-file-earmark-text navicon"></i> Resume</a></li>
          <li><a href="#portfolio"><i class="bi bi-images navicon"></i> Portfolio</a></li>
          <li><a href="#services"><i class="bi bi-hdd-stack navicon"></i> Services</a></li>
          <li class="dropdown"><a href="#"><i class="bi bi-menu-button navicon"></i> <span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact"><i class="bi bi-envelope navicon"></i> Contact</a></li>
        </ul>
      </nav>

      <div class="social-links text-center">
        <a href="#" class="twitter"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bi bi-skype"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
      </div>

    </div>

  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="background-elements">
        <div class="bg-circle circle-1"></div>
        <div class="bg-circle circle-2"></div>
      </div>

      <div class="hero-content">

        <div class="container">
          <div class="row align-items-center">

            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
              <div class="hero-text">
                <h1>
                  <span data-section="hero" data-field="title_prefix">Eumy's</span> 
                  <span class="accent-text" data-section="hero" data-field="title_suffix">Portfolio</span>
                </h1>
                <h2 data-section="hero" data-field="name">Eumy Simoun J. Castillo</h2>
                <p class="lead">I'm a 
                  <span class="typed" 
                        data-typed-items="Full Stack Web Developer, Dedicated Problem Solver, Passionate Programmer"
                        data-section="hero" 
                        data-field="typed_items">
                  </span>
                </p>
                <p class="description" data-section="hero" data-field="description">Dedicated and passionate on solving real-world problems through versatile coding and thoughtful user-centric design.</p>

                <div class="hero-actions">
                  <a href="#portfolio" class="btn btn-primary">View My Work</a>
                  <a href="#contact" class="btn btn-outline">Get In Touch</a>
                </div>

                <div class="social-links">
                  <a href="#"><i class="bi bi-dribbble"></i></a>
                  <a href="#"><i class="bi bi-behance"></i></a>
                  <a href="#"><i class="bi bi-github"></i></a>
                  <a href="#"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="hero-visual">
                    <div class="profile-container">
                        <div class="profile-background"></div>
                        <img src="assets/img/profile/profile-2.webp" 
                            alt="Alexander Chen" 
                            class="profile-image"
                            data-section="media"
                            data-field="hero_image">
                    </div>
                </div>
            </div>

          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-5" data-aos="zoom-in" data-aos-delay="200">
            <div class="profile-card">
              <div class="profile-header">
                <div class="profile-image">
                  <img src="assets/img/profile/profile-square-3.webp" alt="Profile Image" class="img-fluid" data-section="media" data-field="profile_image">
                </div>
                <div class="profile-badge">
                  <i class="bi bi-check-circle-fill"></i>
                </div>
              </div>

              <div class="profile-content">
                <h3 data-section="profile" data-field="full_name">Eumy Simoun J. Castillo</h3>
                <p class="profession" data-section="profile" data-field="profession">Full Stack Web Developer</p>

                <div class="contact-links">
                  <a href="mailto:marcus@example.com" class="contact-item" data-section="contact" data-field="email">
                    <i class="bi bi-envelope"></i>
                    <span class="contact-text">marcus@example.com</span>
                  </a>
                  <a href="tel:+15551234567" class="contact-item" data-section="contact" data-field="phone">
                    <i class="bi bi-telephone"></i>
                    <span class="contact-text">+1 (555) 123-4567</span>
                  </a>
                  <a href="#" class="contact-item" data-section="contact" data-field="location">
                    <i class="bi bi-geo-alt"></i>
                    <span class="contact-text">San Francisco, CA</span>
                  </a>
                </div>
              </div>
            </div>
            <br> <br>
            <div class="resume-item">
                <h4 data-section="preferences" data-field="likes_dislikes_title">LIkes and Dislikes</h4>
                <h5 data-section="preferences" data-field="likes_title">What I Like</h5>
                <ul id="likes-list">
                  <li data-section="preferences" data-field="like_1">I like dogs and cats, and everything in between</li>
                  <li data-section="preferences" data-field="like_2">I like to play PC and mobile games</li>
                  <li data-section="preferences" data-field="like_3">I like to code</li>
                </ul>
                <h5 data-section="preferences" data-field="dislikes_title">What I Don't Like</h5>
                <ul id="dislikes-list">
                  <li data-section="preferences" data-field="dislike_1">Unorganized code</li>
                  <li data-section="preferences" data-field="dislike_2">Missing deadlines</li>
                  <li data-section="preferences" data-field="dislike_3">Poor documentation</li>
                </ul>
              </div>
          </div>

          <div class="col-lg-7" data-aos="fade-left" data-aos-delay="300">
            <div class="about-content">
              <div class="section-header">
                <span class="badge-text">Get to Know Me</span>
                <h2 data-section="about" data-field="title">Random Things About Me</h2>
              </div>

              <div class="description">
                <p data-section="about" data-field="description_1">Hi! I am a blah blah, and below i will tell you random things about myselfHi! I am a blah blah, and below i will tell you random things about myselfHi! I am a blah blah, and below i will tell you random things about myself</p>

                <p data-section="about" data-field="description_2">Im a 4th year compsci student blah blahHi! I am a blah blah, and below i will tell you random things about myselfHi! I am a blah blah, and below i will tell you random things about myself</p>
              </div>

              <div class="stats-grid">
                <div class="stat-item">
                  <div class="stat-number" data-section="stats" data-field="projects_count">30+</div>
                  <div class="stat-label" data-section="stats" data-field="projects_label">Personal Projects Completed</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number" data-section="stats" data-field="experience_count">4+</div>
                  <div class="stat-label" data-section="stats" data-field="experience_label">Years Coding Experience</div>
                </div>
                <div class="stat-item">
                  <div class="stat-number" data-section="stats" data-field="languages_count">10+</div>
                  <div class="stat-label" data-section="stats" data-field="languages_label">Languages and Frameworks Used</div>
                </div>
              </div>

              <div class="details-grid">
                <div class="detail-row">
                  <div class="detail-item">
                    <span class="detail-label">Favorite Games</span>
                    <span class="detail-value" data-section="favorites" data-field="games">Factorio &amp; Stardew Valley</span>
                  </div>
                  <div class="detail-item">
                    <span class="detail-label">Favorite Food</span>
                    <span class="detail-value" data-section="favorites" data-field="food">Lechon Manok</span>
                  </div>
                </div>
                <div class="detail-row">
                  <div class="detail-item">
                    <span class="detail-label">Favorite Series</span>
                    <span class="detail-value" data-section="favorites" data-field="series">Breaking Bad</span>
                  </div>
                  <div class="detail-item">
                    <span class="detail-label">Favorite Quote</span>
                    <span class="detail-value" data-section="favorites" data-field="quote">"Memento Mori"</span>
                  </div>
                </div>
              </div>

              <div class="cta-section">
                <a href="#" class="btn btn-primary">
                  <i class="bi bi-download"></i>
                  Download Resume
                </a>
                <a href="#" class="btn btn-outline">
                  <i class="bi bi-chat-dots"></i>
                  Let's Talk
                </a>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /About Section -->

    <!-- Skills Section -->
    <section id="skills" class="skills section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 data-section="skills" data-field="title">Technical Skills</h2>
        <p data-section="skills" data-field="subtitle">Here are some of my technical skills!</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row">
          <div class="col-lg-6">
            <div class="skills-category" data-aos="fade-up" data-aos-delay="200">
              <h3 data-section="skills" data-field="frontend_title">Front-end Development</h3>
              <div class="skills-animation" id="frontend-skills-container">
                <!-- Frontend skills will be loaded dynamically -->
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 data-section="frontend_skills" data-field="skill_1_name">HTML/CSS</h4>
                    <span class="skill-percentage" data-section="frontend_skills" data-field="skill_1_percentage">95%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 95%" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip" data-section="frontend_skills" data-field="skill_1_description">Expert level knowledge of semantic HTML5 and modern CSS3 techniques</div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 data-section="frontend_skills" data-field="skill_2_name">JavaScript</h4>
                    <span class="skill-percentage" data-section="frontend_skills" data-field="skill_2_percentage">85%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip" data-section="frontend_skills" data-field="skill_2_description">Strong proficiency in ES6+, DOM manipulation, and modern frameworks</div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 data-section="frontend_skills" data-field="skill_3_name">React</h4>
                    <span class="skill-percentage" data-section="frontend_skills" data-field="skill_3_percentage">80%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip" data-section="frontend_skills" data-field="skill_3_description">Experience with React hooks, state management, and component architecture</div>
                </div>
              </div>
            </div><!-- End Frontend Skills -->
          </div>

          <div class="col-lg-6">
            <div class="skills-category" data-aos="fade-up" data-aos-delay="300">
              <h3 data-section="skills" data-field="backend_title">Back-end Development</h3>
              <div class="skills-animation" id="backend-skills-container">
                <!-- Backend skills will be loaded dynamically -->
                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 data-section="backend_skills" data-field="skill_1_name">Node.js</h4>
                    <span class="skill-percentage" data-section="backend_skills" data-field="skill_1_percentage">75%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip" data-section="backend_skills" data-field="skill_1_description">Server-side JavaScript development with Express and REST APIs</div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 data-section="backend_skills" data-field="skill_2_name">Python</h4>
                    <span class="skill-percentage" data-section="backend_skills" data-field="skill_2_percentage">70%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip" data-section="backend_skills" data-field="skill_2_description">Python development with Django and data analysis tools</div>
                </div>

                <div class="skill-item">
                  <div class="d-flex justify-content-between align-items-center">
                    <h4 data-section="backend_skills" data-field="skill_3_name">SQL</h4>
                    <span class="skill-percentage" data-section="backend_skills" data-field="skill_3_percentage">65%</span>
                  </div>
                  <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <div class="skill-tooltip" data-section="backend_skills" data-field="skill_3_description">Database design, optimization, and complex queries</div>
                </div>
              </div>
            </div><!-- End Backend Skills -->
          </div>
        </div>

      </div>

    </section><!-- /Skills Section -->

    <!-- Resume Section -->
    <section id="resume" class="resume section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 data-section="resume" data-field="title">Resume</h2>
        <p data-section="resume" data-field="subtitle">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">
          <!-- Left column with summary and contact -->
          <div class="col-lg-4">
            <div class="resume-side" data-aos="fade-right" data-aos-delay="100">
              <div class="profile-img mb-4">
                <img src="assets/img/profile/profile-square-2.webp" alt="Profile" class="img-fluid rounded" data-section="media" data-field="resume_image">
              </div>

              <h3 data-section="resume" data-field="summary_title">Professional Summary</h3>
              <p data-section="resume" data-field="summary">Dedicated Computer Science student leveraging a strong academic foundation in algorithms and data structures to build efficient, full-stack web applications. Has a passion for creating clean code and seamless user experiences. Seeking to apply technical knowledge in a challenging development environment.</p>

              <h3 class="mt-4" data-section="resume" data-field="contact_title">Contact Information</h3>
              <ul class="contact-info list-unstyled">
                <li><i class="bi bi-geo-alt"></i> <span data-section="resume_contact" data-field="location">Philippines</span></li>
                <li><i class="bi bi-envelope"></i> <span data-section="resume_contact" data-field="email">eumy.simoun.castillo@gmail.com</span></li>
                <li><i class="bi bi-phone"></i> <span data-section="resume_contact" data-field="phone">+63 9391071735</span></li>
                <li><i class="bi bi-github"></i> <span data-section="resume_contact" data-field="github">github.com/eumysimouncastillo</span></li>
              </ul>

              <div>
                <h3 data-section="resume" data-field="skills_title">Skills</h3>
                <h5 data-section="resume" data-field="technical_title">Technical Skills</h5>
                <ul class="resume-item">
                  <li data-section="technical_skills" data-field="skill_1"><b>Core Languages:</b> Python, Java, C++, PHP</li>
                  <li data-section="technical_skills" data-field="skill_2"><b>Web Frontend:</b> JavaScript, HTML, CSS, jQuery</li>
                  <li data-section="technical_skills" data-field="skill_3"><b>Styling & Frameworks:</b> Tailwind CSS, Bootstrap</li>
                  <li data-section="technical_skills" data-field="skill_4"><b>Database & Backend:</b> MySQL, XAMPP</li>
                  <li data-section="technical_skills" data-field="skill_5"><b>Development Tools:</b>  VS Code, Git/GitHub</li>
                </ul>

                <h5 data-section="resume" data-field="soft_title">Soft Skills</h5>
                <ul class="resume-item">
                  <li data-section="soft_skills" data-field="skill_1">Critical Thinking</li>
                  <li data-section="soft_skills" data-field="skill_2">Adaptability</li>
                  <li data-section="soft_skills" data-field="skill_3">Problem-Solving</li>
                  <li data-section="soft_skills" data-field="skill_4">Teamwork & Collaboration</li>
                </ul>

              </div>
            </div>
          </div>

          <!-- Right column with experience and education -->
          <div class="col-lg-8 ps-4 ps-lg-5">
            <!-- Experience Section -->
            <div class="resume-section" data-aos="fade-up">
              <h3 data-section="experience" data-field="title">Professional Experience</h3>

              <div class="resume-item">
                <h4 data-section="experience" data-field="job_1_title">Senior Software Architect</h4>
                <h5 data-section="experience" data-field="job_1_period">2022 - Present</h5>
                <p class="company" data-section="experience" data-field="job_1_company"> Tech Innovations Inc.</p>
                <ul>
                  <li data-section="experience" data-field="job_1_resp_1">Lead the architectural design and implementation of enterprise-scale applications</li>
                  <li data-section="experience" data-field="job_1_resp_2">Mentor team of 12 developers and establish technical best practices</li>
                  <li data-section="experience" data-field="job_1_resp_3">Drive adoption of microservices architecture and cloud-native solutions</li>
                  <li data-section="experience" data-field="job_1_resp_4">Reduce system downtime by 75% through improved architecture and monitoring</li>
                </ul>
              </div>

              <div class="resume-item">
                <h4 data-section="experience" data-field="job_2_title">Lead Developer</h4>
                <h5 data-section="experience" data-field="job_2_period">2019 - 2022</h5>
                <p class="company" data-section="experience" data-field="job_2_company"> Digital Solutions Corp.</p>
                <ul>
                  <li data-section="experience" data-field="job_2_resp_1">Spearheaded development of company's flagship product reaching 1M+ users</li>
                  <li data-section="experience" data-field="job_2_resp_2">Implemented CI/CD pipeline reducing deployment time by 60%</li>
                  <li data-section="experience" data-field="job_2_resp_3">Managed team of 8 developers across multiple projects</li>
                  <li data-section="experience" data-field="job_2_resp_4">Increased code test coverage from 45% to 90%</li>
                </ul>
              </div>
            </div>

            <!-- Education Section -->
            <div class="resume-section" data-aos="fade-up" data-aos-delay="100">
              <h3 data-section="education" data-field="title">Education</h3>

              <div class="resume-item">
                <h4 data-section="education" data-field="edu_1_degree">Master of Science in Computer Science</h4>
                <h5 data-section="education" data-field="edu_1_period">2017 - 2019</h5>
                <p class="company" data-section="education" data-field="edu_1_institution"> Stanford University</p>
                <p data-section="education" data-field="edu_1_description">Specialized in Artificial Intelligence and Machine Learning. Graduated with honors.</p>
              </div>

              <div class="resume-item">
                <h4 data-section="education" data-field="edu_2_degree">Bachelor of Science in Software Engineering</h4>
                <h5 data-section="education" data-field="edu_2_period">2013 - 2017</h5>
                <p class="company" data-section="education" data-field="edu_2_institution"> MIT</p>
                <p data-section="education" data-field="edu_2_description">Dean's List all semesters. Led university's coding club.</p>
              </div>
            </div>

            <!-- Certifications Section -->
            <div class="resume-section" data-aos="fade-up" data-aos-delay="200">
              <h3 data-section="certifications" data-field="title">Certifications</h3>

              <div class="resume-item">
                <h4 data-section="certifications" data-field="cert_1">AWS Certified Solutions Architect - Professional</h4>
                <h5 data-section="certifications" data-field="cert_1_year">2023</h5>
              </div>

              <div class="resume-item">
                <h4 data-section="certifications" data-field="cert_2">Google Cloud Professional Architect</h4>
                <h5 data-section="certifications" data-field="cert_2_year">2022</h5>
              </div>
            </div>
          </div>
        </div>

      </div>

    </section><!-- /Resume Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 data-section="portfolio" data-field="title">Projects</h2>
        <p data-section="portfolio" data-field="subtitle">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

          <div class="row">
            

            <div class="col-lg-12">
              <div class="row gy-4 portfolio-container isotope-container" data-aos="fade-up" data-aos-delay="200">

                <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-photography">
                  <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-portrait-1.webp" class="img-fluid" alt="Portfolio Image" loading="lazy" data-section="portfolio" data-field="project_1_image">
                    <div class="portfolio-info">
                      <div class="content">
                        <span class="category" data-section="portfolio" data-field="project_1_category">Photography</span>
                        <h4 data-section="portfolio" data-field="project_1_title">Capturing Moments</h4>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-portrait-1.webp" class="glightbox" title="Capturing Moments"><i class="bi bi-plus-lg"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bi bi-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-design">
                  <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-2.webp" class="img-fluid" alt="Portfolio Image" loading="lazy" data-section="portfolio" data-field="project_2_image">
                    <div class="portfolio-info">
                      <div class="content">
                        <span class="category" data-section="portfolio" data-field="project_2_category">Web Design</span>
                        <h4 data-section="portfolio" data-field="project_2_title">Woodcraft Design</h4>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-2.webp" class="glightbox" title="Woodcraft Design"><i class="bi bi-plus-lg"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bi bi-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-automotive">
                  <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-portrait-2.webp" class="img-fluid" alt="Portfolio Image" loading="lazy" data-section="portfolio" data-field="project_3_image">
                    <div class="portfolio-info">
                      <div class="content">
                        <span class="category" data-section="portfolio" data-field="project_3_category">Automotive</span>
                        <h4 data-section="portfolio" data-field="project_3_title">Classic Beauty</h4>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-portrait-2.webp" class="glightbox" title="Classic Beauty"><i class="bi bi-plus-lg"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bi bi-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->

                <div class="col-lg-6 col-md-6 portfolio-item isotope-item filter-nature">
                  <div class="portfolio-wrap">
                    <img src="assets/img/portfolio/portfolio-portrait-4.webp" class="img-fluid" alt="Portfolio Image" loading="lazy" data-section="portfolio" data-field="project_4_image">
                    <div class="portfolio-info">
                      <div class="content">
                        <span class="category" data-section="portfolio" data-field="project_4_category">Nature</span>
                        <h4 data-section="portfolio" data-field="project_4_title">Natural Growth</h4>
                        <div class="portfolio-links">
                          <a href="assets/img/portfolio/portfolio-portrait-4.webp" class="glightbox" title="Natural Growth"><i class="bi bi-plus-lg"></i></a>
                          <a href="portfolio-details.html" title="More Details"><i class="bi bi-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div><!-- End Portfolio Item -->

              </div><!-- End Portfolio Container -->
            </div>
          </div>

        </div>

      </div>

    </section><!-- /Portfolio Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2 data-section="contact" data-field="title">Contact</h2>
        <p data-section="contact" data-field="subtitle">Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row g-4 g-lg-5">
          <div class="col-lg-5">
            <div class="info-box">
              <h3 data-section="contact_info" data-field="title">Contact Info</h3>
              <p data-section="contact_info" data-field="description">Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis.</p>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-geo-alt"></i>
                </div>
                <div class="content">
                  <h4 data-section="contact_info" data-field="location_title">Our Location</h4>
                  <p data-section="contact_info" data-field="address_line1">A108 Adam Street</p>
                  <p data-section="contact_info" data-field="address_line2">New York, NY 535022</p>
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-telephone"></i>
                </div>
                <div class="content">
                  <h4 data-section="contact_info" data-field="phone_title">Phone Number</h4>
                  <p data-section="contact_info" data-field="phone1">+1 5589 55488 55</p>
                  <p data-section="contact_info" data-field="phone2">+1 6678 254445 41</p>
                </div>
              </div>

              <div class="info-item">
                <div class="icon-box">
                  <i class="bi bi-envelope"></i>
                </div>
                <div class="content">
                  <h4 data-section="contact_info" data-field="email_title">Email Address</h4>
                  <p data-section="contact_info" data-field="email1">info@example.com</p>
                  <p data-section="contact_info" data-field="email2">contact@example.com</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-7">
            <div class="contact-form">
              <h3 data-section="contact_form" data-field="title">Get In Touch</h3>
              <p data-section="contact_form" data-field="description">Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ante ipsum primis.</p>

              <form action="forms/contact.php" method="post" class="php-email-form">
                <div class="row gy-4">

                  <div class="col-md-6">
                    <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                  </div>

                  <div class="col-md-6 ">
                    <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                  </div>

                  <div class="col-12">
                    <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                  </div>

                  <div class="col-12">
                    <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                  </div>

                  <div class="col-12 text-center">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your message has been sent. Thank you!</div>

                    <button type="submit" class="btn">Send Message</button>
                  </div>

                </div>
              </form>

            </div>
          </div>

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">iPortfolio</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/typed.js/typed.umd.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  <!-- =======================================================
       DYNAMIC PORTFOLIO FUNCTIONALITY
       ======================================================== -->
  
  <!-- Dynamic Portfolio Scripts -->
  <script type="module" src="dynamic/js/content-loader.js"></script>
  <script type="module" src="dynamic/js/modal-editor.js"></script>
  <script src="/dynamic_resume/dynamic/js/image-uploader.js"></script>

</body>

</html>