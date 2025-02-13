<div class="tab-pane fade" id="applicationList" role="tabpanel" aria-labelledby="applicationListTab">
    <div class="card mb-5">
        <div class="card-header bg-gradient-info">
            <h5 class="mb-0 text-white">My Application List</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#applyModal">Apply</a>
            </div>
            
            @if ($applications->isEmpty())
                <p>You haven't applied to any programs yet.</p>
            @else
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Program Name</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th>Last Updated</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $application)
                                <tr>
                                    <td>{{ $application->program->title }}</td> <!-- Program Name -->
                                    <td>
                                        <span class="badge {{ $application->status == 'approved' ? 'bg-success' : ($application->status == 'rejected' ? 'bg-danger' : 'bg-warning') }}">
                                            {{ ucfirst($application->status) }}
                                        </span>
                                    </td>
                                    <td>{{ $application->description ?? 'No description' }}</td> <!-- Application Description -->
                                    <td>{{ $application->updated_at->format('d M Y, h:i A') }}</td> <!-- Last Update Time -->
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>