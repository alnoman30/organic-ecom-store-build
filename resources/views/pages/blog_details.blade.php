@extends('layouts.app')
@section('content')

<!-- Hero Section -->
<section class="jarallax py-5">
  <div class="hero-content py-0 py-md-5">
    <div class="container-lg d-flex flex-column d-md-block align-items-center">
      <nav class="breadcrumb">
        <a class="breadcrumb-item nav-link" href="{{ route('home') }}">Home</a>
        <a class="breadcrumb-item nav-link" href="">Blog</a>
        <span class="breadcrumb-item active">{{ $blog->title }}</span>
      </nav>
      <h1>{{ $blog->title }}</h1>
    </div>
  </div>
  <div class="jarallax-img-container">
    <img src="{{ asset('uploads/blogs/' . $blog->image) }}" class="jarallax-img" alt="{{ $blog->title }}">
  </div>
</section>

<!-- Blog Content -->
<section class="py-5">
  <div class="container-lg">
    <div class="row">
      <div class="col-lg-9">

        <article class="blog-post">
          <img src="{{ asset('uploads/blogs/' . $blog->image) }}" class="img-fluid rounded mb-4" alt="{{ $blog->title }}">

          <div class="post-meta mb-3 text-muted small d-flex gap-3">
            <span><svg width="16" height="16"><use xlink:href="#calendar"></use></svg> {{ $blog->created_at->format('d M Y') }}</span>
            <span><svg width="16" height="16"><use xlink:href="#category"></use></svg> {{ $blog->blogCategory->name ?? 'Uncategorized' }}</span>
          </div>

          <h2>{{ $blog->title }}</h2>

          <p class="lead">{{ $blog->description }}</p>

          <!-- If you use long content -->
          {{-- <div>{!! nl2br(e($blog->description)) !!}</div> --}}
        </article>

        <!-- Optional: Social Sharing -->
        <div class="mt-5">
          <h5>Share this post:</h5>
          <div class="d-flex gap-3">
            <a href="#" class="btn btn-sm btn-outline-primary">Facebook</a>
            <a href="#" class="btn btn-sm btn-outline-info">Twitter</a>
            <a href="#" class="btn btn-sm btn-outline-danger">LinkedIn</a>
          </div>
        </div>

<!-- Comment Section -->
<div class="mt-5">
  <h4>Leave a Comment</h4>
  <div id="disqus_thread"></div>
</div>

<script>
var disqus_config = function () {
    this.page.url = "{{ Request::url() }}"; // Current page URL
    this.page.identifier = "{{ $blog->slug }}"; // Unique identifier (use slug)
};

(function() {
    var d = document, s = d.createElement('script');
    s.src = 'https://YOUR_DISQUS_SHORTNAME.disqus.com/embed.js';  // Replace with your shortname
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
})();
</script>

<noscript>Please enable JavaScript to view the comments.</noscript>


      </div>

      <!-- Sidebar -->
      <div class="col-lg-3">
        <div class="sticky-top" style="top: 80px;">
          <div class="card mb-4">
            <div class="card-body">
              <h5>Blog Categories</h5>
              <ul class="list-unstyled mb-0">
                @foreach ($categories as $category)
                  <li><a href="#" class="text-decoration-none">{{ $category->name }}</a></li>
                @endforeach
              </ul>
            </div>
          </div>

          <!-- Optional: Latest Posts -->
          <div class="card">
            <div class="card-body">
              <h5>Recent Posts</h5>
              <ul class="list-unstyled">
                @foreach ($recentBlogs as $recent)
                  <li>
                    <a href="{{ route('blog.show', $recent->id) }}" class="text-decoration-none d-block mb-2">
                      {{ Str::limit($recent->title, 40) }}
                    </a>
                  </li>
                @endforeach
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>

@endsection
