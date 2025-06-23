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
                    <div id="table-url" data-url="/admin/category"></div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb__content">
                                <div class="breadcrumb__content__left">
                                    <div class="breadcrumb__title">
                                        <h2>Blog category</h2>
                                    </div>
                                </div>
                                <div class="breadcrumb__content__right">
                                    <nav aria-label="breadcrumb">
                                        <ul class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="/admin/dashboard">Home</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Blog category</li>
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
                                        <a href="{{ route('admin.blog.category.create')}}" class="btn btn-md btn-info">Add category</a>
                                    </div>
                                </div>
                                <div class="customers__table">
                                    <table id="categoryTable"
                                        class="row-border data-table-filter table-style dataTable no-footer" role="grid"
                                        aria-describedby="categoryTable_info" style="width: 1195px;">
                                        <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="categoryTable"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="category Name: activate to sort column descending"
                                                    style="width: 112px;">category Name</th>
                                                <th class="sorting" tabindex="0" aria-controls="categoryTable" rowspan="1"
                                                    colspan="1"
                                                    aria-label="category Slug: activate to sort column ascending"
                                                    style="width: 258px;">category Slug</th>
                                                <th class="sorting" tabindex="0" aria-controls="categoryTable" rowspan="1"
                                                    colspan="1" aria-label="Status: activate to sort column ascending"
                                                    style="width: 258px;">Status</th>
                                                <th class="sorting_disabled" rowspan="1" colspan="1" aria-label="Action"
                                                    style="width: 134px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $blogcat )
                                            <tr role="row" class="odd">
                                                <td class="sorting_1">{{ $blogcat->name}}</td>
                                                <td>{{ $blogcat->slug}}</td>
                                                
                                                <td><span class="status active">Active</span></td>
                                                <td>
                                                    <div class="action__buttons"><a href="category-edit.html"
                                                            class="btn-action" title="Edit"><i
                                                                class="fas fa-pen-to-square"></i></a><a href=""
                                                            class="btn-action delete" title="Delete"><i
                                                                class="fas fa-trash-alt"></i></a></div>
                                                </td>
                                            </tr>                                                
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Row-->
                </div>
            </div>

        </div>

    </div>
@endsection
