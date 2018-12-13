<template>
	<div class="bd-example">
		<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title float-left" id="exampleModalLabel">Add tasks</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="alert alert-success alert-dismissible" role="alert" v-if="success.length >0">
								<button type="button" class="close" data-dismiss="alert">&times;</button>
    							<strong>Success!</strong> {{ success }}
							</div>
							<div class="form-group">
								<label for="title" class="control-label">Title:</label>
								<input type="text" class="form-control" id="title" name="title" v-model="record.title">
								<ul v-if='errors.title' class="list-unstyled">
									<li v-for='err of errors.title' class="alert alert-danger alert-dismissible">{{ err }}</li>
								</ul>
							</div>
							<div class="form-group">
								<label for="body" class="control-label">Body:</label>
								<textarea class="form-control" id="body" name="body" v-model="record.body"></textarea>
								<ul v-if='errors.body' class="list-unstyled">
									<li v-for='err of errors.body' class="alert alert-danger alert-dismissible">{{ err }}</li>
								</ul>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-primary" v-on:click='updateRecord'>Update task</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
		props:['record','url'],
		data(){
			return{
				success:'',
				errors:[]
				// dismissCountDown: null,
    // 			showDismissibleAlert: false
			}
		},
		methods:{
			updateRecord(){
				//this.success='';
				this.errors='';
				axios.post(this.url+'/tasks/'+this.record.id, { 'title':this.record.title, 'body':this.record.body, '_method':'PUT'})
				.then(data=>{
					this.$emit('recordupdated', data);
					this.success='Task updated successfully!';
					
					// this.showDismissibleAlert=true;
					// this.dismissCountDown = 5;
				})
				.catch(error=>{
					this.errors=error.response.data.errors;
					console.log(this.errors);
				}); 
				
			}
		}
	}
</script>
<style type="text/css" scoped></style>