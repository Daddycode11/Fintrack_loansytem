<style>
  .logo {
    margin: auto;
    font-size: 16px;
    background: white;
    padding: 7px 11px;
    border-radius: 50% 50%;
    color: #000000b3;
  }
  .logo img {
    width: 100%;
    height: auto;
  }
</style>

<nav class="navbar navbar-light fixed-top bg-primary" style="padding:0;">
  <div class="container-fluid mt-1 mb-2">
    <div class="col-lg-12">
      <div class="col-md-1 float-left" style="display: flex;">
        <div class="logo">
          <img src=" assets/img/Logo1.png" alt="Logo Icon">
        </div>
      </div>
      <style>
  .fintrack-title {
    font-family: 'Poppins', sans-serif; /* Use a clean and modern font */
    font-size: 1.3rem; /* Adjust the size for readability */
    font-weight: 600; /* Semi-bold for better emphasis */
    text-transform: uppercase; /* Capitalize for a more professional look */
    letter-spacing: 1px; /* Add spacing between letters for better clarity */
    line-height: 1.5; /* Improve line spacing */
    color: #ffffff; /* Ensure text is easy to read on the primary background */
    padding-left: 15px; /* Add padding for better alignment */
  }
  
  .fintrack-subtitle {
    font-family: 'Roboto', sans-serif; /* Use a complementary font for variety */
    font-size: 1rem;
    font-weight: 300;
    color: #d0d0d0; /* Slightly lighter color for subtitle contrast */
  }
</style>

<div class="col-md-8 float-left text-white">
  <div class="fintrack-title">
    FINTRACK: A WEB-BASED FINANCIAL RECORD MANAGEMENT SYSTEM
  </div>
  <div class="fintrack-subtitle">
    For Microfinance Institutions
  </div>
</div>

 <style>
  .logout-container {
    display: flex;
    justify-content: flex-end;
    align-items: center;
    padding-right: 15px;
  }

  .logout-link {
    font-family: 'Poppins', sans-serif; /* Clean, modern font */
    font-size: 1rem;
    font-weight: 500;
    color: #ffffff; /* Consistent white color */
    background-color: #ff4b5c; /* Red background for logout button */
    padding: 8px 16px; /* Spacing for the button */
    border-radius: 30px; /* Rounded edges for a button-like feel */
    transition: background-color 0.3s ease; /* Smooth hover effect */
    text-decoration: none; /* Remove underline */
  }

  .logout-link:hover {
    background-color: #ff1f3f; /* Darken on hover */
  }

  .logout-link i {
    margin-left: 8px; /* Add space between name and icon */
    font-size: 1.2rem; /* Slightly larger icon */
  }
</style>

<div class="col-md-2 float-right text-white logout-container">
  <a href="ajax.php?action=logout" class="logout-link">
    <?php echo $_SESSION['login_name'] ?> <i class="fa fa-power-off"></i>
  </a>
</div>
</nav>
