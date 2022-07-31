<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="css/mdb.min.css" /> -->
</head>

<body>
    <!--Main Navigation-->
    <header>
        <style>
            #intro {
                background-image: url(https://mdbootstrap.com/img/new/fluid/city/008.jpg);
                height: 120vh;
            }

            /* Height for devices larger than 576px */
            @media (min-width: 992px) {
                #intro {
                    margin-top: -58.59px;
                }
            }
        </style>
        <!-- Background image -->
        <div id="intro" class="bg-image shadow-2-strong">
            <div class="mask d-flex align-items-center h-100" style="background-color: rgba(0, 0, 0, 0.8);">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-xl-5 col-md-8">

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alart alart-danger">{{ session()->get('error') }}</div>
                            @endif
                            <form class="bg-white rounded shadow-5-strong p-5 opacity-75"
                                action="{{ url('/admin/login') }}" method="POST">
                                @csrf
                                <div class="mb-3 mt-3">
                                    <input type="email" class="form-control" id="email" placeholder="Enter email"
                                        name="email">
                                </div>
                                <div class="mb-3">
                                    <input type="password" class="form-control" id="pwd"
                                        placeholder="Enter password" name="password">
                                </div>
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Background image -->
    </header>
    <!--Main Navigation-->
</body>

</html>
