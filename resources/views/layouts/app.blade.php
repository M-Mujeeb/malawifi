<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>@yield('title','NFC Public Profile')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  
  {{-- Load compiled Tailwind CSS via Vite --}}
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  
  {{-- Lucide Icons --}}
  <script src="https://unpkg.com/lucide@latest/dist/umd/lucide.js"></script>

  {{-- Favicon --}}
  <link rel="icon" href="{{ asset('favicon.ico') }}">
  
  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
  
  <style>
    * { font-family: 'Poppins', sans-serif; }
    
    /* Enhanced animations */
    .fade-in { animation: fadeIn 0.6s ease-out; }
    .slide-up { animation: slideUp 0.5s ease-out; }
    .bounce-in { animation: bounceIn 0.7s ease-out; }
    .pulse-soft { animation: pulseSoft 2s infinite; }
    .shake { animation: shake 0.5s ease-in-out; }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes slideUp {
      from { opacity: 0; transform: translateY(30px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes bounceIn {
      0% { opacity: 0; transform: scale(0.3); }
      50% { opacity: 1; transform: scale(1.05); }
      70% { transform: scale(0.9); }
      100% { opacity: 1; transform: scale(1); }
    }
    
    @keyframes pulseSoft {
      0%, 100% { opacity: 1; }
      50% { opacity: 0.7; }
    }
    
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    
    /* Loading spinner */
    .spinner {
      border: 3px solid #f3f4f6;
      border-top: 3px solid #3b82f6;
      border-radius: 50%;
      width: 20px;
      height: 20px;
      animation: spin 1s linear infinite;
    }
    
    @keyframes spin {
      0% { transform: rotate(0deg); }
      100% { transform: rotate(360deg); }
    }
    
    /* Custom component styles */
    .card { 
      background: linear-gradient(135deg, #ffffff 0%, #f8fafc 100%);
      border: 1px solid #e2e8f0;
      border-radius: 20px; 
      box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
      transition: all 0.3s ease;
    }
    
    .card:hover { 
      box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
      transform: translateY(-2px);
    }
    
    .btn { 
      display: inline-flex; 
      align-items: center; 
      justify-content: center; 
      gap: 8px; 
      border-radius: 12px; 
      padding: 12px 24px; 
      font-weight: 500; 
      font-size: 14px;
      transition: all 0.2s ease;
      position: relative;
      overflow: hidden;
      border: none;
      cursor: pointer;
    }
    
    .btn::before {
      content: '';
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
      transition: left 0.5s;
    }
    
    .btn:hover::before {
      left: 100%;
    }
    
    .btn-primary { 
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      color: white; 
    }
    .btn-primary:hover { 
      background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
      transform: translateY(-1px);
      box-shadow: 0 10px 20px rgba(59, 130, 246, 0.3);
    }
    .btn-primary:active { transform: translateY(0); }
    .btn-primary:disabled {
      opacity: 0.6;
      cursor: not-allowed;
      transform: none;
    }
    
    .btn-ghost { 
      background: #f8fafc; 
      color: #64748b;
      border: 1px solid #e2e8f0;
    }
    .btn-ghost:hover { 
      background: #f1f5f9;
      color: #475569;
      border-color: #cbd5e1;
    }
    
    .inp { 
      width: 100%; 
      border-radius: 12px; 
      border: 2px solid #e2e8f0; 
      padding: 12px 16px; 
      font-size: 14px;
      transition: all 0.2s ease;
      background: #ffffff;
    }
    .inp:focus { 
      outline: none; 
      border-color: #3b82f6;
      box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
      background: #fefefe;
    }
    .inp:hover { border-color: #cbd5e1; }
    
    .inp-icon {
      padding-left: 40px;
    }
    
    
    .label { 
      display: block; 
      font-size: 14px; 
      font-weight: 500; 
      color: #374151; 
      margin-bottom: 6px;
    }
    
    .input-group {
      position: relative;
    }
    
    .input-icon {
      position: absolute;
      left: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #9ca3af;
      z-index: 10;
      pointer-events: none;
    }
    
    .success-checkmark {
      color: #10b981;
      animation: checkmark 0.5s ease-in-out;
    }
    
    @keyframes checkmark {
      0% { transform: scale(0); }
      50% { transform: scale(1.2); }
      100% { transform: scale(1); }
    }
    
    .gradient-bg {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }
    
    
    .section-divider {
      position: relative;
      text-align: center;
      margin: 32px 0;
    }
    
    .section-divider::before {
      content: '';
      position: absolute;
      top: 50%;
      left: 0;
      right: 0;
      height: 1px;
      background: linear-gradient(90deg, transparent, #2869be, transparent);
    }
    
    .section-divider span {
      background: #FEFFFF;
      padding: 0 16px;
      font-size: 14px;
      font-weight: 500;
      position: relative;
      border-radius: 5px
    }
    
    /* Header enhancements */
    .header-blur {
      backdrop-filter: blur(12px);
      -webkit-backdrop-filter: blur(12px);
    }
  </style>
  
  @stack('head')
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-50 min-h-screen text-gray-900">
  <header class="border-b border-white/20 bg-white/80 header-blur sticky top-0 z-40">
    <div class="max-w-6xl mx-auto px-2 py-2 flex items-center gap-4">
        <a href="/" class="">
           <img src="{{ asset('logo.png') }}" alt="Logo"  class="h-10 w-auto block object-contain">
        </a>

        <div class="ml-auto flex items-center gap-2 text-sm text-gray-500">
            <i data-lucide="zap" class="w-4 h-4"></i>
            <span>NFC Public Business Profile</span>
        </div>

        {{-- Show logout button if logged in --}}
        @if(Auth::check())
            <form action="{{ route('profiles.logout') }}" method="POST" class="ml-4">
                @csrf
                <button type="submit"
                    class="btn btn-ghost text-sm px-4 py-2 rounded-lg hover:bg-red-50 hover:text-red-600 border border-red-200 transition">
                    <i data-lucide="log-out" class="w-4 h-4"></i> Logout
                </button>
            </form>
        @endif
    </div>
</header>


  <main class="max-w-6xl mx-auto px-4 py-8">
    @yield('content')
  </main>

  {{-- Global loading overlay --}}
  <div id="globalLoader" class="fixed inset-0 bg-white/80 backdrop-blur-sm z-50 flex items-center justify-center hidden">
    <div class="text-center">
      <div class="spinner mx-auto mb-4" style="width: 40px; height: 40px; border-width: 4px;"></div>
      <p class="text-gray-600 font-medium">Loading...</p>
    </div>
  </div>

  <script>
    // Initialize Lucide icons when DOM is loaded
    document.addEventListener('DOMContentLoaded', function() {
      if (typeof lucide !== 'undefined') {
        lucide.createIcons();
      }
    });

    // Global loading functions
    function showGlobalLoader() {
      document.getElementById('globalLoader')?.classList.remove('hidden');
    }

    function hideGlobalLoader() {
      document.getElementById('globalLoader')?.classList.add('hidden');
    }

    // Auto-hide loader after page load
    window.addEventListener('load', function() {
      setTimeout(hideGlobalLoader, 500);
    });

    document.addEventListener('DOMContentLoaded', function() {
        const errorAlert = document.getElementById('errorMsg');
        const successAlert = document.getElementById('successMsg');

        [errorAlert, successAlert].forEach(alert => {
            if (alert) {
                setTimeout(() => {
                    alert.classList.add('opacity-0', 'transition', 'duration-500');
                    setTimeout(() => alert.remove(), 500); // Remove from DOM after fade-out
                }, 4000); // 4 seconds before hiding
            }
        });
    });

  </script>

  @stack('scripts')
</body>
</html>