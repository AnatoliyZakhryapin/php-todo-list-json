<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/08d5002177.js" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/vue@3"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Vue To Do List</title>
</head>
<body>

    <div id="app">
        <header class="app-header">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <figure class="logo">
                            <img src="./img/Logo.png" alt="Logo Todolist">
                        </figure>
                        <div class="logo-text">
                            ToDolist
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <main>
            <section class="to-do-tasks">
                <div class="container">
                    <div class="row tasks-input">
                        <div class="col">
                           <input placeholder="Name Task" type="text" v-model="newTodo"  @keyup.enter="storeNewTodo">
                        </div>
                        <div class="col">
                            <button @click="storeNewTodo" class="btn">
                                New Task
                            </button>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4" v-for="(todo, index) in todos">
                            <ul class="task">
                                <div class="task-title">
                                    <span @click="changeTodoDone(index)" :class="{ 'line-through': todo.done}">{{ todo.text }}</span>
                                    <span @click="deleteTodo(index)">
                                        <i class="fa-solid fa-circle-xmark"></i>
                                    </span>
                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </main>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="./js/app.js"></script>
</body>
</html>