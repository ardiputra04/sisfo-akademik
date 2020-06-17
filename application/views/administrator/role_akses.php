




      <div class="content">
        <div class="container-fluid">
            
          <div class="row">
            <div class="col-lg-6 col-md-12">
              <?= form_error('menu', '<div class="alert alert-warning alert-dismissible fade show" role="alert">','</div>');  ?>

              <?= $this->session->flashdata('message');  ?>
              <button  class="btn btn-info" data-toggle="modal" data-target="#ModalAddRole">Tambah Role</button>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Role</th>
                    <!-- <th scope="col">Kedua</th> -->
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                      <?php $i=1;  ?>
                      <?php foreach($role as $r): ?>
                  <tr>
                      <th scope="row"><?= $i;  ?></th>
                      <td><?= $r['role'];  ?></td>
                      <td onclick="javascript: return confirm('Anda yakin ingin edit access role ini ?')"><?= anchor('Admin/role_access/'.$r['id'], '<div class="btn btn-warning btn-sm">Access</div>')  ;?>
                      </td>
                      <td onclick="javascript: return confirm('Anda yakin ingin edit access role ini ?')"><?= anchor('Admin/role_edit/'.$r['id'], '<div class="btn btn-success btn-sm">Edit</div>') ;?>
                        
                      </td>
                      <td onclick="javascript: return confirm('Anda yakin ingin hapus access role ini ?')"><?= anchor('Admin/role_hapus/'.$r['id'], '<div class="btn btn-danger btn-sm">Hapus</div>') ;?>  
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
        <div class="modal fade" id="ModalAddRole" tabindex="-1" role="dialog" aria-labelledby="ModalAddRole" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="ModalAddRole">Tambah Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="<?= base_url('Admin/role_akses');?>" method="post">
              <div class="modal-body">
                <div class="form-group">
                  <label class="bmd-label-floating">Role</label>
                  <input type="text" class="form-control" id="role" name="role">
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
      
      