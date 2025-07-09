<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Cairo', sans-serif;
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            line-height: 1.6;
            color: #333;
        }

        .news-hero {
            position: relative;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 2rem;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .news-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="3" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
        }

        .news-container {
            max-width: 1000px;
            margin: 0 auto;
            position: relative;
            z-index: 2;
        }

        .news-title {
            font-size: 3rem;
            font-weight: 700;
            color: white;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            line-height: 1.2;
        }

        .news-content-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            overflow: hidden;
            position: relative;
            margin-top: -2rem;
            z-index: 3;
        }

        .news-image-container {
            position: relative;
            overflow: hidden;
        }

        .news-image {
            width: 100%;
            max-height: 500px;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-image:hover {
            transform: scale(1.05);
        }

        .news-image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(231, 76, 60, 0.1), rgba(243, 156, 18, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .news-image-container:hover .news-image-overlay {
            opacity: 1;
        }

        .news-content {
            padding: 3rem;
            color: #2c3e50;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .news-content::first-letter {
            font-size: 4rem;
            font-weight: 700;
            float: left;
            margin: 0.1rem 0.5rem 0 0;
            color: #e74c3c;
            line-height: 1;
        }

        .news-meta {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2rem 3rem;
            border-top: 4px solid;
            border-image: linear-gradient(45deg, #e74c3c, #f39c12) 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #7f8c8d;
            font-weight: 500;
        }

        .meta-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.2rem;
        }

        .back-button {
            position: fixed;
            top: 2rem;
            left: 2rem;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 1rem;
            border-radius: 50%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.3);
            z-index: 1000;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(231, 76, 60, 0.4);
        }

        .reading-progress {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: rgba(231, 76, 60, 0.2);
            z-index: 1001;
        }

        .progress-bar {
            height: 100%;
            background: linear-gradient(45deg, #e74c3c, #f39c12);
            width: 0%;
            transition: width 0.1s ease;
        }

        .floating-actions {
            position: fixed;
            right: 2rem;
            top: 50%;
            transform: translateY(-50%);
            display: flex;
            flex-direction: column;
            gap: 1rem;
            z-index: 1000;
        }

        .floating-btn {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 1.2rem;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(243, 156, 18, 0.3);
        }

        .floating-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(243, 156, 18, 0.4);
        }

        .floating-btn.share {
            background: linear-gradient(45deg, #27ae60, #2ecc71);
            box-shadow: 0 8px 25px rgba(39, 174, 96, 0.3);
        }

        .floating-btn.share:hover {
            box-shadow: 0 12px 30px rgba(39, 174, 96, 0.4);
        }

        @media (max-width: 768px) {
            .news-title {
                font-size: 2rem;
            }
            
            .news-content {
                padding: 2rem;
                font-size: 1rem;
            }
            
            .news-hero {
                padding: 2rem 1rem;
            }
            
            .back-button {
                top: 1rem;
                left: 1rem;
                width: 50px;
                height: 50px;
                font-size: 1.2rem;
            }
            
            .floating-actions {
                right: 1rem;
                top: auto;
                bottom: 2rem;
                transform: none;
                flex-direction: row;
            }
            
            .floating-btn {
                width: 45px;
                height: 45px;
                font-size: 1.1rem;
            }
        }

        @media (max-width: 480px) {
            .news-title {
                font-size: 1.5rem;
            }
            
            .news-content {
                padding: 1.5rem;
            }
            
            .news-meta {
                padding: 1.5rem;
                flex-direction: column;
                gap: 1rem;
            }
        }
    </style>

    <!-- Reading Progress Bar -->
    <div class="reading-progress">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <!-- Back Button -->
    <a href="#" class="back-button" onclick="history.back()">
        <i class="fas fa-arrow-left"></i>
    </a>


    <!-- Hero Section -->
    <div class="news-hero">
        <div class="news-container">
            <h1 class="news-title">{{ $news->title }}</h1>
        </div>
    </div>

    <!-- Main Content -->
    <div class="news-container">
        <div class="news-content-wrapper">
            @if($news->image)
                <div class="news-image-container">
                    <img src="{{ asset('storage/' . $news->image) }}" class="news-image" alt="{{ $news->title }}">
                    <div class="news-image-overlay"></div>
                </div>
            @endif

            <div class="news-content">
                {!! nl2br(e($news->content)) !!}
            </div>

            <div class="news-meta">
                <div class="meta-item">
                    <div class="meta-icon">
                        <i class="fas fa-calendar"></i>
                    </div>
                    <span>{{ $news->created_at->format('F j, Y') }}</span>
                </div>
                <div class="meta-item">
                    <div class="meta-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <span>{{ $news->created_at->format('g:i A') }}</span>
                </div>
              
            </div>
        </div>
    </div>

    <!-- Font Awesome for Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        // Reading progress bar
        window.addEventListener('scroll', function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('progressBar').style.width = scrolled + '%';
        });

        // Share functionality
        function shareArticle() {
            if (navigator.share) {
                navigator.share({
                    title: document.title,
                    url: window.location.href
                });
            } else {
                // Fallback for browsers that don't support Web Share API
                const url = window.location.href;
                navigator.clipboard.writeText(url).then(() => {
                    alert('Article link copied to clipboard!');
                });
            }
        }

        // Smooth scroll behavior
        document.documentElement.style.scrollBehavior = 'smooth';
    </script>
</x-app-layout>