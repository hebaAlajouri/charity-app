<x-app-layout>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300;400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;500;600;700&display=swap');

        * {
            font-family: 'Cairo', 'Tajawal', sans-serif;
            direction: rtl;
        }

        body {
            background: linear-gradient(135deg, #f8f9fa, #e9ecef);
            min-height: 100vh;
        }

        .form-hero {
            position: relative;
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            padding: 3rem 2rem;
            margin-bottom: 2rem;
            color: white;
            text-align: center;
            border-radius: 0 0 20px 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .form-hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .form-hero p {
            font-size: 1.2rem;
            opacity: 0.9;
        }

        .form-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 1rem;
        }

        .main-form {
            background: #fff;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
        }

        .form-header {
            background: linear-gradient(135deg, #2c3e50, #34495e);
            color: white;
            padding: 2rem;
            text-align: center;
            border-radius: 15px 15px 0 0;
        }

        .form-header h2 {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .form-header p {
            font-size: 1rem;
            opacity: 0.85;
        }

        .form-content {
            margin-top: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-input, .form-select {
            width: 100%;
            padding: 0.9rem 1rem;
            border: 2px solid #e0e0e0;
            border-radius: 10px;
            background: #f9f9f9;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .form-input:focus, .form-select:focus {
            border-color: #e74c3c;
            background: white;
            outline: none;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.2);
        }

        .section-title {
            font-size: 1.4rem;
            color: #e74c3c;
            font-weight: 600;
            margin-bottom: 1rem;
            border-bottom: 2px solid #e74c3c;
            padding-bottom: 0.5rem;
        }

        .orphan-card {
            background: #fff;
            border: 2px solid transparent;
            border-radius: 15px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.05);
        }

        .orphan-card:hover {
            transform: scale(1.03);
            border-color: #e74c3c;
        }

        .orphan-card.selected {
            border-color: #e74c3c;
            background: #fff5f5;
        }

        .custom-checkbox {
            width: 20px;
            height: 20px;
            border-radius: 5px;
            background: #fff;
            border: 2px solid #e74c3c;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #e74c3c;
        }

        .custom-checkbox.checked {
            background: #e74c3c;
            color: white;
        }

        .submit-section {
            text-align: center;
            padding-top: 2rem;
        }

        .submit-btn {
            background: linear-gradient(135deg, #e74c3c, #c0392b);
            color: white;
            padding: 1rem 3rem;
            font-size: 1.1rem;
            font-weight: bold;
            border: none;
            border-radius: 50px;
            cursor: pointer;
            transition: 0.3s ease;
            box-shadow: 0 10px 20px rgba(231, 76, 60, 0.2);
            position: relative;
            overflow: hidden;
        }

        .submit-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(231, 76, 60, 0.4);
        }

        .floating-help {
            position: fixed;
            bottom: 1.5rem;
            left: 1.5rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #f39c12, #e67e22);
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            box-shadow: 0 10px 30px rgba(243, 156, 18, 0.4);
            cursor: pointer;
            z-index: 999;
        }

        .floating-help:hover {
            transform: scale(1.1);
        }

        @media (max-width: 768px) {
            .form-hero h1 {
                font-size: 2rem;
            }

            .submit-btn {
                width: 100%;
                padding: 0.8rem 1.5rem;
            }
        }
    </style>

    <!-- Floating Help Button -->
    <div class="floating-help" onclick="showHelp()">
        <i class="fas fa-question"></i>
    </div>

    <!-- Hero -->
   
    
    <!-- Form Container -->
    <div class="form-container">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('sponsorship.store') }}" class="main-form">
            @csrf

            <div class="form-header">
                <h2>معلومات الكافل</h2>
                <p>يرجى تعبئة كافة البيانات بدقة</p>
            </div>

            <div class="form-content">
                <h3 class="section-title">بيانات شخصية</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <input type="text" name="sponsor_name" class="form-input" placeholder="اسم الكافل" required>
                    <input type="text" name="country" class="form-input" placeholder="الدولة">
                    <input type="text" name="phone" class="form-input" placeholder="رقم الهاتف" required>
                    <input type="email" name="email" class="form-input" placeholder="البريد الإلكتروني" required>
                    <input type="date" name="start_date" class="form-input" required>
                </div>

                <h3 class="section-title">تفاصيل الكفالة</h3>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <select name="orphan_count" class="form-select">
                        <option value="">عدد الأيتام</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3+">أكثر من 2</option>
                    </select>

                    <input type="text" name="sponsoring_for" class="form-input" placeholder="المساهمة عن">

                    <select name="sponsorship_type" class="form-select">
                        <option value="">نوع الكفالة</option>
                        <option value="شهرية">شهرية</option>
                        <option value="سنوية">سنوية</option>
                        <option value="مرة واحدة">مرة واحدة</option>
                    </select>
                </div>

                <h3 class="section-title">اختر الأيتام للكفالة</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @forelse ($orphans as $orphan)
                      <div class="orphan-card" onclick="toggleOrphan({{ $orphan->id }})">
    <div class="flex items-center justify-between gap-3">
        <div class="orphan-avatar">{{ mb_substr($orphan->name, 0, 1) }}</div>
        <div>
            <div>{{ $orphan->name }}</div>
            <small>{{ $orphan->age }} سنة</small>
            <br>
            <a href="{{ route('orphans.show', $orphan->id) }}" class="text-sm text-blue-600 underline hover:text-blue-800 mt-1 inline-block">
                عرض الملف
            </a>
        </div>
        <div class="custom-checkbox" id="checkbox-{{ $orphan->id }}">
            <i class="fas fa-check" style="display: none;"></i>
        </div>
    </div>
    <input type="checkbox" name="orphans[]" value="{{ $orphan->id }}" id="orphan-{{ $orphan->id }}" hidden>
</div>

                    @empty
                        <p class="text-center text-gray-500">لا يوجد أيتام متاحين حالياً.</p>
                    @endforelse
                </div>

                <div class="submit-section">
                    <button type="submit" class="submit-btn">
                        <i class="fas fa-paper-plane ml-2"></i> إرسال الطلب
                    </button>
                </div>
            </div>
        </form>
    </div>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <script>
        function toggleOrphan(orphanId) {
            const checkbox = document.getElementById(`orphan-${orphanId}`);
            const customCheckbox = document.getElementById(`checkbox-${orphanId}`);
            const card = customCheckbox.closest('.orphan-card');
            const checkIcon = customCheckbox.querySelector('i');

            checkbox.checked = !checkbox.checked;

            if (checkbox.checked) {
                customCheckbox.classList.add('checked');
                card.classList.add('selected');
                checkIcon.style.display = 'block';
            } else {
                customCheckbox.classList.remove('checked');
                card.classList.remove('selected');
                checkIcon.style.display = 'none';
            }
        }

        function showHelp() {
            alert('للمساعدة، يرجى الاتصال على الرقم 123-456-7890');
        }
    </script>
</x-app-layout>
