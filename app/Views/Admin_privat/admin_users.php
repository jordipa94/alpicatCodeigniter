<?php echo $this->extend('layouts/dashboard'); ?>


<?php echo $this->section('contingut'); ?>

<head>
    <link rel="stylesheet" href="<?= base_url('css/pager.css') ?>">
</head>

<div class="w3-container">

    <h2>LLISTAT USUARIS</h2>

    <div class="w3-container w3-center w3-padding-16">
        <form action="<?= base_url('searchUser') ?>" method="GET" class="w3-center">
            <div class="w3-row" style="max-width: 400px; margin: auto;">
                <div class="w3-col s8 m9 l9">
                    <input type="text" name="keyword" value="<?= esc($keyword ?? '') ?>" 
                        placeholder="Buscar Usuaris..." class="w3-input w3-border w3-round">
                </div>
                <div class="w3-col s4 m3 l3">
                    <button type="submit" class="w3-button w3-blue w3-round w3-block">Buscar</button>
                </div>
            </div>
        </form>
    </div>
    
    <!-- DIVS AMB NOTICIES -->


     <table class="w3-table w3-bordered w3-striped w3-card-4">
     <thead>
         <tr class="w3-light-grey">
             <th>ID</th>
             <th>Nom</th>
             <th>Nom</th>
             <th>Email</th>
             <th>Password</th>
             <th>Opcions</th>
         </tr>
     </thead>
     <tbody>
         <?php foreach($users as $user): ?>
         <tr>
             <td><?= esc($user['id'])?></td>
             <td><?= esc($user['username'])?></td>
             <td><?= esc($user['full_name'])?></td>
             <td><?= esc($user['password'])?></td>
             <td><?= esc($user['role'])?></td>
             <td>
                 <button class="w3-button w3-gray"><a href="<?= base_url('Ver_users/'.esc($user['id'])) ?>">Veure</a></button>
                 <button class="w3-button w3-yellow"><a href="<?= base_url('Ver_users/'.esc($user['id'])) ?>">Editar</a></button>
                 <button class="w3-button w3-red"><a href="<?= base_url('deleteUser/' . esc($user['id'])) ?>">Eliminar</a></button>
             </td>
         </tr>
         <?php endforeach; ?>
     </tbody>
 </table>


    

</div>

    <div class="pagination-container" style="margin-left:1vw">
        <?= $pager->links() ?>
    </div>

<?php echo $this->endSection(); ?>