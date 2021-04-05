const tombolCari = document.querySelector('.tombol-cari');
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');

tombolCari.style.display = 'none';

keyword.addEventListener('keyup', function() {

	fetch('ajax/barang.php?keyword=' + keyword.value)
		.then((response) => response.text())
		.then((response) => (container.innerHTML = response));

});