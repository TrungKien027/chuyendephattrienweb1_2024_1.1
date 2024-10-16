<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);
?>

<div class="type-3078">
    <div class="container text-center">
        <div class="row">
            <!-- Text and Button Section -->
            <div class="col-md-6 text-left">
                <h1>We are repair store</h1>
                <p1>We strive to help people by providing extraordinary service and expert repairs using only the highest quality parts available.</p1>
                <p>Of course we love fixing cracked iPhone screens and broken charge ports, but we get our satisfaction from helping out folks who lost their connection to the outside world.</p>
                <p>Explore new ways to see what’s working and fix what’s not.</p>
                <a href="#" class="btn btn-orange">Meet the Team</a>
            </div>
            <!-- Image Section -->
            <div class="col-md-6">
                <img src="broken-phone.png" alt="Broken Phone" class="img-fluid">
            </div>
        </div>

        <!-- Info Boxes -->
        <div class="row info-section">
            <div class="col-md-4">
                <div class="info-box">
                    <h3>What We Do</h3>
                    <p>We service all the newest and popular mobile phones, tablets and laptops natisnse a mauris.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <h3>Who we are</h3>
                    <p>We service all the newest and popular mobile phones, tablets and laptops natisnse a mauris.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="info-box">
                    <h3>How we do it</h3>
                    <p>We service all the newest and popular mobile phones, tablets and laptops natisnse a mauris.</p>
                </div>
            </div>
        </div>
    </div>
</div>
