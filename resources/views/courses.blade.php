{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SKILL - Courses</title>
    <style>
        /* Reset and Base Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }
        
        body {
            background-color: #fff9f5;
            color: #333;
            line-height: 1.6;
        }
        
        a {
            text-decoration: none;
            color: inherit;
        }
        
        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header Styles */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 0;
            margin-bottom: 30px;
        }
        
        .logo {
            font-size: 28px;
            font-weight: 700;
            color: #333;
        }
        
        .nav-links {
            display: flex;
            gap: 30px;
        }
        
        .nav-links a {
            font-weight: 500;
        }
        
        .nav-links a:hover, .nav-links a.active {
            color: #FF6B35;
        }
        
        .auth-buttons {
            display: flex;
            gap: 15px;
            align-items: center;
        }
        
        .login-btn {
            font-weight: 500;
        }
        
        .signup-btn {
            background-color: #333;
            color: white;
            padding: 10px 20px;
            border-radius: 50px;
            font-weight: 500;
        }
        
        /* Hero Section */
        .page-header {
            background-color: #e9f8f5;
            padding: 80px 0;
            border-radius: 20px;
            margin-bottom: 50px;
            text-align: center;
        }
        
        .page-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .page-title .highlight {
            color: #FF6B35;
        }
        
        .page-description {
            max-width: 700px;
            margin: 0 auto;
            font-size: 18px;
            color: #666;
        }
        
        /* Search and Filter */
        .course-search-section {
            margin-bottom: 50px;
        }
        
        .search-filter-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .search-form {
            display: flex;
            width: 400px;
            background-color: white;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .search-input {
            flex: 1;
            padding: 15px 20px;
            border: none;
            outline: none;
            font-size: 16px;
        }
        
        .search-button {
            background-color: #FF6B35;
            color: white;
            border: none;
            padding: 15px 30px;
            font-weight: 600;
            cursor: pointer;
        }
        
        .filter-buttons {
            display: flex;
            gap: 10px;
        }
        
        .filter-button {
            background-color: white;
            border: 1px solid #ddd;
            padding: 10px 20px;
            border-radius: 30px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-button:hover, .filter-button.active {
            background-color: #FF6B35;
            color: white;
            border-color: #FF6B35;
        }
        
        /* Category Pills */
        .category-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 30px;
        }
        
        .category-pill {
            background-color: #f4f4f4;
            padding: 8px 20px;
            border-radius: 30px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .category-pill:hover, .category-pill.active {
            background-color: #48B899;
            color: white;
        }
        
        /* Courses Grid */
        .courses-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
            margin-bottom: 50px;
        }
        
        .course-card {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .course-card:hover {
            transform: translateY(-10px);
        }
        
        .course-image {
            height: 180px;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }
        
        .course-tag {
            position: absolute;
            top: 15px;
            left: 15px;
            background-color: #FF6B35;
            color: white;
            padding: 5px 10px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        .course-image.design {
        background-color: #f0fff4;
        }
        
        .course-image.development {
            background-color: #eff6ff;
        }
        
        .course-image.marketing {
            background-color: #eef2ff;
        }
        
        .course-image.business {
            background-color: #fdf2f8;
        }
        
        .course-content {
            padding: 20px;
        }
        
        .course-title {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .course-instructor {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }
        
        .instructor-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #f4f4f4;
        }
        
        .instructor-name {
            font-size: 14px;
            color: #666;
        }
        
        .course-stats {
            display: flex;
            justify-content: space-between;
            padding-top: 15px;
            border-top: 1px solid #f4f4f4;
            color: #666;
            font-size: 14px;
        }
        
        .course-stat {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .course-price {
            font-weight: 600;
            color: #333;
            font-size: 18px;
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin: 50px 0;
        }
        
        .page-number {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: white;
            box-shadow: 0 3px 10px rgba(0,0,0,0.05);
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .page-number:hover, .page-number.active {
            background-color: #FF6B35;
            color: white;
        }
        
        /* Featured Section */
        .featured-section {
            padding: 70px 0;
            background-color: white;
            border-radius: 20px;
            margin-bottom: 70px;
        }
        
        .section-heading {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 40px;
            text-align: center;
        }
        
        .featured-course {
            display: flex;
            gap: 30px;
            background-color: #e9f8f5;
            border-radius: 20px;
            overflow: hidden;
        }
        
        .featured-image {
            flex: 1;
            min-height: 300px;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .featured-content {
            flex: 1;
            padding: 40px;
        }
        
        .featured-tag {
            background-color: #FF6B35;
            color: white;
            padding: 5px 15px;
            border-radius: 30px;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 20px;
        }
        
        .featured-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .featured-description {
            color: #666;
            margin-bottom: 20px;
        }
        
        .featured-stats {
            display: flex;
            gap: 30px;
            margin-bottom: 30px;
        }
        
        .featured-stat {
            display: flex;
            flex-direction: column;
        }
        
        .stat-value {
            font-weight: 600;
            font-size: 18px;
        }
        
        .stat-label {
            color: #666;
            font-size: 14px;
        }
        
        .cta-button {
            background-color: #FF6B35;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            display: inline-block;
        }
        
        /* Testimonial Section */
        .testimonial-section {
            margin-bottom: 70px;
        }
        
        /* Footer */
        footer {
            background-color: #333;
            color: white;
            padding: 70px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 50px;
            margin-bottom: 50px;
        }
        
        .footer-logo {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .footer-desc {
            color: rgba(255,255,255,0.7);
            margin-bottom: 20px;
        }
        
        .social-links {
            display: flex;
            gap: 15px;
        }
        
        .social-icon {
            width: 40px;
            height: 40px;
            background-color: rgba(255,255,255,0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .footer-heading {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
        }
        
        .footer-links {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 15px;
        }
        
        .footer-links a {
            color: rgba(255,255,255,0.7);
            transition: color 0.3s ease;
        }
        
        .footer-links a:hover {
            color: white;
        }
        
        .newsletter-form {
            display: flex;
            margin-top: 20px;
        }
        
        .newsletter-input {
            flex: 1;
            padding: 10px 15px;
            border: none;
            border-radius: 5px 0 0 5px;
            outline: none;
        }
        
        .newsletter-button {
            background-color: #FF6B35;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 0 5px 5px 0;
            cursor: pointer;
        }
        
        .copyright {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255,255,255,0.1);
            color: rgba(255,255,255,0.5);
            font-size: 14px;
        }
        
        /* Responsive Styles */
        @media (max-width: 992px) {
            .featured-course {
                flex-direction: column;
            }
            
            .search-filter-container {
                flex-direction: column;
                gap: 20px;
                align-items: stretch;
            }
            
            .search-form {
                width: 100%;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .courses-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <header>
            <div class="logo">TUTOACADEMY</div>
            <div class="nav-links">
                <a href="/">Home</a>
                <a href="courses" class="active">Courses</a>
                <a href="About">About</a>
                <a href="contact">Contact</a>
            </div>
            <div class="auth-buttons">
                <a href="login" class="login-btn">Login</a>
                <a href="register" class="signup-btn">Sign Up</a>
            </div>
        </header>
        
        <section class="page-header">
            <h1 class="page-title">Explore Our <span class="highlight">Courses</span></h1>
            <p class="page-description">Discover a wide range of courses designed to help you master new skills, advance your career, and achieve your learning goals.</p>
        </section>
        
        <section class="course-search-section">
            <div class="search-filter-container">
                <form class="search-form">
                    <input type="text" class="search-input" placeholder="Search for courses...">
                    <button type="submit" class="search-button">Search</button>
                </form>
                
                <div class="filter-buttons">
                    <button class="filter-button active">All</button>
                    <button class="filter-button">Popular</button>
                    <button class="filter-button">Newest</button>
                    <button class="filter-button">Price</button>
                </div>
            </div>
            
            <div class="category-pills">
                <div class="category-pill active">All Categories</div>
                <div class="category-pill">Design</div>
                <div class="category-pill">Development</div>
                <div class="category-pill">Marketing</div>
                <div class="category-pill">Business</div>
                <div class="category-pill">Photography</div>
                <div class="category-pill">Writing</div>
                <div class="category-pill">Music</div>
            </div>
        </section>
        
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image design">
                    <img src="/api/placeholder/80/80" alt="UI/UX Design">
                    <div class="course-tag">Design</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">UI/UX Design Masterclass</h3>
                    <div class="course-instructor">
                        <div class="instructor-avatar"></div>
                        <div class="instructor-name">Sarah Johnson</div>
                    </div>
                    <div class="course-stats">
                        <div class="course-stat">
                            <span>⭐</span>
                            <span>4.8</span>
                        </div>
                        <div class="course-stat">
                            <span>👥</span>
                            <span>2.4k</span>
                        </div>
                        <div class="course-price">$89</div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image development">
                    <img src="/api/placeholder/80/80" alt="Web Development">
                    <div class="course-tag">Development</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Full-Stack Web Development</h3>
                    <div class="course-instructor">
                        <div class="instructor-avatar"></div>
                        <div class="instructor-name">Alex Chen</div>
                    </div>
                    <div class="course-stats">
                        <div class="course-stat">
                            <span>⭐</span>
                            <span>4.9</span>
                        </div>
                        <div class="course-stat">
                            <span>👥</span>
                            <span>3.7k</span>
                        </div>
                        <div class="course-price">$129</div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image marketing">
                    <img src="/api/placeholder/80/80" alt="Digital Marketing">
                    <div class="course-tag">Marketing</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Digital Marketing Strategy</h3>
                    <div class="course-instructor">
                        <div class="instructor-avatar"></div>
                        <div class="instructor-name">Priya Sharma</div>
                    </div>
                    <div class="course-stats">
                        <div class="course-stat">
                            <span>⭐</span>
                            <span>4.7</span>
                        </div>
                        <div class="course-stat">
                            <span>👥</span>
                            <span>1.8k</span>
                        </div>
                        <div class="course-price">$99</div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image business">
                    <img src="/api/placeholder/80/80" alt="Business Analytics">
                    <div class="course-tag">Business</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Business Analytics & Data</h3>
                    <div class="course-instructor">
                        <div class="instructor-avatar"></div>
                        <div class="instructor-name">Mark Wilson</div>
                    </div>
                    <div class="course-stats">
                        <div class="course-stat">
                            <span>⭐</span>
                            <span>4.6</span>
                        </div>
                        <div class="course-stat">
                            <span>👥</span>
                            <span>1.2k</span>
                        </div>
                        <div class="course-price">$119</div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image design">
                    <img src="/api/placeholder/80/80" alt="Graphic Design">
                    <div class="course-tag">Design</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Graphic Design Fundamentals</h3>
                    <div class="course-instructor">
                        <div class="instructor-avatar"></div>
                        <div class="instructor-name">Emily Davis</div>
                    </div>
                    <div class="course-stats">
                        <div class="course-stat">
                            <span>⭐</span>
                            <span>4.8</span>
                        </div>
                        <div class="course-stat">
                            <span>👥</span>
                            <span>2.1k</span>
                        </div>
                        <div class="course-price">$79</div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image development">
                    <img src="/api/placeholder/80/80" alt="Mobile Development">
                    <div class="course-tag">Development</div>
                </div>
                <div class="course-content">
                    <h3 class="course-title">Mobile App Development</h3>
                    <div class="course-instructor">
                        <div class="instructor-avatar"></div>
                        <div class="instructor-name">David Kim</div>
                    </div>
                    <div class="course-stats">
                        <div class="course-stat">
                            <span>⭐</span>
                            <span>4.7</span>
                        </div>
                        <div class="course-stat">
                            <span>👥</span>
                            <span>1.9k</span>
                        </div>
                        <div class="course-price">$109</div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pagination">
            <div class="page-number active">1</div>
            <div class="page-number">2</div>
            <div class="page-number">3</div>
            <div class="page-number">4</div>
            <div class="page-number">→</div>
        </div>
        
        <section class="featured-section">
            <h2 class="section-heading">Featured Course</h2>
            <div class="featured-course">
                <div class="featured-image">
                    <img src="/api/placeholder/300/300" alt="Complete Web Design">
                </div>
                <div class="featured-content">
                    <div class="featured-tag">Most Popular</div>
                    <h3 class="featured-title">Complete Web Design: From Figma to Webflow</h3>
                    <p class="featured-description">Master the entire web design process from wireframing and UI/UX principles to implementation with Webflow. Create stunning, responsive websites that convert visitors into customers.</p>
                    
                    <div class="featured-stats">
                        <div class="featured-stat">
                            <div class="stat-value">42 Hours</div>
                            <div class="stat-label">Course Length</div>
                        </div>
                        <div class="featured-stat">
                            <div class="stat-value">124 Lessons</div>
                            <div class="stat-label">Total Lessons</div>
                        </div>
                        <div class="featured-stat">
                            <div class="stat-value">4.9 ⭐</div>
                            <div class="stat-label">Rating</div>
                        </div>
                    </div>
                    
                    <a href="#" class="cta-button">Enroll Now - $149</a>
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">SKILL</div>
                    <p class="footer-desc">Empowering individuals to master new skills and achieve their career goals through quality online education.</p>
                    <div class="social-links">
                        <a href="#" class="social-icon">f</a>
                        <a href="#" class="social-icon">t</a>
                        <a href="#" class="social-icon">in</a>
                        <a href="#" class="social-icon">ig</a>
                    </div>
                </div>
                <div class="footer-column">
                    <h3 class="footer-heading">Links</h3>
                    <ul class="footer-links">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="about.html">About</a></li>
                        <li><a href="courses.html">Courses</a></li>
                        <li><a href="contact.html">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-heading">Categories</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('categorie.index') }}">ajouter une categorie</a></li>
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Business</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-heading">Subscribe</h3>
                    <p class="footer-desc">Get the latest updates and offers.</p>
                    <form class="newsletter-form">
                        <input type="email" class="newsletter-input" placeholder="Your email">
                        <button type="submit" class="newsletter-button">→</button>
                    </form>
                </div>
            </div>
            <div class="copyright">
                © 2025 SKILL. All rights reserved.
            </div>
        </div>
    </footer>
    
    <script>
        // Simple interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Course cards hover effect
            const courseCards = document.querySelectorAll('.course-card');
            courseCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
            
            // Filter buttons
            const filterButtons = document.querySelectorAll('.filter-button');
            filterButtons.forEach(button => {
                button.addEventListener('click', function() {
                    filterButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Category pills
            const categoryPills = document.querySelectorAll('.category-pill');
            categoryPills.forEach(pill => {
                pill.addEventListener('click', function() {
                    categoryPills.forEach(p => p.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Pagination
            const pageNumbers = document.querySelectorAll('.page-number');
            pageNumbers.forEach(page => {
                page.addEventListener('click', function() {
                    if (this.textContent !== '→') {
                        pageNumbers.forEach(p => p.classList.remove('active'));
                        this.classList.add('active');
                    }
                });
            });
            
            // Form validation
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    const input = this.querySelector('input');
                    if (input.value.trim() === '') {
                        input.style.borderColor = 'red';
                        setTimeout(() => {
                            input.style.borderColor = '';
                        }, 3000);
                    } else {
                        input.value = '';
                        alert('Form submitted successfully!');
                    }
                });
            });
        });
    






    // // Modèle de données pour les cours
    // let courses = [
    //     {
    //         id: 1,
    //         title: "UI/UX Design Masterclass",
    //         category: "Design",
    //         instructor: "Sarah Johnson",
    //         rating: 4.8,
    //         students: 2400,
    //         price: 89,
    //         image: "/api/placeholder/80/80"
    //     },
    //     {
    //         id: 2,
    //         title: "Full-Stack Web Development",
    //         category: "Development",
    //         instructor: "Alex Chen",
    //         rating: 4.9,
    //         students: 3700,
    //         price: 129,
    //         image: "/api/placeholder/80/80"
    //     },
    //     // Les autres cours existants...
    // ];
    
    // // Fonction pour ajouter un nouveau cours
    // function addCourse(courseData) {
    //     // Générer un nouvel ID (simple incrémentation)
    //     const newId = courses.length > 0 ? Math.max(...courses.map(course => course.id)) + 1 : 1;
        
    //     // Créer le nouvel objet de cours
    //     const newCourse = {
    //         id: newId,
    //         title: courseData.title || "Untitled Course",
    //         category: courseData.category || "Other",
    //         instructor: courseData.instructor || "Unknown Instructor",
    //         rating: courseData.rating || 0,
    //         students: courseData.students || 0,
    //         price: courseData.price || 0,
    //         image: courseData.image || "/api/placeholder/80/80"
    //     };
        
    //     // Ajouter à la liste des cours
    //     courses.push(newCourse);
        
    //     // Mettre à jour l'affichage
    //     displayCourses();
        
    //     return newId; // Retourner l'ID pour référence
    // }
    
    // // Fonction pour supprimer un cours
    // function deleteCourse(courseId) {
    //     const index = courses.findIndex(course => course.id === courseId);
    //     if (index !== -1) {
    //         courses.splice(index, 1);
    //         displayCourses();
    //         return true;
    //     }
    //     return false;
    // }
    
    // // Fonction pour filtrer les cours par catégorie
    // function filterCoursesByCategory(category) {
    //     if (category === "All Categories") {
    //         displayCourses(courses);
    //     } else {
    //         const filteredCourses = courses.filter(course => course.category === category);
    //         displayCourses(filteredCourses);
    //     }
    // }
    
    // // Fonction pour trier les cours
    // function sortCourses(criterion) {
    //     let sortedCourses = [...courses];
        
    //     switch(criterion) {
    //         case "Popular":
    //             sortedCourses.sort((a, b) => b.students - a.students);
    //             break;
    //         case "Newest":
    //             sortedCourses.sort((a, b) => b.id - a.id);
    //             break;
    //         case "Price":
    //             sortedCourses.sort((a, b) => a.price - b.price);
    //             break;
    //         default:
    //             // Par défaut, ne rien faire
    //             break;
    //     }
        
    //     displayCourses(sortedCourses);
    // }
    
    // // Fonction pour rechercher des cours
    // function searchCourses(query) {
    //     if (!query) {
    //         displayCourses();
    //         return;
    //     }
        
    //     query = query.toLowerCase();
    //     const matchedCourses = courses.filter(course => 
    //         course.title.toLowerCase().includes(query) || 
    //         course.instructor.toLowerCase().includes(query) ||
    //         course.category.toLowerCase().includes(query)
    //     );
        
    //     displayCourses(matchedCourses);
    // }
    
    // // Fonction pour afficher les cours
    // function displayCourses(coursesToDisplay = courses) {
    //     const coursesGrid = document.querySelector('.courses-grid');
    //     if (!coursesGrid) return;
        
    //     // Vider la grille de cours actuelle
    //     coursesGrid.innerHTML = '';
        
    //     // Créer et ajouter chaque carte de cours
    //     coursesToDisplay.forEach(course => {
    //         const courseCard = document.createElement('div');
    //         courseCard.className = 'course-card';
    //         courseCard.setAttribute('data-id', course.id);
            
    //         courseCard.innerHTML = `
    //             <div class="course-image ${course.category.toLowerCase()}">
    //                 <img src="${course.image}" alt="${course.title}">
    //                 <div class="course-tag">${course.category}</div>
    //             </div>
    //             <div class="course-content">
    //                 <h3 class="course-title">${course.title}</h3>
    //                 <div class="course-instructor">
    //                     <div class="instructor-avatar"></div>
    //                     <div class="instructor-name">${course.instructor}</div>
    //                 </div>
    //                 <div class="course-stats">
    //                     <div class="course-stat">
    //                         <span>⭐</span>
    //                         <span>${course.rating}</span>
    //                     </div>
    //                     <div class="course-stat">
    //                         <span>👥</span>
    //                         <span>${course.students >= 1000 ? (course.students / 1000).toFixed(1) + 'k' : course.students}</span>
    //                     </div>
    //                     <div class="course-price">$${course.price}</div>
    //                 </div>
    //             </div>
    //         `;
            
    //         coursesGrid.appendChild(courseCard);
    //     });
        
    //     // Mettre à jour le nombre de pages si nécessaire
    //     updatePagination(coursesToDisplay.length);
    // }
    
    // // Fonction pour mettre à jour la pagination
    // function updatePagination(totalItems) {
    //     const paginationContainer = document.querySelector('.pagination');
    //     if (!paginationContainer) return;
        
    //     const itemsPerPage = 6; // Nombre de cours par page
    //     const totalPages = Math.ceil(totalItems / itemsPerPage);
        
    //     paginationContainer.innerHTML = '';
        
    //     for (let i = 1; i <= totalPages; i++) {
    //         const pageNumber = document.createElement('div');
    //         pageNumber.className = 'page-number' + (i === 1 ? ' active' : '');
    //         pageNumber.textContent = i;
    //         pageNumber.addEventListener('click', function() {
    //             // Logique de changement de page ici
    //             document.querySelectorAll('.page-number').forEach(p => p.classList.remove('active'));
    //             this.classList.add('active');
    //             // Idéalement, vous chargeriez la page correspondante ici
    //         });
    //         paginationContainer.appendChild(pageNumber);
    //     }
        
    //     if (totalPages > 1) {
    //         const nextButton = document.createElement('div');
    //         nextButton.className = 'page-number';
    //         nextButton.textContent = '→';
    //         paginationContainer.appendChild(nextButton);
    //     }
    // }
    
    // // Fonction pour initialiser le formulaire d'ajout de cours
    // function setupCourseForm() {
    //     const container = document.querySelector('.container');
    //     if (!container) return;
        
    //     // Créer le bouton d'ajout
    //     const addButton = document.createElement('button');
    //     addButton.className = 'cta-button';
    //     addButton.textContent = 'Ajouter un cours';
    //     addButton.style.margin = '20px 0';
        
    //     // Insérer le bouton après la section de recherche
    //     const searchSection = document.querySelector('.course-search-section');
    //     if (searchSection) {
    //         searchSection.after(addButton);
    //     } else {
    //         container.insertBefore(addButton, document.querySelector('.courses-grid'));
    //     }
        
    //     // Créer le formulaire modal
    //     const modal = document.createElement('div');
    //     modal.className = 'course-modal';
    //     modal.style.display = 'none';
    //     modal.style.position = 'fixed';
    //     modal.style.zIndex = '1000';
    //     modal.style.left = '0';
    //     modal.style.top = '0';
    //     modal.style.width = '100%';
    //     modal.style.height = '100%';
    //     modal.style.backgroundColor = 'rgba(0,0,0,0.5)';
    //     modal.style.overflow = 'auto';
        
    //     modal.innerHTML = `
    //         <div style="background-color: white; margin: 10% auto; padding: 20px; border-radius: 10px; width: 50%; max-width: 500px;">
    //             <h2>Ajouter un nouveau cours</h2>
    //             <form id="course-form">
    //                 <div style="margin-bottom: 15px;">
    //                     <label for="course-title" style="display: block; margin-bottom: 5px;">Titre</label>
    //                     <input type="text" id="course-title" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;" required>
    //                 </div>
    //                 <div style="margin-bottom: 15px;">
    //                     <label for="course-category" style="display: block; margin-bottom: 5px;">Catégorie</label>
    //                     <select id="course-category" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;" required>
    //                         <option value="Design">Design</option>
    //                         <option value="Development">Development</option>
    //                         <option value="Marketing">Marketing</option>
    //                         <option value="Business">Business</option>
    //                         <option value="Photography">Photography</option>
    //                         <option value="Writing">Writing</option>
    //                         <option value="Music">Music</option>
    //                         <option value="Other">Other</option>
    //                     </select>
    //                 </div>
    //                 <div style="margin-bottom: 15px;">
    //                     <label for="course-instructor" style="display: block; margin-bottom: 5px;">Instructeur</label>
    //                     <input type="text" id="course-instructor" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;" required>
    //                 </div>
    //                 <div style="margin-bottom: 15px;">
    //                     <label for="course-price" style="display: block; margin-bottom: 5px;">Prix ($)</label>
    //                     <input type="number" id="course-price" style="width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ddd;" min="0" required>
    //                 </div>
    //                 <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 20px;">
    //                     <button type="button" id="cancel-course" style="padding: 10px 20px; border-radius: 5px; border: 1px solid #ddd; background-color: #f4f4f4; cursor: pointer;">Annuler</button>
    //                     <button type="submit" style="padding: 10px 20px; border-radius: 5px; border: none; background-color: #FF6B35; color: white; cursor: pointer;">Enregistrer</button>
    //                 </div>
    //             </form>
    //         </div>
    //     `;
        
    //     document.body.appendChild(modal);
        
    //     // Gestionnaires d'événements pour le modal
    //     addButton.addEventListener('click', function() {
    //         modal.style.display = 'block';
    //     });
        
    //     document.getElementById('cancel-course').addEventListener('click', function() {
    //         modal.style.display = 'none';
    //     });
        
    //     window.addEventListener('click', function(event) {
    //         if (event.target === modal) {
    //             modal.style.display = 'none';
    //         }
    //     });
        
    //     // Gérer la soumission du formulaire
    //     document.getElementById('course-form').addEventListener('submit', function(event) {
    //         event.preventDefault();
            
    //         const newCourse = {
    //             title: document.getElementById('course-title').value,
    //             category: document.getElementById('course-category').value,
    //             instructor: document.getElementById('course-instructor').value,
    //             price: parseFloat(document.getElementById('course-price').value),
    //             rating: 0,
    //             students: 0,
    //             image: "/api/placeholder/80/80"
    //         };
            
    //         addCourse(newCourse);
    //         modal.style.display = 'none';
            
    //         // Réinitialiser le formulaire
    //         this.reset();
    //     });
    // }
    
    // // Configurer les événements pour les filtres
    // function setupEventListeners() {
    //     // Filtres par catégorie
    //     const categoryPills = document.querySelectorAll('.category-pill');
    //     categoryPills.forEach(pill => {
    //         pill.addEventListener('click', function() {
    //             categoryPills.forEach(p => p.classList.remove('active'));
    //             this.classList.add('active');
    //             filterCoursesByCategory(this.textContent);
    //         });
    //     });
        
    //     // Boutons de filtre
    //     const filterButtons = document.querySelectorAll('.filter-button');
    //     filterButtons.forEach(button => {
    //         button.addEventListener('click', function() {
    //             filterButtons.forEach(btn => btn.classList.remove('active'));
    //             this.classList.add('active');
    //             sortCourses(this.textContent);
    //         });
    //     });
        
    //     // Recherche
    //     const searchForm = document.querySelector('.search-form');
    //     if (searchForm) {
    //         searchForm.addEventListener('submit', function(event) {
    //             event.preventDefault();
    //             const searchInput = this.querySelector('.search-input');
    //             searchCourses(searchInput.value);
    //         });
    //     }
    // }
    
    // // Initialiser l'interface
    // document.addEventListener('DOMContentLoaded', function() {
    //     // Afficher les cours initiaux
    //     displayCourses();
        
    //     // Configurer le formulaire d'ajout
    //     setupCourseForm();
        
    //     // Configurer les filtres et la recherche
    //     setupEventListeners();
    // });
</script>
</body>
</html> --}}