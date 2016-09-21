<template>
	<div class="alert alert-{{ type }} fade in">
		<a v-show="closable" href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>{{ getStrong }}</strong>
		<slot></slot>
	</div>
</template>
<script>
	export default
	{
		props:
		{
			'type': { 'default': 'info' },
			'strong': { 'default': '' },
			'closable': { 'default': false }
		},

		computed:
		{
			getStrong()
			{
				if (this.strong)
					return (this.strong + ' : ');
				return ('');
			}
		}
	}
</script>