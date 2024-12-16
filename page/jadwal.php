<?php
$pageTitle = 'Jadwal - iReport';
$additionalCSS = ['jadwal.css'];
?>

<main>
    <section class="hero">
        <div class="hero-overlay"></div>
        <h1>SCHEDULE</h1>
    </section>
    <div>
        <button id="busButton" onclick="showBusSchedule()">Bus Schedule</button>
        <button id="trainButton" onclick="showTrainSchedule()">Train Schedule</button>
    </div>

    <div id="busSchedule" class="schedule-table" style="display: none;">
        <h2>Bus Schedule</h2>
        <table>
            <tr>
                <th>Bus ID</th>
                <th>Route</th>
                <th>Estimated Arrival Time</th>
            <tr>
                <!-- bus schedule rows-->
        </table>
    </div>

    <div id="trainSchedule" class="schedule-table" style="display: none;">
        <h2>Train Schedule</h2>
        <table>
            <tr>
                <th>Train Name</th>
                <th>Route (Start - End)</th>
                <th>Current Location</th>
                <th>Next Station</th>
            </tr>
            <!-- train schedule rows-->
        </table>
    </div>

</main>

<script src="js/jadwal.js"></script>