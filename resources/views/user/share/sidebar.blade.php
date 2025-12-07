<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
  <style>
    body {
  margin: 0;
  font-family: Arial, sans-serif;
}

/* Hamburger Button */
.menu-btn {
  font-size: 24px;
  padding: 10px 15px;
  border: none;
  background: transparent;
  cursor: pointer;
  z-index: 10000;
}

/* Sidebar */
.sidebar {
  position: fixed;
  top: 0;
  left: -270px;
  width: 270px;
  height: 100%;
  background: #ffffff;
  box-shadow: 2px 0 8px rgba(0,0,0,0.1);
  transition: 0.3s ease-in-out;
  z-index: 9999;
  overflow-y: auto;
}

.sidebar.active {
  left: 0;
}

/* Overlay */
.sidebar-overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.4);
  opacity: 0;
  visibility: hidden;
  transition: 0.3s;
  z-index: 9998;
}

.sidebar-overlay.active {
  opacity: 1;
  visibility: visible;
}

.sidebar-header {
  padding: 20px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.close-btn {
  border: none;
  background: transparent;
  font-size: 22px;
  cursor: pointer;
}

/* Menu */
.menu {
  list-style: none;
  padding: 0;
  margin: 0;
}

.menu li {
  border-bottom: 1px solid #eee;
}

.menu li a {
  display: block;
  padding: 12px 20px;
  text-decoration: none;
  color: #333;
  font-size: 16px;
}

.menu li a:hover {
  background: #f3f3f3;
}

/* Dropdown */
.sidebar-dropdown .dropdown-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 12px 20px;
  cursor: pointer;
}

.sidebar-dropdown-menu {
  display: none;
  list-style: none;
  padding-left: 15px;
}

.sidebar-dropdown-menu li a {
  padding: 10px 20px;
  display: block;
}

/* Mobile */
@media (max-width: 768px) {
  .sidebar {
    width: 80%;
    max-width: 280px;
  }
}

  </style>
</head>
<body>

<!-- Hamburger Button -->
<button class="menu-btn"><i class="fa-solid fa-bars"></i></button>

<!-- Overlay -->
<div class="sidebar-overlay"></div>

<!-- Sidebar -->
<div class="sidebar">
  <div class="sidebar-header">
    <div class="logo">
      <img src="./image/marko-logo.png" class="site-logo img-fluid logo" alt="Logo">
    </div>
    <button class="close-btn"><span>X</span></button>
  </div>

  <ul class="menu">
      <li><a href="index.html">Home</a></li>
      <li><a href="about.html">About Us</a></li>
      
      <li class="sidebar-dropdown">
          <div class="dropdown-header">
              <a href="#">Services</a>
              <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
          </div>
          <ul class="sidebar-dropdown-menu">
              <li><a href="service.html">Service</a></li>
              <li><a href="single_services.html">Service Details</a></li>
          </ul>
      </li>

      <li class="sidebar-dropdown">
          <div class="dropdown-header">
              <a href="#">Pages</a>
              <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
          </div>
          <ul class="sidebar-dropdown-menu">
              <li><a href="case_studies.html">Case Studies</a></li>
              <li><a href="team.html">Our Team</a></li>
              <li><a href="partnership.html">Partnership</a></li>
              <li><a href="pricing.html">Pricing Plan</a></li>
              <li><a href="testimonial.html">Testimonial</a></li>
              <li><a href="faq.html">FAQs</a></li>
              <li><a href="404_page.html">Error 404</a></li>
          </ul>
      </li>

      <li class="sidebar-dropdown">
          <div class="dropdown-header">
              <a href="#">Archive</a>
              <button class="sidebar-dropdown-btn"><i class="fa-solid fa-angle-down"></i></button>
          </div>
          <ul class="sidebar-dropdown-menu">
              <li><a href="blog.html">Blog</a></li>
              <li><a href="single_post.html">Single Post</a></li>
          </ul>
      </li>

      <li><a href="contact.html">Contact Us</a></li>
  </ul>
</div>

<script>
  // Open Sidebar
document.querySelector(".menu-btn").addEventListener("click", () => {
    document.querySelector(".sidebar").classList.add("active");
    document.querySelector(".sidebar-overlay").classList.add("active");
});

// Close Sidebar
document.querySelector(".close-btn").addEventListener("click", () => {
    document.querySelector(".sidebar").classList.remove("active");
    document.querySelector(".sidebar-overlay").classList.remove("active");
});

// Close when click overlay
document.querySelector(".sidebar-overlay").addEventListener("click", () => {
    document.querySelector(".sidebar").classList.remove("active");
    document.querySelector(".sidebar-overlay").classList.remove("active");
});

// Dropdown menu
document.querySelectorAll(".sidebar-dropdown-btn").forEach(button => {
    button.addEventListener("click", function () {
        const dropdown = this.parentElement.nextElementSibling;
        
        dropdown.style.display =
            dropdown.style.display === "block" ? "none" : "block";
    });
});

</script>

</body>
</html>
