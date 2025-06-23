<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leads Dashboard - Aritra Agro CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .status-pill {
            padding: 6px 12px;
            border-radius: 50px;
            font-size: 0.85rem;
            font-weight: 500;
            display: inline-block;
        }
        .status-converted { background-color: #198754; color: white; }
        .status-in-progress { background-color: #ffc107; color: black; }
        .status-not-interested { background-color: #dc3545; color: white; }
        .card-shadow {
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            border: none;
        }
    </style>
</head>
<body>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="text-primary mb-0"><i class="fas fa-users"></i> Lead Dashboard</h3>
        <a href="{{ route('leads.create') }}" class="btn btn-success"><i class="fas fa-plus-circle"></i> Create New Lead</a>
    </div>

    <!-- Filter Card -->
    <div class="card card-shadow mb-4">
        <div class="card-body">
            <form method="GET" action="{{ route('leads.index') }}" class="row g-3 align-items-end">
                <div class="col-md-3">
                    <label class="form-label">Search by Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Enter name" value="{{ request('name') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">Start Date</label>
                    <input type="date" name="start_date" class="form-control" value="{{ request('start_date') }}">
                </div>
                <div class="col-md-2">
                    <label class="form-label">End Date</label>
                    <input type="date" name="end_date" class="form-control" value="{{ request('end_date') }}">
                </div>
                <div class="col-md-3">
                    <label class="form-label">Assigned User</label>
                    <select name="user_id" class="form-select">
                        <option value="">All Users</option>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ request('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100"><i class="fas fa-filter"></i> Filter</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Leads Table -->
    <div class="card card-shadow">
        <div class="card-header bg-dark text-white">
            <h5 class="mb-0"><i class="fas fa-table"></i> Leads Listing</h5>
        </div>
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Enquiry For</th>
                        <th>Address</th>
                        <th>Lead Type</th>
                        <th>Status</th>
                        <th>Lead Given Date</th>
                        <th>Assigned User</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($leads as $lead)
                        <tr>
                            <td>{{ $lead->name }}</td>
                            <td>{{ $lead->email }}</td>
                            <td>{{ $lead->phone }}</td>
                            <td>{{ $lead->enquiry_for }}</td>
                            <td>{{ $lead->address }}</td>
                            <td><span class="badge bg-secondary">{{ $lead->lead_type }}</span></td>
                            <td>
                                @php
                                    $statusClass = match($lead->status) {
                                        'Converted' => 'status-converted',
                                        'In Progress' => 'status-in-progress',
                                        'Not Interested' => 'status-not-interested',
                                        default => 'bg-light text-dark'
                                    };
                                @endphp
                                <span class="status-pill {{ $statusClass }}">{{ $lead->status }}</span>
                            </td>
                            <td>{{ \Carbon\Carbon::parse($lead->lead_given_date)->format('d M, Y') }}</td>
                            <td>{{ $lead->user->name }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted py-4">No leads found matching the filter.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Bootstrap & FontAwesome Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>

</body>
</html>
