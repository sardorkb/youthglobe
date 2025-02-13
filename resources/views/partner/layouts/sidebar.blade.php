<!-- Sidebar with Partner Info -->
<div class="col-md-3">
    <div class="card">
        <div class="card-header bg-gradient-info">
            <h5 class="mb-0 text-white">General Information</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Name: </strong>{{ $partnerDetails->company_name }} </li>
                <li class="list-group-item"><strong>Email: </strong> {{ Auth::user()->email }}</li>
                <li class="list-group-item"><strong>Joined:</strong>
                    {{ Auth::user()->created_at->format('d M, Y') }}</li>
                <li class="list-group-item"><strong>Account status:</strong>
                    <span class="badge {{ Auth::user()->status == 'active' ? 'bg-success' : 'bg-warning' }}">
                        {{ ucfirst(Auth::user()->status) }}
                    </span>
                </li>
            </ul>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header bg-gradient-info">
            <h5 class="mb-0 text-white">Useful links</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Change password</li>
                <li class="list-group-item">Contact admin</li>
            </ul>
        </div>
    </div>
</div>