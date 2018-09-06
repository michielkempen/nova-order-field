<template>
    <div class="flex items-center">
        <button
            @click="min"
            class="cursor-pointer text-70 hover:text-primary mr-3"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" aria-labelledby="updateRequest" role="presentation" class="fill-current">
            <path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm4-8a1 1 0 0 1-1 1H9a1 1 0 0 1 0-2h6a1 1 0 0 1 1 1z"/></svg>
        </button>
        <span>
            {{ field.value }}
        </span>
        <button
            @click="plus"
            class="cursor-pointer text-70 hover:text-primary ml-3"
        >
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 22 22" aria-labelledby="updateRequest" role="presentation" class="fill-current">
            <path d="M12 22a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm1-9h2a1 1 0 0 1 0 2h-2v2a1 1 0 0 1-2 0v-2H9a1 1 0 0 1 0-2h2V9a1 1 0 0 1 2 0v2z"/></svg>
        </button>
    </div>
</template>

<script>
export default {
    props: [
    	'resourceName',
        'field'
    ],
	methods: {
		plus() {
			this.field.value += 1;
			this.update();
		},
		min() {
			this.field.value -= 1;
            this.update();
		},
        update() {
			Nova.request().post(
				'/nova-vendor/michielkempen/nova-order-field', {
					order: this.field.value,
					field: this.field.attribute,
					resource: this.resourceName,
					resourceId: this.$parent.resource.id.value,
				}
			);
        }
	}
}
</script>
