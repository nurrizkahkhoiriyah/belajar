<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Halaman Login</title>
    <link href="<?php echo base_url('public/template/css/bootstrap.min.css');?>" rel="stylesheet">
  </head>
  <body>
    <div class="row justify-content-center pt-5">
      <div class="card col-md-4">
        <div class="card-header">
          <div class="card-title fw-bold">Sign In</div>
        </div>
        <div class="card-body">
          <form action="#" method="post" enctype="multipart/form-data">
            <div class="mb-1">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="">
              <div class="error-block text-danger" id="emailError">.</div>
            </div>
            <div class="mb-1">
              <label for="password" class="form-label">Password</label>
              <input type="password" class="form-control" id="password" name="password" value="">
              <div class="error-block text-danger" id="passwordError"></div>
            </div>

            <button type="button" id="loginBtn" class="btn btn-primary mt-3 ">Login</button>
            <div class="messageBlock mt-3"></div>

          </form>

        </div>
      </div>
    </div>

    <script src="<?php echo base_url('public/template/js/bootstrap.bundle.min.js')?>"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {
            $('#loginBtn').click(function() {
                $.ajax({
                    url: '<?php echo base_url('login/proses_login'); ?>',
                    type: 'POST',
                    data: {
                        email: $('#email').val(),
                        password: $('#password').val()
                    },
                    dataType: 'json',
                    success: function(response){
                        if(response.status == '1'){
                          $('.messageblock').html('<div>Login Berhasil<br> Email : '+ response.email +
                          '<br> Password : '+ response.password + '</div>')
                          alert(response.message);
                        } else if (response.status == '2'){
                          $('#emailError').text(response.message);
                        } else if (response.status == '3'){
                          $('#passwordError').text(response.message);
                        } else {
                          $('.error-block').html(response.message);
                        } 
                    }
                  
                });
                    
            });

        });

    </script>
  </body>
</html>