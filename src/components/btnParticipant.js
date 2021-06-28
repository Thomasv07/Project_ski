
let container = document.getElementById("container");
let btn = document.getElementById("add");
let i = 0;

btn.addEventListener("click", function() {
    i++;

    let div = document.createElement("div");
    container.prepend(div);

    let inputImg = document.createElement("input");
    inputImg.type = 'file';
    inputImg.name = 'picture[]';
    inputImg.accept = '.jpg, .jpeg, .gif, .png';
    div.prepend(inputImg);

    let firstname = document.createElement("input");
    firstname.type = 'text';
    firstname.name = 'firstname[]';
    firstname.placeholder = 'Prénom';
    div.append(firstname);

    let lastname = document.createElement("input");
    lastname.type = 'text';
    lastname.name = 'lastname[]';
    lastname.placeholder = 'Nom';
    div.append(lastname);

    let date = document.createElement("input");
    date.type = 'date';
    date.name = 'dob[]';
    div.append(date);

    let email = document.createElement("input");
    email.type = 'text';
    email.name = 'email[]';
    email.placeholder = 'Email';
    div.append(email);

    let select = document.createElement("select");
    select.name = 'category[]';
    div.append(select);
    let arrayv= ["1", "2", "3", "4", "5", "6"]
    let arrayt = ["M1", "M2", "M3", "Sénior", "Snow", "Nouvelle Glisse"]
    for (var j = 0; j < 6; j++) {
        let option = document.createElement("option");
        option.value = arrayv[j];
        option.text = arrayt[j];
        select.appendChild(option);
    }

});