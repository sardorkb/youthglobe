@extends('admin.layouts.master')
@section('title', 'Partners list | Youth Glove')
@section('main-content')
    <h2 class="text-bold text-body-emphasis mb-5">Partners list</h2>
    <div id="members"
        data-list='{"valueNames":["partnerDetail","phone_number","passport","created_by","created_at"],"page":10,"pagination":true}'>
        <div class="row align-items-center justify-content-between g-3 mb-4">
            <div class="col col-auto">
                <div class="search-box">
                    <form class="position-relative" data-bs-toggle="search" data-bs-display="static">
                        <input class="form-control search-input search" type="search"
                            placeholder="Search for partner..." aria-label="Search" />
                        <span class="fas fa-search search-box-icon"></span>
                    </form>
                </div>
            </div>
            <div class="col-auto">
                <div class="d-flex align-items-center">

                </div>
            </div>
        </div>

        <div class="mx-n4 mx-lg-n6 px-4 px-lg-6 mb-9 bg-white border-y border-300 mt-2 position-relative top-1">
            <div class="table-responsive scrollbar ms-n1 ps-1">
                <table class="table table-hover table-md fs--1 mb-0">
                    <thead>
                        <tr>
                            <th class="sort align-middle" scope="col" style="width:5%">№</th>
                            <th class="sort align-middle" scope="col" data-sort="partnerDetail"
                                style="width:15%; min-width:200px;">Company name</th>
                            <th class="sort align-middle" scope="col" data-sort="passport"
                                style="width:20%; min-width:200px;">Email</th>
                            <th class="sort align-middle pe-3" scope="col" data-sort="phone_number"
                                style="width:20%; min-width:200px;">Phone number</th>
                            <th class="sort align-middle pe-3" scope="col" data-sort="created_by"
                                style="width:20%; min-width:200px;">Status</th>
                            <th class="sort align-middle" scope="col" data-sort="created_at" style="width:15%;">
                                Joined</th>
                        </tr>
                    </thead>
                    <tbody class="list" id="members-table-body">
                        @foreach ($partners as $partnerDetail)
                            <tr class="hover-actions-trigger btn-reveal-trigger position-static">
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td class="partnerDetail align-middle white-space-nowrap">
                                    <a class="d-flex align-items-center text-900 text-hover-1000"
                                        href="{{ route('partners.show', $partnerDetail->id) }}">
                                        <h6 class="mb-0 ms-3 fw-semi-bold">{{ $partnerDetail->company_name }}</h6>
                                    </a>
                                </td>
                                <td class="email align-middle white-space-nowrap">
                                    {{ $partnerDetail->partner->email ?? 'N/A' }}</td>
                                <td class="phone_number align-middle white-space-nowrap">
                                    <a class="fw-bold text-1100"
                                        href="tel:{{ $partnerDetail->phone_number }}">{{ $partnerDetail->phone_number }}</a>
                                </td>
                                <td class="created_by align-middle white-space-nowrap">
                                    <span
                                        class="badge {{ $partnerDetail->partner->status === 'active' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($partnerDetail->partner->status) }}
                                    </span>
                                </td>
                                <td class="created_at align-middle white-space-nowrap text-700">
                                    {{ $partnerDetail->created_at->format('M d, Y') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row align-items-center justify-content-between py-2 pe-0 fs--1">
                <div class="col-auto d-flex">
                    <p class="mb-0 d-none d-sm-block me-3 fw-semi-bold text-900" data-list-info="data-list-info"></p>
                    <a class="fw-semi-bold" href="#!" data-list-view="*">Barchasini ko'rish<span
                            class="fas fa-angle-right ms-1" data-fa-transform="down-1"></span></a>
                    <a class="fw-semi-bold d-none" href="#!" data-list-view="less">Qisqacha ko'rish<span
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
