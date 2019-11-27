<template>
  <div class="flex items-center">
    <button
      v-if="!field.last"
      @click="reorderResource('down')"
      class="cursor-pointer text-70 hover:text-primary mr-3"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        height="22"
        width="22"
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        viewBox="0 0 24 24"
        class="fill-white"
      >
        <circle cx="12" cy="12" r="10" />
        <polyline points="8 12 12 16 16 12" />
        <line x1="12" x2="12" y1="8" y2="16" />
      </svg>
    </button>
    <button
      v-if="!field.first"
      @click="reorderResource('up')"
      class="cursor-pointer text-70 hover:text-primary"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        height="22"
        width="22"
        stroke="currentColor"
        stroke-linecap="round"
        stroke-linejoin="round"
        stroke-width="2"
        viewBox="0 0 24 24"
        class="fill-white"
      >
        <circle cx="12" cy="12" r="10" />
        <polyline points="16 12 12 8 8 12" />
        <line x1="12" x2="12" y1="16" y2="8" />
      </svg>
    </button>
  </div>
</template>

<script>
export default {
  props: ["resourceName", "field"],
  computed: {
    resourceId() {
      return this.$parent.resource.id.value;
    },
    parentList() {
      return this.$parent.$parent.$parent.$parent.$parent.$parent;
    }
  },
  methods: {
    reorderResource(direction) {
      Nova.request()
        .post(
          `/nova-vendor/michielkempen/nova-order-field/${this.resourceName}`,
          {
            direction: direction,
            resource: this.resourceName,
            resourceId: this.resourceId,
            viaResource: this.field.viaResource || null,
            viaResourceId: this.field.viaResourceId || null,
            viaRelationship: this.field.viaRelationship || null
          }
        )
        .then(() => {
          this.$toasted.show(this.__("The new order has been set!"), {
            type: "success"
          });

          this.parentList.getResources();
        });
    }
  }
};
</script>
