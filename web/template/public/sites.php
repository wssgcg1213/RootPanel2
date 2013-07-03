<?php

defined("lpInLightPHP") or die(header("HTTP/1.1 403 Not Forbidden"));

/** @var lpLocale $rpL */
$rpL = f("lpLocale");

$rpL->load(["contact", "sites"]);

$base = new lpTemplate(rpROOT . "/template/base.php");

$base['title'] = l("sites.title");
?>

<? lpTemplate::beginBlock(); ?>
    <section>
        <header><?= $rpL["contact.service"];?></header>
        <ul class="nav-list">
            <li><?= l("contact.email");?> <?= c("AdminsEmail");?></li>
            <?= l("contact.list");?>
        </ul>
    </section>
<? $base['sidebar'] = lpTemplate::endBlock(); ?>

<? lpTemplate::beginBlock(); ?>
    <style type="text/css">
        .carousel-inner {
            height: 500px;
            width: 870px;
        }
        .thumbnail img {
            width: 300px;
            height: 200px;
        }
    </style>
<? $base['header'] = lpTemplate::endBlock(); ?>

<? lpTemplate::beginBlock(); ?>
    <script type="text/javascript">
        $('#myCarousel').carousel();
    </script>
<? $base['endOfBody'] = lpTemplate::endBlock(); ?>

<? lpTemplate::beginBlock(); ?>
    <section>
        <header><?= l("sites.title");?></header>
        <div id="carousel" class="carousel slide">
            <div class="carousel-inner">
                <? foreach(l("sites.big") as $site):?>
                    <div class="item active">
                        <img src="<?= $site["img"];?>" alt="<?= $site["domain"];?>">
                        <div class="carousel-caption">
                            <h4><a href="<?= $site["url"];?>"><?= $site["name"];?></a></h4>
                            <p><?= $site["description"];?></p>
                        </div>
                    </div>
                <? endforeach;?>
            </div>
            <a class="carousel-control left" href="#carousel" data-slide="prev">&lsaquo;</a>
            <a class="carousel-control right" href="#carousel" data-slide="next">&rsaquo;</a>
        </div>
        <div class="row-fluid">
            <ul class="thumbnails">
                <? foreach(l("sites.small") as $site):?>
                    <li class="span4">
                        <div class="thumbnail">
                            <img src="<?= $site["img"];?>" alt="<?= $site["domain"];?>">
                            <div class="caption">
                                <? if($site["url"]):?>
                                    <h3><a href="<?= $site["url"];?>"><?= $site["name"];?></a></h3>
                                <? else:?>
                                    <h3><?= $site["name"];?></h3>
                                <? endif;?>
                                <p><?= $site["description"];?></p>
                            </div>
                        </div>
                    </li>
                <? endforeach;?>
            </ul>
        </div>
    </section>
<? $base['content'] = lpTemplate::endBlock(); ?>

<? $base->output(); ?>