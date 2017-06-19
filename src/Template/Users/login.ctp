<div class="users form">
<?= $this->Flash->render() ?>
<?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Please enter your username and password') ?></legend>
        <?= $this->Form->control('username') ?>
        <?= $this->Form->control('password') ?>
     <?= $this->Form->control('RememberMe',['type'=>'checkbox','label'=>'Remember Me']);?>

    </fieldset>
<?= $this->Form->button(__('Login')); ?>
<?= $this->Form->end() ?>
</div>
<!-- <style type="text/css">
label
{
	padding-top:-10px;
}
</style> -->