<x-app-layout>
    <style>
        :root {
            --primary-navy: #2C3E50;          /* Soft Deep Blue */
            --primary-gold: #C9B458;          /* Soft Muted Gold */
            --accent-navy: #7EB6C1;           /* Baby Blue - Calm */
            --accent-gold: #E3D58A;           /* Soft Warm Gold */
            --light-gold: #F5F9FA;            /* Very Light Blue-Gray */
            --dark-navy: #1F2F3A;             /* Dark Navy */
            --muted-blue: #A6C1D9;            /* Light Dusty Baby Blue */
            --soft-beige: #D4E6E8;            /* Pale Baby Blue Tint */
            --gold-gradient: linear-gradient(135deg, #C9B458, #E3D58A);
            --deep-shadow: rgba(31, 47, 58, 0.25);
            --glow-gold: rgba(201, 180, 88, 0.4);
            --glow-navy: rgba(44, 62, 80, 0.25);
        }

        .rtl {
            direction: rtl;
        }

        .careers-hero {
            background: linear-gradient(135deg, var(--primary-navy), var(--accent-navy));
            padding: 5rem 2rem 3rem;
            text-align: center;
            color: var(--light-gold);
            position: relative;
            overflow: hidden;
            box-shadow: inset 0 0 80px var(--dark-navy);
        }

        .careers-hero::before {
            content: '';
            position: absolute;
            top: 10%;
            left: 10%;
            right: 10%;
            bottom: 10%;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="3" fill="%23E3D58A" opacity="0.15"/><circle cx="80" cy="80" r="5" fill="%23E3D58A" opacity="0.1"/><circle cx="40" cy="60" r="2" fill="%23E3D58A" opacity="0.15"/></svg>');
            filter: blur(15px);
            z-index: 1;
            pointer-events: none;
        }

        .careers-hero-content {
            position: relative;
            z-index: 2;
        }

        .careers-hero h1 {
            font-size: 3.8rem;
            font-weight: 900;
            margin-bottom: 1rem;
            text-shadow: 0 0 10px var(--glow-gold);
            letter-spacing: 1.5px;
        }

        .careers-hero p {
            font-size: 1.4rem;
            font-weight: 600;
            opacity: 0.95;
            margin-bottom: 2.5rem;
            max-width: 650px;
            margin-left: auto;
            margin-right: auto;
            color: var(--accent-gold);
            text-shadow: 0 0 6px var(--glow-gold);
        }

        .careers-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 3;
            margin-top: -3rem;
        }

        .job-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 45px var(--deep-shadow);
            transition: all 0.35s ease;
            position: relative;
            border: 3px solid transparent;
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 6px;
            background: var(--gold-gradient);
            border-radius: 20px 20px 0 0;
            box-shadow: 0 0 15px var(--glow-gold);
        }

        .job-card:hover {
            transform: translateY(-15px);
            box-shadow: 0 35px 60px var(--glow-navy);
            border-color: var(--primary-gold);
            cursor: pointer;
        }

        .job-header {
            background: linear-gradient(135deg, var(--soft-beige), var(--light-gold));
            padding: 2rem 1.8rem;
            position: relative;
            border-bottom: 1px solid var(--muted-blue);
        }

        .job-icon {
            width: 65px;
            height: 65px;
            background: var(--primary-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1.3rem;
            color: var(--primary-navy);
            font-size: 1.7rem;
            box-shadow: 0 0 8px var(--glow-gold);
            transition: background 0.3s ease;
        }

        .job-card:hover .job-icon {
            background: var(--accent-gold);
            color: var(--dark-navy);
            box-shadow: 0 0 12px var(--accent-gold);
        }

        .job-title {
            font-size: 1.7rem;
            font-weight: 900;
            color: var(--primary-navy);
            margin-bottom: 0.7rem;
            letter-spacing: 0.5px;
            transition: color 0.3s ease;
        }

        .job-card:hover .job-title {
            color: var(--primary-gold);
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.3rem;
        }

        .job-location {
            background: var(--primary-gold);
            color: var(--primary-navy);
            padding: 0.45rem 1.2rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 700;
            box-shadow: 0 0 8px var(--glow-gold);
            transition: background 0.3s ease;
        }

        .job-type {
            background: var(--accent-gold);
            color: var(--dark-navy);
            padding: 0.45rem 1.2rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 700;
            box-shadow: 0 0 6px var(--accent-gold);
            transition: background 0.3s ease;
        }

        .job-card:hover .job-location {
            background: var(--accent-gold);
            color: var(--dark-navy);
            box-shadow: 0 0 12px var(--accent-gold);
        }

        .job-card:hover .job-type {
            background: var(--primary-gold);
            color: var(--primary-navy);
            box-shadow: 0 0 15px var(--glow-gold);
        }

        .job-content {
            padding: 2rem 1.8rem 2.5rem;
        }

        .job-description {
            color: var(--dark-navy);
            line-height: 1.7;
            margin-bottom: 1.7rem;
            font-size: 1.05rem;
            font-weight: 500;
        }

        .job-cta {
            background: var(--primary-gold);
            color: var(--primary-navy);
            padding: 0.9rem 2.5rem;
            border: none;
            border-radius: 30px;
            font-weight: 800;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.7rem;
            transition: all 0.4s ease;
            box-shadow: 0 12px 35px var(--glow-gold);
            letter-spacing: 0.8px;
        }

        .job-cta:hover {
            transform: translateY(-4px);
            box-shadow: 0 18px 50px var(--glow-gold);
            text-decoration: none;
            color: var(--dark-navy);
        }

        .pagination-wrapper {
            background: white;
            padding: 2.5rem 2rem;
            border-radius: 25px;
            margin-top: 3rem;
            box-shadow: 0 15px 40px var(--deep-shadow);
        }

        .careers-section {
            background: linear-gradient(135deg, var(--soft-beige), var(--light-gold));
            padding: 3rem 0 5rem;
        }

        .no-jobs-message {
            text-align: center;
            padding: 5rem 3rem;
            background: white;
            border-radius: 25px;
            margin-top: 3rem;
            box-shadow: 0 15px 40px var(--deep-shadow);
        }

        .no-jobs-icon {
            width: 110px;
            height: 110px;
            background: var(--primary-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2.5rem;
            color: var(--primary-navy);
            font-size: 3rem;
            box-shadow: 0 0 15px var(--glow-gold);
        }

        /* Grid responsive */
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2.5rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .careers-hero h1 {
                font-size: 3rem;
            }
            
            .careers-hero p {
                font-size: 1.2rem;
            }
            
            .jobs-grid {
                grid-template-columns: 1fr;
            }
            
            .job-meta {
                flex-direction: column;
                gap: 0.6rem;
            }
        }

        @media (max-width: 480px) {
            .careers-hero {
                padding: 3rem 1.5rem 2rem;
            }
            
            .careers-container {
                padding: 0 1.5rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="careers-hero rtl">
        <div class="careers-hero-content">
            <h1>انضم إلينا</h1>
            <p>اكتشف الفرص المتاحة وكن جزءاً من فريقنا المميز في رحلة تحقيق الأهداف والنجاح</p>
        </div>
    </div>

    <!-- Main Content -->
    <div class="careers-section rtl">
        <div class="careers-container">
            @if($jobs->count() > 0)
                <div class="jobs-grid">
                    @foreach($jobs as $job)
                        <div class="job-card">
                            <div class="job-header">
                                <div class="job-icon">
                                    <i class="fas fa-briefcase"></i>
                                </div>
                                <h2 class="job-title">{{ $job->title }}</h2>
                                <div class="job-meta">
                                    <span class="job-location">{{ $job->location ?? 'عن بُعد' }}</span>
                                    <span class="job-type">{{ $job->type }}</span>
                                </div>
                            </div>
                            <div class="job-content">
                                <p class="job-description">{{ Str::limit($job->description, 120) }}</p>
                                <a href="{{ route('careers.show', $job) }}" class="job-cta">
                                    اعرف المزيد
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="pagination-wrapper">
                    {{ $jobs->links() }}
                </div>
            @else
                <div class="no-jobs-message">
                    <div class="no-jobs-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 style="color: var(--primary-navy); font-size: 1.7rem; margin-bottom: 1.2rem;">لا توجد وظائف متاحة حالياً</h3>
                    <p style="color: var(--muted-blue); font-weight: 600; font-size: 1.1rem;">نحن نعمل باستمرار على توفير فرص عمل جديدة. تابعنا للحصول على آخر التحديثات.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
