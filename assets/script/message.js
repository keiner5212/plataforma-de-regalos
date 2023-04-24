/** @format */

function messageBox(titulo, mensaje) {
	let html =
		'<div class="message">' +
		"<h3>" +
		titulo +
		"</h3>" +
		"<p>" +
		mensaje +
		"</p>" +
		'<div class="div-right">' +
		'<button class="acept">Aceptar</button>' +
		"</div>" +
		"</div>";
	let div = document.createElement("div");
	div.innerHTML = html;
	document.body.appendChild(div);
	let acept = document.querySelector(".acept");
	acept.addEventListener("click", () => {
		div.remove();
	});
}

function questionBox(titulo, mensaje, action) {
	let html =
		'<div class="message">' +
		"<h3>" +
		titulo +
		"</h3>" +
		"<p>" +
		mensaje +
		"</p>" +
		'<div class="div-right">' +
		'<button class="acept">Aceptar</button>' +
		'<button class="decline">Cancelar</button>' +
		"</div>" +
		"</div>";
	let div = document.createElement("div");
	div.innerHTML = html;
	document.body.appendChild(div);
	let decline = document.querySelector(".decline");
	decline.addEventListener("click", () => {
		div.remove();
	});
	let acept = document.querySelector(".acept");
	acept.addEventListener("click", () => {
		div.remove();
		action();
	});
}

