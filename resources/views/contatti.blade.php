@extends('layouts.public')

@section('content')
<main class="py-4">
    <div class="container">

            <div class="row">

                <div class="col-xl-8 offset-xl-2 py-5">

                    <h1>{{__('messages.contact_us')}}</h1>

                    <form action="{{ route('contatti.store') }}" method="post">
                        @csrf
                        <div class="messages"></div>

                        <div class="controls">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_name">Nome *</label>
                                        <input id="form_name" type="text" name="name" class="form-control" placeholder="Per favore inserisci il tuo nome *" required="required" data-error="Nome è richiesto.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_email">Email *</label>
                                        <input id="form_email" type="email" name="email" class="form-control" placeholder="Per favore inserisci la tua email *" required="required" data-error="E' richiesta un email valida.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_subject">Oggetto *</label>
                                        <input id="form_email" type="text" name="subject" class="form-control" placeholder="Per favore inserisci l'oggetto della tua richiesta *" required="required" data-error="E' richiesto un oggetto.">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="form_message">Messaggio *</label>
                                        <textarea id="form_message" name="message" class="form-control" placeholder="Per favore inserisci il messaggio *" rows="4" required="required" data-error="Per favore, lasciaci un messaggio."></textarea>
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success btn-send" value="{{Invia Messaggio}}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <p class="text-muted">
                                        <strong>*</strong> Questi campi sono richiesti
                                    </p>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>



            </div>

        </div>
</main>
@endsection
