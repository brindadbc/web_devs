{{-- @extends('layouts.app')

@section('content')
<div class="container">
    <section class="page-header">
        <h1 class="page-title">Manage <span class="highlight">Courses</span></h1>
        <p class="page-description">Create, edit, and manage all your courses in one place.</p>
    </section>

    @if(session('success'))
    <div class="alert alert-success mb-4" role="alert">
        {{ session('success') }}
    </div>
    @endif

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>All Courses</h2>
        <a href="{{ route('courses.create') }}" class="cta-button">Add New Course</a>
    </div>

    <div class="courses-grid">
        @forelse($courses as $course)
        <div class="course-card">
            <div class="course-image {{ strtolower($course->category) }}">
                <img src="{{ $course->image_url }}" alt="{{ $course->title }}">
                <div class="course-tag">{{ $course->category }}</div>
                @if($course->is_featured)
                <div class="course-tag" style="right: 15px; left: auto; background-color: #48B899;">Featured</div>
                @endif
            </div>
            <div class="course-content">
                <h3 class="course-title">{{ $course->title }}</h3>
                <div class="course-instructor">
                    <div class="instructor-avatar"></div>
                    <div class="instructor-name">{{ $course->instructor_name }}</div>
                </div>
                <div class="course-stats">
                    <div class="course-stat">
                        <span>⭐</span>
                        <span>{{ $course->rating }}.0</span>
                    </div>
                    <div class="course-stat">
                        <span>👥</span>
                        <span>{{ $course->students_count }}</span>
                    </div>
                    <div class="course-price">{{ $course->formatted_price }}</div>
                </div>
                <div class="mt-3 d-flex justify-content-between">
                    <a href="{{ route('courses.show', $course) }}" class="btn btn-sm btn-primary">View</a>
                    <a href="{{ route('courses.edit', $course) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('courses.destroy', $course) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this course?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info">No courses found. <a href="{{ route('courses.create') }}">Create one now</a>.</div>
        </div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $courses->links() }}
    </div>
</div>
@endsection --}}




<!DOCTYPE html>
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
                <a href="{{route('categories.index')}}">Categories</a>
            </div>
            {{-- <div class="auth-buttons">
                <a href="login" class="login-btn">Login</a>
                <a href="register" class="signup-btn">Sign Up</a>
            </div> --}}
            @auth
            <a href="{{ route('dashboard') }}">Dashboard</a>
            @endauth
        <div class="auth-buttons">
            @guest
                <a href="{{ route('login') }}" class="login-btn">Login</a>
                <a href="{{ route('register') }}" class="signup-btn">Sign Up</a>
            @else
                <span class="mr-3">{{ Auth::user()->name }}</span>
                <a href="{{ route('logout') }}" class="login-btn" 
                    onclick="event.preventDefault(); 
                    document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            @endguest
        </header>
        
        <section class="page-header">
            <h1 class="page-title">Explorez nos <span class="highlight">Cours</span></h1>
            <p class="page-description">Découvrez une large gamme de cours conçus pour vous aider à maîtriser de nouvelles compétences, à faire progresser votre carrière et à atteindre vos objectifs d'apprentissage.</p>
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
                <div class="category-pill"><a href="{{route('categories.index')}}">All Categories</a></div>
                <div class="category-pill"><a href="{{route('categories.index')}}">Design</a></div>
                <div class="category-pill"><a href="{{route('categories.index')}}">Development</a></div>
                <div class="category-pill"><a href="{{route('categories.index')}}">Marketing</a></div>
                <div class="category-pill"><a href="{{route('categories.index')}}">Business</a></div>
                <div class="category-pill"><a href="{{route('categories.index')}}">Photography</a>y</div>
                <div class="category-pill"><a href="{{route('categories.index')}}">Writing</a></div>
                <div class="category-pill"><a href="{{route('categories.index')}}">Music</a></div>
            </div>
        </section>
        
        <div class="courses-grid">
            <div class="course-card">
                <div class="course-image design">
                    <img src="" alt="UI/UX Design">
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
                        <div class="course-price"></div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image development">
                    <img src="" alt="Web Development">
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
                        <div class="course-price"></div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image marketing">
                    <img src="" alt="Digital Marketing">
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
                            <span>1.2k</span>
                        </div>
                        <div class="course-price"></div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image business">
                    <img src="" alt="Business Analytics">
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
                        <div class="course-price"></div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image design">
                    <img src="" alt="Graphic Design">
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
                        <div class="course-price"></div>
                    </div>
                </div>
            </div>
            
            <div class="course-card">
                <div class="course-image development">
                    <img src="" alt="Mobile Development">
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
                        <div class="course-price"></div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="pagination">
            <div class="page-number active">1</div>
            <div class="page-number">2</div>
            <div class="page-number">3</div>
            <div class="page-number">4</div>
            <div class="page-number">  <a href="courses/indexs">→</a></div>
        </div>
        
        <section class="featured-section">
            <h2 class="section-heading">Cours en vedette</h2>
            <div class="featured-course">
                <div class="featured-image">
                    <img src="{{asset('img/page25.jpg')}}" alt="Complete Web Design">
                </div>
                <div class="featured-content">
                    <div class="featured-tag">le plus populaire</div>
                    <h3 class="featured-title">Conception Web complète: à partir de Figma ou Webflow</h3>
                    <p class="featured-description">Maîtrisez l'ensemble du processus de conception Web, du wireframing et des principes UI/UX à la mise en œuvre avec Webflow. Créez des sites Web époustouflants et réactifs qui convertissent les visiteurs en clients.</p>
                    
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
                    
                    <a href="" class="cta-button">s'incrivez-vous maintenant</a>
                </div>
            </div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">TUTOACADEMY</div>
                    <p class="footer-desc">Permettre aux individus de maîtriser de nouvelles compétences et d’atteindre leurs objectifs de carrière grâce à une éducation en ligne de qualité.</p>
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
                        <li><a href="/">Home</a></li>
                        <li><a href="About">About</a></li>
                        <li><a href="courses">Courses</a></li>
                        <li><a href="contact">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-heading">Categories</h3>
                    <ul class="footer-links">
                        <li><a href="#">Design</a></li>
                        <li><a href="#">Development</a></li>
                        <li><a href="#">Marketing</a></li>
                        <li><a href="#">Business</a></li>
                    </ul>
                </div>
                <div class="footer-column">
                    <h3 class="footer-heading">Subscribe</h3>
                    <p class="footer-desc">Recevez les dernières mises à jour et offres.</p>
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