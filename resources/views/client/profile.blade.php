<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Client Profile</title>

    <style>
        h3 {
            text-align: center;
            margin-top: 5px;
            margin-bottom: 5px;
        }
        .id_card{
            height: 3.375in;
            width: 2.135in;
            background-color: #ddd;
            margin: auto;
            border: 1px solid black;
            padding: 5px;
        }
        .print{
            width: 2.135in;
            height: auto;
            background-color: #ddd;
            margin-left: auto;
            margin-right: auto;
            margin-top: 10px;
            border: 1px solid black;
            padding: 5px;
        }
        .image{
            height: 100px;
            width: 100px;
            background-color: #fff;
            margin: auto;
        }
        input {
            /* float: left; */
            width: 100%;
            -ms-box-sizing: border-box; /* ie8 */
            -khtml-box-sizing: border-box; /* konqueror */
            -webkit-box-sizing: border-box; /* Safari/Chrome, other WebKit */
            -moz-box-sizing: border-box;    /* Firefox, other Gecko */
            box-sizing: border-box;         /* Opera/IE 8+ */
            box-sizing: border-box; /* css3 rec */
        }
        @media print {
            .print {
                display: none;
            }
        }
    </style>
</head>
<body>

    <div class="id_card">
        <h3>NODES DIGITAL LTD.</h3>
        <div class="image">
            <p style="text-align: center;"><img src="data:image/png;base64, {{ $client->image }}" height="100px" width="100px" alt="Photo" /></p>
        </div>

        <p style="font-weight: bold; text-align: center; margin-bottom: 0px">(HR Manager)</p>
        <p style="line-height: 20px; margin-top: 5px; margin-bottom: 5px">
            CID: #ND-CID-{{ $client->id }} <br>
            Name: {{ $client->name }} <br>
            Mobile: {{ $client->mobile }} <br>
        </p>

        <p style="text-align: center; margin-top: 0">
            {!! QrCode::size(70)->generate(Request::url()); !!}
        </p>
    </div>
    <div class="print">
            <input type="button" value="Print" onclick="window.print()">
    </div>
</body>
</html>
