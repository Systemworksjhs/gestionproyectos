const select = document.querySelector('#select');
const opciones = document.querySelector('#opciones');
const contenidoSelect = document.querySelector('#select .contenido-select');
const hiddenInput = document.querySelector('#inputSelect');
const selectCuadros = document.querySelector('#select-cuadros');
const opcionesCuadros = document.querySelector('#opciones-cuadros');
const contenidoSelectCuadros = document.querySelector('#select-cuadros .contenido-select');
const selectTriangulo = document.querySelector('#select-triangulo');
const opcionesTriangulo = document.querySelector('#opciones-triangulo');
const contenidoSelectTriangulo = document.querySelector('#select-triangulo .contenido-select');

document.querySelectorAll('#opciones > .opcion').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelect.innerHTML = e.currentTarget.innerHTML;
		select.classList.toggle('active');
		opciones.classList.toggle('active');
		hiddenInput.value = e.currentTarget.querySelector('.titulo').innerText;
	});
});

document.querySelectorAll('#opciones-cuadros > .opcion').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelectCuadros.innerHTML = e.currentTarget.innerHTML;
		selectCuadros.classList.toggle('active');
		opcionesCuadros.classList.toggle('active');
		hiddenInput.value = e.currentTarget.querySelector('.titulo').innerText;
	});
});

document.querySelectorAll('#opciones-triangulo > .opcion').forEach((opcion) => {
	opcion.addEventListener('click', (e) => {
		e.preventDefault();
		contenidoSelectTriangulo.innerHTML = e.currentTarget.innerHTML;
		selectTriangulo.classList.toggle('active');
		opcionesTriangulo.classList.toggle('active');
		hiddenInput.value = e.currentTarget.querySelector('.titulo').innerText;
	});
});

select.addEventListener('click', () => {
	select.classList.toggle('active');
	opciones.classList.toggle('active');
});

selectCuadros.addEventListener('click', () => {
	selectCuadros.classList.toggle('active');
	opcionesCuadros.classList.toggle('active');
});

selectTriangulo.addEventListener('click', () => {
	selectTriangulo.classList.toggle('active');
	opcionesTriangulo.classList.toggle('active');
});