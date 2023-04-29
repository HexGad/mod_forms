<template>
  <div class="card" :class="{'mw-50': !embed,'min-w-50': !embed, 'min-w-100': embed, 'mw-100': embed}">
    <div class="card-body">
      <h1>{{form.title}}</h1>
      <p v-if="form.description" v-html="form.description.replace(/(?:\r\n|\r|\n)/g, '<br>')"></p>
      <div class="d-flex flex-wrap">
        <template v-for="property in form.properties">
            <FormInput :properties="property"></FormInput>
        </template>
      </div>
      <div class="row">
        <button class="btn btn-primary w-100">{{form.submit_button_text}}</button>
      </div>
    </div>

  </div>
</template>

<script>
import FormInput from "./blocks/FormInput.vue";
export default {
  name: "Preview",
  components:{FormInput},
  props:{
    embed: {},
    form:{},
  }
}
</script>

<style>
.card{
  transition: 0.2s;
}
</style>
