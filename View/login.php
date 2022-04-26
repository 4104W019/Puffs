<!DOCTYPE html>
<html>
 <head>
    <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
    <title>Login Page</title>
 </head>
 <center>
     <body>
     <h2>
         <a href=./index.php> 回首頁 </a>
         <hr>
         員工登入
        </h2>

        <form action="db_employee.php" method="post">
            <br><br>
            Employee ID:<input type="text" name="eId"><br><br>
            Password:<input type="text" name="ePassword"><br><br>
            <input type="submit" name="up" style="background-color: aquamarine;" value="Login">
        </form>

     </body>
 </center>
</html> 