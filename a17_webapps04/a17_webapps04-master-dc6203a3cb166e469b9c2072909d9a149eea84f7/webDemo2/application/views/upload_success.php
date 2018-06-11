<html>
<head>
<title>Upload Form</title>
</head>
<body>

<h3>{success}</h3>

<ul>
<?php foreach ($upload_data as $item => $value):?>
<li><?php echo $item;?>: <?php echo $value;?></li>
<?php endforeach; ?>
</ul>

<p><?php echo anchor('UploadController', 'Upload Another File!'); ?></p>

</body>
</html>