<!DOCTYPE html>
<html lang="fr">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Hello, world!</title>
    <style>
      .modal {
        text-align: center;
      }

      @media screen and (min-width: 768px) {
        .modal:before {
          display: inline-block;
          vertical-align: middle;
          content: " ";
          height: 100%;

        }
      }

      .modal-dialog {
        display: inline-block;
        text-align: left;
        vertical-align: middle;
      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#exampleModal">Modal center</button>
        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" id="form">
              <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Pseudo..."><br>
              <input type="text" class="form-control" name="mdp" id="mdp" placeholder="Mot de passe..."><br>
              <button type="submit" class="btn btn-success w-100" name="validation" id="validation" >Valider</button>
            </form>
          </div>
          <div class="modal-footer" id="message">
            <p>Bienvenue</p>
          </div>
        </div>
      </div>
    </div>
    <script>
        document.getElementById('validation').addEventListener('click', function(e){
            e.preventDefault(); // on bloque l'evenement de validation du formulaire

            var valPseudo = document.getElementById('pseudo').value;
            console.log(valPseudo);
            var valMdp = document.getElementById('mdp').value;
            console.log(valMdp);

            var xhttp = new XMLHttpRequest();

            var fichier = 'ajax.php';
            var params = 'pseudo='+valPseudo+'&mdp='+valMdp;
            console.log(params);

            xhttp.open('POST', fichier, true);
            xhttp.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

            xhttp.onreadystatechange = function(){
                if(xhttp.readyState == 4 && xhttp.status == 200){
                    console.log(xhttp.responseText);
                    var reponse = JSON.parse(xhttp.responseText);
                    var cible  = document.getElementById('message');

                    // console.log(cible);
                    cible.innerHTML = reponse.message;
                    if(reponse.validation   == 'OK'){
                      // Si la connexion est ok alors on redirige vers une autre page (profil)
                      window.location = 'index.php';
                    }
                }
            }
            xhttp.send(params);
        });
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
