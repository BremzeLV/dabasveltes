@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ __('product.before_add') }}</h1>
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="alert alert-danger">
                    Lūdzu aizpildi visu profila informāciju par sevi.
                </div>
                <p>
                    Lai pievienotu produktu un kļūtu par audzētāju ir vajadzīgs norādīt pilnu profila informāciju, lai lietotāji, kas vēlas iegādāties Jūsu produktus, spētu sazināties ar jums.<br />
                    Jūsu telefona numurs netiks publiski norādīts, tomēr tas ir vajadzīgs, lai gadījuma pēc, varētu ar jums sazināties.
                </p>
                <h5>Kļūstot par audzētāju jūs apliecinat, ka piedāvātie produkti ir:</h5>
                <ul>
                    <li>Kvalitatīvi;</li>
                    <li>Lokāli (Latvijā) audzēti;</li>
                    <li>Jebkāda norādītā informācija par produktu ir patiesa;</li>
                </ul>
                <h5>
                    Apliecinu, ka norādītā informācija profilā ir:
                </h5>
                <ul>
                    <li>Patiesa</li>
                </ul>
                <p>
                    Lai rediģētu savu profilu <a href="{{ url('user/'.\Illuminate\Support\Facades\Auth::id().'/edit') }}">spied šeit</a>
                </p>
            </div>
        </div>
    </div>
@endsection
