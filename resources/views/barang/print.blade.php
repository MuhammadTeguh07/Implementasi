
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode @foreach($barang as $bar) {{ $bar->NAMA_BARANG }} @endforeach</title>
</head>
<body>
@foreach($barang as $b)
<table style="width:100%;">
    <tbody>
        <?php 
            $i=1;
            while($i<=9) 
            {
        ?>
        <tr>
            <?php 
                $j=1; 
                while($j<=5) 
                {
            ?>
            <td align="center"  style="border: 1px solid #ccc; width:147.96062992px; height:47.990551181; padding-bottom: 2.1692913386; padding-top: 2.6692913386; padding-left: 3">
                {{ $b->NAMA_BARANG }}<br>
                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($b->ID_BARANG, 'C128')}}" height="15px" width="100px"><br>
                {{ $b->ID_BARANG }}<br>
            </td>
            <?php 
                $j++;
                }            
            ?>
        </tr>
        <?php 
             $i++;
            }            
        ?>
    </tbody>
</table>
@endforeach
</body>
</html>