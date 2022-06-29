<div class="main">
    <div class="header">
        <h2 id="username">
            Halo, <strong><?= $_COOKIE['username'];  ?></strong>
        </h2>

    </div>
    <div class="upper">
        <div class="container_select">
            <div class="select">
                <h3>Pembibitan</h3>
                <img src="<?= URLBASE;?>/img/segitiga.png" alt="">
            </div>

            <button id="select_button"></button>
            <ul class="selection">
                <li>
                    <a href="<?= URLBASE;?>/dashboard/index">
                        <h3>Aquaponik</h3>
                    </a>
                </li>
                <li>
                    <a href="<?= URLBASE;?>/dashboard/hidroponik">
                        <h3>Hidroponik Indoor</h3>
                    </a>
                </li>
                <li>
                    <a href="<?= URLBASE;?>/dashboard/pembibitan">
                        <h3>Pembibitan Indoor</h3>
                    </a>
                </li>

            </ul>

        </div>
    </div>
    <div class="container_main">
        <div class="subhead">
            <h2 class="subhead_text">Monitoring</h2>
            <img src="<?= URLBASE;?>/img/monitor.svg" alt="">
        </div>
        <button id="modalSeedButton" class="button-main">Tambah Data Baru</button>
        <ul>
            <li class="card">
                <div class="text">
                    <h3>Suhu Udara</h3>
                    <h1 id="suhu_udara">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/temperature.svg" alt="">
            </li>
            <li class="card">
                <div class="text">
                    <h3>Kelembaan Udara</h3>
                    <h1 id="kelembapan_udara">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/humidity.svg" alt="">
            </li>
            <li class="card">
                <div class="text">
                    <h3>Level Air</h3>
                    <h1 id="ketinggian_air">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/water_level.svg" alt="">
            </li>

            <li class="card">
                <div class="text">
                    <h3>Intensitas Cahaya</h3>
                    <h1 id="intensitas_cahaya_label">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/intensity.svg" alt="">
            </li>
            <li class="card">
                <div class="text">
                    <h3>Jenis Tanaman</h3>
                    <h1 id="jenis_tanaman">Sawi</h1>
                </div>
                <img src="<?= URLBASE;?>/img/plant.svg" alt="">
            </li>
        </ul>

    </div>
    <div class="container_main">
        <div class="subhead">
            <h2 class="subhead_text">Kontrol Perangkat</h2>
            <img src="<?= URLBASE;?>/img/kontrol.svg" alt="">
        </div>
        <ul class="wrapper_card_control">
            <li class="card control">
                <div class="control">
                    <h3><strong>Relay LED Growlight</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox">
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section>
                        <h3>Intensitas</h3>
                        <input type="range" value="0" id="intensitas_cahaya" min="0" max="255">
                        <button id="setLight">Set</button>
                    </section>
                </div>
            </li>
            <li class="card control">
                <div class="control">
                    <h3><strong>Relay Kipas</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox">
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section>
                        <h3>Kecepatan</h3>
                        <input type="range" value="0" id="fan_speed" min="0" max="255">
                        <button id="setSpeed">Set</button>
                    </section>
                </div>
            </li>
            <li class="card control">
                <div class="control">
                    <h3><strong>Relay Mist Maker</strong></h3>
                    <section>
                        <h3>Status</h3>
                        <label class="switch">
                            <input type="checkbox">
                            <span class=" slider round"></span>
                        </label>
                    </section>
                    <section>
                        <h3>Counter</h3>
                        <input type="range" value="0" id="fan_speed" min="0" max="255">
                        <button id="setSpeed">Set</button>
                    </section>
                </div>
            </li>
        </ul>
    </div>


</div>

<div class="modal new-seed">
    <h1>Input Data Pembibitan Baru</h1>
    <form action="" method="post">
        <label for="jenis">Jenis Tumbuhan</label><br>
        <select name="jenis" require>
            <option value="Pakcoy">Pakcoy</option>
            <option value="Selada">Selada</option>
        </select><br>
        <label for="tanggal">Tanggal</label><br>
        <input type="date" name="tanggal" required><br>
        <button type="submit">Submit</button>

    </form>
    <div class="button-wrapper">
        <button id="cancelButton">Batal</button>
    </div>
</div>