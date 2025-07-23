<x-app-layout>
    <style>
        :root {
            --primary-navy: #2C3E50;
            --primary-gold: #C9B458;
            --accent-navy: #7EB6C1;
            --accent-gold: #E3D58A;
            --light-gold: #F5F9FA;
            --dark-navy: #1F2F3A;
            --muted-blue: #64748B;
            --soft-beige: #F8FAFC;
            --success-green: #10B981;
            --gradient-primary: linear-gradient(135deg, var(--primary-navy) 0%, var(--accent-navy) 100%);
            --gradient-gold: linear-gradient(45deg, var(--primary-gold), var(--accent-gold));
            --shadow-soft: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
            --shadow-elevated: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .rtl, 
        [dir="rtl"],
        html[lang="ar"],
        html[lang="ar"] * { 
            direction: rtl; 
            
        }
        
        html[lang="ar"] .job-hero-content,
        html[lang="ar"] .job-title-section {
            text-align: center;
        }
        
        html[lang="ar"] .hero-badge,
        html[lang="ar"] .btn {
            flex-direction: row-reverse;
        }
        
        html[lang="ar"] .section-title {
            flex-direction: row-reverse;
        }
        
        html[lang="ar"] .overview-item {
            flex-direction: row-reverse;
            text-align: right;
        }
        
        html[lang="ar"] .info-card {
            border-left: none;
            border-right: 4px solid var(--primary-gold);
        }
        
        html[lang="ar"] .section-title::before {
            order: 2;
        }
        
        body {
            background: linear-gradient(135deg, var(--soft-beige) 0%, var(--light-gold) 100%);
            min-height: 100vh;
        }

        /* Hero Section */
        .job-hero {
            background: var(--gradient-primary);
            position: relative;
            overflow: hidden;
            padding: 4rem 0 3rem;
        }

        .job-hero::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: 
                radial-gradient(circle at 20% 50%, rgba(255, 255, 255, 0.05) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.08) 0%, transparent 50%),
                radial-gradient(circle at 40% 80%, rgba(255, 255, 255, 0.03) 0%, transparent 50%);
        }

        .job-hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            color: var(--light-gold);
        }

        .job-hero h1 {
            font-size: clamp(2rem, 5vw, 3.5rem);
            font-weight: 800;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
            line-height: 1.2;
        }

        .job-hero-badges {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 1rem;
            margin-top: 2rem;
        }

        .hero-badge {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .hero-badge:hover {
            background: rgba(255, 255, 255, 0.25);
            transform: translateY(-2px);
        }

        .badge-urgent {
            background: var(--gradient-gold);
            color: var(--dark-navy);
            animation: glow 2s ease-in-out infinite alternate;
            box-shadow: 0 0 20px rgba(201, 180, 88, 0.4);
        }

        @keyframes glow {
            from { box-shadow: 0 0 20px rgba(201, 180, 88, 0.4); }
            to { box-shadow: 0 0 30px rgba(201, 180, 88, 0.8); }
        }

        /* Main Content Container */
        .job-container {
            max-width: 1000px;
            margin: -2rem auto 0;
            padding: 0 1rem;
            position: relative;
            z-index: 3;
        }

        .job-card {
            background: white;
            border-radius: 24px;
            overflow: hidden;
            box-shadow: var(--shadow-elevated);
            border: 1px solid rgba(201, 180, 88, 0.1);
            transition: all 0.3s ease;
        }

        .job-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 32px 64px -12px rgba(0, 0, 0, 0.15);
        }

        .job-card-header {
            background: var(--gradient-gold);
            padding: 0.5rem;
            position: relative;
        }

        .job-card-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--primary-navy);
            border-radius: 3px;
        }

        /* Content Sections */
        .job-content {
            padding: 3rem;
        }

        .job-title-section {
            text-align: center;
            margin-bottom: 3rem;
        }

        .job-icon {
            width: 80px;
            height: 80px;
            background: var(--gradient-gold);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--dark-navy);
            font-size: 2rem;
            box-shadow: var(--shadow-soft);
            transition: all 0.3s ease;
        }

        .job-icon:hover {
            transform: rotate(5deg) scale(1.05);
            box-shadow: var(--shadow-elevated);
        }

        .job-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary-navy);
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .job-subtitle {
            color: var(--muted-blue);
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Info Grid */
        .job-info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin: 3rem 0;
        }

        .info-card {
            background: var(--soft-beige);
            border-radius: 16px;
            padding: 1.5rem;
            border-left: 4px solid var(--primary-gold);
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-soft);
        }

        .info-label {
            font-weight: 600;
            color: var(--primary-navy);
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .info-value {
            color: var(--muted-blue);
            font-size: 1.1rem;
            font-weight: 500;
        }

        /* Description Section */
        .job-description {
            margin: 3rem 0;
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary-navy);
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .section-title::before {
            content: '';
            width: 4px;
            height: 28px;
            background: var(--gradient-gold);
            border-radius: 2px;
        }

        .description-content {
            color: var(--muted-blue);
            line-height: 1.8;
            font-size: 1.1rem;
            white-space: pre-line;
        }

        .description-content h3 {
            color: var(--primary-navy);
            font-weight: 600;
            margin: 1.5rem 0 0.75rem;
        }

        .description-content ul {
            margin: 1rem 0;
            padding-left: 1.5rem;
        }

        .description-content li {
            margin-bottom: 0.5rem;
            position: relative;
        }

        .description-content li::marker {
            color: var(--success-green);
        }

        /* Quick Overview */
        .job-overview {
            background: linear-gradient(135deg, var(--soft-beige), white);
            border-radius: 20px;
            padding: 2rem;
            margin: 3rem 0;
            border: 1px solid rgba(201, 180, 88, 0.2);
        }

        .overview-list {
            list-style: none;
            padding: 0;
        }

        .overview-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        .overview-item:last-child {
            border-bottom: none;
        }

        .overview-icon {
            width: 12px;
            height: 12px;
            background: var(--success-green);
            border-radius: 50%;
            flex-shrink: 0;
        }

        .overview-label {
            font-weight: 600;
            color: var(--primary-navy);
            min-width: 100px;
        }

        .overview-value {
            color: var(--muted-blue);
            font-weight: 500;
        }

        /* Action Buttons */
        .job-actions {
            display: flex;
            gap: 1rem;
            justify-content: center;
            margin-top: 3rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
        }

        .btn {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            font-size: 1.1rem;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.75rem;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            position: relative;
            overflow: hidden;
        }

        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }

        .btn:hover::before {
            left: 100%;
        }

        .btn-primary {
            background: var(--gradient-gold);
            color: var(--dark-navy);
            box-shadow: 0 8px 25px rgba(201, 180, 88, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(201, 180, 88, 0.4);
            color: var(--dark-navy);
        }

        .btn-secondary {
            background: white;
            color: var(--primary-navy);
            border: 2px solid var(--primary-gold);
            box-shadow: var(--shadow-soft);
        }

        .btn-secondary:hover {
            background: var(--primary-gold);
            color: var(--dark-navy);
            transform: translateY(-3px);
            box-shadow: var(--shadow-elevated);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .job-hero {
                padding: 3rem 0 2rem;
            }
            
            .job-content {
                padding: 2rem;
            }
            
            .job-title {
                font-size: 2rem;
            }
            
            .job-actions {
                flex-direction: column;
                align-items: center;
            }
            
            .btn {
                width: 100%;
                justify-content: center;
                max-width: 300px;
            }
        }

        @media (max-width: 480px) {
            .job-container {
                padding: 0 0.5rem;
            }
            
            .job-content {
                padding: 1.5rem;
            }
            
            .hero-badge {
                font-size: 0.9rem;
                padding: 0.6rem 1.2rem;
            }
        }
    </style>

    <!-- Hero Section -->
    <div class="job-hero {{ app()->getLocale() === 'ar' ? 'rtl' : '' }}">
        <div class="job-hero-content">
            <h1>{{ app()->getLocale() === 'ar' ? $job->title : ($job->title_en ?? $job->title) }}</h1>
            <div class="job-hero-badges">
                <span class="hero-badge">
                    <i class="fas fa-map-marker-alt"></i>
                    {{ app()->getLocale() === 'ar' ? ($job->location ?? __('careersshow.remote')) : ($job->location_en ?? $job->location ?? __('careersshow.remote')) }}
                </span>
                <span class="hero-badge">
                    <i class="fas fa-briefcase"></i>
                    @if(app()->getLocale() === 'ar')
                        {{ $job->type }}
                    @else
                        @switch($job->type)
                            @case('دوام كامل')
                                {{ __('Full Time') }}
                                @break
                            @case('دوام جزئي')
                                {{ __('Part Time') }}
                                @break
                            @case('متطوع')
                                {{ __('Volunteer') }}
                                @break
                            @default
                                {{ $job->type }}
                        @endswitch
                    @endif
                </span>
                @if($job->deadline)
                    <span class="hero-badge badge-urgent">
                        <i class="fas fa-clock"></i>
                        {{ __('careersshow.deadline') }}: {{ $job->deadline->format('d-m-Y') }}
                    </span>
                @endif
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="job-container">
        <div class="job-card">
            <div class="job-card-header"></div>
            
            <div class="job-content">
                <div class="job-title-section">
                    <div class="job-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <h2 class="job-title">{{ app()->getLocale() === 'ar' ? $job->title : ($job->title_en ?? $job->title) }}</h2>
                    <p class="job-subtitle">{{ __('careersshow.join_our_team') }}</p>
                </div>

                <!-- Job Info Grid -->
                <div class="job-info-grid">
                    <div class="info-card">
                        <div class="info-label">{{ __('careersshow.location') }}</div>
                        <div class="info-value">{{ app()->getLocale() === 'ar' ? ($job->location ?? __('careersshow.remote')) : ($job->location_en ?? $job->location ?? __('careersshow.remote')) }}</div>
                    </div>
                    <div class="info-card">
                        <div class="info-label">{{ __('careersshow.type') }}</div>
                        <div class="info-value">
                            @if(app()->getLocale() === 'ar')
                                {{ $job->type }}
                            @else
                                @switch($job->type)
                                    @case('دوام كامل')
                                        {{ __('Full Time') }}
                                        @break
                                    @case('دوام جزئي')
                                        {{ __('Part Time') }}
                                        @break
                                    @case('متطوع')
                                        {{ __('Volunteer') }}
                                        @break
                                    @default
                                        {{ $job->type }}
                                @endswitch
                            @endif
                        </div>
                    </div>
                    @if($job->deadline)
                        <div class="info-card">
                            <div class="info-label">{{ __('careersshow.deadline') }}</div>
                            <div class="info-value">{{ $job->deadline->format('M d, Y') }}</div>
                        </div>
                    @endif
                </div>

                <!-- Quick Overview -->
                <div class="job-overview">
                    <h2 class="section-title">{{ __('careersshow.quick_info') }}</h2>
                    <ul class="overview-list">
                        <li class="overview-item">
                            <div class="overview-icon"></div>
                            <span class="overview-label">{{ __('careersshow.location') }}:</span>
                            <span class="overview-value">{{ app()->getLocale() === 'ar' ? ($job->location ?? __('careersshow.remote')) : ($job->location_en ?? $job->location ?? __('careersshow.remote')) }}</span>
                        </li>
                        <li class="overview-item">
                            <div class="overview-icon"></div>
                            <span class="overview-label">{{ __('careersshow.type') }}:</span>
                            <span class="overview-value">
                                @if(app()->getLocale() === 'ar')
                                    {{ $job->type }}
                                @else
                                    @switch($job->type)
                                        @case('دوام كامل')
                                            {{ __('Full Time') }}
                                            @break
                                        @case('دوام جزئي')
                                            {{ __('Part Time') }}
                                            @break
                                        @case('متطوع')
                                            {{ __('Volunteer') }}
                                            @break
                                        @default
                                            {{ $job->type }}
                                    @endswitch
                                @endif
                            </span>
                        </li>
                        @if($job->deadline)
                            <li class="overview-item">
                                <div class="overview-icon"></div>
                                <span class="overview-label">{{ __('careersshow.deadline') }}:</span>
                                <span class="overview-value">
                                    @if(app()->getLocale() === 'ar')
                                        {{ $job->deadline->format('Y-m-d') }}
                                    @else
                                        {{ $job->deadline->format('M d, Y') }}
                                    @endif
                                </span>
                            </li>
                        @endif
                    </ul>
                </div>

                <!-- Job Description -->
                <div class="job-description">
                    <h2 class="section-title">
                        <i class="fas fa-file-alt"></i>
                        {{ __('careersshow.job_details') }}
                    </h2>
                    <div class="description-content">{{ app()->getLocale() === 'ar' ? $job->description : ($job->description_en ?? $job->description) }}</div>
                </div>

                <!-- Action Buttons -->
                <div class="job-actions">
                    <a href="{{ route('careers.apply', $job) }}" class="btn btn-primary">
                        {{ __('careersshow.apply_now') }}
                        <i class="fas fa-paper-plane"></i>
                    </a>

                    <a href="{{ route('careers.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-right"></i>
                        {{ __('careersshow.back_to_jobs') }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>