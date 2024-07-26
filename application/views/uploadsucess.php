<!DOCTYPE html>
<html>
<head>
    <title>Upload Success</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center h-screen">
    <div class="text-center">
        <h3 class="text-2xl font-bold mb-4">Your file was successfully uploaded!</h3>
        <ul class="list-disc list-inside text-left">
            <?php foreach ($upload_data as $item => $value):?>
                <li class="mb-2"><?php echo $item;?>: <?php echo $value;?></li>
            <?php endforeach; ?>
        </ul>
        <p class="mt-4">
            <?php echo anchor('upload', 'Upload Another File!', ['class' => 'text-blue-500 hover:text-blue-700']); ?>
        </p>
    </div>
</body>
</html>
