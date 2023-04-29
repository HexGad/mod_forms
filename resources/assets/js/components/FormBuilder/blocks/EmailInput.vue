<template>
  <input type="email" class="form-control" :placeholder="properties.placeholder" :value="properties.value">
</template>

<script>
export default {
  name: "TextInput",
  props:{
    properties:{},

  }
}
</script>
