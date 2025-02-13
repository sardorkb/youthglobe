@extends('layouts.master')

@section('title', 'Partner Details')

@section('main-content')
<div class="container">
    <h2>Partner Details</h2>
    <form method="POST" action="{{ route('partner.details.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="type">Partner Type</label>
            <select name="type" id="type" class="form-control">
                <option value="local" {{ old('type') == 'local' ? 'selected' : '' }}>Local</option>
                <option value="global" {{ old('type') == 'global' ? 'selected' : '' }}>Global</option>
            </select>
            @error('type')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" id="company_name" class="form-control" value="{{ old('company_name') }}">
            @error('company_name')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" value="{{ old('address') }}">
            @error('address')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="phone_number">Phone Number</label>
            <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}">
            @error('phone_number')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="additional_email">Additional Email</label>
            <input type="email" name="additional_email" id="additional_email" class="form-control" value="{{ old('additional_email') }}">
            @error('additional_email')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="year_of_establishment">Year of Establishment</label>
            <input type="text" name="year_of_establishment" id="year_of_establishment" class="form-control" value="{{ old('year_of_establishment') }}">
            @error('year_of_establishment')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="cert_license_file">Certificate/License File (Optional)</label>
            <input type="file" name="cert_license_file" id="cert_license_file" class="form-control">
            @error('cert_license_file')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <div class="form-group">
            <label for="rating">Rating (Optional)</label>
            <input type="number" name="rating" id="rating" class="form-control" value="{{ old('rating') }}" step="0.1" min="0" max="5">
            @error('rating')<div class="text-danger">{{ $message }}</div>@enderror
        </div>

        <button type="submit" class="btn btn-primary mt-3">Submit</button>
    </form>
</div>
@endsection
