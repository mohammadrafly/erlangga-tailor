                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title" id="myModalLabel">Tambah Collection</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form id="form" enctype="multipart/form-data">
                                        <input type="text" hidden id="id" name="id">
                                        <div class="form-group">
                                            <label for="kategori">Product Type</label>
                                            <select class="form-control" id="kategori" name="kategori">
                                                <option value="perbaikan">Perbaikan</option>
                                                <option value="clothing">Clothing</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="product-name">Product Name</label>
                                            <input type="text" class="form-control" id="product" name="product" placeholder="Enter product name">
                                        </div>
                                        <div class="form-group">
                                            <label for="product-price">Harga</label>
                                            <input type="text" class="form-control" id="harga" name="harga" placeholder="Enter product price">
                                        </div>
                                        <div class="form-group">
                                            <label for="product-estimation">Estimasi</label>
                                            <input type="text" class="form-control" id="estimasi" name="estimasi" placeholder="Enter product estimation">
                                        </div>
                                        <div class="form-group">
                                            <label for="product-image">Image</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="img" name="img">
                                                <label class="custom-file-label" for="img">Choose file</label>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button onclick="saveCollection()" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>