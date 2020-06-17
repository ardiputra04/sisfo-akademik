




      <div class="content">
        <div class="container-fluid">
            
          <div class="row">
            <div class="col-lg col-md-12">
              <?php if (validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors();  ?>
                </div>
              <?php endif; ?>  

              <?= form_error('menu', '<div class="alert alert-warning alert-dismissible fade show" role="alert">','</div>');  ?>

              <?= $this->session->flashdata('message');  ?>
              <button  class="btn btn-info" data-toggle="modal" data-target="#ModalAddSubmenuAkses">Tambah Akses Submenu</button>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Url</th>
                    <th scope="col">Icon</th>
                    <th scope="col">Aktif</th>
                    <!-- <th scope="col">Kedua</th> -->
                    <th scope="col" colspan="2">Action</th>
                  </tr>
                </thead>
                <tbody>
                      <?php $i = 1;  ?>
                      <?php foreach($subMenu as $sm): ?>
                  <tr>
                      <th scope="row"><?= $i;  ?></th>
                      <td><?= $sm['title'];  ?></td>
                      <td><?= $sm['menu'];  ?></td>
                      <td><?= $sm['url'];  ?></td>
                      <td><?= $sm['icon'];  ?></td>
                      <td><?= $sm['is_active'];  ?></td>
                      <td>
                        <button onclick="javascript: return confirm('Anda yakin ingin edit data ini ?')" class="btn btn-success">Edit
                        </button>
                      </td>
                      <td>
                        <button onclick="javascript: return confirm('Anda yakin ingin Hapus data ini ?')" class="btn btn-danger">Hapus
                        </button>
                      
                      <!-- <td>dia</td> -->
                  </tr>
                      <?php $i++; ?>
                      <?php endforeach; ?>
                  
                </tbody>
              </table>
            </div>  
            
            
          </div>
          
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <div class="card">
                
                
              </div>
            </div>
            
          </div>
        </div>
      </div>

      
        <!-- Modal -->
        <div class="modal fade" id="ModalAddSubmenuAkses" tabindex="-1" role="dialog" aria-labelledby="ModalAddSubmenuAkses" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalAddSubmenuAkses">Tambah Menu Akses Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('Menu/subMenu');?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label class="bmd-label-floating">Judul</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>

                <div class="form-group">
                  <select class="form-control" name="menu_id" id="menu_id">
                    <option value="" >--Select Menu--</option>
                    <?php foreach($menu as $m) : ?>
                    <option value="<?= $m['id'];  ?>"><?= $m['menu'];  ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>

                <div class="form-group">
                  <label class="bmd-label-floating">URL</label>
                  <input type="text" class="form-control" id="url" name="url">
                </div>

                <div class="form-group">
                    <label class="bmd-label-floating">Icon</label>
                    <input type="text" class="form-control" id="icon" name="icon">
                </div>

                

                <div class="form-group">
                  
                  <div class="form-check">
                    <label class="form-check-label">
                      <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" checked>
                        <span class="form-check-sign">
                        <span class="check"></span>
                        </span><b><label>Aktif ?</label></b>
                    </label>

                  </div>

                </div>

              </div>
              <div class="modal-footer">
                <button type="close" class="btn btn-danger" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      
      