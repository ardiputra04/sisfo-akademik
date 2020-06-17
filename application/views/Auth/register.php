

		<div class="wrapper">
			<div class="inner">
				<form action="<?= base_url('Auth/Register'); ?>" method="post">
					<h3><?= $title ;?>	</h3>
					<div class="form-row">
						<div class="form-wrapper">
							<label for="">Nama Lengkap *</label>
							<input type="text" class="form-control" name="name" id="name" value="<?= set_value('name');?>" placeholder="Nama Calon Murid">
							<?= form_error('name', '<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-wrapper">
							<label for="">Tgl Lahir Calon Murid *</label>
							<input type="date" class="form-control" name="tgl_lahir" id="tgl_lahir" value="<?= set_value('tgl_lahir');?>">
							<?= form_error('tgl_lahir', '<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-row">
						<div class="form-wrapper">
							<label for="">Tempat Lahir *</label>
							<input type="text" class="form-control" name="tmpt_lahir" id="tmpt_lahir" placeholder="Masukan Tempat Lahir" value="<?= set_value('tmpt_lahir');?>">
							<?= form_error('tmpt_lahir', '<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-wrapper">
							<label for="">No Telp *</label>
							<input type="number" class="form-control" name="no_telp" id="no_telp" placeholder="Masukan No Telp" value="<?= set_value('no_telp');?>">
							<?= form_error('no_telp', '<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-row">
						<div class="form-wrapper">
							<label for="">Email *</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email Wali Murid" value="<?= set_value('email');?>">
							<?= form_error('email', '<small class="text-danger pl-3">','</small>'); ?>
						</div>
						<div class="form-wrapper">
							<label for="">Password *</label>
							<input type="password" class="form-control" name="password1" id="password1" placeholder="Masukan Password">
							<?= form_error('password1', '<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>

					<div class="form-row">
						<div class="form-wrapper">
							<label for="">Ulangi Password *</label>
							<input type="password" class="form-control" name="password2" id="password2" placeholder="Ulangi Pasword" >
							<?= form_error('password2', '<small class="text-danger pl-3">','</small>'); ?>
						</div>
					</div>
					
					
					<button type="submit" data-text="Daftar">
						<span>Daftar</span>
					</button>
					<hr>
                  <div class="text-center">
                    <a  class="small" href="<?= base_url('Auth/Lupa_password')	;?>">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('Auth');  ?>">Kembali</a>
                  </div>
				</form>
			</div>
		</div>
		
		