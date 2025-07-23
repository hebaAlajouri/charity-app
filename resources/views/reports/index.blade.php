<x-app-layout>
    <style>
        * {
            font-family: 'Cairo', sans-serif;
        }
        
        .rtl {
            direction: rtl;
        }
        
        /* Enhanced gradient backgrounds with baby blue */
        .gradient-bg {
            background: linear-gradient(135deg, #7EB6C1; , #7EB6C1 100%);
        }
        
        .gradient-indigo {
            background: linear-gradient(135deg, #7EB6C1 0%, #7EB6C1 100%);
        }
        
        .gradient-baby-blue {
            background: linear-gradient(135deg, #7EB6C1 0%, #87CEEB 100%);
        }
        
        /* Glass morphism effect */
        .glass {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        /* Enhanced card hover effects */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(126, 182, 193, 0.15); /* baby blue shadow */
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #7EB6C1;
            border-radius: 4px;
        }
        
        /* Animated gradient text - indigo to baby blue */
        .gradient-text {
            background: linear-gradient(135deg, #4f46e5, #7EB6C1);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        /* Modern button styles */
        .btn-modern {
            background: linear-gradient(45deg, #4f46e5, #7EB6C1);
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(126, 182, 193, 0.3);
            border: none;
            cursor: pointer;
        }
        
        .btn-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(126, 182, 193, 0.4);
        }
        
        /* Floating animation */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
        
        .floating {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Page transition */
        .page-enter {
            opacity: 0;
            transform: translateY(20px);
        }
        
        .page-enter-active {
            opacity: 1;
            transform: translateY(0);
            transition: all 0.5s ease;
        }
        
        /* Custom line clamp */
        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        /* Enhanced shadows with baby blue */
        .shadow-indigo {
            box-shadow: 0 10px 30px rgba(79, 70, 229, 0.2);
        }
        
        .shadow-baby-blue {
            box-shadow: 0 10px 30px rgba(126, 182, 193, 0.2);
        }
        
        /* Modern card styles */
        .modern-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            overflow: hidden;
            position: relative;
        }
        
        .modern-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #aaa6ffff, #7EB6C1);
        }
        
        /* Icon background updated with indigo to baby blue */
        .icon-gradient {
            background: linear-gradient(to bottom right, #b8b5ffff, #7EB6C1) !important;
        }
        
        /* Empty state with baby blue theme */
        .empty-state-bg {
            background: linear-gradient(135deg, #7EB6C1 0%, #87CEEB 100%);
        }
        
        /* Enhanced responsive design */
        @media (max-width: 768px) {
            .mobile-adjust {
                padding: 1rem;
            }
        }
    </style>

    <!-- App Layout Container -->
    <div class="min-h-screen rtl">
        <!-- Header Section -->
        <div class="gradient-indigo py-8 mb-8 relative overflow-hidden">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-10 right-10 w-32 h-32 bg-white opacity-10 rounded-full floating"></div>
                <div class="absolute bottom-10 left-10 w-20 h-20 bg-white opacity-10 rounded-full floating" style="animation-delay: 1s;"></div>
            </div>
            <div class="relative z-10 max-w-6xl mx-auto px-6">
                <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 text-center">
 <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 text-center">
    {{ app()->getLocale() === 'en' ? $firstReport?->title_en : $firstReport?->title }}
</h1>


</h1>
<p class="text-indigo-100 text-center text-lg max-w-2xl mx-auto">
    {{ __('reports.subtitle') }}
</p>

            </div>
        </div>

        <!-- Main Content -->
        <div class="max-w-6xl mx-auto p-6 page-enter page-enter-active">
            <!-- Reports Section -->
            <div class="mb-8">
                @if($reports->count())
                <div class="space-y-6">
                    @foreach($reports as $report)
                    <!-- Report Card -->
                    <div class="modern-card card-hover shadow-baby-blue">
                        <div class="p-6">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex-1">
                                    <a href="{{ route('reports.show', $report->id) }}" class="text-xl md:text-2xl font-semibold gradient-text hover:opacity-80 transition-opacity">
                                        {{ $report->title }}
                                    </a>
                           <div class="flex items-center mt-2 space-x-reverse space-x-4">
    @if($report->category)
        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-indigo-100 text-indigo-700">
            @php
                $category = app()->getLocale() === 'en' && $report->category_en ? $report->category_en : $report->category;
            @endphp
            {{ __('reports.category') }}: {{ $category }}
        </span>
    @endif
</div>

                                </div>
                                <div class="mr-4">
                                    <div class="w-16 h-16 icon-gradient rounded-full flex items-center justify-center text-white text-2xl">
                                        📊
                                    </div>
                                </div>
                            </div>
                            <p class="text-gray-700 line-clamp-3 leading-relaxed text-lg">
                                {{ \Illuminate\Support\Str::limit(strip_tags(app()->getLocale() === 'en' ? $report->description_en : $report->description), 150, '...') }}

                            </p>
                            <div class="mt-4 flex items-center justify-between">
                                <div class="flex items-center space-x-reverse space-x-4">
                                   
                                   
                                </div>
                              <a href="{{ route('reports.show', $report->id) }}" class="btn-modern px-6 py-2 rounded-full text-white font-medium">
    {{ __('reports.read_more') }}
</a>

                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination Section -->
                <div class="mt-8 flex justify-center">
                    {{ $reports->links() }}
                </div>
                
                @else
                <!-- Empty State -->
                <div class="text-center py-12">
                    <div class="w-24 h-24 empty-state-bg rounded-full flex items-center justify-center text-white text-4xl mx-auto mb-6">
                        📝
                    </div>
                    <h3 class="text-2xl font-semibold text-gray-700 mb-2">
    {{ __('reports.no_reports_title') }}
</h3>
<p class="text-lg" style="color: #7EB6C1;">
    {{ __('reports.no_reports_desc') }}
</p>

                </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        // Add smooth scrolling and enhanced interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Smooth page entrance animation
            const pageContent = document.querySelector('.page-enter');
            if (pageContent) {
                setTimeout(() => {
                    pageContent.classList.add('page-enter-active');
                }, 100);
            }
            
            // Enhanced card hover effects
            const cards = document.querySelectorAll('.card-hover');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-8px) scale(1.02)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
            
            // Smooth scroll for pagination
            const paginationButtons = document.querySelectorAll('nav button');
            paginationButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    // Simulate page transition
                    document.body.style.opacity = '0.8';
                    setTimeout(() => {
                        document.body.style.opacity = '1';
                    }, 300);
                });
            });
        });
    </script>
</x-app-layout>