@extends('layouts.app')
@section('content')
    <!-- Mini Banner Section -->
<section class="jarallax py-5">
    
    <div class="hero-content py-0 py-md-5">
        <div class="container-lg d-flex flex-column d-md-block align-items-center">
        <nav class="breadcrumb">
          <a class="breadcrumb-item nav-link" href="{{ route('home')}}">Home</a>
          <a class="breadcrumb-item nav-link" href="">Pages</a>
          <span class="breadcrumb-item active" aria-current="page">Blog</span>
        </nav>
        <h1>Blog</h1>
      </div>
    </div>
  <div style="position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; overflow: hidden; z-index: -100; clip-path: polygon(0px 0px, 100% 0px, 100% 100%, 0px 100%);" id="jarallax-container-0"><img src="{{ asset('assets/images/banner-1.jpg')}}" class="jarallax-img" style="object-fit: cover; object-position: 50% 50%; max-width: none; position: fixed; top: 0px; left: 0px; width: 1903px; height: 423.5px; overflow: hidden; pointer-events: none; transform-style: preserve-3d; backface-visibility: hidden; will-change: transform, opacity; margin-top: 63.75px; transform: translate3d(0px, -21.25px, 0px);"></div></section>

<div class="py-5">
      <div class="container-lg">
        <div class="row">
          @foreach ($blogs as $blog )
          <div class="col-md-4">
            <article class="post-item card border-0 shadow-sm p-3">
              <div class="image-holder zoom-effect">
                <a href="#">
                  <img src="{{ asset('uploads/blogs')}}/{{ $blog->image }}" alt="post" class="card-img-top">
                </a>
              </div>
              <div class="card-body">
                <div class="post-meta d-flex text-uppercase gap-3 my-2 align-items-center">
                  <div class="meta-date"><svg width="16" height="16"><use xlink:href="#calendar"></use></svg>{{ $blog->created_at->format('d M Y') }}</div>
                  <div class="meta-categories"><svg width="16" height="16"><use xlink:href="#category"></use></svg>{{ $blog->blogCategory->name}}</div>
                </div>
                <div class="post-header">
                  <h3 class="post-title">
                    <a href="{{ route('blog.show', $blog->slug) }}">{{ $blog->title }}</a>
                  </h3>
                  <p>{{ $blog->description }}</p>
                </div>
              </div>
            </article>
          </div>              
          @endforeach
        </div>

        <div class=" mt-4">
            {{ $blogs->links('pagination::bootstrap-5') }}
        </div>
      </div>
    </div>

    <section class="pb-4 my-4">
      <div class="container-lg">

        <div class="bg-warning pt-5 rounded-5">
          <div class="container">
            <div class="row justify-content-center align-items-center">
              <div class="col-md-4">
                <h2 class="mt-5">Download Organic App</h2>
                <p>Online Orders made easy, fast and reliable</p>
                <div class="d-flex gap-2 flex-wrap mb-5">
                  <a href="#" title="App store"><img src="images/img-app-store.png" alt="app-store"></a>
                  <a href="#" title="Google Play"><img src="images/img-google-play.png" alt="google-play"></a>
                </div>
              </div>
              <div class="col-md-5">
                <img src="images/banner-onlineapp.png" alt="phone" class="img-fluid">
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </section>

    <section class="py-4">
      <div class="container-lg">
        <h2 class="my-4">People are also looking for</h2>
        <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Blue diamon almonds</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Angie’s Boomchickapop Corn</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Salty kettle Corn</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Chobani Greek Yogurt</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Sweet Vanilla Yogurt</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Foster Farms Takeout Crispy wings</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Warrior Blend Organic</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Chao Cheese Creamy</a>
        <a href="#" class="btn btn-warning me-2 mb-2">Chicken meatballs</a>
      </div>
    </section>

    <section class="py-5">
      <div class="container-lg">
        <div class="row row-cols-1 row-cols-sm-3 row-cols-lg-5">
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#package"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>Free delivery</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#secure"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>100% secure payment</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#quality"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>Quality guarantee</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#savings"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>guaranteed savings</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="card mb-3 border border-dark-subtle p-3">
              <div class="text-dark mb-3">
                <svg width="32" height="32"><use xlink:href="#offers"></use></svg>
              </div>
              <div class="card-body p-0">
                <h5>Daily offers</h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipi elit.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection