<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? __('messages.site_title') }}</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>

<x-app-layout>
    <!-- Hero Section -->
    <section class="hero" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="hero-content">
            <h1>{{ __('messages.hero_title') }}</h1>
            <p>{{ __('messages.hero_description') }}</p>
            <div class="hero-buttons">
                <a href="{{ route('sponsorship.index') }}" class="btn-primary">
                    <i class="fas fa-hand-holding-heart"></i>
                    {{ __('messages.btn_sponsor_child') }}
                </a>
                <a href="{{ route('projects') }}" class="btn-secondary">
                    <i class="fas fa-donate"></i>
                    {{ __('messages.btn_contribute_now') }}
                </a>
            </div>
        </div>
    </section>

    <!-- Statistics Section -->
    <section class="statistics" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="stats-container">
            <div class="stats-grid">
                <!-- Sponsored Children -->
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-child"></i>
                    </div>
                    <div class="stat-number">{{ $sponsoredChildren }}</div>
                    <div class="stat-label">{{ __('messages.stats_sponsored_children') }}</div>
                </div>

                <!-- Completed Projects -->
                <div class="stat-card">
                    <div class="stat-icon orange">
                        <i class="fas fa-project-diagram"></i>
                    </div>
                    <div class="stat-number">{{ $completedProjects }}</div>
                    <div class="stat-label">{{ __('messages.stats_completed_projects') }}</div>
                </div>

                <!-- Active Donors -->
                <div class="stat-card">
                    <div class="stat-icon green">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="stat-number">{{ $activeDonors }}</div>
                    <div class="stat-label">{{ __('messages.stats_active_donors') }}</div>
                </div>

                <!-- Provinces Served -->
                <div class="stat-card">
                    <div class="stat-icon blue">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="stat-number">{{ $provinces }}</div>
                    <div class="stat-label">{{ __('messages.stats_provinces_served') }}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Projects Section -->
    <section class="featured-projects" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="featured-container">
            <div class="section-header text-center mb-10">
                <h2 class="section-title text-2xl font-bold text-gray-800">{{ __('messages.featured_projects_title') }}</h2>
                <p class="section-subtitle text-gray-600 mt-2">{{ __('messages.featured_projects_subtitle') }}</p>
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
                          @php
    $locale = app()->getLocale();
    $projectName = $locale === 'ar' ? $project->name_ar : $project->name_en;
    $projectDesc = $locale === 'ar' ? $project->description : $project->description_en;
@endphp

<h3 class="project-title text-lg font-semibold text-gray-800 mb-2">{{ $projectName }}</h3>
<p class="project-description text-gray-600 mb-4">{{ $projectDesc }}</p>


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
                                <i class="fas fa-hand-holding-usd ml-2"></i> {{ __('messages.btn_donate_now') }}
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about-section" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="about-container">
            <div class="about-content">
                <h2>{{ __('messages.about_title') }}</h2>
                <p>{{ __('messages.about_p1') }}</p>
                <p>{{ __('messages.about_p2') }}</p>
            </div>

            <div class="about-image">
                <img src="{{ asset('storage/pic1.jpg') }}" alt="{{ __('messages.about_title') }}" class="rounded shadow-lg w-full max-w-md mx-auto mt-6">
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <div class="how-it-works-container">
            <div class="section-header">
                <h2 class="section-title">{{ __('messages.how_it_works_title') }}</h2>
                <p class="section-subtitle">{{ __('messages.how_it_works_subtitle') }}</p>
            </div>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h3 class="step-title">{{ __('messages.step_1_title') }}</h3>
                    <p class="step-description">{{ __('messages.step_1_desc') }}</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="step-title">{{ __('messages.step_2_title') }}</h3>
                    <p class="step-description">{{ __('messages.step_2_desc') }}</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3 class="step-title">{{ __('messages.step_3_title') }}</h3>
                    <p class="step-description">{{ __('messages.step_3_desc') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Bottom Section -->
    <section class="cta-bottom" dir="{{ app()->getLocale() == 'ar' ? 'rtl' : 'ltr' }}">
        <h2>{{ __('messages.cta_title') }}</h2>
        <p>{{ __('messages.cta_description') }}</p>
        <div class="cta-buttons">
            <a href="{{ route('sponsorship.index') }}" class="btn-primary">
                <i class="fas fa-hand-holding-heart"></i>
                {{ __('messages.btn_sponsor_ytim') }}
            </a>
            <a href="{{ route('projects') }}" class="btn-secondary">
                <i class="fas fa-donate"></i>
                {{ __('messages.btn_contribute_now') }}
            </a>
        </div>
    </section>
</x-app-layout>
