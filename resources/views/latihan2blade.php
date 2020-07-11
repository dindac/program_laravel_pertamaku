Menggunakan Blade<br>
Selamat Pagi {{$nama}} <br>

@if($nama == "Dinda")
    Baik hati
@else
    Tidak baik hati
@endif
<br>
@for ($i= 1; $i <= 5; $i++)
    Saya sedang belajar Pemrograman Web Berbasis Framework<br>
@endfor

