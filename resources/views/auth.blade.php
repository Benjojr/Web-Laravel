<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div class="shell" id="shell">

        <!-- ── Form Side ── -->
        <div class="form-side">
            <form onsubmit="return false">
                @csrf
                <!-- Sign In -->
                <div class="view" id="view-signin">
                    <h1>Login</h1>
                    <div class="field">
                        <label>Alamat Email</label>
                        <div class="inp-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <input type="email" name="email" placeholder="nama.anda@example.com">
                        </div>
                    </div>

                    <div class="field">
                        <label>Kata Sandi</label>
                        <div class="inp-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <input type="password" name="password" id="pw1" placeholder="Masukkan kata sandi Anda">
                            <svg class="eye" onclick="togglePw('pw1')" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>
                    </div>

                    <div class="row-inline">
                        <label class="chk-label"><input type="checkbox"> Ingat saya di perangkat ini</label>
                        <a href="#" class="link">Lupa kata sandi?</a>
                    </div>

                    <button class="btn-main btn-signin" id="btn-signin" type="submit">Masuk</button>
                    <div class="divider">Atau masuk dengan</div>
                    <div class="social-row">
                        <button class="btn-social" type="button"><img
                                src="https://www.svgrepo.com/show/475656/google-color.svg" alt="">Google</button>
                        <button class="btn-social" type="button"><img
                                src="https://www.svgrepo.com/show/448224/facebook.svg" alt="">Facebook</button>
                    </div>
                    <p class="note">Belum memiliki akun? <a href="#" id="go-signup">Daftar sekarang</a></p>
                </div>

                <!-- Sign Up -->
                <div class="view hidden" id="view-signup">
                    <h1>Buat Akun</h1>

                    <div class="field">
                        <label>Nama</label>
                        <div class="inp-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                            </svg>
                            <input type="text" name="nama" placeholder="Nama anda">
                        </div>
                    </div>

                    <div class="field">
                        <label>Alamat Email</label>
                        <div class="inp-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 0 1-2.25 2.25h-15a2.25 2.25 0 0 1-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0 0 19.5 4.5h-15a2.25 2.25 0 0 0-2.25 2.25m19.5 0v.243a2.25 2.25 0 0 1-1.07 1.916l-7.5 4.615a2.25 2.25 0 0 1-2.36 0L3.32 8.91a2.25 2.25 0 0 1-1.07-1.916V6.75" />
                            </svg>
                            <input type="email" name="email" placeholder="nama.anda@example.com">
                        </div>
                    </div>

                    <div class="field">
                        <label>Kata Sandi</label>
                        <div class="inp-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <input type="password" name="password" id="pw2" placeholder="Masukkan kata sandi Anda">
                            <svg class="eye" onclick="togglePw('pw2')" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>
                    </div>

                    <div class="field">
                        <label>Konfirmasi Kata Sandi</label>
                        <div class="inp-wrap">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.7"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M16.5 10.5V6.75a4.5 4.5 0 1 0-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 0 0 2.25-2.25v-6.75a2.25 2.25 0 0 0-2.25-2.25H6.75a2.25 2.25 0 0 0-2.25 2.25v6.75a2.25 2.25 0 0 0 2.25 2.25Z" />
                            </svg>
                            <input type="password" name="confirm_password" id="pw3" placeholder="Masukkan kata sandi Anda">
                            <svg class="eye" onclick="togglePw('pw3')" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88" />
                            </svg>
                        </div>
                    </div>

                    <div class="terms">
                        <input type="checkbox">
                        <span>Saya menyetujui <a href="#">Syarat dan Ketentuan</a> serta <a href="#">Kebijakan
                                Privasi</a> yang berlaku</span>
                    </div>

                    <button class="btn-main btn-signup" type="submit">Daftar Sekarang</button>
                    <div class="divider">Atau daftar dengan</div>
                    <div class="social-row">
                        <button class="btn-social" type="button"><img
                                src="https://www.svgrepo.com/show/475656/google-color.svg" alt="">Google</button>
                        <button class="btn-social" type="button"><img
                                src="https://www.svgrepo.com/show/448224/facebook.svg" alt="">Facebook</button>
                    </div>
                    <p class="note">Sudah memiliki akun? <a href="#" id="go-signin">Masuk di sini</a></p>
                </div>

            </form>
        </div>

        <!-- ── Overlay Side ── -->
        <div class="overlay-side">
            <div class="overlay-bg" id="overlay-bg">
                <h2 id="ov-title">Welcome Back!</h2>
                <p id="ov-desc">Masuk ke akun Anda untuk mengakses dashboard dan fitur-fitur eksklusif platform kami.
                </p>
                <div class="deco-line"></div>
            </div>
        </div>

    </div>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>