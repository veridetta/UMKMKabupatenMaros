              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Basic Modal</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form class="row g-3" id="upload-image-form"  method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="col-12">
                              <label for="kartu_keluarga" class="col-form-label bold">Kartu Keluarga (KK)</label>
                              <p class="text-secondary h6">Unggah Kartu Keluarga kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                              <div class="col-sm-12">
                                <input type="file" class="form-control-file" name="kartu_keluarga" id="kartu_keluarga" accept="image/*">
                                <img id="kartu_keluarga_preview" src="#" alt="preview" style="display: none; height: 200px; margin-top: 10px;">
                                @if ($errors->has('kartu_keluarga'))
                                  <p class="text-danger">{{ $errors->first('kartu_keluarga') }}</p>
                                @endif
                              </div>
                            </div>
                            
                            <div class="col-12">
                              <label for="ktp" class="col-form-label bold">Kartu Tanda Penduduk (KTP)</label>
                              <p class="text-secondary h6">Unggah Kartu Tanda Penduduk kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                              <div class="col-sm-12">
                                <input type="file" class="form-control-file" name="ktp" id="ktp" accept="image/*">
                                <img id="ktp_preview" src="#" alt="preview" style="display: none; height: 200px; margin-top: 10px;">
                                @if ($errors->has('ktp'))
                                  <p class="text-danger">{{ $errors->first('ktp') }}</p>
                                @endif
                              </div>
                            </div>
                            
                            <div class="col-12">
                              <label for="sku" class="col-form-label bold">Surat Keterangan Usaha (SKU)</label>
                              <p class="text-secondary h6">Unggah Surat Keterangan Usaha dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                              <div class="col-sm-12">
                                <input type="file" class="form-control-file" name="sku" id="sku" accept="application/pdf">
                                <embed id="sku_preview" src="#" alt="preview" height="300" width="300" style="display: none; height: 200px; margin-top: 10px;">
                                @if ($errors->has('sku'))
                                  <p class="text-danger">{{ $errors->first('sku') }}</p>
                                @endif
                              </div>
                            </div>
                            
                            <div class="col-12">
                              <label for="tempat" class="col-form-label bold">Foto Tempat Usaha</label>
                              <p class="text-secondary h6">Unggah foto tempat usaha kamu dalam format <strong>png,jpg,jpeg</strong> dengan ukuran maksimal <strong>5 MB</strong></p>
                              <div class="col-sm-12">
                                <input type="file" class="form-control-file" name="tempat" id="tempat" accept="image/*">
                                <img id="tempat_preview" src="#" alt="preview" style="display: none; height:200px; margin-top: 10px;">
                                @if ($errors->has('tempat'))
                                <p class="text-danger">{{ $errors->first('tempat') }}</p>
                                @endif
                                
                              </div>
                            </div>
                            <script>
                            // preview image after file is selected
                            function previewImage(input, previewId) {
                              var preview = document.getElementById(previewId);
                              var file    = input.files[0];
                              var reader  = new FileReader();
                            
                              reader.onloadend = function () {
                                preview.src = reader.result;
                                preview.style.display = 'block';
                              }
                            
                              if (file) {
                                reader.readAsDataURL(file);
                              } else {
                                preview.src = "#";
                                preview.style.display = 'none';
                              }
                            }
                            
                            // call previewImage function when file input changes
                            document.getElementById('kartu_keluarga').addEventListener('change', function(){
                              previewImage(this, 'kartu_keluarga_preview');
                            });
                            
                            document.getElementById('ktp').addEventListener('change', function(){
                              previewImage(this, 'ktp_preview');
                            });
                            
                            document.getElementById('sku').addEventListener('change', function(){
                              previewImage(this, 'sku_preview');
                            });
                            
                            document.getElementById('tempat').addEventListener('change', function(){
                              previewImage(this, 'tempat_preview');
                            });
                            </script>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div><!-- End Basic Modal-->