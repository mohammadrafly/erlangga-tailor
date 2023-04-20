$(document).ready(function() {
  handleSignIn();
  handleSignUp();
});

function handleSignUp() {
  const form = $("#SignUp");
  const passwordConfirmationInput = $('#password_confirmation');
  const usernameInput = $('#username');
  const passwordInput = $('#password');
  const emailInput = $('#email');
  const nameInput = $('#name');

  form.submit(function(e) {
    e.preventDefault();

    const username = usernameInput.val();
    const password = passwordInput.val();
    const email = emailInput.val();
    const name = nameInput.val();
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

    if (password !== passwordConfirmation) {
      showAlert('error', 'Input Invalid', 'Password tidak sama.');
      return;
    }

    registerUser(username, name, email, password)
      .then((response) => {
        if (response.status ) {
          showAlert(response.icon, response.title, response.text);
          setTimeout(() => {
            window.location.href = `${base_url}auth/sign-in`;
          }, 3000);
        } else {
          showAlert(response.message);
        }
      })
      .catch(() => {
        showAlert('error', 'Error!', 'Silahkan hubungi admin.');
      });
  });

  function registerUser(username, name, email, password) {
    return $.ajax({
      url: `${base_url}auth/sign-up`,
      type: "POST",
      data: {
        username,
        name,
        email,
        password,
      },
      dataType: "JSON"
    });
  }

  function showAlert(icon, title, text) {
    Swal.fire({
      icon: icon,
      title: title,
      text: text,
    })
  }
}

  function handleSignIn() {
    const form = $("#SignIn");
    const usernameInput = $('#username');
    const passwordInput = $('#password');
  
    form.submit(function(e) {
      e.preventDefault();
  
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
  
      signInUser(username, password)
        .then(handleSignInResponse)
        .catch(() => {
          showAlert('error', 'Error!', 'Silahkan hubungi admin.');
        });
    });
  
    function signInUser(username, password) {
      return new Promise((resolve, reject) => {
        $.ajax({
          url: `${base_url}auth/sign-in`,
          type: "POST",
          data: { username, password },
          dataType: "JSON",
          success: (response) => {
            resolve(response);
          },
          error: (error) => {
            reject(error);
          }
        });
      });
    }
  
    function handleSignInResponse(response) {
      if (response.status ) {
        swal.fire({
            icon: response.icon,
            title: response.title,
            text: response.text,
            showCancelButton: false,
            showConfirmButton: false,
            timer: 3000
        }).then (function() {
          if (response.role == 'administrator') {
            window.location.href = `${base_url}dashboard`;
          } else {
            window.location.href = `${base_url}`;
          }
        });
      } else {
        showAlert(response.icon. response.title, response.text);
      }
    }
  
    function showAlert(icon, title, text) {
      Swal.fire({ icon, title, text });
    }
  }x
  