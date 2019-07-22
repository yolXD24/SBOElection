
 $(document).ready(function() {
    $('#firstName').change(
      function() {
        if($(this).val().match(/^[a-zA-Z]{3,16}[a-zA-Z\s]*$/)) {
        } else {
          alert("Invalid first name!");
          $("#sub").attr("disabled",true);
          $('#inputPassword').val("");
          $('#confirmPassword').val("");
        }
      });
  });

  $(document).ready(function() {
    $('#lastName').change(
      function() {
        if($(this).val().match(/^[a-zA-Z]{2,16}[a-zA-Z\s]*$/)) {
        } else {
          alert("Invalid last name!");
          $("#sub").attr("disabled",true);
        }
      });

    var valid=false;
    var pass=$('#inputPassword').val();
    var confpass=$('#confirmPassword').val();

    $(function() {
      $('#inputPassword').keyup(function(e) {
        $("#confirmPassword").removeAttr("disabled");

        var tempo=$(this).val();
        if(tempo.length>=8&&tempo.match(/[A-z]/)&&tempo.match(/[A-Z]/)&&tempo.match(/\d/)) {
          $('#message').css({'color': 'green'});
          $('#message').text('Password OK');
          $("#confirmPassword").removeAttr("disabled");
          valid=true;
        } else {
          $('#message').css({'color': 'red'});
          $('#message').text("Please make Your Password has at least one capital letter and at least 1 digit");
          $("#sub").attr("disabled",true);
        }
      });
    });

    $(function() {
      $('#confirmPassword').keyup(function(e) {
        pass=$('#inputPassword').val(); 
        confpass=$(this).val();

        if(pass.length>=8&&pass==confpass) {
          $('#message').css({'color': 'green'});
          $('#message').text('Password Match');
          valid=true;
        } else {
          $('#message').css({'color': 'red'});
          $('#message').text("Password Don't Match!");
          $("#sub").attr("disabled",true);
        }
        
        if(valid==true) {
          $('#sub').removeAttr('disabled');
        }
      });
    });

    $(function() {
      $('#inputEmail').keyup(function(e) {
        var email=$(this).val();
        $.ajax({
          url: "check.php",
          type: 'POST',
          data: {
            email: email,

          },
          success: function(response) {
            if(response==1) {
              alert("Email is already Taken!!!");
              $('#inputEmail').val("");
              $("#inputPassword").attr("disabled",true);
              $("#sub").attr("disabled",true);
            } else {
              $("#inputPassword").attr("disabled",false);
            }
          }
        });
      });
    });

    $("#sub").click(function() {
      var fn = $('#firstName').val();
      var ln = $('#lastName').val();
      var email = $('#inputEmail').val();
      var username = $('#username').val();
      var pw = $('#inputPassword').val();

      $.ajax({
        url: "register.php",
        type: 'POST',
        data: {
          email: email,
          username: username,
          pw: pw,
          fn: fn,
          ln: ln
        },
        success: function(response) {
          if(response==1) {
            alert("Registered successfully!!!");
            window.location.href="login.html";
          } else {
            alert("Something went Wrong please Review your Registration!")
          }
        }
      });
    });

  });
