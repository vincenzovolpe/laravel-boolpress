@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1>{{__('messages.account_title')}}</h1>
                <div class="card">
                    <div class="card-header">{{__('messages.account_subtitle', ['name' => Auth::user()->name]) }}</div>

                    <div class="card-body">
                        <h2>Ecco i tuoi dettagli</h2>
                        <ul>
                            <li>Nome: {{ Auth::user()->userDetail->firstname }}</li>
                            <li>Cognome: {{ Auth::user()->userDetail->lastname }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
