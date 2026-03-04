const inputbox = document.getElementById('Input-box');
const listcontainer = document.getElementById('list-container');

function addTask(event){
    if(inputbox.value === ''){
        alert ('you must write something');
        event.preventDefault();
    } else{
        let li = document.createElement('li');
        li.innerHTML = inputbox.value;
        listcontainer.appendChild(li);

        let span = document.createElement('span');
        span.innerHTML = '\u00d7';
        li.appendChild(span);
        saveData();
    }
}

listcontainer.addEventListener('click', function(e){
    if(e.target.tagName === 'LI') {
        e.target.classList.toggle('si');
        saveData();
    }
    else if(e.target.tagName === 'SPAN'){
        e.target.parentElement.remove();
        saveData();
    }
}, false);

inputbox.addEventListener("keydown", function(e) {
    if (e.key === "Enter") {
    }
});

function saveData(){
    localStorage.setItem('data', listcontainer.innerHTML);
}
function showTask(){
    const data = localStorage.getItem('data');
    if(data){
        listcontainer.innerHTML = data;
    }
}
showTask();