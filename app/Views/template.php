<?php
/**
 * Main Template File
 * Uses the new header and footer templates with role-specific navigation
 */
?>
<?= view('templates/header', ['title' => $title ?? 'LMS System']) ?>

<div class="container mt-5">
    <?= $this->renderSection('content') ?>
</div>

<?= view('templates/footer') ?>
