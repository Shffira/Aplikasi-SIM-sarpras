
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | SIM-SARPRAS</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;600;700&family=Playfair+Display:wght@500;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --green: #294b3b;
            --green-dark: #1f3c2e;
            --text: #344a3b;
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
            font-family: "DM Sans", sans-serif;
            color: var(--text);
            background:
                radial-gradient(ellipse at 15% 15%, rgba(255,255,235,.9), transparent 35%),
                radial-gradient(ellipse at 90% 75%, rgba(218,204,164,.8), transparent 40%),
                linear-gradient(135deg, #d8d8bd, #f4f0df 48%, #d5d7bd);
        }

        .auth-page {
            position: relative;
            display: grid;
            min-height: 100vh;
            place-items: center;
            padding: 35px 20px;
            isolation: isolate;
        }

        .orb {
            position: fixed;
            z-index: -1;
            border-radius: 50%;
            pointer-events: none;
            background: radial-gradient(circle at 30% 25%, #fffde9 0%, #e5e8cb 25%, #a7b59a 65%, #758b70 100%);
            box-shadow:
                inset -12px -16px 30px rgba(61,83,56,.12),
                inset 8px 8px 22px rgba(255,255,255,.8),
                0 20px 45px rgba(76,89,60,.12);
        }

        .orb-one {
            width: 250px;
            height: 250px;
            top: 5%;
            left: 7%;
            opacity: .9;
        }

        .orb-two {
            width: 105px;
            height: 105px;
            top: -25px;
            right: 18%;
        }

        .orb-three {
            width: 115px;
            height: 115px;
            bottom: 12%;
            left: 4%;
        }

        .orb-four {
            width: 150px;
            height: 150px;
            right: 5%;
            bottom: 4%;
            opacity: .85;
        }

        .orb-five {
            width: 65px;
            height: 65px;
            right: 9%;
            top: 30%;
        }

        .leaf {
            position: fixed;
            z-index: -1;
            color: rgba(65,91,61,.25);
            font-size: 150px;
            pointer-events: none;
        }

        .leaf-left {
            left: -35px;
            top: 37%;
            transform: rotate(-30deg);
        }

        .leaf-right {
            right: -35px;
            bottom: 15%;
            transform: rotate(35deg);
        }

        .auth-card {
            position: relative;
            width: min(100%, 490px);
            padding: 34px 44px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.7);
            border-radius: 34px;
            background: linear-gradient(
                135deg,
                rgba(255,255,242,.64),
                rgba(244,241,220,.37)
            );
            backdrop-filter: blur(24px);
            -webkit-backdrop-filter: blur(24px);
            box-shadow:
                0 25px 70px rgba(70,83,57,.12),
                inset 0 1px 1px rgba(255,255,255,.85);
        }

        .auth-card::before {
            content: "";
            position: absolute;
            inset: 8px;
            border: 1px solid rgba(255,255,255,.38);
            border-radius: 27px;
            pointer-events: none;
        }

        .auth-content {
            position: relative;
            z-index: 1;
        }

        .brand-icon {
            display: grid;
            width: 54px;
            height: 54px;
            margin: 0 auto 9px;
            place-items: center;
            border: 1px solid rgba(255,255,255,.8);
            border-radius: 18px;
            background: rgba(255,255,255,.42);
            color: var(--green);
            box-shadow: 0 8px 25px rgba(41,75,59,.08);
            font-size: 27px;
        }

        .brand-name {
            margin: 0;
            color: var(--green);
            font-family: "Playfair Display", serif;
            font-size: 27px;
            font-weight: 600;
            letter-spacing: 1px;
            text-align: center;
        }

        .brand-description {
            margin: 5px 0 22px;
            color: #657564;
            font-size: 12px;
            text-align: center;
        }

        .form-title {
            margin-bottom: 3px;
            color: var(--green);
            font-family: "Playfair Display", serif;
            font-size: 32px;
            font-weight: 600;
        }

        .form-subtitle {
            margin-bottom: 20px;
            color: #718071;
            font-size: 13px;
        }

        .form-label {
            margin-bottom: 6px;
            color: #425745;
            font-size: 12px;
            font-weight: 600;
        }

        .input-group {
            margin-bottom: 13px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,.95);
            border-radius: 13px;
            background: rgba(255,255,255,.88);
            box-shadow: 0 5px 15px rgba(53,73,50,.035);
            transition: border-color .2s, box-shadow .2s;
        }

        .input-group:focus-within {
            border-color: #92a58e;
            box-shadow: 0 0 0 3px rgba(41,75,59,.08);
        }

        .input-group-text {
            padding: 11px 0 11px 15px;
            border: 0;
            background: transparent;
            color: var(--green);
        }

        .form-control {
            min-width: 0;
            padding: 11px 13px;
            border: 0;
            background: transparent;
            color: var(--text);
            font-size: 13px;
            box-shadow: none !important;
        }

        .form-control:focus {
            background: transparent;
        }

        .form-control::placeholder {
            color: #9a9d91;
        }

        .password-toggle {
            padding: 0 13px;
            border: 0;
            background: transparent;
            color: #718071;
        }

        .btn-auth {
            display: flex;
            width: 100%;
            min-height: 49px;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-top: 19px;
            border: 1px solid rgba(255,255,255,.2);
            border-radius: 14px;
            background: linear-gradient(135deg, #355e49, #244632);
            color: #fff;
            font-size: 14px;
            font-weight: 600;
            box-shadow: 0 9px 20px rgba(41,75,59,.18);
            transition: transform .2s, box-shadow .2s;
        }

        .btn-auth:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #294b3b, #1c3829);
            color: #fff;
            box-shadow: 0 12px 24px rgba(41,75,59,.23);
        }

        .auth-footer {
            margin: 19px 0 0;
            color: #718071;
            font-size: 12px;
            text-align: center;
        }

        .auth-link {
            color: var(--green);
            font-weight: 700;
            text-decoration: none;
        }

        .auth-link:hover {
            color: #668064;
            text-decoration: underline;
        }

        .alert {
            border-radius: 12px;
            font-size: 12px;
        }

        @media (max-width: 576px) {
            .auth-page {
                padding: 20px 13px;
            }

            .auth-card {
                padding: 29px 22px;
                border-radius: 27px;
            }

            .orb-one {
                width: 160px;
                height: 160px;
                left: -60px;
            }

            .orb-four {
                width: 100px;
                height: 100px;
            }

            .leaf {
                font-size: 90px;
            }
        }

        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after {
                transition: none !important;
            }
        }
    </style>
</head>

<body>
<div class="auth-page">
    <div class="orb orb-one"></div>
    <div class="orb orb-two"></div>
    <div class="orb orb-three"></div>
    <div class="orb orb-four"></div>
    <div class="orb orb-five"></div>

    <i class="bi bi-leaf-fill leaf leaf-left"></i>
    <i class="bi bi-leaf-fill leaf leaf-right"></i>

    <main class="auth-card">
        <div class="auth-content">
            <div class="brand-icon">
                <i class="bi bi-buildings"></i>
            </div>

            <h1 class="brand-name">SIM-SARPRAS</h1>
            <p class="brand-description">
                Sistem Informasi Sarana dan Prasarana
            </p>

            <h2 class="form-title">Register</h2>
            <p class="form-subtitle">Buat akun untuk melanjutkan.</p>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0 ps-3">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('register.submit') }}" method="POST">
                @csrf

                <label for="name" class="form-label">Nama Lengkap</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-person"></i>
                    </span>
                    <input
                        type="text"
                        id="name"
                        name="name"
                        class="form-control"
                        placeholder="Masukkan nama lengkap"
                        value="{{ old('name') }}"
                        autocomplete="name"
                        maxlength="255"
                        required
                    >
                </div>

                <label for="email" class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input
                        type="email"
                        id="email"
                        name="email"
                        class="form-control"
                        placeholder="Masukkan email aktif"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        maxlength="255"
                        required
                    >
                </div>

                <label for="password" class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Buat password"
                        autocomplete="new-password"
                        required
                    >
                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword('password', this)"
                        aria-label="Tampilkan password"
                    >
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                <div class="input-group">
                    <span class="input-group-text">
                        <i class="bi bi-shield-lock"></i>
                    </span>
                    <input
                        type="password"
                        id="password_confirmation"
                        name="password_confirmation"
                        class="form-control"
                        placeholder="Ulangi password"
                        autocomplete="new-password"
                        required
                    >
                    <button
                        type="button"
                        class="password-toggle"
                        onclick="togglePassword('password_confirmation', this)"
                        aria-label="Tampilkan konfirmasi password"
                    >
                        <i class="bi bi-eye"></i>
                    </button>
                </div>

                <button type="submit" class="btn btn-auth">
                    Daftar <i class="bi bi-arrow-right"></i>
                </button>
            </form>

            <p class="auth-footer">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="auth-link">Login</a>
            </p>
        </div>
    </main>
</div>

<script>
    function togglePassword(id, button) {
        const input = document.getElementById(id);
        const icon = button.querySelector('i');
        const isHidden = input.type === 'password';

        input.type = isHidden ? 'text' : 'password';
        icon.classList.toggle('bi-eye', !isHidden);
        icon.classList.toggle('bi-eye-slash', isHidden);
        button.setAttribute(
            'aria-label',
            isHidden ? 'Sembunyikan password' : 'Tampilkan password'
        );
    }
</script>
</body>
</html>
