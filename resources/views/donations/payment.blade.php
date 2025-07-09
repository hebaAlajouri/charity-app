<x-app-layout>
    <div class="max-w-xl mx-auto p-6 bg-white rounded shadow mt-10">
        <h1 class="text-2xl font-bold mb-6 text-center">اختيار طريقة الدفع</h1>

        <p class="mb-6 text-center text-gray-700">
            المبلغ: <strong>{{ number_format($donation->amount, 2) }} د.أ</strong>
        </p>

        <form method="POST" action="{{ route('donations.processPayment', [$project, $donation]) }}">
            @csrf

            <div class="space-y-4 mb-6">
                <label class="block cursor-pointer">
                    <input type="radio" name="payment_type" value="visa" required class="mr-2" />
                    فيزا / ماستر كارد
                </label>
                <label class="block cursor-pointer">
                    <input type="radio" name="payment_type" value="paypal" required class="mr-2" />
                    PayPal
                </label>
                <label class="block cursor-pointer">
                    <input type="radio" name="payment_type" value="efawateercom" required class="mr-2" />
                    الفواتير الإلكترونية (eFAWATEERcom)
                </label>
                <label class="block cursor-pointer">
                    <input type="radio" name="payment_type" value="apple_pay" required class="mr-2" />
                    Apple Pay
                </label>
                <label class="block cursor-pointer">
                    <input type="radio" name="payment_type" value="google_pay" required class="mr-2" />
                    Google Pay
                </label>
            </div>

            <p class="text-sm text-gray-600 mb-6 text-center">
                <span class="font-semibold">🔒</span> عملية الدفع آمنة ومشفرة.<br />
                لن يتم خصم المبلغ حتى تؤكد العملية.
            </p>

            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded font-semibold hover:bg-green-700 w-full">
                تأكيد والدفع
            </button>
        </form>
    </div>
</x-app-layout>
