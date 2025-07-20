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

    {{-- Content from your blade view --}}
    {{-- Your <div class="profile-container"> ... remains unchanged --}}
</x-app-layout>
