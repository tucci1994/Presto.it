<x-layout>
    <x-nav/>
    @if($announcement)
    <div class="container  my-5 prefooterwelc">
        <div class="row d-flex justify-content-center my-5">
            <div class="col-md-12 mt-5">
                <div class="card mt-5 ">
                    <div class="card-header d-flex justify-content-between">{{__('ui.Annuncio')}} # {{$announcement->id}}
                        <div class="d-flex">
                                <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-xmark text-danger my-font-icon"></i></button>
                                <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-check text-success my-font-icon"></i></button>
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="staticBackdropLabel">{{__('ui.Conferma Revisione')}}</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      {{__('ui.Sei Sicuro di Procedere con la Revisione')}}
                                    </div>
                                    <div class="modal-footer">
                                        <form action="{{route('revisor.reject', $announcement->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-xmark text-danger my-font-icon"></i></button>
                                        </form>
                                        <form action="{{route('revisor.accept', $announcement->id)}}" method="POST">
                                            @csrf
                                            <button type="submit" class="btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-check text-success my-font-icon"></i></button>
                                        </form>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    </div>
                                  </div>
                                </div>
                              </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card-body">
                                <div class="row my-3">
                                    <div class="col-6 col-md-6"><h3>{{__('ui.Utente')}}:</h3></div>
                                    <div class="col-6 col-md-6">
                                        {{$announcement->user->id}},
                                        {{$announcement->user->name}},
                                        {{$announcement->user->email}},
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-6 col-md-6"><h3>{{__('ui.Titolo')}}:</h3></div>
                                    <div class="col-6 col-md-6">{{$announcement->product}}</div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-6 col-md-6"><h3>{{__('ui.Prezzo')}}:</h3></div>
                                    <div class="col-6 col-md-6">{{$announcement->price}}</div>
                                </div>

                                <div class="row">
                                    <div class="col-6 col-md-6"><h3>{{__('ui.Marca')}}:</h3></div>
                                    <div class="col-6 col-md-6">{{$announcement->brand}}</div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-6 col-md-6"><h3>{{__('ui.Categoria')}}</h3></div>
                                    <div class="col-6 col-md-6">{{$announcement->category->name}}</div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-md-6 col-lg-8">
                            <h3>{{__('ui.Immagini')}}</h3>
                            <div class="col-md-12">
                                @foreach($announcement->images as $image)
                                    <div class="row mb-2 d-flex">
                                        <div class="col-12 col-lg-6 col-xl-5">
                                            <img src="{{$image->getUrl(300 , 150)}}" alt="">
                                        </div>

                                        <div class="col-4 col-lg-2 col-xl-3 d-flex ">
                                            Adult: {{$image->adult}} <br>
                                            Violence: {{$image->violence}} <br>
                                            Spoof: {{$image->spoof}} <br>
                                            Medical: {{$image->medical}} <br>
                                            Racy: {{$image->racy}} <br>
                                        </div>
                                        <div class="col-8 col-lg-4 col-xl-4">
                                            <b>Labels</b><br>

                                                @if ($image->labels)
                                                    @foreach ($image->labels as $label)
                                                    <a>{{ $label }}</a> <span>, </span>
                                                    @endforeach
                                                @endif

                                        </div>

                                    </div>
                                @endforeach
                                </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        @else
        <h3 class="my-marginHome text-center">{{__('ui.Non ci sono annunci da revisionare')}}</h3>
        @endif
    </div>
</x-layout>
