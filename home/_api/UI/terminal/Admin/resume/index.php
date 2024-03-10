<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
</head>

<body>
    <form class="container" action="submit.php" type="POST">
        <div class="row d-flex">
            <div class="col-3">
                <label class="form-label">Zamestnavatel</label>
                <input type="text" placeholder="Zamestnavatel" class="form-control" name="employer">
                <div id="emailHelp" class="form-text">e.g. Apple Inc.</div>
            </div>
            <div class="col-3">
                <label class="form-label">Adres</label>
                <input type="text" placeholder="Adresa firmy" class="form-control" name="address">
                <div id="emailHelp" class="form-text">e.g. Palo Alto, California</div>
            </div>
            <div class="col-3">
                <label class="form-label">For Whom</label>
                <input type="text" placeholder="Vážená/Vážený pane/paní ...," class="form-control" name="for_whom">
                <div id="emailHelp" class="form-text">e.g. Dear Mr Aliev</div>
            </div>
            <div class="col-3">
                <label class="form-label">Job</label>
                <input type="text" placeholder="Pozice" class="form-control" name="job">
                <div id="emailHelp" class="form-text">Na jakou pozici se hlásíš</div>
            </div>

            <div class="row d-flex">
                <div class="col-3">
                    <label class="form-label">Source URL</label>
                    <input type="text" placeholder="Zdrojový URL" class="form-control" name="server">
                    <div id="emailHelp" class="form-text">Source URL</div>
                </div>
                <div class="col-3">
                    <label class="form-label">School</label>
                    <input type="text" placeholder="Škola" class="form-control" name="school">
                    <div id="emailHelp" class="form-text">e.g. ČVUT</div>
                </div>
                <div class="col-3">
                    <label class="form-label">Why to choose me</label>
                    <input type="text" placeholder="Chci pro vás pracovat, protože..." class="form-control" name="because">
                    <div id="emailHelp" class="form-text">Why to choose you. e.g.</div>
                </div>
                <div class="col-3">
                    <label class="form-label">Characteristics</label>
                    <input type="text" placeholder="Jsem ..." class="form-control" name="iam">
                    <div id="emailHelp" class="form-text">My Characteristics.</div>
                </div>
            </div>

            <div class="col-12">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="cz"
                        checked>
                    <label class="form-check-label" for="inlineRadio1">Czech</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="eng">
                    <label class="form-check-label" for="inlineRadio2">English</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2"
                        value="rus">
                    <label class="form-check-label" for="inlineRadio2">Russian</label>
                </div>
            </div><br><br>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
            <p>Přidej sem jednotlivé překlady před define() v php nebo JS</p>

    </form>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
</body>

</html>