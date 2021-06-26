# Praktikum 11: PHP Framework (Codeigniter)
# Mata Kuliah Pemrograman WEB
```
Nama  : Abdul Majid
NIM   : 311810693
Kelas : TI.19.C.1
Universitas Pelita Bangsa
```
## Langkah Praktikum
### Instalasi Codeigniter 4
Mengunduh Codeigniter lalu menambahkannya ke dalam folder htdocs/Lab11Web.
lalu Ubah nama direktory framework-4.x.xx menjadi ci4. lalu coba untuk mengakses alamat http://localhost/Lab11Web/ci4/public

![1](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/1.PNG)

## Mengakses dengan local development server
Codeigniter 4 memiliki fitur local development server, sehingga anda bisa menjalankan aplikasi meskipun service apache tidak dijalankan.

Caranya buka CMD / Terminal lalu akses folder project anda. dalam contoh ini adalah C:/xampp/htdocs/Lab11Web/ci4/

lalu jalankan perintah :
```
php spark serve
```
sehingga kurang lebih seperti berikut ini :
![1.1](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/1.1.PNG)
Berikutnya anda bisa mengakses project codeigniter dengan menggunakan alamat :
```
localhost:8080
```
![1.2](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/1.2.PNG)

### Menjalankan CLI (Command Line Interface)
Untuk mengakses CLI buka terminal/command prompt.
Arahkan lokasi direktori sesuai dengan direktori kerja project dibuat
(xampp/htdocs/Lab11Web/ci4/)
lalu masukan perintah PHP SPARK untuk memanggil CLI Codeigniter.

![2](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/2.PNG)

### Mengaktifkan Mode Debugging
Untuk mengaktifkan mode debugging, kita harus mengubah environment variabel CI_ENVIRONMENT menjadi development.

![3](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/3.PNG)

Setelah itu, ubah nama file env menjadi .env (tinggal tambah titik di depan).

Untuk mencoba error tersebut, ubah kode pada file
app/Controller/Home.php hilangkan titik koma pada akhir kode.

![4](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/4.PNG)
![5](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/5.PNG)

### Membuat Route Baru
Tambahkan kode berikut di dalam Routes.php
```php
$routes->get('/about', 'Page::about');
$routes->get('/contact', 'Page::contact');
$routes->get('/faqs', 'Page::faqs');
```
Untuk mengetahui route yang ditambahkan sudah benar, buka CLI dan jalankan
perintah berikut.
```
php spark routes
```
![6](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/6.PNG)

Selanjutnya coba akses route yang telah dibuat dengan mengakses alamat url http://localhost/Lab11Web/ci4/public/about

![7](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/7.PNG)

### Membuat Controller
Selanjutnya adalah membuat Controller Page. Buat file baru dengan nama page.php
pada direktori Controller kemudian isi kodenya seperti berikut.
```php
<?php
namespace App\Controllers;
class Page extends BaseController
{
    public function about()
    {
        echo "Ini halaman About";
    }
    public function contact()
    {
        echo "Ini halaman Contact";
    }
    public function faqs()
    {
        echo "Ini halaman FAQ";
    }
}
```
Selanjutnya refresh Kembali browser.
![8](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/8.PNG)

### Auto Routing
Secara default fitur autoroute pada Codeiginiter sudah aktif. Untuk mengubah status autoroute dapat mengubah nilai variabelnya. Untuk menonaktifkan ubah nilai true menjadi false.
```php
$routes->setAutoRoute(true);
```
Tambahkan method baru pada Controller Page seperti berikut.
```php
public function tos()
    {
        echo "ini halaman Term of Services";
    }
```
Method ini belum ada pada routing, sehingga cara mengaksesnya dengan menggunakan
alamat: http://localhost/Lab11Web/ci4/public/page/tos
![9](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/9.PNG)

### Membuat View
Selanjutnya adalam membuat view untuk tampilan web agar lebih menarik. Buat file
baru dengan nama about.php pada direktori view (app/view/about.php) kemudian isi
kodenya seperti berikut.
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
</head>
<body>
    <h1><?= $title; ?></h1>
    <hr>
    <p><?= $content; ?></p>
</body>
</html>
```
Ubah method about pada class Controller Page menjadi seperti berikut:
```php
public function about()
    {
        return view('about', [
            'title' => 'Halaman About',
            'content' => 'Ini adalah halaman about yang menjelaskan tentang isi halaman ini.'
        ]);
    }
```
![10](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/10.PNG)

### Membuat Layout Web dengan CSS
Buat file css pada direktori public dengan nama style.css (copy file dari praktikum lab4_layout).
Kemudian buat folder template pada direktori view kemudian buat file header.php dan footer.php

File app/view/template/header.php
```php
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="<?= base_url('/style.css');?>">
</head>
<body>
    <div id="container">
    <header>
        <h1>Layout Sederhana</h1>
    </header>
        <nav>
            <a href="<?= base_url('/');?>" class="active">Home</a>
            <a href="<?= base_url('/artikel');?>">Artikel</a>
            <a href="<?= base_url('/about');?>">About</a>
            <a href="<?= base_url('/contact');?>">Kontak</a>
        </nav>
    <section id="wrapper">
        <section id="main">
```
File app/view/template/footer.php
```php
        </section>
        <aside id="sidebar">
            <div class="widget-box">
                <h3 class="title">Widget Header</h3>
                <ul>
                    <li><a href="#">Widget Link</a></li>
                    <li><a href="#">Widget Link</a></li>
                </ul>
            </div>
            <div class="widget-box">
                <h3 class="title">Widget Text</h3>
                <p>Vestibulum lorem elit, iaculis in nisl volutpat, malesuada tincidunt arcu. Proin in leo fringilla, vestibulum mi porta, faucibus felis. Integer pharetra est nunc, nec pretium nunc pretium ac.</p>
            </div>
        </aside>
    </section>
    <footer>
        <p>&copy; 2021 - Universitas Pelita Bangsa</p>
    </footer>
    </div>
</body>
</html>
```
Kemudian ubah file app/view/about.php seperti berikut.
```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>

<?= $this->include('template/footer'); ?>
```
Selanjutnya refresh tampilan pada alamat http://localhost:8080/about
![11](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/11.PNG)

## Pertanyaan dan Tugas
Lengkapi kode program untuk menu lainnya yang ada pada Controller Page, sehingga
semua link pada navigasi header dapat menampilkan tampilan dengan layout yang
sama.

## Jawab
### Halaman Home
Membuat file baru index_home.php (app/view/index_home.php).
```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>

<?= $this->include('template/footer'); ?>
```
Ubah method index pada class Controller Home.php menjadi seperti berikut:
```php
<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('index_home', [
            'title' => 'Halaman Home',
            'content' => 'Ini adalah halaman home yang merupakan halaman utama.'
        ]);
	}
}
```
![12](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/12.PNG)

### Halaman Artikel
Membuat file baru artikel.php (app/view/artikel.php).
```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>

<?= $this->include('template/footer'); ?>
```
Tambah method artikel pada class Controller page menjadi seperti berikut:
```php
public function artikel()
    {
        return view('artikel', [
            'title' => 'Halaman Artikel',
            'content' => 'Ini adalah halaman artikel yang berisi kumpulan artikel yang di publikasi di halaman ini.'
        ]);
    }
```
![13](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/13.PNG)

### Halaman Kontak
Membuat file baru contact.php (app/view/contact.php).
```php
<?= $this->include('template/header'); ?>

<h1><?= $title; ?></h1>
<hr>
<p><?= $content; ?></p>

<?= $this->include('template/footer'); ?>
```
Ubah method contact pada class Controller page menjadi seperti berikut:
```php
public function contact()
    {
        return view('contact', [
            'title' => 'Halaman Contact',
            'content' => 'Ini adalah halaman contact yang berisi nomor dan alamat dari pemilik halaman ini.'
        ]);
    }
```
![14](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/14.PNG)


# Praktikum 12: Framework Lanjutan (CRUD)

## Langkah Praktikum
### Membuat Database
```sql
CREATE DATABASE lab_ci4;
```
### Membuat Tabel
```sql
CREATE TABLE artikel (
id INT(11) auto_increment,
judul VARCHAR(200) NOT NULL,
isi TEXT,
gambar VARCHAR(200),
status TINYINT(1) DEFAULT 0,
slug VARCHAR(200),
PRIMARY KEY(id)
);
```
### Membuat Model
Selanjutnya adalah membuat Model untuk memproses data Artikel. Buat file baru pada
direktori app/Models dengan nama ArtikelModel.php
```php
<?php
namespace App\Models;
use CodeIgniter\Model;
class ArtikelModel extends Model
{
    protected $table = 'artikel';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $allowedFields = ['judul', 'isi', 'status', 'slug', 'gambar'];
}
```
### Membuat Controller
Buat Controller baru dengan nama Artikel.php pada direktori app/Controllers.
```php
<?php
namespace App\Controllers;
use App\Models\ArtikelModel;
class Artikel extends BaseController
{
public function index()
    {
        $title = 'Daftar Artikel';
        $model = new ArtikelModel();
        $artikel = $model->findAll();
        return view('artikel/index', compact('artikel', 'title'));
    }
}
```
### Membuat View
Buat direktori baru dengan nama artikel pada direktori app/views, kemudian buat file
baru dengan nama index.php.
```php
<?= $this->include('template/header'); ?>

<?php if($artikel): foreach($artikel as $row): ?>
<article class="entry">
    <h2<a href="<?= base_url('/artikel/' . $row['slug']);?>"><?= $row['judul']; ?></a>
    </h2>
    <img src="<?= base_url('/gambar/' . $row['gambar']);?>" alt="<?= $row['judul']; ?>">
    <p><?= substr($row['isi'], 0, 200); ?></p>
</article>
<hr class="divider" />
<?php endforeach; else: ?>
<article class="entry">
<h2>Belum ada data.</h2>
</article>
<?php endif; ?>

<?= $this->include('template/footer'); ?>
```
![20](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/20.PNG)

Belum ada data yang diampilkan. Kemudian coba tambahkan beberapa data pada
database agar dapat ditampilkan datanya.
```sql
INSERT INTO artikel (judul, isi, slug) VALUE
('Artikel pertama', 'Lorem Ipsum adalah contoh teks atau dummy dalam industri
percetakan dan penataan huruf atau typesetting. Lorem Ipsum telah menjadi
standar contoh teks sejak tahun 1500an, saat seorang tukang cetak yang tidak
dikenal mengambil sebuah kumpulan teks dan mengacaknya untuk menjadi sebuah
buku contoh huruf.', 'artikel-pertama'),
('Artikel kedua', 'Tidak seperti anggapan banyak orang, Lorem Ipsum bukanlah
teks-teks yang diacak. Ia berakar dari sebuah naskah sastra latin klasik dari
era 45 sebelum masehi, hingga bisa dipastikan usianya telah mencapai lebih
dari 2000 tahun.', 'artikel-kedua');
```
![21](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/21.PNG)

### Membuat Tampilan Detail Artikel
Tampilan pada saat judul berita di klik maka akan diarahkan ke halaman yang berbeda.
Tambahkan fungsi baru pada Controller Artikel dengan nama view().
```php
    public function view($slug)
        {
            $model = new ArtikelModel();
            $artikel = $model->where([
                'slug' => $slug
            ])->first();
            
            // Menampilkan error apabila data tidak ada.
            if (!$artikel)
            {
                throw PageNotFoundException::forPageNotFound();
            }
            $title = $artikel['judul'];
            return view('artikel/detail', compact('artikel', 'title'));
        }
```

### Membuat View Detail
Buat view baru untuk halaman detail dengan nama app/views/artikel/detail.php.
```php
<?= $this->include('template/header'); ?>

<article class="entry">
    <h2><?= $artikel['judul']; ?></h2>
    <img src="<?= base_url('/gambar/' . $artikel['gambar']);?>" alt="<?= $artikel['judul']; ?>">
    <p><?= $row['isi']; ?></p>
</article>

<?= $this->include('template/footer'); ?>
```
### Membuat Routing untuk artikel detail
Buka Kembali file app/config/Routes.php, kemudian tambahkan routing untuk artikel
detail.
```php
$routes->get('/artikel/(:any)', 'Artikel::view/$1');
```
![22](https://github.com/abdulmajid96/Lab11Web/blob/main/SS/22.PNG)

### Membuat Menu Admin
Menu admin adalah untuk proses CRUD data artikel. Buat method baru pada
Controller Artikel dengan nama admin_index().
```php
    public function admin_index()
        {
            $title = 'Daftar Artikel';
            $model = new ArtikelModel();
            $artikel = $model->findAll();
            return view('artikel/admin_index', compact('artikel', 'title'));
        }
```
Selanjutnya buat view untuk tampilan admin dengan nama admin_index.php
```php
<?= $this->include('template/admin_header'); ?>

<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </thead>
    <tbody>
    <?php if($artikel): foreach($artikel as $row): ?>
    <tr>
        <td><?= $row['id']; ?></td>
        <td>
            <b><?= $row['judul']; ?></b>
            <p><small><?= substr($row['isi'], 0, 50); ?></small></p>
        </td>
        <td><?= $row['status']; ?></td>
        <td>
            <a class="btn" href="<?= base_url('/admin/artikel/edit/' .
            $row['id']);?>">Ubah</a>
            <a class="btn btn-danger" onclick="return confirm('Yakin
            menghapus data?');" href="<?= base_url('/admin/artikel/delete/' .
            $row['id']);?>">Hapus</a>
        </td>
    </tr>
    <?php endforeach; else: ?>
    <tr>
        <td colspan="4">Belum ada data.</td>
    </tr>
    <?php endif; ?>
    </tbody>
    <tfoot>
        <tr>
            <th>ID</th>
            <th>Judul</th>
            <th>Status</th>
            <th>AKsi</th>
        </tr>
    </tfoot>
</table>

<?= $this->include('template/admin_footer'); ?>
```
Tambahkan routing untuk menu admin seperti berikut: