<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap');

        :root {
            --primary-navy: #2C3E50;
            --primary-gold: #C9B458;
            --accent-navy: #7EB6C1;
            --accent-gold: #E3D58A;
            --light-gold: #F5F9FA;
            --dark-navy: #1F2F3A;
            --muted-blue: #A6C1D9;
            --soft-beige: #D4E6E8;
            --gold-gradient: linear-gradient(45deg, #C9B458, #E3D58A);
        }

        body {
            font-family: 'Cairo', sans-serif;
            background: var(--light-gold);
            line-height: 1.6;
            color: var(--primary-navy);
            direction: {{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }};
            text-align: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};
        }

        .news-hero {
            position: relative;
            background: linear-gradient(135deg, var(--accent-navy) 0%, var(--primary-navy) 100%);
            padding: 4rem 2rem;
            margin-bottom: 2rem;
            overflow: hidden;
        }

        .news-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="3" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
            pointer-events: none;
        }

        .news-container {
            max-width: 1000px;
            margin: 0 auto;
        }

        .news-title {
            font-size: 3rem;
            font-weight: 700;
            color: white;
            text-align: center;
            margin-bottom: 2rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .news-content-wrapper {
            background: white;
            border-radius: 20px;
            box-shadow: 0 25px 50px rgba(44, 62, 80, 0.15);
            overflow: hidden;
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
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(45deg, rgba(201, 180, 88, 0.1), rgba(227, 213, 138, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .news-image-container:hover .news-image-overlay {
            opacity: 1;
        }

        .news-content {
            padding: 3rem;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .news-content::first-letter {
            font-size: 4rem;
            font-weight: 700;
            float: {{ app()->getLocale() === 'ar' ? 'right' : 'left' }};
            margin: 0.1rem 0.5rem 0 0;
            color: var(--primary-gold);
            line-height: 1;
        }

        .news-meta {
            background: var(--soft-beige);
            padding: 2rem 3rem;
            border-top: 4px solid;
            border-image: var(--gold-gradient) 1;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 2rem;
            font-weight: 500;
            color: var(--muted-blue);
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .meta-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: var(--gold-gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            color: var(--primary-navy);
        }

        .back-button {
            position: fixed;
            top: 2rem;
            {{ app()->getLocale() === 'ar' ? 'right' : 'left' }}: 2rem;
            background: var(--gold-gradient);
            padding: 1rem;
            border-radius: 50%;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            z-index: 1000;
            box-shadow: 0 10px 30px rgba(201, 180, 88, 0.3);
            transition: all 0.3s ease;
        }

        .back-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(201, 180, 88, 0.4);
        }

        .reading-progress {
            position: fixed;
            top: 0; left: 0;
            width: 100%;
            height: 4px;
            background: rgba(201, 180, 88, 0.2);
            z-index: 1001;
        }

        .progress-bar {
            height: 100%;
            background: var(--gold-gradient);
            width: 0%;
            transition: width 0.1s ease;
        }
    </style>

    <!-- Reading Progress Bar -->
    <div class="reading-progress">
        <div class="progress-bar" id="progressBar"></div>
    </div>

    <!-- Back Button -->
    <a href="#" class="back-button" onclick="history.back()" aria-label="{{ __('news.back') }}">
        <i class="fas fa-arrow-{{ app()->getLocale() === 'ar' ? 'right' : 'left' }}" aria-hidden="true"></i>
    </a>

    <!-- Hero Section -->
    <div class="news-hero">
        <div class="news-container">
            <h1 class="news-title">
                {{ app()->getLocale() === 'ar' ? $news->title : $news->title_en }}
            </h1>
        </div>
    </div>

    <!-- Main Content -->
    <main class="news-container">
        <article class="news-content-wrapper">
            @if($news->image)
                <div class="news-image-container">
                    <img src="{{ asset('storage/' . $news->image) }}" class="news-image" alt="{{ $news->title }}">
                    <div class="news-image-overlay" aria-hidden="true"></div>
                </div>
            @endif

            <section class="news-content">
                {!! nl2br(e(app()->getLocale() === 'ar' ? $news->content : $news->content_en)) !!}
            </section>

            <footer class="news-meta" aria-label="{{ __('news.details') }}">
                <div class="meta-item">
                    <div class="meta-icon">
                        <i class="fas fa-calendar" aria-hidden="true"></i>
                    </div>
                    <time datetime="{{ $news->created_at->toIso8601String() }}">
                        {{ $news->created_at->format('F j, Y') }}
                    </time>
                </div>
                <div class="meta-item">
                    <div class="meta-icon">
                        <i class="fas fa-clock" aria-hidden="true"></i>
                    </div>
                    <time datetime="{{ $news->created_at->toIso8601String() }}">
                        {{ $news->created_at->format('g:i A') }}
                    </time>
                </div>
            </footer>
        </article>
    </main>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <script>
        window.addEventListener('scroll', function () {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('progressBar').style.width = scrolled + '%';
        });
    </script>
</x-app-layout>
