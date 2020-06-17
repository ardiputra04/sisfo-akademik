

		<div class="wrapper">
			<div class="inner">
				<form action="<?= base_url('Auth'); ?>" method="post">
					<h3><?= $title ;?>	</h3>
					<?= $this->session->flashdata('message');?>
					<div class="form-row">
						
						<div class="form-wrapper">
							<label for="">Email *</label>
							<input type="text" class="form-control" name="email" id="email" placeholder="Masukan Email" value="<?= set_value('email') ;?>">
							<div class="text-danger"><?=form_error('email', '<small class="text-danger pl-3">','</small>'); ?></div>
						</div>
						<div class="form-wrapper">
							<label for="">Password *</label>
							<input type="password" class="form-control" name="password" id="password" placeholder="Password" value="<?= set_value('password') ;?>">
							<div class="text-danger"><?=form_error('password', '<small class="text-danger pl-3">','</small>'); ?></div>
						</div>
					</div>
					
					
					<button type="submit" data-text="Login">
						<span>Login</span>
					</button>
					<hr>
                  <div class="text-center">
                    <a  class="small" href="<?= base_url('Auth/Lupa_password')	;?>">Lupa Password?</a>
                  </div>
                  <div class="text-center">
                    <a class="small" href="<?= base_url('Auth/register');  ?>">Register</a>
                  </div>
				</form>
			</div>
		</div>
		
		