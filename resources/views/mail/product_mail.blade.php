<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Addition</title>
    <style>
        @import url('https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css');
    </style>
</head>
<body class="bg-gray-100 p-4">
<div class="max-w-md mx-auto bg-white p-8 rounded shadow-md">
    <h2 class="text-2xl font-semibold mb-4">Product Addition</h2>
    <p class="mb-4">Dear {{ $userName }},</p>
    <p>Your product creation process has been successfully completed.</p>
    <p><span class="font-bold">Product Name: </span> {{ $productName }} </p>
    <p><span class="font-bold">Product Price: </span> {{ $productPrice }} </p>
    <p><span class="font-bold">Product Type: </span> {{ $productType }} </p>
    <p><span class="font-bold">Product Creation Date: </span> {{ $productDate }} </p>


    <p class="mt-4">Regards,<br>ExampleProductApi Team</p>
</div>
</body>
</html>
