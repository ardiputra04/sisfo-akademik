




      <div class="content">
        <div class="container-fluid">
            
          <div class="row">
            <div class="col-lg-6 col-md-12">
              

              <?= $this->session->flashdata('message');  ?>
              
              <h5>Role : <?= $role['role'];  ?></h5>
              <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Menu</th>
                    <!-- <th scope="col">Kedua</th> -->
                    <th scope="col">Akses</th>
                  </tr>
                </thead>
                <tbody>
                      <?php $i=1;  ?>
                      <?php foreach($menu as $m): ?>
                  <tr>
                      <th scope="row"><?= $i;  ?></th>
                      <td><?= $m['menu'];  ?></td>
                      <td>
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox" <?= check_access($role['id'], $m['id']);  ?> data-role="<?= $role['id'];  ?>" data-menu="<?= $m['id'];  ?>">
                                <span class="form-check-sign">
                                    <span class="check"></span>
                                </span>
                            </label>
                        </div>
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

      
    
      
      