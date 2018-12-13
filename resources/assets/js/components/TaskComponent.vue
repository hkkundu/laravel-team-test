<template>
	<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header"><h4>All todo tasks<span class="float-right"><a href='http://localhost:8000/ws'>Realtime</a> <a class="btn-success btn-sm" data-toggle="modal" href="#addmodal">+</a></span></h4></div>

                    <div class="card-body">
                    	<input type="search" v-model='search' @keyup="searchRecord" placeholder="Search by title or body" class="form-control py-0 my-1">
                        <ul class="list-group">
                        	<p v-if="tasks.data==0" class="text-info">NO data found..</p>
                        	<li class="list-group-item list-group-item-action py-1" v-show="tasks" v-for="(task, index) in tasks.data" :key="task.id" :body="task.body">{{ index+1 }} - {{ task.title }}<span class="float-sm-right"><a class="btn btn-sm btn-primary" data-toggle="modal" href="#editmodal" @click="getrecord(task.id)">Edit</a> | <button type="button" class="btn btn-sm btn-danger" @click="deleterecord(task.id)">Delete</button> | <a class="btn btn-sm btn-info" data-toggle="modal" href="#viewmodal" @click="getrecord(task.id)">Preview</a></span></li>
                        	
                        </ul>
                        <pagination :data="tasks" @pagination-change-page="getResults"></pagination>
                    </div>
                    <div class="card-footer text-right"><small>Copyrights &copy;2018, hk practice</small></div>
                </div>
            </div>
        </div>
        <div id='modal'>
        	<addtask :url='url' @recordadded="refreshRecord"></addtask>
        	<edittask :record="editRec" :url="url" @recordupdated="refreshRecord"></edittask>
        	<viewtask :viewrecord="editRec"></viewtask>
        </div>
    </div>
</template>
<script type="text/javascript">
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('addtask', require('./AddModalComponents.vue'));
Vue.component('edittask', require('./EditModalComponents.vue'));
Vue.component('viewtask', require('./ViewModalComponents.vue'));
	export default{
		data()
		{
			return{
				tasks:{},
				editRec:{},
				errors:[],
				search:'',
				url:'http://localhost:8000',
				//url1: '/ws',
			}
		},
		methods:{
			getResults(page = 1) {
			axios.get(this.url+'/tasks?page=' + page)
				.then(response =>this.tasks = response.data)
				.catch(error=>console.log(error));
			},
			refreshRecord(record){
				this.tasks = record.data
			},
			getrecord(id){
				axios.get(this.url+'/tasks/'+id+'/edit')
				.then(response=>this.editRec=response.data)
				.catch(error=>this.errors=error.response.data.errors);
			},
			deleterecord(id){
				const reply = confirm('Are you sure, you want to delete this record?');
				if (reply) {
					axios.post(this.url+'/tasks/'+id,{
						id:id,
						_method:'DELETE'
					})
					.then(response=>this.refreshRecord(response))
					.catch(error=>this.errors=error.response.data.errors);
				}
				else
				{
					return
				}
				
			},
			searchRecord(){
				if(this.search.length>=3){
					//this.tasks={};
					axios.post(this.url+'/tasks/search', { term:this.search })
					.then((response) => this.tasks=response.data)
					.catch(error=>console.log(error));
					 //console.log(this.tasks);
				}
				else if(this.search==''){
					console.log('hi');
					this.getResults()
				}
			}

		}, 
		created(){
			axios.get(this.url+'/tasks')
			.then((response)=>this.tasks = response.data)
			.catch((error)=>console.log(error));
			console.log("Tasks component loaded..");
		}
	}
</script>
<style type="text/css" scoped></style>