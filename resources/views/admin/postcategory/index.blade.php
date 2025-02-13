@extends('admin.layouts.master')

@section('title', 'Blog Categories | Youth Globe')

@section('main-content')
    <h2 class="text-bold text-body-emphasis mb-5">Category list</h2>
    <div id="categories" data-list='{"valueNames":["categoryTitle","status","created_at"],"page":10,"pagination":true}'>

        <!-- Search and Add Category Button -->
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search" placeholder="Search for category..."
                            aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#addCategoryModal">
                    <i class="fas fa-plus"></i> Add category
                </button>
            </div>
        </div>
        @include('admin.postcategory.create')

        <!-- Categories Table -->
        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-hover table-md fs--1 mb-0">
                    <thead>
                        <tr>
                            <th class="sort align-middle" scope="col" style="width:5%">#</th>
                            <th class="sort align-middle" scope="col" data-sort="categoryTitle" style="width:20%;">
                                Category Name</th>
                            <th class="sort align-middle" scope="col" data-sort="categoryTitle" style="width:15%;">Slug
                            </th>
                            <th class="sort align-middle" scope="col" data-sort="status" style="width:15%;">Status</th>
                            <th class="sort align-middle" scope="col" style="width:15%;">Created At</th>
                            <th class="sort align-middle" scope="col" style="width:15%;">Updated At</th>
                            <th class="sort align-middle" scope="col" style="width:20%;">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="categories-table-body">
                        @foreach ($postCategories as $category)
                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <th scope="row">{{ $loop->iteration }}</th>

                                <!-- Category Title -->
                                <td class="categoryTitle align-middle white-space-nowrap">
                                    {{ $category->title }}
                                </td>

                                <!-- Slug -->
                                <td class="align-middle">{{ $category->slug }}</td>

                                <!-- Status -->
                                <td class="align-middle status text-start">
                                    <div
                                        class="badge badge-phoenix fs-10 {{ $category->status == 'active' ? 'badge-phoenix-success' : 'badge-phoenix-warning' }}">
                                        <span class="fw-bold">{{ ucfirst($category->status) }}</span>
                                        <span
                                            class="ms-1 fas {{ $category->status == 'active' ? 'fa-check' : 'fa-exclamation' }}"></span>
                                    </div>
                                </td>

                                <!-- Created At -->
                                <td class="align-middle">{{ $category->created_at->format('Y-m-d H:i') }}</td>

                                <!-- Updated At -->
                                <td class="align-middle">{{ $category->updated_at->format('Y-m-d H:i') }}</td>

                                <!-- Actions -->
                                <td class="align-middle white-space-nowrap text-start">
                                    <div class="btn-reveal-trigger position-static">
                                        <button
                                            class="btn btn-sm dropdown-toggle dropdown-caret-none transition-none btn-reveal fs-10"
                                            type="button" data-bs-toggle="dropdown" data-boundary="window"
                                            aria-haspopup="true" aria-expanded="false" data-bs-reference="parent">
                                            <span class="fas fa-ellipsis-h fs-10"></span>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-start py-2">
                                            <!-- Edit Button that triggers the Modal -->
                                            <a class="dropdown-item" data-bs-toggle="modal"
                                                data-bs-target="#editCategoryModal-{{ $category->id }}"
                                                style="cursor: pointer;">Edit</a>

                                            <div class="dropdown-divider"></div>

                                            <!-- Delete Form -->
                                            <form method="POST"
                                                action="{{ route('post-category.destroy', $category->id) }}"
                                                class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="dropdown-item text-danger"
                                                    title="Delete">Delete</button>
                                            </form>
                                        </div>
                                        @include('admin.postcategory.edit')
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Pagination Controls -->
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                    <a class="fw-semi-bold" href="#!" data-list-view="*">View All Categories<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    <a class="fw-semi-bold d-none" href="#!" data-list-view="less">View Less<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                </div>
                <div class="col-auto d-flex">
                    <button class="page-link" data-list-pagination="prev"><span class="fas fa-chevron-left"></span></button>
                    <ul class="mb-0 pagination"></ul>
                    <button class="page-link pe-0" data-list-pagination="next"><span
                            class="fas fa-chevron-right"></span></button>
                </div>
            </div>
        </div>
    </div>
@endsection
