<!-- Sidebar Section -->
<div class="col-md-3">
    <div class="card">
        <div class="card-header bg-gradient-info">
            <h5 class="mb-0 text-white">Persoan details</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <!-- Name -->
                <li class="list-group-item"><strong>Name:</strong> {{ Auth::user()->name }}</li>

                <!-- Passport Number -->
                <li class="list-group-item"><strong>PNFL:</strong>
                    {{ Auth::user()->passport_number ?? 'Not Provided' }}</li>

                <li class="list-group-item"><strong>Date of birth:</strong>
                    {{ \Carbon\Carbon::parse($userDetails->date_of_birth)->format('d M, y') ?? 'Not Provided' }}
                </li>

                <li class="list-group-item"><strong>Passport copy:</strong>
                    @if ($userDetails->passport_copy)
                        <a href="{{ asset('storage/' . $userDetails->passport_copy) }}" target="_blank">View
                            </a>
                    @else
                        Not Provided
                    @endif
                </li>
                <!-- Phone Number -->
                <li class="list-group-item"><strong>Phone number:</strong>
                    {{ $userDetails->phone_number ?? 'Not Provided' }}</li>

                <!-- Address -->

                <li class="list-group-item"><strong>Address:</strong>
                    {{ $userDetails->address ?? 'Not Provided' }}</li>
            </ul>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-header bg-gradient-info">
            <h5 class="mb-0 text-white">Useful Links</h5>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><a href="#">Change password</a></li>
                <li class="list-group-item"><a href="#">Contact admin</a></li>
            </ul>
        </div>
    </div>
</div>
