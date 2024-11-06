@extends('user.template.navbar')

@section('container')
            <div class="contentUtama">
          <article class="content utama" id="beranda" >

            <div class="sambutan" >
                <h1 class="greeting"> Sembako Harianmu Ada di sini, Belanja Nyaman Tanpa Khawatir! </h1>
                <p class="sub">Warung Sembako Mamah Eca <span class="help">Siap Membantumu</span>  </p>
                <button>Selengkapnya</button>


            </div>

            <aside>
                <div class="content-image">
                    <image src="{{asset('images/img/model2.jpg')}}" >
                </div>
            </aside>

        </article>

    <div class="penawaran utama" id="layanan">
        <button >Fitur Terbaik </button>
    </div>


        <article class="layanan" >
            <div class="lPembukaan">
                <h1 class="judul-layanan">Layanan Kami</h1>
                <p class="sub-layanan">Menyediakan layanan kasbon sembako untuk memenuhi kebutuhan sehari-hari Anda tanpa ribet. Nikmati kemudahan dan kenyamanan dalam mendapatkan akses kepada produk sembako dengan proses yang cepat dan mudah.</p>
                <button >
                @auth
                <a href="/produk">Dapatkan Sekarang</a>
                @else
                    <a href="/login">Dapatkan Sekarang</a>
                @endauth

                </button>
            </div>
            <aside >
                <div class="layanan-image">
                    <img src="{{asset('images/img/model1.jpg')}}">
                </div>
            </aside>
         </article>

            <article class="fitur">

                <div class="fitur-content">


                        <div class="ikon-fitur">
                            <i class="fas fa-money-bill-wave-alt"></i>
                        </div>

                    <h1 class="fJudul">Proses Cepat</h1>
                    <p  class="fSub">Dapatkan kasbon sembako dalam hitungan menit. Tanpa ribet, tanpa menunggu. Cepat, andal, dan transparan. </p>
                </div>

                <div class="fitur-content">
                    <div class="ikon-fitur">
                    <i class="fas fa-file-invoice-dollar"></i>
                    </div>

                    <h1 class="fJudul">Riwayat Transaksi</h1>
                    <p  class="fSub"> Tidak perlu lagi bingung tentang pembayaran apa yang telah dilakukan atau yang masih harus dilakukan</p>
                </div>

                <div class="fitur-content">
                    <div class="ikon-fitur">
                          <i class="fas fa-bell"></i>
                    </div>

                    <h1 class="fJudul" >Pengingat</h1>
                    <p  class="fSub">Dengan fitur Pengingat kami, Anda tidak akan pernah lagi melewatkan tanggal jatuh tempo pembayaran.</p>
                </div>

              <div class="fitur-content">
                <div class="ikon-fitur">
                <i class="fas fa-users"></i>
                </div>
                <h1 class="fJudul">Akun Pengguna</h1>
                <p class="fSub">Kontrol Penuh di Ujung Jari Anda
                    Kami memberikan fleksibilitas kepada Anda untuk mengelola akun Anda sesuai kebutuhan Anda.
                </p>
              </div>
            </article>

            <hr class="to-footer">

        <article class="pertanyaan " id="pertanyaan">

            <aside>
                <img src="{{asset('images/img/model3.jpg')}}">
            </aside>

            <div class="faq">

                <div class="judul-faq">
                    <h1 class="j_faq">Frequently Asked Questions</h1>
                    <p class="sub_faq">Pertanyaan yang <span>sering ditanyakan</span></p>
                </div>

                    <ul class="accordion">
                    <li>
                        <input type="checkbox" name="accordion" id="first">
                        <label for="first">Apakah ada persyaratan khusus untuk menggunakan layanan kasbon?</label>
                        <div class="content-faq">
                            Ya, biasanya ada persyaratan seperti memiliki akun terverifikasi dan batasan jumlah maksimum kasbon yang dapat Anda miliki pada suatu waktu.
                        </div>
                        <hr class="divider-accordion">
                    </li>

                    <li>
                        <input type="checkbox" name="accordion" id="second">
                        <label for="second">Apa yang terjadi jika saya tidak membayar kasbon tepat waktu?</label>
                        <div class="content-faq">
                            Jika Anda melewati batas waktu pembayaran, Anda mungkin dikenai biaya keterlambatan atau layanan tambahan lainnya. Lebih lanjut lagi, hal ini bisa memengaruhi kemampuan Anda untuk menggunakan layanan kasbon di masa depan
                        </div>
                        <hr class="divider-accordion">
                    </li>

                    <li>
                        <input type="checkbox" name="accordion" id="third">
                        <label for="third">Apakah layanan kasbon tersedia untuk semua produk sembako?</label>
                        <div class="content-faq">

        ya, layanan kasbon tersedia untuk sebagian besar produk sembako yang ditawarkan.
                        </div>
                    </li>

                </ul>
            </div>
        </article>


        <article>
            <div class="sapaan-testi">
                <h3 class="testimoni">Testimoni</h3>
                <h1 class="text-client">Apa Kata Dari Para Pelanggan Kami !</h1>
            </div>

            <div class="fitur">

                    <div class="fitur-content">
                        <div class="photo">
                            <img src="assets/testimoni1.png">

                            <div class="desc-client">
                                <h1 class="nama" >Jennifer Susanto</h1>
                                <p class="pekerjaan">Ibu Rumah Tangga</p>
                            </div>

                            <div class="ikon-quote">
                                <i class="fas fa-quote-left" id="quote"></i>
                            </div>
                        </div>
                            <p class="fSubTest">Tidak pernah terbayangkan sebelumnya bahwa mendapatkan bantuan keuangan bisa secepat ini. Situs kasbon sembako ini benar-benar menyelamatkan saya dari situasi darurat. Terima kasih atas kemudahan dan efisiensinya!</p>
                    </div>
                    <div class="fitur-content">
                        <div class="photo">
                            <img src="assets/testimoni3.png">

                            <div class="desc-client">
                                <h1 class="nama" >Olivia Taylor</h1>
                                <p class="pekerjaan">Ibu Rumah Tangga</p>
                            </div>

                            <div class="ikon-quote">
                                <i class="fas fa-quote-left" id="quote"></i>
                            </div>
                        </div>
                            <p class="fSubTest">Puas dengan proses kasbon online: cepat, transparan, dukungan pelanggan responsif, meningkatkan kepercayaan finansial saya</p>
                    </div>
                    <div class="fitur-content">
                        <div class="photo">
                            <img src="assets/testimoni4.png">

                            <div class="desc-client">
                                <h1 class="nama" >Stephanie Hartono</h1>
                                <p class="pekerjaan">Ibu Rumah Tangga</p>
                            </div>

                            <div class="ikon-quote">
                                <i class="fas fa-quote-left" id="quote"></i>
                            </div>
                        </div>
                            <p class="fSubTest">Saya terkesan dengan kemudahan dan kecepatan proses pengajuan kasbon sembako di situs ini. Dalam hitungan menit, saya berhasil mendapatkan dana yang saya butuhkan untuk memenuhi kebutuhan sehari-hari saya
                            </p>
                    </div>
                    <div class="fitur-content">
                        <div class="photo">
                            <img src="{{asset('images/img/team-1.jpg')}}">

                            <div class="desc-client">
                                <h1 class="nama" >Ariana Aurelia</h1>
                                <p class="pekerjaan">Ibu Rumah Tangga</p>
                            </div>

                            <div class="ikon-quote">
                                <i class="fas fa-quote-left" id="quote"></i>
                            </div>
                        </div>
                            <p class="fSubTest">Sebagai ibu rumah tangga, fluktuasi harga dan cuaca sering menjadi tantangan. Kasbon sembako memberi kepastian dalam membeli kebutuhan pokok, membuat kami lebih tenang mengurus keluarga.</p>
                    </div>


            </div>
        </article>

        <hr class="to-footer">

        <article class="alamat utama" id="alamat">
            <div class="content-alamat">
                <h2 class="judul-alamat">Hai Kasboners!</h2>

                <h1 class="text-alamat">Jika Ada Saran Atau Keluhan<br> Silahkan Hubungi Kami</h1>

                <p class="warung-alamat">Komplek Gading Tutuka 2 Blok P1 No 29, RT. 01, RW 12 Desa Ciluncat  <br> Kec. Cangkuang Kab Bandung, Jawa Barat </p>

                  <div class="ikon-chat">

                <ul>
                    <li class="line">
                     <i class="fab fa-line"></i>
                        <p class="text-icon">Line</p>
                     </li>
                     <li class="WhatsApp">
                        <i class="fab fa-whatsapp-square"></i>
                        <p class="text-icon wa">WhatsApp</p>
                     </li>

                </ul>

            </div>
        </div>

        </article>


    </div>

    @endsection
