<?php
    $this->assign('title','MicroSave');
?>
<html>
    <head>
        <?php
            echo $this->Html->charset();
            echo  $this->Html->css('MicroSave.reset.css');
            echo  $this->Html->css('MicroSave.style.css');
            echo $this->Html->tag('title','MicroSave');

        ?>
    </head>
    <body>
<!--Header-->
    <div class="wrapper clearfix">
        <?php
             echo $this->Html->tag('div',
                $this->Html->tag('span','<h1><a href="#">MicroSave <span class="slogan">Market-led solutions for financial services</span></a> </h1>',array('class'=>'slogan')),
                array('class'=>'logo flLeft'));
        ?>


        <div class="topMenu flLeft">
            <?php
                $menu = array (
                    $this->Html->link($this->Html->tag('span','',array('class'=>'menu-icon')).$this->Html->tag('span','Home',array('class'=>'menu-txt active')),'#',array('escape'=>false)),
                    $this->Html->link($this->Html->tag('span','',array('class'=>'menu-icon icon-about')).$this->Html->tag('span','About Us',array('class'=>'menu-txt ')),'#',array('escape'=>false)),
                    $this->Html->link($this->Html->tag('span','',array('class'=>'menu-icon icon-blog')).$this->Html->tag('span','Blog',array('class'=>'menu-txt ')),'#',array('escape'=>false)),
                    $this->Html->link($this->Html->tag('span','',array('class'=>'menu-icon icon-contact')).$this->Html->tag('span','Contact',array('class'=>'menu-txt ')),'#',array('escape'=>false))
                );
                echo $this->Html->nestedList($menu);
            ?>
        </div>
    </div>
    <div class="navWrap">
        <div class="wrapper clearfix">
            <nav class="moduleMenu">
                <?php
                    $menu = array (
                        $this->Html->link('Sectors we work in','#'),
                        $this->Html->link('Services','#'),
                        $this->Html->link('clients','#'),
                        $this->Html->link('Research','#')
                    );
                    echo $this->Html->nestedList($menu);
                ?>

             </nav>
            <div class="search">
                <?php
                    echo $this->Form->input('',array('type'=>'text','class'=>'searchBox'));
                    echo $this->Form->button($this->Html->tag('span','',array('class'=>'icon-search')),array('type'=>'button','class'=>'buttonGo'));

                ?>
            </div>
        </div>
    </div>

    <!--end Header-->
    <!-- start banner -->
    <div class="bannerWrap wrapper clearfix">
        <?php
            echo    $this->Html->tag('div',
                    $this->Html->image('MicroSave.banner.jpg'),
                    array('class'=>'banner'));
        ?>

        <div class="bannerTxt">
            <div class="weDo">
                <?php
                    echo  $this->Html->tag('h3','What We Do ?',array('class'=>'icon-heading'));
                    echo  $this->Html->para(null,'MicroSave is a diversified development consultancy that works to better the lives of low-income people.');
                    echo $this->Html->para(null,' MicroSave is a diversified development consultancy that works to better the lives of low-income people.');
                    echo $this->Html->para(null,'Established in 1998  as a joint UNCDF/DFID project in East and Southern Africa, today we have offices and staff  in 24 countries around the world with headquarters in Lucknow, India.');
                    echo $this->Html->tag('h3',$this->Html->link('Where we Operate','#'),array('class'=>'icon-heading icon-operate spacer20'));
                ?>
            </div>
            <div class="announcements">
                <?php
                    echo $this->Html->tag('h3','Annoucements',array('class'=>'icon-heading icon-announcements'));

                    $annoucement = array(
                        $this->Html->link('Lorem ipsum dolor sit amet, contur adipiscing elit mi eleifend... ','#'),
                        $this->Html->link('Lorem ipsum dolor sit amet, contur adipiscing elit mi eleifend... ','#'),
                        $this->Html->link('Lorem ipsum dolor sit amet, contur adipiscing elit mi eleifend... ','#'),
                        $this->Html->link('Lorem ipsum dolor sit amet, contur adipiscing elit mi eleifend... ','#'),
                        $this->Html->link('Lorem ipsum dolor sit amet, contur adipiscing elit mi eleifend... ','#'),
                    );
                    echo $this->Html->nestedList($annoucement);
                    echo $this->Html->link('View More','#',array('class'=>'viewMore'));
                ?>
             </div>
        </div>
    </div>
    <!-- end banner -->

    <!-- start sectors -->
    <div class="sectorsWrap clearfix">
        <div class="wrapper clearfix">

            <?php
                echo $this->Html->tag('h2','Sectors we work in');

                $sectors = array(
                    $this->Html->link(
                        $this->Html->div('sectorHeading','Microfinance and Banking').$this->Html->image('MicroSave.sector/microfinance-and-banking.jpg')
                        ,'#',array('escape'=>false)),

                        $this->Html->link(
                        $this->Html->div('sectorHeading','E/M-Banking for Financial Inclusion').$this->Html->image('MicroSave.sector/e-m-banking-for-financial-inclusion.jpg')
                        ,'#',array('escape'=>false)),

                        $this->Html->link(
                        $this->Html->div('sectorHeading','Private Sector Development').$this->Html->image('MicroSave.sector/private-sector-development.jpg')
                        ,'#',array('escape'=>false)),

                        $this->Html->link(
                        $this->Html->div('sectorHeading','Small &amp; Medium Enterprise Financing').$this->Html->image('MicroSave.sector/small-medium-enterprise-financing.jpg')
                        ,'#',array('escape'=>false)),
                        $this->Html->link(
                        $this->Html->div('sectorHeading','Responsible Finance').$this->Html->image('MicroSave.sector/responsible-finance.jpg')
                        ,'#',array('escape'=>false)),
                );
                 echo $this->Html->nestedList($sectors,null,array('class'=>'mfourth'));

                 echo $this->Html->div('sectorDivider',$this->Html->image('MicroSave.sectorDivider-icon.png'));
            ?>



            <!-- start Map -->
            <div class="mapWrap">
                <?php
                    echo $this->Html->div('heading','Making a difference, Across Borders &amp; Nations');
                    echo $this->Html->div('headingSub','We are a diverse development consultancy working in India, Kenya, the Philippines,
                        Papua New Guinea and Colombia');
                    echo $this->Html->image('MicroSave.map.jpg');
                ?>
            </div>
            <!-- end Map -->
        </div>
    </div>
    <!-- end sectors -->

    <!-- start footer -->
    <footer>
        <div class="wrapper clearfix">
            <div class="footerRow">
                <?php
                    $menu1eft = array(
                        $this->Html->link('Home','#',array('class'=>'active')),
                        $this->Html->link('Services','#'),
                        $this->Html->link('About','#'),
                        $this->Html->link('Blog','#'),
                        $this->Html->link('Contact','#',array('class'=>'last'))
                    );
                    echo $this->html->nestedList($menu1eft,array('class'=>'footerMainLinks'));

                    $menuright = array(
                       $this->Html->link('Terms of use','#',array('class'=>'first')),
                       $this->Html->link('Privacy','#'),
                       $this->Html->link('Code of business conduct &amp; ethics', '#'),
                       $this->Html->link('Site map','#')
                    );
                    echo $this->Html->nestedList($menuright,array('class'=>'footerLinks'));
                ?>
            </div>
            <div class="footerWrap">
                <div class="copyRight">MicroSave © 2013 </div>
                    <div class="socialLinks">
                        <?php
                            $socialicon = array(
                                $this->Html->link('Facebook','#',array('class'=>'facebook')),
                                $this->Html->link('Twitter','#',array('class'=>'twitter')),
                                $this->Html->link('linkedin','#', array('class'=>'linkedin'))
                            );
                            echo $this->Html->nestedList($socialicon);
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end footer -->
        <?php

        echo $this->Html->script('MicroSave.jquery.min.js');
        echo $this->Html->script('MicroSave.jquery.meanmenu.js');
        echo $this->Html->script('MicroSave.config.js');
        ?>

    </body>
</html>
