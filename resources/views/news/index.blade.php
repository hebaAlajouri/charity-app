<x-app-layout>
    <style>
        :root {
            --primary-navy: #2C3E50;           /* Soft Deep Blue */
            --primary-gold: #C9B458;           /* Soft Muted Gold */
            --accent-navy: #7EB6C1;            /* Baby Blue - Calm */
            --accent-gold: #E3D58A;            /* Soft Warm Gold */
            --light-gold: #F5F9FA;             /* Very Light Blue-Gray */
            --dark-navy: #1F2F3A;              /* Dark Navy */
            --muted-blue: #A6C1D9;             /* Light Dusty Baby Blue */
            --soft-beige: #D4E6E8;             /* Pale Baby Blue Tint */
            --gold-gradient: linear-gradient(45deg, #C9B458, #E3D58A);
        }

        .rtl {
            direction: rtl;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: var(--primary-navy);
            background: var(--light-gold);
        }

        /* ===== Hero ===== */
        .news-hero {
            background: linear-gradient(135deg, var(--accent-navy), var(--primary-navy));
            padding: 4rem 2rem 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .news-hero::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="3" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
        }

        .news-hero-content {
            position: relative;
            z-index: 2;
            max-width: 700px;
            margin: 0 auto;
        }

        .news-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .news-hero p {
            font-size: 1.3rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            line-height: 1.5;
        }

        /* ===== Section ===== */
        .news-section {
            background: var(--soft-beige);
            padding: 2rem 0 4rem;
        }

        .news-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 3;
            margin-top: -2rem;
        }

        /* ===== Stats ===== */
        .news-stats {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            margin-bottom: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
            color: var(--primary-navy);
        }

        .stat-item {
            padding: 1rem;
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-gold);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            font-weight: 600;
        }

        /* ===== Grid ===== */
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        /* ===== Cards ===== */
        .news-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease, border-color 0.3s ease;
            position: relative;
            border: 2px solid transparent;
            display: flex;
            flex-direction: column;
            height: 100%;
            color: var(--primary-navy);
        }

        .news-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.15);
            border-color: rgba(201, 180, 88, 0.3);
        }

        .news-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0;
            height: 4px;
            background: var(--gold-gradient);
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        /* ===== Badge for Featured News ===== */
        .featured-badge {
            position: absolute;
            top: 15px;
            left: 15px;
            background: linear-gradient(135deg, var(--primary-gold), #a38a44);
            padding: 0.4rem 1rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 700;
            color: var(--primary-navy);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            box-shadow: 0 4px 15px rgba(201, 180, 88, 0.6);
            text-shadow: 1px 1px 3px rgba(255 255 255 / 0.9);
            z-index: 10;
            pointer-events: none;
        }

        .featured-badge i {
            font-size: 1.2rem;
        }

        /* ===== Images ===== */
        .news-image {
            position: relative;
            overflow: hidden;
            height: 200px;
            flex-shrink: 0;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .news-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .news-card:hover .news-image img {
            transform: scale(1.05);
        }

        .news-image-overlay {
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(45deg, rgba(201, 180, 88, 0.8), rgba(227, 213, 138, 0.8));
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary-navy);
            font-size: 2rem;
        }

        .news-card:hover .news-image-overlay {
            opacity: 1;
        }

        .news-placeholder {
            height: 200px;
            background: linear-gradient(135deg, var(--accent-navy), var(--primary-navy));
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2.5rem;
            position: relative;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
        }

        .news-placeholder::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="3" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
        }

        /* ===== Content ===== */
        .news-content {
            padding: 1.8rem 2rem 2rem;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .news-title {
            font-size: 1.4rem;
            font-weight: 700;
            margin-bottom: 1rem;
            line-height: 1.4;
            color: var(--primary-navy);
        }

        .news-excerpt {
            color: var(--muted-blue);
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        /* ===== Meta ===== */
        .news-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
            padding-top: 1rem;
            border-top: 1px solid var(--soft-beige);
            font-size: 0.9rem;
        }

        .news-date {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 15px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .news-category {
            background: var(--primary-gold);
            color: var(--primary-navy);
            padding: 0.3rem 1rem;
            border-radius: 15px;
            font-weight: 600;
            white-space: nowrap;
            box-shadow: 0 3px 8px rgba(201, 180, 88, 0.4);
        }

        /* ===== Read More Button ===== */
        .news-read-more {
            background: var(--primary-gold);
            color: var(--primary-navy);
            padding: 0.8rem 2rem;
            border: none;
            border-radius: 25px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
            box-shadow: 0 10px 30px rgba(201, 180, 88, 0.3);
            justify-content: center;
            width: 100%;
        }

        .news-read-more:hover {
            background: var(--accent-gold);
            color: var(--primary-navy);
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(227, 213, 138, 0.4);
            text-decoration: none;
        }

        /* ===== Pagination ===== */
        .pagination-wrapper {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        /* ===== No News Message ===== */
        .no-news-message {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            color: var(--primary-navy);
        }

        .no-news-icon {
            width: 100px;
            height: 100px;
            background: var(--primary-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: var(--primary-navy);
            font-size: 2.5rem;
        }

        /* ===== Responsive ===== */
        @media (max-width: 768px) {
            .news-hero h1 {
                font-size: 2.5rem;
            }
            
            .news-hero p {
                font-size: 1.1rem;
            }
            
            .news-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 480px) {
            .news-hero {
                padding: 2rem 1rem 1rem;
            }
            
            .news-container {
                padding: 0 1rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="news-hero rtl">
        <div class="news-hero-content">
            <h1>آخر الأخبار</h1>
            <p>تابع أحدث الأخبار والتطورات والإعلانات المهمة من فريقنا</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="news-section rtl">
        <div class="news-container">
            @if($news->count() > 0)
                <!-- News Statistics -->
                <div class="news-stats" aria-label="إحصائيات الأخبار">
                    <div class="stat-item">
                        <div class="stat-number">{{ $news->total() }}</div>
                        <div class="stat-label">إجمالي الأخبار</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $news->count() }}</div>
                        <div class="stat-label">الأخبار المعروضة</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">{{ $news->lastPage() }}</div>
                        <div class="stat-label">عدد الصفحات</div>
                    </div>
                </div>

                <div class="news-grid" role="list">
                    @foreach($news as $index => $article)
                        <div class="news-card" role="listitem" style="position: relative;">
                            @if($index === 0)
                                <div class="featured-badge" aria-label="خبر مميز">
                                    <i class="fas fa-star" aria-hidden="true"></i>
                                    خبر مميز
                                </div>
                            @endif
                            <div class="news-image">
                                @if($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}">
                                    <div class="news-image-overlay" aria-hidden="true">
                                        <i class="fas fa-eye"></i>
                                    </div>
                                @else
                                    <div class="news-placeholder">
                                        <i class="fas fa-newspaper"></i>
                                    </div>
                                @endif
                            </div>
                            <div class="news-content">
                                <h2 class="news-title">{{ $article->title }}</h2>
                                <p class="news-excerpt">{{ Str::limit($article->content, 100) }}</p>
                                <div class="news-meta">
                                    <span class="news-date">
                                        <i class="fas fa-calendar-alt" aria-hidden="true"></i>
                                        {{ $article->created_at ? $article->created_at->format('d-m-Y') : 'اليوم' }}
                                    </span>
                                    <span class="news-category">أخبار</span>
                                </div>
                                <a href="{{ route('news.show', $article) }}" class="news-read-more" aria-label="اقرأ المزيد عن {{ $article->title }}">
                                    اقرأ المزيد
                                    <i class="fas fa-arrow-left" aria-hidden="true"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination-wrapper" role="navigation" aria-label="تنقل الصفحات">
                    {{ $news->links() }}
                </div>
            @else
                <div class="no-news-message" role="alert">
                    <div class="no-news-icon" aria-hidden="true">
                        <i class="fas fa-newspaper"></i>
                    </div>
                    <h3>لا توجد أخبار متاحة حالياً</h3>
                    <p>نحن نعمل على إضافة أخبار جديدة قريباً. تابعنا للحصول على آخر التحديثات.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
