<!DOCTYPE html>
<html lang="en">
<head>
	<?= $this->element('dashboard_includes') ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
	<?= $this->element('dashboard_header') ?>
	<aside class="main-sidebar">
	<?= $this->element('dashboard_sidebar');?>
	</aside>
	<!-- Page Content -->
	<div class="content-wrapper">
		<?= $this->Flash->render() ?>
		<div class="row">
			<?= $this->fetch('content') ?>
		</div>
	</div>
	</div>
<?= $this->element('dashboard_js_includes');?>
</body>
</html>
