<x-app-layout>
    <style>
        .rtl {
            direction: rtl;
        }

        .job-detail-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 2rem 2rem;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .job-detail-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="20" cy="20" r="2" fill="white" opacity="0.1"/><circle cx="80" cy="80" r="3" fill="white" opacity="0.05"/><circle cx="40" cy="60" r="1" fill="white" opacity="0.1"/></svg>');
        }

        .job-detail-hero-content {
            position: relative;
            z-index: 2;
            max-width: 800px;
            margin: 0 auto;
        }

        .job-detail-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .job-meta-badges {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .job-location-badge {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-type-badge {
            background: linear-gradient(45deg, #f39c12, #e67e22);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-deadline-badge {
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-size: 1rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0%, 100% { box-shadow: 0 0 20px rgba(231, 76, 60, 0.3); }
            50% { box-shadow: 0 0 30px rgba(231, 76, 60, 0.5); }
        }

        .job-detail-container {
            max-width: 900px;
            margin: 0 auto;
            padding: 0 2rem;
            position: relative;
            z-index: 3;
            margin-top: -2rem;
        }

        .job-detail-content {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            position: relative;
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .job-detail-content::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #e74c3c, #f39c12);
        }

        .job-detail-content:hover {
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
            border-color: rgba(231, 76, 60, 0.2);
        }

        .job-icon-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .job-main-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            box-shadow: 0 10px 30px rgba(231, 76, 60, 0.3);
        }

        .job-title-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .job-description-section {
            margin-top: 2rem;
        }

        .job-description-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-description-title::before {
            content: '';
            width: 4px;
            height: 24px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            border-radius: 2px;
        }

        .job-description-content {
            color: #7f8c8d;
            line-height: 1.8;
            font-size: 1.1rem;
            white-space: pre-line;
        }

        .job-actions {
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid #ecf0f1;
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-apply {
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

        .btn-apply:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(231, 76, 60, 0.4);
            text-decoration: none;
            color: white;
        }

        .btn-back {
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

        .btn-back:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(243, 156, 18, 0.4);
            text-decoration: none;
            color: white;
        }

        .job-detail-section {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 2rem 0 4rem;
            min-height: 100vh;
        }

        .job-highlights {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            padding: 1.5rem;
            border-radius: 15px;
            margin-bottom: 2rem;
            border-left: 4px solid #e74c3c;
        }

        .job-highlights h3 {
            color: #2c3e50;
            font-weight: 700;
            margin-bottom: 1rem;
            font-size: 1.2rem;
        }

        .job-highlights ul {
            list-style: none;
            padding: 0;
        }

        .job-highlights li {
            color: #7f8c8d;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .job-highlights li::before {
            content: '✓';
            color: #27ae60;
            font-weight: bold;
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .job-detail-hero h1 {
                font-size: 2rem;
            }
            
            .job-detail-content {
                padding: 2rem;
            }
            
            .job-meta-badges {
                flex-direction: column;
                align-items: center;
            }
            
            .job-icon-header {
                flex-direction: column;
                text-align: center;
            }
            
            .job-actions {
                flex-direction: column;
                align-items: center;
            }
        }

        @media (max-width: 480px) {
            .job-detail-hero {
                padding: 2rem 1rem 1rem;
            }
            
            .job-detail-container {
                padding: 0 1rem;
            }
            
            .job-detail-content {
                padding: 1.5rem;
            }
            
            .job-title-section h1 {
                font-size: 2rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="job-detail-hero rtl">
        <div class="job-detail-hero-content">
            <div class="job-meta-badges">
                <span class="job-location-badge">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ $job->location ?? 'عن بُعد' }}
                </span>
                <span class="job-type-badge">
                    <i class="fas fa-briefcase"></i>
                    {{ $job->type }}
                </span>
                @if($job->deadline)
                    <span class="job-deadline-badge">
                        <i class="fas fa-clock"></i>
                        الموعد النهائي: {{ $job->deadline->format('d-m-Y') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="job-detail-section rtl">
        <div class="job-detail-container">
            <div class="job-detail-content">
                <div class="job-icon-header">
                    <div class="job-main-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="job-title-section">
                        <h1>{{ $job->title }}</h1>
                    </div>
                </div>

                <div class="job-highlights">
                    <h3>نبذة سريعة</h3>
                    <ul>
                        <li>الموقع: {{ $job->location ?? 'عن بُعد' }}</li>
                        <li>نوع العمل: {{ $job->type }}</li>
                        @if($job->deadline)
                            <li>الموعد النهائي للتقديم: {{ $job->deadline->format('d-m-Y') }}</li>
                        @endif
                    </ul>
                </div>

                <div class="job-description-section">
                    <h2 class="job-description-title">
                        <i class="fas fa-file-alt"></i>
                        تفاصيل الوظيفة
                    </h2>
                    <div class="job-description-content">{{ $job->description }}</div>
                </div>

                <div class="job-actions">
                  <a href="{{ route('careers.apply', $job) }}"
   style="background: linear-gradient(45deg, #e74c3c, #c0392b);
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
          box-shadow: 0 10px 30px rgba(231, 76, 60, 0.3);">
    تقدّم الآن
    <i class="fas fa-paper-plane"></i>
</a>

                    <a href="{{ route('careers.index') }}" class="btn-back">
                        <i class="fas fa-arrow-right"></i>
                        العودة للوظائف
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>