<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.bundle.js"
    integrity="sha512-zO8oeHCxetPn1Hd9PdDleg5Tw1bAaP0YmNvPY8CwcRyUk7d7/+nyElmFrB6f7vg4f7Fv4sui1mcep8RIEShczg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<div class="container">
    <div class="main">
        <h1>Datalog </h1>
        <div class="upper">
            <div class="container_select">
                <div class="select">
                    <h3>Data Ikan</h3>
                    <img src="<?= URLBASE;?>/img/segitiga.png" alt="">
                </div>

                <button id="select_button"></button>
                <ul class="selection">
                    <li>
                        <a href="<?= URLBASE;?>/datalog/ikan">
                            <h3>Data Ikan</h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLBASE;?>/datalog/suhu">
                            <h3>Suhu Air</h3>
                        </a>
                    </li>
                    <li>
                        <a href="<?= URLBASE;?>/datalog/phair">
                            <h3>pH Air</h3>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
        <div class="grafik-container" style="margin-top: 25px;">
            <canvas id="myChart"></canvas>
            <div class="detail-list">
                <h3>Jenis Ikan :
                    <h3 id="labelJenis"></h3>
                </h3>
                <h3>Input Terakhir : <br>
                    <strong>
                        <h3 id="labelDate"></h3>
                    </strong>
                </h3>
                <button id="tambah_button">Tambah Berat Ikan</button>
                <button id="hapus_button">Hapus</button>

            </div>

        </div>


    </div>
</div>

<div class="tambahModal">
    <h2>Jumlah Sampel</h2>
    <input type="text" placeholder="Masukkan Jenis Ikan" id="jenis_ikan">
    <input type="text" placeholder="Masukkan Jumlah Ikan" id="jumlah_ikan">
    <input type="number" placeholder="Masukkan Jumlah Sampel Ikan" id="jumlah_sample">
    <div class="button-wrapper">
        <button id="submit_sample">Tambah</button>
        <button id="cancelButton">Batal</button>
    </div>
</div>