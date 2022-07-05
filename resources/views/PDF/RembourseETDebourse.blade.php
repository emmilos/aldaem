
<?php
use App\Models\Pays;

$pays=Pays::all();
//$html=?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PDF</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
    <style>
        table, td, th {
          border: 1px solid;
        }

        table {
          width: 100%;
          border-collapse: collapse;
        }
        H1 { text-align: center }
        .images { text-align: center;

        }

        #trait_dessus
        {
        border-top: 1px solid #000;
        width : 700px;
        text-align: center;
        }
        .w{
            text-align: left;
            font-size: 10px;

        }
        .wa{
            text-align: left;
            font-size: 10px;

        }
        .encadrer-un-contenu{
            border: 1px solid black;
            background-color: lightslategray;
            border: 1px solid black;
            text-align: center
        }
        .m{
            padding: 0px 0px;
        }
        .war{
            text-align: right;
            font-size: 8px;

        }
        .warn{
            text-align: right;
            font-size: 8px;

        }
        .mainlinks .left {
    float:left;
    width: 49%;
}
.k{
    font-size: 9px;
}

.mainlinks .right {
    float:right;
    width: 49%;
}
        </style>
</head>
<body class="m">
    <header>
        <div class="mainlinks">
            <div class="left">
                <div class="w"><h2>ALDAEM BAITOUL maal</h2> </div>
                <div class="wa"><h3>Contact : 72 22 87 38 / 75 97 48 38</h3></div>

            </div>
            <div class="right">
                <div class="war"><h2>BURKINA-FASO</h2></div>
                <div class="warn"><h3>Unité-Progres-Justice</h3></div>

            </div>
        </div>





    </header>
    <div class="container mt-5">
    <br>
    <br>
    <br>
    <p class="encadrer-un-contenu"> Attestation de déboursement de crédit </p>


    <ul class="right">
        <p class="k">Numéro de client :</p>
        <p class="k">Nom :</p>
        <p class="k">Numéro de dossier :</p>
        <p class="k">Montant déboursé :</p>
        <p class="k">Garantie numéraire a bloquer :</p>
        <p class="k">Garantie matérielle a bloquer :</p>
        <p class="k">Garantie numéraire mobilisée :</p>
        <p class="k">Garantie matérielle mobilisée :</p>
        <p class="k">Montant de la garantie en cours :</p>
        <p class="k">Montant de la commission :</p>
        <p class="k">Montant des assurances :</p>
        <p class="k">Nouveau solde du compte lié :</p>
        <p class="k">Numéro de transaction :</p>

    </ul>


    <div class="mainlinks">
        <div class="left">

            <div class="wa">Signature operateur</div>

        </div>
        <div class="right">

            <div class="warn">Signature client</div>

        </div>
    </div>

    <br>
    <br>
    <hr>
    <header>
        <div class="mainlinks">
            <div class="left">
                <div class="w"><h2>ALDAEM BAITOUL maal</h2> </div>
                <div class="wa"><h3>Contact : 72 22 87 38 / 75 97 48 38</h3></div>

            </div>
            <div class="right">
                <div class="war"><h2>BURKINA-FASO</h2></div>
                <div class="warn"><h3>Unité-Progres-Justice</h3></div>

            </div>
        </div>





    </header>
    <div class="container mt-5">
    <br>
    <br>
    <br>
    <br>

    <p class="encadrer-un-contenu"> Attestation de remboursement </p>


    <ul class="right">
        <p class="k">Numéro de dossier de crédit :</p>
        <p class="k">Numéro client :</p>
        <p class="k">Nom :</p>
        <p class="k">Montant remboursé :</p>
        <p class="k">Capital restant du :</p>
        <p class="k">Intérets restant dus :</p>
        <p class="k">Garantie restant due :</p>
        <p class="k">Pénalités dues :</p>


    </ul>


    <div class="mainlinks">
        <div class="left">

            <div class="wa">Signature operateur</div>

        </div>
        <div class="right">

            <div class="warn">Signature client</div>

        </div>
    </div>

</div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>



