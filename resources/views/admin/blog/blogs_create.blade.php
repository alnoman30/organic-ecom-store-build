@extends('layouts.admin.base')
 @section('content')
        <div class="main-content">
        <!-- Header section start -->
    @include('admin.partial_header.header')
<!-- Header section end -->
        <div class="page-content-wrap">
            <!-- Container Fluid-->
            <div class="page-content">
                <div class="container-fluid">
                        <div class="row">
        <div class="col-md-12">
            <div class="breadcrumb__content">
                <div class="breadcrumb__content__left">
                    <div class="breadcrumb__title">
                        <h2>Add Blog</h2>
                    </div>
                </div>
                <div class="breadcrumb__content__right">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="gallery__area bg-style">
                <div class="gallery__content">
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-one" role="tabpanel" aria-labelledby="nav-one-tab">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-vertical__item bg-style">
                                        @if ($errors->any())
                                            <div class="alert alert-danger">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        @endif
                                        <form method="POST" action="{{ route('admin.blogs.store')}}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="d-flex justify-content-between">
                                                <div class="input_left col-md-6">
                                                    <div class="input__group mb-25">
                                                        <label>Blog Title (English)</label>
                                                        <input type="text" id="en_brand_name" name="title"
                                                            value="{{ old('title')}}" placeholder="Title (English)">

                                                    </div>
                                                    <div class="input__group mb-25">
                                                        <label>Slug</label>
                                                        <input type="text" id="brand_slug" name="slug"
                                                            value="{{ old('slug')}}" placeholder="Blog slug">
                                                    </div>
                                                        <div class="input__group mb-25">
                                                            <label>Description</label>
                                                            <textarea id="description" name="description" placeholder="Blog description"
                                                                style="width: 100%; padding: 8px; border: 1px solid #ccc; border-radius: 5px; min-height: 100px;">{{ old('description') }}</textarea>
                                                        </div>
                                                    <div class="input__group mb-25">
                                                        <label>Choose category</label>
                                                        <select name="blog_category_id" id="blog_category_id" class="form-control" required>
                                                            <option value="">-- Choose Category --</option>
                                                            @foreach ($categories as $category)
                                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="input_right col-md-5">
                                                <div class="input__group mb-25">
                                                    <label>Choose image</label>
                                                    <input type="file" name="image" id="imageInput" class="form-control" accept="image/*" 
                                                        onchange="previewImage(event)" 
                                                        style="border: 1px solid #ccc; padding: 8px; border-radius: 5px; width: 100%;">
                                                    
                                                    <div style="margin-top: 10px;">
                                                        <img id="imagePreview" src="#" alt="Image Preview" 
                                                            style="display: none; max-width: 100%; max-height: 450px; object-fit: contain; 
                                                                border: 1px solid #ccc; padding: 5px; border-radius: 8px;">
                                                    </div>
                                                </div>
                                                </div>
                                            </div>






                                             {{-- <div class="input__group mb-25">
                                                <label>Status</label>
                                                <select name="status" id="status" required>
                                                    <option value="" disabled selected>Select Status</option>
                                                    <option value="active">Active</option>
                                                    <option value="inactive">Inactive</option>
                                                </select>
                                            </div> --}}
                                            <div class="input__button">
                                                <button type="submit" class="btn btn-blue">Create</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
                </div>
            </div>

        </div>

    </div>
 @endsection


@push('scripts')
  <script>
    function previewImage(event) {
        const input = event.target;
        const preview = document.getElementById('imagePreview');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function (e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            }

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@endpush








