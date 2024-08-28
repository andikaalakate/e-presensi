<x-layouts.admin>
    @seoTitle('Admin - Tentang')
    <x-slot:url>
        <Link href="{{ route('admin.dashboard') }}">Dashboard / </Link>
    </x-slot:url>
    <x-slot:title>
        {{ isset($title) ? $title : '' }}
    </x-slot:title>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mt-0">
        <h1 class="text-2xl font-semibold uppercase text-center my-2">Latar Belakang</h1>
        <div class="p-2">
            <p class="text-justify first-letter:ml-4">
                Dalam era digital yang semakin berkembang, sistem administrasi dan manajemen sekolah memerlukan
                modernisasi untuk meningkatkan efisiensi dan akurasi. Banyak sekolah masih menggunakan metode manual
                dalam pencatatan kehadiran tapi metode ini sering kali rentan terhadap kesalahan dan memakan waktu.
                Seringnya terjadi kesalahan terhadap manajemen dan absensi disekolah bisa membuat peserta didik dan guru
                kerepotan. Kita ambil contoh teman saya, Andika Pratama yang memiliki nama sama persis dengan teman
                sekelasnya yang juga Andika Pratama. Hal ini menimbulkan masalah saat mereka melakukan absensi saat
                ujian semester dan Pra-PKL. Bahkan sempat terjadi masalah karena NIS mereka yang tidak sengaja tertukar
                karena kesalahan kecil oleh manejemen sekolah tapi untungnya dapat diselesaikan dengan cepat, jika tidak
                ini akan menimbulkan masalah hingga ke jenjang perkuliaha mereka. Hal ini membuat kami sadar akan
                pentingnya modernisasi pada sistem manajemen sekolah dan itulah sebabnya kami dari XII RPL membuat
                aplikasi e-Presensi.
                Aplikasi e-Presensi dibuat untuk membantu menyimpan data peserta didik lebih aman dan membuat absensi sekolah
                menjadi lebih mudah, dengan adanya aplikasi e-Presensi, peserta didik dapat mengabsensi kehadiran dan menyimpan
                data mereka hanya lewat aplikasi.
            </p>
        </div>
        <div class="p-2">
            <p class="text-justify">Aplikasi e-Presensi adalah sebuah aplikasi absensi digital yang dikembangkan dengan target mempermudah pencatatan kehadiran peserta didik dan juga dapat melaporkan kehadiran peserta didik tersebut kepada wali dari peserta didik tersebut.</p>
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mt-0">
        <h1 class="text-2xl font-semibold uppercase text-center my-2">Apa saja manfaat dari e-Presensi ?</h1>
        <ul class="p-2 text-center">
            <li><span class="font-bold mr-2">1.</span>Memperkenalkan aplikasi presensi berbasis digital yang dirancang khusus untuk memenuhi kebutuhan SMK dalam memonitoring kehadiran peserta didik secara efektif dan efisien.</li>
            <li><span class="font-bold mr-2">2.</span>Memberikan solusi terhadap berbagai permasalahan yang muncul dari sistem presensi manual, seperti keterlambatan dalam pencatatan, human error, dan potensi kecurangan</li>
            <li><span class="font-bold mr-2">3.</span>Meningkatkan kedisiplinan peserta didik dengan adanya sistem presensi yang transparan dan dapat diakses oleh pihak terkait, termasuk orang tua.</li>
            <li><span class="font-bold mr-2">4.</span>Menyediakan data kehadiran secara real-time yang dapat digunakan sebagai bahan evaluasi oleh guru dan manajemen sekolah dalam meningkatkan kualitas pendidikan</li>
            <li><span class="font-bold mr-2">5.</span>Mempermudah proses pelaporan kehadiran peserta didik kepada orang tua, sehingga mereka dapat dengan mudah memonitor perkembangan kehadiran anak mereka di sekolah.
            </li>
        </ul>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mt-0">
        <h1 class="text-2xl font-semibold uppercase text-center my-2">Bagaimana cara menggunakan e-Presensi ?</h1>
        <div class="mb-4 text-center">
            <h2 class="text-xl font-medium ">Metode 1</h2>
            <ul class="p-2 ">
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
            </ul>
        </div>
        <div class="mb-4 text-center">
            <h2 class="text-xl font-medium ">Metode 2</h2>
            <ul class="p-2 ">
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
            </ul>
        </div>
        <div class="mb-4 text-center">
            <h2 class="text-xl font-medium ">Metode 3</h2>
            <ul class="p-2 ">
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
                <li>Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis, fugit!</li>
            </ul>
        </div>
    </div>
    <div class="bg-slate-200 p-2 md:p-4 rounded-md my-4 mb-0">
        <h1 class="text-2xl font-semibold uppercase text-center my-2">Pengembang</h1>
        <div class="flex-wrap flex justify-center gap-4">
            <Link confirm="Buka Link?" confirm-text="Kamu akan keluar dari aplikasi ini! Apa kamu yakin?" confirm-button="Ya, aku ingin melihat profilnya!"
                cancel-button="Tidak" v-on:click="window.open(this.href); return false;" away
                href="https://github.com/andikaalakate"
                
                class="bg-slate-300 p-2 rounded-md w-72 hover:shadow-2xl duration-300">
            <div class="h-64 bg-red-500 flex items-center justify-center">
                <img src="{{ asset('assets/tentang/pengembangAndika.webp') }}" class="size-full bg-blue-100"
                    alt="Andika Pratama">
            </div>
            <h2 class="text-xl font-medium text-center mt-2">Andika Pratama</h2>
            <p class="text-center">Backend Developer</p>
            </Link>
            <Link confirm="Buka Link?" confirm-text="Kamu akan keluar dari aplikasi ini! Apa kamu yakin?" confirm-button="Ya, aku ingin melihat profilnya!"
                cancel-button="Tidak" v-on:click="window.open(this.href); return false;" away
                href="https://github.com/MGilangChandra"
                class="bg-slate-300 p-2 rounded-md w-72 hover:shadow-2xl duration-300">
            <div class="h-64 bg-red-500 flex items-center justify-center">
                <img src="{{ asset('assets/tentang/pengembangGilang.webp') }}" class="size-full bg-blue-100"
                    alt="M. Gilang Chandrawinata">
            </div>
            <h2 class="text-xl font-medium text-center mt-2">M. Gilang Chandrawinata</h2>
            <p class="text-center">Frontend Developer</p>
            </Link>
        </div>
    </div>
</x-layouts.admin>
