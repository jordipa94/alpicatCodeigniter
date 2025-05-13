<?= $this->extend('layouts/dashboard'); ?>
<?= $this->section('contingut'); ?>
<div class="w3-container">
    <h2>Editar Esdeveniment</h2>
    <form action="<?= base_url('eventos/update/'.$evento['id_evento']) ?>" method="post" class="w3-card-4 w3-padding w3-round w3-light-grey">
        <label for="titulo">Títol</label>
        <input type="text" name="titulo" class="w3-input w3-border w3-round" value="<?= esc($evento['titulo']) ?>" required>

        <label for="descripcion" class="w3-margin-top">Descripció</label>
        <textarea name="descripcion" class="w3-input w3-border w3-round"><?= esc($evento['descripcion']) ?></textarea>

        <label for="fecha_inicio" class="w3-margin-top">Data Inici</label>
        <input type="datetime-local" name="fecha_inicio" class="w3-input w3-border w3-round" value="<?= esc($evento['fecha_inicio']) ?>">

        <label for="fecha_fin" class="w3-margin-top">Data Fi</label>
        <input type="datetime-local" name="fecha_fin" class="w3-input w3-border w3-round" value="<?= esc($evento['fecha_fin']) ?>">

        <label for="color" class="w3-margin-top">Color</label>
        <input type="color" name="color" class="w3-input w3-border w3-round" value="<?= esc($evento['color']) ?>">

        <button type="submit" class="w3-button w3-blue w3-round w3-margin-top">Actualitzar</button>
    </form>
</div>
<?= $this->endSection(); ?>