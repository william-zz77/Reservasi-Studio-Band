<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="../../dist/output.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz@14..32&display=swap" rel="stylesheet">

    <style>
    body{font-family:'Inter',sans-serif;}
    </style>
</head>

<body class="bg-gradient-to-br from-black via-zinc-900 to-red-950 min-h-screen flex justify-center items-center p-6 text-white">

    <div class="w-full max-w-md space-y-6">

        <!-- HEADER -->
        <div class="text-center">
            <h1 class="text-3xl font-bold text-red-500">ROCK STUDIO</h1>
            <p class="text-gray-400 text-sm">Reservation System</p>
        </div>

        <!-- CARD LOGIN -->
        <div class="bg-zinc-900/80 backdrop-blur-md rounded-2xl border border-red-900 shadow-2xl">

            <!-- TITLE -->
            <div class="bg-gradient-to-r from-red-900 to-red-600 px-6 py-5 rounded-t-2xl text-center">
                <h2 class="text-xl font-bold tracking-wide">Login</h2>
                <p class="text-sm text-gray-300 mt-1">Masuk ke akun kamu</p>
            </div>

            <!-- FORM -->
            <form action="process_login.php" method="POST" class="p-6 space-y-5">

                <!-- Username -->
                <div>
                    <label class="text-sm text-gray-300">Username</label>
                    <input 
                        type="text" 
                        name="username" 
                        placeholder="Masukkan username"
                        class="w-full px-4 py-3 mt-1 rounded-xl bg-zinc-800 border border-zinc-700 focus:ring-2 focus:ring-red-600 focus:outline-none transition"
                        required
                    >
                </div>

                <!-- Password -->
                <div>
                    <label class="text-sm text-gray-300">Password</label>
                    <input 
                        type="password" 
                        name="password" 
                        placeholder="Masukkan password"
                        class="w-full px-4 py-3 mt-1 rounded-xl bg-zinc-800 border border-zinc-700 focus:ring-2 focus:ring-red-600 focus:outline-none transition"
                        required
                    >
                </div>

                <!-- BUTTON -->
                <button 
                    type="submit"
                    class="w-full bg-gradient-to-r from-red-700 to-red-500 hover:from-red-600 hover:to-red-400 active:scale-95 transition py-3 rounded-xl font-bold shadow-lg"
                >
                    Login
                </button>

            </form>

        </div>

        <!-- FOOTER -->
        <p class="text-xs text-gray-400 text-center">
            © 2026 Studio Band Reservation
        </p>

    </div>

</body>
</html>