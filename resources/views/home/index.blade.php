<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Matics Profile Website</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/dummywebmatics/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="icon" type="image/png" href="/dummywebmatics/image/logo.png">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
      <div class="container">
        <a class="navbar-brand" href="#">
          <img src="/dummywebmatics/image/logo.png" width="198" height="81" class="d-inline-block align-top" alt="Logo" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> About </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownAbout">
                <a class="dropdown-item" href="#">Overview</a>
                <a class="dropdown-item" href="#">Mission & Vision</a>
                <a class="dropdown-item" href="#">History</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownResearch" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Research </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownResearch">
                <a class="dropdown-item" href="#">Projects</a>
                <a class="dropdown-item" href="#">Publications</a>
                <a class="dropdown-item" href="#">Collaborations</a>
              </div>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTeam" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Team </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdownTeam">
                <a class="dropdown-item" href="#">Our Members</a>
                <a class="dropdown-item" href="#">Leadership</a>
                <a class="dropdown-item" href="#">Join Us</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">News</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- hero -->
    <section class="video-bg" style="border-top: 2px solid #073d6c">
      <video autoplay muted loop>
        <source src="/dummywebmatics/WebMatics.mp4" type="video/mp4" />
      </video>
      {{-- <h1 class="text-center">this sould be video</h1> --}}
    </section>
    <!-- end hero -->

    <!-- news -->
<section class="news py-5">
  <div class="container">
    <h1 class="text-center font-weight-bold pb-5">News Site</h1>
    <div class="content-wrapper">
      @foreach($newscrud as $news)
      <div class="news-card">
        <a target="_blank" href="{{route('news.show',['news'=>$news->id])}}" class="news-card__card-link"></a>
        <img src="{{ asset('image/'.$news->image) }}" alt="" class="news-card__image" />
        <div class="news-card__text-wrapper">
          <h2 class="news-card__title">{{ $news->title }}</h2>
          <div class="news-card__post-date">{{ $news->created_at->format('M d, Y') }}</div>
          <div class="news-card__details-wrapper">
            <p class="news-card__excerpt">{{ $news->description }}</p>
            <a href="#" class="news-card__read-more">Read more <i class="fas fa-long-arrow-alt-right"></i></a>
          </div>
        </div>
      </div>
      @endforeach
    </div>
    <div class="d-flex justify-content-center py-3">
      <a href="#"> <button class="btn btn-primary">Lihat Selengkapnya</button></a>
    </div>
  </div>
</section>
<!-- end news -->


    <!-- team section -->
<section class="team py-5">
  <div class="container">
    <h2 class="text-center font-weight-bold mb-4">Meet Our Team</h2>
    <hr style="border-color: black">
    
    <h3 class="text-center font-weight-bold mb-3">Dosen</h3>
    <div class="row">
      @if(count($dosenMembers) > 0)
        @foreach($dosenMembers as $member)
        <div class="col-md-4 mt-4">
          <div class="card profile-card-5">
              <div class="card-img-block">
                  <img class="card-img-top" src="{{ asset('image/' . $member->image) }}" alt="Card image cap">
              </div>
              <div class="card-body pt-0">
                  <h5 class="card-title">{{ $member->nama }}</h5>
                  <p class="card-text font-weight-bold" >Status: {{ $member->status }}</p>
                  <a href="{{$member->link}}" target="_blank" style="text-decoration: none"><button class="btn btn-primary">Link Scholar</button></a>
                </div>
              </div>
            </div>
        @endforeach
      @else
        <div class="col-md-12 text-center">
          <p class="font-weight-bold">Member Kosong</p>
        </div>
      @endif
    </div>

    <hr style="border-color: black">

    <h3 class="text-center font-weight-bold py-3">Mahasiswa</h3>
    <div class="row">
      @if(count($mahasiswaMembers) > 0)
        @foreach($mahasiswaMembers as $member)
        <div class="col-md-4 mt-4">
          <div class="card profile-card-5">
              <div class="card-img-block">
                  <img class="card-img-top" src="{{ asset('image/' . $member->image) }}" alt="Card image cap">
              </div>
              <div class="card-body pt-0">
                  <h5 class="card-title">{{ $member->nama }}</h5>
                  <p class="card-text font-weight-bold" >Status: {{ $member->status }}</p>
                  <a href="{{$member->link}}" target="_blank" style="text-decoration: none"><button class="btn btn-primary">Link Scholar</button></a>
                </div>
              </div>
            </div>
        @endforeach
      @else
        <div class="col-md-12 text-center">
          <p class="font-weight-bold">Member Kosong</p>
        </div>
      @endif
    </div>
  </div>
</section>


    <!-- end team section -->

    <!-- content -->
    <section class="content py-5">
      <div class="container">
        <div class="row">
          <div class="col-md-4 mb-4">
            <div class="wrapper">
              <img src="/dummywebmatics/image/imgdummy.png" class="mx-auto d-block pb-3" style="max-width: 100px" alt="" />
              <div class="body">
                <h5 class="text-center">Lorem Ipsum</h5>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae vero neque numquam, harum laborum modi.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="wrapper">
              <img src="/dummywebmatics/image/imgdummy.png" class="mx-auto d-block pb-3" style="max-width: 100px" alt="" />
              <div class="body">
                <h5 class="text-center">Lorem Ipsum</h5>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae vero neque numquam, harum laborum modi.</p>
              </div>
            </div>
          </div>
          <div class="col-md-4 mb-4">
            <div class="wrapper">
              <img src="/dummywebmatics/image/imgdummy.png" class="mx-auto d-block pb-3" style="max-width: 100px" alt="" />
              <div class="body">
                <h5 class="text-center">Lorem Ipsum</h5>
                <p class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae vero neque numquam, harum laborum modi.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end content section -->

    <!-- footer -->
    <div class="footer mt-5">
      <footer class="text-white text-center text-lg-start bg-primary">
        <div class="container p-4">
          <div class="row mt-4">
            <div class="col-lg-6 col-md-12 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-4 text-left">Kontak</h5>
              <img src="/dummywebmatics/image/footerimg.png" class="d-flex justify-content-start" width="312" height="83" alt="footerimg" />

              <div class="d-flex flex-row align-items-center">
                <i class="fa-solid fa-location-dot"></i>
                <p class="text-left py-3 mb-0 ml-2">
                  Gedung H Lantai 6 Universitas Dian Nuswantoro, <br />
                  Jl. Imam Bonjol No.207, Pendrikan Kidul, Kec. <br />
                  Semarang Tengah, Kota Semarang, Jawa Tengah <br />
                  50131
                </p>
              </div>
              <div class="d-flex flex-row align-items-center">
                <i class="fa-solid fa-phone"></i>
                <p class="text-left py-3 mb-0 ml-2">08123456789</p>
              </div>
              <div class="d-flex flex-row align-items-center">
                <i class="fa-regular fa-envelope"></i>
                <p class="text-left py-3 mb-0 ml-2">Labmatics@gmail.com</p>
              </div>

              <div class="mt-4">
                <!-- Youtube -->
                <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-youtube"></i></a>
                <!-- Tiktok -->
                <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-tiktok"></i></a>

                <!-- Facebook -->
                <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-facebook-f"></i></a>
                <!-- Dribbble -->
                <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-instagram"></i></a>
                <!-- Twitter -->
                <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-twitter"></i></a>
                <!-- Google + -->
                <a type="button" class="btn btn-floating btn-primary btn-lg"><i class="fab fa-linkedin"></i></a>
                <!-- Linkedin -->
              </div>
            </div>
            <!--Grid column-->

            <!--Grid column-->
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <h5 class="text-uppercase mb-4">Lorem Ipsum</h5>

              <table class="table text-center text-white">
                <tbody class="font-weight-normal">
                  <tr>
                    <td>Lorem ipsum dolor sit amet.</td>
                  </tr>
                  <tr>
                    <td>Lorem ipsum dolor sit amet.</td>
                  </tr>
                  <tr>
                    <td>Lorem ipsum dolor sit amet.</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <!--Grid column-->
          </div>
          <!--Grid row-->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
          © 2024 Copyright:
          <a class="text-white" href="#">Lab Matics</a>
        </div>
        <!-- Copyright -->
      </footer>
    </div>
    <!-- end footer -->

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </body>
</html>
