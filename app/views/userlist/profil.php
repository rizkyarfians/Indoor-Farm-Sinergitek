<div class="main">

    <div class="container">
        <div class="container_main">
            <div class="subhead" style="width: 100%;">
                <h2 class="subhead_text">User Profile</h2>
            </div>
        </div>

        <div class="formEdit">
            <form action="<?= URLBASE;?>/user/edit/<?=$data['user']['user_id'];?>" method="post">
                <label for="username">Username : </label>
                <input type="text" name="username" id="username" value="<?=$data['user']['username']?>">
                <label for="role">Role : </label>
                <select name="role">
                    <option ". <?= (($data['user']['role']=='admin') ? 'selected=" selected"': '' )?>. " value="admin">
                        Admin
                    </option>
                    <option ". <?= (($data['user']['role']=='client') ? 'selected=" selected"': '' )?>. "
                        value="client">
                        Client
                    </option>
                </select>
                <button class="simpanButton" type="submit">Simpan</button>
            </form>
            <div class="button_wrapper">
                <button id="hapus_button">Hapus</button>
                <a href="<?= URLBASE; ?>/user">
                    Kembali
                </a>
            </div>
        </div>

    </div>

</div>
<div class="hapusModal">

    <h2>Hapus Data <?= $data['user']['username'];?> ?</h2>
    <div class="button-wrapper">
        <a href="<?=URLBASE;?>/user/hapus/<?= $data['user']['user_id'];?>">Hapus</a>
        <button id="cancelButton">Batal</button>
    </div>
</div>