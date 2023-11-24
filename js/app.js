const { createApp} = Vue;

createApp({
    data() {
        return {
            newTodo: "",
            todos: []
        }
    },
    methods: {
        deleteTask(indexTask){
            this.todos.splice(indexTask, 1)
        },
        storeNewTodo(){
            console.log(this.newTodo)
        },
        isCompliteTask(object){
            console.log("iniziale", object)
            object.done = !object.done;
            console.log("finale", object)
        },
        fetchData(){
            axios.get('server.php').then((res) => {
				console.log(res.data.results)
				this.todos = res.data.results
			})
        }
    },
    created() {
		this.fetchData()
	},
}).mount('#app')

