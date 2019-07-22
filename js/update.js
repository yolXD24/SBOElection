
 $(document).ready(function() {
    $('#firstName').change(
      function() {
        if($(this).val().match(/^[a-zA-Z]{3,16}[a-zA-Z\s]*$/)) {
        } else {
          alert("Invalid first name!");
          $("#update").attr("disabled",true);
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
          $("#update").attr("disabled",true);
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
          $('#message').text('');
          $("#confirmPassword").removeAttr("disabled");
          valid=true;
        } else {
          $('#message').css({'color': 'red'});
          $('#message').text("Please make Your Password has at least one capital letter and at least 1 digit");
          $("#update").attr("disabled",true);
        }
      });
    });

    $(function() {
      $('#confirmPassword').keyup(function(e) {
        pass=$('#inputPassword').val(); 
        confpass=$(this).val();

        if(pass.length >= 8 && pass==confpass) {
          $('#message').css({'color': 'green'});
          $('#message').text('Password Match');
          valid=true;
        } else {
          $('#message').css({'color': 'red'});
          $('#message').text("Password Don't Match!");
          $("#update").attr("disabled",true);
        }
        
        if(valid==true) {
          $('#update').removeAttr('disabled');
        }
      });
    });

    $("#update").click(function() {
      var fn = $('#firstName').val();
      var ln = $('#lastName').val();
      var username = $('#username').val();
      var pw = $('#inputPassword').val();

      $.ajax({
        url: "update.php",
        type: 'POST',
        data: {
          username: username,
          pw: pw,
          fn: fn,
          ln: ln
        },
        success: function(response) {
          if(response==1) {
            alert("Updated successfully!!!");
            window.location.href="account.php";
          } else {
            alert("Please Try Again!")
          }
        }
      });
    });

  });
