<div class="tab-pane fade" id="programsSection" role="tabpanel" aria-labelledby="programsTab">
    <div class="card mb-5">
        <div class="card-header bg-gradient-info">
            <h5 class="mb-0 text-white">Your Programs</h5>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-3">
                <a href="{{ route('program.create') }}" class="btn btn-primary">Create a New Program</a>
            </div>
            @if ($programs->isEmpty())
                <p>You haven't created any programs yet. <a href="{{ route('partner.programs.create') }}"
                        class="btn btn-primary">Create a New Program</a></p>
            @else
                <table class="table">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Country</th>
                            <th>Deadline</th>
                            <th>Cost</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($programs as $program)
                            <tr>
                                <td>{{ $program->title }}</td>
                                <td>{{ $program->country }}</td>
                                <td>{{ \Carbon\Carbon::parse($program->deadline)->format('d M, Y') }}</td>
                                <td>$ {{ $program->cost }}</td>
                                <td>
                                    <span
                                        class="badge {{ $program->status == 'active' ? 'bg-success' : 'bg-warning' }}">
                                        {{ ucfirst($program->status) }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('program.show', $program->slug) }}"
                                        class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('program.edit', $program->slug) }}"
                                        class="btn btn-warning btn-sm">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>
