<!DOCTYPE html>
<html>
<head>
    <title>Image Gallery</title>
    <style>
        body {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .page {
            width: 50%; /* Each page takes up 50% of the container */
            box-sizing: border-box;
            padding: 0 5px;
            display: flex;
            flex-direction: column;
            justify-content: space-between; /* Align groups vertically */
        }

        .image-group {
            width: 100%; /* Each group takes up 100% of the page width */
            box-sizing: border-box;
            display: flex;
            justify-content: space-between; /* Align images in each group */
        }

        .image-group img {
            width: 48%; /* Each image takes up 48% of the group width */
            height: auto;
            display: block;
        }

        @media print {
            body {
                display: block;
            }
        }
    </style>
</head>
<body>
    <a href="/print/generate-pdf" class="btn btn-primary">Generate PDF</a>
  
</body>
</html>

