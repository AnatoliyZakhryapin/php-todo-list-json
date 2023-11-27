const { createApp} = Vue;

createApp({
    data() {
        return {
            newTodo: "",
            todos: []
        }
    },
    methods: {
        storeNewTodo(){
            console.log(this.newTodo);

            const data = {
				newTodo: this.newTodo,
			};

            axios
				.post('store.php', data, {
					headers: {
						'Content-Type': 'multipart/form-data',
					},
				})
				.then((res) => {					
                    console.log(res.data)
					this.todos = res.data.todos
					this.newTodo = ''
				});
        },
        fetchData(){
            axios.get('server.php').then((res) => {
				console.log(res.data.results)
				this.todos = res.data.results
			})
        },
        changeTodoDone(index){
            const data = {
                indexTodoToChangeDone: index
            };

            axios
                .post('changeDoneStatus.php', data, {
                    headers: {
						'Content-Type': 'multipart/form-data',
					},
                })
                .then((res) => {				
					this.todos = res.data.todos;
				});
        },
    },
    created() {
		this.fetchData()
	},
}).mount('#app')

