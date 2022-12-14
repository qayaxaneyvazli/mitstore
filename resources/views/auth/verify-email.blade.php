<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Qeydiyyatdan keçdiyiniz üçün təşəkkürlər. Təsdiqlənmək üçün mailinizə yolladığımız linkə klikləyin. Email gəlməyibsə yenidən təsdiqləmə linki göndərə klikləyin') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('Emailinizə təsdiq linki göndərildi.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-jet-button type="submit">
                        {{ __('Yenidən təsdiqləmə linki göndər') }}
                    </x-jet-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Çıxış') }}
                </button>
            </form>
        </div>
    </x-jet-authentication-card>
</x-guest-layout>
