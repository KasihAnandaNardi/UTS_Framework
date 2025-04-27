<!doctype html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Pendaftaran Kelas Kursus Online</title>
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Custom CSS for Soft Pink Theme */
        body {
            background-color: #ffe6f0; /* Soft Pink Background */
            color: #333;
        }
        .navbar {
            background-color: #ff66b2; /* Soft Pink Navbar */
            text-align: center;
            
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5rem;
            text-align: center;
            margin: 0 auto;

        }
        .btn-primary {
            background-color: #ff66b2; /* Soft Pink Button */
            border-color: #ff66b2;
        }
        .btn-primary:hover {
            background-color: #e65b9f;
            border-color: #e65b9f;
        }
        .card {
            background-color: #ffffff;
            border: 1px solid #ff66b2;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #ff66b2;
            color: white;
            font-weight: bold;
        }

        .pagination {
            display: flex;
            justify-content: flex-end;
            margin-top: 1rem;
        }
        .pagination .page-item.active .page-link {
            background-color: #ff66b2;
            border-color: #ff66b2;
            color: white;
        }
        .pagination .page-link {
            color: #ff66b2;
        }
        .footer {
            background-color: #ff66b2;
            color: white;
            padding: 1rem;
            text-align: center;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
        /* Responsive Styling */
        @media (max-width: 768px) {
            .navbar-brand {
                font-size: 1.25rem;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('pendaftaran.index') }}">Manajemen Pendaftaran Kelas Kursus Online</a>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container my-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <p>&copy; 2025 Manajemen Pendaftaran Kelas Kursus Online | Kasih Ananda Nardi.</p>
    </footer>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
