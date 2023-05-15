const base_url = 'http://localhost:8080/';

function update(id) {
    save_method = 'update';
    $('#form')[0].reset(); 
    $.ajax({
        url : `${base_url}dashboard/users/update/${id}`,
        type: 'GET',
        dataType: 'JSON',
        success: function(respond)
        {
            $('[name="id"]').val(respond.data.id);
            $('[name="name"]').val(respond.data.name);
            $('[name="role"]').val(respond.data.role);
            $('#myModal').modal('show');
            $('.modal-title').text('Edit User'); 

            $('#password-input').hide();
            $('#username-input').hide();
            $('#email-input').hide();
        },
        error: function (textStatus)
        {
            alert(textStatus);
        }
    });
}

function save() {
    const id = $('#id').val();
    const url = id ? `${base_url}dashboard/users/update/${id}` : `${base_url}dashboard/users`;
    
    $.ajax({
      url,
      type: 'POST',
      data: $('#form').serialize(),
      dataType: 'JSON',
      success: (respond) => {
        if (respond.status) {
            showAlert(respond.icon, respond.title, respond.text)
        } else {
            showAlert(respond.icon, respond.title, respond.text);
        }
      },
      error: (error) => {
        showAlert('error', error, 'Telah terjadi error, silahkan hubungi admin.');
      },
    });
}

function deleteData(id) {
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${base_url}dashboard/users/delete/${id}`,
                type: 'GET',
                dataType: 'JSON',
                success: function (respond) {
                    showAlert(respond.icon, respond.title, respond.text);
                },
                error: function (textStatus) {
                    showAlert('error', textStatus, 'Telah terjadi error');
                }
            });
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
}

function updateDataOrder(id) {
    save_method = 'update';
    $('#form')[0].reset(); 
    $.ajax({
        url : `${base_url}dashboard/orders/update/${id}`,
        type: 'GET',
        dataType: 'JSON',
        success: function(respond)
        {
            $('[name="id"]').val(respond.id);
            $('[name="tanggal_selesai"]').val(respond.tanggal_selesai);
            $('[name="harga"]').val(respond.harga);
            $('[name="status_track"]').val(respond.status_track);
            $('#myModal').modal('show');
            $('.modal-title').text('Update Order'); 
        },
        error: function (textStatus)
        {
            alert(textStatus);
        }
    });
}

function saveDataOrder() {
    const id = $('#id').val();
    const url = id ? `${base_url}dashboard/orders/update/${id}` : `${base_url}dashboard/orders`;
    
    $.ajax({
      url,
      type: 'POST',
      data: $('#form').serialize(),
      dataType: 'JSON',
      success: (respond) => {
        if (respond.status) {
            showAlert(respond.icon, respond.title, respond.text)
        } else {
            showAlert(respond.icon, respond.title, respond.text);
        }
      },
      error: (error) => {
        showAlert('error', error, 'Telah terjadi error, silahkan hubungi admin.');
      },
    });
}

function deleteDataOrder(id) {
    
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: `${base_url}dashboard/orders/delete/${id}`,
                type: 'GET',
                dataType: 'JSON',
                success: function (respond) {
                    showAlert(respond.icon, respond.title, respond.text);
                },
                error: function (textStatus) {
                    showAlert('error', textStatus, 'Telah terjadi error');
                }
            });
        } else if (result.isDenied) {
          Swal.fire('Changes are not saved', '', 'info')
        }
      })
}

function showAlert(icon, title, text) {
    Swal.fire({
        icon: icon, 
        title: title, 
        text: text,
        timer: 3000,
        showCancelButton: false,
        showConfirmButton: false
    }).then(() => location.reload());
}

function signOut() {
    Swal.fire({
        title: 'Are you sure?',
        text: "You want to sign out?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, I Want to Sign Out!'
    }).then(function (result) {
        if (result.value) {
            $.ajax({
                url:`${base_url}sign-out`,
                type: 'GET',
                dataType: 'JSON',
                success: function (respond) {
                    swal.fire({
                        icon: respond.icon,
                        title: respond.title,
                        text: respond.text,
                        showCancelButton: false,
                        showConfirmButton: false,
                        timer: 3000
                    }).then (function() {
                        window.location.href = `${base_url}auth/sign-in`;
                    });
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    swal.hideLoading();
                    swal.fire("!Opps ", "Something went wrong, try again later", "error");
                }
            });
        };
    });
}

$('#myModal').on('hidden.bs.modal', function () {
    location.reload();
});
