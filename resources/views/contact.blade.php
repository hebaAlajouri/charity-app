<x-app-layout>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap');
    
    * {
        font-family: 'Tajawal', sans-serif;
        direction: rtl;
    }
    
    .main-container {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        padding: 3rem 1rem;
        position: relative;
        overflow: hidden;
    }
    
    .main-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at 20% 50%, rgba(120, 119, 198, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.1) 0%, transparent 50%),
                    radial-gradient(circle at 40% 80%, rgba(120, 219, 255, 0.1) 0%, transparent 50%);
        pointer-events: none;
    }
    
    .glass-card {
        background: rgba(45, 55, 72, 0.3);
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .glass-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 3px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px 20px 0 0;
    }
    
    .glass-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.5);
    }
    
    .info-card {
        background: rgba(45, 55, 72, 0.4);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        border-radius: 15px;
        padding: 2rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }
    
    .info-card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        border-radius: 15px 15px 0 0;
    }
    
    .info-card:hover {
        transform: translateY(-3px);
        background: rgba(45, 55, 72, 0.6);
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
    }
    
    .form-input {
        background: rgba(55, 65, 81, 0.5);
        border: 1px solid rgba(156, 163, 175, 0.2);
        border-radius: 12px;
        padding: 1rem;
        color: #f9fafb;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        width: 100%;
        text-align: right;
    }
    
    .form-input::placeholder {
        color: #9ca3af;
    }
    
    .form-input:focus {
        background: rgba(55, 65, 81, 0.8);
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
        transform: translateY(-2px);
    }
    
    .form-textarea {
        background: rgba(55, 65, 81, 0.5);
        border: 1px solid rgba(156, 163, 175, 0.2);
        border-radius: 12px;
        padding: 1rem;
        color: #f9fafb;
        font-size: 1rem;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
        width: 100%;
        text-align: right;
        resize: vertical;
        min-height: 120px;
    }
    
    .form-textarea::placeholder {
        color: #9ca3af;
    }
    
    .form-textarea:focus {
        background: rgba(55, 65, 81, 0.8);
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        outline: none;
        transform: translateY(-2px);
    }
    
    .gradient-button {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        border-radius: 12px;
        padding: 1rem 2rem;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        cursor: pointer;
        transition: all 0.3s ease;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    
    .gradient-button:hover {
        transform: translateY(-2px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        background: linear-gradient(135deg, #5a67d8 0%, #6b46c1 100%);
    }
    
    .gradient-button:active {
        transform: translateY(0);
    }
    
    .title-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 2rem;
    }
    
    .icon-container {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1rem;
        box-shadow: 0 10px 25px rgba(102, 126, 234, 0.3);
    }
    
    .form-label {
        color: #e5e7eb;
        font-weight: 500;
        margin-bottom: 0.5rem;
        display: block;
        font-size: 0.95rem;
    }
    
    .success-message {
        background: linear-gradient(135deg, rgba(34, 197, 94, 0.2) 0%, rgba(34, 197, 94, 0.1) 100%);
        border: 1px solid rgba(34, 197, 94, 0.3);
        color: #86efac;
        padding: 1rem;
        border-radius: 12px;
        margin-bottom: 1.5rem;
        backdrop-filter: blur(10px);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }
    
    .contact-info-text {
        color: #d1d5db;
        font-size: 1rem;
        text-align: center;
    }
    
    .contact-info-title {
        color: #f9fafb;
        font-size: 1.2rem;
        font-weight: 600;
        text-align: center;
        margin-bottom: 0.5rem;
    }
    
    .main-title {
        color: #f9fafb;
        font-size: 2.5rem;
        font-weight: 700;
        text-align: center;
        margin-bottom: 1rem;
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
    }
    
    .title-underline {
        width: 100px;
        height: 4px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        margin: 0 auto 3rem;
        border-radius: 2px;
    }
</style>

<div class="main-container">
    <div class="max-w-7xl mx-auto">
        <!-- Header Section -->
        <div class="text-center mb-12">
            <h1 class="main-title">تواصل معنا لأي استفسارات</h1>
            <div class="title-underline"></div>
        </div>

        <div class="flex justify-center">
            <!-- Contact Form Section - Centered -->
            <div class="w-full max-w-xl">
                <div class="glass-card p-8">
                    @if(session('success'))
                        <div class="success-message">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ session('success') }}</span>
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Name Field -->
                            <div>
                                <label class="form-label">الاسم الكامل *</label>
                                <input type="text" name="name" class="form-input" placeholder="أدخل اسمك الكامل" required>
                            </div>

                            <!-- Email Field -->
                            <div>
                                <label class="form-label">البريد الإلكتروني *</label>
                                <input type="email" name="email" class="form-input" placeholder="example@email.com" required>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <!-- Subject Field -->
                            <div>
                                <label class="form-label">الموضوع</label>
                                <input type="text" name="subject" class="form-input" placeholder="موضوع الرسالة">
                            </div>

                            <!-- Phone Field -->
                            <div>
                                <label class="form-label">رقم الهاتف</label>
                                <input type="text" name="phone" class="form-input" placeholder="079 XXXX XXX">
                            </div>
                        </div>

                        <!-- Message Field -->
                        <div>
                            <label class="form-label">الرسالة *</label>
                            <textarea name="message" class="form-textarea" placeholder="اكتب رسالتك هنا..." required></textarea>
                        </div>

                        <!-- Submit Button -->
                        <div class="pt-4">
                            <button type="submit" class="gradient-button">
                                <span>إرسال الرسالة</span>
                                <span>🚀</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>