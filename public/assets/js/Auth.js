async function handleResponse(response) {
  try {
    if (response.status) {
      await showAlert(response.icon, response.title, response.text);
      setTimeout(() => {
        window.location.href = `${base_url}auth/sign-in`;
      }, 3000);
    } else {
      showAlert(response.icon, response.title, response.text);
    }
  } catch (error) {
    console.error('Error handling response:', error);
  }
}

$(document).ready(function() {
  $('#SignUp').submit(function(event) {
      event.preventDefault();

      const passwordConfirmationInput = $('#password_confirmation');
      const usernameInput = $('#username');
      const passwordInput = $('#password');
      const emailInput = $('#email');
      const nameInput = $('#name');
      const phoneNumberInput = $('#nomor_hp');
      const alamatInput = $('#alamat');
  
      const username = usernameInput.val();
      const password = passwordInput.val();
      const email = emailInput.val();
      const name = nameInput.val();
      const nomor_hp = phoneNumberInput.val();
      const alamat = alamatInput.val();
      const passwordConfirmation = passwordConfirmationInput.val();

      if (!email) {
        showAlert('error', 'Input Invalid', 'Email tidak boleh kosong.');
        return;
      }

      if (!name) {
        showAlert('error', 'Input Invalid', 'Nama tidak boleh kosong.');
        return;
      }

      if (!password) {
        showAlert('error', 'Input Invalid', 'Password tidak boleh kosong.');
        return;
      }

      if (!username) {
        showAlert('error', 'Input Invalid', 'Username tidak boleh kosong');
        return;
      }

      if (!alamat) {
        showAlert('error', 'Input Invalid', 'Alamat tidak boleh kosong');
        return;
      }

      if (!nomor_hp) {
        showAlert('error', 'Input Invalid', 'Nomor HP tidak boleh kosong');
        return;
      }

      if (password !== passwordConfirmation) {
        showAlert('error', 'Input Invalid', 'Password tidak sama.');
        return;
      }

      $.ajax({
          url: `${base_url}auth/sign-up`,
          type: 'POST',
          data: {         
            username,
            name,
            email,
            password, 
            alamat,
            nomor_hp
          },
          dataType: 'JSON',
          success: function(response) {
            handleResponse(response);
          },
          error: function() {
            showAlert(response.icon, response.title, response.text);
          }
      });
  });
});

$(document).ready(function() {
  $('#SignIn').submit(function(event) {
      event.preventDefault();

      const usernameInput = $('#username');
      const passwordInput = $('#password');

      const username = usernameInput.val();
      const password = passwordInput.val();
  
      if (!username) {
        showAlert('error', 'Input Invalid', 'Username/Email tidak boleh kosong');
        return;
      }

      if (!password) {
        showAlert('error', 'Input Invalid', 'Password tidak boleh kosong.');
        return;
      }

      $.ajax({
          url: `${base_url}auth/sign-in`,
          type: 'POST',
          data: { username, password },
          dataType: 'JSON',
          success: function(response) {
            if (response.status) {
              swal.fire({
                icon: response.icon,
                title: response.title,
                text: response.text,
                showCancelButton: false,
                showConfirmButton: false,
                timer: 3000
              }).then (function(response) {
                if (response.role == 'admin') {
                  window.location.href = `${base_url}dashboard`;
                } else {
                  window.location.href = `${base_url}`;
                }
              });
            } else {
              showAlert(response.icon, response.title, response.text);
            }
          },
          error: function() {
            showAlert(response.icon, response.title, response.text);
          }
      });
  });
});

function showAlert(icon, title, text) {
  Swal.fire({ icon, title, text });
}