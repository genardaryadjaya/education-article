<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Kategori;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artikel>
 */
class ArtikelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judulList = [
            'Tips Belajar Efektif di Rumah',
            'Mengenal Teknologi Informasi Sejak Dini',
            'Pentingnya Pendidikan Karakter untuk Anak',
            'Cara Mudah Memahami Matematika',
            'Manfaat Membaca Buku Setiap Hari',
            'Belajar Bahasa Inggris dengan Menyenangkan',
            'Menjaga Kesehatan di Masa Sekolah',
            'Eksperimen IPA Sederhana di Rumah',
            'Sejarah Kemerdekaan Indonesia',
            'Kreativitas dalam Seni Budaya',
        ];
        $isiList = [
            'Artikel ini membahas berbagai tips agar belajar di rumah menjadi lebih efektif dan menyenangkan.',
            'Teknologi informasi kini menjadi bagian penting dalam kehidupan sehari-hari, bahkan sejak usia dini.',
            'Pendidikan karakter sangat penting untuk membentuk kepribadian dan moral anak sejak kecil.',
            'Matematika tidak harus sulit! Temukan cara-cara mudah memahami konsep dasar matematika.',
            'Membaca buku setiap hari dapat meningkatkan wawasan dan daya imajinasi anak.',
            'Belajar bahasa Inggris bisa dilakukan dengan metode yang menyenangkan dan interaktif.',
            'Menjaga kesehatan tubuh sangat penting, terutama bagi pelajar yang aktif di sekolah.',
            'Eksperimen IPA sederhana bisa dilakukan di rumah dengan bahan-bahan yang mudah didapat.',
            'Sejarah kemerdekaan Indonesia adalah kisah perjuangan para pahlawan bangsa.',
            'Seni budaya dapat meningkatkan kreativitas dan rasa cinta terhadap warisan bangsa.',
        ];
        $judul = $this->faker->randomElement($judulList);
        $isi = $this->faker->randomElement($isiList);
        $gambar = 'https://placehold.co/600x400?text=Edukasi';
        return [
            'judul' => $judul,
            'isi' => $isi . '\n\n' . $this->faker->paragraphs(3, true),
            'gambar' => $gambar,
            'user_id' => User::inRandomOrder()->first()?->id ?? User::factory(),
            'kategori_id' => Kategori::inRandomOrder()->first()?->id ?? Kategori::factory(),
            'published_at' => $this->faker->boolean(80) ? $this->faker->dateTimeBetween('-1 year', 'now') : null,
        ];
    }
}
