<?php
$url_host = $_SERVER['HTTP_HOST'];

$pattern_document_root = addcslashes(realpath($_SERVER['DOCUMENT_ROOT']), '\\');
$pattern_uri = '/' . $pattern_document_root . '(.*)$/';

preg_match_all($pattern_uri, __DIR__, $matches);
$url_path = $url_host . $matches[1][0];
$url_path = str_replace('\\', '/', $url_path);
?>

<div class="type-3193">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                
                <p class="subtitle">BUILD WEBSITE</p>
                <h2>List Style Right</h2>
            </div>
        </div>

        <div class="row list-section">
            <!-- Icons List -->
            <div class="col-md-4">
                <h3>ICONS LIST</h3>
                <ul class="list-icons">
                    <li>Doctors and Medical Staff <i class="fa fa-user-md"></i></li>
                    <li>Patient and Visitor Guide <i class="fa fa-info-circle"></i></li>
                    <li>Patient Online Services <i class="fa fa-heart"></i></li>
                    <li>Patient Care and Health <i class="fa fa-wheelchair"></i></li>
                    <li>Review your Case Documents <i class="fa fa-file-text"></i></li>
                    <li>Best Case Strategy <i class="fa fa-folder"></i></li>
                </ul>
            </div>

            <!-- Square List -->
            <div class="col-md-4">
                <h3>SQUARE LIST</h3>
                <ul class="list-square">
                    <li>Doctors and Medical Staff</li>
                    <li>Patient and Visitor Guide</li>
                    <li>Patient Online Services</li>
                    <li>Patient Care and Health</li>
                    <li>Review your Case Documents</li>
                    <li>Best Case Strategy</li>
                </ul>
            </div>

            <!-- Circle List -->
            <div class="col-md-4">
                <h3>CIRCLE LIST</h3>
                <ul class="list-circle">
                    <li>Doctors and Medical Staff</li>
                    <li>Patient and Visitor Guide</li>
                    <li>Patient Online Services</li>
                    <li>Patient Care and Health</li>
                    <li>Review your Case Documents</li>
                    <li>Best Case Strategy</li>
                </ul>
            </div>
        </div>
    </div>
</div>
