<x-layout>
    <x-nav/>

    <div class="container bg-custom mt-5">
    <h1 class="margin-top ">Tutti gli Annunci :</h1>
    <div class="row d-flex mt-5 prefooterwelc">
      <div class="col-12 col-md-3 mt-5">
      <div class="accordion" id="accordionPanelsStayOpenExample">
          <div class="accordion-item acc-bor">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
              <button class="accordion-button text-black fw-bold my-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                  <h4>{{__('ui.Categorie')}}</h4>
              </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show acc-bor" aria-labelledby="panelsStayOpen-headingOne">
              <div class="accordion-body acc-bor" id="categoriesFilterWrapper">
                  <div id="filters-container" class="form-check d-flex flex-column">

                    <div>
                      <input class="form-check-input category-filter" type="radio" name="categoryFilter" id="all" value="" {{ !request()->category_id ? 'checked' : '' }}>
                      <a class="my-a " >{{__('ui.Tutte le categorie')}}</a>
                      <label class="form-check-label"  for="all"></label>
                    </div>

                    @foreach($categories as $category)
                    <div>
                      <input class="form-check-input category-filter" type="radio" name="categoryFilter" value="{{ $category->id }}" {{ request()->category_id == $category->id  ? 'checked' : '' }}>
                      <div>
                        <a class="my-a" >{{$category->name}}</a>
                        <label class="form-check-label"  for="all">   </label>
                      </div>
                    </div>
                    @endforeach

                  </div>
              </div>
            </div>
          </div>
          <div class="accordion-item acc-bor">
              <h2 class="accordion-header" id="headingOrder">
                <button class="accordion-button collapsed text-black fw-bold my-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#order-container" aria-expanded="false" aria-controls="pacollapseOrder">
                  <h4>{{__('ui.Ordina per')}}</h4>
                </button>
              </h2>
              <div id="order-container" class="accordion-collapse collapse {{ request()->order ? 'show' : '' }}" aria-labelledby="headingOrder">
                <div class="accordion-body">
                  <div class="form-check">
                      <input class="form-check-input order-input" type="radio" name="orderInput" value="fromOld" {{ request()->order == 'fromOld' ? 'checked' : '' }}>
                      <label class="form-check-label"  for="all">
                        <p>{{__('ui.Prezzo Crescente')}}</p>
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input order-input" type="radio" name="orderInput" value="fromNew" {{ request()->order == 'fromNew' ? 'checked' : '' }}>
                      <label class="form-check-label"  for="all">
                       <p>{{__('ui.Prezzo Decrescente')}}</p>
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input order-input" type="radio" name="orderInput"  value="alphaAsc" {{ request()->order == 'alphaAsc' ? 'checked' : '' }}>
                      <label class="form-check-label"  for="all">
                       <p> {{__('ui.Dalla A alla Z')}} </p>
                      </label>
                  </div>
                  <div class="form-check">
                      <input class="form-check-input order-input" type="radio" name="orderInput" value="alphaDec" {{ request()->order == 'alphaDec' ? 'checked' : '' }}>
                      <label class="form-check-label"  for="all">
                       <p>{{__('ui.Dalla Z alla A')}}</p>
                      </label>
                  </div>
                </div>
              </div>
          </div>
          <div class="accordion-item acc-bor">
              <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="accordion-button collapsed text-black fw-bold my-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#price-container" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                    <h4>{{__('ui.Prezzo')}}</h4>
                </button>
              </h2>
              <div id="price-container" class="accordion-collapse collapse mt-3 {{ request()->price ? 'show' : '' }}" aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <div class="form-check">
                        <input class="form-check-input order-input" type="radio" name="priceInput" value="" {{ !request()->price ? 'checked' : '' }}>
                        <label class="form-check-label"  for="all">
                          <p>{{__('ui.Tutti')}}</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input order-input" type="radio" name="priceInput" value="from0To50" {{ request()->price == 'from0To50' ? 'checked' : '' }}>
                        <label class="form-check-label"  for="all">
                          <p>{{__('ui.Da 0 a €50')}}</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input order-input" type="radio" name="priceInput"  value="from50To100" {{ request()->price == 'from50To100' ? 'checked' : '' }}>
                        <label class="form-check-label"  for="all">
                          <p> {{__('ui.Da €50 a €100')}}</p>
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input order-input" type="radio" name="priceInput"  value="from100" {{ request()->price == 'from100' ? 'checked' : '' }}>
                        <label class="form-check-label"  for="all">
                          <p> {{__('ui.Da €100')}}</p>
                        </label>
                    </div>
                </div>
              </div>
          </div>
          <div class="accordion-item acc-bor">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
              <button class="accordion-button collapsed text-black fw-bold my-accordion" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                <h4>{{__('ui.Cerca')}}</h4>
              </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
              <div class="accordion-body">
                  <div class="input-group mb-3 d-flex">
                  <form class="w-100" method="GET" action="{{route('search')}}">
                        <div class="d-flex">
                          <button class="btn btn-outline-secondary rounded-0" type="submit" id="button-addon2">{{__('ui.Cerca')}}</button>
                          <input type="text" class="form-control rounded-0" placeholder="{{__('ui.Cerca annuncio')}}" aria-label="Recipient's username" aria-describedby="button-addon2" name="q">
                        </div>
                        </form>
                  </div>
              </div>
            </div>
          </div>
        </div>
        </div>
        <div class="col-12 col-md-9">
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
                  <h4 class="text-dark">{{$announcement->product}}</h4>
                  <h3 class="text-center text-light ">{{__('ui.Categoria')}} <br>
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

 </div>

</x-layout>