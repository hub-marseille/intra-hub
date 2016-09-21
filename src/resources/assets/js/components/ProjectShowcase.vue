<template>
	<div class="col-md-3 project-showcase-wrapper">
		<div class="row">
			<div class="project-showcase">
				<div class="main-picture" :style="{ 'background-image': 'url(' + project.main_picture + ')' }"></div>
				<h4>{{ project.name }}</h4>
				<p>{{ project.short_desc }}</p>
				<a href="/projects/{{ project.id }}/{{ project.name | url }}"><b>En voir plus...</b></a>
			</div>
		</div>
	</div>
</template>
<script>
	export default
	{
		props: ['project'],

		created()
		{
			this.project = JSON.parse(this.project);
		}
	}
</script>