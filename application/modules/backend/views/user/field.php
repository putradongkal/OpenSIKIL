<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label">Nama Pengguna</label>
    <div class="col-sm-10">
        <input type="text" id="name" class="form-control" name="name" required placeholder="Nama Pengguna" value="<?= isset($user->name) ? $user->name : set_value('name'); ?>" >
        <?= form_error('name', '<span class="messages text-danger">', '</span>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="username" class="col-sm-2 col-form-label">Username</label>
    <div class="col-sm-10">
        <input type="text" id="username" class="form-control" name="username" required placeholder="Username" value="<?= isset($user->username) ? $user->username : set_value('username'); ?>" >
        <?= form_error('username', '<span class="messages text-danger">', '</span>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-sm-2 col-form-label">Email</label>
    <div class="col-sm-10">
        <input type="text" id="email" class="form-control" name="email" required placeholder="Username" value="<?= isset($user->email) ? $user->email : set_value('email'); ?>" >
        <?= form_error('email', '<span class="messages text-danger">', '</span>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="phone-number" class="col-sm-2 col-form-label">Nomor Handphone</label>
    <div class="col-sm-10">
        <input type="text" id="phone-number" class="form-control phone-number" name="phone_number" required placeholder="Nomor Handphone" value="<?= isset($user->phone_number) ? $user->phone_number : set_value('phone_number'); ?>" >
        <?= form_error('phone_number', '<span class="messages text-danger">', '</span>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="role" class="col-sm-2 col-form-label">Hak Akses</label>
    <div class="col-sm-10">
        <select class="form-control" name="role_id" id="role" required>
            <option value="">-Pilih Hak Akses-</option>
            <?php
            $role_value = isset($user->role_id) ? $user->role_id : set_value('role_id');
            foreach ($roles as $role)
            {
                $selected = $role->id == $role_value ? 'selected' : '';
                echo '<option value="'.$role->id.'" '.$selected.'>'.$role->display_name.'</option>';
            }
            ?>
        </select>
        <?= form_error('employee', '<span class="messages text-danger">', '</span>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-sm-2 col-form-label">Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password" name="password" placeholder="Password" minlength="6" <?= isset($user) ? '' : 'required' ?>>
        <?= form_error('password', '<span class="messages text-danger">', '</span>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="password_confirmation" class="col-sm-2 col-form-label">Konfirmasi Password</label>
    <div class="col-sm-10">
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi Password" minlength="6" <?= isset($user) ? '' : 'required' ?>>
        <?= form_error('password_confirmation', '<span class="messages text-danger">', '</span>'); ?>
    </div>
</div>
<div class="form-group row">
    <label for="name" class="col-sm-2 col-form-label"></label>
    <div class="col-sm-10 mt-3 float-right">
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="<?= base_url('user') ?>" class="btn btn-danger">Batal</a>
    </div>
</div>