@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="single_element">
            <div class="quick_activity">
                <div class="row">
                    <div class="col-12">
                        <div class="quick_activity_wrap">

                            <div class="single_quick_activity">
                                <div class="count_content">
                                    <p><a href="{{ route('pays.index') }}"> Pays</a></p>
                                    <h3><span class="counter">35000</span> </h3>
                                </div>
                                <a href="{{ route('pays.index') }}" class="notification_btn">Pays</a>
                                <div id="bar1" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="95"></span>
                                </div>
                            </div>

                            <div class="single_quick_activity">
                                <div class="count_content">
                                    <p><a href="{{ route('ville.index') }}"> Ville</a></p>
                                    <h3><span class="counter">35000</span> </h3>
                                </div>
                                <a href="" class="notification_btn yellow_btn">Villes</a>
                                <div id="bar2" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="65"></span>
                                </div>
                            </div>

                            <div class="single_quick_activity">
                                <div class="count_content">
                                    <p>Société</p>
                                    <h3><span class="counter">50000</span> </h3>
                                </div>
                                <a href="" class="notification_btn green_btn">société</a>
                                <div id="bar3" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="75"></span>
                                </div>
                            </div>

                            <div class="single_quick_activity">
                                <div class="count_content">
                                    <p>Fournisseurs</p>
                                    <h3><span class="counter">50</span> %</h3>
                                </div>
                                <a href="#" class="notification_btn violate_btn">Fournisseur</a>
                                <div id="bar4" class="barfiller">
                                    <div class="tipWrap">
                                        <span class="tip"></span>
                                    </div>
                                    <span class="fill" data-percentage="85"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection