<template>
	<div class="bd-example">
		<div class="modal fade" id="viewmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title float-left" id="exampleModalLabel">View task</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							<span class="sr-only">Close</span>
						</button>
					</div>
					<div class="modal-body">
						<form>
							<div class="form-group">
								<label for="title" class="control-label">Title:</label>
								<p>{{ viewrecord.title }}</p>
							</div>
							<div class="form-group">
								<label for="body" class="control-label">Body:</label>
								<p>{{ viewrecord.body }}</p>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</template>
<script type="text/javascript">
	export default{
		props:['viewrecord'],
		
	}
</script>
<style type="text/css" scoped></style>
