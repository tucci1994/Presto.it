<x-layout>
    <x-nav/>
  <div class="mt-5 py-3">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @if(session('message'))
    <div class="success alert-success my-mex" >
        {{session('message')}}
    </div>
    @endif

    @if (session ('access.denied.revisor.only'))
    <div class="alert-danger">{{__('ui.Accesso no')}}</div>
    @endif
  </div>

    <form method="POST" action="{{route("store")}}">
        @csrf
        <section class="vh-70 my-5">
            <div class="container py-5 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card shadow-2-strong" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">
                                <h3>{{__('ui.Inserisci annuncio')}}</h3>
                                <input type="hidden" name="uniqueSecret" value="{{$uniqueSecret}}">

                                <div class="mb-3 my-5">
                                    <label for="exampleInputEmail1" class="form-label">{{__('ui.Nome prodotto')}}</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" name="product" value="{{old("product")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">{{__('ui.Prezzo')}}</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" name="price" value="{{old("price")}}">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">{{__('ui.Marca')}}</label>
                                    <input type="text" class="form-control" aria-describedby="emailHelp" name="brand" value="{{old("brand")}}">
                                </div>
                                <div >
                                    <label for="exampleInputEmail1" class="form-label">{{__('ui.Descrizione')}}</label>
                                    <textarea type="text" name="description"cols="55" rows="3" class="form-control" value="{{old("description")}}"></textarea> <br>
                                </div>
                                <select name="category" class="my-3">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select> <br>
                                <div class="form-group row">
                                    <label for="images" class="col-md-12 col-for-label text-md-right">
                                      {{__('ui.Immagini')}}
                                    </label>
                                    <div class="col-md-12">
                                      <div class="dropzone" id="drophere">
                                         @error('images')
                                          <span class="invalid-feedback" role="alert">
                                            <strong>{{$message}}</strong>
                                          </span>
                                         @enderror
                                      </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary mt-3">{{__('ui.Aggiungi')}}</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>
</x-layout>
