let stars = document.getElementsByClassName("star"); 
let output = document.getElementById("output"); 

let stars2 = document.getElementsByClassName("star2"); 
let output2 = document.getElementById("output2"); 

function gfg(n) { 
	remove(); 
	for (let i = 0; i < n; i++) { 
		if (n == 1) cls = "one"; 
		else if (n == 2) cls = "two"; 
		else if (n == 3) cls = "three"; 
		else if (n == 4) cls = "four"; 
		else if (n == 5) cls = "five"; 
		stars[i].className = "star " + cls; 
	} 
	output.innerText = "Rating is: " + n + "/5"; 
} 
// To remove the pre-applied styling 
function remove() { 
	let i = 0; 
	while (i < 5) { 
		stars[i].className = "star"; 
		i++; 
	} 
}


function gfg2(m) { 
	remove2(); 
	for (let j = 0; j < m; j++) { 
		if (m == 1) cls = "one2"; 
		else if (m == 2) cls = "two2"; 
		else if (m == 3) cls = "three2"; 
		else if (m == 4) cls = "four2"; 
		else if (m == 5) cls = "five2"; 
		stars2[j].className = "star2" + cls; 
	} 
	output2.innerText = "Rating is: " + m + "/5"; 
} 
// To remove the pre-applied styling 
function remove2() { 
	let j = 0; 
	while (j < 5) { 
		stars2[j].className = "star2"; 
		j++; 
	} 
}