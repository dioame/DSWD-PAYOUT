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
    @foreach (array_chunk($images, 4) as $imageGroup)
        <div class="page">
            @foreach ($imageGroup as $image)
                <div class="image-group">
                    <img src="{{ asset('storage/pictures/' . basename($image)) }}" alt="Image">
                </div>
            @endforeach
        </div>
        <div class="page-break"></div>
    @endforeach
</body>
</html>
