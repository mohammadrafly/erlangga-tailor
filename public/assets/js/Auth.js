$(document).ready(function() {
    const form = $("#SignUp");
    const passwordConfirmationInput = $('#password_confirmation');
    const passwordInput = $('#password');
    const emailInput = $('#email');
    const nameInput = $('#name');
   
    form.submit(function(e) {
      e.preventDefault();
  
      const password = passwordInput.val();
      const email = emailInput.val();
      const name = nameInput.val();
      const passwordConfirmation = passwordConfirmationInput.val();
  
      if (!email) {
        showAlert('Email tidak boleh kosong.');
        return;
      }
  
      if (!name) {
        showAlert('Nama tidak boleh kosong.');
        return;
      }
  
      if (!password) {
        showAlert('Password tidak boleh kosong.');
        return;
      }
  
      if (password !== passwordConfirmation) {
        showAlert('Password tidak sama.');
        return;
      }
  
      registerUser(name, email, password)
        .then((response) => {
          if (response.status) {
            showAlert(response.message);
            location.reload(true)
          } else {
            showAlert(response.message);
          }
        })
        .catch(() => {
          showAlert('Silahkan hubungi admin.');
        });
    });
  
    function registerUser(name, email, password) {
      return $.ajax({
        url: `${base_url}register`,
        type: "POST",
        data: {
          name,
          email,
          password,
        },
        dataType: "JSON"
      });
    }
  
    function showAlert(text) {
        alert(text)
    }
  });
  