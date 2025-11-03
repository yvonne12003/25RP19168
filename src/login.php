<!DOCTYPE html>
<html>
<head>
    <title>Login - Ride Sharing</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .container { max-width: 400px; margin: 0 auto; }
        .form-group { margin: 15px 0; }
        label { display: block; margin-bottom: 5px; }
        input { width: 100%; padding: 8px; border: 1px solid #ddd; border-radius: 4px; }
        button { background: #007bff; color: white; padding: 10px 20px; 
                border: none; border-radius: 4px; cursor: pointer; }
        .back-link { display: inline-block; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>User Login</h1>
        
        <form action="login_process.php" method="POST">
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit">Login</button>
        </form>
        
        <p>Don't have an account? <a href="registration.php">Register here</a></p>
        <a href="index.php" class="back-link">← Back to Home</a>
    </div>
</body>
</html>