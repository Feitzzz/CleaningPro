<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>About Us - CleaningPro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    .about-section {
      padding: 60px 0;
      background-color: #f1f8e9;
    }
    .about-section h2 {
      color: #2e7d32;
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
          <li class="nav-item"><a class="nav-link active" href="{{ route('about') }}">About Us</a></li>
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
<section class="about-section text-center">
  <div class="container">
    <h2 class="mb-4">About CleaningPro</h2>
    <p class="lead mb-4">
      At CleaningPro, we're more than just a cleaning service — we're your partners in creating healthy, spotless
      environments for homes, offices, events, schools, and businesses.
    </p>
    <p>
      Founded with a mission to deliver exceptional cleanliness, our team of vetted professional cleaners is committed
      to quality, trust, and reliability. Whether you need daily maintenance or deep cleaning for a festival, we've got
      you covered — efficiently and eco-consciously.
    </p>
    <p>
      With an easy-to-use scheduling system and customizable plans for every budget, CleaningPro ensures your space
      stays sparkling — without stress.
    </p>
  </div>
</section>
<footer class="text-center py-4 bg-light mt-5">
  <p class="mb-0">© 2025 CleaningPro. All rights reserved.</p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html> 