  <header class="">
      <nav class="navbar navbar-expand-lg">
          <div class="container">
              <a class="navbar-brand" href="{{ route('home') }}">
                  <h2>Sixteen <em>Clothing</em></h2>
              </a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarResponsive">
                  <ul class="navbar-nav ml-auto">
                      <li class="nav-item active">
                          <a class="nav-link" href="{{ route('home') }}">Home
                              <span class="sr-only">(current)</span>
                          </a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#product">Our Products</a>
                      </li>
                      <li class="nav-item">
                          <a class="nav-link" href="#about">About Us</a>
                      </li>
                      <li class="nav-item ">
                          <a class="nav-link" href="#contact">Contact Us</a>
                      </li>
                      <li class="nav-item">
                          @if (Route::has('login'))
                              @auth
                          <li class="nav-item ">
                              <a class="nav-link" href="{{ route('show-cart') }}">
                                  <i class="fas fa-shopping-cart ms-1"></i>
                                  Cart[{{ $count }}]
                              </a>
                          </li>
                          <x-app-layout>

                          </x-app-layout>
                      @else
                          <li class="nav-item"><a href="{{ route('login') }}" class="nav-link">Log in</a>
                          </li>

                          @if (Route::has('register'))
                              <li class="nav-item">
                                  <a href="{{ route('register') }}" class="ml-4 nav-link">Register</a>
                              </li>
                          @endif
                      @endauth
              </div>
              @endif
              </li>
              </ul>
          </div>
          </div>
      </nav>
  </header>
