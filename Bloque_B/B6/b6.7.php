<!-- pag 108 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actividad 7</title>
</head>
<body>
    <!-- Cambiar a GET -->
    <form action="collecting-form-data.php" method="GET">
        <p>Name: <input type="text" name="name" ></p>
        <p>Age: <input type="text" name="age" ></p>
        <p>Email: <input type="text" name="email" ></p>
        <p>Password: <input type="text" name="pwd" ></p>
        <p>Bio: <textarea type="bio" name="pwd" ></textarea></p>
        <p>Contact preference:
            <select name="preferences">
                <option value="email">Email</option>
                <option value="phone">Phone</option>
            </select>
        </p>
        <p>Rating:
            1 <input type="radio" name="rating" value="1">&nbsp;
            2 <input type="radio" name="rating" value="2">&nbsp;
            3 <input type="radio" name="rating" value="3"></p>
        <p><input type="checkbox" name="terms" value="true">
        I agree to the terms and conditions</p>
        <p><input type="submit" value="Save"></p>
    </form>
    <pre><?php var_dump($_GET);?></pre>
</body>
</html>