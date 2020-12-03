<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body>

<h2>HTML Table</h2>

<table>
    <tr>
        <th>Adi</th>
        <th>Urun</th>
        <th>Fiyat</th>

    </tr>
    @foreach($users as $satisdokuman)
        <tr>
            <td>{{$satisdokuman->name }}</td>
            <td>{{$satisdokuman->pName}}</td>
            <td>{{$satisdokuman->price}}</td>

        </tr>
        @endforeach
        </tr>
</table>

</body>
</html>

