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
                    <div id="table-url" data-url=""></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb__content">
                                <div class="breadcrumb__content__left">
                                    <div class="breadcrumb__title">
                                        <h2>Blogs</h2>
                                    </div>
                                </div>
                                <div class="breadcrumb__content__right">
                                    <nav aria-label="breadcrumb">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">blogs</li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="customers__area bg-style mb-30">
                                <div class="item-title">
                                    <div class="col-xs-6">
                                        <a href="{{ route('admin.blogs.create')}}" class="btn btn-md btn-info">Add Blog</a>
                                    </div>
                                </div>
                                <div class="customers__table">
                                    <table id="BrandTable"
                                        class="row-border data-table-filter table-style dataTable no-footer" role="grid"
                                        aria-describedby="BrandTable_info" style="width: 1195px;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="BrandTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Brand Name: activate to sort column descending"
                                                    style="width: 112px;">Blog title</th>
                                                <th class="sorting" tabindex="0" aria-controls="BrandTable" rowspan="1"
                                                colspan="1"
                                                aria-label="Brand Image: activate to sort column ascending"
                                                style="width: 233px;">Image</th>
                                                <th class="sorting" tabindex="0" aria-controls="BrandTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="Brand Slug: activate to sort column ascending"
                                                    style="width: 258px;">Blog Slug</th>
                                                <th class="sorting_asc" tabindex="0" aria-controls="BrandTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Brand Name: activate to sort column descending"
                                                    style="width: 112px;">Category</th>

                                                <th class="sorting" tabindex="0" aria-controls="BrandTable" rowspan="1"
                                                    colspan="1" aria-label="Status: activate to sort column ascending"
                                                    style="width: 258px;">Status</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action"
                                                    style="width: 134px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogs as $blog)
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $blog->title }}</td>
                                                <td><img src="{{ asset('uploads/blogs')}}/{{ $blog->image }}" border="0" width="70"
                                                        class="img-rounded" align="center"></td>
                                                <td>{{ $blog->slug }}</td>
                                                <td>{{ $blog->blogCategory->name }}</td>
                                                <td><span class="status active">Active</span>
                                                </td>
                                                <td>
                                                    <div class="action__buttons">
                                                        <a href="{{ route('admin.blogs.edit', $blog->id)}}"
                                                            class="btn-action" title="Edit"><i class="fas fa-pen-to-square"></i>
                                                        </a>
                                                        <form method="POST" action="{{ route('admin.blogs.delete', $blog->id) }}" class="d-inline delete-category-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn-action delete-btn" style="margin-left: 20px;">
                                                                <i class="fas fa-trash-alt"></i>
                                                            </button>
                                                        </form>
                                                        
                                                    </div>
                                                </td>
                                            </tr>                                                
                                            @endforeach

                                        </tbody>
                                    </table>
                                     <div class=" mt-4">
                                        {{ $blogs->links('pagination::bootstrap-5') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Row-->
                </div>
            </div>
            <!-- Footer section start -->
            <footer class="footer__area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="footer__copyright">
                                <div class="footer__copyright__left">
                                    <h2>2024 &copy; Fashionwave</h2>
                                </div>
                                <div class="footer__copyright__right">
                                    <h2>Designed &amp; Developed By Fashionwave</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- Footer section end -->
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const deleteButtons = document.querySelectorAll('.delete-btn');

        deleteButtons.forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                const form = this.closest('form');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3e3e3e',
                    confirmButtonText: 'Yes',
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit();
                    }
                });
            });
        });
    });
</script>

@endpush