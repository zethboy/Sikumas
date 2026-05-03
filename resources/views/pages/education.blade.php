@extends('layouts.app')

@section('title', 'Edukasi | SIKUMAS')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-green-700 mb-2">Edukasi Limbah Kelapa</h1>
        <p class="text-gray-600 mb-6">Pelajari cara mengelola, mengolah, dan memanfaatkan limbah kelapa agar bernilai tinggi.
        </p>

        <div class="bg-white rounded-xl shadow-sm border border-gray-100 overflow-hidden">
            <!-- Tabs -->
            <div class="flex border-b border-gray-200 overflow-x-auto">
                <button onclick="switchTab('pengelolaan')" id="tab-btn-pengelolaan"
                    class="tab-btn px-6 py-3 text-green-600 border-b-2 border-green-500 font-semibold whitespace-nowrap transition">
                    Pengelolaan
                </button>
                <button onclick="switchTab('pengolahan')" id="tab-btn-pengolahan"
                    class="tab-btn px-6 py-3 text-gray-500 border-b-2 border-transparent hover:text-green-600 font-semibold whitespace-nowrap transition">
                    Pengolahan
                </button>
                <button onclick="switchTab('video')" id="tab-btn-video"
                    class="tab-btn px-6 py-3 text-gray-500 border-b-2 border-transparent hover:text-green-600 font-semibold whitespace-nowrap transition">
                    Video Tutorial
                </button>
                <button onclick="switchTab('manfaat')" id="tab-btn-manfaat"
                    class="tab-btn px-6 py-3 text-gray-500 border-b-2 border-transparent hover:text-green-600 font-semibold whitespace-nowrap transition">
                    Manfaat
                </button>
                <button onclick="switchTab('tips')" id="tab-btn-tips"
                    class="tab-btn px-6 py-3 text-gray-500 border-b-2 border-transparent hover:text-green-600 font-semibold whitespace-nowrap transition">
                    Tips & Trik
                </button>
            </div>

            <!-- ===== TAB: PENGELOLAAN ===== -->
            <div id="tab-pengelolaan" class="tab-content p-6">
                <h2 class="text-xl font-bold mb-3">Pengelolaan Limbah Kelapa</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Pengelolaan dimulai dari pemilahan jenis limbah. <strong>Sabut kelapa</strong> (cocopeat, fiber),
                    <strong>batok kelapa</strong> (arang, activated carbon), dan <strong>daun kelapa</strong> (anyaman,
                    pupuk) memiliki nilai ekonomi berbeda. Dengan pemilahan tepat, setiap limbah bisa menjadi produk
                    bernilai tinggi.
                </p>

                <div class="bg-amber-50 border border-amber-200 rounded-lg p-4 mb-6">
                    <h4 class="font-bold text-amber-800 mb-2">⚠️ Hal yang Sering Diabaikan</h4>
                    <ul class="list-disc pl-5 text-amber-700 space-y-1 text-sm">
                        <li>Mencampur sabut basah dengan batok kering menyebabkan jamur.</li>
                        <li>Menyimpan limbah di tempat lembap merusak kualitas cocopeat.</li>
                        <li>Tidak memilah ukuran serat: serat panjang (fiber) harganya lebih tinggi dari bubuk (cocopeat).
                        </li>
                    </ul>
                </div>

                <h3 class="font-bold text-lg mb-3">Langkah Standar Pengelolaan:</h3>
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="flex gap-3">
                        <span
                            class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm shrink-0">1</span>
                        <div>
                            <h5 class="font-semibold text-gray-800">Pilah Jenis</h5>
                            <p class="text-sm text-gray-600">Pisahkan sabut, batok, dan daun. Buang yang sudah busuk parah.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span
                            class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm shrink-0">2</span>
                        <div>
                            <h5 class="font-semibold text-gray-800">Bersihkan</h5>
                            <p class="text-sm text-gray-600">Buang tanah, pasir, dan kotoran yang menempel pada limbah.</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span
                            class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm shrink-0">3</span>
                        <div>
                            <h5 class="font-semibold text-gray-800">Keringkan</h5>
                            <p class="text-sm text-gray-600">Jemur di bawah sinar matahari 2-5 hari hingga kadar air turun
                                drastis.</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span
                            class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm shrink-0">4</span>
                        <div>
                            <h5 class="font-semibold text-gray-800">Simpan Rapi</h5>
                            <p class="text-sm text-gray-600">Masukkan ke karung/plastik kedap air. Taruh di atas palet kayu,
                                jangan langsung di lantai.</p>
                        </div>
                    </div>
                    <div class="flex gap-3">
                        <span
                            class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center font-bold text-sm shrink-0">5</span>
                        <div>
                            <h5 class="font-semibold text-gray-800">Dokumentasi</h5>
                            <p class="text-sm text-gray-600">Catat tanggal pemilahan, berat, dan kondisi untuk manajemen
                                stok yang baik.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ===== TAB: PENGOLAHAN ===== -->
            <div id="tab-pengolahan" class="tab-content p-6 hidden">
                <h2 class="text-xl font-bold mb-3">Metode Pengolahan</h2>
                <p class="text-gray-600 mb-5">Limbah kelapa dapat diolah menjadi minimal 4 produk unggulan berikut.
                    Masing-masing memerlukan peralatan dan waktu berbeda.</p>

                <div class="space-y-5">
                    <!-- Cocopeat -->
                    <div class="border border-green-100 rounded-xl p-5 bg-green-50">
                        <div class="flex items-start gap-3">
                            <span class="text-2xl">🌱</span>
                            <div>
                                <h3 class="font-bold text-green-800">Cocopeat / Cocofiber</h3>
                                <p class="text-gray-600 text-sm mt-1">Media tanam alternatif yang sangat diminati oleh
                                    petani hidroponik dan bonsai.</p>
                                <div class="mt-3 grid md:grid-cols-2 gap-x-4 gap-y-1 text-sm">
                                    <p><strong>Bahan:</strong> Sabut kelapa tua</p>
                                    <p><strong>Alat:</strong> Mesin penghancur / ayakan</p>
                                    <p><strong>Durasi:</strong> 3-7 hari (perendaman & pencucian)</p>
                                    <p><strong>Harga pasaran:</strong> Rp 5.000 - 15.000 / kg</p>
                                </div>
                                <ol class="list-decimal pl-4 mt-2 text-sm text-gray-700 space-y-1">
                                    <li>Rendam sabut kelapa di air bersih 3-7 hari untuk menghilangkan tannin.</li>
                                    <li>Hancurkan dengan mesin atau palu manual.</li>
                                    <li>Ayam dengan mesh 3-5 mm untuk cocopeat; sisihkan serat panjang untuk cocofiber.</li>
                                    <li>Cuci bersih, peras, lalu jemur hingga kadar air &lt; 15%.</li>
                                    <li>Kemas dalam karung plastik 5 kg atau sesuai pesanan.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Arang Aktif -->
                    <div class="border border-gray-200 rounded-xl p-5 bg-white">
                        <div class="flex items-start gap-3">
                            <span class="text-2xl">🔥</span>
                            <div>
                                <h3 class="font-bold text-gray-800">Arang Aktif (Activated Carbon)</h3>
                                <p class="text-gray-600 text-sm mt-1">Digunakan sebagai filter air, penjernih, dan bahan
                                    kosmetik.</p>
                                <div class="mt-3 grid md:grid-cols-2 gap-x-4 gap-y-1 text-sm">
                                    <p><strong>Bahan:</strong> Batok kelapa kering</p>
                                    <p><strong>Alat:</strong> Tungku/drum pembakaran tertutup</p>
                                    <p><strong>Durasi:</strong> 1-2 hari aktif, 7 hari pendinginan</p>
                                    <p><strong>Harga pasaran:</strong> Rp 10.000 - 25.000 / kg</p>
                                </div>
                                <ol class="list-decimal pl-4 mt-2 text-sm text-gray-700 space-y-1">
                                    <li>Bakar batok kelapa dalam drum tertutup dengan suhu 300-500°C (karbonisasi).</li>
                                    <li>Dinginkan selama 6-12 jam tanpa membuka tungku.</li>
                                    <li>Aktivasi: rendam dalam larutan KOH atau H₃PO₄ (opsional untuk grade premium).</li>
                                    <li>Cuci netral, keringkan, lalu gerus sesuai ukuran yang diminta.</li>
                                    <li>Kemas kedap udara agar tidak menyerap bau dan kelembaban.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Eco Enzyme -->
                    <div class="border border-green-100 rounded-xl p-5 bg-green-50">
                        <div class="flex items-start gap-3">
                            <span class="text-2xl">🧴</span>
                            <div>
                                <h3 class="font-bold text-green-800">Eco Enzyme / Eco Enzim</h3>
                                <p class="text-gray-600 text-sm mt-1">Cairan fermentasi multifungsi untuk pembersih organik,
                                    pupuk cair, dan deodoran.</p>
                                <div class="mt-3 grid md:grid-cols-2 gap-x-4 gap-y-1 text-sm">
                                    <p><strong>Bahan:</strong> Sabut kelapa + air + gula merah</p>
                                    <p><strong>Perbandingan:</strong> 1 : 3 : 10 (gula : sabut : air)</p>
                                    <p><strong>Durasi:</strong> 3 bulan fermentasi</p>
                                    <p><strong>Harga pasaran:</strong> Rp 25.000 - 50.000 / liter</p>
                                </div>
                                <ol class="list-decimal pl-4 mt-2 text-sm text-gray-700 space-y-1">
                                    <li>Potong sabut kelapa kecil-kecil (± 2 cm).</li>
                                    <li>Masukkan ke dalam jeriken plastik: 1 bagian gula merah, 3 bagian sabut, 10 bagian
                                        air.</li>
                                    <li>Kocok ringan, tutup rapat namun tidak terlalu kencang (gas harus keluar).</li>
                                    <li>Simpan di tempat teduh, buka kocak setiap hari selama bulan pertama.</li>
                                    <li>Setelah 3 bulan, saring ampas dan simpan cairan dalam botol gelap.</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <!-- Kerajinan -->
                    <div class="border border-gray-200 rounded-xl p-5 bg-white">
                        <div class="flex items-start gap-3">
                            <span class="text-2xl">🎨</span>
                            <div>
                                <h3 class="font-bold text-gray-800">Kerajinan & Ornamen</h3>
                                <p class="text-gray-600 text-sm mt-1">Keset, pot tanam, lampu hias, dan dekorasi rumah dari
                                    sabut & batok kelapa.</p>
                                <div class="mt-3 grid md:grid-cols-2 gap-x-4 gap-y-1 text-sm">
                                    <p><strong>Bahan:</strong> Sabut & batok kelapa kering</p>
                                    <p><strong>Alat:</strong> Pisau ukir, lem tembak, cat kayu</p>
                                    <p><strong>Durasi:</strong> 1-3 hari / pcs</p>
                                    <p><strong>Harga pasaran:</strong> Rp 15.000 - 150.000 / pcs</p>
                                </div>
                                <ol class="list-decimal pl-4 mt-2 text-sm text-gray-700 space-y-1">
                                    <li>Cuci bersih batok atau sabut, keringkan hingga benar-benar keras.</li>
                                    <li>Gambar pola di permukaan, lalu ukir dengan pisau tajam.</li>
                                    <li>Amplas halus supaya tidak berserat saat disentuh.</li>
                                    <li>Cat dengan cat kayu tahan air (opsional) atau biarkan warna alami.</li>
                                    <li>Lapisi vernis untuk produk berkualitas ekspor.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ===== TAB: VIDEO TUTORIAL ===== -->
            <div id="tab-video" class="tab-content p-6 hidden">
                <h2 class="text-xl font-bold mb-2">Video Tutorial</h2>
                <p class="text-gray-600 mb-5">Kumpulan tutorial dari komunitas SIKUMAS dan mitra edukasi.</p>

                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Card 1 -->
                    <a href="https://www.youtube.com/results?search_query=cara+membuat+cocopeat" target="_blank"
                        class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition group">
                        <div class="aspect-video bg-green-700 flex items-center justify-center relative">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <span
                                class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">12:45</span>
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-gray-800 group-hover:text-green-600">Cara Membuat Cocopeat Berkualitas
                            </h4>
                            <p class="text-sm text-gray-500 mt-1">Pemula · Sabut Kelapa</p>
                        </div>
                    </a>

                    <!-- Card 2 -->
                    <a href="https://www.youtube.com/results?search_query=arang+aktif+batok+kelapa" target="_blank"
                        class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition group">
                        <div class="aspect-video bg-amber-700 flex items-center justify-center relative">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <span
                                class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">18:30</span>
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-gray-800 group-hover:text-green-600">Pembuatan Arang Aktif dari Batok
                                Kelapa</h4>
                            <p class="text-sm text-gray-500 mt-1">Menengah · Batok Kelapa</p>
                        </div>
                    </a>

                    <!-- Card 3 -->
                    <a href="https://www.youtube.com/results?search_query=eco+enzyme+kelapa" target="_blank"
                        class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition group">
                        <div class="aspect-video bg-teal-700 flex items-center justify-center relative">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <span
                                class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">09:15</span>
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-gray-800 group-hover:text-green-600">Eco Enzyme dari Limbah Kelapa
                            </h4>
                            <p class="text-sm text-gray-500 mt-1">Pemula · Fermentasi</p>
                        </div>
                    </a>

                    <!-- Card 4 -->
                    <a href="https://www.youtube.com/results?search_query=kerajinan+batok+kelapa" target="_blank"
                        class="block bg-white border border-gray-200 rounded-xl overflow-hidden hover:shadow-md transition group">
                        <div class="aspect-video bg-purple-700 flex items-center justify-center relative">
                            <div
                                class="w-16 h-16 bg-white/20 backdrop-blur rounded-full flex items-center justify-center group-hover:scale-110 transition">
                                <svg class="w-8 h-8 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M8 5v14l11-7z" />
                                </svg>
                            </div>
                            <span
                                class="absolute bottom-2 right-2 bg-black/70 text-white text-xs px-2 py-1 rounded">15:20</span>
                        </div>
                        <div class="p-4">
                            <h4 class="font-bold text-gray-800 group-hover:text-green-600">Kerajinan Pot Tanam dari Sabut
                                Kelapa</h4>
                            <p class="text-sm text-gray-500 mt-1">Menengah · Kerajinan</p>
                        </div>
                    </a>
                </div>

                <div class="mt-6 bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <h4 class="font-bold text-blue-800 mb-1">📹 Punya Video Tutorial Sendiri?</h4>
                    <p class="text-sm text-blue-700">Upload ke YouTube channel komunitas, lalu ganti link di atas dengan
                        link video asli Anda.</p>
                </div>
            </div>

            <!-- ===== TAB: MANFAAT ===== -->
            <div id="tab-manfaat" class="tab-content p-6 hidden">
                <h2 class="text-xl font-bold mb-5">Manfaat Mengolah Limbah Kelapa</h2>

                <div class="grid md:grid-cols-3 gap-5">
                    <div class="bg-green-50 border border-green-100 rounded-xl p-5">
                        <div class="text-3xl mb-3">💰</div>
                        <h3 class="font-bold text-green-800 text-lg mb-2">Ekonomi</h3>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Penghasilan tambahan petani hingga <strong>Rp 2-5 juta/bulan</strong> dari limbah yang
                                dibuang.</li>
                            <li>• Nilai jual cocopeat <strong>5-10x lebih tinggi</strong> dari sabut mentah.</li>
                            <li>• Arang aktif grade ekspor bisa mencapai <strong>$5-8/kg</strong>.</li>
                            <li>• Eco-enzyme modal kecil, margin tinggi, pasar online luas.</li>
                        </ul>
                    </div>

                    <div class="bg-blue-50 border border-blue-100 rounded-xl p-5">
                        <div class="text-3xl mb-3">🌍</div>
                        <h3 class="font-bold text-blue-800 text-lg mb-2">Lingkungan</h3>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Mengurangi pencemaran tanah & air dari limbah yang membusuk.</li>
                            <li>• <strong>Menurunkan emisi metana</strong> dari pembusukan organik di TPA.</li>
                            <li>• Cocopeat menggantikan sphagnum peat yang merusak ekosistem gambut.</li>
                            <li>• Arang aktif menyerap polutan berbahaya di air dan udara.</li>
                        </ul>
                    </div>

                    <div class="bg-purple-50 border border-purple-100 rounded-xl p-5">
                        <div class="text-3xl mb-3">🤝</div>
                        <h3 class="font-bold text-purple-800 text-lg mb-2">Sosial</h3>
                        <ul class="text-sm text-gray-600 space-y-2">
                            <li>• Lapangan kerja untuk perempuan di sektor pengemasan & kerajinan.</li>
                            <li>• Memperkuat komunitas UMKM melalui koperasi kelapa.</li>
                            <li>• Pengetahuan turun-temurun meningkatkan kemandirian desa.</li>
                            <li>• Program CSR perusahaan kelapa dapat bermitra langsung.</li>
                        </ul>
                    </div>
                </div>

                <div class="mt-6 bg-white border border-gray-200 rounded-xl p-5">
                    <h3 class="font-bold text-gray-800 mb-3">Contoh Kasus Nyata</h3>
                    <div class="space-y-3 text-sm text-gray-600">
                        <p>📍 <strong>Desa Sumber Agung, Jambi:</strong> Kelompok wanita tani mengolah 500 kg sabut
                            kelapa/bulan menjadi cocopeat, omzet Rp 7,5 juta untuk 10 anggota.</p>
                        <p>📍 <strong>Bantul, Yogyakarta:</strong> UMKM arang aktif beromzet Rp 50 juta/bulan dengan pasar
                            ke pabrik kosmetik lokal dan filter air.</p>
                        <p>📍 <strong>Bali:</strong> 200+ penjual kelapa di pasar tradisional bergabung komunitas pengolahan
                            limbah sejak 2022, mengurangi volume sampah pasar 30%.</p>
                    </div>
                </div>
            </div>

            <!-- ===== TAB: TIPS & TRIK ===== -->
            <div id="tab-tips" class="tab-content p-6 hidden">
                <h2 class="text-xl font-bold mb-5">Tips & Trik Praktis</h2>

                <div class="grid md:grid-cols-2 gap-4">
                    <div class="flex gap-4 bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="text-2xl shrink-0">💡</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Kontrol Kelembaban Stok</h4>
                            <p class="text-sm text-gray-600 mt-1">Sabut yang disimpan harus memiliki kadar air &lt;20%.
                                Letakkan karung di atas palet kayu, jangan langsung di lantai tembok.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="text-2xl shrink-0">📏</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Pisahkan Serat Panjang & Bubuk</h4>
                            <p class="text-sm text-gray-600 mt-1">Jangan jual campur! Cocofiber (serat panjang) harga 2-3x
                                lebih tinggi dari cocopeat (bubuk). Gunakan ayakan mesh berbeda.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="text-2xl shrink-0">📦</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Kemasan Kedap Air</h4>
                            <p class="text-sm text-gray-600 mt-1">Produk jadi harus dikemas dalam karung plastik laminasi
                                double layer. Tambahkan label merek SIKUMAS agar profesional.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="text-2xl shrink-0">📸</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Dokumentasikan Semua Proses</h4>
                            <p class="text-sm text-gray-600 mt-1">Foto atau video setiap tahap. Konten ini bisa dijual
                                sebagai kursus online atau digunakan untuk promosi produk di media sosial.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="text-2xl shrink-0">🤝</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Jalin Kemitraan</h4>
                            <p class="text-sm text-gray-600 mt-1">Bekerja sama dengan petani kelapa tetangga untuk
                                memastikan pasokan limbah tetap stabil sepanjang tahun, tidak hanya musim panen.</p>
                        </div>
                    </div>

                    <div class="flex gap-4 bg-white border border-gray-200 p-4 rounded-lg">
                        <div class="text-2xl shrink-0">✅</div>
                        <div>
                            <h4 class="font-bold text-gray-800">Sertifikasi Produk</h4>
                            <p class="text-sm text-gray-600 mt-1">Usahakan mendapatkan sertifikasi organik atau ramah
                                lingkungan (seperti SNI, ISO 14001, atau organic certified) untuk meningkatkan nilai jual di
                                pasar ekspor.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName) {
            // Sembunyikan semua konten
            document.querySelectorAll('.tab-content').forEach(function(el) {
                el.classList.add('hidden');
            });

            // Tampilkan yang dipilih
            document.getElementById('tab-' + tabName).classList.remove('hidden');

            // Reset semua tombol
            document.querySelectorAll('.tab-btn').forEach(function(btn) {
                btn.classList.remove('text-green-600', 'border-green-500');
                btn.classList.add('text-gray-500', 'border-transparent');
            });

            // Aktifkan tombol yang dipilih
            var activeBtn = document.getElementById('tab-btn-' + tabName);
            activeBtn.classList.remove('text-gray-500', 'border-transparent');
            activeBtn.classList.add('text-green-600', 'border-green-500');
        }
    </script>
@endsection
