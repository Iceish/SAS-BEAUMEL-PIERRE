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
            <!--<span class="close">&times;</span> -->
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
                if (' '+nom == cookPair[0]){
                    return decodeURIComponent(cookPair[1]);
                }
            }
            return null;
        }
        let repCookie = getCookie('accept');

        //console.log(repCookie);
        // Verify if cookie was accepted
        if ( repCookie == "non" || repCookie == null) {
            document.cookie = 'accept=non';
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the <span> element that closes the modal
            //var span = document.getElementsByClassName("close")[0];

            // open the modal
            modal.style.display = "block";

            // When the user clicks on <span> (x), close the modal
            /*
            span.onclick = function () {
                modal.style.display = "none";
            }
            */
            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function (event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }

            var btnTout = document.querySelector("#btnTout");
            btnTout.onclick = function () {
                document.cookie = 'accept=oui';
                modal.style.display = "none";
            }

        }
    </script>
@endsection
