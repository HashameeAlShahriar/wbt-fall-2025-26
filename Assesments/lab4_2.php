<?php
$data;
$blood=$degree=$gender = $dd = $mm = $yyyy = $email = $name = " ";
$bloodE=$degreeE=$genderE = $dateE = $emailE = $nameE = " ";

?>
<!DOCTYPE html>
<html>

<head>

    <title>PHP From Validation</title>
</head>

<body>


    <fieldset style="width: 300px; height:95px;">

        <legend>NAME</legend>
        <form method="post">
            <input type="text" name="name" style="width: 65%; height:20px;" value="<?php echo "{$name}"; ?>">
            <br>
            <span><?php echo "{$nameE}"; ?></span>

            <hr>
            <input type="submit" name="sName" value="Submit">
        </form>
    </fieldset>

    <br><br>

    <fieldset style="width: 300px; height:95px;">

        <legend>EMAIL</legend>
        <form method="post">
            <input type="text" name="email" style="width: 65%; height:20px;" value="<?php echo "{$email}"; ?>">
            i
            <br>
            <span><?php echo "{$emailE}"; ?></span>

            <hr>
            <input type="submit" name="sEmail" value="Submit">
        </form>
    </fieldset>

    <br><br>

    <fieldset style="width: 300px; height:110px;">

        <legend>DATE OF BIRTH</legend>
        <form method="post">
            &nbsp;&nbsp;&nbsp;&nbsp;dd &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;mm &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;yyyy
            <br>

            <input type="text" name="dd" placeholder="dd" size="3" value="<?php echo "{$dd}"; ?>">
            /
            <input type="text" name="mm" placeholder="mm" size="3" value="<?php echo "{$mm}"; ?>">
            /
            <input type="text" name="yyyy" placeholder="yyyy" size="5.5" value="<?php echo "{$yyyy}"; ?>">
            <br>
            <span><?php echo "{$dateE}"; ?></span>

            <hr>
            <input type="submit" name="sDate" value="Submit">
        </form>
    </fieldset>

    <br><br>

    <fieldset style="width: 300px; height:85px;">

        <legend>GENDER</legend>
        <form method="post">
            <input type="radio" name="gender" value="Male" <?php if ($gender = "Male") echo "checked" ?>>Male
            <input type="radio" name="gender" value="Female" <?php if ($gender = "Female") echo "checked" ?>>Female
            <input type="radio" name="gender" value="Other" <?php if ($gender = "Other") echo "checked" ?>>Other
            <br>
            <span><?php echo "{$genderE}"; ?></span>

            <hr>
            <input type="submit" name="sGender" value="Submit">
        </form>
    </fieldset>

    <br><br>

    <fieldset style="width: 300px; height:85px;">

        <legend>DEGREE</legend>
        <form method="post">
            <input type="checkbox" name="degree" value="SSC" <?php if ($degree = "SSC") echo "checked" ?>>SSC
            <input type="checkbox" name="degree" value="HSC" <?php if ($degree = "HSC") echo "checked" ?>>HSC
            <input type="checkbox" name="degree" value="BSc" <?php if ($degree = "BSc") echo "checked" ?>>BSc
            <input type="checkbox" name="degree" value="MSc" <?php if ($degree = "MSc") echo "checked" ?>>MSc
            <br>
            <span><?php echo "{$degreeE}"; ?></span>

            <hr>
            <input type="submit" name="sDegree" value="Submit">
        </form>
    </fieldset>
    <br><br>

    <fieldset style="width: 300px; height:85px;">

        <legend>BLOOD GROUP</legend>
        
        <form method="post">
            <select name="blood">
                <option value=""></option>
                <?php $blood=["A+","A-","B+","B-","O+","O-","AB+","AB-"];
                foreach($blood as $g){
                    echo "<option value=\"$g\">$g</option>";
                }
                ?>
            </select>
            
            <br>
            <span><?php echo "{$bloodE}"; ?></span>

            <hr>
            <input type="submit" name="sBlood" value="Submit">
        </form>
    </fieldset>    



    <!-php->
        <?php

        function test($data)
        {
            return htmlspecialchars(stripslashes(trim($data)));
        }

        //name
        if (isset($_POST["sName"])) {
            $name = test($_POST["name"]);
            if (empty($name)) {
                $nameE = "Cannot be empty";
            } elseif (str_word_count($name) < 2) {
                $nameE = "Contains at least two words";
            } elseif (!preg_match("/^[a-zA-Z][a-zA-Z.\-]+$/", $name)) {
                $nameE = "Must start with a letter and also can contain a-z,A-Z,period,dash only";
            }
        }

        //email
        if (isset($_POST["sEmail"])) {
            $email = test($_POST["email"]);
            if (empty($email)) {
                $emailE = "Cannot be empty";
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $emailE = "Must be a valid email address";
            }
        }

        //dob
        if (isset($_POST["sDate"])) {
            $dd = test($_POST["dd"]);
            $mm = test($_POST["mm"]);
            $yyyy = test($_POST["yyyy"]);
            if (empty($dd) || empty($mm) || empty($yyyy)) {
                $dateE = "Cannot be empty";
            } elseif (!is_numeric($dd) || $dd < 1 || $dd > 31) {
                $dateE = "Valid number dd:1-31";
            } elseif (!is_numeric($mm) || $mm < 1 || $mm > 31) {
                $dateE = "Valid number mm:1-12";
            } elseif (!is_numeric($yyyy) || $yyyy < 1953 || $yyyy > 1998) {
                $dateE = "Valid number yyyy:1953-1998";
            }
        }
        //gender
        if (isset($_POST["sGender"])) {
            //$gender = test($_POST["gender"]);
            if (empty($gender)) {
                $genderE = "At least one of them must be selected";
            } else {
                $gender = $_POST["gender"];
            }
        }
        //degree
        if (isset($_POST["sDegree"])?(array)$_POST['sDegree']:[]) {
            
            if (empty($_POST["degree"])) {
                $degreeE = "Cannot be empty";
            } elseif (count($_POST["degree"]) < 2) {
                $degreeE = "At least two of them must be selected";
            } else  {
                //$nameE = "Must start with a letter and also can contain a-z,A-Z,period,dash only";
                $degree=$_POST["degree"];
            }
        } 
        //blood
        if (isset($_POST["sBlood"])) {
            //$gender = test($_POST["gender"]);
            if (empty($_POST["sBlood"])) {
                $bloodE = "Must be selected";
            } else {
                $blood = $_POST["blood"];
            }
        }         




        ?>
</body>

</html>