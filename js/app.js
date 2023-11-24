const { createApp} = Vue;

createApp({
    data() {
        return {
            taskName: "",
            todos: []
        }
    },
    methods: {
        deleteTask(indexTask){
            this.todos.splice(indexTask, 1)
        },
        addTask(name){
           this.todos.unshift({
            text: name,
            done: false,
            liList: []
           }) 
           this.taskName = "";
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

