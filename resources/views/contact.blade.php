<x-layout>
  <x-nav/>
     <div class="mt-5 py-3">
      @if(session('message'))
      <div class="success alert-success my-mex" >
          {{session('message')}}
      </div>
      @endif
     </div>

    <section class="vh-70 prefooterwelc">
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <h2 class="text-center mt-5 mb-4">{{__('ui.Candidati Per Diventare Revisore')}}</h2>
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                <form method= "POST" action= "{{route('contactSubmit')}}">
                  @csrf
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">{{__('ui.Email')}}</label>
                      <input type="email" class="form-control" aria-describedby="emailHelp" name="email">
                  </div>
                  <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">{{__('ui.Il tuo nome')}}</label>
                      <input type="text" class="form-control" aria-describedby="emailHelp" name="name">
                  </div>
                  <div >
                  <label for="exampleInputEmail1" class="form-label">{{__('ui.Inserisci il tuo messaggio')}} :</label>
                  <textarea name="message" cols="55" rows="3" class="form-control"></textarea><br>
                </div>
                  <button type="submit" class="btn btn-primary mt-3">{{__('ui.Contattaci')}}</button>
                  
                      <!-- label for="exampleInputEmail1" class="form-label">{{__('ui.Descrizione')}}</label>
                      <textarea name="description"cols="55" rows="3" class="form-control"></textarea> <br> -->
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
</x-layout>
