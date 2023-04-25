<template>
  <div :style="`width: ${properties.width}% !important`" :class="{'d-none': properties.hidden}">
    <div class="form-group mb-3 px-2">
      <label class="form-label mb-0" :class="{required: properties.required}">{{properties.name}}</label>
      <component :is="input" v-bind="properties"></component>
      <small class="text-muted">{{properties.help_text}}</small>
    </div>
  </div>
</template>

<script>
import TextInput from "./TextInput.vue";
import EmailInput from "./EmailInput.vue";

export default {
  name: "FormInput",
  props:{
    properties:{
      type: Object,
      required: true
    }
  },
  computed:{
    input(){
      if(this.properties.type === 'text')
        return TextInput;

      if(this.properties.type === 'email')
        return EmailInput;

    }
  }

}
</script>
