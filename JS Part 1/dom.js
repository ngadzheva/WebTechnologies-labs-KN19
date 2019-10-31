(function() {
    var headerRow = document.getElementById('header-row');
    console.log(headerRow);

    var students = document.getElementsByClassName('student')[0];
    console.log(students);

    var labels = document.getElementsByTagName('label');
    console.log(labels[0].innerHTML);

    var ivan = document.getElementById('first-name');
    console.log(ivan.innerText);
    ivan.innerHTML += 'Georgi'
    console.log(ivan);

    var fn = document.querySelector('.student');
    console.log(fn.innerHTML);

    var lastName = document.getElementsByName('last-name')[0].value;
    console.log(lastName);

    var add = document.getElementsByName('add')[0];
    add.addEventListener('click', printLastName);
    var deleteBtn = document.getElementsByTagName('button')[0];
    deleteBtn.addEventListener('click', deleteElement);
})();

function printLastName(event) {
    event.preventDefault();

    var lastName = document.getElementsByName('last-name')[0].value;
    
    var section = document.getElementsByTagName('section')[1];
    var p = document.createElement('p');
    p.setAttribute('id', 'pp');
    p.innerHTML = lastName;
    section.appendChild(p);
}

function deleteElement(event) {
    event.preventDefault();

    var row = event.target.parentNode.parentNode;
    row.parentNode.removeChild(row);
}