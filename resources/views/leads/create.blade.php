<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Lead - Aritra Agro CRM</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            min-height: 100vh;
        }
        .card-form {
            max-width: 650px;
            margin: 0 auto;
            margin-top: 40px;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
            background-color: #ffffff;
        }
        .form-label {
            font-weight: 500;
            color: #333;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            transition: all 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            transform: translateY(-2px);
        }
        .alert {
            border-radius: 8px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-primary mb-4 text-center">Create New Lead</h2>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="card card-form">
            <form action="{{ route('leads.store') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="mb-4">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
                </div>
                <div class="mb-4">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                </div>
                <div class="mb-4">
                    <label for="enquiry_for" class="form-label">Enquiry For</label>
                    <input type="text" class="form-control" id="enquiry_for" name="enquiry_for" value="{{ old('enquiry_for') }}" required>
                </div>
                <div class="mb-4">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                </div>
                <div class="mb-4">
                    <label for="lead_type" class="form-label">Lead Type</label>
                    <select class="form-control" id="lead_type" name="lead_type" required>
                        <option value="Hot" {{ old('lead_type') == 'Hot' ? 'selected' : '' }}>Hot</option>
                        <option value="Warm" {{ old('lead_type') == 'Warm' ? 'selected' : '' }}>Warm</option>
                        <option value="Cold" {{ old('lead_type') == 'Cold' ? 'selected' : '' }}>Cold</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="status" class="form-label">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="Not Interested" {{ old('status') == 'Not Interested' ? 'selected' : '' }}>Not Interested</option>
                        <option value="Converted" {{ old('status') == 'Converted' ? 'selected' : '' }}>Converted</option>
                        <option value="Done" {{ old('status') == 'Done' ? 'selected' : '' }}>Done</option>
                        <option value="Not Done" {{ old('status') == 'Not Done' ? 'selected' : '' }}>Not Done</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="lead_given_date" class="form-label">Lead Given Date</label>
                    <input type="date" class="form-control" id="lead_given_date" name="lead_given_date" value="{{ old('lead_given_date') }}" required>
                </div>
                <div class="mb-4">
                    <label for="user_id" class="form-label">Assigned User (CRE/DSE)</label>
                    <select class="form-control" id="user_id" name="user_id" required>
                        @foreach ($users as $user)
                            <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Submit</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
