<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - SKILL Learning Platform</title>
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
        
        /* Page Banner */
        .page-banner {
            background-color: #FF6B35;
            color: white;
            padding: 80px 0;
            text-align: center;
            margin-bottom: 60px;
            border-radius: 20px;
        }
        
        .page-title {
            font-size: 42px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .page-subtitle {
            font-size: 18px;
            max-width: 600px;
            margin: 0 auto;
        }
        
        /* Contact Form Section */
        .contact-section {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 50px;
            margin-bottom: 80px;
        }
        
        .contact-info {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .section-heading {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 25px;
        }
        
        .contact-cards {
            display: grid;
            gap: 20px;
            margin-top: 30px;
        }
        
        .contact-card {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 15px;
            transition: all 0.3s ease;
        }
        
        .contact-card:hover {
            background-color: #e9f8f5;
        }
        
        .card-icon {
            width: 50px;
            height: 50px;
            background-color: #FF6B35;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }
        
        .card-content h4 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        
        .card-content p {
            color: #666;
        }
        
        .contact-form {
            background-color: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
        }
        
        .form-control {
            width: 100%;
            padding: 15px;
            border: 1px solid #e1e1e1;
            border-radius: 10px;
            font-size: 16px;
            outline: none;
            transition: border-color 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #FF6B35;
        }
        
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
        }
        
        .submit-btn {
            background-color: #FF6B35;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        
        .submit-btn:hover {
            background-color: #e65c28;
        }
        
        /* Map Section */
        .map-section {
            margin-bottom: 80px;
        }
        
        .map-container {
            height: 400px;
            background-color: #f4f4f4;
            border-radius: 20px;
            overflow: hidden;
        }
        
        /* FAQ Section */
        .faq-section {
            margin-bottom: 80px;
        }
        
        .faq-heading {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .accordion {
            max-width: 800px;
            margin: 0 auto;
        }
        
        .accordion-item {
            background-color: white;
            border-radius: 10px;
            margin-bottom: 15px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .accordion-header {
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
            font-weight: 600;
        }
        
        .accordion-content {
            padding: 0 20px;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease, padding 0.3s ease;
        }
        
        .accordion-content.active {
            padding: 0 20px 20px;
            max-height: 1000px;
        }
        
        /* CTA Section */
        .cta-section {
            background-color: #48B899;
            color: white;
            padding: 60px 40px;
            border-radius: 20px;
            text-align: center;
            margin-bottom: 80px;
        }
        
        .cta-title {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 20px;
        }
        
        .cta-text {
            margin-bottom: 30px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        
        .cta-buttons {
            display: flex;
            gap: 20px;
            justify-content: center;
        }
        
        .primary-btn {
            background-color: white;
            color: #48B899;
            padding: 15px 30px;
            border-radius: 50px;
            font-weight: 600;
        }
        
        .secondary-btn {
            background-color: transparent;
            color: white;
            padding: 15px 30px;
            border-radius: 50px;
            border: 2px solid white;
            font-weight: 600;
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
            .contact-section {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .cta-buttons {
                flex-direction: column;
                max-width: 300px;
                margin: 0 auto;
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
        
        <section class="page-banner">
            <h1 class="page-title">Contactez-nous</h1>
            <p class="page-subtitle">Nous sommes là pour vous aider ! Contactez notre équipe pour toute question, commentaire ou demande.</p>
        </section>
        
        <section class="contact-section">
            <div class="contact-info">
                <h2 class="section-heading">Contactez-nous</h2>
                <p>Vous avez des questions sur nos cours, nos tarifs ou autre chose ? Notre équipe est là pour répondre à toutes vos questions.</p>
                
                <div class="contact-cards">
                    <div class="contact-card">
                        <div class="card-icon">📍</div>
                        <div class="card-content">
                            <h4>Our Location</h4>
                            <p>123 Education Street, Learning City, 10001</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="card-icon">📞</div>
                        <div class="card-content">
                            <h4>Phone Number</h4>
                            <p> 689 99 28 40</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="card-icon">✉️</div>
                        <div class="card-content">
                            <h4>Email Address</h4>
                            <p>brinda@gmail.com</p>
                        </div>
                    </div>
                    
                    <div class="contact-card">
                        <div class="card-icon">⏰</div>
                        <div class="card-content">
                            <h4>Working Hours</h4>
                            <p>Monday-Friday: 9AM - 6PM</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="contact-form">
                <h2 class="section-heading">Envoyez-nous un message</h2>
                {{-- <form id="contactForm">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Your name">
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Your email">
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" placeholder="Subject">
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" placeholder="Write your message here..."></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Send Message</button>
                </form> --}}
                <form id="contactForm" action="{{ route('contact.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Your name" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Your email" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="subject">Subject</label>
                        <input type="text" class="form-control" id="subject" name="subject" placeholder="Subject" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" name="message" placeholder="Write your message here..." required></textarea>
                    </div>
                    
                    <button type="submit" class="submit-btn">Send Message</button>
                </form>
            </div>
        </section>
        
        <section class="map-section">
            <div class="map-container">
                <!-- Placeholder for map -->
                <img src="/api/placeholder/1200/400" alt="Location Map" style="width: 100%; height: 100%; object-fit: cover;">
            </div>
        </section>
        
        <section class="faq-section">
            <div class="faq-heading">
                <h2 class="section-heading">Questions fréquemment posées</h2>
                <p>Trouvez rapidement des réponses aux questions fréquentes</p>
            </div>
            
            <div class="accordion">
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Comment m'inscrire à une formation ?</span>
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>S'inscrire à un cours est simple ! Parcourez notre catalogue de cours, sélectionnez celui qui vous intéresse et cliquez sur le bouton « S'inscrire ». Vous serez guidé tout au long du processus de paiement et, une fois terminé, vous aurez immédiatement accès aux supports de cours.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Quels modes de paiement acceptez-vous ?</span>
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>Nous acceptons les principales cartes de crédit (Visa, MasterCard, American Express), PayPal et les virements bancaires pour le paiement des cours. Pour toute demande de paiement spécifique, veuillez contacter notre équipe d'assistance.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Offrez-vous des certificats à la fin de la formation ?</span>
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>Oui ! Après avoir réussi une formation, vous recevrez un certificat numérique que vous pourrez ajouter à votre CV ou à votre profil professionnel. Nos certificats sont reconnus par de nombreux employeurs du secteur.</p>
                    </div>
                </div>
                
                <div class="accordion-item">
                    <div class="accordion-header">
                        <span>Puis-je obtenir un remboursement si je ne suis pas satisfait ?</span>
                        <span class="toggle">+</span>
                    </div>
                    <div class="accordion-content">
                        <p>Nous offrons une garantie satisfait ou remboursé de 30 jours pour tous nos cours. Si vous n'êtes pas entièrement satisfait de votre achat, vous pouvez demander un remboursement intégral dans les 30 jours suivant votre inscription, sans justification.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <section class="cta-section">
            <h2 class="cta-title">Prêt à commencer à apprendre ?</h2>
            <p class="cta-text">Rejoignez des milliers d'étudiants qui progressent déjà dans leur carrière grâce à SKILL. Inscrivez-vous dès aujourd'hui et accédez à notre vaste bibliothèque de cours.</p>
            <div class="cta-buttons">
                <a href="register" class="primary-btn">Commencer</a>
                <a href="courses" class="secondary-btn">Découvrir les cours</a>
            </div>
        </section>
    </div>
    
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <div class="footer-logo">TUTOACADEMY</div>
                    <p class="footer-desc">Donner aux individus les moyens de maîtriser de nouvelles compétences et d’atteindre leurs objectifs de carrière grâce à une éducation en ligne de qualité.</p>
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
                    <p class="footer-desc">Obtenez les dernières mises à jour et offres.<</p>
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
        // Script for accordion functionality
        document.addEventListener('DOMContentLoaded', function() {
            const accordionHeaders = document.querySelectorAll('.accordion-header');
            
            accordionHeaders.forEach(header => {
                header.addEventListener('click', function() {
                    const content = this.nextElementSibling;
                    const toggle = this.querySelector('.toggle');
                    
                    // Close all other accordion items
                    document.querySelectorAll('.accordion-content').forEach(item => {
                        if (item !== content) {
                            item.classList.remove('active');
                            item.previousElementSibling.querySelector('.toggle').textContent = '+';
                        }
                    });
                    
                    // Toggle current accordion item
                    content.classList.toggle('active');
                    toggle.textContent = content.classList.contains('active') ? '-' : '+';
                });
            });
            
            // Form validation
            const contactForm = document.getElementById('contactForm');
            if (contactForm) {
                contactForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    
                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const subject = document.getElementById('subject').value;
                    const message = document.getElementById('message').value;
                    
                    if (!name || !email || !subject || !message) {
                        alert('Please fill out all fields.');
                        return;
                    }
                    
                    // Email validation
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(email)) {
                        alert('Please enter a valid email address.');
                        return;
                    }
                    
                    // Here you would typically send the form data to your server
                    alert('Thank you for your message! We will get back to you soon.');
                    contactForm.reset();
                });
            }
        });
    </script>
</body>
</html>