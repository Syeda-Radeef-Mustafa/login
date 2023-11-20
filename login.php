<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
</head>
<body>

<form id="login">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    <br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    <br>

    <button type="submit">Login</button>
</form>

<script>
document.getElementById('login').addEventListener('submit', async function(event) {
    event.preventDefault();

    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;

    try {
        const response = await fetch('http://localhost/project_php/login.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                username,
                password,
            }),
        });

        if (response.ok) {
            const data = await response.json();
            if (data.status === 'success') {
                // Redirect to the dashboard or perform any other action on successful login
                console.log('Login successful');
            } else {
                console.error('Login failed:', data.message);
            }
        } else {
            console.error('Login failed:', response.statusText);
        }
    } catch (error) {
        console.error('Error during login:', error);
    }
});
</script>

</body>
</html>
