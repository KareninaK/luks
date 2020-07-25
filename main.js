const todos = JSON.parse(localStorage.getItem('todos')) || [];

const render = () =>  {
	const todoList = document.getElementById('todo-list');
	todoList.innerHTML = '';
	const todosTemplate = todos.map(t => "<li>" +t+ "</li>" );
	todoList.innerHTML = todosTemplate.join('');
	const elementos = document.querySelectorAll('#todo-list li');
	elementos.forEach((elemento, i) => {
		elemento.addEventListener('click', () => {
			elemento.parentNode.removeChild(elemento) //el nodo padre puede eliminar al nodo hijo
			todos.splice(i, 1)
			ActualizaTodos(todos)
			render()
		})			
	})
}

const ActualizaTodos = (todos) => {
	const todoStrings = JSON.stringify(todos)
	localStorage.setItem('todos', todoStrings)
}

window.onload = () => {
	render();
	const form = document.getElementById('form');
	form.onsubmit = (e) => {
		e.preventDefault();
		const todo = document.getElementById('imagen');
		console.log(todo);
		const todoText = todo.value;
		todo.value='';
		todos.push(todoText);
		ActualizaTodos(todos);
		render();
	}
}


function showFiles() {
	var files = document.getElementById("imagen").files;
  
	for (let file of files) {
	  let img = new Image;
	  img.src = URL.createObjectURL(file);
	  img.title = file.name;
  
	  document.getElementById('list').appendChild(img);
	}
  }