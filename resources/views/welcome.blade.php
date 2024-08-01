<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>KJDA</title>
    <link rel="icon" type="image/x-icon" href="favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Henny+Penny&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee:ital@0;1&display=swap" rel="stylesheet">
</head>
<body class="antialiased">
    <nav class="navbar navbar-expand-lg navbar-custom">
      <a class="navbar-brand" href="{{ url('/') }}">
          <img src="{{ asset('assets/logo.png') }}" alt="KJDA Logo">
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="henny-penny-regular navbar-nav mr-auto">
              <li class="nav-item">
                <a class="nav-link menu-item" href="#home">Home <span class="sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-item" href="#about">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-item" href="#admission">Admission</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-item" href="#curriculum">Curriculum</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-item" href="#videos">Videos</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-item" href="#gallery">Gallery</a>
              </li>
              <li class="nav-item">
                <a class="nav-link menu-item" href="#contact">Contact</a>
              </li>
              @auth
                @if (Auth::user()->role_id == 1)
                <li class="nav-item">
                <a class="nav-link btn btn-success btn-sm" href="{{ route('superadmin.dashboard') }}"> Go to Dashboard</a>
              </li>    
                @elseif (Auth::user()->role_id == 2)
                <li class="nav-item">    
                <a href="{{ route('admin.dashboard') }}" class="nav-link btn btn-success btn-sm">Go to Dashboard</a>
                </li
                @elseif (Auth::user()->role_id == 3)
                <li class="nav-item"> <a href="{{ route('manager.dashboard') }}" class="nav-link btn btn-success btn-sm">Go to Dashboard</a>
</li>@elseif (Auth::user()->role_id == 4)
                <li class="nav-item">
                      <a href="{{ route('parent.dashboard') }}" class="nav-link btn btn-success btn-sm">Go to Dashboard</a>
</li>@elseif (Auth::user()->role_id == 5)
                <li class="nav-item">    
                <a href="{{ route('teacher.dashboard') }}" class="nav-link btn btn-success btn-sm">Go to Dashboard</a>
</li>@elseif (Auth::user()->role_id == 6)
                <li class="nav-item">   
                <a href="{{ route('driver.dashboard') }}" class="nav-link btn btn-success btn-sm">Go to Dashboard</a>
</li>
                    @elseif (Auth::user()->role_id == 7)
                    <li class="nav-item "> <a href="{{ route('staff.dashboard') }}" class="nav-link btn btn-success btn-sm">Go to Dashboard</a>
</li> @else
                    <a href="{{ url('/') }}" class="nav-link menu-item">Home</a>
                @endif
            @else
            <li class="nav-item">
                <a style="color:white;" class="nav-link menu-item" href="{{ route('login') }}">Login</a>
            </li>
              @if (Route::has('register'))
            <li class="nav-item">
                <a style="color:white;font-weight:bold" class="nav-link menu-item" href="{{ route('register') }}">Register</a>
            </li>
            @endif
            @endauth
              
          </ul>
      </div>
    </nav>

  <!-- Welcome Section with Full-width Carousel -->

  <section id="home">
    <!-- Top content -->
    <div class="top-content">
      <!-- Carousel -->
      <div id="daycareCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#daycareCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#daycareCarousel" data-slide-to="1"></li>
            <li data-target="#daycareCarousel" data-slide-to="2"></li>
            <li data-target="#daycareCarousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="{{ asset('assets/slider/1.JPG') }}" class="d-block w-100" alt="Community Engagement">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="abeezee-regular"><b>Community Engagement</b></h5>
                <p>with Deputy Minister for Community Development, Gender, Women, and Special Groups</p>
            </div>
        </div>
        <div class="carousel-item">
          <img src="{{ asset('assets/slider/2.jpg') }}" class="d-block w-100" alt="Hon. Mwanaidi Ally Khamis">
          <div class="carousel-caption d-none d-md-block">
              <h5 class="abeezee-regular"><b>Hon. Mwanaidi Ally Khamis</b></h5>
              <p>We are grateful for your insights and the valuable time you spent with our students and staff.</p>
          </div>
      </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/slider/3.jpg') }}" class="d-block w-100" alt="Educational Adventure">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="chicle-regular">Educational Adventure</h5>
                    <p>Our students embarked on an exciting study tour, exploring new environments and gaining hands-on learning experiences.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('assets/slider/4.jpg') }}" class="d-block w-100" alt="Outdoor Play">
                <div class="carousel-caption d-none d-md-block">
                    <h5 class="chicle-regular">Outdoor Play</h5>
                    <p>Exploring the outdoors is always fun!</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#daycareCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#daycareCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
      <!-- End carousel -->
    </div>
  </section>
  <section class="welcome-text">
    <h2 class="abeezee-regular"><strong>Welcome to Kiddie Junction Daycare Academy</strong></h2>
    <h4>Building a brighter future for your children.</h4> <br>    

    @if (!Auth::check())
        <a href="{{ route('login') }}" class="btn btn-sm login-btn abeezee-regular"><b>Login</b></a>      
    <p style="padding-top:8px;">To View Your Child's Activities</p>
    @endif
</section>

  <!-- About Section with Image -->
  <section id="about" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
        <h2 style="padding-bottom:30px;" class="henny-penny-regular"><strong>About Kiddie Junction Daycare</strong></h2>
            <p>Welcome to Kiddie Junction Daycare Academy, where we provide exceptional care and education for your children. Our daycare offers a nurturing environment that promotes learning and development through play-based activities and structured curriculum.</p>
            <p>We take pride in offering comprehensive services to meet the needs of busy families. This includes providing nutritious lunches prepared on-site and safe transportation options to and from our daycare facilities.</p>
            <p>At Kiddie Junction, we stand out with our unique feature of incorporating nature-based learning experiences into our curriculum. From outdoor play areas to gardening activities, we encourage children to explore and appreciate the natural world.</p>
        </div>
        <div class="col-md-6">
          <img src="{{ asset('assets/slider/about.png') }}" class="about-image img-fluid" alt="About Image">
        </div>
      </div>
    </div>
  </section>

  <!-- Admission Section -->
  <section id="admission" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center mb-4">
          <h2 class="section-title abeezee-regular"><strong>Admission</strong></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <img src="{{ asset('assets/slider/admission.png') }}" class="admission-image img-fluid" alt="Admission Image">
        </div>
        <div class="col-md-6">
          <h3 class="chicle-regular">Enroll Your Child Today</h3>
          <p>We are delighted that you are considering enrolling your child with us. Here’s what you need to know about our admission process:</p>
                <ul>
                    <li><strong>Application Process:</strong> To start the admission process, please fill out our <a href="#" target="_blank">online application form</a> or visit our daycare center.</li>
                    <li><strong>Age Requirements:</strong> We accept children aged 2 to 5 years old into our programs.</li>
                    <li><strong>Documents Needed:</strong> Please prepare your child’s birth certificate, immunization records, and any legal custody documents (if applicable).</li>
                    <li><strong>Tours and Visits:</strong> We encourage parents to schedule a tour of our facilities to see our classrooms and meet our educators.</li>
                    <li><strong>Enrollment Slots:</strong> Enrollment availability may vary, so we recommend contacting us early to secure a spot for your child.</li>
                </ul>
                <p>Our team is here to assist you with any questions you may have regarding enrollment or our programs.</p>
            </div></div>
        
      </div>
    </div>
  </section>

  <!-- Curriculum Section -->
  <section id="curriculum" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center mb-4">
          <h2 class="section-title abeezee-regular"><strong>Our Curriculum</strong></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="feature-icon text-center mb-3">
            <i class="fas fa-paint-brush"></i>
          </div>
          <h3 class="feature-title text-center">Creative Arts</h3>
          <p class="text-center">Promoting creativity through art and crafts, allowing children to explore and express themselves artistically.</p>
          <img src="{{ asset('assets/slider/arts.png') }}" class="arts-image img-fluid" alt="Arts Image">
        </div>
        <div class="col-md-4">
          <div class="feature-icon text-center mb-3">
            <i class="fas fa-book"></i>
          </div>
          <h3 class="feature-title text-center">Literacy Development</h3>
          <p class="text-center">Fostering reading and language skills through storytelling, encouraging children to explore the world of words and imagination.</p>
          <img src="{{ asset('assets/slider/literacy.png') }}" class="literacy-image img-fluid" alt="Literacy Image">
        
        </div>
        <div class="col-md-4">
          <div class="feature-icon text-center mb-3">
            <i class="fas fa-seedling"></i>
          </div>
          <h3 class="feature-title text-center">Outdoor Activities</h3>
          <p class="text-center">Exploring nature and promoting physical development through engaging outdoor play activities.</p>
          <img src="{{ asset('assets/slider/outdoor.png') }}" class="outdoor-image img-fluid" alt="Outdoor Image">
        
        </div>
      </div>
    </div>
  </section>

  <!-- Videos Section -->
  <section id="videos" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center mb-4">
          <h2 class="section-title abeezee-regular"><strong>Explore Our Videos</strong></h2>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6">
          <div class="video-container">
            <iframe src="https://drive.google.com/file/d/18gMcg-S-Wbis_pbmmJS15X4shyBUblHW/preview" width="560" height="315" allow="autoplay" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-6">
          <div class="video-container">
            <iframe src="https://drive.google.com/file/d/1dKE6fiJa-n59DOXJeSb_aBcpVQj2-fUb/preview" width="560" height="315" allow="autoplay" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        </div>
        <br><br>
        <div class="row">
        <div class="col-md-3">
          <div class="video-container">
            <iframe src="https://drive.google.com/file/d/1fvFWrCEqHQi4BwYcAdWj_xgM0HUyS_B5/preview" width="360" height="315" allow="autoplay" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-3">
          <div class="video-container">
            <iframe src="https://drive.google.com/file/d/15G-qxC8Fg6yBMcjW83BW_8Ki6h3lQ1Zf/preview" width="360" height="315" allow="autoplay" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-3">
          <div class="video-container">
            <iframe src="https://drive.google.com/file/d/1aGZvq5XMYcoxZP-KWpZOQ2HRsSh18HKe/preview" width="360" height="315" allow="autoplay" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        <div class="col-md-3">
          <div class="video-container">
            <iframe src="https://drive.google.com/file/d/1OBma_sFm2pcqvDEIbmQhq4J34VRfMtBc/preview" width="360" height="315" allow="autoplay" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <!-- Gallery Section -->
  <section id="gallery" class="py-5">
    <div class="container">
      <div class="row">
        <div class="col text-center mb-4">
          <h2 class="section-title abeezee-regular"><strong>Gallery</strong></h2>
        </div>
      </div>
      <div class="row">
        <!-- Gallery images here -->
        <div class="col-md-4">
          <img src="{{ asset('assets/slider/NW-Visit.png') }}" class="gallery-image img-fluid" alt="Gallery Image 1">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('assets/slider/NW-Visit-1.png') }}" class="gallery-image img-fluid" alt="Gallery Image 2">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('assets/slider/eating.png') }}" class="gallery-image img-fluid" alt="Gallery Image 3">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('assets/slider/relaxing.png') }}" class="gallery-image img-fluid" alt="Gallery Image 4">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('assets/slider/team.png') }}" class="gallery-image img-fluid" alt="Gallery Image 5">
        </div>
        <div class="col-md-4">
          <img src="{{ asset('assets/slider/buses.png') }}" class="gallery-image img-fluid" alt="Gallery Image 6">
        </div>
      </div>
    </div>
  </section>

  <!-- Contact Section with Social Links -->
  <section id="contact" class="container-fluid">
    <div class="row">
        <div class="col text-center mb-4">
          <h2 class="section-title henny-penny-regular"><strong>Contact Us</strong></h2>
        </div>
      </div>
      <div class="row">
        <div class="welcome-text col-md-12">
          <p>For inquiries or more information, please contact us at:</p>
          <p><b>Phone: +255 655 981 822 / +255 754 461 029</b></p>
          <p>Email: info@kiddiejunctiondaycareacademy.com / kiddiejunction2015@gmail.com</p>
          <p><a href="https://www.facebook.com/superbrilliant/?ref=page_internal&locale=ar_AR&_rdr"><i class="fab fa-facebook fa-2x text-warning mr-3"></i></a>
          <a href="https://www.instagram.com/kiddiejunction_daycare_academy/"><i class="fab fa-instagram fa-2x text-warning mr-3"></i></a></p>
          
      </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container text-center">
      <p>&copy; 2024 Kiddie Junction Daycare Academy. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap JS, jQuery, Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <!-- Font Awesome JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>

</body>
</html>
