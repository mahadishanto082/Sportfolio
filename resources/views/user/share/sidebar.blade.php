<div>
    <div class="sidebar-overlay"></div>

    <div class="sidebar">
        <div class="sidebar-header">
            <a href="{{ route('home') }}">
                <!-- <img src="{{ asset('storage/' . $headerContent->logo) }}" alt="Logo" > -->
                <img src="{{ asset('public/' . $headerContent->logo) }}" alt="Logo" height="100">
            </a>

            <button class="close-btn"><span>X</span></button>
        </div>

        <ul class="menu">

            {{-- 🔥 DYNAMIC BUTTONS (Same as Navbar) --}}
            @php
                $buttons = is_array($headerContent->buttons)
                    ? $headerContent->buttons
                    : (json_decode($headerContent->buttons, true) ?? []);
            @endphp

            @if(!empty($buttons))
                @foreach($buttons as $btn)
                    <li>
                        <a href="{{ $btn['link'] ?? '#' }}" class="sidebar-link">
                            {{ $btn['name'] ?? '' }}
                        </a>
                    </li>
                @endforeach
            @endif

        </ul>
    </div>
</div>
