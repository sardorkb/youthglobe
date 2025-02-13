<!-- Modal for Editing Category -->
<div class="modal fade" id="editCategoryModal-{{ $category->id }}" tabindex="-1" aria-labelledby="editCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="editCategoryModalLabel-{{ $category->id }}">Edit - {{ $category->title }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <!-- Edit Category Form Inside Modal -->
          <form method="POST" action="{{ route('post-category.update', $category->id) }}">
              @csrf
              @method('PATCH')

              <div class="modal-body">
                  <!-- Title Input -->
                  <div class="form-group">
                      <label for="inputTitle" class="col-form-label">Category title</label>
                      <input id="inputTitle" type="text" name="title" placeholder="Enter title" value="{{ $category->title }}" class="form-control">
                      @error('title')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                  </div>

                  <!-- Status Select -->
                  <div class="form-group">
                      <label for="status" class="col-form-label">Status</label>
                      <select name="status" class="form-control">
                          <option value="active" {{ $category->status == 'active' ? 'selected' : '' }}>Active</option>
                          <option value="inactive" {{ $category->status == 'inactive' ? 'selected' : '' }}>Not active</option>
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