/** @format */

setTimeout(() => {
	let menu = document.getElementById("menu-button");
	let asideDesc = document.querySelectorAll(".aside-desc");
	let aside = document.querySelector("aside");
	if (menu) {
		menu.addEventListener("click", () => {
			if (document.body.classList.contains("aside-body-expand")) {
				for (let element of asideDesc) {
					element.classList.add("hidden");
				}
				document.body.classList.remove("aside-body-expand");
				aside.classList.remove("aside-expand");
			} else {
				for (let element of asideDesc) {
					element.classList.remove("hidden");
				}
				document.body.classList.add("aside-body-expand");
				aside.classList.add("aside-expand");
			}
		});
	}

	var email = document.getElementById("email");
	var submitbutton1 = document.getElementById("submitB");

	if (email && submitbutton1) {
		email.addEventListener("input", function () {
			if (email.value.endsWith("@amigo.edu.co")) {
				submitbutton1.disabled = false;
			} else {
				submitbutton1.disabled = true;
			}
		});
	}

	var pw1 = document.getElementById("pw1");
	var pw2 = document.getElementById("pw2");

	if (pw1 && pw2 && submitbutton1) {
		pw2.addEventListener("input", function () {
			if (pw2.value != pw1.value) {
				submitbutton1.disabled = true;
			} else {
				submitbutton1.disabled = false;
			}
		});
	}

	let loginfo = document.getElementById("log-info");
	let opUsuario = document.getElementById("optionss-user");

	if (loginfo) {
		loginfo.addEventListener("mouseover", () => {
			opUsuario.classList.remove("hidden");
		});
		loginfo.addEventListener("mouseout", () => {
			opUsuario.classList.add("hidden");
		});
	}
}, 100);
