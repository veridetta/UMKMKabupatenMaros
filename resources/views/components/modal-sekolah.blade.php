              <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard='false' id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Scrolling Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="min-height: 100px;">
                     <input type="hidden" id="id" name="id">
                     <div class="row">
                        <div>
                            <b class="mt-3">Data Sekolah</b>
                          </div>
                        <div class="col-12 mt-2">
                          <label for="asal_sekolah" class="form-label">Nama Sekolah</label>
                          <input type="text"  class="form-control" id="username" name="username" required>
                        </div>
                       
                        <div class="col-12 mt-4">
                          <label for="password" class="form-label">Password Login</label>
                          <input type="text" class="form-control" id="password" name="password" required>
                        </div>                      
                      </div>
                      <div class="col-12 mt-4" style="font-size: 15px;">
                        <span class="text-secondary">* Harap Mengisi nama sekolah yang sebelumnya belum terdaftar</span>
                        <br>
                        
                        <span class="text-secondary">* Panjang password yang harus diisi minimal 8 karakter</span>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="button" id="simpan" class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div><!-- End Scrolling Modal-->