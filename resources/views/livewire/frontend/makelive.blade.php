<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <header>
        <div class="row">
          <div class="col mt-3">
            <h2>KKdestiny</h2>
          </div>
          <div class="Authenticate col d-flex justify-content-end justify-items-end">
            @if (Route::has('login'))
            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                @auth
                <a href="{{ url('/dashboard') }}" class="card-link btn btn-warning btn-sm">{{ auth()->user()->name }}</a>
                @else

                    <a href="{{ route('login') }}" class="card-link btn btn-info btn-sm">LOGIN</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="card-link btn btn-info btn-sm">REGISTER</a>

                    @endif
                @endauth
            </div>
             @endif
          </div>
        </div>
      </header>

      <section class="content_body mb-5">
        <div class="row d-flex justify-content-center">
          <div class="mt-5 col text-center">
              <div class="card">
                  <div class="card-body p-4">
                    <h4 class="card-title">Avalable Quotes - ( <span>{{ $count->count() }}</span> ) </h4>
                    <h5 class=" mb-2 text-muted">The Top Most Famous Quotes of All Time</h5>

                    @forelse ($quote_data as $data)
                        <div class="content_quote">
                          <h6 class=" mb-2 text-muted">Writer Name - ( <span>{{ $data->name }}</span> )</h6>
                           <p class="card-text">{{ $data->quote }}</p>
                        </div>
                    @empty
                    <div class="content_quote">
                         <p class="card-text">There is no quotes found right now! sorry</p>
                      </div>
                    @endforelse



                    <button type="button" wire:click="refresh" class="card-link btn btn-warning btn-sm mt-5">Refresh</button>

                  </div>
                </div>
          </div>

          </div>
      </section>

</div>
