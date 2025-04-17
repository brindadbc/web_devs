<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - SKILL Learning Platform</title>
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
        
        .nav-links a:hover {
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
        
        /* Page Header */
        .page-header {
            background-color: #e9f8f5;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 60px;
            position: relative;
            overflow: hidden;
        }
        
        .page-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
            position: relative;
            z-index: 2;
        }
        
        .page-subtitle {
            font-size: 18px;
            color: #666;
            max-width: 600px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }
        
        .header-shape {
            position: absolute;
            width: 200px;
            height: 200px;
            border-radius: 50%;
            z-index: 1;
        }
        
        .shape-1 {
            background-color: rgba(255, 107, 53, 0.1);
            top: -50px;
            right: 10%;
        }
        
        .shape-2 {
            background-color: rgba(72, 184, 153, 0.1);
            bottom: -80px;
            left: 5%;
            width: 300px;
            height: 300px;
        }
        
        /* About Section Styles */
        .about-section {
            padding: 60px 0;
        }
        
        .section-heading {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
            text-align: center;
        }
        
        .section-subheading {
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
            text-align: center;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .story-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            align-items: center;
            margin-bottom: 80px;
        }
        
        .story-image {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
        
        .story-content h3 {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 20px;
            color: #333;
        }
        
        .story-content p {
            margin-bottom: 20px;
            color: #666;
        }
        
        .highlight {
            color: #FF6B35;
        }
        
        /* Mission Vision Values Section */
        .mvv-section {
            padding: 60px 0;
            background-color: white;
            border-radius: 30px;
            margin: 60px 0;
        }
        
        .mvv-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        
        .mvv-card {
            padding: 40px 30px;
            border-radius: 20px;
            background-color: #f9f9f9;
            text-align: center;
            transition: all 0.3s ease;
        }
        
        .mvv-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
        }
        
        .mvv-icon {
            width: 70px;
            height: 70px;
            background-color: #e9f8f5;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 24px;
        }
        
        .mvv-title {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 15px;
        }
        
        .mvv-desc {
            color: #666;
        }
        
        /* Team Section */
        .team-section {
            padding: 60px 0;
        }
        
        .team-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 40px;
        }
        
        .team-card {
            background-color: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .team-card:hover {
            transform: translateY(-10px);
        }
        
        .team-image {
            height: 250px;
            background-color: #f4f4f4;
            position: relative;
            overflow: hidden;
        }
        
        .team-content {
            padding: 20px;
            text-align: center;
        }
        
        .team-name {
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
        }
        
        .team-role {
            color: #666;
            font-size: 14px;
            margin-bottom: 15px;
        }
        
        .team-social {
            display: flex;
            justify-content: center;
            gap: 15px;
        }
        
        .social-icon {
            width: 30px;
            height: 30px;
            background-color: #f4f4f4;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: all 0.3s ease;
        }
        
        .social-icon:hover {
            background-color: #FF6B35;
            color: white;
        }
        
        /* Stats Section */
        .stats-section {
            padding: 80px 0;
            background-color: #e9f8f5;
            border-radius: 30px;
            margin: 60px 0;
            text-align: center;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 30px;
            margin-top: 40px;
        }
        
        .stat-card {
            padding: 30px;
            background-color: white;
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.05);
        }
        
        .stat-number {
            font-size: 42px;
            font-weight: 700;
            color: #FF6B35;
            margin-bottom: 10px;
        }
        
        .stat-text {
            color: #666;
            font-weight: 500;
        }
        
        /* Partners Section */
        .partners-section {
            padding: 60px 0;
            text-align: center;
        }
        
        .partners-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 30px;
            align-items: center;
            margin-top: 40px;
        }
        
        .partner-card {
            background-color: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
        }
        
        /* Footer */
        footer {
            background-color: #333;
            color: white;
            padding: 70px 0 20px;
            margin-top: 60px;
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
            .story-grid,
            .mvv-grid {
                grid-template-columns: 1fr;
            }
            
            .team-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .partners-grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .team-grid,
            .partners-grid {
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
                <a href="courses">Courses</a>
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
    </div>
    
    <div class="page-header">
        <div class="container">
            <h1 class="page-title">À propos de nous</h1>
            <p class="page-subtitle">En savoir plus sur TUTOACADEMY et notre mission de transformer l'éducation en ligne</p>
        </div>
        <div class="header-shape shape-1"></div>
        <div class="header-shape shape-2"></div>
    </div>
    
    <div class="container">
        <section class="about-section">
            <div class="story-grid">
                <div class="story-image">
                    <img src="/api/placeholder/500/400" alt="Our Story">
                </div>
                <div class="story-content">
                    <h3>Notre <span class="highlight">histoire</span></h3>
                    <p>Fondée en 2025, TUTOACADEMY est née d’une vision simple mais puissante : démocratiser l’éducation de qualité et la rendre accessible à tous, quel que soit le lieu ou l’origine.</p>
                    <p>Ce qui a commencé comme une petite collection de cours en ligne est devenu une plateforme d'apprentissage mondiale avec plus de 170 cours et une communauté de plus de 56 000 étudiants de plus de 120 pays.</p>
                    <p>Nous croyons que l’éducation est transformatrice et notre mission est de doter les apprenants des compétences dont ils ont besoin pour s’épanouir dans le paysage professionnel en évolution rapide d’aujourd’hui.</p>
                </div>
            </div>
        </section>
        
        <section class="mvv-section">
            <h2 class="section-heading">Notre mission, notre vision et nos valeurs</h2>
            <p class="section-subheading">Les principes directeurs qui guident tout ce que nous faisons chez TUTOACADEMY</p>
            
            <div class="mvv-grid">
                <div class="mvv-card">
                    <div class="mvv-icon">🚀</div>
                    <h3 class="mvv-title">Notre mission</h3>
                    <p class="mvv-desc">Donner aux individus les compétences et les connaissances dont ils ont besoin pour atteindre leurs objectifs professionnels et avoir un impact positif dans le monde.</p>
                </div>
                <div class="mvv-card">
                    <div class="mvv-icon">👁️</div>
                    <h3 class="mvv-title">Notre Vision</h3>
                    <p class="mvv-desc">Créer un monde où une éducation de qualité est accessible à tous, permettant la croissance personnelle et la réussite professionnelle sans barrières.</p>
                </div>
                <div class="mvv-card">
                    <div class="mvv-icon">❤️</div>
                    <h3 class="mvv-title">Nos Valeurs</h3>
                    <p class="mvv-desc">excellence, l’accessibilité, l’innovation, l’inclusivité et l’approche centrée sur l’apprenant guident chaque décision que nous prenons.</p>
                </div>
            </div>
        </section>
        
        <section class="team-section">
            <h2 class="section-heading">Rencontrez notre équipe</h2>
            <p class="section-subheading">Les passionnés à l'origine du succès de TUTOACADEMY</p>
            
            <div class="team-grid">
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{asset('img/team.jpg')}}" alt="Djuikouo Brinda">
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Djuikouo Brinda</h3>
                        <p class="team-role">Founder & CEO</p>
                        <div class="team-social">
                            <a href="#" class="social-icon">f</a>
                            <a href="#" class="social-icon">in</a>
                            <a href="#" class="social-icon">t</a>
                        </div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{asset('img/rrr.jpg')}}" alt="Fomubad Borista">
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Fomubad Borista</h3>
                        <p class="team-role">Chief Learning Officer</p>
                        <div class="team-social">
                            <a href="#" class="social-icon">f</a>
                            <a href="#" class="social-icon">in</a>
                            <a href="#" class="social-icon">t</a>
                        </div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{asset('img/mm.jpg')}}" alt="Bekoy Elie">
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Bekoy Elie</h3>
                        <p class="team-role">Head of Content</p>
                        <div class="team-social">
                            <a href="#" class="social-icon">f</a>
                            <a href="#" class="social-icon">in</a>
                            <a href="#" class="social-icon">t</a>
                        </div>
                    </div>
                </div>
                <div class="team-card">
                    <div class="team-image">
                        <img src="{{asset('img/TTT.jpg')}}" alt="Maffo Aurelle">
                    </div>
                    <div class="team-content">
                        <h3 class="team-name">Maffo Aurelle</h3>
                        <p class="team-role">CTO</p>
                        <div class="team-social">
                            <a href="#" class="social-icon">f</a>
                            <a href="#" class="social-icon">in</a>
                            <a href="#" class="social-icon">t</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="stats-section">
            <h2 class="section-heading">Notre Impact</h2>
            <p class="section-subheading">Des chiffres qui témoignent de notre engagement pour une éducation de qualité</p>
            
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">56K+</div>
                    <div class="stat-text">Étudiants actifs</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">170+</div>
                    <div class="stat-text">Cours de qualité</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">25+</div>
                    <div class="stat-text">Formateurs experts</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">120+</div>
                    <div class="stat-text">Pays desservis</div>
                </div>
            </div>
        </section>
        
        <section class="partners-section">
            <h2 class="section-heading">Nos partenaires</h2>
            <p class="section-subheading">Des organisations de confiance collaborent avec nous pour offrir des expériences d'apprentissage exceptionnelles.</p>
            
            <div class="partners-grid">
                <div class="partner-card">
                    <img src="{{asset('img/carousel-1.jpg')}}" alt="Partner 1">
                </div>
                <div class="partner-card">
                    <img src="{{asset('img/carousel-2.jpg')}}" alt="Partner 2">
                </div>
                <div class="partner-card">
                    <img src="{{asset('img/tytys.jpg')}}" alt="Partner 3">
                </div>
                <div class="partner-card">
                    <img src="{{asset('img/totos.jpg')}}" alt="Partner 4">
                </div>
                <div class="partner-card">
                    <img src="/api/placeholder/120/60" alt="Partner 5">
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
                        <li><a href="{{ route('courses.index') }}">Courses</a></li>
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
                    <p class="footer-desc">Obtenez les dernières mises à jour et offres.</p>
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
        // Simple JavaScript for interactive elements
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling for navigation links
            const navLinks = document.querySelectorAll('.nav-links a');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    const targetId = this.getAttribute('href');
                    if (targetId !== '#' && targetId.startsWith('#')) {
                        e.preventDefault();
                        const targetElement = document.querySelector(targetId);
                        if (targetElement) {
                            window.scrollTo({
                                top: targetElement.offsetTop - 100,
                                behavior: 'smooth'
                            });
                        }
                    }
                });
            });
            
            // Team card hover effects
            const teamCards = document.querySelectorAll('.team-card');
            teamCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-10px)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });
        });
    </script>
</body>
</html>