<template>
    <div class="row">
      <div class="col">
        <div class="form-group">
          <h3 class="font-semibold block text-lg">General</h3>
          <label class="form-check my-2 fs-5"><input type="checkbox" @change="switchAttribute('hidden')"   :checked="block.hidden"   :value="true" class="form-check-input"> Hidden</label>
          <label class="form-check my-2 fs-5"><input type="checkbox" @change="switchAttribute('required')" :checked="block.required" :value="true" class="form-check-input"> Required</label>
          <label class="form-check my-2 fs-5"><input type="checkbox" @change="switchAttribute('disabled')" :checked="block.disabled" :value="true" class="form-check-input"> Disabled</label>
        </div>
      </div>
    </div>

    <div class="row mt-4">
      <div class="col">
        <h3 class="font-semibold block text-lg">Customization</h3>
        <small class="text-muted">Change your form field name, pre-fill a value, add hints.</small>
        <div class="form-group mt-5">
          <label class="form-label mb-0">Field Name</label>
          <input type="text" class="form-control" @input="(e)=> block.name = e.target.value" :value="block.name">
          <label class="form-check my-2 fs-5">
            <input type="checkbox" class="form-check-input" @change="switchAttribute('hide_name')" :value="true" :checked="block.hide_name">
            Hide Field Name
          </label>
        </div>

        <div class="form-group mt-5">
          <label class="form-label mb-0">Pre-filled value</label>
          <input type="text" class="form-control" @input="(e)=> block.value = e.target.value" :value="block.value">
        </div>

        <div class="form-group mt-5">
          <label class="form-label mb-0">Empty Input Text (Placeholder)</label>
          <input type="text" class="form-control" @input="(e)=> block.placeholder = e.target.value" :value="block.placeholder">
        </div>

        <div class="form-group mt-5">
          <label class="form-label mb-0">Field Help</label>
          <input type="text" class="form-control" @input="(e)=> block.help_text = e.target.value" :value="block.help_text">
        </div>

        <div class="form-group mt-5">
          <label class="form-label mb-0">Field Width</label>
          <select class="form-select" @change="(e)=> block.width = e.target.value" :value="block.width">
            <option :value="100">Full Width</option>
            <option :value="50">Half Width</option>
            <option :value="33">third of Width</option>
            <option :value="66">two thirds of Width</option>
            <option :value="25">quarter of Width</option>
            <option :value="75">three quarters of Width</option>
          </select>
        </div>

      </div>
    </div>

</template>

<script>
export default {
  name: "BlockEditor",
  props:{
    block:{}
  },
  methods:{
    switchAttribute(attr){
      this.block[attr] = !this.block[attr];
      if(attr === 'disabled' && this.block[attr]){
        this.block.required = false;
        this.block.hidden = false;
      }

      if(attr === 'required' && this.block[attr]){
        this.block.disabled = false;
        this.block.hidden = false;
      }

      if(attr === 'hidden' && this.block[attr]){
        this.block.disabled = false;
        this.block.required = false;
      }

    }
  }
}
</script>
