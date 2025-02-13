<div class="modal fade" id="addtagModal" tabindex="-1" aria-labelledby="addtagModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addtagModalLabel">Create blog tag</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <!-- Form Inside Modal -->
                    <form method="post" action="{{ route('post-tag.store') }}">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <!-- Title Input -->
                            <div class="form-group">
                                <label for="inputTitle" class="col-form-label">Tag title</label>
                                <input id="inputTitle" type="text" name="title"
                                    placeholder="Enter the tag title..." value="{{ old('title') }}"
                                    class="form-control">
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <!-- Status Select -->
                            <div class="form-group">
                                <label for="status" class="col-form-label">Status</label>
                                <select name="status" class="form-control">
                                    <option value="active">Active</option>
                                    <option value="inactive">Not active</option>
                                </select>
                                @error('status')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="modal-footer">
                            <!-- Reset and Submit Buttons -->
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>