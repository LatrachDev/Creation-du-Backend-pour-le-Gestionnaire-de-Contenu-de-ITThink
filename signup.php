

<?php
    $name = $email = $password = $confirm_password = "";
    $error_name = $error_email = $error_password = $error_confirm_password = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if(empty($_POST["name"])) {
            $error_name = "Please enter your name!";
        } elseif (!preg_match("/^[a-zA-Z ]*$/", $_POST["name"])) {
            $error_name = "Only letters and spaces are allowed.";
        } else {
            $name = validateInput($_POST["name"]);
        }    

        if (empty($_POST["email"])) {
            $error_email = "Please enter your email!";
        } elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
            $error_email = "Invalid email format.";
        } else {
            $email = validateInput($_POST["email"]);
        }

        if (empty($_POST["password"])) {
            $error_password = "Please enter your password!";
        } elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $_POST["password"])) {
            $error_password = "Password must include uppercase, lowercase, a number, and a special character.";
        } else {
            $password = validateInput($_POST["password"]);
        }

        if (empty($_POST["confirm_password"])) {
            $error_confirm_password = "Please confirm your password.";
        } elseif ($_POST["confirm_password"] !== $_POST["password"]) {
            $error_confirm_password = "Passwords do not match.";
        } else {
            $confirm_password = validateInput($_POST["confirm_password"]);
        }

        if (empty($error_name) && empty($error_email) && empty($error_password) && empty($error_confirm_password)) {
            $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

        // **************************
            $db_server = "localhost";
            $db_user = "root";
            $db_pass = "";
            $db_name = "itthink_dashboard";
            
            $conn = mysqli_connect
            (
                hostname: $db_server, 
                username: $db_user, 
                password: $db_pass, 
                database: $db_name
            );

            if($conn)
            {
                echo"You're connected!";
            }
            else
            {
                echo "couldn't connect";
            }
        // ***************************

            $sql = "INSERT INTO user (fullname, email, password) VALUES(?,?,?)";
            $stmt = $conn->prepare($sql);

            if($stmt){
                $stmt->bind_param("sss", $name, $email, $hashed_password);

                if ($stmt->execute()){
                    echo "Registration successful!";
                    header("Location: index.html");
                    exit();
                } else {
                    echo "Error: " . $stmt->error;
                }
                $stmt->close();
            } else {
                echo "Error preparing the statement: " . $conn->error;
            }
            $conn->close();
        }
    }
    function validateInput($data) {
        
        return htmlspecialchars(stripslashes(trim($data)));
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <script src="JavaScript/tailwind.js"></script>
</head>
<body class="bg-gray-100">

    <div class="min-h-screen flex flex-col items-center justify-center p-4">
        <h1 class="text-indigo-500 font-bold text-3xl mb-5">ITTHINK</h1>
        <div class="bg-white shadow-lg rounded-lg p-8 max-w-md w-full">

            <form action="signup.php" method="POST" class="flex flex-col items-center">
                <h2 class="text-xl font-semibold">Create a new account</h2>
                <p class="text-sm mb-5">Join us for a great experience</p>

                <div class="mb-4 w-full">
                    <input 
                        placeholder="Full Name" 
                        type="text" 
                        id="name" 
                        name="name" 
                        value="<?php echo htmlspecialchars($name); ?>"
                        
                        class="mt-1 p-4 h-10 block w-full border-gray-300 rounded-md shadow-sm border">
                        <span class="text-red-500 text-sm"><?php echo $error_name; ?></span>
                </div>
                
                <div class="mb-4 w-full">
                    <input 
                        placeholder="Email Address" 
                        type="email" 
                        id="email" 
                        name="email" 
                        value="<?php echo htmlspecialchars($email); ?>"
                        
                        class="mt-1 p-4 h-10 block w-full border-gray-300 rounded-md shadow-sm border">
                    <span class="text-red-500 text-sm"><?php echo $error_email; ?></span>
                </div>

                <div class="mb-4 w-full">
                    <input 
                        placeholder="Password" 
                        type="password" 
                        id="password" 
                        name="password" 
                        
                        class="mt-1 p-4 h-10 block w-full border-gray-300 rounded-md shadow-sm border">
                    <span class="text-red-500 text-sm"><?php echo $error_password; ?></span>
                </div>

                <div class="mb-6 w-full">
                    <input 
                        placeholder="Confirm Password" 
                        type="password" 
                        id="confirm_password" 
                        name="confirm_password" 
                        
                        class="mt-1 p-4 h-10 block w-full border-gray-300 rounded-md shadow-sm border">
                    <span class="text-red-500 text-sm"><?php echo $error_confirm_password; ?></span>
                </div>

                <hr class="my-5 border w-full">

                <button type="submit" class="min-w-44 bg-[#42b72a] text-white font-bold  py-2 px-2 rounded-md mx-auto duration-100 hover:bg-[#359922]"> SIgn Up</button>
                <p class="mt-4 text-blue-700 hover:text-blue-900"><a href="index.html">Already have an account?</a></p>
            </form>

        </div>
    </div>

    <footer class="w-full h-24 bg-white flex justify-center items-center mt-10">
        <p class="text-black text-center">Designed by <span class="font-semibold">MOHAMMED LATRACH</span> <br> <span class="text-[0.9rem]">&copy; YouCode Nador Promo 2024-2026</span></p>
    </footer>

</body>
</html>

