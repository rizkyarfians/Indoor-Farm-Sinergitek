<div class="main">

    <div class="container">
        <div class="container_main">
            <div class="subhead" style="width: 100%;">
                <h2 class="subhead_text">User Connected</h2>
            </div>
        </div>

    </div>

    <?php Flasher::flash(); ?>
    <div class="table">
        <table cellpadding="15">
            <th>No.</th>
            <th>Username</th>
            <th>Role</th>
            <th>Device ID</th>
            <th>Edit</th>


            <?php $i = 1; ?>
            <?php foreach($data['user'] as $user) : ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $user["username"]; ?></td>
                <td><?= $user["role"]; ?></td>
                <td>aqua-111</td>
                <td>
                    <a class="modalEditButton" data-id=<?= $user['user_id']; ?>
                        href="<?= URLBASE;?>/user/profil/<?= $user['user_id'];?>">Edit</a>
                </td>

            </tr>
            <?php $i++; ?>
            <?php endforeach; ?>
        </table>
    </div>
</div>