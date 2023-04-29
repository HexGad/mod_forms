<template>
    <textarea type="text" class="form-control" :required="properties.required" :disabled="properties.disabled" v-if="properties.multiline" :placeholder="properties.placeholder" :value="properties.value"></textarea>
    <input type="text" class="form-control" :required="properties.required" :disabled="properties.disabled" :placeholder="properties.placeholder" :value="properties.value" v-else>
</template>

<script>
export default {
  name: "TextInput",
  props:{
    properties:{}
  }
}
</script>
