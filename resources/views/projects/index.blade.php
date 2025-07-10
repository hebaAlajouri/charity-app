<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Tajawal', sans-serif;
            direction: rtl;
        }
        
        .main-container {
            min-height: 100vh;
            background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
            padding: 2rem 0;
        }
        
        .header-section {
            text-align: center;
            margin-bottom: 3rem;
            padding: 2rem 0;
        }
        
        .main-title {
            font-size: 3rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 1rem;
            letter-spacing: -0.5px;
        }
        
        .subtitle {
            font-size: 1.125rem;
            color: #64748b;
            font-weight: 400;
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.6;
        }
        
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }
        
        .project-card {
            background: #ffffff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
            transition: box-shadow 0.2s ease;
        }
        
        .project-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
        }
        
        .project-image {
            height: 200px;
            overflow: hidden;
            background: #f1f5f9;
        }
        
        .project-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        
        .shimmer-placeholder {
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #94a3b8;
            font-size: 1rem;
            font-weight: 500;
            height: 100%;
        }
        
        .project-content {
            padding: 1.5rem;
        }
        
        .project-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 1rem;
            line-height: 1.4;
        }
        
        .project-description {
            color: #64748b;
            font-size: 0.875rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }
        
        .stats-section {
            display: flex;
            flex-direction: column;
            gap: 0.75rem;
            margin-bottom: 1.5rem;
        }
        
        .stat-item {
            background: #f8fafc;
            padding: 1rem;
            border-radius: 8px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border: 1px solid #e2e8f0;
        }
        
        .stat-item.secondary {
            background: #fef2f2;
            border-color: #fecaca;
        }
        
        .stat-label {
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 500;
        }
        
        .stat-value {
            font-size: 1rem;
            font-weight: 600;
            color: #1e293b;
        }
        
        .stat-item.secondary .stat-value {
            color: #dc2626;
        }
        
        .progress-section {
            margin-bottom: 1.5rem;
        }
        
        .progress-bar-container {
            background: #f1f5f9;
            border-radius: 8px;
            height: 8px;
            overflow: hidden;
        }
        
        .progress-bar {
            height: 100%;
            background: linear-gradient(90deg, #3b82f6, #1d4ed8);
            border-radius: 8px;
            transition: width 0.3s ease;
        }
        
        .progress-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 0.75rem;
        }
        
        .progress-label {
            color: #64748b;
            font-size: 0.875rem;
            font-weight: 500;
        }
        
        .progress-percentage {
            background: #dc2626;
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
        }
        
        .donate-button {
            background: #3b82f6;
            color: white;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-size: 0.875rem;
            font-weight: 600;
            text-decoration: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: background-color 0.2s ease;
            border: none;
            cursor: pointer;
        }
        
        .donate-button:hover {
            background: #2563eb;
        }
        
        .empty-state {
            grid-column: 1 / -1;
            text-align: center;
            padding: 4rem 2rem;
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            border: 1px solid #e2e8f0;
        }
        
        .empty-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            color: #94a3b8;
        }
        
        .empty-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1e293b;
            margin-bottom: 1rem;
        }
        
        .empty-description {
            color: #64748b;
            font-size: 0.875rem;
            line-height: 1.6;
            max-width: 400px;
            margin: 0 auto;
        }
        
        /* Responsive Design */
        @media (max-width: 768px) {
            .projects-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
            
            .main-title {
                font-size: 2rem;
            }
            
            .subtitle {
                font-size: 1rem;
                padding: 0 1rem;
            }
            
            .project-content {
                padding: 1.25rem;
            }
        }
        
        @media (max-width: 480px) {
            .main-title {
                font-size: 1.75rem;
            }
            
            .project-content {
                padding: 1rem;
            }
            
            .projects-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }
    </style>

    <div class="main-container">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Header -->
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
                            @else
                                <div class="shimmer-placeholder">
                                    <div>
                                        <div style="font-size: 2rem; margin-bottom: 0.5rem;">📸</div>
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
                                <span style="font-size: 1.1rem;">💝</span>
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