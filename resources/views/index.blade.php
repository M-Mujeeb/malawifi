<!DOCYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DirectRaabta - Connect with Your Favorite Celebrities</title>
    <link rel="icon" type="image/png" href="{{ asset('favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon.svg') }}"/>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180"  href="{{ asset('apple-touch-icon.pngo') }}"  />
    <link rel="manifest" href="/site.webmanifest" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&amp;display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #0a0a0a;
            color: #ffffff;
            overflow-x: hidden;
        }
        
        .gradient-text {
            background: linear-gradient(90deg, #ff3a88 0%, #ff7f45 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }
        
        .gradient-border {
            position: relative;
            border-radius: 12px;
            background: linear-gradient(to right, #ff3a88, #ff7f45);
            padding: 1px;
        }
        
        .gradient-border-content {
            background: #151515;
            border-radius: 11px;
            height: 100%;
            width: 100%;
        }
        
        .pulse {
            animation: pulse 2s infinite;
            display: inline-block;
        }
        
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.05);
                opacity: 0.8;
            }
            100% {
                transform: scale(1);
                opacity: 1;
            }
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-15px); }
            100% { transform: translateY(0px); }
        }
        
        .wave {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100px;
            background: url('data:image/svg+xml;utf8,<svg viewBox="0 0 1440 320" xmlns="http://www.w3.org/2000/svg"><path fill="%23151515" fill-opacity="1" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>');
            background-size: cover;
            background-repeat: no-repeat;
            z-index: -1;
        }
        
        .star {
            position: absolute;
            background-color: white;
            border-radius: 50%;
            animation: twinkle 2s infinite;
            z-index: -1;
        }
        
        @keyframes twinkle {
            0% { opacity: 0.2; }
            50% { opacity: 0.8; }
            100% { opacity: 0.2; }
        }
    </style>
<style>*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: ;--tw-contain-size: ;--tw-contain-layout: ;--tw-contain-paint: ;--tw-contain-style: }/* ! tailwindcss v3.4.16 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:ui-sans-serif, system-ui, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;letter-spacing:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}button,input:where([type=button]),input:where([type=reset]),input:where([type=submit]){-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]:where(:not([hidden=until-found])){display:none}.container{width:100%}@media (min-width: 640px){.container{max-width:640px}}@media (min-width: 768px){.container{max-width:768px}}@media (min-width: 1024px){.container{max-width:1024px}}@media (min-width: 1280px){.container{max-width:1280px}}@media (min-width: 1536px){.container{max-width:1536px}}.fixed{position:fixed}.absolute{position:absolute}.relative{position:relative}.inset-0{inset:0px}.-bottom-10{bottom:-2.5rem}.-left-10{left:-2.5rem}.-right-10{right:-2.5rem}.-top-10{top:-2.5rem}.right-6{right:1.5rem}.top-6{top:1.5rem}.z-0{z-index:0}.z-10{z-index:10}.z-50{z-index:50}.mx-4{margin-left:1rem;margin-right:1rem}.mx-auto{margin-left:auto;margin-right:auto}.mb-10{margin-bottom:2.5rem}.mb-12{margin-bottom:3rem}.mb-2{margin-bottom:0.5rem}.mb-4{margin-bottom:1rem}.mb-6{margin-bottom:1.5rem}.mb-8{margin-bottom:2rem}.mr-2{margin-right:0.5rem}.mr-3{margin-right:0.75rem}.mt-16{margin-top:4rem}.mt-2{margin-top:0.5rem}.mt-3{margin-top:0.75rem}.inline-block{display:inline-block}.flex{display:flex}.grid{display:grid}.hidden{display:none}.h-10{height:2.5rem}.h-16{height:4rem}.h-20{height:5rem}.h-8{height:2rem}.h-auto{height:auto}.min-h-screen{min-height:100vh}.w-10{width:2.5rem}.w-16{width:4rem}.w-20{width:5rem}.w-8{width:2rem}.w-full{width:100%}.max-w-2xl{max-width:42rem}.max-w-lg{max-width:32rem}.max-w-md{max-width:28rem}.flex-shrink-0{flex-shrink:0}.flex-grow{flex-grow:1}.grid-cols-1{grid-template-columns:repeat(1, minmax(0, 1fr))}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.flex-wrap{flex-wrap:wrap}.items-start{align-items:flex-start}.items-center{align-items:center}.justify-center{justify-content:center}.justify-between{justify-content:space-between}.gap-4{gap:1rem}.gap-8{gap:2rem}.-space-x-2 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(-0.5rem * var(--tw-space-x-reverse));margin-left:calc(-0.5rem * calc(1 - var(--tw-space-x-reverse)))}.space-x-4 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1rem * var(--tw-space-x-reverse));margin-left:calc(1rem * calc(1 - var(--tw-space-x-reverse)))}.space-x-6 > :not([hidden]) ~ :not([hidden]){--tw-space-x-reverse:0;margin-right:calc(1.5rem * var(--tw-space-x-reverse));margin-left:calc(1.5rem * calc(1 - var(--tw-space-x-reverse)))}.space-y-4 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(1rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(1rem * var(--tw-space-y-reverse))}.space-y-8 > :not([hidden]) ~ :not([hidden]){--tw-space-y-reverse:0;margin-top:calc(2rem * calc(1 - var(--tw-space-y-reverse)));margin-bottom:calc(2rem * var(--tw-space-y-reverse))}.overflow-hidden{overflow:hidden}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-xl{border-radius:0.75rem}.border{border-width:1px}.border-gray-700{--tw-border-opacity:1;border-color:rgb(55 65 81 / var(--tw-border-opacity, 1))}.bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity, 1))}.bg-gray-800{--tw-bg-opacity:1;background-color:rgb(31 41 55 / var(--tw-bg-opacity, 1))}.bg-gray-900{--tw-bg-opacity:1;background-color:rgb(17 24 39 / var(--tw-bg-opacity, 1))}.bg-orange-500{--tw-bg-opacity:1;background-color:rgb(249 115 22 / var(--tw-bg-opacity, 1))}.bg-pink-500{--tw-bg-opacity:1;background-color:rgb(236 72 153 / var(--tw-bg-opacity, 1))}.bg-opacity-40{--tw-bg-opacity:0.4}.bg-opacity-60{--tw-bg-opacity:0.6}.bg-opacity-80{--tw-bg-opacity:0.8}.bg-opacity-95{--tw-bg-opacity:0.95}.bg-gradient-to-r{background-image:linear-gradient(to right, var(--tw-gradient-stops))}.from-green-500{--tw-gradient-from:#22c55e var(--tw-gradient-from-position);--tw-gradient-to:rgb(34 197 94 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-pink-500{--tw-gradient-from:#ec4899 var(--tw-gradient-from-position);--tw-gradient-to:rgb(236 72 153 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.from-purple-500{--tw-gradient-from:#a855f7 var(--tw-gradient-from-position);--tw-gradient-to:rgb(168 85 247 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.to-blue-500{--tw-gradient-to:#3b82f6 var(--tw-gradient-to-position)}.to-orange-500{--tw-gradient-to:#f97316 var(--tw-gradient-to-position)}.to-red-500{--tw-gradient-to:#ef4444 var(--tw-gradient-to-position)}.to-teal-500{--tw-gradient-to:#14b8a6 var(--tw-gradient-to-position)}.p-4{padding:1rem}.p-6{padding:1.5rem}.p-8{padding:2rem}.px-4{padding-left:1rem;padding-right:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.px-8{padding-left:2rem;padding-right:2rem}.py-12{padding-top:3rem;padding-bottom:3rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-3{padding-top:0.75rem;padding-bottom:0.75rem}.py-6{padding-top:1.5rem;padding-bottom:1.5rem}.py-8{padding-top:2rem;padding-bottom:2rem}.text-left{text-align:left}.text-center{text-align:center}.text-2xl{font-size:1.5rem;line-height:2rem}.text-3xl{font-size:1.875rem;line-height:2.25rem}.text-4xl{font-size:2.25rem;line-height:2.5rem}.text-5xl{font-size:3rem;line-height:1}.text-lg{font-size:1.125rem;line-height:1.75rem}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-xl{font-size:1.25rem;line-height:1.75rem}.text-xs{font-size:0.75rem;line-height:1rem}.font-bold{font-weight:700}.font-medium{font-weight:500}.font-semibold{font-weight:600}.text-gray-300{--tw-text-opacity:1;color:rgb(209 213 219 / var(--tw-text-opacity, 1))}.text-gray-400{--tw-text-opacity:1;color:rgb(156 163 175 / var(--tw-text-opacity, 1))}.text-gray-500{--tw-text-opacity:1;color:rgb(107 114 128 / var(--tw-text-opacity, 1))}.text-pink-500{--tw-text-opacity:1;color:rgb(236 72 153 / var(--tw-text-opacity, 1))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.opacity-20{opacity:0.2}.blur-3xl{--tw-blur:blur(64px);filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.filter{filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition-colors{transition-property:color, background-color, border-color, fill, stroke, -webkit-text-decoration-color;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, -webkit-text-decoration-color;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.transition-transform{transition-property:transform;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.hover\:scale-105:hover{--tw-scale-x:1.05;--tw-scale-y:1.05;transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.hover\:transform:hover{transform:translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y))}.hover\:bg-gray-700:hover{--tw-bg-opacity:1;background-color:rgb(55 65 81 / var(--tw-bg-opacity, 1))}.hover\:from-pink-600:hover{--tw-gradient-from:#db2777 var(--tw-gradient-from-position);--tw-gradient-to:rgb(219 39 119 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.hover\:to-orange-600:hover{--tw-gradient-to:#ea580c var(--tw-gradient-to-position)}.hover\:text-pink-400:hover{--tw-text-opacity:1;color:rgb(244 114 182 / var(--tw-text-opacity, 1))}.hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity, 1))}.focus\:border-pink-500:focus{--tw-border-opacity:1;border-color:rgb(236 72 153 / var(--tw-border-opacity, 1))}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}@media (min-width: 640px){.sm\:flex-row{flex-direction:row}}@media (min-width: 768px){.md\:mb-0{margin-bottom:0px}.md\:flex{display:flex}.md\:hidden{display:none}.md\:w-1\/2{width:50%}.md\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.md\:flex-row{flex-direction:row}.md\:justify-start{justify-content:flex-start}.md\:px-12{padding-left:3rem;padding-right:3rem}.md\:pl-12{padding-left:3rem}.md\:text-left{text-align:left}.md\:text-4xl{font-size:2.25rem;line-height:2.5rem}.md\:text-6xl{font-size:3.75rem;line-height:1}.md\:text-xl{font-size:1.25rem;line-height:1.75rem}}</style></head>
<body>
    <!-- Stars background -->
    <div id="stars-container" class="fixed inset-0 z-0"><div class="star" style="left: 29.9778%; top: 34.0879%; width: 1.6188px; height: 1.6188px; animation-delay: 0.845977s;"></div><div class="star" style="left: 74.419%; top: 59.7184%; width: 1.58946px; height: 1.58946px; animation-delay: 1.1941s;"></div><div class="star" style="left: 22.0304%; top: 47.0064%; width: 2.95564px; height: 2.95564px; animation-delay: 0.860295s;"></div><div class="star" style="left: 23.0608%; top: 28.4244%; width: 1.63621px; height: 1.63621px; animation-delay: 0.146096s;"></div><div class="star" style="left: 24.93%; top: 69.7687%; width: 1.94226px; height: 1.94226px; animation-delay: 0.533213s;"></div><div class="star" style="left: 7.04713%; top: 96.4001%; width: 1.03564px; height: 1.03564px; animation-delay: 0.594533s;"></div><div class="star" style="left: 0.694982%; top: 82.2769%; width: 2.88979px; height: 2.88979px; animation-delay: 1.06577s;"></div><div class="star" style="left: 29.4752%; top: 71.0856%; width: 2.76083px; height: 2.76083px; animation-delay: 0.538263s;"></div><div class="star" style="left: 47.0321%; top: 79.3334%; width: 1.72878px; height: 1.72878px; animation-delay: 1.32765s;"></div><div class="star" style="left: 12.7452%; top: 80.2859%; width: 2.40764px; height: 2.40764px; animation-delay: 0.95695s;"></div><div class="star" style="left: 85.5568%; top: 90.017%; width: 2.65472px; height: 2.65472px; animation-delay: 1.59172s;"></div><div class="star" style="left: 8.97093%; top: 45.2013%; width: 2.97966px; height: 2.97966px; animation-delay: 1.49017s;"></div><div class="star" style="left: 19.856%; top: 19.1308%; width: 1.77683px; height: 1.77683px; animation-delay: 0.333898s;"></div><div class="star" style="left: 67.4581%; top: 77.2161%; width: 2.40274px; height: 2.40274px; animation-delay: 1.45028s;"></div><div class="star" style="left: 22.6013%; top: 21.79%; width: 2.52017px; height: 2.52017px; animation-delay: 1.67437s;"></div><div class="star" style="left: 40.7762%; top: 25.0401%; width: 2.83783px; height: 2.83783px; animation-delay: 0.313263s;"></div><div class="star" style="left: 29.406%; top: 55.9595%; width: 2.1346px; height: 2.1346px; animation-delay: 1.81865s;"></div><div class="star" style="left: 98.711%; top: 18.6073%; width: 1.34995px; height: 1.34995px; animation-delay: 0.220506s;"></div><div class="star" style="left: 38.272%; top: 94.9924%; width: 1.72497px; height: 1.72497px; animation-delay: 0.267791s;"></div><div class="star" style="left: 26.4144%; top: 23.7666%; width: 1.47665px; height: 1.47665px; animation-delay: 1.84485s;"></div><div class="star" style="left: 10.0151%; top: 53.1545%; width: 1.64381px; height: 1.64381px; animation-delay: 1.34582s;"></div><div class="star" style="left: 53.4975%; top: 96.4354%; width: 2.26349px; height: 2.26349px; animation-delay: 1.76928s;"></div><div class="star" style="left: 50.6929%; top: 57.3337%; width: 2.20867px; height: 2.20867px; animation-delay: 1.01429s;"></div><div class="star" style="left: 90.2901%; top: 55.546%; width: 2.36887px; height: 2.36887px; animation-delay: 0.792517s;"></div><div class="star" style="left: 60.4757%; top: 65.4296%; width: 2.94281px; height: 2.94281px; animation-delay: 1.44772s;"></div><div class="star" style="left: 69.3381%; top: 26.519%; width: 1.49035px; height: 1.49035px; animation-delay: 1.81619s;"></div><div class="star" style="left: 34.6104%; top: 90.221%; width: 2.19752px; height: 2.19752px; animation-delay: 0.767047s;"></div><div class="star" style="left: 53.7429%; top: 30.2593%; width: 2.39723px; height: 2.39723px; animation-delay: 0.360463s;"></div><div class="star" style="left: 19.5657%; top: 54.6032%; width: 2.61241px; height: 2.61241px; animation-delay: 1.80033s;"></div><div class="star" style="left: 40.27%; top: 93.55%; width: 1.91705px; height: 1.91705px; animation-delay: 1.81845s;"></div><div class="star" style="left: 49.1074%; top: 74.6125%; width: 2.63712px; height: 2.63712px; animation-delay: 1.58653s;"></div><div class="star" style="left: 35.7129%; top: 83.0541%; width: 2.66234px; height: 2.66234px; animation-delay: 0.464681s;"></div><div class="star" style="left: 23.0041%; top: 23.6652%; width: 2.25178px; height: 2.25178px; animation-delay: 0.315094s;"></div><div class="star" style="left: 28.8172%; top: 5.0373%; width: 2.3563px; height: 2.3563px; animation-delay: 0.429892s;"></div><div class="star" style="left: 81.9119%; top: 87.5087%; width: 1.16648px; height: 1.16648px; animation-delay: 0.777606s;"></div><div class="star" style="left: 11.9554%; top: 88.628%; width: 2.0178px; height: 2.0178px; animation-delay: 1.23227s;"></div><div class="star" style="left: 99.9128%; top: 61.6627%; width: 1.12297px; height: 1.12297px; animation-delay: 0.622262s;"></div><div class="star" style="left: 38.6918%; top: 13.7616%; width: 2.82311px; height: 2.82311px; animation-delay: 1.50542s;"></div><div class="star" style="left: 76.5633%; top: 32.2006%; width: 1.52077px; height: 1.52077px; animation-delay: 1.49587s;"></div><div class="star" style="left: 97.4682%; top: 32.302%; width: 2.93567px; height: 2.93567px; animation-delay: 0.346066s;"></div><div class="star" style="left: 15.3455%; top: 24.8152%; width: 1.30625px; height: 1.30625px; animation-delay: 1.26343s;"></div><div class="star" style="left: 87.769%; top: 18.9368%; width: 2.37349px; height: 2.37349px; animation-delay: 1.60126s;"></div><div class="star" style="left: 28.1124%; top: 83.6996%; width: 2.14366px; height: 2.14366px; animation-delay: 0.922741s;"></div><div class="star" style="left: 41.249%; top: 96.3732%; width: 2.53018px; height: 2.53018px; animation-delay: 0.391838s;"></div><div class="star" style="left: 31.467%; top: 80.3848%; width: 2.66889px; height: 2.66889px; animation-delay: 0.815086s;"></div><div class="star" style="left: 23.2363%; top: 86.1932%; width: 2.87625px; height: 2.87625px; animation-delay: 0.306279s;"></div><div class="star" style="left: 96.3278%; top: 93.8514%; width: 2.51207px; height: 2.51207px; animation-delay: 0.541514s;"></div><div class="star" style="left: 60.9578%; top: 97.9491%; width: 1.79366px; height: 1.79366px; animation-delay: 1.17018s;"></div><div class="star" style="left: 50.6705%; top: 43.7188%; width: 2.08308px; height: 2.08308px; animation-delay: 1.72836s;"></div><div class="star" style="left: 77.1583%; top: 62.2938%; width: 2.4699px; height: 2.4699px; animation-delay: 1.36585s;"></div><div class="star" style="left: 42.3556%; top: 43.5859%; width: 1.76834px; height: 1.76834px; animation-delay: 1.82779s;"></div><div class="star" style="left: 61.2895%; top: 37.7115%; width: 1.07757px; height: 1.07757px; animation-delay: 1.50644s;"></div><div class="star" style="left: 1.79028%; top: 37.2427%; width: 1.45643px; height: 1.45643px; animation-delay: 0.665266s;"></div><div class="star" style="left: 22.0843%; top: 89.2184%; width: 1.73604px; height: 1.73604px; animation-delay: 1.97331s;"></div><div class="star" style="left: 89.9628%; top: 86.9883%; width: 2.0038px; height: 2.0038px; animation-delay: 1.9919s;"></div><div class="star" style="left: 82.9279%; top: 87.114%; width: 2.18209px; height: 2.18209px; animation-delay: 1.51345s;"></div><div class="star" style="left: 53.6776%; top: 57.3482%; width: 2.18259px; height: 2.18259px; animation-delay: 0.299963s;"></div><div class="star" style="left: 46.191%; top: 57.4135%; width: 2.52592px; height: 2.52592px; animation-delay: 0.189853s;"></div><div class="star" style="left: 97.6254%; top: 93.4599%; width: 2.08666px; height: 2.08666px; animation-delay: 0.748712s;"></div><div class="star" style="left: 21.2146%; top: 38.4731%; width: 2.10604px; height: 2.10604px; animation-delay: 1.3556s;"></div><div class="star" style="left: 11.6601%; top: 29.7039%; width: 1.74381px; height: 1.74381px; animation-delay: 1.25631s;"></div><div class="star" style="left: 69.6069%; top: 59.8588%; width: 1.06493px; height: 1.06493px; animation-delay: 0.784668s;"></div><div class="star" style="left: 84.7194%; top: 10.7983%; width: 1.4931px; height: 1.4931px; animation-delay: 0.710299s;"></div><div class="star" style="left: 96.1835%; top: 11.2025%; width: 1.6378px; height: 1.6378px; animation-delay: 0.0232924s;"></div><div class="star" style="left: 3.89375%; top: 57.9601%; width: 2.08738px; height: 2.08738px; animation-delay: 0.595945s;"></div><div class="star" style="left: 39.9582%; top: 64.7772%; width: 1.16908px; height: 1.16908px; animation-delay: 0.0350601s;"></div><div class="star" style="left: 30.8204%; top: 80.8062%; width: 1.86034px; height: 1.86034px; animation-delay: 1.09798s;"></div><div class="star" style="left: 75.8443%; top: 40.8569%; width: 1.38306px; height: 1.38306px; animation-delay: 0.465399s;"></div><div class="star" style="left: 17.6822%; top: 34.9887%; width: 1.80874px; height: 1.80874px; animation-delay: 0.265s;"></div><div class="star" style="left: 67.0975%; top: 90.7274%; width: 1.71974px; height: 1.71974px; animation-delay: 0.450512s;"></div><div class="star" style="left: 22.2758%; top: 78.4222%; width: 2.16777px; height: 2.16777px; animation-delay: 1.56859s;"></div><div class="star" style="left: 42.2488%; top: 15.0308%; width: 1.53811px; height: 1.53811px; animation-delay: 1.64938s;"></div><div class="star" style="left: 19.662%; top: 6.59765%; width: 1.31282px; height: 1.31282px; animation-delay: 1.27373s;"></div><div class="star" style="left: 65.0895%; top: 69.9491%; width: 2.31245px; height: 2.31245px; animation-delay: 1.97566s;"></div><div class="star" style="left: 80.9071%; top: 28.7214%; width: 2.88949px; height: 2.88949px; animation-delay: 0.280588s;"></div><div class="star" style="left: 13.6539%; top: 19.2748%; width: 2.69757px; height: 2.69757px; animation-delay: 1.29342s;"></div><div class="star" style="left: 73.9926%; top: 81.7044%; width: 2.42725px; height: 2.42725px; animation-delay: 0.227537s;"></div><div class="star" style="left: 0.516399%; top: 73.8525%; width: 1.44419px; height: 1.44419px; animation-delay: 0.630471s;"></div><div class="star" style="left: 78.046%; top: 43.1127%; width: 2.65091px; height: 2.65091px; animation-delay: 1.53135s;"></div><div class="star" style="left: 49.6445%; top: 76.8265%; width: 2.67337px; height: 2.67337px; animation-delay: 0.718495s;"></div><div class="star" style="left: 72.0453%; top: 44.671%; width: 2.05246px; height: 2.05246px; animation-delay: 0.316017s;"></div><div class="star" style="left: 17.5886%; top: 74.2654%; width: 1.8487px; height: 1.8487px; animation-delay: 1.23535s;"></div><div class="star" style="left: 15.4856%; top: 51.3169%; width: 2.8363px; height: 2.8363px; animation-delay: 1.66672s;"></div><div class="star" style="left: 62.6155%; top: 27.8834%; width: 2.09134px; height: 2.09134px; animation-delay: 1.10137s;"></div><div class="star" style="left: 77.1291%; top: 49.6382%; width: 1.65568px; height: 1.65568px; animation-delay: 0.202089s;"></div><div class="star" style="left: 24.4976%; top: 85.7237%; width: 1.89411px; height: 1.89411px; animation-delay: 1.36893s;"></div><div class="star" style="left: 16.7458%; top: 29.2256%; width: 1.07071px; height: 1.07071px; animation-delay: 1.20773s;"></div><div class="star" style="left: 49.4649%; top: 97.6501%; width: 1.52474px; height: 1.52474px; animation-delay: 1.67457s;"></div><div class="star" style="left: 52.8654%; top: 1.18643%; width: 1.33683px; height: 1.33683px; animation-delay: 1.54918s;"></div><div class="star" style="left: 17.5546%; top: 90.3947%; width: 2.76493px; height: 2.76493px; animation-delay: 1.12464s;"></div><div class="star" style="left: 68.7028%; top: 28.8885%; width: 2.87608px; height: 2.87608px; animation-delay: 1.60197s;"></div><div class="star" style="left: 88.1079%; top: 80.8559%; width: 2.83296px; height: 2.83296px; animation-delay: 0.0700571s;"></div><div class="star" style="left: 18.5049%; top: 9.76016%; width: 2.15182px; height: 2.15182px; animation-delay: 1.40027s;"></div><div class="star" style="left: 89.1217%; top: 62.5374%; width: 1.85006px; height: 1.85006px; animation-delay: 0.0842473s;"></div><div class="star" style="left: 46.9244%; top: 18.1933%; width: 1.27671px; height: 1.27671px; animation-delay: 0.0991199s;"></div><div class="star" style="left: 4.81007%; top: 52.128%; width: 2.97522px; height: 2.97522px; animation-delay: 1.62901s;"></div><div class="star" style="left: 29.3707%; top: 97.5322%; width: 2.04576px; height: 2.04576px; animation-delay: 1.7994s;"></div><div class="star" style="left: 84.9052%; top: 96.5579%; width: 2.61739px; height: 2.61739px; animation-delay: 0.974575s;"></div><div class="star" style="left: 54.0754%; top: 55.1069%; width: 2.18068px; height: 2.18068px; animation-delay: 1.71241s;"></div><div class="star" style="left: 46.2341%; top: 48.9085%; width: 1.7274px; height: 1.7274px; animation-delay: 1.53702s;"></div></div>
    @if (session('message'))
    <div id="toast" class="toast fixed bottom-6 right-6 bg-gradient-to-r from-pink-500 to-orange-500 text-white px-6 py-3 rounded-xl shadow-lg z-50">
        {{ session('message') }}
    </div>

    <script>
        setTimeout(() => {
            const toast = document.getElementById('toast');
            if (toast) {
                toast.classList.add('opacity-0', 'transition-opacity', 'duration-500');
                setTimeout(() => toast.remove(), 500); // remove after fade
            }
        }, 4000); // remove after 4 seconds
    </script>
@endif
    
    <div class="min-h-screen flex flex-col relative overflow-hidden">
        <!-- Header -->
        <header class="container mx-auto px-4 py-6 flex justify-between items-center z-10">
            <div class="flex items-center">
                <div class="text-3xl font-bold">
                    <img src="{{ asset('directraabtalogo.png') }}" alt="DirectRaabta Mobile Application" width="120" style="margin-left: 15px;">
                </div>
            </div>
            <div class="hidden md:flex space-x-6">
                <a href="#about" class="hover:text-pink-400 transition-colors">About</a>
                <a href="#features" class="hover:text-pink-400 transition-colors">Features</a>
                <a href="Terms&Conditions " class="hover:text-pink-400 transition-colors">Terms and Conditions</a>
                <a href="Privacy-policy" class="hover:text-pink-400 transition-colors">Privacy policy</a>
                <a href="Contect-us" class="hover:text-pink-400 transition-colors">Contact Us</a>
            </div>
            <div class="md:hidden">
                <button id="menu-toggle" class="text-white focus:outline-none">
                    <i class="fas fa-bars text-xl"></i>
                </button>
            </div>
        </header>
        
        <!-- Mobile menu -->
        <div id="mobile-menu" class="fixed inset-0 bg-black bg-opacity-95 z-50 hidden flex-col justify-center items-center">
            <button id="close-menu" class="absolute top-6 right-6 text-white focus:outline-none">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div class="flex flex-col space-y-8 text-center text-xl">
                <a href="#about" class="hover:text-pink-400 transition-colors">About</a>
                <a href="#features" class="hover:text-pink-400 transition-colors">Features</a>
                <a href="#notify" class="hover:text-pink-400 transition-colors">Get Notified</a>
                <a href="Terms&Conditions " class="hover:text-pink-400 transition-colors">Terms and Conditions</a>
                <a href="Privacy-policy" class="hover:text-pink-400 transition-colors">Privacy policy</a>
                <a href="Contect-us" class="hover:text-pink-400 transition-colors">Contact Us</a>
            </div>
        </div>
        
        <!-- Hero Section -->
        <section class="flex-grow flex flex-col md:flex-row items-center justify-center px-4 md:px-12 py-12 z-10">
            <div class="md:w-1/2 text-center md:text-left mb-10 md:mb-0">
                <h1 class="text-4xl md:text-6xl font-bold mb-4">
                    Connect with <span class="gradient-text">Celebrities</span> Like Never Before
                </h1>
                <p class="text-lg md:text-xl text-gray-300 mb-8">
                    Send personal voice messages to your favorite stars and get authentic responses. Coming soon to your device.
                </p>
                <div class="flex flex-col sm:flex-row justify-center md:justify-start gap-4">
                    <a href="#notify" class="gradient-border inline-block">
                        <div class="gradient-border-content px-8 py-3 text-center">
                            <span class="font-semibold">Get Early Access</span>
                        </div>
                    </a>
                    <button id="play-demo" class="bg-gray-800 hover:bg-gray-700 px-8 py-3 rounded-xl flex items-center justify-center transition-colors">
                        <i class="fas fa-play mr-2"></i> How It Works
                    </button>
                </div>
            </div>
            <div class="md:w-1/2 relative">
                <div class="relative w-full max-w-md mx-auto">
                    <!-- Phone mockup with app preview -->
                    <div class="floating">
                        <img  src="{{ asset('home1.png') }}" alt="DirectRaabta Mobile Application" width="400">

                        
                        <!-- Gradient definitions -->
                        <defs>
                            <lineargradient id="paint0_linear" x1="0" y1="0" x2="320" y2="640" gradientunits="userSpaceOnUse">
                                <stop stop-color="#ff3a88">
                                <stop offset="1" stop-color="#ff7f45">
                            </stop></stop></lineargradient>
                            <lineargradient id="paint1_linear" x1="35" y1="55" x2="65" y2="85" gradientunits="userSpaceOnUse">
                                <stop stop-color="#ff3a88">
                                <stop offset="1" stop-color="#ff7f45">
                            </stop></stop></lineargradient>
                            <lineargradient id="paint2_linear" x1="130" y1="130" x2="190" y2="210" gradientunits="userSpaceOnUse">
                                <stop stop-color="#ff3a88">
                                <stop offset="1" stop-color="#ff7f45">
                            </stop></stop></lineargradient>
                            <lineargradient id="paint3_linear" x1="90" y1="290" x2="250" y2="290" gradientunits="userSpaceOnUse">
                                <stop stop-color="#ff3a88">
                                <stop offset="1" stop-color="#ff7f45">
                            </stop></stop></lineargradient>
                            <lineargradient id="paint4_linear" x1="120" y1="340" x2="200" y2="420" gradientunits="userSpaceOnUse">
                                <stop stop-color="#ff3a88">
                                <stop offset="1" stop-color="#ff7f45">
                            </stop></stop></lineargradient>
                            <lineargradient id="paint5_linear" x1="145" y1="365" x2="175" y2="395" gradientunits="userSpaceOnUse">
                                <stop stop-color="#ff3a88">
                                <stop offset="1" stop-color="#ff7f45">
                            </stop></stop></lineargradient>
                            <lineargradient id="paint6_linear" x1="145" y1="535" x2="175" y2="565" gradientunits="userSpaceOnUse">
                                <stop stop-color="#ff3a88">
                                <stop offset="1" stop-color="#ff7f45">
                            </stop></stop></lineargradient>
                        </defs>
                    </div>
                    
                    <!-- Decorative elements -->
                    <div class="absolute -top-10 -right-10 w-20 h-20 bg-pink-500 rounded-full filter blur-3xl opacity-20"></div>
                    <div class="absolute -bottom-10 -left-10 w-20 h-20 bg-orange-500 rounded-full filter blur-3xl opacity-20"></div>
                </div>
            </div>
        </section>
        
        <!-- Features Section -->
        <section id="features" class="py-16 bg-black bg-opacity-40 relative z-10">
            <div class="container mx-auto px-4">
                <h2 class="text-3xl md:text-4xl font-bold text-center mb-12">
                    <span class="gradient-text">Why</span> DirectRaabta?
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-gray-900 bg-opacity-60 p-6 rounded-xl hover:transform hover:scale-105 transition-transform">
                        <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-orange-500 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-microphone text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Personal Voice Messages</h3>
                        <p class="text-gray-300">Send 30-second voice notes directly to your favorite celebrities and get authentic responses.</p>
                    </div>
                    
                    <div class="bg-gray-900 bg-opacity-60 p-6 rounded-xl hover:transform hover:scale-105 transition-transform">
                        <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-orange-500 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-star text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Verified Celebrities</h3>
                        <p class="text-gray-300">Connect with real, verified celebrities from entertainment, sports, and more.</p>
                    </div>
                    
                    <div class="bg-gray-900 bg-opacity-60 p-6 rounded-xl hover:transform hover:scale-105 transition-transform">
                        <div class="w-16 h-16 bg-gradient-to-r from-pink-500 to-orange-500 rounded-full flex items-center justify-center mb-4">
                            <i class="fas fa-lock text-2xl"></i>
                        </div>
                        <h3 class="text-xl font-semibold mb-2">Exclusive Access</h3>
                        <p class="text-gray-300">Get personal insights and connections that go beyond social media interactions.</p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- About Section -->
        <section id="about" class="py-16 relative z-10">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-1/2 mb-10 md:mb-0">
                        <h2 class="text-3xl md:text-4xl font-bold mb-6">
                            About <span class="gradient-text">DirectRaabta</span>
                        </h2>
                        <p class="text-gray-300 mb-6">
                            DirectRaabta is revolutionizing fan-celebrity interactions with our innovative voice messaging platform. We're creating a space where authentic connections happen through the power of voice.
                        </p>
                        <p class="text-gray-300 mb-6">
                            Our platform allows fans to send personal 30-second voice messages to their favorite celebrities and receive genuine responses, creating meaningful connections beyond typical social media interactions.
                        </p>
                        <div class="flex items-center space-x-4">
                            <div class="flex -space-x-2">
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-purple-500 to-blue-500 flex items-center justify-center text-xs">JD</div>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-green-500 to-teal-500 flex items-center justify-center text-xs">SK</div>
                                <div class="w-10 h-10 rounded-full bg-gradient-to-r from-pink-500 to-red-500 flex items-center justify-center text-xs">AR</div>
                            </div>
                            <span class="text-sm text-gray-400">Join thousands waiting for launch</span>
                        </div>
                    </div>
                    
                    <div class="md:w-1/2 md:pl-12">
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-gray-800 p-4 rounded-xl">
                                <div class="text-3xl mb-2">30s</div>
                                <div class="text-sm text-gray-400">Voice Message Length</div>
                            </div>
                            <div class="bg-gray-800 p-4 rounded-xl">
                                <div class="text-3xl mb-2">100+</div>
                                <div class="text-sm text-gray-400">Celebrities Onboarding</div>
                            </div>
                            <div class="bg-gray-800 p-4 rounded-xl">
                                <div class="text-3xl mb-2">24h</div>
                                <div class="text-sm text-gray-400">Average Response Time</div>
                            </div>
                            <div class="bg-gray-800 p-4 rounded-xl">
                                <div class="text-3xl mb-2">5K+</div>
                                <div class="text-sm text-gray-400">Waitlist Signups</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Notification Section -->
        <section id="notify" class="py-16 bg-black bg-opacity-40 relative z-10">
            <div class="container mx-auto px-4 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">
                    Be the <span class="gradient-text">First</span> to Know
                </h2>
                <p class="text-gray-300 mb-8 max-w-2xl mx-auto">
                    Join our exclusive waitlist and be notified when DirectRaabta launches. Get early access and special perks for being an early supporter.
                </p>
                
             
                
                <div class="mt-16 flex flex-wrap justify-center gap-8">
                    <div class="flex items-center">
                        <i class="fab fa-apple text-4xl mr-3"></i>
                        <div class="text-left">
                            <div class="text-xs text-gray-400">Coming soon on</div>
                            <div class="font-semibold">App Store</div>
                        </div>
                    </div>
                    <div class="flex items-center">
                        <i class="fab fa-google-play text-4xl mr-3"></i>
                        <div class="text-left">
                            <div class="text-xs text-gray-400">Coming soon on</div>
                            <div class="font-semibold">Google Play</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Footer -->
        <footer class="py-8 relative z-10">
            <div class="container mx-auto px-4">
                <div class="flex flex-col md:flex-row justify-between items-center">
                    <div class="mb-6 md:mb-0">
                        <div class="text-2xl font-bold">
                             <img src="{{ asset('directraabtalogo.png') }}" alt="DirectRaabta Mobile Application" width="120" style="margin-left: 15px;">
                        </div>
                        <p class="text-gray-400 mt-2">Connect with your favorite celebrities</p>
                    </div>
                    
                    <div class="flex space-x-6 mb-6 md:mb-0">
                        <a href="https://www.instagram.com/directraabta/" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="https://www.youtube.com/@DirectRaabta" class="text-gray-400 hover:text-white transition-colors">
                            <i class="fab fa-youtube text-xl"></i>
                        </a>
                    </div>
                    
                    <div class="text-gray-400 text-sm">
                        © 2025 DirectRaabta. All rights reserved.
                    </div>
                </div>
            </div>
        </footer>
        
        <!-- Modal -->
        <div id="demo-modal" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 hidden">
            <div class="bg-gray-900 p-6 rounded-xl max-w-lg w-full mx-4">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">How DirectRaabta Works</h3>
                    <button id="close-modal" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="mb-6">
                    <div class="aspect-w-16 aspect-h-9 bg-gray-800 rounded-lg flex items-center justify-center">
                        <div class="text-center p-8">
                            <i class="fas fa-play-circle text-5xl mb-4 text-pink-500"></i>
                            <p>Video demonstration will be available at launch</p>
                        </div>
                    </div>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-pink-500 to-orange-500 flex items-center justify-center mr-3 flex-shrink-0">1</div>
                        <p>Choose your favorite celebrity from our growing roster of stars</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-pink-500 to-orange-500 flex items-center justify-center mr-3 flex-shrink-0">2</div>
                        <p>Record and send your personal 30-second voice message</p>
                    </div>
                    <div class="flex items-start">
                        <div class="w-8 h-8 rounded-full bg-gradient-to-r from-pink-500 to-orange-500 flex items-center justify-center mr-3 flex-shrink-0">3</div>
                        <p>Receive an authentic voice response directly from the celebrity</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Create stars background
        function createStars() {
            const container = document.getElementById('stars-container');
            const count = 100;
            
            for (let i = 0; i < count; i++) {
                const star = document.createElement('div');
                star.classList.add('star');
                
                // Random position
                const x = Math.random() * 100;
                const y = Math.random() * 100;
                
                // Random size
                const size = Math.random() * 2 + 1;
                
                // Random animation delay
                const delay = Math.random() * 2;
                
                star.style.left = `${x}%`;
                star.style.top = `${y}%`;
                star.style.width = `${size}px`;
                star.style.height = `${size}px`;
                star.style.animationDelay = `${delay}s`;
                
                container.appendChild(star);
            }
        }
        
        // Mobile menu functionality
        document.getElementById('menu-toggle').addEventListener('click', function() {
            document.getElementById('mobile-menu').style.display = 'flex';
        });
        
        document.getElementById('close-menu').addEventListener('click', function() {
            document.getElementById('mobile-menu').style.display = 'none';
        });
        
        // Modal functionality
        document.getElementById('play-demo').addEventListener('click', function() {
            document.getElementById('demo-modal').classList.remove('hidden');
        });
        
        document.getElementById('close-modal').addEventListener('click', function() {
            document.getElementById('demo-modal').classList.add('hidden');
        });
        
        
        
        // Mobile menu links should close the menu when clicked
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', function() {
                document.getElementById('mobile-menu').style.display = 'none';
            });
        });
        
        // Initialize stars on load
        window.addEventListener('load', createStars);
    </script>
<script>(function(){function c(){var b=a.contentDocument||a.contentWindow.document;if(b){var d=b.createElement('script');d.innerHTML="window.__CF$cv$params={r:'951bfc0a52d6fd06',t:'MTc1MDI2MjI2OC4wMDAwMDA='};var a=document.createElement('script');a.nonce='';a.src='/cdn-cgi/challenge-platform/scripts/jsd/main.js';document.getElementsByTagName('head')[0].appendChild(a);";b.getElementsByTagName('head')[0].appendChild(d)}}if(document.body){var a=document.createElement('iframe');a.height=1;a.width=1;a.style.position='absolute';a.style.top=0;a.style.left=0;a.style.border='none';a.style.visibility='hidden';document.body.appendChild(a);if('loading'!==document.readyState)c();else if(window.addEventListener)document.addEventListener('DOMContentLoaded',c);else{var e=document.onreadystatechange||function(){};document.onreadystatechange=function(b){e(b);'loading'!==document.readyState&&(document.onreadystatechange=e,c())}}}})();</script><iframe height="1" width="1" style="position: absolute; top: 0px; left: 0px; border: none; visibility: hidden;"></iframe>

</body></html>