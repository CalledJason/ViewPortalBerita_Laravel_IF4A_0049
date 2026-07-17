<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::create([
            'title' => 'Pemerintah Resmi Umumkan Kalender Libur Nasional 2026',
            'photo' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1600',
            'publisher' => 'Jason Admin',
            'content' => 'Pemerintah menetapkan jadwal hari libur nasional dan cuti bersama tahun 2026 untuk membantu masyarakat serta instansi dalam menyusun agenda kerja dan kegiatan sepanjang tahun.',
            'published' =>  date('Y-m-d')
        ]);

        Post::create([
            'title' => 'Timnas Indonesia Lolos ke Putaran Keempat Kualifikasi Piala Dunia',
            'photo' => 'https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900',
            'publisher' => 'Jason Admin',
            'content' => 'Tim Nasional Indonesia memastikan langkah ke putaran berikutnya setelah meraih hasil positif pada laga kualifikasi. Pencapaian ini menjadi salah satu prestasi penting bagi sepak bola Indonesia.',
            'published' =>  date('Y-m-d')
        ]);

        Post::create([
            'title' => 'Teknologi AI Semakin Banyak Dimanfaatkan di Dunia Pendidikan',
            'photo' => 'https://images.pexels.com/photos/1181244/pexels-photo-1181244.jpeg?auto=compress&cs=tinysrgb&w=800',
            'publisher' => 'Jason Admin',
            'content' => 'Berbagai institusi pendidikan mulai memanfaatkan kecerdasan buatan untuk membantu proses pembelajaran, penyusunan materi, hingga evaluasi akademik dengan tetap memperhatikan etika penggunaan teknologi.',
            'published' =>  date('Y-m-d')
        ]);

        Post::create([
            'title' => 'Harga Emas Mengalami Pergerakan Setelah Rilis Data Ekonomi Global',
            'photo' => 'https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900',
            'publisher' => 'Jason Admin',
            'content' => 'Perubahan kondisi ekonomi internasional memengaruhi pergerakan harga emas. Investor terus mencermati perkembangan pasar sebagai dasar dalam mengambil keputusan investasi.',
            'published' =>  date('Y-m-d'),
        ]);

        Post::create([
            'title' => 'Universitas Mendorong Mahasiswa Mengembangkan Portofolio Digital',
            'photo' => 'https://images.unsplash.com/photo-1495020689067-958852a7765e?w=900',
            'publisher' => 'Jason Admin',
            'content' => 'Sejumlah perguruan tinggi mengajak mahasiswa untuk membangun portofolio digital melalui proyek, penelitian, dan kontribusi open source guna meningkatkan kesiapan memasuki dunia kerja.',
            'published' =>  date('Y-m-d'),
        ]);
        
    }
}
