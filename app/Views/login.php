    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="../index.html"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="username" type="text" placeholder="Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" type="password" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="button" type="submit" class="btn btn-primary btn-lg btn-block" id="btnLogin" name="btnLogin">Sign in</button>
                    </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Create An Account</a></div>
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div>
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- Alert Ajax  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.all.min.js"></script>
<script>
$(document).ready(function(){

    function validasi() {
    var user = $('#username').val();
    var pass = $('#password').val();
        if (user != "" && pass!="" ) {
           cek_user(user,pass);
        }else{
            alert('Anda harus mengisi data dengan lengkap !');
        }
    }

    function cek_user(user,pass){ //untuk menampilkan data product
      $.ajax({
        type  : 'POST',
        url   : '<?php echo site_url('Auth/login')?>',//Memanggil Controller/Function
        async : false,
        dataType : 'json',
        data : {user:user, pass:pass}, 
         success:function(response){
                if (response == "200") {
                    
                  Swal.fire({
                    type: 'success',
                    title: 'Login Berhasil!',
                    text: 'Tunggu sejenak',
                    timer: 1000,
                    showCancelButton: false,
                    showConfirmButton: false
                  })
                  .then (function() {
                    window.location.href = "<?php echo site_url('Home')?>";
                  });

                } else {

                  Swal.fire({
                    type: 'error',
                    title: 'Login Gagal!',
                    text: 'silahkan coba lagi!'
                  });


                }

                console.log(response);

              },

              error:function(response){

                  Swal.fire({
                    type: 'error',
                    title: 'Opps!',
                    text: 'server error!'
                  });

                  console.log(response);

              }
     
      });
    }

    $('#btnLogin').on('click',function(){
    validasi();
    });

    var input = document.getElementById("password");
    input.addEventListener("keyup", function(event) {
    if (event.keyCode === 13) {
        event.preventDefault();
        $('#btnLogin').on('click',validasi());
    }
    });

});



</script>