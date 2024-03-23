<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kalkulator Ku</title>
    <link rel="icon" href="{{ asset('images/calculator.png') }}" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        body {
            font-family: "Nunito", sans-serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }

        .center-card {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
    </style>
</head>

<body class="bg-secondary">
    <div class="d-flex">
        <div class="col">
            <div class="center-card">
                <div class="col-6">
                    <div class="card text-center rounded-4" style="background-color: #3a484a">
                        <div class="card-header text-white">
                            <h4 class="fw-light my-2">
                                Kalkulator Ku
                            </h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ url('/') }}" method="POST">
                                @csrf
                                <input type="number" class="form-control form-control-lg mb-3" name="a"
                                    value="{{ $a }}" step="any" required>
                                <input type="number" class="form-control form-control-lg mb-3" name="b"
                                    value="{{ $b }}" step="any" required>
                                <div class="d-flex">
                                    <div class="col me-2">
                                        <select class="form-select form-select-lg mb-3"
                                            aria-label="Default select example" name="operasi">
                                            <option disabled>Operator</option>
                                            <option value="tambah" {{ $operasi == 'tambah' ? 'selected' : '' }}>+
                                            </option>
                                            <option value="kurang" {{ $operasi == 'kurang' ? 'selected' : '' }}>-
                                            </option>
                                            <option value="kali" {{ $operasi == 'kali' ? 'selected' : '' }}>x</option>
                                            <option value="bagi" {{ $operasi == 'bagi' ? 'selected' : '' }}>/</option>
                                            <option value="modulo" {{ $operasi == 'modulo' ? 'selected' : '' }}>mod
                                            </option>
                                        </select>
                                    </div>
                                    <div class="col-4">
                                        <button type="submit" class="btn btn-lg btn-primary w-100">Hitung</button>
                                    </div>
                                </div>
                                <input type="number" class="form-control form-control-lg mb-3"
                                    value="{{ $hasil }}" placeholder="Hasil" readonly>
                            </form>
                            <a type="button" class="btn btn-lg btn-danger w-100" href="{{ '/' }}">Clear</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="center-card">
                <div class="col-7">
                    <div class="card rounded-4">
                        <h5 class="card-header fw-light my-2">
                            Riwayat Perhitungan
                        </h5>
                        <div class="card-body">
                            <div class="table-responsive" style="overflow-y: auto; max-height: 330px;">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">A</th>
                                            <th scope="col">Operasi</th>
                                            <th scope="col">B</th>
                                            <th scope="col">Hasil</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($riwayats as $key => $riwayat)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $riwayat->a }}</td>
                                                <td>{{ $riwayat->operasi }}</td>
                                                <td>{{ $riwayat->b }}</td>
                                                <td>{{ $riwayat->hasil }}</td>
                                                <td>
                                                    <a type="button" class="btn btn-sm btn-primary"
                                                        href="{{ url('/' . $riwayat->id_perhitungan) }}">
                                                        <i class="bi bi-pencil-fill"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>
