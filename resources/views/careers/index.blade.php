<x-app-layout>
    <style>
        .rtl {
            direction: rtl;
        }

        .careers-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 2rem 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .careers-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="3" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
        }

        .careers-hero-content {
            position: relative;
            z-index: 2;
        }

        .careers-hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .careers-hero p {
            font-size: 1.3rem;
            opacity: 0.95;
            margin-bottom: 2rem;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .careers-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 3;
            margin-top: -2rem;
        }

        .job-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            position: relative;
            border: 2px solid transparent;
        }

        .job-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #e74c3c, #f39c12);
        }

        .job-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            border-color: rgba(231, 76, 60, 0.2);
        }

        .job-header {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            position: relative;
        }

        .job-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            color: white;
            font-size: 1.5rem;
        }

        .job-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .job-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1rem;
        }

        .job-location {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .job-type {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            padding: 0.3rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .job-content {
            padding: 1.5rem;
        }

        .job-description {
            color: #7f8c8d;
            line-height: 1.6;
            margin-bottom: 1.5rem;
            font-size: 1rem;
        }

        .job-cta {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
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
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.3);
        }

        .job-cta:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 35px rgba(231, 76, 60, 0.4);
            text-decoration: none;
            color: white;
        }

        .pagination-wrapper {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .careers-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2rem 0 4rem;
        }

        .no-jobs-message {
            text-align: center;
            padding: 4rem 2rem;
            background: white;
            border-radius: 20px;
            margin-top: 2rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }

        .no-jobs-icon {
            width: 100px;
            height: 100px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 2rem;
            color: white;
            font-size: 2.5rem;
        }

        /* Grid responsive */
        .jobs-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .careers-hero h1 {
                font-size: 2.5rem;
            }
            
            .careers-hero p {
                font-size: 1.1rem;
            }
            
            .jobs-grid {
                grid-template-columns: 1fr;
            }
            
            .job-meta {
                flex-direction: column;
                gap: 0.5rem;
            }
        }

        @media (max-width: 480px) {
            .careers-hero {
                padding: 2rem 1rem 1rem;
            }
            
            .careers-container {
                padding: 0 1rem;
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
                    <h3 style="color: #2c3e50; font-size: 1.5rem; margin-bottom: 1rem;">لا توجد وظائف متاحة حالياً</h3>
                    <p style="color: #7f8c8d;">نحن نعمل باستمرار على توفير فرص عمل جديدة. تابعنا للحصول على آخر التحديثات.</p>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>