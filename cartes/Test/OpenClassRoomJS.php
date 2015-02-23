<html>
<body>
<input id="input" type="text" size="50" value="Cliquez ici !" onfocus="this.value='Appuyez maintenant sur votre touche de tabulation.';" onblur="this.value='Cliquez ici !';"/>
<br /><br/>
<a href="#" onfocus="document.getElementById('input').value = 'Vous avez maintenant le focus sur le lien, bravo !';">Un lien bidon</a>
<a href="http://www.siteduzero.com" onclick="alert('Vous avez cliqué !');">Cliquez-moi !</a>

</body>
</html>