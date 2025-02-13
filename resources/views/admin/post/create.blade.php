@extends('admin.layouts.master')
@section('title', 'Create new blog | Youth Globe')
@section('main-content')
    <h4 class="text-bold text-body-emphasis mb-5">Creating new blog...</h4>
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <!-- Title Field -->
                    <div class="col-12 col-md-6">
                        <label for="inputTitle" class="col-form-label col-12 col-md-3">Title <span
                                class="text-danger">*</span></label>
                        <input id="inputTitle" type="text" name="title" placeholder="Enter title"
                            value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Status Field -->
                    <div class="col-12 col-md-6">
                        <label for="status" class="col-form-label">Status <span class="text-danger">*</span></label>
                        <select name="status" class="form-control @error('status') is-invalid @enderror">
                            <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Active</option>
                            <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Not Active</option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <!-- Media Type Radio Buttons -->
                    <div class="col-12 col-md-12">
                        <label>Media Type <span class="text-danger">*</span></label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mediaType" id="mediaPhoto" value="photo"
                                {{ old('mediaType', 'photo') == 'photo' ? 'checked' : '' }}>
                            <label class="form-check-label" for="mediaPhoto">Upload image</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="mediaType" id="mediaYouTube"
                                value="youtube" {{ old('mediaType') == 'youtube' ? 'checked' : '' }}>
                            <label class="form-check-label" for="mediaYouTube">YouTube link</label>
                        </div>
                    </div>

                    <!-- Image Upload Field (Conditional) -->
                    <div class="col-12 col-md-6" id="photoUpload"
                        style="{{ old('mediaType', 'photo') == 'photo' ? 'display:block' : 'display:none' }}">
                        <label for="inputPhoto" class="col-form-label">Image <span class="text-danger">*</span></label>
                        <input type="file" name="photo" class="form-control @error('photo') is-invalid @enderror"
                            accept="image/*">
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- YouTube Link Field (Conditional) -->
                    <div class="col-12 col-md-6" id="youtubeLink"
                        style="{{ old('mediaType') == 'youtube' ? 'display:block' : 'display:none' }}">
                        <label for="youtube" class="col-form-label">YouTube link <span class="text-danger">*</span></label>
                        <input id="youtube" type="url" name="youtube_link" placeholder="Paste YouTube link"
                            value="{{ old('youtube_link') }}"
                            class="form-control @error('youtube_link') is-invalid @enderror">
                        @error('youtube_link')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="quote" class="col-form-label">Quote</label>
                    <textarea class="form-control @error('quote') is-invalid @enderror" id="quote" name="quote">{{ old('quote') }}</textarea>
                    @error('quote')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="summary" class="col-form-label">Summary <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary">{{ old('summary') }}</textarea>
                    @error('summary')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description" class="col-form-label">Description</label>
                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group row">
                    <!-- Category Dropdown -->
                    <div class="col-12 col-md-6">
                        <label for="post_cat_id">Category <span class="text-danger">*</span></label>
                        <select name="post_cat_id" class="form-control @error('post_cat_id') is-invalid @enderror">
                            <option value="">--Select Category--</option>
                            @foreach ($categories as $data)
                                <option value="{{ $data->id }}"
                                    {{ old('post_cat_id') == $data->id ? 'selected' : '' }}>{{ $data->title }}</option>
                            @endforeach
                        </select>
                        @error('post_cat_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Tags Dropdown -->
                    {{-- <div class="col-12 col-md-6">
                        <label for="tags">Tags</label>
                        <select name="tags[]" multiple data-live-search="true" class="form-control selectpicker">
                            @foreach ($tags as $data)
                                <option value="{{ $data->id }}"
                                    {{ in_array($data->id, old('tags', [])) ? 'selected' : '' }}>{{ $data->title }}
                                </option>
                            @endforeach
                        </select>
                        @error('tags')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div> --}}
                </div>
                <br>
                <div class="form-group mb-3">
                    <button type="reset" class="btn btn-warning">Reset</button>
                    <button class="btn btn-success" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('backend/summernote/summernote.min.css') }}">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
@endpush

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('backend/summernote/summernote.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    <script>
        $(document).ready(function() {
            // Initialize Summernote
            $('#summary').summernote({
                placeholder: "Write short description.....",
                tabsize: 2,
                height: 100
            });

            $('#description').summernote({
                placeholder: "Write detailed description.....",
                tabsize: 2,
                height: 150
            });

            $('#quote').summernote({
                placeholder: "Write detailed Quote.....",
                tabsize: 2,
                height: 100
            });

            // Initialize Bootstrap Select
            $('.selectpicker').selectpicker();

            // Media type toggle (photo or youtube)
            $('input[name="mediaType"]').change(function() {
                if ($(this).val() == 'photo') {
                    $('#photoUpload').show();
                    $('#youtubeLink').hide();
                } else {
                    $('#photoUpload').hide();
                    $('#youtubeLink').show();
                }
            });
        });
    </script>
@endpush
