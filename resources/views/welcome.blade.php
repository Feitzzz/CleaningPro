<!DOCTYPE html>
<html lang="en">
    <head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>CleaningPro - Virtual Cleaning Services</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('style.css') }}" />
        <style>
    /* Loader styles */
    #loader { display: none; }
    .navbar-custom {
      background-color: #2e7d32;
    }
    .navbar-custom .nav-link,
    .navbar-custom .navbar-brand {
      color: #fff;
    }
    .navbar-custom .nav-link:hover {
      color: #c8e6c9;
    }
    .btn-outline-light:hover {
      background-color: #c8e6c9;
      color: #2e7d32;
    }
    .about-section {
      padding: 60px 0;
      background-color: #f1f8e9;
    }
    .about-section h2 {
      color: #2e7d32;
    }
    @media (min-width: 992px) {
      .dropdown:hover .dropdown-menu {
        display: block;
        margin-top: 0;
      }
    }
    .dropdown-menu {
      z-index: 1050;
      min-width: 200px;
      max-width: 100%;
      width: auto;
      overflow-wrap: break-word;
      word-wrap: break-word;
      white-space: normal;
    }
    .navbar-collapse {
      overflow: visible !important;
    }
        </style>
    </head>
<body>
<header class="bg-white border-bottom shadow-sm slide-in delay-1 position-relative" style="z-index: 1030;">
  <div class="container d-flex justify-content-between align-items-center py-3 position-relative">
    <div class="logo">
      <img src="{{ asset('images/ChatGPT Image Jun 8, 2025, 04_06_43 PM.png') }}" alt="cleaner image" height="80" />
    </div>
    <nav class="navbar navbar-expand-lg">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navMenu">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item"><a class="nav-link" href="#services">Services/pricing</a></li>
          <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About Us</a></li>
        </ul>
        <div class="d-flex flex-column flex-md-row gap-2">
          <a href="{{ route('register') }}?user_type=cleaner" class="btn btn-outline-success">Sign Up as Cleaner</a>
          <a href="{{ route('register') }}?user_type=recruiter" class="btn btn-outline-success">Sign Up as Customer</a>
          <a href="{{ route('login') }}" class="btn btn-success">Log In</a>
        </div>
      </div>
                </nav>
  </div>
        </header>
<section class="hero py-5 bg-white slide-in delay-2">
  <div class="container d-flex flex-column flex-md-row align-items-center">
    <div class="hero-text me-md-4 mb-4 mb-md-0">
      <h1 class="text-success">Professional Virtual Cleaning Services</h1>
      <p class="lead">Instantly schedule virtual cleaning consultations for your digital and physical spaces.</p>
      <div class="d-flex flex-column flex-md-row gap-3">
        <a href="{{ route('register') }}?user_type=recruiter" class="btn btn-success w-100 w-md-auto text-center">Sign up as a customer</a>
        <a href="{{ route('register') }}?user_type=cleaner" class="btn btn-success w-100 w-md-auto text-center">Sign up as a cleaner</a>
      </div>
    </div>
    <div class="heroimg">
      <img src="{{ asset('images/ChatGPT Image Jun 8, 2025, 11_17_38 PM.png') }}" class="img-fluid" alt="Cleaner image" style="max-width: 600px;" />
    </div>
  </div>
</section>
<section id="services" class="services py-5 bg-white slide-in delay-3">
  <div class="container">
    <h2 class="text-center text-success mb-4">Services</h2>
    <div class="row g-4">
      <div class="col-md-3 col-sm-6" >
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">Pubs, Clubs & Hotels</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">Retail Cleaning</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">Strata Cleaning</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">Industrial Cleaning</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">Medical Cleaning</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">Event & Festival Cleaning</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
        </div>
      </div>
      <div class="col-md-3 col-sm-6">
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">Office Cleaning</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
                </div>
                </div>
      <div class="col-md-3 col-sm-6">
        <div class="p-3 border rounded bg-light">
          <h5 class="text-success">School Cleaning</h5>
          <p>Regular Cleaning: $25–50/hour</p>
          <p>Deep Cleaning: $50–100/hour</p>
        </div>
      </div>
    </div>
  </div>
</section>
<footer class="text-center py-4 bg-light mt-5">
  <p class="mb-0">© 2025 CleaningPro. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
