<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode Product <?= $item->barcode ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            text-align: center;
            max-width: 400px;
            width: 100%;
        }

        img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
        }

        .barcode {
            font-size: 1.2em;
            color: #333;
            margin-bottom: 10px;
        }

        .price {
            font-size: 1.5em;
            font-weight: bold;
            color: #007bff;
        }

        .label {
            font-size: 1em;
            color: #555;
        }
    </style>
</head>

<body>
    <div class="container">
        <?php
        $generator = new Picqer\Barcode\BarcodeGeneratorPNG();
        echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($item->barcode, $generator::TYPE_CODE_128)) . '">';
        ?>
        <div class="barcode"><?= '<b>' . $item->barcode . '</b>' ?></div>
        <div class="label">Prix:</div>
        <div class="price"><?= '<b>' . indo_currency($item->price) . '</b>' ?></div>
    </div>
</body>

</html>
