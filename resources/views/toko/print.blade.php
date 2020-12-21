
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barcode @foreach($toko as $t) {{ $t->NAMA_TOKO }} @endforeach</title>
</head>
<body>
@foreach($toko as $t)
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
                {{ $t->NAMA_TOKO }}<br>
                {!! \DNS1D::getBarcodeHTML("$t->ID_TOKO", 'C128') !!}<br>
                {{ $t->ID_TOKO }}<br>
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