<x-layout>
  <x-nav/>
  <div class="container-fluid bg-custom prefooterwelc mt-5">
      <div class="row d-flex mx-0 justify-content-center">
        <h2 class="text-center mt-5">{{__('ui.Risultati Ricerca per')}}: {{$q}}</h2>
        @foreach($announcements as $announcement)
        <div class="col-12 col-md-5 lg-4 d-flex justify-content-center ">
            <div class="my-card">
                <div class="imgBox">
                  <img src="https://via.placeholder.com/300x150.png" alt="">
                </div>

                <div class="my-card-content">
                    <h4 class="text-white">{{$announcement->product}}</h4>

                  <h3 class="text-center">{{__('ui.Categoria')}} <br>
                  <a href="{{route("categoryFilter", [$announcement->category->name, $announcement->category->id])}}">{{$announcement->category->name}}</a></h3>
                  <h2 class="price">{{$announcement->price}}€</h2>
                  <a href="{{route("detailAnnouncement", compact("announcement"))}}" class="btn btn-primary my-detail">{{__('ui.Dettaglio')}}</a>
                </div>
              </div>
        </div>
        @endforeach
      </div>
  </div>
</x-layout>