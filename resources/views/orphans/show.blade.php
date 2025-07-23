<x-app-layout>
    <style>
        :root {
            --primary-navy: #2C3E50;
            --primary-gold: #C9B458;
            --accent-navy: #7EB6C1;
            --accent-gold: #E3D58A;
            --light-gold: #F5F9FA;
            --dark-navy: #1F2F3A;
            --muted-blue: #A6C1D9;
            --soft-beige: #D4E6E8;
            --gold-gradient: linear-gradient(45deg, #C9B458, #E3D58A);
        }

        .profile-container {
            background: linear-gradient(to bottom right, var(--soft-beige), var(--light-gold));
            min-height: 100vh;
            padding: 2rem 1rem;
        }

        .profile-card {
            background: white;
            border-radius: 24px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            max-width: 1200px;
            margin: 0 auto;
        }

        .profile-header {
            background: var(--gold-gradient);
            color: var(--dark-navy);
            padding: 2rem;
            text-align: center;
            font-weight: bold;
        }

        .profile-title {
            font-size: 2.25rem;
            font-weight: 700;
            margin: 0;
        }

        .profile-subtitle {
            font-size: 1rem;
            color: var(--primary-navy);
            margin-top: 0.5rem;
        }

        .profile-content {
            padding: 2.5rem;
            background: white;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.25rem;
        }

        .info-item {
            background: var(--soft-beige);
            padding: 1.5rem;
            border-radius: 1rem;
            border: 1px solid var(--muted-blue);
        }

        .highlight-item {
            background: var(--muted-blue);
            color: var(--primary-navy);
        }

        .warning-item {
            background: var(--accent-gold);
            color: #5c4500;
        }

        .info-label {
            font-size: 0.85rem;
            font-weight: bold;
            color: var(--primary-navy);
            text-transform: uppercase;
            margin-bottom: 0.5rem;
        }

        .info-value {
            font-size: 1.05rem;
            color: var(--dark-navy);
        }

        .full-width {
            grid-column: 1 / -1;
        }

        .status-badge {
            display: inline-block;
            padding: 0.4rem 1rem;
            font-size: 0.8rem;
            font-weight: 600;
            border-radius: 2rem;
            text-transform: uppercase;
            background: var(--accent-navy);
            color: var(--primary-navy);
        }

        .status-sponsored {
            background: var(--primary-gold);
            color: var(--dark-navy);
        }

        .error-message {
            background: #fcebea;
            color: #b71c1c;
            border-left: 5px solid #e53935;
            padding: 1.25rem;
            border-radius: 1rem;
            font-weight: 600;
            text-align: center;
        }

        .action-buttons {
            display: flex;
            justify-content: center;
            margin-top: 2rem;
        }

        .btn {
            padding: 0.75rem 2rem;
            font-size: 0.875rem;
            font-weight: 600;
            border-radius: 9999px;
            background: var(--primary-navy);
            color: white;
            transition: background 0.3s ease;
            text-decoration: none;
        }

        .btn:hover {
            background: var(--dark-navy);
        }

        @media (max-width: 768px) {
            .profile-content {
                padding: 1.5rem;
            }

            .profile-title {
                font-size: 1.75rem;
            }
        }
    </style>

   <div class="profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <h2 class="profile-title">@lang('orphanprofile.profile_title'): {{ $orphan->name }}</h2>
                <p class="profile-subtitle">@lang('orphanprofile.profile_subtitle')</p>
            </div>

            @php $app = $orphan->application; @endphp

            <div class="profile-content">
                <div class="info-grid">
                    <div class="info-item highlight-item">
                        <div class="info-label">@lang('orphanprofile.name')</div>
                        <div class="info-value">{{ $orphan->name }}</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">@lang('orphanprofile.age')</div>
                        <div class="info-value">{{ $orphan->age }} سنة</div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">@lang('orphanprofile.status')</div>
                        <div class="info-value">
                            <span class="status-badge {{ $orphan->status === 'available' ? 'status-available' : 'status-sponsored' }}">
                                @lang('orphanprofile.' . ($orphan->status === 'available' ? 'available' : 'sponsored'))
                            </span>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-label">@lang('orphanprofile.guardian_phone')</div>
                        <div class="info-value">{{ $orphan->guardian_phone }}</div>
                    </div>

                    <div class="info-item full-width">
                        <div class="info-label">@lang('orphanprofile.address')</div>
                        <div class="info-value">{{ $orphan->address }}</div>
                    </div>

                    @if($app)
                        <div class="section-divider"></div>

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.gender')</div>
                            <div class="info-value">{{ $app->orphan_gender }}</div>
                        </div>

                       <div class="info-item">
    <div class="info-label">@lang('orphanprofile.city')</div>
    <div class="info-value">
        {{ app()->getLocale() === 'en' ? ($app->orphan_city_en ?? $app->orphan_city) : $app->orphan_city }}
    </div>
</div>


                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.nationality')</div>
                            <div class="info-value">{{ $app->orphan_nationality }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.father_name')</div>
                            <div class="info-value">{{ $app->father_name }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.father_death_date')</div>
                            <div class="info-value">{{ $app->father_death_date }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.father_death_cause')</div>
                            <div class="info-value">{{ $app->father_death_cause }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.father_job_before_death')</div>
                            <div class="info-value">{{ $app->father_job_before_death }}</div>
                        </div>

                        <div class="info-item highlight-item">
                            <div class="info-label">@lang('orphanprofile.monthly_income')</div>
                            <div class="info-value">{{ number_format($app->monthly_income, 2) }} ريال</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.family_members_count')</div>
                            <div class="info-value">{{ $app->family_members_count }}</div>
                        </div>

                        <div class="info-item full-width">
                            <div class="info-label">@lang('orphanprofile.financial_situation_description')</div>
                            <div class="info-value">{{ $app->financial_situation_description }}</div>
                        </div>

                     <div class="info-item">
    <div class="info-label">@lang('orphanprofile.housing_type')</div>
    <div class="info-value">
        {{ app()->getLocale() === 'en' ? ($app->housing_type_en ?? $app->housing_type) : $app->housing_type }}
    </div>
</div>


                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.monthly_rent')</div>
                            <div class="info-value">{{ $app->monthly_rent ?? 'لا يوجد' }}</div>
                        </div>

                        <div class="info-item {{ $app->has_health_issues ? 'warning-item' : '' }}">
                            <div class="info-label">@lang('orphanprofile.has_health_issues')</div>
                            <div class="info-value">{{ $app->has_health_issues ? __('نعم') : __('لا') }}</div>
                        </div>

                        @if($app->has_health_issues)
                            <div class="info-item full-width warning-item">
                                <div class="info-label">@lang('orphanprofile.health_issues_description')</div>
                                <div class="info-value">{{ $app->health_issues_description }}</div>
                            </div>
                        @endif

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.needs_medical_care')</div>
                            <div class="info-value">{{ $app->needs_medical_care ? __('نعم') : __('لا') }}</div>
                        </div>
<div class="info-item">
    <div class="info-label">@lang('orphanprofile.education_level')</div>
    <div class="info-value">
        {{ app()->getLocale() === 'en' ? ($app->education_level_en ?? $app->education_level) : $app->education_level }}
    </div>
</div>


                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.school_name')</div>
                            <div class="info-value">{{ $app->school_name }}</div>
                        </div>

                        <div class="info-item">
                            <div class="info-label">@lang('orphanprofile.needs_educational_support')</div>
                            <div class="info-value">{{ $app->needs_educational_support ? __('نعم') : __('لا') }}</div>
                        </div>

                        <div class="info-item full-width">
                            <div class="info-label">@lang('orphanprofile.educational_needs_description')</div>
                            <div class="info-value">{{ $app->educational_needs_description }}</div>
                        </div>

                        <div class="info-item full-width">
                            <div class="info-label">@lang('orphanprofile.special_circumstances')</div>
                            <div class="info-value">{{ $app->special_circumstances }}</div>
                        </div>

                        <div class="info-item full-width">
                            <div class="info-label">@lang('orphanprofile.additional_notes')</div>
                            <div class="info-value">{{ $app->additional_notes }}</div>
                        </div>

                        <div class="info-item full-width highlight-item">
                            <div class="info-label">@lang('orphanprofile.support_needed')</div>
                            <div class="info-value">{{ $app->support_needed }}</div>
                        </div>
                    @else
                        <div class="error-message">
                            @lang('orphanprofile.no_application')
                        </div>
                    @endif
                </div>

                <div class="action-buttons">
                    <a href="{{ route('sponsorship.index') }}" class="btn btn-back">@lang('orphanprofile.back')</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>