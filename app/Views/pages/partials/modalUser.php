                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Tambah Pengguna</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form">
                                        <div class="form-group">
                                            <label for="inputName">Nama</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="masukkan nama">
                                            <input hidden type="text" id="id" name="id">
                                        </div>
                                        <div id="username-input" class="form-group">
                                            <label for="inputName">Username</label>
                                            <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username">
                                        </div>
                                        <div id="username-input" class="form-group">
                                            <label for="inputName">Nomor HP</label>
                                            <input type="number" class="form-control" id="nomor_hp" name="nomor_hp" placeholder="masukkan nomor hp">
                                        </div>
                                        <div id="username-input" class="form-group">
                                            <label for="inputName">Alamat</label>
                                            <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="masukkan alamat"></textarea>
                                        </div>
                                        <div id="password-input" class="form-group">
                                            <label for="inputName">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password">
                                        </div>
                                        <div id="email-input" class="form-group">
                                            <label for="inputName">Email</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="masukkan email">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputName">Role</label>
                                            <select class="form-control" id="role" name="role">
                                                <option value="admin">Admin</option>
                                                <option value="customer">Customer</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button onclick="save()" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>