<?php
    session_start();
    require_once 'db_connection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        
        $email = $_POST["email"];
        $password = $_POST["password"];
        
        if ($email === "admin@admin" && $password === "admin") {
            $_SESSION['user_id'] = "admin";
            $_SESSION['fullname'] = "Administrator";
            header("Location: admin_dashboard.php"); 
            exit();
        }
        
        $stmt = $conn->prepare("SELECT user_id, fullname, password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($id, $fullname, $hashed_password);
            $stmt->fetch();

            if (password_verify($password, $hashed_password)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['fullname'] = $fullname;
                header("Location: user.php");
                exit();
            } else {
                $error_message = "Invalid password!";
            }
        } else {
            echo "No acc found with that email!";
        }

        $stmt->close();
    }
    $conn->close();

// ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="JavaScript/tailwind.js"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <h1 class="text-indigo-500 font-bold text-3xl mb-5">ITTHINK</h1>
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">

            <form action="index.php" method="POST" class="flex flex-col">

                <div class="mb-4">
                    <input placeholder="Email address"
                        type="email" 
                        id="email" 
                        name="email" 
                        class="mt-1 p-4 h-10 block w-full border-gray-300 rounded-md shadow-sm border">
                </div>

                <div class="mb-6">
                    <input 
                        placeholder="Password"
                        type="password" 
                        id="password" 
                        name="password" 
                        class="mt-1 p-4 h-10 block w-full border-gray-300 rounded-md shadow-sm border">
                </div>

                <button type="submit" class="w-full bg-indigo-500 text-white font-bold py-2 px-4 rounded-md duration-100 hover:bg-indigo-600">Log in</button>
                <hr class="my-5">
                <button class="min-w-20 mx-auto bg-[#42b72a] text-white font-bold  py-2 px-2 rounded-md duration-100 hover:bg-[#359922]" formaction="signup.php">Create new account</button>   
            </form>

        </div>
    </div>

    <footer class="w-full h-24 bg-white flex justify-center items-center mt-10">
        <p class="text-black text-center">Designed by <span class="font-semibold">MOHAMMED LATRACH</span> <br> <span class="text-[0.9rem]">&copy; YouCode Nador Promo 2024-2026</span></p>
    </footer>
</body>
</html>
