<!DOCTYPE html>
<html>
<head>
    <title>Cek Angka</title>
</head>
<body>
    <h1>Masukkan Angka</h1>
    <form action="/cek-angka" method="post">
        @csrf
        <input type="number" name="angka" required>
        <button type="submit">Cek</button>
    </form>
    @if(session('hasil'))
        <h2>Hasil: {{ session('hasil') }}</h2>
    @endif
</body>
</html>