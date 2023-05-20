const base_url = 'http://localhost:8080/';

function showOrderDetails(orderId) {
    $.ajax({
      url: `${base_url}dashboard/orders/update/${orderId}`,
      method: 'GET',
      dataType: 'JSON',
      success: function (response) {
        var orderDetails = response;
  
        var modalBody = $('#orderDetailsModal .modal-body');
        modalBody.empty();
  
        var keysToDisplay =  ['pesanan', 'kategori', 'jumlah', 'jenis_kelamin', 'ukuran', 'tanggal_selesai','harga', 'kode_pembayaran','status_track']; // Specify the keys you want to display
        var labels = ['Pesanan', 'Kategori', 'Jumlah', 'Jenis Kelamin', 'Ukuran', 'Tanggal Selesai', 'Harga', 'Kode Pembayaran', 'Status Tracking']; // Specify the labels for the corresponding keys
  
        var invoiceContainer = $('<div>').addClass('card');
        var invoiceHeader = $('<div>').addClass('card-header text-center').append($('<h4>').addClass('h4 mb-0').text('Invoice'));
        var invoiceDetails = $('<div>').addClass('card-body');
  
        keysToDisplay.forEach(function (key, index) {
          if (orderDetails.hasOwnProperty(key)) {
            var detailRow = $('<div>').addClass('row mb-3');
            var detailKey = $('<div>').addClass('col-sm-6 font-weight-bold').text(labels[index]);
            var detailValue = $('<div>').addClass('col-sm-6');
  
            var badgeClass = 'badge badge-primary'; // Customize badge color if needed
            var badgeText = orderDetails[key]; // Set the badge text to the corresponding order detail value
            var badge = $('<span>').addClass(badgeClass).text(badgeText);
            detailValue.append(badge);
  
            detailRow.append(detailKey);
            detailRow.append(detailValue);
            invoiceDetails.append(detailRow);
          }
        });
  
        invoiceContainer.append(invoiceHeader);
        invoiceContainer.append(invoiceDetails);
        modalBody.append(invoiceContainer);
      },
      error: function (xhr, status, error) {
        console.error(error);
        // Display an error message or handle the error as needed
      },
    });
  }  
  
// Optional: Clear modal content when it's closed
$('#orderDetailsModal').on('hidden.bs.modal', function () {
    var modalBody = document.querySelector('#orderDetailsModal .modal-body');
    modalBody.innerHTML = '';
});


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
            $('[name="alamat"]').val(respond.data.alamat);
            $('[name="nomor_hp"]').val(respond.data.nomor_hp);
            $('#myModal').modal('show');
            $('.modal-title').text('Edit User'); 

            $('#password-input').hide();
            $('#username-input').hide();
            $('#email-input').hide();

            // Add event listener to modal close event
            $('#myModal').on('hidden.bs.modal', function () {
                $('#form')[0].reset(); // Reset the form
                location.reload();
            });
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

            $('#myModal').on('hidden.bs.modal', function () {
                $('#form')[0].reset();
            });
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
