<x-layout>
 <x-nav/>    
  @if ($errors->any())
    <div class="alert alert-danger alert-div">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
  @endif
  <form method="POST" action="{{route("register")}}">
    @csrf
    <section class="vh-70">
      <div class="container py-5 h-100 reg-mt">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
    
                <h3 class="mb-5">{{__('ui.Registrati')}}</h3>
    
                <div class="form-outline mb-4">
                  <input type="name" name="name" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">{{__('ui.Nome utente')}}</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="email" name="email" class="form-control form-control-lg" />
                  <label class="form-label" for="typeEmailX-2">Email</label>
                </div>
    
                <div class="form-outline mb-4">
                  <input type="password" name="password" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX-2">Password</label>
                </div>

                <div class="form-outline mb-4">
                  <input type="password" name="password_confirmation" class="form-control form-control-lg" />
                  <label class="form-label" for="typePasswordX-2">{{__('ui.Conferma')}} Password</label>
                </div>
    
                <button class="btn btn-primary btn-lg btn-block" type="submit">{{__('ui.Registrati')}}</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </form>

</x-layout>