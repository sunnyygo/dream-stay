<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unggah Banyak Gambar</title>
</head>
<body>
    <form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="images">Pilih Gambar:</label>
        <input type="file" name="images[]" id="images" multiple required>
        <button type="submit">Unggah</button>
    </form>
</body>
</html>
