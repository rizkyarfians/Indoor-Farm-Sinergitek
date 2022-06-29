<div class="main">
    <h2 id="username">
        Halo, <strong><?= $_COOKIE['username'];  ?></strong>
    </h2>
    <div class="upper">
        <div class="container_select">
            <div class="select">
                <h3>Hidroponik</h3>
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
                    <h1 id="intensitas_cahaya">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/intensity.svg" alt="">
            </li>
        </ul>
    </div>
    <div class="container_main">
        <div class="subhead">
            <h2 class="subhead_text">Kontrol Perangkat</h2>
            <img src="<?= URLBASE;?>/img/kontrol.svg" alt="">
        </div>
        <ul class="wrapper_card_control">
            <li>
                <div class="control">
                    <h3>Servo Pakan</h3>
                    <label id="servo_pakan">
                        <input type="checkbox">
                        <span class="blink"></span>
                    </label>
                </div>


        </ul>
    </div>


</div>