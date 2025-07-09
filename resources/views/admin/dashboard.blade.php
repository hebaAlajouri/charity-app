@extends('admin.layout')

@section('content')
<h1 class="text-3xl font-bold text-[#e74c3c] mb-8 text-center">لوحة التحكم</h1>

<div class="grid grid-cols-1 xl:grid-cols-2 gap-8 mb-8">
    <!-- Orphans Chart Card -->
    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
        <div class="h-80 relative">
            <canvas id="orphansChart"></canvas>
        </div>
    </div>
    
    <!-- Donations Chart Card -->
    <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
        <div class="h-80 relative">
            <canvas id="donationsChart"></canvas>
        </div>
    </div>
</div>

<!-- Donation Amounts Chart Card -->
<div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-xl transition-all duration-300 border border-gray-100">
    <div class="h-96 relative">
        <canvas id="donationAmountsChart"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Enhanced chart configuration
    Chart.defaults.font.family = 'system-ui, -apple-system, sans-serif';
    Chart.defaults.font.size = 13;
    Chart.defaults.color = '#4a5568';

    // Modern color palettes
    const colors = {
        primary: ['#667eea', '#764ba2', '#f093fb', '#f5576c', '#4facfe', '#00f2fe'],
        gradient: {
            blue: ['#667eea', '#764ba2'],
            green: ['#11998e', '#38ef7d'],
            orange: ['#fc4a1a', '#f7b733'],
            purple: ['#8360c3', '#2ebf91'],
            pink: ['#ff9a9e', '#fecfef']
        }
    };

    // Helper function to create gradient
    function createGradient(ctx, colors, direction = 'vertical') {
        const gradient = direction === 'vertical' 
            ? ctx.createLinearGradient(0, 0, 0, 400)
            : ctx.createLinearGradient(0, 0, 400, 0);
        
        gradient.addColorStop(0, colors[0]);
        gradient.addColorStop(1, colors[1]);
        return gradient;
    }

    // Enhanced Orphans Chart (Doughnut)
    const orphansCtx = document.getElementById('orphansChart').getContext('2d');
    const orphansGradient1 = createGradient(orphansCtx, colors.gradient.blue);
    const orphansGradient2 = createGradient(orphansCtx, colors.gradient.green);
    
    new Chart(orphansCtx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($orphansStatus->keys()) !!},
            datasets: [{
                data: {!! json_encode($orphansStatus->values()) !!},
                backgroundColor: [orphansGradient1, orphansGradient2],
                borderWidth: 0,
                hoverOffset: 15,
                hoverBorderWidth: 3,
                hoverBorderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '65%',
            plugins: {
                title: {
                    display: true,
                    text: 'حالة الأيتام',
                    font: {
                        size: 18,
                        weight: 'bold'
                    },
                    color: '#2d3748',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                legend: {
                    position: 'bottom',
                    labels: {
                        usePointStyle: true,
                        pointStyle: 'circle',
                        padding: 20,
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    borderColor: '#ffffff',
                    borderWidth: 1,
                    cornerRadius: 8,
                    caretPadding: 10,
                    callbacks: {
                        label: function(context) {
                            const total = context.dataset.data.reduce((a, b) => a + b, 0);
                            const percentage = ((context.parsed * 100) / total).toFixed(1);
                            return `${context.label}: ${context.parsed} (${percentage}%)`;
                        }
                    }
                }
            },
            animation: {
                animateRotate: true,
                animateScale: true,
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Enhanced Donations Chart (Bar)
    const donationsCtx = document.getElementById('donationsChart').getContext('2d');
    const donationsGradient1 = createGradient(donationsCtx, colors.gradient.orange);
    const donationsGradient2 = createGradient(donationsCtx, colors.gradient.purple);
    
    new Chart(donationsCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($donationsByStatus->keys()) !!},
            datasets: [{
                label: 'عدد التبرعات',
                data: {!! json_encode($donationsByStatus->values()) !!},
                backgroundColor: [donationsGradient1, donationsGradient2],
                borderRadius: 8,
                borderSkipped: false,
                hoverBackgroundColor: colors.gradient.pink,
                hoverBorderWidth: 2,
                hoverBorderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'حالة التبرعات',
                    font: {
                        size: 18,
                        weight: 'bold'
                    },
                    color: '#2d3748',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    borderColor: '#ffffff',
                    borderWidth: 1,
                    cornerRadius: 8,
                    caretPadding: 10
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        lineWidth: 1
                    },
                    ticks: {
                        font: {
                            size: 12
                        },
                        color: '#718096'
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 12
                        },
                        color: '#718096'
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });

    // Enhanced Donation Amounts Chart (Bar)
    const amountCtx = document.getElementById('donationAmountsChart').getContext('2d');
    const amountGradient = createGradient(amountCtx, ['#8e44ad', '#3498db']);
    
    new Chart(amountCtx, {
        type: 'bar',
        data: {
            labels: {!! json_encode($donationAmounts->keys()) !!},
            datasets: [{
                label: 'المبلغ الإجمالي',
                data: {!! json_encode($donationAmounts->values()) !!},
                backgroundColor: amountGradient,
                borderRadius: 8,
                borderSkipped: false,
                hoverBackgroundColor: createGradient(amountCtx, colors.gradient.pink),
                hoverBorderWidth: 2,
                hoverBorderColor: '#ffffff'
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                title: {
                    display: true,
                    text: 'التبرعات حسب المشروع',
                    font: {
                        size: 18,
                        weight: 'bold'
                    },
                    color: '#2d3748',
                    padding: {
                        top: 10,
                        bottom: 30
                    }
                },
                legend: {
                    display: false
                },
                tooltip: {
                    backgroundColor: 'rgba(0, 0, 0, 0.8)',
                    titleColor: '#ffffff',
                    bodyColor: '#ffffff',
                    borderColor: '#ffffff',
                    borderWidth: 1,
                    cornerRadius: 8,
                    caretPadding: 10,
                    callbacks: {
                        label: function(context) {
                            return `${context.dataset.label}: ${context.parsed.y.toLocaleString()} ريال`;
                        }
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    grid: {
                        color: 'rgba(0, 0, 0, 0.05)',
                        lineWidth: 1
                    },
                    ticks: {
                        font: {
                            size: 12
                        },
                        color: '#718096',
                        callback: function(value) {
                            return value.toLocaleString() + ' ريال';
                        }
                    }
                },
                x: {
                    grid: {
                        display: false
                    },
                    ticks: {
                        font: {
                            size: 12
                        },
                        color: '#718096',
                        maxRotation: 45,
                        minRotation: 0
                    }
                }
            },
            animation: {
                duration: 1500,
                easing: 'easeInOutQuart'
            }
        }
    });
</script>

@endsection