@extends('web.static.layout')

@section('main')
    <h1>Votre capital nutrition animale</h1>
    <div>
        <p>
            Activités d’agrofourniture, conseil, préconisation, distribution des intrants (fertilisants, produits phytosanitaires, semences aliments pour animaux)
        </p>
        <p>
            Commerce des céréales oléagineux et protéagineux, collecte des productions, stockage, commercialisation sur le marché intérieur.
        </p>
    </div>
@endsection

@push('js')
    <script>
        Swal.fire({
            toast: true,
            position: 'bottom-end',
            title: 'Cookies Privacy Policy.',
            text: "{{ __('messages.cookies.message') }}",
            imageUrl: '{{ asset('img/cookie.png') }}',
            imageWidth: 100,
            imageHeight: 100,
            imageAlt: 'Cookie image',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Accept all !',
            showDenyButton: true,
            denyButtonText: 'I don\'t .',
            denyButtonColor: '#AAA'
        }).then((result) => {
            if (result.isConfirmed) {
                // Cookies::setCookie('cookies','true',30);
            }else{
                //
            }
        })
    </script>
@endpush
