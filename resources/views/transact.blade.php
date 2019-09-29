<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Test Transaction with paystack</title>
</head>

<body>
    <div class="container">
        <div class="col-6 mx-auto mt-5">
            <h3 class="mb-3">Test transaction with paystack</h3>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            <form method="post" action="transact">
                @csrf

                <div class="form-group">
                    <label for="inputfullname">Fullname</label>
                    <input type="text" class="form-control" id="inputfullname" aria-describedby="emailHelp"
                        placeholder="Enter your name" name="fullname">
                </div>
                <div class="form-group">
                    <label for="inputemail">Email address</label>
                    <input type="email" class="form-control" id="inputemail" aria-describedby="emailHelp"
                        placeholder="Enter email" name="email">
                </div>
                <div class="form-group">
                    <label for="inputamount">Amount to pay</label>
                    <input type="number" class="form-control" id="inputamount" aria-describedby="emailHelp"
                        placeholder="Enter amount to pay in naira" name="amount">
                </div>


                <button type="submit" class="btn btn-primary">proceed</button>
            </form>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>