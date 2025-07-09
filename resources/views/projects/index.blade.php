<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Tajawal', sans-serif;
            direction: rtl;
        }
        
        /* Elegant animations */
        @keyframes elegantFadeIn {
            from {
                opacity: 0;
                transform: translateY(60px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        @keyframes luxuryShimmer {
            0% { transform: translateX(-100%) rotate(45deg); }
            100% { transform: translateX(300%) rotate(45deg); }
        }
        
        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); opacity: 0.7; }
            50% { transform: translateY(-40px) rotate(180deg); opacity: 1; }
        }
        
        @keyframes subtleGlow {
            0%, 100% { box-shadow: 0 0 20px rgba(102, 126, 234, 0.3); }
            50% { box-shadow: 0 0 40px rgba(102, 126, 234, 0.5), 0 0 60px rgba(118, 75, 162, 0.3); }
        }
        
        @keyframes progressFlow {
            0% { background-position: 0 0; }
            100% { background-position: 40px 0; }
        }
        
        @keyframes textGlow {
            0%, 100% { text-shadow: 0 0 20px rgba(255, 255, 255, 0.5); }
            50% { text-shadow: 0 0 30px rgba(255, 255, 255, 0.8), 0 0 40px rgba(255, 255, 255, 0.6); }
        }
        
        .main-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 25%, #667eea 50%, #764ba2 75%, #667eea 100%);
            background-size: 400% 400%;
            animation: gradientFlow 20s ease infinite;
            position: relative;
            overflow: hidden;
        }
        
        @keyframes gradientFlow {
            0% { background-position: 0% 50%; }
            25% { background-position: 100% 50%; }
            50% { background-position: 50% 100%; }
            75% { background-position: 50% 0%; }
            100% { background-position: 0% 50%; }
        }
        
        .main-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                radial-gradient(circle at 20% 20%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 80% 80%, rgba(255, 255, 255, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 40% 60%, rgba(255, 255, 255, 0.1) 0%, transparent 40%);
            pointer-events: none;
        }
        
        .main-container::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="1" fill="rgba(255,255,255,0.1)"/></svg>') repeat;
            background-size: 100px 100px;
            opacity: 0.3;
            animation: gentleFloat 15s ease-in-out infinite;
            pointer-events: none;
        }
        
        .floating-elements {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            pointer-events: none;
            overflow: hidden;
        }
        
        .floating-icon {
            position: absolute;
            opacity: 0.2;
            animation: gentleFloat 12s ease-in-out infinite;
            font-size: 2rem;
            filter: blur(0.5px);
        }
        
        .floating-icon:nth-child(1) { 
            top: 15%; left: 10%; animation-delay: 0s; 
            animation-duration: 10s;
        }
        .floating-icon:nth-child(2) { 
            top: 25%; right: 15%; animation-delay: -3s; 
            animation-duration: 14s;
        }
        .floating-icon:nth-child(3) { 
            bottom: 30%; left: 20%; animation-delay: -6s; 
            animation-duration: 12s;
        }
        .floating-icon:nth-child(4) { 
            bottom: 20%; right: 25%; animation-delay: -9s; 
            animation-duration: 16s;
        }
        .floating-icon:nth-child(5) { 
            top: 40%; left: 50%; animation-delay: -12s; 
            animation-duration: 11s;
        }
        .floating-icon:nth-child(6) { 
            bottom: 50%; right: 10%; animation-delay: -15s; 
            animation-duration: 13s;
        }
        
        .header-section {
            text-align: center;
            margin-bottom: 4rem;
            animation: elegantFadeIn 1s ease-out;
            padding: 2rem 0;
        }
        
        .main-title {
            font-size: 4rem;
            font-weight: 800;
            background: linear-gradient(45deg, #ffffff, #f8f9ff, #ffffff);
            background-size: 200% 200%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: textGlow 3s ease-in-out infinite;
            margin-bottom: 1rem;
            letter-spacing: -1px;
        }
        
        .subtitle {
            font-size: 1.25rem;
            color: rgba(255, 255, 255, 0.9);
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.8;
            opacity: 0;
            animation: elegantFadeIn 1s ease-out 0.5s forwards;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
            gap: 2.5rem;
            margin-top: 3rem;
        }
        
        .project-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 2rem;
            overflow: hidden;
            box-shadow: 
                0 25px 50px rgba(0, 0, 0, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            transition: all 0.6s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            animation: elegantFadeIn 0.8s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .project-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #667eea, #764ba2);
            opacity: 0;
            transition: opacity 0.6s ease;
            z-index: -1;
            border-radius: 2rem;
        }
        
        .project-card:hover::before {
            opacity: 0.05;
        }
        
        .project-card:hover {
            transform: translateY(-20px) scale(1.02);
            box-shadow: 
                0 40px 80px rgba(102, 126, 234, 0.25),
                0 0 0 1px rgba(255, 255, 255, 0.2);
            animation: subtleGlow 2s ease-in-out infinite;
        }
        
        .project-card:nth-child(1) { animation-delay: 0.1s; }
        .project-card:nth-child(2) { animation-delay: 0.2s; }
        .project-card:nth-child(3) { animation-delay: 0.3s; }
        .project-card:nth-child(4) { animation-delay: 0.4s; }
        .project-card:nth-child(5) { animation-delay: 0.5s; }
        .project-card:nth-child(6) { animation-delay: 0.6s; }
        
        .project-image {
            position: relative;
            height: 240px;
            overflow: hidden;
        }
        
        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s cubic-bezier(0.23, 1, 0.32, 1);
        }
        
        .project-card:hover .project-image img {
            transform: scale(1.1);
        }
        
        .image-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.8), rgba(118, 75, 162, 0.8));
            opacity: 0;
            transition: opacity 0.6s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.1rem;
            font-weight: 600;
        }
        
        .project-card:hover .image-overlay {
            opacity: 1;
        }
        
        .shimmer-placeholder {
            background: linear-gradient(90deg, #f0f0f0 25%, #e0e0e0 50%, #f0f0f0 75%);
            background-size: 200% 100%;
            animation: luxuryShimmer 2s infinite;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .project-content {
            padding: 2rem;
        }
        
        .project-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
            line-height: 1.4;
            transition: color 0.3s ease;
        }
        
        .project-card:hover .project-title {
            color: #667eea;
        }
        
        .project-description {
            color: #64748b;
            font-size: 0.95rem;
            line-height: 1.7;
            margin-bottom: 1.5rem;
            font-weight: 400;
        }
        
        .stats-section {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-item {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 1rem 1.5rem;
            border-radius: 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            overflow: hidden;
            transition: transform 0.3s ease;
        }
        
        .stat-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.8s ease;
        }
        
        .stat-item:hover::before {
            left: 100%;
        }
        
        .stat-item:hover {
            transform: translateX(5px);
        }
        
        .stat-item.secondary {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
        }
        
        .stat-label {
            font-size: 0.9rem;
            opacity: 0.9;
            font-weight: 500;
        }
        
        .stat-value {
            font-size: 1.1rem;
            font-weight: 700;
        }
        
        .progress-section {
            margin-bottom: 2rem;
        }
        
        .progress-bar-container {
            background: #f1f5f9;
            border-radius: 1rem;
            height: 12px;
            overflow: hidden;
            position: relative;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #667eea, #764ba2, #667eea);
            background-size: 200% 100%;
            border-radius: 1rem;
            position: relative;
            transition: width 1.2s cubic-bezier(0.23, 1, 0.32, 1);
            animation: progressFlow 3s linear infinite;
        }
        
        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: luxuryShimmer 2s infinite;
        }
        
        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.75rem;
        }
        
        .progress-label {
            color: #64748b;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .progress-percentage {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-size: 0.85rem;
            font-weight: 700;
            box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
        }
        
        .donate-button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 1rem 2rem;
            border-radius: 1.5rem;
            font-size: 1rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
            position: relative;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.3);
        }
        
        .donate-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.6s ease;
        }
        
        .donate-button:hover::before {
            left: 100%;
        }
        
        .donate-button:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        }
        
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            background: rgba(255, 255, 255, 0.95);
            border-radius: 2rem;
            backdrop-filter: blur(20px);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.1);
            animation: elegantFadeIn 0.8s ease-out;
        }
        
        .empty-icon {
            font-size: 4rem;
            margin-bottom: 1.5rem;
            opacity: 0.7;
        }
        
        .empty-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 1rem;
        }
        
        .empty-description {
            color: #64748b;
            font-size: 1rem;
            line-height: 1.6;
            max-width: 400px;
            margin: 0 auto;
        }
        .project-card {
    border-radius: 1.5rem; /* خففنا الحدود قليلاً */
    box-shadow: 
        0 15px 35px rgba(0, 0, 0, 0.07),
        0 0 0 1px rgba(255, 255, 255, 0.1);
    transition: all 0.4s cubic-bezier(0.23, 1, 0.32, 1);
    position: relative;
    animation: elegantFadeIn 0.8s ease-out;
    border: 1px solid rgba(255, 255, 255, 0.2);
}

.project-image {
    height: 180px; /* تصغير ارتفاع الصورة */
    overflow: hidden;
    border-top-left-radius: 1.5rem;
    border-top-right-radius: 1.5rem;
}

.project-image img {
    object-fit: cover;
}

.project-content {
    padding: 1.2rem 1.5rem; /* تصغير البادينغ */
}

.project-title {
    font-size: 1.25rem; /* تصغير الخط */
    margin-bottom: 0.75rem;
}

.project-description {
    font-size: 0.85rem; /* تصغير الخط */
    margin-bottom: 1rem;
    line-height: 1.5;
}

/* تقليل هوامش وقيم الأبعاد قليلاً */
.stats-section {
    gap: 0.75rem;
    margin-bottom: 1rem;
}

.stat-item {
    padding: 0.7rem 1.2rem;
}

.donate-button {
    padding: 0.75rem 1.5rem;
    font-size: 0.9rem;
    border-radius: 1.2rem;
}
.project-card {
    border-radius: 1.2rem;
    box-shadow: 
        0 12px 25px rgba(0, 0, 0, 0.05),
        0 0 0 1px rgba(255, 255, 255, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.15);
}

.project-image {
    height: 140px; /* أصغر ارتفاع */
    overflow: hidden;
    border-top-left-radius: 1.2rem;
    border-top-right-radius: 1.2rem;
}

.project-image img {
    object-fit: cover;
}

.project-content {
    padding: 0.8rem 1rem;
}

.project-title {
    font-size: 1rem;
    margin-bottom: 0.5rem;
}

.project-description {
    font-size: 0.75rem;
    margin-bottom: 0.8rem;
    line-height: 1.4;
}

.stats-section {
    gap: 0.5rem;
    margin-bottom: 0.8rem;
}

.stat-item {
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
}

.donate-button {
    padding: 0.5rem 1rem;
    font-size: 0.8rem;
    border-radius: 1rem;
}

.projects-grid {
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); /* أقل عرض للكرت */
    gap: 1.5rem;
}


.project-card {
    max-width: 280px;  /* أقصى عرض */
    margin: 0 auto;    /* لمركزته عند العرض الكبير */
    border-radius: 1.2rem;
    box-shadow: 
        0 12px 25px rgba(0, 0, 0, 0.05),
        0 0 0 1px rgba(255, 255, 255, 0.08);
    transition: all 0.3s ease;
    position: relative;
    border: 1px solid rgba(255, 255, 255, 0.15);
}
.projects-grid {
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 0.8rem; /* قللت المسافة هنا */
}
.projects-grid {
    grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
    gap: 1rem;
}

        /* Responsive Design */
        @media (max-width: 768px) {
            .projects-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .main-title {
                font-size: 2.5rem;
            }
            
            .subtitle {
                font-size: 1.1rem;
                padding: 0 1rem;
            }
            
            .floating-icon {
                display: none;
            }
            
            .project-content {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 480px) {
            .main-title {
                font-size: 2rem;
            }
            
            .project-content {
                padding: 1rem;
            }
        }
    </style>

    <div class="main-container">
        <!-- Floating Elements -->
       
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 relative z-10">
            <!-- Elegant Header -->
            <div class="header-section">
                <h1 class="main-title">المشاريع المتاحة</h1>
                <p class="subtitle">
                    اكتشف مجموعة متنوعة من المشاريع النبيلة وساهم في تحقيق أهدافها الإنسانية
                </p>
            </div>

            <!-- Projects Grid -->
            <div class="projects-grid">
                @forelse ($projects as $project)
                    <div class="project-card">
                        <!-- Project Image -->
                        <div class="project-image">
                            @if($project->image)
                                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}">
                                <div class="image-overlay">
                                  
                                </div>
                            @else
                                <div class="shimmer-placeholder" style="height: 240px;">
                                    <div>
                                        <div style="font-size: 2.5rem; margin-bottom: 0.5rem;">📸</div>
                                        <div>لا توجد صورة</div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <!-- Project Content -->
                        <div class="project-content">
                            <h3 class="project-title">{{ $project->name }}</h3>
                            <p class="project-description">
                                {{ Str::limit($project->description, 140) }}
                            </p>

                            <!-- Stats Section -->
                            <div class="stats-section">
                                <div class="stat-item">
                                    <span class="stat-label">المبلغ المطلوب</span>
                                    <span class="stat-value">{{ number_format($project->goal_amount, 2) }} د.أ</span>
                                </div>
                                
                                <div class="stat-item secondary">
                                    <span class="stat-label">المبلغ المتبرع به</span>
                                    <span class="stat-value">{{ number_format($project->raised_amount, 2) }} د.أ</span>
                                </div>
                            </div>

                            <!-- Progress Section -->
                            @php
                                $percentage = $project->goal_amount > 0
                                    ? min(100, round(($project->raised_amount / $project->goal_amount) * 100, 2))
                                    : 0;
                            @endphp
                            <div class="progress-section">
                                <div class="progress-bar-container">
                                    <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                                </div>
                                <div class="progress-info">
                                    <span class="progress-label">نسبة الإنجاز</span>
                                    <span class="progress-percentage">{{ $percentage }}%</span>
                                </div>
                            </div>

                            <!-- Donate Button -->
                            <a href="{{ route('donations.confirm', $project->id) }}" class="donate-button">
                                <span>عرض التفاصيل والتبرع</span>
                                <span style="font-size: 1.2rem;">💝</span>
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state">
                        <div class="empty-icon">🔍</div>
                        <h3 class="empty-title">لا توجد مشاريع متاحة حالياً</h3>
                        <p class="empty-description">
                            نعمل على إضافة مشاريع جديدة ومميزة قريباً. تابعونا للحصول على آخر التحديثات والفرص المتاحة للمساهمة.
                        </p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>