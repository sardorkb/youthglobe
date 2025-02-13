<!-- Modal for Editing tag -->
<div class="modal fade" id="editTagModal-{{ $tag->id }}" tabindex="-1" aria-labelledby="editTagModalLabel-{{ $tag->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="edittagModalLabel-{{ $tag->id }}">Edit - {{ $tag->title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Edit tag Form Inside Modal -->
          <form method="POST" action="{{ route('post-tag.update', $tag->id) }}">
              @csrf
              @method('PATCH')

              <div class="modal-body">
                  <!-- Title Input -->
                  <div class="form-group">
                      <label for="inputTitle" class="col-form-label">Tag title</label>
                      <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{ $tag->title }}" class="form-control">
                      @error('title')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <!-- Status Select -->
                  <div class="form-group">
                      <label for="status" class="col-form-label">Status</label>
                      <select name="status" class="form-control">
                          <option value="active" {{ $tag->status == 'active' ? 'selected' : '' }}>Active</option>
                          <option value="inactive" {{ $tag->status == 'inactive' ? 'selected' : '' }}>Not active</option>
                      </select>
                      @error('status')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>
              </div>

              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success">Update</button>
              </div>
          </form>
      </div>
  </div>
</div>