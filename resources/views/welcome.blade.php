<x-layout>


    <div class="container-fluid">
        <div class="row h-100">
            <div class="col-12 p-0">
                <div id="carouselExampleDark" class="carousel carousel-dark slide w-100 h-100 " data-bs-theme="dark">
                    <div class="carousel-indicators">
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                      <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    </div>
                    <div class="carousel-inner">
                      <div class="carousel-item active text-center position-relative" data-bs-interval="5000">
                      <img src="/img/header.jpg" class="d-block w-100 img-fluid h-img" alt="...">
                      <div class="carousel-caption d-md-block text-w">
                        @if (session('message'))
                          <div class="alert alert-success">
                            {{ session('message') }}
                          </div>
                        @endif
                        <h1 class="display-1 mb-3 titolo">The Aulab Post</h1>
                        <p class="titolo">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, dolore!</p>

                      </div>
                      </div>
                      <div class="carousel-item position-relative" data-bs-interval="2000">
                        <img src="/img/tech_dark.jpg" class="d-block w-100 img-fluid h-img" alt="...">
                        <div class="carousel-caption d-md-block text-w">

                        <h2 class="display-1 titolo">Unisciti al nostro team</h2>
                        <p class="titolo">"Esplora le nostre opportunità di lavoro e scopri come puoi far parte della nostra squadra. Lavora con noi per creare insieme il futuro!"</p>
                        <a href="{{route('careers')}}" class="btn btn-dark btn-custom2 titolo">Lavora con noi</a>

                        </div>
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
        </div>
    </div>




    <div class="container my-5">
        <div class="row justify-content-around">
            @foreach($articles as $article)
            <x-article-card :article="$article"/>
            @endforeach
        </div>
    </div>

</x-layout>