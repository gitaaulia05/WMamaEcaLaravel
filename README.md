# WARUNK MAMA ECA

<h1>Latar Belakang</h1>

 Website yang dibuat dengan latar belakang berdasarkan kondisi nyata, yang di mana seorang admin toko selalu kewalahan dalam mendata barang masuk/keluar, harga-harga barang yang tidak tercatat dengan rapih, serta catatan para pengkasbon yang tidak teratur.


- manfaat
Website ini memiliki beberapa manfaat yakni mempermudah admin dalam mengelola barang sehingga tidak akan berserakan data dari masing-masing barangnya, serta memiliki manfaat remainder untuk para pengkasbon agar tidak lupa untuk segera membayar hutangnya sehingga admin tidak perlu bersusah payah mengingatkan satu-satu secara langsung kepada para pengkasbon.

- fitur - fitur 
Website ini memiliki beberapa fitur yang bermanfaat di antaranya: 
- dashboard (menampilkan barang-barang yang dijual serta dapat melakukan penambahan data dari tiap barang dan juga dapat melihat laporan dari suatu barang tersebut).
- Laporan pengeluaran barang (menampilkan informasi terkait penjualan dari tiap-tiap barang secara rinci).
- Kasbon (berisikan data-data dari para pengkasbon sehingga memudahkan sang admin dalam mengelolanya).
- Angsuran kasbon (berisikan informasi mengenai data dari tiap pengkasbon dalam menyicil hutangnya hingga lunas).
- Remainder kasbon (sebuah notifikasi yang akan diterima oleh para pengkasbon untuk segera melakukan pembayaran terhadap hutangnya).


## Prasyarat

Proyek ini berbasis web untuk manajemen dan pemesanan di "Warung Mamah Eca". Proyek dibangun menggunakan Laravel 11, dengan database MySQL, dan berjalan di atas web server Apache.

### Requirements
- PHP  8.3.10
- Composer v2.7.9
- Web Server Apache
- Node js v20.17.0


### Database
- Mysql

## Panduan Instalasi
 Anda Bisa Menginstall Proyek ini dengan perintah
 ```sh
 git clone https://github.com/gitaaulia05/WMamaEcaLaravel.git
 ```

 - Jalankan Perintah migrate untuk membuat table database 

 ```sh
 php artisan migrate
 ```

 - Jalankan Perintah dibawah untuk menjalankan server Laravel 
 ```sh
 php artisan serve
 ```
- Jalankan Perintah dibawah untuk menjalankan Tailwind
```sh
npm run dev
```
