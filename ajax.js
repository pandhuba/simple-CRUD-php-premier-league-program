var cari = document.getElementById('search');
var container = document.getElementById('container');

cari.addEventListener('keyup', function() {
	var xhr = new XMLHttpRequest();

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4 && xhr.status == 200) {
			container.innerHTML = xhr.responseText;
		}
	}

	xhr.open('GET', 'club.php?cari='+cari.value, true);
	xhr.send();
})