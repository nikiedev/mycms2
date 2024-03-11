<?= $this->extend('layouts/default') ?>

<?= $this->section('main') ?>

<?= $this->include('partials/column_left') ?>

<?= $this->section('content') ?>

<?= $this->include('partials/column_right') ?>

<?= $this->endSection() ?>
