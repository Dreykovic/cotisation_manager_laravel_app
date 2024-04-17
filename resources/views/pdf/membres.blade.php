<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>


</head>

<body>
    <style>
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
            text-decoration: none;
        }

        body {
            padding: 15px;
        }

        header.head-title {
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: start;
            padding: 0 10px 0px 10px;


        }






        .titre {
            margin: auto;
            font-weight: 700;
            text-align: center;
            text-transform: uppercase;
        }

        .separateur {
            margin-top: 10px;
            margin-bottom: 5px;
            font-size: 10px;
            font-weight: 500;
            height: 6px;
            min-width: 100%;
            border: #000000 solid 2px;
        }

        .upper {
            text-transform: uppercase;
        }

        .box-title {
            text-align: center;
        }

        main table.table {
            width: 100%;
            border-collapse: collapse;
            margin: 0;

        }

        main table.table th,
        main table.table td {
            border: 2px solid #ddd;
            padding: 3px;
            /* text-align: center; */
        }

        main th {
            background-color: #f2f2f2;
        }

        div.cellule {
            text-align: start;
            align-items: start;
        }



        .capital {
            text-transform: capitalize;
        }
    </style>


    <div class="box-title">
        <h1><span class="upper"></span>
            VILLAGE GATI-SOUN <br>
            QUARTIER DJIGBE <br>
            FILLES ET FILS DE LA MAISON BATO

        </h1>

    </div>
    <div class="separateur">


    </div>

    <main>
        <table>
            <tbody>
                <tr>
                    <td style="text-align: start; font-weight: 900;">
                        Nombre total
                    </td>
                    <td style="text-align: start;">
                        :
                    </td>
                    <td style="text-align: start;">
                        {{ $users->count() }}
                    </td>
                </tr>

            </tbody>
        </table>


        <table class="table">
            <thead>
                <tr>
                    <th style="text-align: start;">No</th>
                    <th>Nom-Prénoms</th>
                    <th>Sexe</th>
                    <th>Date de naissance</th>
                    <th>Prénom du Père</th>
                    <th>Prénom de la Mère</th>
                    <th>Pays de résidence</th>
                    <th>Ville/Village de résidence</th>
                    <th>Contact</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $key => $user)
                    <tr>
                        <td class="text-nowrap" style="word-wrap: normal;overflow-wrap: normal;">
                            {{ $key + 1 }}
                        </td>

                        <td tyle="text-align: start;">
                            {{ $user->last_name . ' ' . $user->first_name }}
                        </td>



                        <td tyle="text-align: start;">
                            {{ $user->sexe }}
                        </td>

                        <td tyle="text-align: start;">
                            {{ $user->date_naissance }}
                        </td>

                        <td tyle="text-align: start;">
                            {{ $user->nom_pere }}
                        </td>
                        <td tyle="text-align: start;">
                            {{ $user->nom_mere }}
                        </td>
                        <td tyle="text-align: start;">
                            {{ $user->pays }}
                        </td>
                        <td tyle="text-align: start;">
                            {{ $user->ville }}
                        </td>
                        <td tyle="text-align: start;">
                            {{ $user->contact }}

                        </td>
                    </tr>
                @endforeach

                <!-- Ajoutez d'autres lignes au besoin -->
            </tbody>
        </table>

    </main>

</body>

</html>
