@extends('layouts.public')

@section('content')

    <div class="btn-menu">
        <div class="rectangle-white"></div>
        <div class="rectangle-white"></div>
        <div class="rectangle-white"></div>
    </div>

    <div class="menu menu-open"  style="display: none">

        <div>
            <div class="btn-close-menu" style="position: absolute;right: 5px;top:5px">
                <img style="width: 20px;height: 20px" src="{{ asset('img/cross-close.png') }}" alt="">
            </div>
            <ul>
                <li><a href="#work-content">Work</a></li>
                <li><a href="#library">Librairie</a></li>
                <li>
                    <a role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample" href="">Equipe</a>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            <ul>
                                <li><a href="#da">direction artistique</a></li>
                                <li><a href="#cp">compositeurs</a></li>
                                <li><a href="#studio">studios</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
  
@stop
