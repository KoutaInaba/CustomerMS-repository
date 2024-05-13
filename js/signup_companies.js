import { companies } from "./companies.js";
console.log(companies);
console.log(companies.length);

let arr = companies;

function createSelectBox() {
	let select = document.createElement('companyID');

	for (var i=0; i<arr.length; i++) {
		let op = document.createElement('option');
		op.value = arr[i].id;
		op.text = arr[i].name;
		select.appendChild(op);
	}
}