<template>
    <textarea type="text" class="form-control" v-if="multiline"></textarea>
    <input type="text" class="form-control" v-else>
</template>

<script>
export default {
  name: "TextInput",
  props:{
    name:{},
    multiline:{},
    required:{},
  }
}
</script>
