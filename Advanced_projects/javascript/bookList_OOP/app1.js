//Book Constructor
function Book(title, author, isbn) {
    this.title = title;
    this.author = author;
    this.isbn = isbn;
}

//UI Constructor
function UI() {}


//Book to list
UI.prototype.addBook = function(book) {

    const list = document.getElementById('book-list');
    
    //Table Elements
    const row = document.createElement('tr');
    console.log(row)
    row.innerHTML = `
    <td>${book.title}</td>
    <td>${book.author}</td>
    <td>${book.isbn}</td>
    <td><a href="#" class="delete">X</a></td>
    `;

    list.appendChild(row);

}
//Show Alert
UI.prototype.showAlert = function(message, className) {
    //Create a div element
    const div = document.createElement('div');
    div.className = `alert ${className}`;
    div.appendChild(document.createTextNode(message));

    const container = document.querySelector ('.container')
    const form = document.querySelector('#book-form');

    container.insertBefore(div, form);

    setTimeout(function() {
        document.querySelector('.alert-danger').remove();
    }, 2500);
}

//Delete fields
UI.prototype.deleteBook = function(target){
    if(target.className === 'delete'){
        target.parentElement.parentElement.remove();
    }
}

//Clear fields afer submit
UI.prototype.clearFields = function() {
    document.getElementById('title').value = '';
    document.getElementById('author').value = '';
    document.getElementById('isbn').value = '';

}
//Event Listener for adding 
document.getElementById('book-form').addEventListener('submit', 
    function(e) {
        const title = document.getElementById('title').value;
        const author = document.getElementById('author').value;
        const isbn = document.getElementById('isbn').value;

        console.log(title, author, isbn)

    //Book Object
    const book = new Book(title, author, isbn);

    //UI Object
    const ui = new UI();

    //Validation 
    if (title === '' || author === '' || isbn === '') {
        
        //Show Alert
        ui.showAlert('Please, fill in the fields below!', 'alert alert-danger');

    } else {
        //Add Book to list
        ui.addBook(book);

        //Success alert
        ui.showAlert('Book added successfully!', 'alert alert-success');

        //Clear Fields
        ui.clearFields();
    }

    e.preventDefault();
});

//Event listener for deleting 

document.getElementById('book-list').addEventListener('click', function(e) {

    const ui = new UI();

    ui.deleteBook(e.target);

    //Success alert after delete
    ui.showAlert('Book removed successfully', 'alert alert-success');
    
    e.preventDefault();
})