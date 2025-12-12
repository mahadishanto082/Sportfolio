<div class="navbar-wrapper">
    <nav class="navbar navbar-expand-xl">
        <div class="navbar-container">
            <div class="logo-container">
                <a class="navbar-brand" >

                
             
                     <a href="{{ route('home') }}">
                     <img src="{{ asset('public/' . $headerContent->logo) }}" alt="Logo">
                    </a> 
                    
                    



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
            <!-- <div class="navbar-action-container">
                <div class="navbar-action-button">
                    <button id="themeSwitch" class="themeswitch" aria-label="Toggle Theme">
                        <i id="themeIcon" class="fas fa-moon"></i>
                    </button>                      
                </div>
            </div> -->

                
               

</div>
            </div>
        </div>
    </nav>
</div>