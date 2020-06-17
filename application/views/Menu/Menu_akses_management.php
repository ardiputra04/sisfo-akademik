




      <div class="content">
        <div class="container-fluid">
            
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <?= form_error('menu', '<div class="alert alert-warning alert-dismissible fade show" role="alert">','</div>');  ?>

              <?= $this->session->flashdata('message');  ?>
              <button  class="btn btn-info" data-toggle="modal" data-target="#ModalAddMenuAkses">Tambah Akses Menu</button>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Menu</th>
                    <!-- <th scope="col">Kedua</th> -->
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                      <?php $i=1;  ?>
                      <?php foreach($menu as $m): ?>
                  <tr>
                      <th scope="row"><?= $i;  ?></th>
                      <td><?= $m['menu'];  ?></td>
                      <td>
                        <button onclick="javascript: return confirm('Anda yakin ingin edit data ini ?')" class="btn btn-success">Edit</button>
                        <button onclick="javascript: return confirm('Anda yakin ingin Hapus data ini ?')" class="btn btn-danger">Hapus</button>
                      </td>
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
        <div class="modal fade" id="ModalAddMenuAkses" tabindex="-1" role="dialog" aria-labelledby="ModalAddMenuAkses" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalAddMenuAkses">Tambah Menu Akses Management</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('Menu');?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  
                  <input type="text" class="form-control" id="menu" name="menu" placeholder="Masukan Akses Menu">
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
      
      