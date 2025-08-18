@extends('layouts.app')
@section('title', 'Edit Public Profile')

@section('content')
<div class="grid lg:grid-cols-3 gap-8">
  {{-- Form Section --}}
  <div class="lg:col-span-2">
    <div class="card p-8 fade-in">
      {{-- Header --}}
      <div class="text-center mb-8">
        <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl flex items-center justify-center mx-auto mb-4 bounce-in">
          <i data-lucide="user-plus" class="w-8 h-8 text-white"></i>
        </div>
        <h1 class="text-3xl font-bold text-gray-900 mb-2">Edit Your Profile</h1>
        <p class="text-gray-600">Update your digital business card</p>
      </div>

      {{-- Error Display --}}
      @if ($errors->any())
        <div id="errorMsg" class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl shake">
          <div class="flex items-center gap-2 text-red-700 mb-2">
            <i data-lucide="alert-circle" class="w-5 h-5"></i>
            <span class="font-medium">Please fix the following errors:</span>
          </div>
          <ul class="list-disc ml-7 text-red-600 text-sm space-y-1">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      @if(session('success'))
      <div id="successMsg" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-xl bounce-in">
        <div class="flex items-center gap-2 text-green-700">
          <i data-lucide="check-circle" class="w-5 h-5 success-checkmark"></i>
          <span class="font-medium">{{ session('success') }}</span>
        </div>
      </div>
      @endif

      <form method="POST" action="{{ route('profiles.store') }}" enctype="multipart/form-data" class="space-y-8" id="profileForm">
        @csrf
        @method('PATCH')

        {{-- Personal Information Section --}}
        <div class="space-y-6">
          <div class="flex items-center gap-2 mb-4">
            <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
              <i data-lucide="user" class="w-4 h-4 text-blue-600"></i>
            </div>
            <h2 class="text-xl font-semibold text-gray-900">Personal Information</h2>
          </div>
          
          <div class="grid md:grid-cols-2 gap-6">
            <div class="slide-up" style="animation-delay: 0.1s">
              <label class="label">
                Full Name <span class="text-red-500">*</span>
              </label>
              <div class="input-group">
                <i data-lucide="user" class="input-icon w-4 h-4"></i>
                <input name="name" value="{{ old('name', $user->name) }}" class="inp inp-icon" required placeholder="Enter your full name">
              </div>
            </div>
            
            <div class="slide-up" style="animation-delay: 0.2s">
              <label class="label">Company <span class="text-red-500">*</span></label>
              <div class="input-group">
                <i data-lucide="building" class="input-icon w-4 h-4"></i>
                <input name="company" value="{{ old('company', $user->company) }}" class="inp inp-icon" required placeholder="e.g., Logiqon SMC-PVT" pattern="[A-Za-z0-9\s\-&,.]+">
              </div>
              <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                <i data-lucide="info" class="w-3 h-3"></i>
                Allowed: letters, numbers, spaces, and - & , .
              </p>
            </div>
          </div>

          <div class="grid md:grid-cols-2 gap-6">
            <div class="slide-up" style="animation-delay: 0.3s">
              <label class="label">
                Username <span class="text-red-500">*</span>
              </label>
              <div class="input-group">
                <i data-lucide="at-sign" class="input-icon w-4 h-4"></i>
                <input id="username" name="username" value="{{ old('username', $user->username) }}" class="inp inp-icon" required placeholder="e.g., mujeeb">
              </div>
              <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                <i data-lucide="info" class="w-3 h-3"></i>
                Allowed: letters, numbers, <code class="bg-gray-100 px-1 rounded">.</code> <code class="bg-gray-100 px-1 rounded">_</code> <code class="bg-gray-100 px-1 rounded">-</code>
              </p>
            </div>
            
            <div class="slide-up" style="animation-delay: 0.4s">
              <label class="label">Public URL Preview</label>
              <div class="flex items-center gap-2 p-3 bg-gray-50 border-2 border-gray-200 rounded-xl text-sm">
                <i data-lucide="link" class="w-4 h-4 text-gray-400"></i>
                <span class="text-gray-600 truncate">{{ config('app.url') ?? url('/') }}/</span>
                <span id="urlPreview" class="font-medium text-blue-600">{{ old('username', $user->username) }}</span>
              </div>
            </div>
          </div>

          <div class="grid md:grid-cols-2 gap-6">
            <div class="slide-up" style="animation-delay: 0.3s">
              <label class="label">
                Email Address <span class="text-red-500">*</span>
              </label>
              <div class="input-group">
                <i data-lucide="mail" class="input-icon w-4 h-4"></i>
                <input type="email" name="email" value="{{ old('email', $user->email) }}" class="inp inp-icon" required placeholder="name@company.com">
              </div>
            </div>
            
            <div class="slide-up" style="animation-delay: 0.4s">
              <label class="label">Phone Number <span class="text-red-500">*</span></label>
              <div class="input-group">
                <i data-lucide="phone" class="input-icon w-4 h-4"></i>
                <input name="phone" value="{{ old('phone', $user->phone) }}" class="inp inp-icon" required placeholder="+923001234567" pattern="\+[0-9]{10,15}">
              </div>
              <p class="text-xs text-gray-500 mt-2 flex items-center gap-1">
                <i data-lucide="info" class="w-3 h-3"></i>
                Format: + followed by 10-15 digits
              </p>
            </div>
          </div>
        </div>

        {{-- Section Divider --}}
        <div class="section-divider">
          <span>Upload Images</span>
        </div>

        {{-- Image Upload Section --}}
        <div class="grid md:grid-cols-2 gap-6">
          <div class="slide-up" style="animation-delay: 0.6s">
            <label class="label flex items-center gap-2">
              <i data-lucide="image" class="w-4 h-4 text-blue-600"></i>
              Profile Image <span class="text-red-500">*</span>
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/30 transition-all duration-200 cursor-pointer" onclick="document.getElementById('profileInput').click()">
              <input type="file" name="profile_image" accept="image/jpeg,image/png,image/gif" class="hidden" id="profileInput" onchange="previewImg(event,'profilePreview')">
              <div class="w-16 h-16 bg-gray-100 rounded-xl mx-auto mb-3 flex items-center justify-center">
                @if($user->profile_image_path)
                  <img src="{{ Storage::url($user->profile_image_path) }}" class="h-16 w-16 rounded-xl object-cover" alt="Current profile image">
                @else
                  <i data-lucide="upload" class="w-6 h-6 text-gray-400"></i>
                @endif
              </div>
              <p class="text-sm text-gray-600 mb-1">Click to upload profile image</p>
              <p class="text-xs text-gray-500">Recommended: 300x300px, JPG/PNG/GIF, max 5MB</p>
              <div class="mt-4">
                <img id="profilePreview" class="h-20 w-20 rounded-xl object-cover mx-auto hidden" alt="Profile preview">
              </div>
              <p class="text-xs text-red-600 mt-2 hidden" id="profileInputError">Profile image is required</p>
            </div>
          </div>

          <div class="slide-up" style="animation-delay: 0.7s">
            <label class="label flex items-center gap-2">
              <i data-lucide="image" class="w-4 h-4 text-blue-600"></i>
              Cover Image <span class="text-red-500">*</span>
            </label>
            <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/30 transition-all duration-200 cursor-pointer" onclick="document.getElementById('coverInput').click()">
              <input type="file" name="cover_image" accept="image/jpeg,image/png,image/gif" class="hidden" id="coverInput" onchange="previewImg(event,'coverPreview')">
              <div class="w-16 h-16 bg-gray-100 rounded-xl mx-auto mb-3 flex items-center justify-center">
                @if($user->cover_image_path)
                  <img src="{{ Storage::url($user->cover_image_path) }}" class="h-16 w-full max-w-sm rounded-xl object-cover" alt="Current cover image">
                @else
                  <i data-lucide="upload" class="w-6 h-6 text-gray-400"></i>
                @endif
              </div>
              <p class="text-sm text-gray-600 mb-1">Click to upload cover image</p>
              <p class="text-xs text-gray-500">Recommended: 1200x400px, JPG/PNG/GIF, max 5MB</p>
              <div class="mt-4">
                <img id="coverPreview" class="h-24 w-full max-w-sm rounded-xl object-cover mx-auto hidden" alt="Cover preview">
              </div>
              <p class="text-xs text-red-600 mt-2 hidden" id="coverInputError">Cover image is required</p>
            </div>
          </div>
        </div>

        {{-- Section Divider --}}
        <div class="section-divider">
          <span>Wi-Fi Settings</span>
        </div>

        {{-- WiFi Section --}}
        <div class="slide-up" style="animation-delay: 0.8s">
          <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
            <div class="flex items-center gap-2 mb-4">
              <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                <i data-lucide="wifi" class="w-4 h-4 text-blue-600"></i>
              </div>
              <h2 class="text-lg font-semibold text-gray-900">Wi‑Fi Network</h2>
            </div>
            <p class="text-sm text-gray-600 mb-6 flex items-center gap-2">
              <i data-lucide="zap" class="w-4 h-4"></i>
              Allow visitors to connect to your Wi-Fi instantly via QR code
            </p>
            
            <div class="grid md:grid-cols-3 gap-4">
              <div>
                <label class="label">Encryption Type</label>
                <div class="input-group relative">
                  <i data-lucide="shield" class="input-icon w-4 h-4"></i>
                  <select name="wifi_encryption" class="inp inp-icon appearance-none bg-white cursor-pointer pr-10 focus:bg-gray-50 transition-colors">
                    <option value="">Select encryption</option>
                    <option value="WPA" @selected(old('wifi_encryption', $wifi?->data['encryption'] ?? '') === 'WPA')>WPA/WPA2</option>
                    <option value="WEP" @selected(old('wifi_encryption', $wifi?->data['encryption'] ?? '') === 'WEP')>WEP</option>
                    <option value="nopass" @selected(old('wifi_encryption', $wifi?->data['encryption'] ?? '') === 'nopass')>No password</option>
                  </select>
                  <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400 transform transition-transform duration-200"></i>
                  </div>
                </div>
              </div>
              
              <div>
                <label class="label">Network Name (SSID)</label>
                <div class="input-group">
                  <i data-lucide="wifi" class="input-icon w-4 h-4"></i>
                  <input name="wifi_ssid" value="{{ old('wifi_ssid', $wifi?->data['ssid'] ?? '') }}" class="inp inp-icon" placeholder="Your Wi‑Fi name">
                </div>
              </div>
              
              <div>
                <label class="label">Password</label>
                <div class="input-group">
                  <i data-lucide="key" class="input-icon w-4 h-4"></i>
                  <input type="password" name="wifi_password" value="{{ old('wifi_password', $wifi?->data['password'] ?? '') }}" class="inp inp-icon" placeholder="••••••••">
                </div>
              </div>
            </div>
          </div>
        </div>

        {{-- Section Divider for Social Media Links --}}
        <div class="section-divider">
          <span>Social Media Links</span>
        </div>

        {{-- Social Media Section with Dropdown and Dynamic Inputs --}}
        <div class="slide-up" style="animation-delay: 0.9s">
          <div class="bg-gradient-to-r from-blue-50 to-indigo-50 rounded-xl p-6 border border-blue-100">
            <div class="flex items-center gap-2 mb-4">
              <div class="w-8 h-8 bg-blue-100 rounded-lg flex items-center justify-center">
                <i data-lucide="share-2" class="w-4 h-4 text-blue-600"></i>
              </div>
              <h2 class="text-lg font-semibold text-gray-900">Add Social Media</h2>
            </div>
            <p class="text-sm text-gray-600 mb-6 flex items-center gap-2" id="socialError">
              <i data-lucide="info" class="w-4 h-4"></i>
              Select a platform and upload an icon to add its link and title
            </p>

            <div class="space-y-4">
              <div class="input-group relative">
                <i data-lucide="globe" class="input-icon w-4 h-4"></i>
                <select id="socialPlatform" class="inp inp-icon appearance-none bg-white cursor-pointer pr-10 focus:bg-gray-50 transition-colors">
                  <option value="">Select Platform</option>
                  <option value="facebook">Facebook</option>
                  <option value="instagram">Instagram</option>
                  <option value="google">Google</option>
                </select>
                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                  <i data-lucide="chevron-down" class="w-4 h-4 text-gray-400 transform transition-transform duration-200"></i>
                </div>
              </div>
              <button type="button" id="addSocialPlatform" class="btn btn-primary w-full sm:w-auto">
                <i data-lucide="plus" class="w-4 h-4"></i>
                Add Platform
              </button>

              <div id="socialInputsContainer" class="space-y-6">
                @foreach($socials as $index => $social)
                  <div class="social-input-group space-y-6 border-t pt-6 relative" id="social-group-{{ $index }}">
                    <button type="button" class="absolute top-4 right-0 text-red-500 hover:text-red-600" onclick="removeSocialInput({{ $index }})">
                      <i data-lucide="trash-2" class="w-5 h-5"></i>
                    </button>
                    <div>
                      <label class="label">Platform</label>
                      <input type="hidden" name="social_links[{{ $index }}][platform]" value="{{ $social->data['platform'] }}">
                      <div class="input-group">
                        <i data-lucide="globe" class="input-icon w-4 h-4"></i>
                        <input readonly class="inp inp-icon" value="{{ ucfirst($social->data['platform']) }}" disabled>
                      </div>
                    </div>
                    <div>
                      <label class="label flex items-center gap-2">
                        <i data-lucide="image" class="w-4 h-4 text-blue-600"></i>
                        Upload Icon <span class="text-red-500">*</span>
                      </label>
                      <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/30 transition-all duration-200 cursor-pointer" onclick="document.getElementById('socialImageInput{{ $index }}').click()">
                        <input type="file" name="social_links[{{ $index }}][image]" accept="image/jpeg,image/png,image/gif" class="hidden" id="socialImageInput{{ $index }}" onchange="previewSocialImg(event, 'socialPreview{{ $index }})">
                        <div class="w-16 h-16 bg-gray-100 rounded-xl mx-auto mb-3 flex items-center justify-center">
                          @if($social->data['icon_path'])
                            <img src="{{ Storage::url($social->data['icon_path']) }}" class="h-16 w-16 rounded-xl object-cover" alt="Social icon">
                          @else
                            <i data-lucide="upload" class="w-6 h-6 text-gray-400"></i>
                          @endif
                        </div>
                        <p class="text-sm text-gray-600 mb-1">Click to upload icon</p>
                        <p class="text-xs text-gray-500">Recommended: 100x100px, JPG/PNG/GIF, max 5MB</p>
                        <div class="mt-4">
                          <img id="socialPreview{{ $index }}" class="h-16 w-16 rounded-xl object-cover mx-auto hidden" alt="Social preview">
                        </div>
                        <p class="text-xs text-red-600 mt-2 hidden" id="socialImageInputError{{ $index }}">Social media icon is required</p>
                      </div>
                    </div>
                    <div>
                      <label class="label">
                        Title <span class="text-red-500">*</span>
                      </label>
                      <div class="input-group">
                        <i data-lucide="type" class="input-icon w-4 h-4"></i>
                        <input name="social_links[{{ $index }}][title]" value="{{ old('social_links.' . $index . '.title', $social->label) }}" class="inp inp-icon" required placeholder="Enter link title">
                      </div>
                    </div>
                    <div>
                      <label class="label">
                        Link <span class="text-red-500">*</span>
                      </label>
                      <div class="input-group">
                        <i data-lucide="link" class="input-icon w-4 h-4"></i>
                        <input type="url" name="social_links[{{ $index }}][link]" value="{{ old('social_links.' . $index . '.link', $social->data['url']) }}" class="inp inp-icon" required placeholder="Enter URL">
                      </div>
                    </div>
                  </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>

        {{-- Action Buttons --}}
        <div class="flex flex-col sm:flex-row items-center gap-4 pt-6 slide-up" style="animation-delay: 1.0s">
          <button type="submit" class="btn btn-primary w-full sm:w-auto" id="submitBtn">
            <i data-lucide="rocket" class="w-4 h-4"></i>
            <span id="submitText">Update Profile</span>
            <div class="spinner hidden ml-2" id="loadingSpinner"></div>
          </button>
        </div>
      </form>
    </div>
  </div>

  {{-- Tips Sidebar --}}
  <aside class="slide-up" style="animation-delay: 1.1s">
    <div class="card p-6 sticky top-24">
      <div class="flex items-center gap-2 mb-4">
        <div class="w-8 h-8 bg-yellow-100 rounded-lg flex items-center justify-center">
          <i data-lucide="lightbulb" class="w-4 h-4 text-yellow-600"></i>
        </div>
        <h3 class="text-lg font-semibold text-gray-900">Pro Tips</h3>
      </div>
      
      <div class="space-y-4 text-sm">
        <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg border border-blue-100 hover:bg-blue-100/50 transition-colors">
          <i data-lucide="zap" class="w-4 h-4 text-blue-600 mt-0.5 flex-shrink-0"></i>
          <div>
            <p class="font-medium text-blue-900">Short Usernames</p>
            <p class="text-blue-700">Keep it simple and memorable for easy sharing</p>
          </div>
        </div>
        
        <div class="flex items-start gap-3 p-3 bg-green-50 rounded-lg border border-green-100 hover:bg-green-100/50 transition-colors">
          <i data-lucide="image" class="w-4 h-4 text-green-600 mt-0.5 flex-shrink-0"></i>
          <div>
            <p class="font-medium text-green-900">High-Quality Images</p>
            <p class="text-green-700">Use high-contrast images for better visibility</p>
          </div>
        </div>
        
        <div class="flex items-start gap-3 p-3 bg-purple-50 rounded-lg border border-purple-100 hover:bg-purple-100/50 transition-colors">
          <i data-lucide="wifi" class="w-4 h-4 text-purple-600 mt-0.5 flex-shrink-0"></i>
          <div>
            <p class="font-medium text-purple-900">Wi-Fi Integration</p>
            <p class="text-purple-700">Instant connection via QR code scanning</p>
          </div>
        </div>
        
        <div class="flex items-start gap-3 p-3 bg-orange-50 rounded-lg border border-orange-100 hover:bg-orange-100/50 transition-colors">
          <i data-lucide="plus" class="w-4 h-4 text-orange-600 mt-0.5 flex-shrink-0"></i>
          <div>
            <p class="font-medium text-orange-900">Social Links</p>
            <p class="text-orange-700">Add multiple platforms to enhance your profile</p>
          </div>
        </div>
      </div>

      {{-- Quick Stats --}}
      <div class="mt-6 pt-4 border-t border-gray-200">
        <h4 class="text-sm font-medium text-gray-900 mb-3">Why Digital Profiles?</h4>
        <div class="space-y-2 text-xs text-gray-600">
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-green-400 rounded-full"></div>
            <span>Eco-friendly & sustainable</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-blue-400 rounded-full"></div>
            <span>Always up-to-date information</span>
          </div>
          <div class="flex items-center gap-2">
            <div class="w-2 h-2 bg-purple-400 rounded-full"></div>
            <span>Easy sharing via NFC/QR</span>
          </div>
        </div>
      </div>
    </div>
  </aside>
</div>

{{-- Success Modal --}}
@if (session('created_url'))
  <div id="successModal" class="fixed inset-0 z-50 bg-black/50 backdrop-blur-sm flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl p-8 w-full max-w-md bounce-in">
      <div class="text-center">
        <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
          <i data-lucide="check" class="w-8 h-8 text-green-600 success-checkmark"></i>
        </div>
        <h3 class="text-xl font-semibold text-gray-900 mb-2">Profile Updated! 🎉</h3>
        <p class="text-gray-600 mb-6">Your public profile is ready to share</p>
        
        <div class="bg-gray-50 rounded-xl p-4 mb-6">
          <label class="text-sm text-gray-500 mb-2 block">Your Public Link</label>
          <div class="flex gap-2">
            <input id="publicLink" readonly class="inp text-sm" value="{{ session('created_url') }}">
            <button class="btn btn-primary px-3" onclick="copyLink()" title="Copy link">
              <i data-lucide="copy" class="w-4 h-4"></i>
            </button>
          </div>
        </div>
        
        <div class="flex gap-3">
          <a href="{{ session('created_url') }}" target="_blank" class="btn btn-ghost flex-1">
            <i data-lucide="external-link" class="w-4 h-4"></i>
            View Profile
          </a>
          <button class="btn btn-primary flex-1" onclick="closeModal()">
            <i data-lucide="check" class="w-4 h-4"></i>
            Done
          </button>
        </div>
      </div>
    </div>
  </div>
@endif
@endsection

@push('scripts')
<script>
  // Username preview functionality
  const username = document.getElementById('username');
  const urlPreview = document.getElementById('urlPreview');
  if (username && urlPreview) {
    username.addEventListener('input', () => {
      const value = (username.value || '').trim().toLowerCase();
      urlPreview.textContent = value || 'username';
      
      if (value && /^[a-zA-Z0-9._-]+$/.test(value)) {
        urlPreview.classList.add('text-green-600');
        urlPreview.classList.remove('text-blue-600');
        
        const parent = urlPreview.parentElement;
        const existingIcon = parent.querySelector('.success-icon');
        if (!existingIcon) {
          const successIcon = document.createElement('i');
          successIcon.setAttribute('data-lucide', 'check-circle');
          successIcon.className = 'w-4 h-4 text-green-500 success-icon';
          parent.appendChild(successIcon);
          lucide.createIcons();
          
          setTimeout(() => {
            successIcon.remove();
          }, 2000);
        }
      } else {
        urlPreview.classList.add('text-blue-600');
        urlPreview.classList.remove('text-green-600');
      }
    });
  }

  // Enhanced image preview with animations and validation
  function previewImg(e, id) {
    const file = e.target.files?.[0];
    const img = document.getElementById(id);
    if (!img) return;
    
    const errorElement = document.getElementById(`${id.replace('Preview', 'Input')}Error`);
    if (errorElement) errorElement.classList.add('hidden');
    
    if (file) {
      if (file.size > 5 * 1024 * 1024) {
        alert('File size should be less than 5MB');
        e.target.value = '';
        if (errorElement) errorElement.classList.remove('hidden');
        return;
      }
      
      if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
        alert('Please select a valid image file (JPG, PNG, or GIF)');
        e.target.value = '';
        if (errorElement) errorElement.classList.remove('hidden');
        return;
      }
      
      const reader = new FileReader();
      reader.onload = function(event) {
        img.src = event.target.result;
        img.classList.remove('hidden');
        img.classList.add('bounce-in');
        
        const container = img.closest('.border-dashed');
        container.classList.add('border-green-300', 'bg-green-50');
        container.classList.remove('border-gray-300');
        
        setTimeout(() => {
          container.classList.remove('border-green-300', 'bg-green-50');
          container.classList.add('border-gray-300');
        }, 2000);
      };
      reader.readAsDataURL(file);
    } else {
      img.classList.add('hidden');
      img.classList.remove('bounce-in');
    }
  }

  // Social media input functionality
  let socialInputCount = {{ $socials->count() }};

  function addSocialInputs(platform) {
    if (!platform) {
      const error = document.getElementById('socialError');
      error.style.color = 'red';
      error.textContent = 'Please select a platform.';
      return;
    }

    socialInputCount++;
    const container = document.getElementById('socialInputsContainer');
    const platformDiv = document.createElement('div');
    platformDiv.className = 'social-input-group space-y-6 border-t pt-6 relative';
    platformDiv.id = `social-group-${socialInputCount}`;
    
    platformDiv.innerHTML = `
      <button type="button" class="absolute top-4 right-0 text-red-500 hover:text-red-600" onclick="removeSocialInput(${socialInputCount})">
        <i data-lucide="trash-2" class="w-5 h-5"></i>
      </button>
      <div>
        <label class="label">Platform</label>
        <input type="hidden" name="social_links[${socialInputCount}][platform]" value="${platform}">
        <div class="input-group">
          <i data-lucide="globe" class="input-icon w-4 h-4"></i>
          <input readonly class="inp inp-icon" value="${platform.charAt(0).toUpperCase() + platform.slice(1)}" disabled>
        </div>
      </div>
      <div>
        <label class="label flex items-center gap-2">
          <i data-lucide="image" class="w-4 h-4 text-blue-600"></i>
          Upload Icon <span class="text-red-500">*</span>
        </label>
        <div class="border-2 border-dashed border-gray-300 rounded-xl p-6 text-center hover:border-blue-400 hover:bg-blue-50/30 transition-all duration-200 cursor-pointer" onclick="document.getElementById('socialImageInput${socialInputCount}').click()">
          <input type="file" name="social_links[${socialInputCount}][image]" accept="image/jpeg,image/png,image/gif" class="hidden" id="socialImageInput${socialInputCount}" onchange="previewSocialImg(event, 'socialPreview${socialInputCount}')">
          <div class="w-16 h-16 bg-gray-100 rounded-xl mx-auto mb-3 flex items-center justify-center">
            <i data-lucide="upload" class="w-6 h-6 text-gray-400"></i>
          </div>
          <p class="text-sm text-gray-600 mb-1">Click to upload icon</p>
          <p class="text-xs text-gray-500">Recommended: 100x100px, JPG/PNG/GIF, max 5MB</p>
          <div class="mt-4">
            <img id="socialPreview${socialInputCount}" class="h-16 w-16 rounded-xl object-cover mx-auto hidden" alt="Social preview">
          </div>
          <p class="text-xs text-red-600 mt-2 hidden" id="socialImageInputError${socialInputCount}">Social media icon is required</p>
        </div>
      </div>
      <div>
        <label class="label">
          Title <span class="text-red-500">*</span>
        </label>
        <div class="input-group">
          <i data-lucide="type" class="input-icon w-4 h-4"></i>
          <input name="social_links[${socialInputCount}][title]" class="inp inp-icon" required placeholder="Enter link title">
        </div>
      </div>
      <div>
        <label class="label">
          Link <span class="text-red-500">*</span>
        </label>
        <div class="input-group">
          <i data-lucide="link" class="input-icon w-4 h-4"></i>
          <input type="url" name="social_links[${socialInputCount}][link]" class="inp inp-icon" required placeholder="Enter URL">
        </div>
      </div>
    `;
    
    container.appendChild(platformDiv);
    lucide.createIcons();
    platformDiv.classList.add('slide-up');
    setTimeout(() => platformDiv.style.opacity = '1', 10);
  }

  function removeSocialInput(id) {
    const element = document.getElementById(`social-group-${id}`);
    if (element) {
      element.classList.add('fade-out');
      setTimeout(() => element.remove(), 300);
    }
  }

  document.getElementById('addSocialPlatform')?.addEventListener('click', () => {
    const select = document.getElementById('socialPlatform');
    const error = document.getElementById('socialError');
    if (select.value) {
      addSocialInputs(select.value);
      error.style.color = '';
      error.textContent = 'Select a platform and upload an icon to add its link and title';
      select.value = ''; // Reset dropdown
    } else {
      error.style.color = 'red';
      error.textContent = 'Please select a platform.';
    }
  });

  // Preview social media image
  function previewSocialImg(e, id) {
    const file = e.target.files?.[0];
    const img = document.getElementById(id);
    if (!img) return;
    
    const errorElement = document.getElementById(`socialImageInputError${id.replace('socialPreview', '')}`);
    if (errorElement) errorElement.classList.add('hidden');
    
    if (file) {
      if (file.size > 5 * 1024 * 1024) {
        alert('File size should be less than 5MB');
        e.target.value = '';
        if (errorElement) errorElement.classList.remove('hidden');
        return;
      }
      
      if (!['image/jpeg', 'image/png', 'image/gif'].includes(file.type)) {
        alert('Please select a valid image file (JPG, PNG, or GIF)');
        e.target.value = '';
        if (errorElement) errorElement.classList.remove('hidden');
        return;
      }
      
      const reader = new FileReader();
      reader.onload = function(event) {
        img.src = event.target.result;
        img.classList.remove('hidden');
        img.classList.add('bounce-in');
        
        const container = img.closest('.border-dashed');
        container.classList.add('border-green-300', 'bg-green-50');
        container.classList.remove('border-gray-300');
        
        setTimeout(() => {
          container.classList.remove('border-green-300', 'bg-green-50');
          container.classList.add('border-gray-300');
        }, 2000);
      };
      reader.readAsDataURL(file);
    } else {
      img.classList.add('hidden');
      img.classList.remove('bounce-in');
    }
  }

  // Enhanced form submission with loading states and validation
  document.getElementById('profileForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Prevent default submission to handle validation first
    const submitBtn = document.getElementById('submitBtn');
    const submitText = document.getElementById('submitText');
    const spinner = document.getElementById('loadingSpinner');
    const form = this;
    const errorMsgContainer = document.getElementById('errorMsg');
    
    let hasErrors = false;
    const customErrors = [];

    // Validate required text inputs
    const requiredTextFields = form.querySelectorAll('input[required]:not([type="file"]), select[required]');
    requiredTextFields.forEach(field => {
      if (!field.value.trim()) {
        field.classList.add('border-red-300');
        field.parentElement.classList.add('shake');
        hasErrors = true;
        customErrors.push(`${field.name.charAt(0).toUpperCase() + field.name.slice(1)} is required`);
        
        setTimeout(() => {
          field.classList.remove('border-red-300');
          field.parentElement.classList.remove('shake');
        }, 1000);
      } else {
        field.classList.remove('border-red-300');
      }
    });

    // Validate required file inputs (with existing image check)
    const profileInput = form.querySelector('input[name="profile_image"]');
    const profileDropzone = profileInput.parentElement;
    let hasProfileImage = !!profileInput.files?.length;
    if (!hasProfileImage) {
      const existingImg = profileDropzone.querySelector('div.w-16.h-16 img[src]');
      if (existingImg) {
        hasProfileImage = true;
      }
    }
    if (!hasProfileImage) {
      const errorElement = document.getElementById('profileInputError');
      errorElement.classList.remove('hidden');
      profileDropzone.classList.add('border-red-300', 'shake');
      hasErrors = true;
      customErrors.push('Profile image is required');
      
      setTimeout(() => {
        profileDropzone.classList.remove('border-red-300', 'shake');
      }, 1000);
    } else {
      document.getElementById('profileInputError').classList.add('hidden');
      profileDropzone.classList.remove('border-red-300');
    }

    const coverInput = form.querySelector('input[name="cover_image"]');
    const coverDropzone = coverInput.parentElement;
    let hasCoverImage = !!coverInput.files?.length;
    if (!hasCoverImage) {
      const existingImg = coverDropzone.querySelector('div.w-16.h-16 img[src]');
      if (existingImg) {
        hasCoverImage = true;
      }
    }
    if (!hasCoverImage) {
      const errorElement = document.getElementById('coverInputError');
      errorElement.classList.remove('hidden');
      coverDropzone.classList.add('border-red-300', 'shake');
      hasErrors = true;
      customErrors.push('Cover image is required');
      
      setTimeout(() => {
        coverDropzone.classList.remove('border-red-300', 'shake');
      }, 1000);
    } else {
      document.getElementById('coverInputError').classList.add('hidden');
      coverDropzone.classList.remove('border-red-300');
    }

    // Validate social media file inputs (with existing image check)
    const socialFileInputs = form.querySelectorAll('input[name*="social_links"][type="file"]');
    socialFileInputs.forEach(field => {
      const index = field.name.match(/\[(\d+)\]/)?.[1];
      const dropzone = field.parentElement;
      let hasImage = !!field.files?.length;
      if (!hasImage) {
        const existingImg = dropzone.querySelector('div.w-16.h-16 img[src]');
        if (existingImg) {
          hasImage = true;
        }
      }
      if (index && !hasImage) {
        const errorElement = document.getElementById(`socialImageInputError${index}`);
        errorElement.classList.remove('hidden');
        dropzone.classList.add('border-red-300', 'shake');
        hasErrors = true;
        customErrors.push(`Social media icon for ${field.closest('.social-input-group').querySelector('input[readonly]').value} is required`);
        
        setTimeout(() => {
          dropzone.classList.remove('border-red-300', 'shake');
        }, 1000);
      } else if (index) {
        document.getElementById(`socialImageInputError${index}`)?.classList.add('hidden');
        dropzone.classList.remove('border-red-300');
      }
    });

    // Validate company name
    const companyInput = form.querySelector('input[name="company"]');
    if (companyInput && companyInput.value && !/^[A-Za-z0-9\s\-&,.]+$/.test(companyInput.value)) {
      companyInput.classList.add('border-red-300');
      companyInput.parentElement.classList.add('shake');
      hasErrors = true;
      customErrors.push('Company name can only contain letters, numbers, spaces, and - & , .');
      
      setTimeout(() => {
        companyInput.classList.remove('border-red-300');
        companyInput.parentElement.classList.remove('shake');
      }, 1000);
    }

    // Validate phone number
    const phoneInput = form.querySelector('input[name="phone"]');
    if (phoneInput && phoneInput.value && !/^\+[0-9]{10,15}$/.test(phoneInput.value)) {
      phoneInput.classList.add('border-red-300');
      phoneInput.parentElement.classList.add('shake');
      hasErrors = true;
      customErrors.push('Phone number must start with + followed by 10-15 digits.');
      
      setTimeout(() => {
        phoneInput.classList.remove('border-red-300');
        phoneInput.parentElement.classList.remove('shake');
      }, 1000);
    }

    // Display custom errors in the error message container
    if (hasErrors && customErrors.length > 0) {
      if (errorMsgContainer) {
        errorMsgContainer.classList.remove('hidden');
        const errorList = errorMsgContainer.querySelector('ul');
        errorList.innerHTML = '';
        customErrors.forEach(error => {
          const li = document.createElement('li');
          li.textContent = error;
          errorList.appendChild(li);
        });
      } else {
        const newErrorMsg = document.createElement('div');
        newErrorMsg.id = 'errorMsg';
        newErrorMsg.className = 'mb-6 p-4 bg-red-50 border border-red-200 rounded-xl shake';
        newErrorMsg.innerHTML = `
          <div class="flex items-center gap-2 text-red-700 mb-2">
            <i data-lucide="alert-circle" class="w-5 h-5"></i>
            <span class="font-medium">Please fix the following errors:</span>
          </div>
          <ul class="list-disc ml-7 text-red-600 text-sm space-y-1">
            ${customErrors.map(error => `<li>${error}</li>`).join('')}
          </ul>
        `;
        form.prepend(newErrorMsg);
        lucide.createIcons();
      }
      return;
    }
    
    // If no errors, proceed with form submission
    submitBtn.disabled = true;
    submitText.textContent = 'Updating Profile...';
    spinner.classList.remove('hidden');
    submitBtn.classList.add('opacity-75');
    
    let progress = 0;
    const progressInterval = setInterval(() => {
      progress += 1;
      if (progress <= 100) {
        submitText.textContent = `Updating Profile... ${progress}%`;
      }
    }, 50);
    
    setTimeout(() => {
      clearInterval(progressInterval);
      form.submit(); // Manually submit the form
    }, 5000);
  });

  // Copy link functionality
  function copyLink() {
    const linkInput = document.getElementById('publicLink');
    const copyButton = linkInput.nextElementSibling;
    
    if (navigator.clipboard && navigator.clipboard.writeText) {
      navigator.clipboard.writeText(linkInput.value).then(() => {
        showCopySuccess(copyButton);
      }).catch(() => {
        fallbackCopy(linkInput, copyButton);
      });
    } else {
      fallbackCopy(linkInput, copyButton);
    }
  }

  function fallbackCopy(input, button) {
    input.select();
    input.setSelectionRange(0, 99999);
    document.execCommand('copy');
    showCopySuccess(button);
  }

  function showCopySuccess(button) {
    const originalContent = button.innerHTML;
    button.innerHTML = '<i data-lucide="check" class="w-4 h-4"></i>';
    button.classList.add('bg-green-500', 'hover:bg-green-600');
    button.classList.remove('btn-primary');
    
    lucide.createIcons();
    
    setTimeout(() => {
      button.innerHTML = originalContent;
      button.classList.remove('bg-green-500', 'hover:bg-green-600');
      button.classList.add('btn-primary');
      lucide.createIcons();
    }, 2000);
  }

  // Close modal functionality
  function closeModal() {
    const modal = document.getElementById('successModal');
    if (modal) {
      modal.classList.add('opacity-0');
      setTimeout(() => {
        modal.remove();
      }, 300);
    }
  }

  @if(session('created_url'))
    setTimeout(() => {
      const modal = document.getElementById('successModal');
      if (modal && modal.classList.contains('fixed')) {
        closeModal();
      }
    }, 30000);
  @endif

  // Real-time validation
  document.addEventListener('input', function(e) {
    const target = e.target;
    
    if (target.hasAttribute('required') && target.value.trim()) {
      target.classList.remove('border-red-300');
      target.classList.add('border-green-300');
      
      setTimeout(() => {
        target.classList.remove('border-green-300');
      }, 1000);
    }

    // Real-time company name validation
    if (target.name === 'company' && target.value) {
      if (!/^[A-Za-z0-9\s\-&,.]+$/.test(target.value)) {
        target.classList.add('border-red-300');
      } else {
        target.classList.remove('border-red-300');
        target.classList.add('border-green-300');
        setTimeout(() => target.classList.remove('border-green-300'), 1000);
      }
    }

    // Real-time phone number validation
    if (target.name === 'phone' && target.value) {
      if (!/^\+[0-9]{10,15}$/.test(target.value)) {
        target.classList.add('border-red-300');
      } else {
        target.classList.remove('border-red-300');
        target.classList.add('border-green-300');
        setTimeout(() => target.classList.remove('border-green-300'), 1000);
      }
    }
  });

  // Enhanced file drag and drop
  document.querySelectorAll('.border-dashed').forEach(dropZone => {
    dropZone.addEventListener('dragover', function(e) {
      e.preventDefault();
      this.classList.add('border-blue-400', 'bg-blue-50');
    });
    
    dropZone.addEventListener('dragleave', function(e) {
      e.preventDefault();
      this.classList.remove('border-blue-400', 'bg-blue-50');
    });
    
    dropZone.addEventListener('drop', function(e) {
      e.preventDefault();
      this.classList.remove('border-blue-400', 'bg-blue-50');
      
      const files = e.dataTransfer.files;
      if (files.length > 0) {
        const input = this.querySelector('input[type="file"]');
        input.files = files;
        
        const event = new Event('change', { bubbles: true });
        input.dispatchEvent(event);
      }
    });
  });

  // Enhanced interactions
  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.inp').forEach(input => {
      input.addEventListener('focus', function() {
        this.parentElement.classList.add('scale-105');
      });
      
      input.addEventListener('blur', function() {
        this.parentElement.classList.remove('scale-105');
      });
    });
    
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('fade-in');
        }
      });
    }, observerOptions);
    
    document.querySelectorAll('.slide-up').forEach(el => {
      observer.observe(el);
    });
  });
</script>
@endpush