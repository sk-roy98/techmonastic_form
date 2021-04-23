<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form</title>
    <link href = "styles.css" rel = "stylesheet">
</head>
<body>
    <div class="formValidation">
    <form action="register.php" method="POST" enctype="multipart/form-data" >
        <label for="mail">Email</label><br>
        <input type="email" id="mail" name="email"><br>

        <label for="pw">Password</label><br>
        <input type="password" id="pw" name ="password"><br>

        <label for="pw">Confirm Password</label><br>
        <input type="Password" id="confirm" name ="confirm"><br>

        <label for="identity1, identity2", name= 'identity'>choose identity</label><br>
        <input type="checkbox" id="Identity1" name="identity[]" value="Aadhar">
        <label for="Identity1"> Aadhar card</label><br>
        <input type="checkbox" id="Identity2" name="identity[]" value="Pan">
        <label for="identity2"> Pan card</label><br>

        <label for="city">Choose a city:</label>
        <select id="city" name="city">
        <option value="siliguri">Siliguri</option>
        <option value="darjeeling">Darjeeling</option>
        <option value="kalimpong">Kalimpong</option>
        </select><br>

        <input type="radio" id="male" name="gender" value="male">
        <label for="male">Male</label><br>
        <input type="radio" id="female" name="gender" value="female">
        <label for="female">Female</label><br>
        <input type="radio" id="other" name="gender" value="other">
        <label for="other">Other</label><br>

        <input type="file" id="file" name="image" accept="image/png , image/jpeg" onchange="uploaded(event)" name="image" style="display: none;">
        <label for="file" style="cursor: pointer;">Upload image here</label><br>
        <img id="display" width="200"/>

        <button type="submit" name = "register" class="submit"> register </button>
    </form>
    </div>
    <script>
        function uploaded(e){
        var image = document.getElementById("display");
        image.src = URL.createObjectURL(e.target.files[0]);
        return(image)   
    };
    </script>
    
</body>
</html>