@extends('layouts.app')
@section('title', ($profile->name ?? '@' . $profile->username) . ' — Profile')

@section('content')
    <div class="card fade-in h-[750px] bg-[#F6F6F6] max-w-[900px] mx-auto">
        {{-- Cover Image --}}
        <div class="relative h-48 sm:h-64 bg-gray-200">
            @if ($profile->cover_image_path)
                <img src="{{ asset('uploads/' . $profile->cover_image_path) }}" alt="Cover"
                    class="h-full w-full object-cover">
            @endif
        </div>

        <div class="px-6 sm:px-8 pt-16 pb-8">
            <div class="flex flex-wrap md:flex-row md:items-start gap-6 flex-col ">
                <div class="bg-grey-50 flex flex-col items-center p-4 rounded-2xl bg-white mt-[-150px] z-10 shadow-md">
                    <div class="h-20 w-20 sm:h-32 sm:w-32 rounded-2xl bg-grey-500 bounce-in mb-4 mt-4">
                        @if ($profile->profile_image_path)
                            <img src="{{ asset('uploads/' . $profile->profile_image_path) }}" alt="Avatar"
                                class="h-full w-full overflow-hidden object-cover rounded-full">
                        @endif
                    </div>
                    <div class="min-w-[240px] slide-up">
                        <h1 class="text-2xl font-normal tracking-tight text-black flex items-center justify-center gap-2">
                            {{ $profile->name }}</h1>
                        <h4 class="text-gray-600 text-lg mt-1 flex items-center justify-center gap-2">
                            <i data-lucide="at-sign" class="w-5 h-5 text-gray-500"></i>{{ $profile->username }}
                        </h4>

                        @if ($profile->company)
                            <h4 class="text-gray-700 mt-2 font-medium flex items-center justify-center gap-2">
                                {{ $profile->company }}</h4>
                        @endif
                        @if ($profile->email)
                            <h4 class="text-gray-600 text-md mt-1 flex items-center justify-center gap-2">
                                {{ $profile->email }}</h4>
                        @endif
                        @if ($profile->phone)
                            <h4 class="text-gray-600 text-md mt-1 flex items-center justify-center gap-2">
                                {{ $profile->phone }}</h4>
                        @endif

                        <!-- Buttons for Email and Phone -->
                        <div class="mt-4 flex gap-4 justify-center">
                            @if ($profile->email)
                                <a href="mailto:{{ $profile->email }}" class="btn btn-primary flex items-center gap-2">
                                    <i data-lucide="mail" class="w-4 h-4"></i> Email
                                </a>
                            @endif
                            @if ($profile->phone)
                                <a href="tel:{{ preg_replace('/\D/', '', $profile->phone) }}"
                                    class="btn btn-ghost flex items-center gap-2">
                                    <i data-lucide="phone" class="w-4 h-4"></i> Call
                                </a>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="flex flex-col flex-wrap justify-center items-center gap-4">
                    <div>
                        <h1 class="text-2xl font-normal tracking-tight text-black">Links</h1>
                    </div>
                    <div class="flex flex-wrap gap-4">
                        @if ($wifi)
                            <div class="relative group cursor-pointer" onclick="openWifi()">
                                <i data-lucide="wifi"
                                    class="h-24 w-24 p-2 rounded-xl bg-white border border-gray-200 hover:bg-blue-50 hover:border-blue-300 transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg"></i>
                                <span
                                    class="absolute -top-2 -right-2 bg-blue-500 text-white text-xs font-semibold rounded-full px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">Wi-Fi</span>
                            </div>
                        @endif
                        @foreach ($socials as $social)
                            @php
                                $platform = $social->data['platform'] ?? '';
                                $iconPath = ''; 

                                $defaultIconPlatforms = ['facebook', 'instagram', 'google'];

                                if (in_array($platform, $defaultIconPlatforms)) {
                                    $iconPath = asset(  $platform . '.png');
                                } else {
                                    if (!empty($social->data['icon_path'])) {
                                        $iconPath = asset('uploads/' . $social->data['icon_path']);
                                    }
                                }

                                $colors = [
                                    'facebook' => ['hover:bg-blue-50', 'hover:border-blue-300', 'bg-blue-600'],
                                    'instagram' => ['hover:bg-pink-50', 'hover:border-pink-300', 'bg-pink-500'],
                                    'google' => ['hover:bg-red-50', 'hover:border-red-300', 'bg-red-500'],
                                ];

                                $hoverBg = $colors[$platform][0] ?? 'hover:bg-gray-100';
                                $hoverBorder = $colors[$platform][1] ?? 'hover:border-gray-300';
                                $badgeBg = $colors[$platform][2] ?? 'bg-gray-500';
                            @endphp

                            <a href="{{ $social->data['url'] ?? '#' }}" target="_blank" class="relative group">
                                <img src="{{ $iconPath }}" alt="{{ ucfirst($platform) }}"
                                    class="h-24 w-24 p-2 rounded-xl bg-white border border-gray-200 {{ $hoverBg }} {{ $hoverBorder }} transition-all duration-300 group-hover:scale-110 group-hover:shadow-lg">
                                <span
                                    class="absolute -top-2 -right-2 {{ $badgeBg }} text-white text-xs font-semibold rounded-full px-2 py-1 opacity-0 group-hover:opacity-100 transition-opacity duration-300">{{ ucfirst($platform) }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Footer Text -->
            <div class="mt-12 text-center text-gray-600 text-sm border-t border-gray-200 pt-4">
                <p> To purchase MalaWi-Fi please visit our <a href="https://malawi-fi.com" target="_blank"
                        class="text-blue-500 hover:underline">website</a></p>
                Tap. Connect. Done
            </div>
        </div>
    </div>

    {{-- Wi-Fi QR Modal --}}
    @if ($wifi)
        <div id="wifiModal"
            class="fixed inset-0 z-50 hidden items-center justify-center bg-black/50 backdrop-blur-sm p-4 transition-opacity duration-500 opacity-0">
            <div class="card w-full items-center max-w-md p-8 slide-up">
                <div class="flex items-center gap-4">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Scan QR code to connect to WiFi</h3>
                </div>

                <div class="mb-6 flex items-center justify-center gap-4">
                    <img id="wifiQrImage" src="{{ route('profiles.wifiQr', $profile) }}" alt="Wi-Fi QR"
                        class="mx-auto rounded-2xl border border-gray-200 shadow-lg w-48 h-48">
                </div>

                <div class="text-gray-700 text-sm space-y-1 flex items-center justify-between">
                    <p>SSID: <strong>{{ $wifi->data['ssid'] ?? '' }}</strong></p>
                    @if (($wifi->data['encryption'] ?? 'nopass') !== 'nopass')
                        <p>Security: <strong>{{ $wifi->data['encryption'] }}</strong></p>
                    @endif
                </div>
                <h1 class="font-bold text-sm mt-2 items-center">Note iPhone users</h1>
                <p class="text-sm items-center">To connect to WiFi, press and hold QR code for 2 sec. and select from pop-up
                    menu.</p>
                <h1 class="font-bold text-sm mt-2 items-center">Note Android users</h1>
                <p class="text-sm items-center">QR code can be downloaded and saved to connect with WiFi.</p>
                <div class="flex gap-3">
                    <a class="btn btn-ghost flex-1" onclick="downloadQrCode()">
                        <i data-lucide="download" class="w-4 h-4"></i> QR Code
                    </a>
                    <button class="btn btn-primary flex-1" onclick="closeWifi()">
                        <i data-lucide="cross" class="w-4 h-4"></i>
                        Close
                    </button>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        function openWifi() {
            const modal = document.getElementById('wifiModal');
            if (modal) {
                modal.classList.remove('hidden', 'opacity-0');
                modal.classList.add('flex');
                setTimeout(() => modal.style.opacity = '1', 10);
            }
        }

        function closeWifi() {
            const modal = document.getElementById('wifiModal');
            if (modal) {
                modal.style.opacity = '0';
                setTimeout(() => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                }, 500);
            }
        }

        function downloadQrCode() {
            const qrImage = document.getElementById('wifiQrImage');
            const canvas = document.createElement('canvas');
            const context = canvas.getContext('2d');
            canvas.width = qrImage.naturalWidth;
            canvas.height = qrImage.naturalHeight;

            // Draw the image onto the canvas
            context.drawImage(qrImage, 0, 0);

            // Create a download link
            const link = document.createElement('a');
            link.href = canvas.toDataURL('image/png');
            link.download = 'wifi-qr-code.png';
            link.click();
        }

        // Initialize animations on page load
        document.addEventListener('DOMContentLoaded', () => {
            const elements = document.querySelectorAll('.fade-in, .slide-up, .bounce-in');
            elements.forEach((el, index) => {
                setTimeout(() => {
                    el.style.opacity = '1';
                    el.style.transform = 'none';
                }, index * 100);
            });
        });
    </script>
@endpush
