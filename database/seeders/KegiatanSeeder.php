<?php

namespace Database\Seeders;

use App\Models\Anggota;
use App\Models\Kegiatan;
use Illuminate\Database\Seeder;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\File;

class KegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
        public function run(): void
        {
            if (!File::exists(public_path('images'))) {
                File::makeDirectory(public_path('images'), 0755, true);
            }
        
            $imageMap = [
                'kegiatan1.jpg' => 'kegiatan-default1.png',
                'kegiatan2.jpg' => 'kegiatan-default2.png',
                'kegiatan3.jpg' => 'kegiatan-default3.png',
            ];
        
            foreach ($imageMap as $target => $source) {
                $targetPath = public_path("images/{$target}");
                $sourcePath = public_path("Company/assets/img/{$source}");
                if (!File::exists($targetPath) && File::exists($sourcePath)) {
                    File::copy($sourcePath, $targetPath);
                }
            }
        
            $user = \App\Models\User::first();
        
            $kegiatan1 = Kegiatan::create([
                'nama_kegiatan' => 'Hari Bermuhammadiyah, PCM Depok Gelar Apel Akbar',
                'deskripsi' => 'Hari lahir Muhammadiyah yang bertepatan dengan 18 November disebut juga sebagai hari bermuhammadiyah. Pada hari ini, Senin 18 November 2024 merupakan milad Muhammadiyah yang ke 112 tahun. Bagi warga Muhammadiyah di berbagai penjuru Nusantara, mulai dari Pusat hingga Wilayah, Daerah, Cabang, dan Ranting tentu banyak yang memperingati hari penting Persyarikatan ini.
        
                Di Pimpinan Cabang Muhammadiyah (PCM) Depok Sleman Yogyakarta, memperingati dan merayakan milad Muhammadiyah 112 sekaligus hari bermuhammadiyah kali ini dengan menggelar Apel Akbar. Kegiatan ini dilangsungkan di lapangan sepakbola Gorongan Condongcatur, sebelah selatan persis SD Muhammadiyah Condongcatur.
                
                Kegiatan ini dihadiri oleh ribuan siswa dan warga Muhammadiyah se-kapanewon Depok. 
                
                Dalam pidatonya, Ketua PCM Depok sekaligus inspektur upacara M Ichsan menyampaikan, bahwa usia Muhammadiyah yang mencapai 112 tahun tidak hanya menunjukkan eksistensi, lebih dari itu capaian ini menunjukkan sebuah kematangan sebuah organisasi. “Bukan sekedar angka apalagi titik henti, masih terlalu banyak pekerjaan rumah baik di internal maupun menyelesaikan problem bangsa. Tentu kita akan bahu-membahu menjadikan Muhammadiyah sebagai wasilah menghadirkan kemakmuran bagi semua,” tegasnya.
                
                Setidaknya, Ichsan melanjutkan, PR tersebut bisa diatasi dengan tiga hal. Yaitu memperkuat gerakan jamaah, gerakan jariyah, juga gerakan jamiyah. “Bila gerakan ini dilakukan dengan ikhlas dan serius, dampak positif terhadap kemakmuran bisa dirasakan,” ucapnya.
                
                Selain itu, Ketua PCM ini juga mengingatkan, agar hubungan di internal terus dijaga supaya kokoh. Termasuk mengingatkan agar jumlah anggota Muhammadiyah terus bertambah dan berkembang. Tidak hanya secara kuantitas, tapi juga secara kualitas.
                
                “Selamat milad Muhammadiyah ke 112, mari kita hadirkan bersama kemakmuran untuk semua. Dengan jalan terus membangun dan menguatkan jaman, jariyah, dan jamiyah,” pungkas Ichsan',
                'lokasi' => 'lapangan sepakbola Gorongan Condongcatur, sebelah selatan persis SD Muhammadiyah Condongcatur',
                'tanggal' => '2024-11-18',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);
            $kegiatan1->addMedia(public_path('images/kegiatan1.jpg'))->preservingOriginal()->toMediaCollection(Kegiatan::MEDIA_COLLECTION);
        
            $kegiatan2 = Kegiatan::create([
                'nama_kegiatan' => 'PCM Depok, Gelar Pengajian Akbar dan Bakti Sosial',
                'deskripsi' => 'Dalam rangka sambut bulan Ramadhan, pengajian rutin Ahad ketiga PCM Depok digelar lebih meriah daripada biasanya. Kali ini pengajian dilangsungkan di halaman SMP Muhammadiyah 2 Depok pada Ahad, 16/02/2025.

                Hendro Sucipto Kepala SMP Muhammadiyah 2 Depok menyampaikan, bahwa kegiatan ini merupakan gabungan dari beberapa kelompok pengajian seperti pengajian wali murid, masyarakat dan PCM Depok. “Terimakasih karena sudah bersedia hadir. Kegiatan ini merupakan gabungan antara kelompok pengajian wali murid, masyarakat, juga pengajian rutin Ahad pagi PCM,” terangnya.

                Sementara itu, M. Ichsan Ketua PCM Depok dalam sambutannya menyampaikan, bahwa hampir seluruh amal usaha Muhammadiyah di wilayah Depok sedang mengalami perkembangan yang baik.

                Hal ini menurut Ichsan, tidak lepas dari peran serta dan perjuangan bersama baik pimpinan, anggota, kader dan simpatisan. “Alhamdulillah semakin hari amal usaha ini mulai berkembang baik, itu artinya semakin dipercaya oleh masyarakat luas,” ucapnya.

                Hadir sebagai penceramah kali ini adalah Ikhwan Ahada ketua PWM DIY. Dalam ceramahnya Ikhwan mengingatkan pentingnya menyampaikan diri guna menyambut kehadiran bulan Ramadhan yang tinggal beberapa hari saja.

                Adapun persiapan itu meliputi mental atau rohani, fisik atau jasmani serta finansial. Ketiga hal ini sangat penting dipersiapkan dan dijaga agar Ramadhan nanti bisa dijalani dengan mudah juga gembira serta bermakna.

                Acara yang dihadiri lebih kurang 500an jamaah ini juga diramaikan dengan berbagai tampilan seni dari siswa SMP Muhammadiyah 2 Depok juga bazzar UMKM. (gsh/m)',
                'lokasi' => 'SMP Muhammadiyah 2 Depok',
                'tanggal' => '2025-02-16',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);
            $kegiatan2->addMedia(public_path('images/kegiatan2.jpg'))->preservingOriginal()->toMediaCollection(Kegiatan::MEDIA_COLLECTION);
        
            $kegiatan3 = Kegiatan::create([
                'nama_kegiatan' => 'Lewat Ideopolitor, PCM Depok Kuatkan Kembali Ideologi Muhammadiyah',
                'deskripsi' => 'Ideolopolitor, kajian diskusi Ideologi Politik dan Organisasi diselenggarakan oleh Pimpinan Cabang Muhammadiyah Aisyiyah Depok, satu bentuk ikhtiar dalam menjaga ideologi anggota dan pimpinan Muhammadiyah. Acara ini mengambil tempat di Aula KH Ahmad Dahlan, SD Muhammadiyah Condongcatur, Sleman pada Ahad (19/1).

                Mengusung tema "MeMuhammadiyahkan Warga Muhammadiyah" sebagai bentuk responsi atas berbagai Isu yang kini tengah menyelimuti persyarikatan Muhammadiyah. Dengan harapan para pimpinan Muhammadiyah dapat menyelaraskan pikiran dan gerakan dalam hal ideologi, politik dan organisasi.

                Ideopolitor menghadirkan tiga narasumber dari PWM Jateng, MPKSDI PP Muhammadiyah, juga Universitas Muhammadiyah Yogyakarta. Berbagai lapisan pimpinan Muhammadiyah dan Aisyiyah Sleman turut hadir dengan sangat antusias.

                Ketua Majelis Tabligh PWM Jateng Ali Trigiyatno menyampaikan, isu melemahnya ideologi warga Muhammadiyah yang terjadi saat ini merupakan persoalan yang harus diperhatikan oleh Persyarikatan. Menurutnya, adanya kempirian dan kesamaan ajaran antara Muhammadiyah dengan organisasi islam yang lain, telah menjadi celah dalam melemahnya ideologi Muhammadiyah.

                “Seringkali warga Muhammadiyah lompat pagar” ujarnya membawakan materi Ideologi Muhammadiyah.

                Ali menjelaskan bahwa ada banyak hal yang membedakan Muhammadiyah dengan organisasi islam lain. Ciri utama Muhammadiyah adalah organisasi yang kompak tanpa adanya selisih pemahaman antar anggota, karena semua ajaran merujuk pada Al-Qur’an dan Sunnah yang telah dirangkum dalam Tarjih Muhammadiyah.

                Lebih lanjut, Ia mengungkap Muhammadiyah merupakan organisasi yang di rahmati Allah Swt. Karena se-abad lebih Muhammadiyah telah berdiri tanpa adanya perpecahan, salah satu ciri kelompok yang di rahmati Allah yakni terhindar dari perpecahan.

                “Alhamdulillah selama 112 tahun belum pernah ada Muktamar tandingan,” tegasnya.

                Senada, Ketua MPKSDI PP Muhammadiyah Bachtiar Dwi Kurniawan menyatakan, Muhammadiyah lahir dengan gerakan tajdid yang mengamalkan dakwah Amar Ma’ruf Nahi Munkar. Ini merupakan ciri utama yang membedakan Muhammadiyah dengan organisasi Islam lain.

                “Organisasi Islam semua mengajarkan ajaran yang sama, tetapi Muhammadiyah hadir dengan Gerakan Tajdid Islam Berkemajuan,” ujarnya.

                Ia menambahkan pentingnya komitmen dalam bermuhammadiyah, dalam hal ini dibagi menjadi lima tingkatan yakni, komitmen pimpinan, komitmen aktivis, komitmen kader, komitmen pegawai dan komitmen warga-jama’ah.

                Sementara itu, pemateri ketiga Ridho Al-Hamdi membawakan materi diaspora kader Muhammadiyah. Ia menyatakan politik dalam Muhammadiyah merupakan hal yang menarik tetapi dapat menimbulkan sentimen antar kelompok.

                “Orang Muhammadiyah itu selalu sami’na wa atho’na kecuali dalam hal politik,” ungkapnya.

                Ridho menyatakan meskipun Muhammadiyah tidak berpolitik praktis, tetapi penting untuk menempatkan kader Muhammadiyah di kursi politik.

                Ketua PCM Depok Muhammad Ichsan menyampaikan, Ideopolitor merupakan suatu tanggung jawab PCM Depok sebagai responsi atas isu ideologi Muhammadiyah. Ia berharap dengan acara ini dapat menjaga dan menguatkan kembali ideologi warga Muhammadiyah.

                “Jangan sampai kita lupa bahwasanya kita punya Ideologi Muhammadiyah sendiri,” tegasnya. (Pand)',
                'lokasi' => 'Aula KH Ahmad Dahlan, SD Muhammadiyah Condongcatur',
                'tanggal' => '2025-01-19',
                'created_by' => $user->id,
                'updated_by' => $user->id,
            ]);
            $kegiatan3->addMedia(public_path('images/kegiatan3.jpg'))->preservingOriginal()->toMediaCollection(Kegiatan::MEDIA_COLLECTION);
        }
        
}
