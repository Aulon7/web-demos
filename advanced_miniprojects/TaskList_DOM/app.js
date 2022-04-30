// UI Variables

const form = document.querySelector('#task-form');
const taskList = document.querySelector('.collection');
const clearBtn = document.querySelector('.clear-tasks');
const filter = document.querySelector('#filter');
const taskInput = document.querySelector('#task');

// Load Event Listeners 

loadEventListeners();

// Load Event Listeners
function loadEventListeners() {
    
    // Add Task Event
    form.addEventListener('submit', addTask);

    // Remove Task Event
    taskList.addEventListener('click', removeTask);

    // Clear Task Event
    clearBtn.addEventListener('click', clearTasks);

    // Filter Task Event
    filter.addEventListener('keyup', filterTasks);

    //DOM Load Event
    document.addEventListener('DOMContentLoaded', getTasks);

}

//Get Tasks from LocalStorage
function getTasks() {
    let tasks;
    if(localStorage.getItem('tasks') === null) {
        tasks = [];
    }
    else {
        tasks = JSON.parse(localStorage.getItem('tasks'));
    }

    tasks.forEach(function(task){

        const li = document.createElement('li');
    li.className = 'collection-item';
    li.appendChild(document.createTextNode(task));

    //Delete icon

    const link = document.createElement('a');
    link.className = 'delete-item secondary-content';
    link.innerHTML = '<i class="fa fa-delete-left"></i>';

    li.appendChild(link);

    //Append li element to ul 

    taskList.appendChild(li);
    })
}

//  Add Task
function addTask(e) {
    if(taskInput.value === '') {
        alert('Ju lutem shtoni nje task');
    }

    else {


    //Create link element
    const li = document.createElement('li');
    li.className = 'collection-item';
    li.appendChild(document.createTextNode(taskInput.value));

    //Delete icon

    const link = document.createElement('a');
    link.className = 'delete-item secondary-content';
    link.innerHTML = '<i class="fa fa-delete-left"></i>';

    li.appendChild(link);

    //Append li element to ul 

    taskList.appendChild(li);

    //Store to LocalStorage

    storeTasksLocalStorage(taskInput.value);

    taskInput.value = '';
    }

    e.preventDefault();
}


// Store tasks to localStorage 
function storeTasksLocalStorage(task) {
    let tasks;
    if(localStorage.getItem('tasks') === null) {
        tasks = [];
    }
    else {
        tasks = JSON.parse(localStorage.getItem('tasks'));
    }

    tasks.push(task);

    localStorage.setItem('tasks', JSON.stringify(tasks));
}

// Remove Task
function removeTask(e) {
    if (e.target.parentElement.classList.contains('delete-item')) {
        if(confirm('A jeni i sigurt?')){ 
          e.target.parentElement.parentElement.remove();
  
          //Remove from LocalStorage
          removeFromLocalStorage(e.target.parentElement.parentElement);
        }
    }
  }

//Remove from LocalStorage Function
function removeFromLocalStorage(taskItem) {
    let tasks;

    if(localStorage.getItem('tasks') === null) {
        tasks = [];
    }
    else {
        tasks = JSON.parse(localStorage.getItem('tasks'));
    }

    tasks.forEach(function(task, index){
        if(taskItem.textContent === task) {
            tasks.splice(index, 1);
        }
    });

    localStorage.setItem('tasks', JSON.stringify(tasks));
}



// Clear Tasks
function clearTasks() {
    taskList.innerHTML = '';

    clearTasksLocalStorage();
}

// Clear Tasks from LS
function clearTasksLocalStorage() {
    localStorage.clear();
}

function filterTasks(e) {
    const text = e.target.value.toLowerCase();

    document.querySelectorAll('.collection-item').forEach(
        function(task) {
            const item = task.firstChild.textContent;

            if(item.toLowerCase().indexOf(text) != -1 ) {
                task.style.display = 'block';
            }
            else {
                task.style.display = 'none';
            }
        
        });
}