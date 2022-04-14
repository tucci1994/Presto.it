<x-layout>
  <x-nav/>
  <div class="container my-margintop">
    <h2 class="my-margintop">{{__('ui.Annuncio')}} #{{$announcement->id}}</h2>
    <div class="row d-flex mt-5 d-flex justify-content-center">
      <div class="col-12 col-md-8">
        <div class="card-body">
          <div class="swiper mySwiper">
            <div class="swiper-wrapper">
              <p>
                @foreach ($announcement->images as $image)
                <div class="swiper-slide">
                  <img src="{{$image->getUrl(300 , 150)}}" alt="">
                </div>
                @endforeach
                {{$announcement->description}}
              </p>
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 mb-5">
        <h5>Dettagli</h5>
        <p class="card-title my-3">{{__('ui.Nome prodotto')}} : {{$announcement->product}}</p>
        <p class="card-text">{{__('ui.Prezzo')}} : {{$announcement->price}}€</p>
        <!-- <p class="card-text my-3">{{__('ui.Descrizione')}} : {{$announcement->description}}</p> -->
        <p class="card-text">{{__('ui.Categoria')}} : {{$announcement->category->name}}</p>
        <p class="card-text mt-3 mb-5">{{__('ui.Data Pubblicazione')}} : {{$announcement->created_at->format("d/m/Y")}}</p>
      </div>
    </div>
  </div>
</x-layout>
