<?php include 'db_connect.php' ?> 
<!-- Include FontAwesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<!-- Include Google Fonts for modern typography -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<style>
  /* Container Styles */
  .container-fluid {
    font-family: 'Poppins', sans-serif;
    padding: 20px;
    background-color: #f4f6f9; /* Light background */
  }

  .welcome-message {
    font-size: 1.5rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 20px;
  }

  /* Modern Card Styles */
  .card {
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    transition: transform 0.3s ease;
    margin-bottom: 20px;
  }

  .card:hover {
    transform: translateY(-5px); /* Lift effect on hover */
  }

  .card-body {
    padding: 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .card-body i {
    font-size: 2.5rem;
    color: #fff;
  }

  .card-title {
    font-size: 1.2rem;
    font-weight: 500;
    color: #ffffffb3;
  }

  .card-stat {
    font-size: 2rem;
    font-weight: 600;
    color: #fff;
  }

  .card-footer {
    background-color: #007bff; /* Solid background color */
    border-top: none;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    font-size: 1rem;
  }

  .card-footer a {
    background-color: transparent;
    padding: 8px 15px;
    border-radius: 5px;
    color: #fff;
    text-decoration: none;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  .card-footer a:hover {
    background-color: rgba(255, 255, 255, 0.2);
    color: #ffcccb;
  }

  /* Custom Colors for Cards */
  .bg-primary {
    background-color: #007bff;
  }

  .bg-success {
    background-color: #28a745;
  }

  .bg-warning {
    background-color: #ffc107;
  }

  .bg-info {
    background-color: #17a2b8;
  }

  /* Responsive Design */
  @media (max-width: 768px) {
    .card-body {
      flex-direction: column;
      text-align: center;
    }

    .card-footer {
      flex-direction: column;
    }

    .card-footer a {
      margin-top: 10px;
    }
  }
</style>

<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <div class="welcome-message">
        <?php echo "Welcome back " . ($_SESSION['login_type'] == 3 ? "Dr. " . $_SESSION['login_name'] . ',' . $_SESSION['login_name_pref'] : $_SESSION['login_name']) . "!" ?>
      </div>
    </div>
  </div>

  <div class="row">
    <!-- Payments Today Card -->
    <div class="col-md-3">
      <div class="card bg-primary text-white">
        <div class="card-body">
          <div>
            <div class="card-title">Payments Today</div>
            <div class="card-stat">
              <?php
              $payments = $conn->query("SELECT sum(amount) as total FROM payments where date(date_created) = '" . date("Y-m-d") . "'");
              echo $payments->num_rows > 0 ? number_format($payments->fetch_array()['total'], 2) : "0.00";
              ?>
            </div>
          </div>
          <i class="fas fa-calendar"></i>
        </div>
        <div class="card-footer">
          <a href="index.php?page=payments">View Payments</a>
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>

    <!-- Borrowers Card -->
    <div class="col-md-3">
      <div class="card bg-success text-white">
        <div class="card-body">
          <div>
            <div class="card-title">Borrowers</div>
            <div class="card-stat">
              <?php
              $borrowers = $conn->query("SELECT * FROM borrowers");
              echo $borrowers->num_rows > 0 ? $borrowers->num_rows : "0";
              ?>
            </div>
          </div>
          <i class="fas fa-user-friends"></i>
        </div>
        <div class="card-footer">
          <a href="index.php?page=borrowers">View Borrowers</a>
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>

    <!-- Active Loans Card -->
    <div class="col-md-3">
      <div class="card bg-warning text-white">
        <div class="card-body">
          <div>
            <div class="card-title">Active Loans</div>
            <div class="card-stat">
              <?php
              $loans = $conn->query("SELECT * FROM loan_list where status = 2");
              echo $loans->num_rows > 0 ? $loans->num_rows : "0";
              ?>
            </div>
          </div>
          <i class="fas fa-money-check-alt"></i>
        </div>
        <div class="card-footer">
          <a href="index.php?page=loans">View Loan List</a>
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>

    <!-- Total Receivable Card -->
    <div class="col-md-3">
      <div class="card bg-info text-white">
        <div class="card-body">
          <div>
            <div class="card-title">Total Receivable</div>
            <div class="card-stat">
              <?php
              $payments = $conn->query("SELECT sum(amount - penalty_amount) as total FROM payments where date(date_created) = '" . date("Y-m-d") . "'");
              $loans = $conn->query("SELECT sum(l.amount + (l.amount * (p.interest_percentage/100))) as total FROM loan_list l inner join loan_plan p on p.id = l.plan_id where l.status = 2");
              $loans = $loans->num_rows > 0 ? $loans->fetch_array()['total'] : "0";
              $payments = $payments->num_rows > 0 ? $payments->fetch_array()['total'] : "0";
              echo number_format($loans - $payments, 2);
              ?>
            </div>
          </div>
          <i class="fas fa-coins"></i>
        </div>
        <div class="card-footer">
          <a href="index.php?page=loans">View Loan List</a>
          <i class="fas fa-angle-right"></i>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    // Add any necessary JavaScript here
</script>
