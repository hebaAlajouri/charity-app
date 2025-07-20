@tailwind base;
@tailwind components;
@tailwind utilities;
:root {
    --primary-color: {{ $theme['primary_color'] ?? '#e74c3c' }};
    --secondary-color: {{ $theme['secondary_color'] ?? '#f39c12' }};
    --background-color: {{ $theme['background_color'] ?? '#f8f9fa' }};
    --text-color: {{ $theme['text_color'] ?? '#333' }};
}

.rtl {
    direction: rtl;
}
.navbar {
    background: white;
    padding: 1rem 0;
    box-shadow: 0 2px 15px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
    z-index: 1000;
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0 2rem;
}

.logo {
    font-size: 2rem;
    font-weight: 700;
    color: #e74c3c;
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.logo i {
    color: #f39c12;
}

.nav-links {
    display: flex;
    list-style: none;
    gap: 2rem;
}

.nav-links a {
    text-decoration: none;
    color: #333;
    font-weight: 500;
    transition: all 0.3s ease;
    padding: 0.5rem 1rem;
    border-radius: 25px;
}

.nav-links a:hover,
.nav-links .active {
    color: #e74c3c;
    background: rgba(231, 76, 60, 0.1);
}

.nav-auth {
    display: flex;
    gap: 1rem;
}

.btn-login {
    background: transparent;
    color: #e74c3c;
    border: 2px solid #e74c3c;
    padding: 0.5rem 1.5rem;
    border-radius: 25px;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-login:hover {
    background: #e74c3c;
    color: white;
}
 
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

     body {
    font-family: 'Cairo', sans-serif;
    background: var(--background-color);
    line-height: 1.6;
    color: var(--text-color);
}
        
        
        /* Hero Section */
       .hero {
    position: relative;
    padding: 4rem 2rem;
    text-align: center;
    color: white;
    overflow: hidden;

    /* Background layers: image + gradient */
    background-image: 
        url(''), /* Replace with your actual image URL */
        linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}


        .hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="3" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .hero h1 {
            font-size: 3.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero p {
            font-size: 1.3rem;
            margin-bottom: 2rem;
            opacity: 0.95;
            line-height: 1.8;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(231, 76, 60, 0.4);
        }

        .btn-secondary {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            padding: 1rem 2.5rem;
            border: none;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(243, 156, 18, 0.3);
        }

        .btn-secondary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(243, 156, 18, 0.4);
        }

        /* Statistics Section */
        .statistics {
            background: white;
            padding: 4rem 2rem;
            margin-top: -2rem;
            position: relative;
            z-index: 3;
            border-radius: 20px 20px 0 0;
        }

        .stats-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-card {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #e74c3c, #f39c12);
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .stat-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 1rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2rem;
            color: white;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
        }

        .stat-icon.orange {
            background: linear-gradient(45deg, #f39c12, #e67e22);
        }

        .stat-icon.green {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
        }

        .stat-icon.blue {
            background: linear-gradient(45deg, #3498db, #2980b9);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-size: 1.1rem;
            color: #7f8c8d;
            font-weight: 500;
        }

        /* Featured Projects Section */
        .featured-projects {
            padding: 4rem 2rem;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .featured-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: #7f8c8d;
            max-width: 600px;
            margin: 0 auto;
        }

        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        .project-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .project-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        .project-image {
            height: 200px;
            background: linear-gradient(45deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .project-image i {
            font-size: 3rem;
            color: white;
            opacity: 0.8;
        }

        .project-content {
            padding: 1.5rem;
        }

        .project-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .project-description {
            color: #7f8c8d;
            margin-bottom: 1.5rem;
            line-height: 1.6;
        }

        .project-progress {
            margin-bottom: 1.5rem;
        }

        .progress-info {
            display: flex;
            justify-content: space-between;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: #ecf0f1;
            border-radius: 4px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border-radius: 4px;
            transition: width 0.3s ease;
        }

        .btn-contribute {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            width: 100%;
            justify-content: center;
        }

        .btn-contribute:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(243, 156, 18, 0.3);
        }

        /* About Section */
        .about-section {
            padding: 4rem 2rem;
            background: white;
        }

        .about-container {
            max-width: 1200px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-content h2 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            font-weight: 700;
        }

        .about-content p {
            color: #7f8c8d;
            line-height: 1.8;
            margin-bottom: 2rem;
            font-size: 1.1rem;
        }

        .about-image {
            height: 400px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .about-image i {
            font-size: 4rem;
            color: white;
            opacity: 0.8;
        }

        /* How It Works Section */
        .how-it-works {
            padding: 4rem 2rem;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
        }

        .how-it-works-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .steps-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .step-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            position: relative;
            transition: all 0.3s ease;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
        }

        .step-number {
            position: absolute;
            top: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 40px;
            height: 40px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .step-icon {
            width: 80px;
            height: 80px;
            margin: 1rem auto;
            border-radius: 50%;
            background: linear-gradient(45deg, #f39c12, #e67e22);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
        }

        .step-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 1rem;
        }

        .step-description {
            color: #7f8c8d;
            line-height: 1.6;
        }

        /* CTA Bottom Section */
        .cta-bottom {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            padding: 4rem 2rem;
            text-align: center;
            color: white;
        }

        .cta-bottom h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .cta-bottom p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }
         ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #4f46e5;
            border-radius: 4px;
        }
        

        /* Footer */
        .footer {
            background: #2c3e50;
            color: white;
            padding: 3rem 2rem 1rem;
            text-align: center;
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .footer-section h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #f39c12;
        }

        .footer-section p,
        .footer-section a {
            color: #bdc3c7;
            text-decoration: none;
            line-height: 1.6;
        }

        .footer-section a:hover {
            color: #f39c12;
        }

        .footer-bottom {
            border-top: 1px solid #34495e;
            padding-top: 1rem;
            margin-top: 2rem;
            color: #95a5a6;
        }
        .project-progress {
    margin-top: 1rem;
}

.progress-bar {
    background-color: #e5e7eb; /* Tailwind gray-300 */
    border-radius: 9999px;
    height: 0.5rem;
    overflow: hidden;
}

.progress-fill {
    background-color: #4f46e5; /* Tailwind indigo-600 */
    height: 100%;
    border-radius: 9999px;
    transition: width 0.5s ease;
}

.logo {
    color: var(--primary-color);
}

.logo i {
    color: var(--secondary-color);
}

.nav-links a {
    color: var(--text-color);
}

.nav-links a:hover,
.nav-links .active {
    color: var(--primary-color);
    background: rgba(231, 76, 60, 0.1); /* optional: change to use alpha variable if desired */
}
.hero {
    background-image:
        url(''),
        linear-gradient(135deg, var(--primary-color), var(--secondary-color));
}
.btn-primary {
    background: linear-gradient(45deg, var(--primary-color), #c0392b);
    /* Consider adjusting #c0392b if dark variant is needed */
}

.btn-secondary {
    background: linear-gradient(45deg, var(--secondary-color), #e67e22);
}
.stat-number {
    color: #2c3e50;
}

.stat-label {
    color: #7f8c8d;
}

.stat-icon {
    background: linear-gradient(45deg, var(--primary-color), #c0392b);
}

.stat-icon.orange {
    background: linear-gradient(45deg, var(--secondary-color), #e67e22);
}
.project-title {
    color: #2c3e50;
}

.project-description {
    color: #7f8c8d;
}

.progress-fill {
    background: linear-gradient(45deg, var(--primary-color), #c0392b);
}

.btn-contribute {
    background: linear-gradient(45deg, var(--secondary-color), #e67e22);
}
.about-content h2 {
    color: #2c3e50;
}

.about-content p {
    color: #7f8c8d;
}
.step-number {
    background: linear-gradient(45deg, var(--primary-color), #c0392b);
}

.step-icon {
    background: linear-gradient(45deg, var(--secondary-color), #e67e22);
}

.step-title {
    color: #2c3e50;
}

.step-description {
    color: #7f8c8d;
}
.cta-bottom {
    background: linear-gradient(135deg, #2c3e50, #34495e);
    color: white;
}
.footer {
    background: #2c3e50;
    color: white;
}

.footer-section h3 {
    color: var(--secondary-color);
}

.footer-section p,
.footer-section a {
    color: #bdc3c7;
}

.footer-section a:hover {
    color: var(--secondary-color);
}


        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero h1 {
                font-size: 2.5rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .about-container {
                grid-template-columns: 1fr;
                gap: 2rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .projects-grid {
                grid-template-columns: 1fr;
            }
            
            .steps-grid {
                grid-template-columns: 1fr;
            }

        }

