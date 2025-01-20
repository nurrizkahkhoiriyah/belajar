<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="<?php echo base_url('public/template/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
    <div class="container mt-4">
    <div class="row justify-content-center pt-5">
      <div class="card col-md-4">
        <div class="card-header">
          <div class="card-title fw-bold">Sign In</div>
        </div>
        <div class="card-body">
          <form id="loginForm" action="#" method="post" enctype="multipart/form-data">
            <div class="mb-1">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" id="username" name="username">
              <div class="error-block" id="usernameError">
              </div>
            </div>
            <div class="mb-1">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password">
              <div class="error-block" id="passwordError">
              </div>
            </div>

            <button type="button" id="loginBtn" class="btn btn-primary mt-3">Login</button>
            <div class="messageBlock mt-3"></div>
          </form>
        </div>
      </div>
    </div>

    <script src="<?php echo base_url('public/template/js/bootstrap.bundle.min.js')?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#loginBtn').click(function() {
                // Reset error messages
                $('#usernameError').text('');
                $('#passwordError').text('');
                $('.messageBlock').html('');

                // Submit form via AJAX
                $.ajax({
                    url: '<?php echo base_url('login/proses_login'); ?>',
                    type: 'POST',
                    data: {
                        username: $('#username').val(),
                        password: $('#password').val()
                    },
                    dataType: 'json',
                    success: function(response) {
                      if (response.status === '1') {
                          window.location.href = response.redirect; // Redirect ke dashboard
                      } else if (response.status === '2') {
                          $('#usernameError').text(response.usernameMessage);
                      } else if (response.status === '3') {
                          $('#passwordError').text(response.passwordMessage);
                      } else if (response.status === '4') {
                          $('.messageBlock').html(`<div class="text-danger">${response.message}</div>`);
                      } else if (response.status === '5') {
                          $('#usernameError').text(response.usernameMessage);
                          $('#passwordError').text(response.passwordMessage);
                      }
                  }

                });
            });
        });
    </script>
  </body>
</html>
