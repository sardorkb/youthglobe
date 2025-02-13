<!-- Modal -->
<div class="modal fade" id="partnerDetailsModal" tabindex="-1" aria-labelledby="partnerDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="partnerDetailsModalLabel">Add Partner Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('partner.details.store') }}" method="POST" enctype="multipart/form-data">
                @csrf <!-- Ensure CSRF protection -->
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" class="form-control" id="company_name" name="company_name" required>
                    </div>

                    <div class="mb-3">
                        <label for="address" class="form-label">Address</label>
                        <input type="text" class="form-control" id="address" name="address" required>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input type="text" class="form-control" id="phone_number" name="phone_number" required>
                    </div>

                    <div class="mb-3">
                        <label for="additional_email" class="form-label">Additional Email</label>
                        <input type="email" class="form-control" id="additional_email" name="additional_email">
                    </div>

                    <div class="mb-3">
                        <label for="year_of_establishment" class="form-label">Year of Establishment</label>
                        <input type="number" class="form-control" id="year_of_establishment" name="year_of_establishment" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="website_link" class="form-label">Website Link</label>
                        <input type="url" class="form-control" id="website_link" name="website_link">
                    </div>

                    <div class="mb-3">
                        <label for="rating" class="form-label">Rating</label>
                        <input type="number" class="form-control" id="rating" name="rating" step="0.1" min="0" max="5">
                    </div>

                    <div class="mb-3">
                        <label for="cert_license_file" class="form-label">Certificate/License File</label>
                        <input type="file" class="form-control" id="cert_license_file" name="cert_license_file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit Details</button>
                </div>
            </form>
        </div>
    </div>
</div>
