<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Razorpay Payment</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: linear-gradient(to right, #f8f9fa, #e3f2fd);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
    }

    .payment-card {
      background: #fff;
      padding: 30px;
      border-radius: 15px;
      box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
      width: 100%;
      max-width: 400px;
    }

    .payment-card h2 {
      font-weight: 700;
      color: #0d6efd;
      margin-bottom: 20px;
    }

    .btn-pay {
      width: 100%;
      padding: 10px;
      font-size: 16px;
    }

    .form-control:focus {
      box-shadow: none;
      border-color: #0d6efd;
    }
  </style>
</head>
<body>

  <div class="payment-card">
    <h2 class="text-center">Make a Payment</h2>
    <form action="{{ route('razorpay.payment') }}" method="POST">
      @csrf
      <div class="mb-3">
        <label for="amount" class="form-label">Enter Amount</label>
        <input type="number" name="amount" id="amount" class="form-control" placeholder="e.g. 500" required min="1">
      </div>
      <button type="submit" class="btn btn-primary btn-pay">Pay with Razorpay</button>
    </form>
  </div>

</body>
</html>
