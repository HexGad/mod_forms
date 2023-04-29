<template>
  <div :style="`width: ${properties.width}% !important`" :class="{'d-none': properties.hidden}">
    <div class="form-group mb-3 px-2">
      <label class="form-label mb-0" v-if="!properties.hide_name" :class="{required: properties.required}">{{properties.name}}</label>
      <component :is="input" :properties="properties"></component>
      <small class="text-muted">{{properties.help_text}}</small>
    </div>
  </div>
</template>

<script>
import TextInput from "./TextInput.vue";
import EmailInput from "./EmailInput.vue";
import DateInput from "./DateInput.vue";
import UrlInput from "./UrlInput.vue";
import PhoneInput from "./PhoneInput.vue";
import CheckboxInput from "./CheckboxInput.vue";
import SelectInput from "./SelectInput.vue";
import MultiselectInput from "./MultiselectInput.vue";
import NumberInput from "./NumberInput.vue";
import FilesInput from "./FilesInput.vue";

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

      if(this.properties.type === 'date')
        return DateInput;

      if(this.properties.type === 'url')
        return UrlInput;

      if(this.properties.type === 'phone')
        return PhoneInput;

      if(this.properties.type === 'checkbox')
        return CheckboxInput;

      if(this.properties.type === 'select')
        return SelectInput;

      if(this.properties.type === 'multiselect')
        return MultiselectInput;

      if(this.properties.type === 'number')
        return NumberInput;

      if(this.properties.type === 'files')
        return FilesInput;
    }
  }

}
</script>
