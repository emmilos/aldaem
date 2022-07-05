<?php
use App\Models\TypeCredit;

$type_credits=TypeCredit::all();
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
            font-size: 12px;
            margin-top: 0.7%;
            margin-left: 2%;
        }
        .wa{
            text-align: left;
            font-size: 12px;
            margin-top: 0.7%;
            margin-left: 2%;
        }
        .war{
            text-align: right;
            font-size: 12px;
            margin-top: 0.7%;
            margin-right: 2%;
        }
        .warn{
            text-align: right;
            font-size: 12px;
            margin-top: 0.7%;
            margin-right: 2%;
        }
        .mainlinks .left {
    float:left;
    width: 49%;
}

.mainlinks .right {
    float:right;
    width: 49%;
}
        </style>
</head>
<body>
    <header>
        <div class="mainlinks">
            <div class="left">
                <div class="w"><h2>ALDAEM BAITOUL maal</h2> </div>
                <div class="wa"><h3>Contact : 72 22 87 38 / 75 97 48 38</h3></div>
                <div class="w"><h2>ALDAEM BAITOUL maal</h2> </div>
                <div class="wa"><h3>Contact : 72 22 87 38 / 75 97 48 38</h3></div>

            </div>
            <div class="right">
                <div class="war"><h2>BURKINA-FASO</h2></div>
                <div class="warn"><h3>Unité-Progres-Justice</h3></div>
                <div class="war"><h2>BURKINA-FASO</h2></div>
                <div class="warn"><h3>Unité-Progres-Justice</h3></div>

            </div>
        </div>
        <img classe="images" src="/storage/Image/IMG9.JPG" style="width: 100px; height: 100px;" alt="">




    </header>
    <div class="container mt-5">
    <br>
    <br>


    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <h1 class="text-center mb-3">Liste des type de credits</h1>



    <table class="table table-bordered mb-5">
        <thead>
            <tr class="table-danger">
                <th scope="col">ID</th>
                <th scope="col">Libellé</th>
                <th scope="col">Taux appliqué</th>
                <th scope="col">Montant</th>
                <th scope="col">Durée</th>
                <th scope="col">Périodicité</th>
                <th scope="col">Frais dossier</th>
                <th scope="col">Mode_perc_int</th>
                <th scope="col">Type caution financiere</th>


            </tr>
        </thead>
        <tbody>


            <?php
            foreach($type_credits as $key => $type_credit){ ?>

            <tr>
                <th scope="row">{{ $type_credit->id }}</th>
                <td>{{ $type_credit->libel }}</td>
                <td>{{ $type_credit->tauxapplique }}</td>
                <td>{{ $type_credit->montant }}</td>
                <td>{{ $type_credit->duree }}</td>
                <td>{{ $type_credit->periodicite }}</td>
                <td>{{ $type_credit->fraisdossier }}</td>
                <td>{{ $type_credit->mode_perc_int }}</td>
                <td>{{ $type_credit->typ_caution_financiere }}</td>




            </tr>
            <?php }?>
        </tbody>
    </table>
    </div>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>



