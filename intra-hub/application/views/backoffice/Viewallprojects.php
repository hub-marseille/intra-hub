<?php foreach ($projects as $project_item): ?>

    <h3><?php echo $project_item['name']; ?></h3>
    <?php echo $project_item['short_description']; ?>
    <a href="<?php echo site_url('backoffice/projects/'.$project_item['id']); ?>">View project</a>
<?php endforeach; ?>
<a href="/backoffice/projects/add">Créer un projet</a>

