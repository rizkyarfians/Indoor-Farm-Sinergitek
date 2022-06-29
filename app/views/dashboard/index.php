<div class="main">
    <h2 id="username">
        Halo, <strong><?= $_COOKIE['username'];  ?></strong>
    </h2>
    <div class="upper">
        <div class="container_select">
            <div class="select">
                <h3>Aquaponik</h3>
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
                    <h3>Suhu Air</h3>
                    <h1 id="param_temp">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/temp_water.svg" alt="">
            </li>
            <li class="card">
                <div class="text">
                    <h3>pH Air</h3>
                    <h1 id="param_ph">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/water.svg" alt="">
            </li>
            <li class="card">
                <div class="text">
                    <h3>Ketinggian Air</h3>
                    <h1 id="param_waterlevel">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/water_level.svg" alt="">
            </li>

            <li class="card">
                <div class="text">
                    <h3>Pemberian Pakan</h3>
                    <h1 id="param_pakan">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/pakan.svg" alt="">
            </li>
            <li class="card">
                <div class="text">
                    <h3>Bobot Pakan</h3>
                    <h1 id="param_bobot">0</h1>
                </div>
                <img src="<?= URLBASE;?>/img/botol_pakan.svg" alt="">
            </li>
            <li class="card">
                <div class="text">
                    <h3>Rerata Bobot Ikan</h3>
                    <span class="label">
                        <h1 id="bobot_ikan">0</h1>
                        <h1 id="sampel_label"></h1>
                    </span>
                </div>
                <img src="<?= URLBASE;?>/img/pakan.svg" alt="">
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