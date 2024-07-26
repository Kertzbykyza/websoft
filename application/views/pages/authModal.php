<!-- Login Form -->


<div class="container d-flex justify-content-center align-items-center">
  <form>
    <?= form_open('pages/login'); ?>
    <div class="form-group">
      <label for="username">Username</label>
      <input type="text" class="form-control" id="username" placeholder="Enter your username">
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" class="form-control" id="password" placeholder="Enter your password">
    </div>




    <button type="submit" class="btn btn-primary " id="modalButton">Submit</button>

    <!-- You can add additional buttons or actions here -->

    <?= form_close(); ?>
</div>