# ETIF05 WEB SECURITY

# Hur man lägger till en ändring:

1. Gör ändringar och spara filen
2. Gå in i Source Control, och stagea alla ändringar (+ tecken)
3. Skriv meddelande
4. Commit
5. Push

# För att använda certificate I XAMPP
1. I httpd-vhosts.conf lägg till
<VirtualHost \*:443>
  ServerName localhost
  DocumentRoot "htdocs"
  SSLEngine on
  SSLCertificateFile "htdocs/EITF05-WebSecurity/cert/server.crt"
  SSLCertificateKeyFile "htdocs/EITF05-WebSecurity/cert/server.key"
</VirtualHost>

2. I httpd-ssl.conf se till att "Listen 443" inte är bort kommenterat och att allt under "## SSL Virtual Host Context" är radderat
3. Annars har Marcus fått det att funka så man kan köra på hans dator

# För att gör SQL injection
1. Skapa en profil
2. logga in med följande uttryck Username = Ditt användarnam' or '1'='1
3. Skriv in ditt lösenord
4. SQL skickar nu tillbaka all inloggnings info 

# För XSS attack
1. Skapa en profil
2. Fyll i normalt i username och password medans på address slår ni in "<script>location.href="https://google.com"</script>"
3. När du loggar in och genomför ett köp kommer nu när då ska gå till kvittot en XSS attack att ske

# För CSRF attack
1. Se till att adressen i CSRF.php (rad 6) går till change_adress.php (kan vara annan adress för mac)
2. Kommentera bort CSRF-skyddet på rad 9 till 16 i change_adress.php
3. Logga in med ditt konto
4. Inspektera adressen för ditt konto
5. Klicka på länken i från e-posten eller prova denna: [Download 16GB RAM to you PC for FREE!!!](http://localhost/EITF05-WebSecurity/csrf.php).
6. Uppdatera sidan och sedan inspektera adressen för ditt konto