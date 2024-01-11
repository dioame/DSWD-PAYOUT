<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pictures PDF</title>
</head>
<body>
<center>
    @foreach($chunks as $chunk)
    <span>DSWD Caraga <br>Photo Documentation</span>
        <table style='width:100%;'>
      
            @foreach($chunk as $picture)
                <tr>
                    @foreach($picture as $row)
                        <td>
                            <div style='width:300px; height:350px; border:1px solid black; margin:auto; margin-top:50px; position:relative;'>
                                <img src="{{ asset('storage/pictures/' . basename($row['path'])) }}" alt="Image" style='width:100%; height:100%; object-fit: cover;'>

                                <p style='position:absolute;bottom:0;right:10;font-size:8px;font-weight:bold;font-family:arial;color:yellow;background-color: rgba(0, 0, 0, 0.3);padding:3px;border-radius:5px;'>Payroll #<?= $row['payroll_no'] ?> - <?= date('M d, Y H:iA',strtotime($row['captured_at'])) ?></p>
                            </div>
                        </td>
                    @endforeach
                </tr>
            @endforeach
        </table>
        <div style="page-break-after: always;"></div>
    @endforeach
</center>


</body>
</html>
