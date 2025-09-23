<div class="br-logo">
  <a href="{{ route('admin.dashboard') }}">
    <span>[</span>Admin <i>Panel</i><span>]</span>
  </a>
</div>

<div class="br-sideleft sideleft-scrollbar">
  <label class="sidebar-label pd-x-10 mg-t-20 op-3">Navigation</label>
  <ul class="br-sideleft-menu">

    <!-- Dashboard -->
    <li class="br-menu-item">
      <a href="{{ route('admin.dashboard') }}"
         class="br-menu-link {{ Request::routeIs('admin.dashboard*') ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-home-outline tx-24"></i>
        <span class="menu-item-label">Dashboard</span>
      </a>
    </li>

   <!-- Main Page -->
<li class="br-menu-item">
  <a href="{{ route('admin.main-page.index') }}"
     class="br-menu-link {{ Request::routeIs('admin.main-page*') ? 'active' : '' }}">
    <i class="menu-item-icon icon ion-ios-paper-outline tx-24"></i>
    <span class="menu-item-label">Main Page</span>
  </a>
</li>


    <!-- Services -->
    <li class="br-menu-item">
      <a href="#"
         class="br-menu-link {{ Request::routeIs('admin.services*') ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-cog-outline tx-24"></i>
        <span class="menu-item-label">Services</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('admin.services.index') }}" class="sub-link">List</a></li>
        <li class="sub-item"><a href="{{ route('admin.services.create') }}" class="sub-link">Add New</a></li>
      </ul>
    </li>

    <!-- About Us -->
    <li class="br-menu-item">
      <a href="#"
         class="br-menu-link {{ Request::routeIs('admin.about*') ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-information-outline tx-24"></i>
        <span class="menu-item-label">About Us</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('admin.about.index') }}" class="sub-link">List</a></li>
        <li class="sub-item"><a href="{{ route('admin.about.create') }}" class="sub-link">Add New</a></li>
      </ul>
    </li>

    <!-- Portfolio -->
    <li class="br-menu-item">
      <a href="#"
         class="br-menu-link {{ Request::routeIs('admin.portfolio*') ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-briefcase-outline tx-24"></i>
        <span class="menu-item-label">Portfolio</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('admin.portfolio.index') }}" class="sub-link">List</a></li>
        <li class="sub-item"><a href="{{ route('admin.portfolio.create') }}" class="sub-link">Add New</a></li>
      </ul>
    </li>

    <!-- Technologies -->
    <li class="br-menu-item">
      <a href="#"
         class="br-menu-link {{ Request::routeIs('admin.tech*') ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-construct-outline tx-24"></i>
        <span class="menu-item-label">Technologies</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('admin.tech.index') }}" class="sub-link">List</a></li>
        <li class="sub-item"><a href="{{ route('admin.tech.create') }}" class="sub-link">Add New</a></li>
      </ul>
    </li>

    <!-- Header -->
    <li class="br-menu-item">
      <a href="#"
         class="br-menu-link {{
            Request::routeIs('admin.header-content*') 
              ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-options-outline tx-24"></i>
        <span class="menu-item-label">Header</span>
      </a>
      <ul class="br-menu-sub">
        <!-- Content -->
        <li class="sub-item"><a href="{{ route('admin.header-content.index') }}" class="sub-link">Content — List</a></li>
        <li class="sub-item"><a href="{{ route('admin.header-content.create') }}" class="sub-link">Content — Add</a></li>

       
      </ul>
    </li>

    <!-- Messages -->
    <li class="br-menu-item">
      <a href="{{ route('admin.contact-message.index') }}"
         class="br-menu-link {{ Request::routeIs('admin.contact-message*') ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-mail-outline tx-24"></i>
        <span class="menu-item-label">Messages</span>
      </a>
    </li>

    <!-- Footer -->
    <li class="br-menu-item">
      <a href="#"
         class="br-menu-link {{ Request::routeIs('admin.contact*') ? 'active' : '' }}">
        <i class="menu-item-icon icon ion-ios-list-outline tx-24"></i>
        <span class="menu-item-label">Footer</span>
      </a>
      <ul class="br-menu-sub">
        <li class="sub-item"><a href="{{ route('admin.contact.index') }}" class="sub-link">List</a></li>
        <li class="sub-item"><a href="{{ route('admin.contact.create') }}" class="sub-link">Add</a></li>
      </ul>
    </li>

  </ul>
</div>
