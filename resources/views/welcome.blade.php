<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'بسمة طفل - موقع كفالة الأيتام' }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
   
<x-app-layout>
    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-content">
            <h1>ابتسامة طفل تستحق الحياة</h1>
            <p>كن جزءاً من رحلة تغيير حياة الأيتام. ادعم طفلاً اليوم وساهم في رسم مستقبل أفضل له ولمجتمعنا</p>
            <div class="hero-buttons">
                <a href="{{ route('sponsorship.index') }}" class="btn-primary">
                    <i class="fas fa-hand-holding-heart"></i>
                    اكفل طفلاً
                </a>
                <a href="{{ route('projects') }}" class="btn-secondary">
                    <i class="fas fa-donate"></i>
                    تبرع الآن
                </a>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
   <!-- Statistics Section -->
<section class="statistics">
    <div class="stats-container">
        <div class="stats-grid">
            <!-- Sponsored Children -->
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-child"></i>
                </div>
                <div class="stat-number">{{ $sponsoredChildren }}</div>
                <div class="stat-label">الأطفال المكفولين</div>
            </div>

            <!-- Completed Projects -->
            <div class="stat-card">
                <div class="stat-icon orange">
                    <i class="fas fa-project-diagram"></i>
                </div>
                <div class="stat-number">{{ $completedProjects }}</div>
                <div class="stat-label">المشاريع المكتملة</div>
            </div>

            <!-- Active Donors -->
            <div class="stat-card">
                <div class="stat-icon green">
                    <i class="fas fa-users"></i>
                </div>
                <div class="stat-number">{{ $activeDonors }}</div>
                <div class="stat-label">المتبرعين النشيطين</div>
            </div>

            <!-- Provinces Served -->
            <div class="stat-card">
                <div class="stat-icon blue">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <div class="stat-number">{{ $provinces }}</div>
                <div class="stat-label">المحافظات التي نخدمها</div>
            </div>
        </div>
    </div>
</section>


    <!-- Featured Projects Section -->
   <section class="featured-projects">
    <div class="featured-container">
      <section class="featured-projects">
    <div class="featured-container">
        <div class="section-header text-center mb-10">
            <h2 class="section-title text-2xl font-bold text-gray-800">أبرز مشاريعنا</h2>
            <p class="section-subtitle text-gray-600 mt-2">مشاريع إنسانية هادفة لدعم الأيتام وتحسين ظروف معيشتهم</p>
        </div>

        <div class="projects-grid grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($projects as $project)
                <div class="project-card bg-white rounded-lg shadow p-4 flex flex-col">
                    <div class="project-image mb-3 text-center">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->name }}" class="w-full h-48 object-cover rounded">
                        @elseif($project->icon)
                            <i class="{{ $project->icon }} text-5xl text-indigo-600"></i>
                        @else
                            <i class="fas fa-project-diagram text-5xl text-gray-400"></i>
                        @endif
                    </div>

                    <div class="project-content flex flex-col flex-1">
                        <h3 class="project-title text-lg font-semibold text-gray-800 mb-2">{{ $project->name }}</h3>
                        <p class="project-description text-gray-600 mb-4">{{ $project->description }}</p>

                        <div class="project-progress mb-4">
                            <div class="progress-info flex justify-between text-sm text-gray-600 mb-1">
                                <span>{{ number_format($project->raised_amount, 2) }} دينار</span>
                                <span>{{ number_format($project->goal_amount, 2) }} دينار</span>
                            </div>
                            <div class="progress-bar bg-gray-300 rounded-full h-2">
                                <div class="progress-fill bg-indigo-600 h-2 rounded-full"
                                    style="width: {{ min(100, ($project->goal_amount > 0 ? ($project->raised_amount / $project->goal_amount) * 100 : 0)) }}%">
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('donations.confirm', $project->id) }}"
                           class="btn-contribute inline-flex items-center justify-center px-4 py-2 mt-auto bg-indigo-600 text-white rounded hover:bg-indigo-700 transition">
                            <i class="fas fa-hand-holding-usd ml-2"></i> ساهم الآن
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>



    <!-- About Section -->
    <section class="about-section">
    <div class="about-container">
        <div class="about-content">
            <h2>عن بسمة طفل</h2>
            <p>نحن منظمة خيرية تهدف إلى دعم الأيتام ورعايتهم في جميع أنحاء البلاد. نعمل على توفير الكفالة الشهرية، والدعم التعليمي، والرعاية الصحية، والأنشطة الترفيهية للأطفال الذين فقدوا آباءهم.</p>
            <p>منذ تأسيسنا قبل عشر سنوات، تمكنا من كفالة آلاف الأطفال وتقديم الدعم لعائلاتهم. نؤمن بأن كل طفل يستحق فرصة في الحياة وأن المجتمع مسؤول عن رعاية أطفاله.</p>
        </div>

        <div class="about-image">
            <img src="{{ asset('storage/pic1.jpg') }}" alt="صورة عن بسمة طفل" class="rounded shadow-lg w-full max-w-md mx-auto mt-6">
        </div>
    </div>
</section>


    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="how-it-works-container">
            <div class="section-header">
                <h2 class="section-title">كيف تعمل الكفالة؟</h2>
                <p class="section-subtitle">عملية بسيطة وشفافة لضمان وصول دعمك للأطفال المحتاجين</p>
            </div>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3 class="step-title">اختر طفلاً للكفالة</h3>
                    <p class="step-description">تصفح قائمة الأطفال المتاحين للكفالة واختر الطفل الذي تريد دعمه</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="step-title">املأ نموذج الكفالة</h3>
                    <p class="step-description">قم بتعبئة بياناتك الشخصية وتفاصيل الكفالة التي تريد تقديمها</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="step-title">ابدأ في تغيير حياة</h3>
                    <p class="step-description">ستبدأ كفالتك فوراً وستتلقى تقارير دورية عن الطفل المكفول</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Bottom Section -->
    <section class="cta-bottom">
        <h2>كن شريكاً في الخير</h2>
        <p>انضم إلى آلاف المتبرعين الذين اختاروا أن يكونوا جزءاً من التغيير الإيجابي في حياة الأيتام</p>
        <div class="cta-buttons">
            <a href="{{ route('sponsorship.index') }}" class="btn-primary">
                <i class="fas fa-hand-holding-heart"></i>
                اكفل يتيماً
            </a>
            <a href="{{ route('projects') }}" class="btn-secondary">
                <i class="fas fa-donate"></i>
                تبرع الآن
            </a>
        </div>
    </section>
</x-app-layout>
