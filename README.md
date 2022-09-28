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

2. I httpd-ssl.conf se till att "Listen 443" och att allt under "## SSL Virtual Host Context" är radderat
3. Annars har Marcus fått det att funka så man kan köra på hans dator
