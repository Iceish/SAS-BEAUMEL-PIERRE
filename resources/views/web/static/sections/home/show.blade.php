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
    <div id="myModal" class="modal">
        <div class="modal-content">
            <p>
                Les cookies sont importants pour le fonctionnement de notre site.
                Certains sont obligatoires.
            </p>
            <input id="btnTout" class="btn btn--primary" type="submit" value="Accepter">
        </div>
    </div>

    <script>
        function getCookie(nom){
            let cookieArr = document.cookie.split(";");
            for (let i =0; i< cookieArr.length; i++){
                let cookPair = cookieArr[i].split("=");
                if (' '+nom === cookPair[0]){
                    return decodeURIComponent(cookPair[1]);
                }
            }
            return null;
        }
        let repCookie = getCookie('accept');

        if ( repCookie === "non" || repCookie == null) {
            document.cookie = 'accept=non';
            let modal = document.getElementById("myModal");
            modal.style.display = "block";
            window.onclick = function (event) {
                if (event.target === modal) {
                    modal.style.display = "none";
                }
            }

            let btnTout = document.querySelector("#btnTout");
            btnTout.onclick = function () {
                document.cookie = 'accept=oui';
                modal.style.display = "none";
            }

        }
    </script>
@endsection
