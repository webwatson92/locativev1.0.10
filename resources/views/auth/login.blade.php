@extends('layouts.guest')

@section('content')
        <div class="" style="padding-top:;">
             <div class="row">
                  <div class="col-sm-4"></div>
                  <div class="col-sm-4">
                        <div class="login-wrap">
                            <div class="login-content">
                                <div class="login-logo">
                                    <h2>CONNECTEZ VOUS</h2>
                                </div>
                                <div class="login-form">
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" class="au-input au-input--full" type="email" name="email" placeholder="Saisissez votre email">
                                            <span class="text-danger">@error('email'){{$message}} @enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Mot de passe</label>
                                            <input id="password" class="au-input au-input--full" type="password" name="password" placeholder="Saisissez votre mot de passe">
                                            <span class="text-danger">@error('password'){{$message}} @enderror</span>
                                        </div>
                                        <button class="btn btn-lg btn-secondary btn-block" type="submit">Connection</button>
                                    </form>
                                    <div class="register-link">
                                        <p>
                                            Visitez le site web de la société
                                            <a href="#">Locative</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="col-sm-4"></div>
             </div>
        </div>
@stop
