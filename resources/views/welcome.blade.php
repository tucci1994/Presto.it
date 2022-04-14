<x-layout>

  <x-nav3/>

  <div class="container-fluid p-0">
    <div class="video-wrapper">
      <video playsinline autoplay muted loop poster="cake.jpg">
        <source src="video/video.mp4" type="video/webm">
        </video>
        <div class="row margin-top-head">
          <div class="col-12 text-center">
            <h1
            class="display-1 fw-bold text-white mb-5"
            data-aos="fade-up"
            data-aos-duration="1000"
            data-aos-easing="ease-in"
            data-aos-once="true">Presto<span class="tx1">.</span><span class="tx2">it</span>
          </h1>
          <h3 class="display-4 text-white"
          data-aos="fade-up"
          data-aos-duration="1000"
          data-aos-easing="ease-in"
          data-aos-once="true">{{__('ui.Cerca tra i nostri')}} <span class="fw-bold text-white">{{__('ui.annunci')}}</span></h3>
        </div>

        <div class="row d-flex justify-content-center">
          <div class="col-9 text-center">
            <div class="input-group mb-3 my-4 input-search justify-content-center">
              <form class="w-100" method="GET" action="{{route('search')}}">
                <div class="d-flex">
                  <input type="text" class="form-control rounded-0" placeholder="{{__('ui.Cerca annuncio')}}" aria-label="Recipient's username" aria-describedby="button-addon2" name="q">
                  <button class="btn-light btn-outline-secondary rounded-0" type="submit" id="button-addon2">{{__('ui.Cerca')}}</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container bg-cerca-annuncio my-5 py-5 margin-top">
    <div class="row d-flex  justify-content-center">
      <div class="col-12 col-md-6 text-center">
        <h3 class="display-4 mb-5 fw-bold mt-5 color-custom">{{__('ui.Inserisci annuncio')}} <span class="color-text-main fw-bold"></span></h3>
      </div>
      <div class="container-fluid">
        <div class="row d-flex  justify-content-center">
          <div class="col-12 text-center">
            <a class="btn btn-light btn-custom-inserisci" href="{{route("createAnnouncement")}}">{{__('ui.Inserisci annuncio')}}</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="container mt-5 margin-top">
    <div class="row justify-content-center">
      <div class="col-lg-2 col-md-6 ">
        <div class="wrimagecard wrimagecard-topimage card-category" data-category="1">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Abbigliamento', 'id' => 1]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color:rgba(187, 120, 36, 0.1) "><center><i class="fa fa-shirt" style="color:#BB7824"></i><h5 class="padding-text-card">{{__('ui.Abbigliamento')}}</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 2 -->

      <div class="col-lg-2 col-md-6 ">
        <div class="wrimagecard wrimagecard-topimage card-category" data-category="2">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Sport', 'id' => 2]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color: rgba(22, 160, 133, 0.1)"><center><i class="fa fa-volleyball" style="color:#16A085"></i><h5 class="padding-text-card">Sport</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 3 -->

      <div class="col-lg-2 col-md-6 card-category" data-category="3">
        <div class="wrimagecard wrimagecard-topimage">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Automobili', 'id' => 3]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color:  rgba(213, 15, 37, 0.1)"><center><i class="fa fa-car" style="color:#d50f25"></i><h5 class="padding-text-card">{{__('ui.Automobili')}}</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 4 -->

      <div class="col-lg-2 col-md-6 card-category" data-category="4">
        <div class="wrimagecard wrimagecard-topimage">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Moto', 'id' => 4]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color:  rgba(51, 105, 232, 0.1)"><center><i class="fa fa-motorcycle" style="color:#3369e8"></i><h5 class="padding-text-card">{{__('ui.Moto')}}</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 5 -->

      <div class="col-lg-2 col-md-6 card-category" data-category="5">
        <div class="wrimagecard wrimagecard-topimage ">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Videogames', 'id' => 5])}}"> -->
            <div class="wrimagecard-topimage_header" style="background-color:  rgba(250, 188, 9, 0.1)"><center><i class="fa fa-gamepad" style="color:#fabc09"></i><h5 class="padding-text-card">{{__('ui.Videogiochi')}}</h5></center>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

  <!-- CARD 6 -->
  <div class="container">
    <div class="row justify-content-center ">
      <div class="col-lg-2 col-md-6 card-category" data-category="6">
        <div class="wrimagecard wrimagecard-topimage">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Musica', 'id' => 6]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color: #72191718">
              <center><i class="fa fa-music" style="color:#721817"></i><h5 class="padding-text-card">{{__('ui.Musica')}}</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 7 -->

      <div class="col-lg-2 col-md-6 card-category" data-category="7">
        <div class="wrimagecard wrimagecard-topimage">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Libri', 'id' => 7]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color: rgb(225, 96, 54, 0.1)">
              <center><i class="fa fa-book-open" style="color:#E16036"></i><h5 class="padding-text-card">{{__('ui.Libri')}}</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 8 -->

      <div class="col-lg-2 col-md-6 card-category" data-category="8">
        <div class="wrimagecard wrimagecard-topimage">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Giocattoli', 'id' => 8]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color: rgba(43, 65, 98, 0.1)">
              <center><i class="fa fa-table-tennis-paddle-ball" style="color:#2B4162"></i><h5 class="padding-text-card">{{__('ui.Giocattoli')}}</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 9 -->

      <div class="col-lg-2 col-md-6 card-category" data-category="9">
        <div class="wrimagecard wrimagecard-topimage">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Dvd', 'id' => 9]) }}"> -->
            <div class="wrimagecard-topimage_header" style="background-color: rgba(11, 110, 79, 0.1)"><center><i class="fa fa-compact-disc" style="color:#0B6E4F"></i><h5 class="padding-text-card">Dvd</h5></center>
            </div>
          </a>
        </div>
      </div>

      <!-- CARD 10 -->

      <div class="col-lg-2 col-md-6 card-category" data-category="10">
        <div class="wrimagecard wrimagecard-topimage">
          <!-- <a href="{{ route('categoryFilter', ['name' => 'Casa', 'id' => 10])}}"> -->
            <div class="wrimagecard-topimage_header" style="background-color: rgba(92, 39, 81, 0.1)"><center><i class="fa fa-house style="color:##5C2751"></i><h5 class="padding-text-card">{{__('ui.Casa')}}</h5></center>
            </div>
          </a>
        </div>
      </div>
    </div>
  </div>

    <div class="container mt-5 prefooterwelc">

      <div class="col-12 ">
        <div class="row" id="productWrapper">
          @foreach($announcements as $announcement)
          <div class="col-12 col-sm-6 col-lg-4 d-flex justify-content-center ">
            <div class="my-card">
              <div class="imgBox">
                @foreach ($announcement->images as $image)
                  @if ($loop -> first)
                    <img src="{{$image->getUrl(300 , 150)}}" alt="">
                  @endif
                @endforeach
              </div>
              <div class="my-card-content">
                <h4 class="text-black">{{$announcement->product}}</h4>
                <h3 class="text-center text-light">{{__('ui.Categoria')}} <br>
                <a>{{$announcement->category->name}}</a></h3>
                <h2 class="price">{{$announcement->price}}€</h2>
                <a href="{{route("detailAnnouncement", compact("announcement"))}}" class="btn btn-primary my-detail">{{__('ui.Dettaglio')}}</a>
              </div>
            </div>
          </div>
            @endforeach
        </div>
      </div>


    </div>

    <script>

      var nav = document.querySelector('nav');

      window.addEventListener('scroll', function () {
        if (window.pageYOffset > 500) {
          nav.classList.add('bg-dark');
        } else {
          nav.classList.remove('bg-dark');
        }
      });
    </script>
  </x-layout>
