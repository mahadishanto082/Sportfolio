<div class="navbar-wrapper">
    <nav class="navbar navbar-expand-xl">
        <div class="navbar-container">
            <div class="logo-container">
                <a class="navbar-brand" >

                <p>Logo path: {{ $headerContent->logo }}</p>
             
                    <!-- <a href="{{ route('home') }}">
                        <img src="{{ asset('storage/' . $headerContent->logo) }}" alt="Logo" height="100">
                    </a> -->
                    <!-- <img src="{{ asset($headerContent->logo) }}" alt="Logo"> -->
                    <img src="{{ asset('public/' . $headerContent->logo) }}" alt="Logo">



                </a>
            </div>
            <button class="navbar-toggler nav-btn" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa-solid fa-bars "></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto">
                @php
    $buttons = is_array($headerContent->buttons) 
        ? $headerContent->buttons 
        : (json_decode($headerContent->buttons, true) ?? []);
@endphp

<ul class="navbar-nav mx-auto">
    @if(!empty($buttons))
        @foreach ($buttons as $btn)
            <li class="nav-item">
                <a class="nav-link" href="{{ $btn['link'] ?? '#' }}">
                    {{ $btn['name'] ?? '' }}
                </a>
            </li>
        @endforeach
    @endif
</ul>
   

                  </ul>
            </div>
            <div class="navbar-action-container">
                <div class="navbar-action-button">
                    <button id="themeSwitch" class="themeswitch" aria-label="Toggle Theme">
                        <i id="themeIcon" class="fas fa-moon"></i>
                    </button>                      
                </div>
                
                <a href="https://wa.me/01717489175" target="_blank" style="font-size: 40px; color: #25D366;">
                    <i class="fab fa-whatsapp"></i>
                </a>

</div>
            </div>
        </div>
    </nav>
</div>