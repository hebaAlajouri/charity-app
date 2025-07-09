<x-app-layout>
    <style>
        .profile-container {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            padding: 2rem 1rem;
        }
        
        .profile-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
            position: relative;
        }
        
        .profile-header {
            background: linear-gradient(135deg, #e74c3c 0%, #c0392b 100%);
            color: white;
            padding: 2rem;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        
        .profile-header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); opacity: 0.5; }
            50% { transform: scale(1.05); opacity: 0.8; }
        }
        
        .profile-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
            position: relative;
            z-index: 1;
        }
        
        .profile-subtitle {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-top: 0.5rem;
            position: relative;
            z-index: 1;
        }
        
        .profile-content {
            padding: 2.5rem;
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        .info-item {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 1.5rem;
            border-radius: 16px;
            border: 1px solid rgba(0,0,0,0.05);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .info-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #667eea, #764ba2);
            transform: scaleX(0);
            transition: transform 0.3s ease;
        }
        
        .info-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        
        .info-item:hover::before {
            transform: scaleX(1);
        }
        
        .info-item.full-width {
            grid-column: 1 / -1;
        }
        
        .info-label {
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .info-value {
            color: #34495e;
            font-size: 1.1rem;
            line-height: 1.6;
        }
        
        .status-badge {
            display: inline-block;
            padding: 0.5rem 1rem;
            border-radius: 25px;
            font-weight: 600;
            font-size: 0.9rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .status-available {
            background: linear-gradient(135deg, #27ae60 0%, #2ecc71 100%);
            color: white;
        }
        
        .status-sponsored {
            background: linear-gradient(135deg, #f39c12 0%, #e67e22 100%);
            color: white;
        }
        
        .highlight-item {
            background: linear-gradient(135deg, #e8f5e8 0%, #d4edda 100%);
            border-left: 5px solid #28a745;
        }
        
        .warning-item {
            background: linear-gradient(135deg, #fff3cd 0%, #ffeaa7 100%);
            border-left: 5px solid #ffc107;
        }
        
        .error-message {
            background: linear-gradient(135deg, #f8d7da 0%, #f1c0c7 100%);
            color: #721c24;
            padding: 1.5rem;
            border-radius: 16px;
            text-align: center;
            font-weight: 600;
            border-left: 5px solid #dc3545;
        }
        
        .action-buttons {
            display: flex;
            justify-content: center;
            gap: 1rem;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 2px solid #e9ecef;
        }
        
        .btn {
            padding: 1rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
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
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn:hover::before {
            left: 100%;
        }
        
        .btn-back {
            background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
            color: white;
        }
        
        .btn-back:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(108, 117, 125, 0.3);
        }
        
        .section-divider {
            height: 2px;
            background: linear-gradient(90deg, transparent, #dee2e6, transparent);
            margin: 2rem 0;
        }
        
        @media (max-width: 768px) {
            .profile-title {
                font-size: 2rem;
            }
            
            .profile-content {
                padding: 1.5rem;
            }
            
            .info-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            
            .info-item {
                padding: 1rem;
            }
        }
    </style>
    
    <div class="profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <h2 class="profile-title">ملف اليتيم: {{ $orphan->name }}</h2>
                <p class="profile-subtitle">معلومات شاملة عن حالة اليتيم</p>
            </div>
            
            @php $app = $orphan->application; @endphp
            
            <div class="profile-content">
                <div class="info-grid">
                    <div class="info-item highlight-item">
                        <div class="info-label">الاسم</div>
                        <div class="info-value">{{ $orphan->name }}</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">العمر</div>
                        <div class="info-value">{{ $orphan->age }} سنة</div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">الحالة</div>
                        <div class="info-value">
                            <span class="status-badge {{ $orphan->status === 'available' ? 'status-available' : 'status-sponsored' }}">
                                {{ $orphan->status === 'available' ? 'متاح' : 'مكفول' }}
                            </span>
                        </div>
                    </div>
                    
                    <div class="info-item">
                        <div class="info-label">رقم هاتف الكافل</div>
                        <div class="info-value">{{ $orphan->guardian_phone }}</div>
                    </div>
                    
                    <div class="info-item full-width">
                        <div class="info-label">العنوان</div>
                        <div class="info-value">{{ $orphan->address }}</div>
                    </div>
                    
                    @if($app)
                        <div class="section-divider"></div>
                        
                        <div class="info-item">
                            <div class="info-label">الجنس</div>
                            <div class="info-value">{{ $app->orphan_gender }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">المدينة</div>
                            <div class="info-value">{{ $app->orphan_city }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">الجنسية</div>
                            <div class="info-value">{{ $app->orphan_nationality }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">اسم الأب</div>
                            <div class="info-value">{{ $app->father_name }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">تاريخ الوفاة</div>
                            <div class="info-value">{{ $app->father_death_date }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">سبب الوفاة</div>
                            <div class="info-value">{{ $app->father_death_cause }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">عمل الأب قبل الوفاة</div>
                            <div class="info-value">{{ $app->father_job_before_death }}</div>
                        </div>
                        
                        <div class="info-item highlight-item">
                            <div class="info-label">الدخل الشهري</div>
                            <div class="info-value">{{ number_format($app->monthly_income, 2) }} ريال</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">عدد أفراد الأسرة</div>
                            <div class="info-value">{{ $app->family_members_count }}</div>
                        </div>
                        
                        <div class="info-item full-width">
                            <div class="info-label">وصف الحالة المادية</div>
                            <div class="info-value">{{ $app->financial_situation_description }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">نوع السكن</div>
                            <div class="info-value">{{ $app->housing_type }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">قيمة الإيجار</div>
                            <div class="info-value">{{ $app->monthly_rent ?? 'لا يوجد' }}</div>
                        </div>
                        
                        <div class="info-item {{ $app->has_health_issues ? 'warning-item' : '' }}">
                            <div class="info-label">هل لديه مشاكل صحية</div>
                            <div class="info-value">{{ $app->has_health_issues ? 'نعم' : 'لا' }}</div>
                        </div>
                        
                        @if($app->has_health_issues)
                            <div class="info-item full-width warning-item">
                                <div class="info-label">الوصف الصحي</div>
                                <div class="info-value">{{ $app->health_issues_description }}</div>
                            </div>
                        @endif
                        
                        <div class="info-item">
                            <div class="info-label">يحتاج رعاية طبية</div>
                            <div class="info-value">{{ $app->needs_medical_care ? 'نعم' : 'لا' }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">المرحلة الدراسية</div>
                            <div class="info-value">{{ $app->education_level }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">اسم المدرسة</div>
                            <div class="info-value">{{ $app->school_name }}</div>
                        </div>
                        
                        <div class="info-item">
                            <div class="info-label">يحتاج دعم تعليمي</div>
                            <div class="info-value">{{ $app->needs_educational_support ? 'نعم' : 'لا' }}</div>
                        </div>
                        
                        <div class="info-item full-width">
                            <div class="info-label">احتياجات تعليمية</div>
                            <div class="info-value">{{ $app->educational_needs_description }}</div>
                        </div>
                        
                        <div class="info-item full-width">
                            <div class="info-label">ظروف خاصة</div>
                            <div class="info-value">{{ $app->special_circumstances }}</div>
                        </div>
                        
                        <div class="info-item full-width">
                            <div class="info-label">ملاحظات إضافية</div>
                            <div class="info-value">{{ $app->additional_notes }}</div>
                        </div>
                        
                        <div class="info-item full-width highlight-item">
                            <div class="info-label">الدعم المطلوب</div>
                            <div class="info-value">{{ $app->support_needed }}</div>
                        </div>
                    @else
                        <div class="error-message">
                            لا يوجد معلومات طلب مرتبطة بهذا اليتيم.
                        </div>
                    @endif
                </div>
                
                <div class="action-buttons">
                    <a href="{{ route('sponsorship.index') }}" class="btn btn-back">رجوع</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>