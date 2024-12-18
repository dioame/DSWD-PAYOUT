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
    <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:20px; position:relative;">
        <!-- Logo Container -->
        <div style="position:absolute; left:25px; display:flex; gap:10px;">
            <img src="{{ asset('assets/images/logo/dswd/mixed-logo.jpg') }}" alt="Logo 1" style="width:auto; height:40px; object-fit:contain;">
        </div>
        <!-- Text Container -->
        <div style="margin:auto; text-align:center; position:inherit;">
            <span style="font-weight:bold; font-size:25px; font-family:Arial;">
                Photo Documentation
            </span><br>
            <small style="font-size:16px; font-family:Arial;">DSWD Field Office Caraga</small>
        </div>
    </div>
    <table style='width:100%;'>
        @foreach($chunk as $picture)
        <tr>
            @foreach($picture as $row)
            <?php
            $path = asset('storage/assets/unclaimed.png');
            if ($row['path']) {
                $path  = asset('storage/' . $row['path']);
            }
            ?>
            <td>
                <div style="width:300px; height:350px; border:1px solid black; margin:auto; margin-top:50px; position:relative; overflow:hidden;">
                    <img src="{{ $path }}" alt="Image" style="width:100%; height:100%; object-fit:cover;">
                    <div style="position:absolute; width:100%; bottom:0; left:0; font-size:11px; font-weight:bold; font-family:arial; background-color:rgba(0, 0, 0, 0.3); padding:5px 10px; color:white; box-sizing:border-box;">
                        @if($row['path'])
                            <p style="margin:0; color:yellow;">Payroll #<?= $row['payroll_no'] ?> - <?= date('M d, Y H:iA', strtotime($row['captured_at'])) ?></p>
                            <p style="margin:0;"><?= $row['barangay'] ?>, <?= $row['municipality'] ?></p>
                        @else
                            <p style="margin:0; font-weight:bold; color:black;">Payroll #<?= $row['payroll_no'] ?> - <?= ucwords(strtolower($row['name'])) ?></p>
                            <p style="margin:0; color:black;"><?= $row['barangay'] ?>, <?= $row['municipality'] ?></p>
                        @endif
                    </div>
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
