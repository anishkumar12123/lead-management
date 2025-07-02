<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Create Lead - Aritra Agro CRM</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
  <style>
    body {
      background: linear-gradient(135deg, #e0eafc, #cfdef3);
      min-height: 100vh;
      font-family: 'Segoe UI', sans-serif;
    }

    .card-form {
      max-width: 700px;
      margin: 40px auto;
      padding: 30px;
      background: #fff;
      border-radius: 15px;
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
    }

    .form-label {
      font-weight: 600;
      color: #444;
    }

    .btn-submit {
      background-color: #0069d9;
      border-color: #0062cc;
      font-weight: bold;
      transition: all 0.3s ease-in-out;
    }

    .btn-submit:hover {
      background-color: #004a9f;
      border-color: #004a9f;
      transform: scale(1.02);
    }

    .heading {
      text-align: center;
      color: #0056b3;
      font-weight: 700;
      margin-bottom: 30px;
    }

    .alert ul {
      margin: 0;
      padding-left: 20px;
    }
  </style>
</head>
<body>

<div class="container">
  <h2 class="heading">Create New Lead</h2>

  @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success') }}
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif


  @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      <strong>Please fix the following errors:</strong>
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

      <div class="row g-3">
        <div class="col-md-6">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
        </div>

        <div class="col-md-6">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>

        <div class="col-md-6">
          <label for="phone" class="form-label">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required maxlength="10">
        </div>

        <div class="col-md-6">
          <label for="enquiry_for" class="form-label">Enquiry For</label>
          <input type="text" class="form-control" id="enquiry_for" name="enquiry_for" value="{{ old('enquiry_for') }}" required>
        </div>

        <div class="col-12">
          <label for="address" class="form-label">Address</label>
          <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
        </div>

        <div class="col-md-6">
          <label for="lead_type" class="form-label">Lead Type</label>
          <select class="form-select" id="lead_type" name="lead_type" required>
            <option value="Hot" {{ old('lead_type') == 'Hot' ? 'selected' : '' }}>Hot</option>
            <option value="Warm" {{ old('lead_type') == 'Warm' ? 'selected' : '' }}>Warm</option>
            <option value="Cold" {{ old('lead_type') == 'Cold' ? 'selected' : '' }}>Cold</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="status" class="form-label">Status</label>
          <select class="form-select" id="status" name="status" required>
            <option value="In Progress" {{ old('status') == 'In Progress' ? 'selected' : '' }}>In Progress</option>
            <option value="Not Interested" {{ old('status') == 'Not Interested' ? 'selected' : '' }}>Not Interested</option>
            <option value="Converted" {{ old('status') == 'Converted' ? 'selected' : '' }}>Converted</option>
            <option value="Done" {{ old('status') == 'Done' ? 'selected' : '' }}>Done</option>
            <option value="Not Done" {{ old('status') == 'Not Done' ? 'selected' : '' }}>Not Done</option>
          </select>
        </div>

        <div class="col-md-6">
          <label for="lead_given_date" class="form-label">Lead Given Date</label>
          <input type="date" class="form-control" id="lead_given_date" name="lead_given_date" value="{{ old('lead_given_date') }}" required>
        </div>

        <div class="col-md-6">
          <label for="user_id" class="form-label">Assigned User (CRE/DSE)</label>
          <select class="form-select" id="user_id" name="user_id" required>
            @foreach ($users as $user)
              <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                {{ $user->name }}
              </option>
            @endforeach
          </select>
        </div>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-submit w-100">Submit Lead</button>
      </div>
    </form>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
