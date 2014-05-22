@extends('layouts.public')

@section('content')
	<section class="band">
		<section class="container">
            <section class="col-md-6 visible-lg visible-md">
                {{ HTML::image('img/yoda.png', $alt="", $attributes = array('class'=>'yoda')) }}
            </section>
            <section class="col-md-6">
                <ul class="text-block">
                    <li><h1>Welcome on board !</h1></li>
                    <li>Je suis <strong>Benjamin</strong> de Vaublanc</li>
                    <li><strong>Développeur Web</strong> Front et Back</li>
                    <li><strong>PHP, Javascript</strong></li>
                </ul>

                <div class="col-md-12">
                    <a href="#" class="btn btn-success btn-lg pull-right" id="mainButton">
                        <div class="pull-left">
                            <h2>Portfolio</h2>
                            <p>Voir mes travaux</p>
                        </div>
                        <div class="arrow pull-right">
                            <div class="glyphicon glyphicon-play-circle"></div>
                        </div>
                    </a>
                </div>

            </section>
		</section>
	</section>

    <section class="container">
        <section class="intro">
            <section class="col-md-6">
                <h2>Qui je suis ?</h2>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </section>
            <section class="col-md-6">
                <a href="#">
                    {{ HTML::image('img/github.png', $alt="", $attributes = array('class'=>'yoda')) }}
                </a>
            </section>
        </section>
    </section>

    <section class="container">
        <section class="intro">
            <h2><span class="glyphicon glyphicon-star-empty"></span> Mes compétences</h2>
            <section class="col-md-3 slice">
                <h3>Back</h3>
                <ul>
                    <li class="icon laravel">
                        <a href="#">Laravel</a>
                    </li>
                    <li class="icon php">
                        <a href="#">PHP</a>
                    </li>
                    <li class="icon mysql">
                        <a href="#">MYSQL</a>
                    </li>
                    <li class="icon cake">
                        <a href="#">CakePHP</a>
                    </li>
                </ul>
            </section>
            <section class="col-md-3 slice">
                <h3>Front</h3>
                <ul>
                    <li class="icon html5">
                        <a href="#">HTML/CSS</a>
                    </li>
                    <li class="icon jquery">
                        <a href="#">jQuery</a>
                    </li>
                    <li class="icon js">
                        <a href="#">Javascript</a>
                    </li>
                    <li class="icon angular">
                        <a href="#">Angular</a>
                    </li>
                </ul>
            </section>
            <section class="col-md-3 slice">
                <h3>Autre</h3>
                <ul>
                    <li class="icon git">
                        <a href="#">Git</a>
                    </li>
                    <li class="icon svn">
                        <a href="#">SVN</a>
                    </li>
                    <li class="icon github">
                        <a href="#">Github</a>
                    </li>
                    <li class="icon psd">
                        <a href="#">Photoshop</a>
                    </li>
                </ul>
            </section>
        </section>
    </section>

@stop